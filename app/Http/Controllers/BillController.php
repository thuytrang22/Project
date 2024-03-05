<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Http\Requests\StoreBillRequest;
use App\Http\Requests\UpdateBillRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class BillController extends Controller
{
    const BILL_STATUS_NONE = 0;
    const BILL_STATUS_DONE = 1;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keywords = $request->input('keywords');
        $sortBy = $request->input('sortBy', 'id');
        $sortDirection = $request->input('sortDirection', 'desc');
    
        $query = Bill::with(['order', 'order.infor'])->orderBy($sortBy, $sortDirection);
    
        if (!empty($keywords)) {
            $query->where(function ($query) use ($keywords) {
                $query->where('name', 'like', '%' . $keywords . '%');
            });
        }
    
        $bills = $query->paginate(6);
        return view ('admins.bills.index', compact('bills', 'keywords', 'sortBy', 'sortDirection'));
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
     * @param  \App\Http\Requests\StoreBillRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBillRequest $request)
    {
        $orderId = $request->input('order_id');
        $order = Order::with(['orderMenus', 'orderMenus.menu', 'infor'])->findOrFail($orderId);
        $bills = Bill::where('order_id',$orderId )->get();
        if (!empty($bills)) {
            return redirect()->route('order.list')->with('error', 'Đơn hàng đã được tạo hóa đơn!');
        }
        $total = 0;
        foreach ($order->orderMenus as $orderMenu) {
            $total += ($orderMenu->amount * $orderMenu->menu->price);
        }

        $data = [
            'order_id' => $orderId,
            'status' => self::BILL_STATUS_NONE,
            'total_order' => $total,
        ];
        $bill = Bill::create($data);

        return redirect()->route('bills.show', ['id' => $bill->id])->with('store', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill = Bill::with(['order', 'order.infor', 'order.orderMenus'])->findOrFail($id);

        return view('admins.bills.detail', ['bill' => $bill]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBillRequest  $request
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBillRequest $request, Bill $bill)
    {
        $bill = Bill::find($request->id);
        $bill->status = $request->status;
        $bill->save();

        return redirect()->route('bills.list')->with('update', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {
        //
    }

    public function payment($id)
    {
        $bill = Bill::with(['order', 'order.infor', 'order.orderMenus'])->findOrFail($id);

        return view('admins.bills.payment', [
            'bill' => $bill
        ]);
    }

    public function print($id)
    {
        $bill = Bill::with(['order', 'order.infor', 'order.orderMenus'])->findOrFail($id);

        return view('admins.bills.print', [
            'bill' => $bill
        ]);
    }
}
