@extends('.layouts.admin')
@section('content')

<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Danh Sách Tài Khoản</li>
    </ul>
  </div>
</section>

  <section class="section main-section" style="padding-bottom: 60px !important;">
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-buffer"></i></span>
          Tổng Danh Sách Tài Khoản
        </p>
        <a href="#" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-reload"></i></span>
        </a>
      </header>
    <div class="card-body">
    <div class="row justify-content-between" style="padding: 10px">
        <div class="flex gap-10" style="padding-bottom: 10px">
          <a class="button blue" href="/register">
            Thêm Tài Khoản
          </a>
            <!-- feature search -->
            <form action="?" class="col-auto ms-auto navbar-end">
                <div class="input-group">
                    <input type="text" name="keywords" class="form-control" placeholder="Tìm kiếm ..." value="{{$keywords}}"/>
                    <button type="submit" class="button green">Tìm Kiếm</button>
                </div>
            </form>
      </div>
              </div>
      <div class="card-content">
        <table>
          <thead>
            <tr class="text-center table-active">
                  <th>
                    <a class="flex content-center items-center" href="{{ route('list.users', ['sortBy' => 'id', 'sortDirection' => ($sortDirection == 'asc' && $sortBy == 'id') ? 'desc' : 'asc']) }}">
                      STT
                      <div class="sort">
                        <div class="arrow-up"></div>
                        <div class="arrow-down"></div>
                      </div>
                    </a>
                  </th>
                  <th>Tên Tài Khoản</th>
                  <th>Quyền</th>
                  <th width="200px">Hành Động</th>
              </tr>
          </thead>
          <tbody>
            @if(count($users) > 0)
            @foreach($users as $user)
            <tr class="text-center">
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->role_id}}</td>
                <td></td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="7" class="text-center">Không có người dùng nào.</td>
            </tr>
            @endif
        </tbody>
        </table>
      
    </div>
  </section>
@endsection