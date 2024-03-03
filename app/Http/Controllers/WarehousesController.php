<?php

namespace App\Http\Controllers;

use App\Exports\WarehouseExport;
use App\Exports\WarehouseExportInput;
use App\Imports\WarehousesImport;
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
        $sortBy = $request->input('sortBy', 'id');
        $sortDirection = $request->input('sortDirection', 'desc');
    
        $query = DB::table('warehouses')
            ->select(DB::raw('name, sum(quantity) as total, max(measure) as measure, max(created_at) as created_at'))
            ->where('type', self::IMPORT_TYPE)
            ->groupBy('name')
            ->orderBy($sortBy, $sortDirection);
    
        if (!empty($keywords)) {
            $query->where(function ($query) use ($keywords) {
                $query->where('name', 'like', '%' . $keywords . '%');
            });
        }

        $warehouses = $query->paginate(5);
    
        $query = DB::table('warehouses')
            ->select(DB::raw('name, sum(quantity) as total'))
            ->where('type', self::EXPORT_TYPE)
            ->groupBy('name')
            ->orderBy($sortBy, $sortDirection);
    
        if (!empty($keywords)) {
            $query->where(function ($query) use ($keywords) {
                $query->where('name', 'like', '%' . $keywords . '%');
            });
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

    public function create()
    {
        return view('admins.warehuoses.create');
    }
 
    public function store(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'quantity' => $request->input('quantity'),
            'measure' => $request->input('measure'),
            'type' => self::IMPORT_TYPE
        ];
        Warehouse::create($data);
        return redirect()->route('warehouses')->with('store', 'success');
    }

    public function edit(Warehouse $id)
    {
        return view('admins.warehuoses.edit', [
            'mwarehouse' => $id
        ]);
    }

    public function update(Request $request)
    {
        $mwarehouse = Warehouse::find($request->id);
        $mwarehouse->name = $request->name;
        $mwarehouse->quantity = $request->quantity;
        $mwarehouse->measure = $request->measure;
        $mwarehouse->type = self::EXPORT_TYPE;
        $mwarehouse->save();

        return redirect()->route('warehouses')->with('update', 'success');
    }

    public function destroy($id)
    {
        Warehouse::destroy($id);
        return redirect()->route('warehouses')->with('destroy', 'success');
    }
    
    public function export()
    {
        return Excel::download(new WarehouseExport, 'Kho.xlsx');
    }
    
    public function exportInput(Request $request)
    {
        $keywords = $request->input('keywords');
        $sortBy = $request->input('sortBy', 'id');
        $sortDirection = $request->input('sortDirection', 'desc');

        return Excel::download(new WarehouseExportInput($keywords, $sortBy, $sortDirection), 'Xuất kho.xlsx');
    }
    
    public function import(Request $request)
    {
        Excel::import(new WarehousesImport, request()->file('importWarehouse'));
        
        return redirect()->route('warehouses')->with('success', 'All good!');
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
