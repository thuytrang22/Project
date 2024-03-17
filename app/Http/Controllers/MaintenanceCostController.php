<?php

namespace App\Http\Controllers;

use App\Exports\MaintenanceCostExport;
use App\Imports\MaintenanceCostImport;
use App\Models\CostType;
use App\Models\MaintenanceCost;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MaintenanceCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $types = [];
        $costTypes = CostType::get();
        foreach($costTypes as $costType) {
            $types[$costType->code] = $costType->name;
        }

        $keywords = $request->input('keywords');
        $sortBy = $request->input('sortBy', 'id');
        $sortDirection = $request->input('sortDirection', 'desc');
        $query = MaintenanceCost::orderBy($sortBy, $sortDirection);
    
        if (!empty($keywords)) {
            $query->where(function ($query) use ($keywords) {
                $query->where('name', 'like', '%' . $keywords . '%');
            });
        }
    
        $maintenanceCosts = $query->paginate(5);

        return view(
            'admins.maintenance-costs.index',
            compact('maintenanceCosts', 'types', 'keywords', 'sortBy', 'sortDirection')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $costTypes = CostType::get();
        return view('admins.maintenance-costs.create', ['costTypes' => $costTypes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cost = new MaintenanceCost();
        $cost->name = $request->input('name');
        $cost->expense = $request->input('expense');
        $cost->type = $request->input('type');
        $cost->save();

        return redirect()->route('maintenance.cost')->with('store', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MaintennanceCost  $maintennanceCost
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MaintennanceCost  $maintennanceCost
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMaintennanceCostRequest  $request
     * @param  \App\Models\MaintennanceCost  $maintennanceCost
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MaintennanceCost  $maintennanceCost
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }

    public function export(Request $request)
    {
        $keywords = $request->query('keywords');
        $sortBy = $request->input('sortBy', 'name');
        $sortDirection = $request->input('sortDirection', 'desc');

        return Excel::download(new MaintenanceCostExport($keywords, $sortBy, $sortDirection), 'Chi phí vận hành.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file('importMaintenance');
        if ($file) {
            Excel::import(new MaintenanceCostImport, $file);
        }

        return redirect()->route('maintenance.cost')->with('success', 'All good!');
    }
}
