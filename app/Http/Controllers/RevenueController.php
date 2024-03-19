<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RevenueController extends Controller
{
    public function index () {
        return view('admins.revenues.index');
    }

    public function revenueList() {
        return view('admins.revenues.revenuelist');
    }
}
