<?php

namespace App\Http\Controllers;

use App\Exports\MorningWarehouseExport;
use App\Exports\WarehouseExport;
use App\Imports\WarehousesImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Warehouse;

class WarehousesController extends Controller
{
    // total warehouses
    public function warehouses(Request $request)
    {
        $keywords = $request->input('keywords');
        $sortBy = $request->input('sortBy', 'id');
        $sortDirection = $request->input('sortDirection', 'desc');
    
        $query = Warehouse::orderBy($sortBy, $sortDirection);
    
        if (!empty($keywords)) {
            $query->where(function ($query) use ($keywords) {
                $query->where('name', 'like', '%' . $keywords . '%');
            });
        }
    
        $warehouses = $query->paginate(5);
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
             'type' => '1'
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
         $mwarehouse->type = '2';
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
    
    public function import(Request $request)
    {
        Excel::import(new WarehousesImport, request()->file('importWarehouse'));
        
        return redirect()->route('warehouses')->with('success', 'All good!');
    }
}
