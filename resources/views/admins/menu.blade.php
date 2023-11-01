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
        <div class="col-auto">
            <!-- feature create -->
            <button class="btn btn-warning" data-toggle="modal" data-target="#modalCreate">
                Thêm Món
            </button>
            <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="modalShowLabel">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div id="createDish" class="modal-content">
                        <form action="{{route('menu.store')}}" method="POST" class="card mt-3" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h4 class="modal-title">Thêm Món Mới</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="card-body">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Tên Món:</label>
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control" @error('name') is-invalid @enderror>
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Hình Ảnh:</label>
                                    <input type="file" id="uploadImage" onchange="previewImage()" name="public" accept="image/*" value="{{old('public')}}" class="form-control" @error('public') is-invalid @enderror>
                                    <img id="preview" class="image mt-2">
                                    @error('public')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Chi Tiết:</label>
                                    <input type="text" name="detail" value="{{old('detail')}}" class="form-control" @error('detail') is-invalid @enderror>
                                    @error('detail')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="option" class="form-label">Loại:</label>
                                    <select name="option" id="option" class="form-control @error('option') is-invalid @enderror">
                                        <option value="1">Món ăn</option>
                                        <option value="2">Đô uống</option>
                                        <option value="3">Món gọi thân</option>
                                    </select>
                                    @error('option')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Giá:</label>
                                    <input type="text" name="price" value="{{old('price')}}" class="form-control" @error('price') is-invalid @enderror>
                                    @error('price')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-end d-flex">
                                <button class="btn btn-primary mr-2" type="submit">
                                    Thêm
                                </button>
                            </div>
                        </form>
                    </div>
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
    <table class="table table-striped table-hover m-0">
        <thead>
            <tr>
                <th>STT</th>
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
            <tr>
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
                <td>{{$menu->option}}</td>
                <td>{{$menu->price}}</td>
                <td>
                    <div class="d-flex gap-10">
                        <!-- feature update -->
                        <button type="button" id="btnEdit-{{ $menu->id }}" class="btn btn-icon btn-outline-warning btnEdit" data-toggle="modal" data-target="#modalEdit" data-edit="{{ $menu->id }}">
                            <img src="/images/editing.png" alt="">
                        </button>
                        <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalShowLabel">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <form action="{{route('menu.update')}}" method="POST" class="card mt-3" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Sửa Thông Tin Món</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="card-body">
                                            @method('PUT')
                                            @csrf
                                            <div class="mb-3" >
                                                <input type="text" id="id-menu" name="id" value="{{old('id', $menu->id)}}" class="form-control" @error('id') is-invalid @enderror>
                                                @error('id')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Tên Món:</label>
                                                <input type="text" name="name" value="{{old('name', $menu->name)}}" class="form-control" @error('name') is-invalid @enderror>
                                                @error('name')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="form-label">Hình Ảnh:</label>
                                                <input type="file" id="updateImage" name="public" accept="image/*" class="form-control" @error('public') is-invalid @enderror>
                                                <input type="hidden" name="old_public" accept="image/*" value="{{old('public', $menu->public)}}" class="form-control" @error('public') is-invalid @enderror>
                                                @if ($menu->public)
                                                <img id="changeImage" data-id="{{ $menu->id }}" src="{{ asset('storage/' .substr($menu->public, 7)) }}" alt="Hình ảnh">
                                                @endif
                                                @error('public')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="form-label">Chi Tiết:</label>
                                                <input type="text" name="detail" value="{{old('detail', $menu->detail)}}" class="form-control" @error('detail') is-invalid @enderror>
                                                @error('detail')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="option" class="form-label">Loại:</label>
                                                <select name="option" id="option" class="form-control @error('option', $menu->option) is-invalid @enderror">
                                                    <option value="1" @if($menu->option == 1) selected @endif>Món ăn</option>
                                                    <option value="2" @if($menu->option == 2) selected @endif>Đồ uống</option>
                                                    <option value="3" @if($menu->option == 3) selected @endif>Món gọi thân</option>
                                                </select>
                                                @error('option')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="form-label">Giá:</label>
                                                <input type="text" name="price" value="{{old('price', $menu->price)}}" class="form-control" @error('price') is-invalid @enderror>
                                                @error('price')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="card-footer text-end d-flex">
                                            <button class="btn btn-primary mr-2" type="submit">
                                                Lưu
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- feature show -->
                        <button type="button" class="btn btn-icon btn-outline-warning" data-toggle="modal" data-target="#modalShow" data-show-id="{{ $menu->id }}">
                            <img src="/images/eye.png" alt="">
                        </button>
                        <div class="modal fade" id="modalShow" tabindex="-1" role="dialog" aria-labelledby="modalShowLabel">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Chi tiết món ăn</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card-body">
                                            <p>ID :{{ $menu->id }}</p>
                                            <p>Tên Món : {{$menu->name}}</p>
                                            <p>Hình Ảnh :
                                                @if ($menu->public)
                                                <img id="imgShow" src="{{ asset('storage/' .substr($menu->public, 7)) }}" alt="Hình ảnh">
                                                @endif
                                            </p>
                                            <p>Chi Tiết : <br /> {{$menu->detail}}</p>
                                            <p>Loại : {{$menu->option}}</p>
                                            <p>Giá tiền : {{$menu->price}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- feature delete -->

                        <form method="POST" action="{{ route('menu.destroy', ['id' => $menu->id]) }}">
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
<script src="/js/dish.js"></script>
@endsection