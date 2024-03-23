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
      <li>Doanh Thu</li>
    </ul>
  </div>
</section>
<section class="section main-section" style="padding-bottom: 60px !important;">
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-buffer"></i></span>
          Danh Sách Doanh Thu
        </p>
      </header>
    <div class="card-body">
    <div class="row justify-content-between">
        <div class="flex" style="padding: 10px">
          <a class="button blue" href="{{ route('revenues') }}">
            Quay lại
          </a>
          <form action="?" class="col-auto ms-auto navbar-end">
              <div class="input-group">
                  <input type="text" name="keywords" class="form-control" placeholder="Tìm kiếm danh mục..." value="{{$keywords}}"/>
                  <button type="submit" class="button green">Tìm Kiếm </button>
              </div>
          </form>
        </div>
        <div class="card-content">
        <table>
          <thead>
          <tr class="text-center table-active">
                <th>
                    <a class="flex content-center items-center" href="{{ route('revenue.list', ['sortBy' => 'id', 'sortDirection' => ($sortDirection == 'asc' && $sortBy == 'id') ? 'desc' : 'asc']) }}">
                        STT
                        <div class="sort">
                            <div class="arrow-up"></div>
                            <div class="arrow-down"></div>
                        </div>
                    </a>
                </th>
                <th>Mã Hóa Đơn</th>
                <th>Tổng Tiền Hóa Đơn</th>
            </tr>
          </thead>
          <tbody>
            @if(count($bills) > 0)
              @foreach($bills as $bill)
                <tr class="text-center">
                  <td>{{$bill->id}}</td>
                  <td>{{$bill->order_id}}</td>
                  <td>{{$bill->total_order}}</td>
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
              <a class="page-link" href="{{ $bills->appends(['keywords' => $keywords])->url(1) }}"><span aria-hidden="true">&laquo;</span></a>
          </li>
          @for ($i = 1; $i <= $bills->lastPage(); $i++)
            <li class="page-item {{ ($bills->currentPage() == $i) ? 'active' : '' }}">
              <a class="page-link" href="{{ $bills->appends(['keywords' => $keywords])->url($i) }}">{{ $i }}</a>
            </li>
          @endfor
            <li class="page-item {{ ($bills->currentPage() == $bills->lastPage()) ? 'disabled' : '' }}">
              <a class="page-link" href="{{ $bills->appends(['keywords' => $keywords])->url($bills->lastPage()) }}"><span aria-hidden="true">&raquo;</span></a>
            </li>
        </ul>
        </div>
        
    </div>
    
  </section>
@endsection