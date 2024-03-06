<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class WarehouseExport implements FromView
{
    const IMPORT_TYPE = 1;
    const EXPORT_TYPE = 2;

    protected $keywords;
    protected $sortBy;
    protected $sortDirection;

    public function __construct($keywords, $sortBy, $sortDirection)
    {
        $this->keywords = $keywords;
        $this->sortBy = $sortBy;
        $this->sortDirection = $sortDirection;
    }

    public function view(): View
    {
        $query = DB::table('warehouses')
            ->select(DB::raw('name, sum(quantity) as total, max(measure) as measure, max(created_at) as created_at'))
            ->where('type', self::IMPORT_TYPE)
            ->whereNull('deleted_at')
            ->groupBy('name')
            ->orderBy($this->sortBy, $this->sortDirection);
        if (!empty($this->keywords)) {
            $query->where('name', 'like', '%' . $this->keywords . '%');
        }

        $warehouses = $query->get();

        $query = DB::table('warehouses')
            ->select(DB::raw('name, sum(quantity) as total'))
            ->where('type', self::EXPORT_TYPE)
            ->whereNull('deleted_at')
            ->groupBy('name')
            ->orderBy($this->sortBy, $this->sortDirection);
        if (!empty($this->keywords)) {
            $query->where('name', 'like', '%' . $this->keywords . '%');
        }
        $exportWarehouses = $query->get();
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
