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
          Biểu Đồ Thống Kê Doanh Thu
        </p>
      </header>
    <div class="card-body">
    <div class="row justify-content-between">
        <div class="flex" style="padding: 10px">
          <a class="button blue" href="{{ route('maintenance.cost') }}">
            Chi Phí Vận Hành
          </a>
          <a class="button blue" style="margin-left:10px ;" href="{{ route('revenue.list') }}">
            Doanh Thu
          </a>
        </div>
      </div>
      <div class="card-content">
        
    </div>
    @include('admins.dashboards.chart')
  </section>

  @endsection