@extends('.layouts.admin')
@section('content')

@if ( session('store'))
  <div id="store" class="alert alert-success alert-dismissible fade show mt-2" role="alert">
    Thêm danh mục thành công!!!
  </div>
@endif

@if ( session('update'))
  <div id="update" class="alert alert-success alert-dismissible fade show mt-2" role="alert">
    Sửa danh mục thành công!!!
  </div>
@endif

@if ( session('destroy'))
  <div id="destroy" class="alert alert-success alert-dismissible fade show mt-2" role="alert">
    Xóa danh mục thành công!!!
  </div>
@endif

<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Đặt Bàn</li>
    </ul>
  </div>
</section>

  <section class="section main-section" style="padding-bottom: 60px !important;">
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-buffer"></i></span>
          Danh Sách Đặt Bàn
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
                    <input type="text" name="keywords" class="form-control" placeholder="Tìm kiếm danh mục..." />
                    <button type="submit" class="button green">Tìm Kiếm </button>
                </div>
            </form>
    </div></div>
      <div class="card-content">
        <table>
          <thead>
          <tr class="text-center table-active">
                <th>
                    <a class="flex content-center items-center" href="{{ route('seatings', ['sortBy' => 'id', 'sortDirection' => ($sortDirection == 'asc' && $sortBy == 'id') ? 'desc' : 'asc']) }}">
                        STT
                        <div class="sort">
                            <div class="arrow-up"></div>
                            <div class="arrow-down"></div>
                        </div>
                    </a>
                </th>
                <th>Tên Danh Mục</th>
                <th>Email</th>
                <th>Số Điện Thoại</th>
                <th>Ngày Đặt Bàn</th>
                <th>Thời Gian</th>
                <th>Số Lượng Người</th>
                <th>Tin Nhắn</th>
                <!-- <th width="200px">Hành Động</th> -->
            </tr>
          </thead>
          <tbody>
            @if(count($bookings) > 0)
            @foreach($bookings as $booking)
            <tr class="text-center">
                <td>{{$booking->id}}</td>
                <td>{{$booking->name}}</td>
                <td>{{$booking->email}}</td>
                <td>{{$booking->phone}}</td>
                <td>{{$booking->booking_date}}</td>
                <td>{{$booking->time}}</td>
                <td>{{$booking->people}}</td>
                <td>{{$booking->message}}</td>
                <!-- <td>
                    <div class="flex gap-10 justify-center">
                    </div>
                </td> -->
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
    <li class="page-item {{ ($bookings->currentPage() == 1) ? 'disabled' : '' }}">
        <a class="page-link" href="{{ $bookings->url(1) }}"><span aria-hidden="true">&laquo;</span></a>
    </li>
    @for ($i = 1; $i <= $bookings->lastPage(); $i++)
        <li class="page-item {{ ($bookings->currentPage() == $i) ? 'active' : '' }}">
            <a class="page-link" href="{{ $bookings->url($i) }}">{{ $i }}</a>
        </li>
        @endfor
        <li class="page-item {{ ($bookings->currentPage() == $bookings->lastPage()) ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $bookings->url($bookings->lastPage()) }}"><span aria-hidden="true">&raquo;</span></a>
        </li>
</ul>
    </div>

  </section>

  @endsection