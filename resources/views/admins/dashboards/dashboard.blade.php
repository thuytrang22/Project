@extends('.layouts.master')
@section('content')
<div class="scroll">
  <div class="d-flex mt-2" >
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Món Ăn</h5>
          <p class="card-text">Số lượng:</p>
          <a href="#" class="btn btn-primary">Xem Thêm</a>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Đồ Uống</h5> 
          <p class="card-text">Số lượng:</p>
          <a href="#" class="btn btn-primary">Xem Thêm</a>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Đồ Uống</h5> 
          <p class="card-text">Số lượng:</p>
          <a href="#" class="btn btn-primary">Xem Thêm</a>
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