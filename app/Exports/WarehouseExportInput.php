<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use App\Models\Warehouse;
use Maatwebsite\Excel\Concerns\FromView;

class WarehouseExportInput implements FromView
{
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
        $query = Warehouse::orderBy($this->sortBy, $this->sortDirection);
        $query->where('type', self::EXPORT_TYPE);
        $keywords = $this->keywords;
    
        if (!empty($this->keywords)) {
            $query->where(function ($query) use ($keywords) {
                $query->where('name', 'like', '%' . $keywords . '%');
            });
        }
    
        $warehouses = $query->get();
        return view('exports.warehouses', [
            'warehouses' => $warehouses
        ]);
    }
}
