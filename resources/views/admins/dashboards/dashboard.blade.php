@extends('.layouts.master')
@section('content')
<div class="scroll">
    <h4><u>Thống Kê</u></h4>
  <div class="d-flex mt-2" >
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Món Ăn</h5>
          <p class="card-text">Số lượng: {{ $optionDish }}</p>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Đồ Uống</h5> 
          <p class="card-text">Số lượng: {{ $optionDrink }}</p>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Món Gọi Thêm</h5> 
          <p class="card-text">Số lượng: {{ $optionMore }}</p>
        </div>
      </div>
    </div>
  </div>
  <hr class="mt-2 mb-2"/>
  <canvas id="myChart"></canvas>
</div>

<!-- js chart -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="js/dashboard.js"></script>
@endsection