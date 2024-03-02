@extends('.layouts.master')
@section('content')

<div class="card-header d-flex justify-content-between">
    <h4 class="modal-title">Chi tiết thực đơn</h4> 
    <a class="btn btn-outline-warning" href="{{ route('order.list') }}">Trở về</a>
</div>
<div class="card-body">
    <div>
        <p>Bàn: {{ $order->infor->table_number }}</p>
        <p>Tên khách hàng: {{ $order->infor->name }}</p>
        <p>Số điện thoại: {{ $order->infor->phone }}</p>
    </div>
    <table>
        <thead>
        <tr class="table-active">
            <th>STT</th>
            <th>Tên Món Ăn</th>
            <th>Hình Ảnh</th>
            <th>Số lượng</th>
            <th>Số Bàn</th>
            <th>Ngày</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
            @if(!empty($order))
            @foreach($order->orderMenus as $key => $orderMenu)
            <tr class="text-center">
                <td>{{ $key + 1 }}</td>
                <td>{{$orderMenu->menu->name}}</td>
                <td>
                    <div class="img-table">
                        @if ($orderMenu->menu->public)
                            <img src="{{ asset('storage/' .substr($orderMenu->menu->public, 7)) }}" alt="Hình ảnh">
                        @endif
                    </div>
                </td>
                <td>{{$orderMenu->amount}}</td>
                <td>{{$orderMenu->status}}</td>
                <td>{{date('d/m/Y', strtotime($orderMenu->created_at))}}</td>
                <td>
                    <div class="flex gap-10">
                        <!-- feature update -->
                        <a class="btn btn-icon btn-outline-warning btnEdit" href="{{ route('order.show', ['id' => $order->id]) }}">
                            <img src="/images/editing.png" alt="Chỉnh sửa">
                        </a>

                        <!-- feature delete -->
                        <form method="POST" action="{{ route('order.destroy', ['id' => $order->id])}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-warning btn-icon">
                                <img src="/images/delete.png" alt="Xóa">
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="7" class="text-center">There are no order</td>
            </tr>
            @endif
        </tbody>
    </table>
    @foreach($order->orderMenus as $menu)
    @endforeach
</div>
@endsection