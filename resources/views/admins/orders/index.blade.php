@extends('.layouts.admin')
@section('content')

@if ( session('store'))
<div id="store" class="alert alert-success alert-dismissible fade show mt-2" role="alert">
  Added category successfully!!!
</div>
@endif

@if ( session('update'))
<div id="update" class="alert alert-success alert-dismissible fade show mt-2" role="alert">
  Edited list successfully!!!
</div>
@endif

@if ( session('destroy'))
<div id="destroy" class="alert alert-success alert-dismissible fade show mt-2" role="alert">
  {{session('destroy')}}
</div>
@endif

@if (session('error'))
<div id="error" class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
  {{session('error')}}
</div>
@endif

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
    <div class="card-body">
      <div class="row justify-content-between">
        <div class="flex gap-10" style="padding: 10px">
          <a class="button blue" href="{{route('payment.list')}}">
            Quản lý thanh toán
          </a>
          <!-- feature search -->
          <form action="?" class="col-auto ms-auto navbar-end">
            <div class="input-group">
              <input type="text" name="keywords" class="form-control" placeholder="Tìm kiếm khách hàng..." value="{{$keywords}}"/>
              <button type="submit" class="button green">Tìm kiếm</button>
            </div>
          </form>
        </div>
      </div>
      <div class="card-content">
        <table>
          <thead>
            <tr class="text-center table-active">
              <th>
                <a class="flex content-center items-center" href="{{ route('order.list', ['sortBy' => 'id', 'sortDirection' => ($sortDirection == 'asc' && $sortBy == 'id') ? 'desc' : 'asc']) }}">
                  STT
                  <div class="sort">
                    <div class="arrow-up"></div>
                    <div class="arrow-down"></div>
                  </div>
                </a>
              </th>
              <th>Tên Khách Hàng</th>
              <th>Số Điện Thoại</th>
              <th>Số Bàn</th>
              <th>Thời Gian</th>
              <th>Thanh Toán</th>
              <th width="200px">Hành Động</th>
            </tr>
          </thead>
          <tbody>
            @if(count($orders) > 0)
            @foreach($orders as $order )
            <tr class="text-center">
              <td>{{$order->id}}</td>
              <td>{{$order->name}}</td>
              <td>{{$order->phone}}</td>
              <td>{{$order->table_number}}</td>
              <td>{{date('d/m/Y', strtotime($order->created_at))}}</td>
              <td>
                <form>
                  @csrf
                  <select name="name" class="paymentType" data-payment-id="{{$order->id}}">
                      <option value="Chọn bàn">Chọn phương thức</option>
                        @foreach($paymentType as $payment)
                            @if($order->payment_type_id == $payment->name)
                                <option value="{{$payment->id}}" selected>{{$payment->name}}</option>
                            @elseif($order->payment_type_id != $payment->name)
                                <option value="{{$payment->id}}">{{$payment->name}}</option>
                            @endif
                        @endforeach
                  </select>
                </form>
              </td>
              <td>
                <div class="flex justify-center gap-10">
                  <!-- feature detail -->
                  <a class="flex justify-center btn btn-icon btn-outline-warning btnEdit"
                  data-bs-toggle="tooltip" data-bs-placement="top"  title="Xem chi tiết đơn hàng"
                  href="{{ route('order.show', ['id' => $order->id]) }}">
                    <img src="/images/eye.png" alt="Chi tiết">
                  </a>

                  <form action="{{ route('bills.store') }}" method="POST" class="card mt-3" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                    <button type="submit" class="flex justify-center btn btn-icon btn-outline-warning btnEdit"
                    data-bs-toggle="tooltip" data-bs-placement="top"  title="Thanh toán thẻ">
                      <img src="/images/pay-card.png" alt="Thanh toán">
                    </button>
                  </form>

                  <!-- feature delete -->
                  <form method="POST" action="{{ route('order.destroy', ['id' => $order->id])}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="flex justify-center btn btn-outline-warning btn-icon"
                    data-bs-toggle="tooltip" data-bs-placement="top"  title="Xác nhập xóa">
                      <img src="/images/delete.png" alt="Xóa">
                    </button>
                  </form>
                </div>
              </td>
            </tr>
            @endforeach
            @else
            <tr>
              <td colspan="7" class="text-center">Không có dữ liệu.</td>
            </tr>
            @endif
          </tbody>
        </table>

        <!-- pagination -->
        <ul class="pagination flex float-right">
          <li class="page-item {{ ($orders->currentPage() == 1) ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $orders->appends(['keywords' => $keywords])->url(1) }}"><span aria-hidden="true">&laquo;</span></a>
          </li>
          @for ($i = 1; $i <= $orders->lastPage(); $i++)
            <li class="page-item {{ ($orders->currentPage() == $i) ? 'active' : '' }}">
              <a class="page-link" href="{{ $orders->appends(['keywords' => $keywords])->url($i) }}">{{ $i }}</a>
            </li>
            @endfor
            <li class="page-item {{ ($orders->currentPage() == $orders->lastPage()) ? 'disabled' : '' }}">
              <a class="page-link" href="{{ $orders->appends(['keywords' => $keywords])->url($orders->lastPage()) }}"><span aria-hidden="true">&raquo;</span></a>
            </li>
        </ul>
      </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function () {
$('.paymentType').change(function () {
  var orderid = $(this).data('payment-id');
  var paymentId = $(this).val();
  if (paymentId) {
      $.ajax({
          url: '/admin/payment/update-payment',
          method: 'POST',
          data: {
              _token: '{{ csrf_token() }}',
              id: orderid,
              payment_type_id: paymentId
          },
          success: function (response) {
            alert('Dữ liệu đã được cập nhật thành công');
          },
          error: function (xhr, status, error) {
              console.error(xhr.responseText);
          }
      });
  }
  });

  
});
</script>
@endsection