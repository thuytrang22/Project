<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    public function index () {
        return view('admins.revenues.index');
    }

    public function revenueList(Request $request) {
        $keywords = $request->input('keywords');
        $sortBy = $request->input('sortBy', 'id');
        $sortDirection = $request->input('sortDirection', 'desc');

        $query = Bill::where('status', 1)
        ->orderBy($sortBy, $sortDirection);

        if (!empty($keywords)) {
            $query->where(function ($query) use ($keywords) {
                $query->where('name', 'like', '%' . $keywords . '%');
            });
        }
        $bills = $query->paginate(5);
        return view('admins.revenues.revenueList', compact('bills', 'keywords', 'sortBy', 'sortDirection'));
    }
}
