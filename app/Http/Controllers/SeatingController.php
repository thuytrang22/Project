<?php

namespace App\Http\Controllers;

use App\Models\Booking;
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
        return view('admins.seatings.index', compact('bookings', 'keywords', 'sortBy', 'sortDirection'));
    }
}
