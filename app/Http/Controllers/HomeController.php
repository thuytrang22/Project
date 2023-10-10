<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HomeRequest;
use App\Models\Home;
use App\Http\Model;

class HomeController extends Controller
{
    public function index()
    {
        return view('homes.index');
    }

    public function infor(HomeRequest $request)
    {
        Home::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'table_number' => $request->input('table_number'),
        ]);
    
        return redirect()->route('order')->with('infor', 'success');
    
    }

    public function order()
    {
        return view('homes.order');
    }
}
