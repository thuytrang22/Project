<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Seating;
use Illuminate\Http\Request;

class SeatingController extends Controller
{
    public function index (Request $request) {
        $keywords = $request->input('keywords');
        $sortBy = $request->input('sortBy', 'id');
        $sortDirection = $request->input('sortDirection', 'desc');
    
        $query = Booking::orderBy($sortBy, $sortDirection);
    
        if (!empty($keywords)) {
            $query->where(function ($query) use ($keywords) {
                $query->where('name', 'like', '%' . $keywords . '%');
            });
        }
    
        $bookings = $query->paginate(5);

        $tableNumbers = Seating::all();
        return view('admins.seatings.index', compact('bookings', 'tableNumbers', 'keywords', 'sortBy', 'sortDirection'));
    }

    public function seatingManager (Request $request) {
        $keywords = $request->input('keywords');
        $sortBy = $request->input('sortBy', 'id');
        $sortDirection = $request->input('sortDirection', 'desc');
    
        $query = Seating::orderBy($sortBy, $sortDirection);
    
        if (!empty($keywords)) {
            $query->where(function ($query) use ($keywords) {
                $query->where('table_number', 'like', '%' . $keywords . '%');
            });
        }
    
        $seatings = $query->paginate(5);
        return view('admins.seatings.seating-manager', compact('seatings', 'keywords', 'sortBy', 'sortDirection'));
    }

    public function create () {
        return view('admins.seatings.create');
    }

    public function store (Request $request) {
        $status = [
            'pending' => 0,
            'working' => 0,
            'empty_table' => 0,
        ];
        $status[$request->input('seating_status')] = 1;
        $data = [
            'table_number' => $request->input('table_number'),
        ];
        $data = array_merge($data, $status);
        Seating::create($data);
        return redirect()->route('seating.manager')->with('store', 'success');
    }

    public function edit(Seating $id)
    {
        return view('admins.seatings.edit', [
            'seating' => $id
        ]);
    }

    public function update(Request $request)
    {
        $status = [
            'pending' => 0,
            'working' => 0,
            'empty_table' => 0,
        ];
        $status[$request->seating_status] = 1;

        $seating = Seating::find($request->id);
        $seating->table_number = $request->table_number;
        $seating->empty_table = $status['empty_table'];
        $seating->pending =  $status['pending'];
        $seating->working =  $status['working'];
        
        $seating->save();

        return redirect()->route('seating.manager')->with('update', 'success');
    }

    public function destroy($id)
    {
        Seating::destroy($id);
        return redirect()->route('seating.manager')->with('destroy', 'success');
    }
}
