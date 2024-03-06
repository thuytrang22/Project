@extends('.layouts.admin')
@section('content')
@php
    $canServe = [
        1 => 'Có',
        2 => 'Không'
    ];
@endphp
<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Đơn hàng</li>
    </ul>
  </div>
</section>
<section class="section main-section" style="padding-bottom: 60px !important;">
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-buffer"></i></span>
          Danh sách đơn hàng
        </p>
        <a href="{{ url()->full() }}" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-reload"></i></span>
        </a>
      </header>
<div class="card-header d-flex justify-content-between">
    <h4 class="modal-title">Chi tiết đơn hàng</h4> 
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
            <th>Có thể phục vụ</th>
            <th>Ngày</th>
            <th width="280px">Hành Động</th>
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
                <td>{{$canServe[$orderMenu->can_serve]}}</td>
                <td>{{date('d/m/Y', strtotime($orderMenu->created_at))}}</td>
                <td>
                    <div class="flex justify-center gap-10">
                        <!-- feature delete -->
                        <form method="POST" action="{{ route('orderMenus.destroy', ['id' => $orderMenu->id, 'orderId' => $orderMenu->order_id])}}" class="flex justify-center">
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
                <td colspan="7" class="text-center">Không có dữ liệu</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
</section>
@endsection