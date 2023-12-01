<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HomeRequest;
use App\Models\Home;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('homes.index');
    }

    public function infor(HomeRequest $request)
    {
        $data = [
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'table_number' => $request->input('table_number'),
        ];
        Home::create($data);
        return redirect()->route('order')->with('infor', 'success');
    }

    public function order()
    {
        $dishs = DB::table('menus')->where('option', '=', 1)->get();
        return view('homes.order', compact('dishs'));
    }
}
