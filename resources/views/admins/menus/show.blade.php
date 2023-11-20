@extends('.layouts.master')
@section('content')

<div class="card-header d-flex justify-content-between">
    <h4 class="modal-title">Chi tiết món ăn</h4> 
    <a class="btn btn-outline-warning"  href="{{ route('menu') }}">Quay lại</a>
</div>
<div class="card-body">
    <p>ID :{{ $menu->id }}</p>
    <p>Tên Món : {{$menu->name}}</p>
    <p>Hình Ảnh :
        @if ($menu->public)
        <img class="img-show" src="{{ asset('storage/' .substr($menu->public, 7)) }}" alt="Hình ảnh">
        @endif
    </p>
    <p>Chi Tiết : <br /> {{$menu->detail}}</p>
    <p>Loại : {{$menu->option}}</p>
    <p>Giá tiền : {{$menu->price}}</p>
</div>
@endsection