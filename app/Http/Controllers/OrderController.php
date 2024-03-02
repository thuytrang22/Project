<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Home;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Menu;
use App\Models\OrderMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Home $infor)
    {
        $keywords = $request->input('keywords');
        $sortBy = $request->input('sortBy', 'id');
        $sortDirection = $request->input('sortDirection', 'desc');
    
        $query = Order::with('infor')->orderBy($sortBy, $sortDirection);
    
        if (!empty($keywords)) {
            $query->where(function ($query) use ($keywords) {
                $query->where('name', 'like', '%' . $keywords . '%');
            });
        }
    
        $orders = $query->paginate(5);
        return view('admins.orders.index', compact('orders', 'keywords', 'sortBy', 'sortDirection', 'infor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $menusData = $request->input('menus');

        $orderData = [
            'infor_id' => 1,
            'payment_type_id' => 0,
        ];

        $order = Order::create($orderData);

        foreach ($menusData as $menuId => $amount) {
            $orderMenuData = [
                'order_id' => $order->id,
                'menu_id' => $menuId,
                'amount' => $amount,
                'can_serve' => 1,
                'actual_amount' => 0,
            ];
            OrderMenu::create($orderMenuData);
        }

        $dishs = DB::table('menus')->where('id_category', '=', 1)->get();
        $drinks = DB::table('menus')->where('id_category', '=', 2)->get();
        $allMores = DB::table('menus')->get();
        return view('homes.order', compact('dishs', 'drinks', 'allMores'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::with(['orderMenus', 'orderMenus.menu', 'infor'])->findOrFail($id);

        return view('admins.orders.detail', ['order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
