<?php

namespace App\Imports;

use App\Models\Warehouse;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class WarehousesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ($row['ten']) {
            return new Warehouse([
                'name' => $row['ten'],
                'quantity' => $row['so_luong'],
                'measure' => $row['don_vi'],
                'price' => (int) str_replace(',', '', $row['don_gia']),
                'type' => 1,
            ]);
        }
    }
    
    public function headingRow(): int
    {
        return 2;
    }
}
