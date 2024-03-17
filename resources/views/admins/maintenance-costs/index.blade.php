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
      <li>Doanh Thu</li>
    </ul>
  </div>
</section>

<section class="section main-section" style="padding-bottom: 60px !important;">
  <div class="card has-table">
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><i class="mdi mdi-buffer"></i></span>
        Chi phí vận hành
      </p>
      <a href="{{ url()->full() }}" class="card-header-icon">
        <span class="icon"><i class="mdi mdi-reload"></i></span>
      </a>
    </header>
  </div>
  <div class="card-body">
    <div class="row justify-content-between">
        <div class="row justify-content-between" style="padding: 10px">
          <div class="flex gap-10" style="padding-bottom: 10px">
            <a class="button blue" href="{{route('revenues')}}">
              Quay lại
            </a>
            <!-- feature search -->
            <form action="?" class="col-auto ms-auto navbar-end">
              <div class="input-group">
                <input
                  type="text"
                  name="keywords"
                  class="form-control"
                  placeholder="Tìm kiếm ..."
                  value="{{$keywords}}"
                />
                <button type="submit" class="button green">Tìm Kiếm</button>
              </div>
            </form>
          </div>
          <a class="button blue" href="{{route('maintenance.cost.create')}}">
            Thêm mới
          </a>
          <a href="{{ route('maintenance.cost.export', ['keywords' => $keywords]) }}" class="button blue">
            Xuất Excel
          </a>
          <div style="float: inline-end;">
            <form action="{{ route('maintenance.cost.import') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="file" name="importMaintenance">
              <button type="submit" class="button blue">Nhập Excel</button>
            </form>
          </div>
        </div>
      <div class="card-content">
      <table>
        <thead>
          <tr class="text-center table-active">
            <th>
              <a
                class="flex content-center items-center"
                href="{{ route('warehouses', [
                  'sortBy' => 'name',
                  'sortDirection' => ($sortDirection == 'asc' && $sortBy == 'name') ? 'desc' : 'asc'
                ]) }}"
              > STT
                <div class="sort">
                  <div class="arrow-up"></div>
                  <div class="arrow-down"></div>
                </div>
              </a>
            </th>
            <th>Tên Chi Phí</th>
            <th>Số Tiền</th>
            <th>Loại</th>
            <th>Ngày</th>
            <!-- <th width="280px">Hành Động</th> -->
          </tr>
        </thead>
        <tbody>
          @if(count($maintenanceCosts) > 0)
          @foreach($maintenanceCosts as $key => $maintenanceCost)
          <tr class="text-center">
            <td>{{$key + 1}}</td>
            <td>{{$maintenanceCost->name}}</td>
            <td>{{number_format($maintenanceCost->expense)}}đ</td>
            <td>{{$types[$maintenanceCost->type]}}</td>
            <td>{{date('d/m/Y', strtotime($maintenanceCost->created_at))}}</td>
          </tr>
          @endforeach
          @else
          <tr>
            <td colspan="7" class="text-center">Không có chi phí nào.</td>
          </tr>
          @endif
        </tbody>
      </table>
      <!-- pagination -->
      <ul class="pagination flex float-right">
        <li class="page-item {{ ($maintenanceCosts->currentPage() == 1) ? 'disabled' : '' }}">
          <a class="page-link" href="{{ $maintenanceCosts->appends(['keywords' => $keywords])->url(1) }}">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        @for ($i = 1; $i <= $maintenanceCosts->lastPage(); $i++)
        <li class="page-item {{ ($maintenanceCosts->currentPage() == $i) ? 'active' : '' }}">
          <a class="page-link" href="{{ $maintenanceCosts->appends(['keywords' => $keywords])->url($i) }}">{{ $i }}</a>
        </li>
        @endfor
        <li class="page-item {{ ($maintenanceCosts->currentPage() == $maintenanceCosts->lastPage()) ? 'disabled' : '' }}">
          <a class="page-link" href="{{ $maintenanceCosts->appends(['keywords' => $keywords])->url($maintenanceCosts->lastPage()) }}"><span aria-hidden="true">&raquo;</span></a>
        </li>
      </ul>
    </div>
  </div>
</section>
@endsection
