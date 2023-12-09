@extends('.layouts.master')
@section('content')
@if ( session('store'))
<div id="store" class="alert alert-success alert-dismissible fade show mt-2" role="alert">
    Thêm món thành công!!!
</div>
@endif
@if ( session('update'))
<div id="update" class="alert alert-success alert-dismissible fade show mt-2" role="alert">
    Chỉnh sửa thông tin món thành công!!!
</div>
@endif
@if ( session('destroy'))
<div id="destroy" class="alert alert-success alert-dismissible fade show mt-2" role="alert">
    Xóa món thành công!!!
</div>
@endif

<div class="card-body">
    <div class="row justify-content-between">
        <div class="col-auto d-flex">
            <!-- feature create -->
            <a class="btn btn-warning" href="{{route('create')}}">
                Thêm Món
            </a>
            <div class="dropdown ml-3">
                <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Danh Mục Thực Đơn
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <button class="dropdown-item" type="button">Món ăn <input type="text" value></button>
                    <button class="dropdown-item" type="button">Đồ uống</button>
                    <button class="dropdown-item" type="button">Món gọi thêm</button>
                </div>
            </div>
        </div>
        <!-- feature search -->
        <form action="?" class="col-auto ms-auto">
            <div class="input-group">
                <input type="text" name="keywords" class="form-control" placeholder="Tìm kiếm tên món..." />
                <button type="submit" class="btn btn-secondary">Go!</button>
            </div>
        </form>
    </div>
</div>
<div class="card-body p-0">
    <!-- show all data -->
    <table class="table table-bordered ">
        <thead>
            <tr class="text-center table-active">
                <th>
                    <a class="d-flex justify-content-center align-items-center" href="{{ route('menu', ['sortBy' => 'id', 'sortDirection' => ($sortDirection == 'asc' && $sortBy == 'id') ? 'desc' : 'asc']) }}">
                        STT
                        <div class="sort">
                            <div class="arrow-up"></div>
                            <div class="arrow-down"></div>
                        </div>
                    </a>
                </th>
                <th>Tên Món</th>
                <th>Hình Ảnh</th>
                <th>Chi Tiết</th>
                <th>Loại</th>
                <th>Giá tiền</th>
                <th width="280px">Hoạt Động</th>
            </tr>
        </thead>
        <tbody>
            @if(count($menus) > 0)
            @foreach($menus as $menu)
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
                <td>
                    @if($menu->option == 1) Món ăn @endif
                    @if($menu->option == 2) Đồ uống @endif
                    @if($menu->option == 3) Món gọi thêm @endif
                </td>
                <td>{{$menu->price}}</td>
                <td>
                    <div class="d-flex gap-10">
                        <!-- feature update -->
                        <a class="btn btn-icon btn-outline-warning btnEdit" href="{{route('edit',$menu->id)}}">
                            <img src="/images/editing.png" alt="">
                        </a>

                        <!-- feature show -->
                        <a class="btn btn-icon btn-outline-warning" href="{{route('show',$menu->id)}}">
                            <img src="/images/eye.png" alt="">
                        </a>

                        <!-- feature delete -->
                        <form method="POST" action="{{ route('destroy', ['id' => $menu->id]) }}">
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
                <td colspan="7" class="text-center">Không có món nào</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
<!-- pagination -->
<ul class="pagination float-right">
    <li class="page-item {{ ($menus->currentPage() == 1) ? 'disabled' : '' }}">
        <a class="page-link" href="{{ $menus->url(1) }}"><span aria-hidden="true">&laquo;</span></a>
    </li>
    @for ($i = 1; $i <= $menus->lastPage(); $i++)
        <li class="page-item {{ ($menus->currentPage() == $i) ? 'active' : '' }}">
            <a class="page-link" href="{{ $menus->url($i) }}">{{ $i }}</a>
        </li>
        @endfor
        <li class="page-item {{ ($menus->currentPage() == $menus->lastPage()) ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $menus->url($menus->lastPage()) }}"><span aria-hidden="true">&raquo;</span></a>
        </li>
</ul>
<script>

</script>
@endsection