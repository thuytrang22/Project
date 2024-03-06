@extends('.layouts.admin')
@section('content')
@php
    $statuses = [
        0 => 'Chưa thanh toán',
        1 => 'Đã thanh toán'
    ];
@endphp
<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Hóa Đơn</li>
    </ul>
  </div>
</section>
<div class="card-header d-flex justify-content-between">
    <h4 class="modal-title">Chi tiết hóa đơn</h4> 
    <a class="btn btn-outline-warning" href="{{ route('bills.list') }}">Quay lại</a>
</div>
<div class="card-body">
    <p><b>ID :</b>{{$bill->id}}</p>
    <p><b>Khách Hàng :</b> {{$bill->order->infor->name}}</p>
    <p><b>Bàn :</b> {{$bill->order->infor->table_number}}</p>
    <p><b>Tổng Thanh Toán :</b> {{number_format($bill->total_order)}}đ</p>
    <p><b>Trạng Thái :</b> {{$statuses[$bill->status]}}</p>
    <table style="border-collapse: collapse; width: 100%; border-spacing: 0; border-color: #fff;">
        <thead>
        <tr class="table-active">
            <th>STT</th>
            <th>Tên Món Ăn</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Ngày</th>
        </tr>
        </thead>
        <tbody>
            @if(!empty($bill->order))
            @foreach($bill->order->orderMenus as $key => $orderMenu)
            <tr class="text-center">
                <td>{{ $key + 1 }}</td>
                <td>{{$orderMenu->menu->name}}</td>
                <td>{{$orderMenu->amount}}</td>
                <td>{{number_format($orderMenu->menu->price)}}đ</td>
                <td>{{date('d/m/Y', strtotime($orderMenu->created_at))}}</td>
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
<br>
<form method="POST" action="{{ route('bills.update', ['id' => $bill->id, 'status' => 1]) }}">
    @csrf
    @method('PUT')
    <button type="submit" class="button green">
        Thanh Toán
    </button>
</form>
@endsection