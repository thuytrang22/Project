@extends('layouts.main')
@section('content')
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
                    <div class="btn-menuCategory"><img src="./images/pay.png" alt="">Gọi Thanh Toán</div>
                </button>
                <button type="button" class="btn btn-warning">
                    <div class="btn-menuCategory"><img src="./images/pay-card.png" alt="">Thanh Toán Thẻ</div>
                </button>
                <button type="button" class="btn btn-warning">
                    <div class="btn-menuCategory"><img src="./images/hotel-bell.png" alt="">Gọi Nhân Viên</div>
                </button>
                <button type="button" class="btn btn-warning">
                    <div class="btn-menuCategory"><img src="./images/menu.png" alt="">Xem Menu</div>
                </button>
                <button type="button" class="btn btn-warning">
                    <div class="btn-menuCategory"><img src="./images/check-list.png" alt="">Đánh Giá</div>
                </button>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-header">
    <img src="./images/logo-home.png" alt="">
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
        <button type="button" class="btn position-relative h-cart">
            <img src="./images/shopping-cart.png" alt="">
            <span class="position-absolute top-0 start-100 badge border border-light rounded-circle bg-danger p-circle">
                <span class="visually-hidden"></span>
            </span>
        </button>
    </div>
</nav>
<h4 id="headerDish">Món ăn</h4>
<!-- <div class="d-flex gap-2 mt-2 container-fluid"> -->
@foreach($dishs as $dish)
<div class="col-6 card">
    <div class="d-flex justify-content-between align-items-center">
        <div class="col-sm-7">
            <div class="card-body">
                <h5 class="card-title">{{ $dish->name }}</h5>
                <p class="card-text">{{ $dish->detail }}</p>
                <div class="d-flex h-icon">
                    <button type="button" id="minus-{{ $dish->id }}" class="minus-button" data-id="{{ $dish->id }}" data-quantity="minus" data-field="quantity"></button>
                    <input class="text-icon" type="number" name="quantity" value="0">
                    <button type="button" class="plus-button" data-quantity="plus" data-field="quantity"></button>
                    <div class="ml-3">Giá: {{ $dish->price }} <u>đ</u></div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <img src="{{ asset('storage/' .substr($dish->public, 7)) }}" class="img-thumbnail">
        </div>
    </div>
</div>
@endforeach
<!-- </div> -->
<h4 id="headerCallMore">Món Gọi Thêm</h4>
<div class="d-flex gap-2 mt-2 container-fluid">
    <div class="col-6 card">
        <div class="d-flex justify-content-between align-items-center">
            <div class="col-sm-7">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <div class="d-flex h-icon">
                        <button type="button" class="minus-button" data-quantity="minus" data-field="quantity"></button>
                        <input class="text-icon" type="number" name="quantity" value="0">
                        <button type="button" class="plus-button" data-quantity="plus" data-field="quantity"></button>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <img src="./images/gio-tai.jpg" alt="" class="img-thumbnail">
            </div>
        </div>
    </div>
    <div class="col-6 card">
        <div class="d-flex justify-content-between align-items-center">
            <div class="col-sm-7">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <div class="d-flex h-icon">
                        <button type="button" class="minus-button" data-quantity="minus" data-field="quantity"></button>
                        <input class="text-icon" type="number" name="quantity" value="0">
                        <button type="button" class="plus-button" data-quantity="plus" data-field="quantity"></button>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <img src="./images/gio-tai.jpg" alt="" class="img-thumbnail">
            </div>
        </div>
    </div>
</div>
<h4 id="headerDrink">Đồ Uống</h4>
<div class="d-flex gap-2 mt-2 container-fluid">
    <div class="col-6 card">
        <div class="d-flex justify-content-between align-items-center">
            <div class="col-sm-7">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <div class="d-flex h-icon">
                        <button type="button" class="minus-button" data-quantity="minus" data-field="quantity"></button>
                        <input class="text-icon" type="number" name="quantity" value="0">
                        <button type="button" class="plus-button" data-quantity="plus" data-field="quantity"></button>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <img src="./images/gio-tai.jpg" alt="" class="img-thumbnail">
            </div>
        </div>
    </div>
    <div class="col-6 card">
        <div class="d-flex justify-content-between align-items-center">
            <div class="col-sm-7">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <div class="d-flex h-icon">
                        <button type="button" class="minus-button" data-quantity="minus" data-field="quantity"></button>
                        <input class="text-icon" type="number" name="quantity" value="0">
                        <button type="button" class="plus-button" data-quantity="plus" data-field="quantity"></button>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <img src="./images/gio-tai.jpg" alt="" class="img-thumbnail">
            </div>
        </div>
    </div>
</div>
<script src="js/order.js"></script>
@endsection