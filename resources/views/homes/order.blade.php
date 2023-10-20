@extends('layouts.main')
@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-header">
    <img src="./images/logo-home.png" alt="">
    <div class="collapse navbar-collapse justify-content-between px-4" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Món Ăn</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Đồ Uống</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Gọi Thêm</a>
            </li>
        </ul>
        <form class="d-flex my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <button  type="button" class="btn position-relative h-cart">
            <img src="./images/shopping-cart.png" alt="">
            <span class="position-absolute top-0 start-100 badge border border-light rounded-circle bg-danger p-circle">
                <span class="visually-hidden"></span>
            </span>
        </button>
    </div>
</nav>
<div class="d-flex gap-2 mt-2 container-fluid">
    <div class="col-6 card">
        <div class="d-flex justify-content-between align-items-center">
            <div class="col-sm-7">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <div class="d-flex h-icon">
                        <button type="button" class="plus-button" data-quantity="minus" data-field="quantity"></button>
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
                        <button type="button" class="plus-button" data-quantity="minus" data-field="quantity"></button>
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