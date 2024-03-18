@extends('.layouts.master')
@section('content')

<div class="card-header d-flex justify-content-between">
    <h4 class="modal-title">Chi tiết món ăn</h4> 
    <a class="btn btn-outline-warning" href="{{ route('category.menus', ['category' => $category->id]) }}">Quay lại</a>
</div>
<div class="card-body">
    <p><b>ID :</b>{{ $menu->id }}</p>
    <p><b>Tên Món Ăn :</b> {{$menu->name}}</p>
    <p><b>Hình Ảnh :</b>
        @if ($menu->public)
        <img class="img-show" src="{{ asset('storage/' .substr($menu->public, 7)) }}" alt="Hình ảnh">
        @endif
    </p>
    <p><b>Chi Tiết :</b> <br /> {{$menu->detail}}</p>
    <p><b>Danh Mục :</b> {{$menu->option}}</p>
    <p><b>Giá :</b> {{$menu->price}}</p>
</div>
@endsection