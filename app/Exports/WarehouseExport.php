<?php

namespace App\Exports;

use App\Models\Warehouse;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class WarehouseExport implements FromView
{
    public function view(): View
    {
        return view('exports.warehouses', [
            'warehouses' => Warehouse::all()
        ]);
    }
}
