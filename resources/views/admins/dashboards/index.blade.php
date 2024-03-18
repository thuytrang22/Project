@extends('.layouts.admin')
@section('content')

<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Tổng Quan</li>
    </ul>
  </div>
</section>

<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      Tổng Quan
    </h1>
  </div>
</section>

<section class="section main-section">
  <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
    <div class="card">
      <div class="card-content">
        <div class="flex items-center justify-between">
          <div class="widget-label">
            <h3>
              Khách hàng
            </h3>
            <h1>
              {{ $data['numberOfUser'] }}
            </h1>
          </div>
          <span class="icon widget-icon text-green-500"><i class="mdi mdi-account-multiple mdi-48px"></i></span>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-content">
        <div class="flex items-center justify-between">
          <div class="widget-label">
            <h3>
              Bàn đã đặt
            </h3>
            <h1>
              {{ $data['numberOfSeating'] }}
            </h1>
          </div>
          <span class="icon widget-icon text-blue-500"><i class="mdi mdi-cart-outline mdi-48px"></i></span>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-content">
        <div class="flex items-center justify-between">
          <div class="widget-label">
            <h3>
              Hiệu suất
            </h3>
            <h1>
              {{ $data['performance'] }}
            </h1>
          </div>
          <span class="icon widget-icon text-red-500"><i class="mdi mdi-finance mdi-48px"></i></span>
        </div>
      </div>
    </div>
  </div>

  @include('admins.dashboards.chart')

  <div class="card has-table mb-6" style="contain: content;">
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
        Danh Sách Khách Hàng
      </p>
    </header>
    <div class="card-content">
      <table>
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Số điện thoại</th>
            <th>Số lần đặt bàn</th>
          </tr>
        </thead>
        <tbody>
          @if(count($data['users']) > 0)
          @foreach($data['users'] as $key => $user)
          <tr>
            <td>{{$key + 1}}</td>
            <td data-label="Name">{{$user->name}}</td>
            <td data-label="Phone">{{$user->phone}}</td>
            <td data-label="Number of booking">{{$user->number_of_booking}}</td>
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
        <li class="page-item {{ ($data['users']->currentPage() == 1) ? 'disabled' : '' }}">
          <a class="page-link" href="{{ $data['users']->url(1) }}">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        @for ($i = 1; $i <= $data['users']->lastPage(); $i++)
          <li class="page-item {{ ($data['users']->currentPage() == $i) ? 'active' : '' }}">
            <a class="page-link" href="{{ $data['users']->url($i) }}">{{ $i }}</a>
          </li>
          @endfor
          <li class="page-item {{ ($data['users']->currentPage() == $data['users']->lastPage()) ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $data['users']->url($data['users']->lastPage()) }}">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
      </ul>
    </div>
  </div>

  @include('admins.dashboards.feedback')
</section>
@endsection