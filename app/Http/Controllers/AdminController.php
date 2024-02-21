<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function index() 
    {
        return view('admins.dashboards.index');
    }

    public function profile()
    {
        return view('admins.dashboards.profile');
    }
    
    public function dashboard(Request $request)
    {
        $optionDish = DB::table('menus')->where('option', '=', 1)->sum('option');
        $optionDrink = DB::table('menus')->where('option', '=', 2)->sum('option');
        $optionMore = DB::table('menus')->where('option', '=', 3)->sum('option');
        return view('admins.dashboards.dashboard', compact('optionDish', 'optionDrink', 'optionMore'));
    }

}
