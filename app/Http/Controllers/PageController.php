<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index () {
        $allMores = DB::table('menus')->get();
        return view ('pages.index', compact('allMores'));
    }
}
