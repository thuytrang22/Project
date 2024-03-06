@extends('.layouts.admin')
@section('content')

@if ( session('store'))
<div id="store" class="alert alert-success alert-dismissible fade show mt-2" role="alert">
  Thêm thành công!!!
</div>
@endif

@if ( session('update'))
<div id="update" class="alert alert-success alert-dismissible fade show mt-2" role="alert">
  Sửa thành công!!!
</div>
@endif

@if ( session('destroy'))
<div id="destroy" class="alert alert-success alert-dismissible fade show mt-2" role="alert">
  Xóa thành công
</div>
@endif

@if (!isset($keywords))
{{$keywords = ''}}
@endif

<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Kho Thực Phẩm</li>
    </ul>
  </div>
</section>

<section class="section main-section" style="padding-bottom: 60px !important;">
  <div class="card has-table">
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><i class="mdi mdi-buffer"></i></span>
        Tổng Danh Sách Nhập Kho
      </p>
      <a href="{{ url()->full() }}" class="card-header-icon">
        <span class="icon"><i class="mdi mdi-reload"></i></span>
      </a>
    </header>
    <div class="card-body">
      <div class="row justify-content-between" style="padding: 10px">
        <div class="flex gap-10" style="padding-bottom: 10px">
          <a class="button blue" href="{{route('warehouses')}}">
            Quay lại
          </a>

          <!-- feature search -->
          <form action="?" class="col-auto ms-auto navbar-end">
            <div class="input-group">
              <input type="text" name="keywords" class="form-control" placeholder="Tìm kiếm ..." value="{{$keywords}}" />
              <button type="submit" class="button green">Tìm Kiếm</button>
            </div>
          </form>
        </div>
        <a class="button blue" href="{{route('warehouses.create', ['type' => 1])}}">
          Thêm mới
        </a>
        <a href="{{ route('warehouses.export.input', ['keywords' => $keywords]) }}" class="button blue">
          Xuất Excel
        </a>
        <div style="float: right;">
          <form action="{{ route('warehouses.import.input') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="importWarehouse">
            <button type="submit" class="button blue">Nhập Excel</button>
          </form>
        </div>
      </div>
      <div class="card-content">
        <table>
          <thead>
            <tr class="text-center table-active">
              <th>
                <a class="flex content-center items-center" href="{{ route('warehouses.import.list', ['sortBy' => 'id', 'sortDirection' => ($sortDirection == 'asc' && $sortBy == 'id') ? 'desc' : 'asc']) }}">
                  STT
                  <div class="sort">
                    <div class="arrow-up"></div>
                    <div class="arrow-down"></div>
                  </div>
                </a>
              </th>
              <th>Tên Thực Phẩm</th>
              <th>Số Lượng</th>
              <th>Đơn Vị</th>
              <th>Đơn Giá</th>
              <th>Ngày</th>
              <th width="280px">Hành Động</th>
            </tr>
          </thead>
          <tbody>
            @if(count($warehouses) > 0)
            @foreach($warehouses as $mwarehouse)
            <tr class="text-center">
              <td>{{$mwarehouse->id}}</td>
              <td>{{$mwarehouse->name}}</td>
              <td>{{$mwarehouse->quantity}}</td>
              <td>{{$mwarehouse->measure}}</td>
              <td>{{number_format($mwarehouse->price)}}</td>
              <td>{{date('d/m/Y', strtotime($mwarehouse->created_at))}}</td>
              <td>
                <div class="flex gap-10">
                  <!-- feature update -->
                  <a class="btn btn-icon btn-outline-warning btnEdit" href="{{route('warehouses.edit', ['id' => $mwarehouse->id, 'type' => 1])}}">
                    <img src="/images/editing.png" alt="">
                  </a>

                  <!-- feature delete -->
                  <form method="POST" action="{{ route('warehouses.destroy', ['id' => $mwarehouse->id, 'type' => 1])}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-warning btn-icon">
                      <img src="/images/delete.png" alt="">
                    </button>
                  </form>
                </div>
              </td>
            </tr>
            @endforeach
            @else
            <tr>
              <td colspan="7" class="text-center">Không có thực phẩm nào.</td>
            </tr>
            @endif
          </tbody>
        </table>
        <!-- pagination -->
        <ul class="pagination flex float-right">
          <li class="page-item {{ ($warehouses->currentPage() == 1) ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $warehouses->appends(['keywords' => $keywords])->url(1) }}"><span aria-hidden="true">&laquo;</span></a>
          </li>
          @for ($i = 1; $i <= $warehouses->lastPage(); $i++)
            <li class="page-item {{ ($warehouses->currentPage() == $i) ? 'active' : '' }}">
              <a class="page-link" href="{{ $warehouses->appends(['keywords' => $keywords])->url($i) }}">{{ $i }}</a>
            </li>
            @endfor
            <li class="page-item {{ ($warehouses->currentPage() == $warehouses->lastPage()) ? 'disabled' : '' }}">
              <a class="page-link" href="{{ $warehouses->url($warehouses->appends(['keywords' => $keywords])->lastPage()) }}"><span aria-hidden="true">&raquo;</span></a>
            </li>
        </ul>
      </div>
</section>
@endsection