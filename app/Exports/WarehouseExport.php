<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class WarehouseExport implements FromView
{
    const IMPORT_TYPE = 1;
    const EXPORT_TYPE = 2;

    public function view(): View
    {
        $warehouses = DB::table('warehouses')
            ->select(DB::raw('name, sum(quantity) as total, max(measure) as measure, max(created_at) as created_at'))
            ->where('type', self::IMPORT_TYPE)
            ->groupBy('name')
            ->orderBy('id')
            ->get();
    
        $exportWarehouses = DB::table('warehouses')
            ->select(DB::raw('name, sum(quantity) as total'))
            ->where('type', self::EXPORT_TYPE)
            ->groupBy('name')
            ->orderBy('id')
            ->get();
        $exportNameWarehouses =  $exportWarehouses->pluck('name')->toArray();
        $exportTotalWarehouses =  $exportWarehouses->pluck('total')->toArray();

        foreach ($warehouses as &$warehouse) {
            $key = array_search($warehouse->name, $exportNameWarehouses);
            if ($key) {
                $warehouse->total -= $exportTotalWarehouses[$key];
            }
        }
        return view('exports.warehouses', [
            'warehouses' => $warehouses
        ]);
    }
}
