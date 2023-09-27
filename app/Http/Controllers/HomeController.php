<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('homes.index');
    }

    public function order()
    {
        return view('homes.order');
    }
}
