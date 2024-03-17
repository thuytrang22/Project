<?php

namespace App\Imports;

use App\Models\CostType;
use App\Models\MaintenanceCost;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MaintenanceCostImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $types = [];
        $costTypes = CostType::get();
        foreach($costTypes as $costType) {
            $types[$costType->name] = $costType->code;
        }

        if ($row['ten'] && isset($types[$row['loai']])) {
            $maintenanceCost = new MaintenanceCost();
            $maintenanceCost->name = $row['ten'];
            $maintenanceCost->expense = (int) str_replace(',', '', $row['so_tien']);
            $maintenanceCost->type = $types[$row['loai']];
            return $maintenanceCost;
        }
    }
    
    public function headingRow(): int
    {
        return 2;
    }
}
