@extends('.layouts.admin')
@section('content')

@if ( session('store'))
<div id="store" class="alert alert-success alert-dismissible fade show mt-2" role="alert">
  Tạo hóa đơn thành công!!!
</div>
@endif

@if ( session('update'))
<div id="update" class="alert alert-success alert-dismissible fade show mt-2" role="alert">
  Thanh toán thành công!!!
</div>
@endif

@if ( session('destroy'))
<div id="destroy" class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
  Xóa hóa đơn thành công!!!
</div>
@endif

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

<section class="section main-section" style="padding-bottom: 60px !important;">
  <div class="card has-table">
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><i class="mdi mdi-buffer"></i></span>
        Danh Sách Hóa Đơn
      </p>
      <a href="{{ url()->full() }}" class="card-header-icon">
        <span class="icon"><i class="mdi mdi-reload"></i></span>
      </a>
    </header>
    <div class="card-body">
      <div class="row justify-content-between">
        <div class="flex" style="padding: 10px">
          <!-- feature search -->
          <form action="?" class="col-auto ms-auto navbar-end">
            <div class="input-group">
              <input type="text" name="keywords" class="form-control" placeholder="Tìm kiếm khách hàng..." />
              <button type="submit" class="button green">Tìm Kiếm </button>
            </div>
          </form>
        </div>
      </div>
      <div class="card-content">
        <table>
          <thead>
            <tr class="text-center table-active">
              <th>
                <a class="flex content-center items-center" href="{{ route('bills.list', ['sortBy' => 'id', 'sortDirection' => ($sortDirection == 'asc' && $sortBy == 'id') ? 'desc' : 'asc']) }}">
                  STT
                  <div class="sort">
                    <div class="arrow-up"></div>
                    <div class="arrow-down"></div>
                  </div>
                </a>
              </th>
              <th>Bàn</th>
              <th>Tên Khách Hàng</th>
              <th>Tổng hóa đơn</th>
              <th>Trạng thái</th>
              <th width="280px">Hành Động</th>
            </tr>
          </thead>
          <tbody>
            @if(count($bills) > 0)
            @foreach($bills as $bill)
            <tr class="text-center">
              <td>{{$bill->id}}</td>
              <td>{{$bill->table_number}}</td>
              <td>{{$bill->name}}</td>
              <td>{{number_format($bill->total_order)}}đ</td>
              <td>{{$statuses[$bill->status]}}</td>
              <td>
                <div class="flex gap-10 justify-center">
                  <!-- feature show -->
                  <a class="flex justify-center btn btn-icon btn-outline-warning" href="{{ route('bills.show', ['id' => $bill->id]) }}">
                    <img src="/images/menu.png" alt="">
                  </a>

                  @if($bill->status == 0)
                  <!-- feature update -->
                  <a class="flex justify-center btn btn-icon btn-outline-warning btnEdit" href="{{route('bills.payment', ['id' => $bill->id])}}">
                    <img src="/images/pay.png" alt="Thanh Toán">
                  </a>
                  @else
                  <a class="flex justify-center btn btn-icon btn-outline-warning btnEdit" href="{{route('bills.print', ['id' => $bill->id])}}" target="_blank">
                    <img src="/images/check-list.png" alt="In Hóa Đơn">
                  </a>
                  @endif
                </div>
              </td>
            </tr>
            @endforeach
            @else
            <tr>
              <td colspan="7" class="text-center">Không có danh mục nào.</td>
            </tr>
            @endif
          </tbody>
        </table>
        <!-- pagination -->
        <ul class="pagination flex float-right">
          <li class="page-item {{ ($bills->currentPage() == 1) ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $bills->url(1) }}"><span aria-hidden="true">&laquo;</span></a>
          </li>
          @for ($i = 1; $i <= $bills->lastPage(); $i++)
            <li class="page-item {{ ($bills->currentPage() == $i) ? 'active' : '' }}">
              <a class="page-link" href="{{ $bills->url($i) }}">{{ $i }}</a>
            </li>
            @endfor
            <li class="page-item {{ ($bills->currentPage() == $bills->lastPage()) ? 'disabled' : '' }}">
              <a class="page-link" href="{{ $bills->url($bills->lastPage()) }}"><span aria-hidden="true">&raquo;</span></a>
            </li>
        </ul>
      </div>

</section>

@endsection