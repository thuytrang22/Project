@extends('layouts.main')
@section('content')

<div class="modal fade " id="modalCart" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-modalmenu">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Danh Mục Menu</h5>
                <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body justify-content-center">
                <button type="button" class="btn btn-warning">
                    <div class="btn-menuCategory"><img src="./images/pay.png" alt="">Gọi Thanh Toán</div>
                </button>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="modalMenuOder" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-modalmenu">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Danh Mục Menu</h5>
                <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body justify-content-center">
                <button type="button" class="btn btn-warning">
                    <div class="btn-menuCategory"><img src="/images/pay.png" alt="">Gọi Thanh Toán</div>
                </button>
                <button type="button" class="btn btn-warning">
                    <div class="btn-menuCategory"><img src="/images/pay-card.png" alt="">Thanh Toán Thẻ</div>
                </button>
                <button type="button" class="btn btn-warning">
                    <div class="btn-menuCategory"><img src="/images/hotel-bell.png" alt="">Gọi Nhân Viên</div>
                </button>
                <button type="button" class="btn btn-warning">
                    <div class="btn-menuCategory"><img src="/images/menu.png" alt="">Xem Menu</div>
                </button>
                <button type="button" class="btn btn-warning">
                    <div class="btn-menuCategory"><img src="/images/check-list.png" alt="">Đánh Giá</div>
                </button>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-header">
    <img src="/images/logo-home.png" alt="">
    <div class="collapse navbar-collapse justify-content-between px-4" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#" id="scrollDish">Món Ăn</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" id="scrollDrink">Đồ Uống</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" id="scrollCallMore">Món Gọi Thêm</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Gọi Thanh Toán</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Gọi Nhân Viên</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Đánh Giá</a>
            </li>
        </ul>
        <form class="d-flex my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <a class="btn position-relative h-cart" href="{{route('cart')}}">
            <img src="/images/shopping-cart.png" alt="">
            <span class="position-absolute top-0 start-100 badge border border-light rounded-circle bg-danger p-circle">
                <span class="visually-hidden"></span>
            </span>
        </a>
    </div>
</nav>
<h4 id="headerDish">Món ăn</h4>
<div class="row">
    @foreach ($dishs as $dish)
        <div class="col-md-3 mb-3">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/' .substr($dish->public, 7)) }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $dish->name }}</h5>
                    <div class="d-flex align-items-center mb-3">
                        <button type="button" class="minus-button" data-quantity="minus" data-field="quantity" data-id="{{ $dish->id}}"></button>
                        <input class="text-icon form-control" type="number" name="quantity" value="0">
                        <button type="button" class="plus-button" data-quantity="plus" data-field="quantity" data-id="{{ $dish->id}}"></button>
                        <div class="ml-3">Giá: {{ $dish->price }} <u>đ</u></div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<h4 id="headerCallMore">Món Gọi Thêm</h4>
<div class="row">
    @foreach ($allMores as $more)
        <div class="col-md-3 mb-3">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/' .substr($more->public, 7)) }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $more->name }}</h5>
                    <div class="d-flex align-items-center mb-3">
                        <button type="button" class="minus-button" data-quantity="minus" data-field="quantity" data-id="{{ $dish->id}}"></button>
                        <input class="text-icon form-control" type="number" name="quantity" value="0">
                        <button type="button" class="plus-button" data-quantity="plus" data-field="quantity" data-id="{{ $dish->id}}"></button>
                        <div class="ml-3">Giá: {{ $more->price }} <u>đ</u></div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<h4 id="headerDrink">Đồ Uống</h4>
<div class="row">
    @foreach ($drinks as $drink)
        <div class="col-md-3 mb-3">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/' .substr($drink->public, 7)) }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $drink->name }}</h5>
                    <div class="d-flex align-items-center mb-3">
                        <button type="button" class="minus-button" data-quantity="minus" data-field="quantity" data-id="{{ $dish->id}}"></button>
                        <input class="text-icon form-control" type="number" name="quantity" value="0">
                        <button type="button" class="plus-button" data-quantity="plus" data-field="quantity" data-id="{{ $dish->id}}"></button>
                        <div class="ml-3">Giá: {{ $drink->price }} <u>đ</u></div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<script src="/js/order.js"></script>
@endsection