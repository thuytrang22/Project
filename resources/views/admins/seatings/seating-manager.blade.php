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
      <li>Quản Lý Bàn</li>
    </ul>
  </div>
</section>

<section class="section main-section" style="padding-bottom: 60px !important;">
  <div class="card has-table">
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><i class="mdi mdi-buffer"></i></span>
        Quản Lý Bàn
      </p>
      <a href="{{ url()->full() }}" class="card-header-icon">
        <span class="icon"><i class="mdi mdi-reload"></i></span>
      </a>
    </header>
    <div class="card-body">
      <div class="row justify-content-between">
        <div class="flex" style="padding: 10px">
          <a class="button blue" style="margin-right: 5px;" href="{{ route('seatings') }}">Quay lại</a>
          <a class="button blue" href="{{ route('seating.create') }}">
            Thêm mới
          </a>
          <!-- feature search -->
          <form action="?" class="col-auto ms-auto navbar-end">
            <div class="input-group">
              <input type="text" name="keywords" class="form-control" placeholder="Tìm kiếm danh mục..." value="{{$keywords}}"/>
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
                <a class="flex content-center items-center" href="{{ route('seating.manager', ['sortBy' => 'id', 'sortDirection' => ($sortDirection == 'asc' && $sortBy == 'id') ? 'desc' : 'asc']) }}">
                  STT
                  <div class="sort">
                    <div class="arrow-up"></div>
                    <div class="arrow-down"></div>
                  </div>
                </a>
              </th>
              <th>Tên Bàn</th>
              <th>Bàn Trống</th>
              <th>Đã Đặt</th>
              <th>Đang sử dụng</th>
              <th width="200px">Hành Động</th>
            </tr>
          </thead>
          <tbody>
            @if(count($seatings) > 0)
            @foreach($seatings as $seating)
            <tr class="text-center">
              <td>{{$seating->id}}</td>
              <td>{{$seating->table_number}}</td>
              <td>{{$seating->empty_table ? 'o' : '-'}}</td>
              <td>{{$seating->pending ? 'o' : '-'}}</td>
              <td>{{$seating->working ? 'o' : '-'}}</td>
              <td>
                <div class="flex gap-10 justify-center">
                  <!-- feature update -->
                  <a class="flex justify-center btn btn-icon btn-outline-warning btnEdit" href="{{route('seating.edit', $seating->id)}}">
                    <img src="/images/editing.png" alt="">
                  </a>
                  <form method="POST" action="{{ route('seating.destroy', ['id' => $seating->id])}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="flex justify-center btn btn-outline-warning btn-icon">
                      <img src="/images/delete.png" alt="Xóa">
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
          <li class="page-item {{ ($seatings->currentPage() == 1) ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $seatings->appends(['keywords' => $keywords])->url(1) }}"><span aria-hidden="true">&laquo;</span></a>
          </li>
          @for ($i = 1; $i <= $seatings->lastPage(); $i++)
            <li class="page-item {{ ($seatings->currentPage() == $i) ? 'active' : '' }}">
              <a class="page-link" href="{{ $seatings->appends(['keywords' => $keywords])->url($i) }}">{{ $i }}</a>
            </li>
            @endfor
            <li class="page-item {{ ($seatings->currentPage() == $seatings->lastPage()) ? 'disabled' : '' }}">
              <a class="page-link" href="{{ $seatings->appends(['keywords' => $keywords])->url($seatings->lastPage()) }}"><span aria-hidden="true">&raquo;</span></a>
            </li>
        </ul>
      </div>
</section>
@endsection