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
      <li>Chi Phí Vận hành</li>
      <li>Chi Phí Thực Phẩm</li>
    </ul>
  </div>
</section>
<section class="section main-section" style="padding-bottom: 60px !important;">
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-buffer"></i></span>
          Danh Sách Chi Phí Thực Phẩm
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
                    <a class="flex content-center items-center" href="{{ route('food.cost', ['sortBy' => 'id', 'sortDirection' => ($sortDirection == 'asc' && $sortBy == 'id') ? 'desc' : 'asc']) }}">
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
                <th>Thành Tiền</th>
            </tr>
          </thead>
          <tbody>
            @if(count($warehouses) > 0)
              @foreach($warehouses as $warehouses)
                <tr class="text-center">
                  <td>{{$warehouses->id}}</td>
                  <td>{{$warehouses->name}}</td>
                  <td>{{$warehouses->quantity}}</td>
                  <td>{{$warehouses->measure}}</td>
                  <td>{{$warehouses->price}}</td>
                  <td>{{$warehouses->price * $warehouses->quantity}}</td>
                </tr>
              @endforeach
            @else
            <tr>
                <td colspan="7" class="text-center">Không có danh mục nào.</td>
            </tr>
            @endif
        </tbody>
      </table>
     
    </div>
    
  </section>
@endsection