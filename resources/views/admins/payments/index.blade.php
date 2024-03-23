@extends('.layouts.admin')
@section('content')

@if ( session('store'))
<div id="store" class="alert alert-success alert-dismissible fade show mt-2" role="alert">
  Thêm danh mục thành công!!!
</div>
@endif

@if ( session('update'))
<div id="update" class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
  Sửa danh mục thành công!!!
</div>
@endif

@if ( session('destroy'))
<div id="destroy" class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
  Xóa danh mục thành công!!!
</div>
@endif

<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Đơn Hàng</li>
      <li>Phương Thức Thanh Toán</li>
    </ul>
  </div>
</section>

<section class="section main-section" style="padding-bottom: 60px !important;">
  <div class="card has-table">
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><i class="mdi mdi-buffer"></i></span>
        Danh Sách Phương Thức Thanh Toán
      </p>
      <a href="{{ url()->full() }}" class="card-header-icon">
        <span class="icon"><i class="mdi mdi-reload"></i></span>
      </a>
    </header>
    <div class="card-body">
      <div class="row justify-content-between">
        <div class="flex" style="padding: 10px">
            <a class="button blue" style="margin-right: 10px;" href="{{route('order.list')}}">
                Quay lại
            </a>
          <!-- feature create -->
          <a class="button blue" href="{{route('payment.create')}}">
            Thêm phương thức
          </a>
          <!-- feature search -->
          <form action="?" class="col-auto ms-auto navbar-end">
            <div class="input-group">
              <input type="text" name="keywords" class="form-control" placeholder="Tìm kiếm phương thức..." value="{{$keywords}}"/>
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
                <a class="flex content-center items-center" href="{{ route('payment.list', ['sortBy' => 'id', 'sortDirection' => ($sortDirection == 'asc' && $sortBy == 'id') ? 'desc' : 'asc']) }}">
                  STT
                  <div class="sort">
                    <div class="arrow-up"></div>
                    <div class="arrow-down"></div>
                  </div>
                </a>
              </th>
              <th>Tên Phương Thức</th>
              <th width="200px">Hành Động</th>
            </tr>
          </thead>
          <tbody>
            @if(count($paymentTypes) > 0)
            @foreach($paymentTypes as $payment)
            <tr class="text-center">
              <td>{{$payment->id}}</td>
              <td>{{$payment->name}}</td>
              <td>
                <div class="flex gap-10 justify-center">

                  <!-- feature update -->
                  <a class="flex justify-center btn btn-icon btn-outline-warning btnEdit" href="{{route('payment.edit',$payment->id)}}">
                    <img src="/images/editing.png" alt="">
                  </a>

                  <!-- feature delete -->
                  <form method="POST" action="{{ route('payment.destroy', ['id' => $payment->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="flex justify-center btn btn-outline-warning btn-icon">
                      <img src="/images/delete.png" alt="">
                    </button>
                  </form>
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
          <li class="page-item {{ ($paymentTypes->currentPage() == 1) ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $paymentTypes->appends(['keywords' => $keywords])->url(1) }}"><span aria-hidden="true">&laquo;</span></a>
          </li>
          @for ($i = 1; $i <= $paymentTypes->lastPage(); $i++)
            <li class="page-item {{ ($paymentTypes->currentPage() == $i) ? 'active' : '' }}">
              <a class="page-link" href="{{ $paymentTypes->appends(['keywords' => $keywords])->url($i) }}">{{ $i }}</a>
            </li>
            @endfor
            <li class="page-item {{ ($paymentTypes->currentPage() == $paymentTypes->lastPage()) ? 'disabled' : '' }}">
              <a class="page-link" href="{{ $paymentTypes->appends(['keywords' => $keywords])->url($paymentTypes->lastPage()) }}"><span aria-hidden="true">&raquo;</span></a>
            </li>
        </ul>
      </div>
</section>
@endsection