<?php

namespace App\Exports;

use App\Models\CostType;
use App\Models\MaintenanceCost;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MaintenanceCostExport implements FromView
{
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
        $types = [];
        $costTypes = CostType::get();
        foreach($costTypes as $costType) {
            $types[$costType->code] = $costType->name;
        }
        
        $query = MaintenanceCost::orderBy($this->sortBy, $this->sortDirection);
        if (!empty($this->keywords)) {
            $query->where('name', 'like', '%' . $this->keywords . '%');
        }
    
        $maintenanceCosts = $query->get();
        return view('exports.maintenance-cost', [
            'maintenanceCosts' => $maintenanceCosts,
            'types' => $types,
        ]);
    }
}
