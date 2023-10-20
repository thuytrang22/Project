<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Project</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/css/main.css">
    <!-- CDN Highcharts -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 bg-dashboasd text-white">
                <div class="row logo px-2">
                    <img src="/images/logo-color.png" alt="">
                </div>
                <hr />
                <button class="dropdown-item" id="btn-dashboasd" onclick="btnDashboasd()">Bảng Điều Khiển</button>
                <button class="dropdown-item" id="btn-dishes" onclick="btnDishes()">Món Ăn</button>
                <button class="dropdown-item" id="btn-drinks" onclick="btnDrinks()">Đồ Uống</button>
            </div>
            <div class="col-10">
                <div class="text-white bg-header row align-items-center justify-content-end">
                    <a href="#">Home</a>
                </div>
                @yield('content')
            </div>
        </div>
        @stack('modal')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="/js/btnGloble.js"></script>
        <script src="/js/master.js"></script>
        @stack('js')
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
</body>
</html>