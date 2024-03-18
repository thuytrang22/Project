@extends('.layouts.admin')
@section('content')

@if ( session('store'))
  <div id="store" class="alert alert-success alert-dismissible fade show mt-2" role="alert">
    Thêm món ăn thành công!!!
  </div>
@endif

@if ( session('update'))
  <div id="update" class="alert alert-success alert-dismissible fade show mt-2" role="alert">
    Sửa món ăn thành công!!!
  </div>
@endif

@if ( session('destroy'))
  <div id="destroy" class="alert alert-success alert-dismissible fade show mt-2" role="alert">
    Xóa món ăn thành công!!!
  </div>
@endif

<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Danh Mục</li>
      <li>{{ $category->name }}</li>
    </ul>
  </div>
</section>

  <section class="section main-section" style="padding-bottom: 60px !important;">
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-buffer"></i></span>
          Danh Sách {{ $category->name }}
        </p>
        <a href="{{ url()->full() }}" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-reload"></i></span>
        </a>
      </header>
      <div class="card-body">
    <div class="row justify-content-between">
        <div class="flex gap-10" style="padding: 10px">
                <!-- feature create -->
                <a class="button blue" href="{{ route('categories') }}">
                  Quay lại
                </a>
                <a class="button blue" href="{{ route('menus.create', ['category' => $category->id]) }}">
                  Thêm Món
                </a>
            <!-- feature search -->
            <form action="?" class="col-auto ms-auto navbar-end">
                <div class="input-group">
                    <input type="text" name="keywords" class="form-control" placeholder="Tìm kiếm món ăn..." value="{{$keywords}}"/>
                    <button type="submit" class="button green">Tìm kiếm</button>
                </div>
            </form>
    </div></div>
</div>
      <div class="card-content">
        <table>
          <thead>
          <tr class="text-center table-active">
                <th>
                    <a class="flex content-center items-center" href="{{ route('category.menus',
                    ['category' => $category->id, 'sortBy' => 'id',
                    'sortDirection' => ($sortDirection == 'asc' && $sortBy == 'id') ? 'desc' : 'asc']) }}">
                      STT
                        <div class="sort">
                            <div class="arrow-up"></div>
                            <div class="arrow-down"></div>
                        </div>
                    </a>
                </th>
                <th>Tên Món Ăn</th>
                <th>Hình Ảnh</th>
                <th>Chi Tiết</th>
                <th>Danh Mục</th>
                <th width="100px">Giá</th>
                <th width="250px">Hành Động</th>
            </tr>
          </thead>
          <tbody>
            @if(count($menus) > 0)
              @foreach($menus as $menu)
                @if($category->id == $menu->id_category)
                  <tr class="text-center">
                      <td>{{$menu->id}}</td>
                      <td>{{$menu->name}}</td>
                      <td>
                          <div class="img-table">
                              @if ($menu->public)
                                  <img src="{{ asset('storage/' .substr($menu->public, 7)) }}" alt="Hình ảnh">
                              @endif
                          </div>
                      </td>
                      <td>{{$menu->detail}}</td>
                      <td>{{$category->name}}</td>
                      <td>{{number_format($menu->price)}}đ</td>
                      <td>
                          <div class="flex gap-10 justify-center">
                              <!-- feature update -->
                              <a class="flex justify-center btn btn-icon btn-outline-warning btnEdit" href="{{ route('menus.edit', ['category' => $category->id, 'id' => $menu->id]) }}">
                                  <img src="/images/editing.png" alt="">
                              </a>

                              <!-- feature show -->
                              <a class="flex justify-center btn btn-icon btn-outline-warning" href="{{route('menus.show',['category' => $category->id, 'id' => $menu->id])}}">
                                  <img src="/images/eye.png" alt="">
                              </a>

                              <!-- feature delete -->
                              <form method="POST" action="{{ route('menus.destroy', ['category' => $category->id, 'menu' => $menu->id]) }}">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="flex justify-center btn btn-outline-warning btn-icon">
                                      <img src="/images/delete.png" alt="">
                                  </button>
                              </form>
                          </div>
                      </td>
                  </tr>
                @endif
              @endforeach
            @else
              <tr>
                  <td colspan="7" class="text-center">Không có món ăn nào.</td>
              </tr>
            @endif
        </tbody>
        </table>
      </div>
      <!-- pagination -->
<ul class="pagination flex float-right">
    <li class="page-item {{ ($menus->currentPage() == 1) ? 'disabled' : '' }}">
        <a class="page-link" href="{{ $menus->appends(['keywords' => $keywords])->url(1) }}"><span aria-hidden="true">&laquo;</span></a>
    </li>
    @for ($i = 1; $i <= $menus->lastPage(); $i++)
        <li class="page-item {{ ($menus->currentPage() == $i) ? 'active' : '' }}">
            <a class="page-link" href="{{ $menus->appends(['keywords' => $keywords])->url($i) }}">{{ $i }}</a>
        </li>
        @endfor
        <li class="page-item {{ ($menus->currentPage() == $menus->lastPage()) ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $menus->appends(['keywords' => $keywords])->url($menus->lastPage()) }}"><span aria-hidden="true">&raquo;</span></a>
        </li>
</ul>
    </div>

  </section>

  @endsection