<?php

namespace App\Http\Controllers;

use App\Models\OrderMenu;
use App\Http\Requests\StoreOrderMenuRequest;
use App\Http\Requests\UpdateOrderMenuRequest;
use Illuminate\Support\Facades\DB;

class OrderMenuController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $orderId)
    {
        $orderMenu = OrderMenu::find($id);
        if ($orderMenu) {
            $result = $orderMenu->delete();
            if ($result) {
                $message = 'Xóa thành công';
            } else {
                $message = 'Xóa không thành công';
            }
        } else {
            $message = 'Không tìm thấy món trong đơn hàng!';
        }

        return redirect()->route('order.show', ['id' => $orderId])->with('destroy', $message);
    }
}
