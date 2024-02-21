@extends('.layouts.master')
@section('content')

<div class="card-header d-flex justify-content-between">
    <h4 class="modal-title">Chi tiết món ăn</h4> 
    <a class="btn btn-outline-warning" href="{{ route('category.menus', ['category' => $category->id]) }}">Back</a>
</div>
<div class="card-body">
    <p><b>ID :</b>{{ $menu->id }}</p>
    <p><b>Food Name :</b> {{$menu->name}}</p>
    <p><b>Image :</b>
        @if ($menu->public)
        <img class="img-show" src="{{ asset('storage/' .substr($menu->public, 7)) }}" alt="Hình ảnh">
        @endif
    </p>
    <p><b>Detail :</b> <br /> {{$menu->detail}}</p>
    <p><b>Category :</b> {{$menu->option}}</p>
    <p><b>Price :</b> {{$menu->price}}</p>
</div>
@endsection