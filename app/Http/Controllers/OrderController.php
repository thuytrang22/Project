<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Home;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Bill;
use App\Models\Infor;
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

        $query = DB::table('orders')
            ->join('infor', 'infor.id', '=', 'orders.infor_id')
            ->select('orders.*', 'infor.name', 'infor.phone', 'infor.table_number')
            ->whereNull('orders.deleted_at')
            ->orderBy($sortBy, $sortDirection);

        if (!empty($keywords)) {
            $query->where('infor.name', 'like', '%' . $keywords . '%');
        }

        $orders = $query->paginate(5);
        return view('admins.orders.index', compact('orders', 'keywords', 'sortBy', 'sortDirection', 'infor'));
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
        $inforId = $request->input('infor_id');

        $orderData = [
            'infor_id' => $inforId,
            'payment_type_id' => 0,
        ];
        if($inforId) {
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
    }
        $seating = Infor::find(24);
        $seating->table_number;
        
        $dishs = DB::table('menus')->where('id_category', '=', 1)->get();
        $drinks = DB::table('menus')->where('id_category', '=', 2)->get();
        $allMores = DB::table('menus')->get();
        return redirect()->route('order', ['table' => $seating->table_number])->with('store', $allMores, $drinks, $dishs);
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
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        $order = Order::find($id);
        if ($order) {
            $result = $order->delete();
            if ($result) {
                $bill = Bill::where('order_id', $id)->first();
                if ($bill) {
                    $result = $bill->delete();
                    if ($result) {
                        $message = 'Xóa thành công';
                    } else {
                        $message = 'Xóa không thành công';
                        DB::rollBack();
                    }
                }
            } else {
                $message = 'Xóa không thành công';
            }
        } else {
            $message = 'Không tìm thấy đơn hàng!';
        }
        DB::commit();

        return redirect()->route('order.list')->with('destroy', $message);
    }
}
