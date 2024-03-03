@extends('layouts.page')
@section('content')
@if (session('infor_id'))
  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">

      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-phone d-flex align-items-center"><span>+84 332412298</span></i>
        <i class="bi bi-clock d-flex align-items-center ms-4"><span> Mở cửa: 11AM - 23PM</span></i>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="{{route('pages')}}">Hana Sushi</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="#contact">Order Thêm</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Gọi Nhân Viên</a></li>
          <li><a class="nav-link scrollto" href="#chefs">Gọi Thanh Toán</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu section-bg" style="padding: 150px 0">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Thực Đơn</h2>
          <p>Thực Đơn Của Chúng Tôi</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="menu-flters">
              <li data-filter="*" class="filter-active">Tất cả</li>
              <li data-filter=".filter-starters">Món Khai Vị</li>
              <li data-filter=".filter-salads">Món Salads</li>
              <li data-filter=".filter-specialty">Món chính</li>
            </ul>
          </div>
        </div>

        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
          @foreach ($allMores as $dish)
            <div class="col-lg-6 menu-item filter-starters">
              <img src="{{ asset('storage/' .substr($dish->public, 7)) }}" class="menu-img" alt="">
              <div class="flex-container">
                <div class="menu-content">
                  <a href="#">{{ $dish->name }}</a><span>{{ number_format($dish->price) }} <u>đ</u></span>
                </div>
                <div class="menu-ingredients">
                  <span>Thành phần: {{ ($dish->detail) }}</span>
                </div>
                <div class="d-flex align-items-center btn-group" data-id="{{ $dish->id }}">
                  <button type="button" class="minus-button" onclick="decreaseQuantity(this)" data-id="{{ $dish->id }}" data-price="{{ $dish->price }}"></button>
                  <input class="ip-price text-icon form-control ip-number" type="text" value="0" readonly>
                  <button type="button" class="plus-button" onclick="increaseQuantity(this)" data-id="{{ $dish->id }}" data-price="{{ $dish->price }}"></button>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section><!-- End Menu Section -->
  </div>
  
  <nav class="navbar navbar-expand-lg navbar-light bg-footer fixed-bottom " id="tabFooter">
    <div class="d-flex justify-content-between px-4" style= "width: 100%;">
      <div class="d-flex align-items-center justify-content-between">
      Tổng:
      <input id="gia" type="text"></div>
      <form id="formOrder" action="{{route('order.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
        <input type="hidden" name="infor_id" value="{{ session('infor_id') }}">
        <button type="submit" class="btn btn-primary" id="btnOrder">Đặt món</button>
      </form>
    </div>
  </nav>
<script src="/js/order.js"></script>
@else
<div class="container model-order">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Thông báo</h5>
      </div>
      <div class="modal-body">
        <p>Rất tiếc!! <br>
          Qúy khách cần quét mã QR tại bàn, nhập thông tin để thực hiện gọi món. <br>
          Hoặc gọi nhân viên hỗ trợ.
        </p>
      </div>
        <button type="button" class="btn btn-primary">Gọi Nhân Viên</button>
    </div>
  </div>
</div>
@endif
@endsection