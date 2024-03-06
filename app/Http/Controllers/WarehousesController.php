<?php

namespace App\Http\Controllers;

use App\Exports\WarehouseExport;
use App\Exports\WarehouseExportInput;
use App\Exports\WarehouseExportOutput;
use App\Imports\WarehousesImport;
use App\Imports\WarehousesImportOutput;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Warehouse;
use Illuminate\Support\Facades\DB;

class WarehousesController extends Controller
{
    const IMPORT_TYPE = 1;
    const EXPORT_TYPE = 2;

    // total warehouses
    public function warehouses(Request $request)
    {
        $keywords = $request->input('keywords');
        $sortBy = $request->input('sortBy', 'name');
        $sortDirection = $request->input('sortDirection', 'desc');

        $query = DB::table('warehouses')
            ->select(DB::raw('name, sum(quantity) as total, max(measure) as measure, max(created_at) as created_at'))
            ->where('type', self::IMPORT_TYPE)
            ->groupBy('name')
            ->orderBy($sortBy, $sortDirection);

        if (!empty($keywords)) {
            $query->where('name', 'like', '%' . $keywords . '%');
        }

        $warehouses = $query->paginate(5);

        $query = DB::table('warehouses')
            ->select(DB::raw('name, sum(quantity) as total'))
            ->where('type', self::EXPORT_TYPE)
            ->groupBy('name')
            ->orderBy($sortBy, $sortDirection);

        if (!empty($keywords)) {
            $query->where('name', 'like', '%' . $keywords . '%');
        }
        $exportWarehouses = $query->paginate(5);
        $exportNameWarehouses =  $exportWarehouses->pluck('name')->toArray();
        $exportTotalWarehouses =  $exportWarehouses->pluck('total')->toArray();

        foreach ($warehouses as &$warehouse) {
            $key = array_search($warehouse->name, $exportNameWarehouses);
            if ($key) {
                $warehouse->total -= $exportTotalWarehouses[$key];
            }
        }

        return view('admins.warehuoses.index', compact('warehouses', 'keywords', 'sortBy', 'sortDirection'));
    }

    public function create(Request $request)
    {
        $type = $request->query('type');
        return view('admins.warehuoses.create', compact('type'));
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'quantity' => $request->input('quantity'),
            'measure' => $request->input('measure'),
            'price' => $request->input('price'),
            'type' => $request->input('type'),
        ];
        Warehouse::create($data);

        if ($request->input('type') == self::IMPORT_TYPE) {
            $route = 'warehouses.import.list';
        } else {
            $route = 'warehouses.export.list';
        }
        return redirect()->route($route)->with('store', 'success');
    }

    public function edit($id, $type)
    {
        $warehouse = Warehouse::find($id);
        return view('admins.warehuoses.edit', [
            'warehouse' => $warehouse,
            'type' => $type
        ]);
    }

    public function update(Request $request)
    {
        $mwarehouse = Warehouse::find($request->id);
        $mwarehouse->name = $request->name;
        $mwarehouse->quantity = $request->quantity;
        $mwarehouse->measure = $request->measure;
        $mwarehouse->save();

        if ($request->type == self::IMPORT_TYPE) {
            $route = 'warehouses.import.list';
        } else {
            $route = 'warehouses.export.list';
        }
        return redirect()->route($route)->with('update', 'success');
    }

    public function destroy($id, $type)
    {
        Warehouse::destroy($id);

        if ($type == self::IMPORT_TYPE) {
            $route = 'warehouses.import.list';
        } else {
            $route = 'warehouses.export.list';
        }
        return redirect()->route($route)->with('destroy', 'success');
    }

    public function export(Request $request)
    {
        $keywords = $request->query('keywords');
        $sortBy = $request->input('sortBy', 'name');
        $sortDirection = $request->input('sortDirection', 'desc');

        return Excel::download(new WarehouseExport($keywords, $sortBy, $sortDirection), 'Tồn kho.xlsx');
    }

    public function exportInput(Request $request)
    {
        $keywords = $request->query('keywords');
        $sortBy = $request->input('sortBy', 'name');
        $sortDirection = $request->input('sortDirection', 'desc');

        return Excel::download(new WarehouseExportInput($keywords, $sortBy, $sortDirection), 'Phiếu nhập kho.xlsx');
    }

    public function exportOutput(Request $request)
    {
        $keywords = $request->query('keywords');
        $sortBy = $request->input('sortBy', 'name');
        $sortDirection = $request->input('sortDirection', 'desc');

        return Excel::download(new WarehouseExportOutput($keywords, $sortBy, $sortDirection), 'Phiếu xuất kho.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file('importWarehouse');
        if ($file) {
            Excel::import(new WarehousesImport, $file);
        }

        return redirect()->route('warehouses.import.list')->with('success', 'All good!');
    }

    public function importOutput(Request $request)
    {
        $file = $request->file('importOutputWarehouse');
        if ($file) {
            Excel::import(new WarehousesImportOutput, $file);
        }

        return redirect()->route('warehouses.export.list')->with('success', 'All good!');
    }

    public function exportList(Request $request)
    {
        $keywords = $request->input('keywords');
        $sortBy = $request->input('sortBy', 'id');
        $sortDirection = $request->input('sortDirection', 'desc');

        $query = Warehouse::orderBy($sortBy, $sortDirection);
        $query->where('type', self::EXPORT_TYPE);

        if (!empty($keywords)) {
            $query->where(function ($query) use ($keywords) {
                $query->where('name', 'like', '%' . $keywords . '%');
            });
        }

        $warehouses = $query->paginate(5);
        return view('admins.warehuoses.export', compact('warehouses', 'keywords', 'sortBy', 'sortDirection'));
    }

    public function importList(Request $request)
    {
        $keywords = $request->input('keywords');
        $sortBy = $request->input('sortBy', 'id');
        $sortDirection = $request->input('sortDirection', 'desc');

        $query = Warehouse::orderBy($sortBy, $sortDirection);
        $query->where('type', self::IMPORT_TYPE);

        if (!empty($keywords)) {
            $query->where(function ($query) use ($keywords) {
                $query->where('name', 'like', '%' . $keywords . '%');
            });
        }

        $warehouses = $query->paginate(5);
        return view('admins.warehuoses.import', compact('warehouses', 'keywords', 'sortBy', 'sortDirection'));
    }
}
