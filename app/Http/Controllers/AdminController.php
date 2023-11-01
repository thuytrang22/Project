<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Drink;

class AdminController extends Controller
{
    public function dashboard()
    {
        // $countDish = Dish::count();
        // $countDrink = Drink::count();, compact('countDish', 'countDrink')
        return view('admins.dashboards.dashboard');
    }

}
