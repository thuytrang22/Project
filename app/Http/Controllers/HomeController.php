<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HomeRequest;
use App\Models\Home;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index($table)
    {
        return view('homes.index',  [
            'table' => $table
        ]);
    }

    public function infor(HomeRequest $request)
    {
        $data = [
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'table_number' => $request->input('table_number'),
        ];
        Home::create($data);
        $table = $data["table_number"];
        return redirect()->route('order', ['table' => $table])->with('infor', 'success');
    }

    public function order()
    {        
        // $userAgent = $_SERVER['HTTP_USER_AGENT'];

        // if (strpos($userAgent, 'Mobile') !== false || strpos($userAgent, 'Android') !== false) {
        //     // Thiết bị di động
        //     echo "Điện thoại di động";
        // } else {
        //     // Máy tính
        //     // var_dump( "Máy tính");die;
        //     echo "Máy tính";
        // }
        $dishs = DB::table('menus')->where('option', '=', 1)->get();
        $drinks = DB::table('menus')->where('option', '=', 2)->get();
        $allMores = DB::table('menus')->where('option', '=', 3)->get();
        return view('homes.order', compact('dishs', 'drinks', 'allMores'));
    }
}
