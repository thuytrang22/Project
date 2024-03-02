<?php

namespace App\Http\Controllers;

use App\Models\OrderMenu;
use App\Http\Requests\StoreOrderMenuRequest;
use App\Http\Requests\UpdateOrderMenuRequest;

class OrderMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreOrderMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderMenuRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderMenu  $orderMenu
     * @return \Illuminate\Http\Response
     */
    public function show(OrderMenu $orderMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderMenu  $orderMenu
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderMenu $orderMenu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderMenuRequest  $request
     * @param  \App\Models\OrderMenu  $orderMenu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderMenuRequest $request, OrderMenu $orderMenu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderMenu  $orderMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderMenu $orderMenu)
    {
        //
    }
}
