<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/main.css">
    <!-- CDN Highcharts -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="js/home.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-2 bg-menu text-white">
            <div class="row logo"><img src="images/logo-color.png" alt=""></div>
            <hr/>
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="admin-tab" href="{{ route('admin') }}" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</a>
                <a class="nav-link" id="menu-tab" href="{{ route('menu') }}" role="tab" aria-controls="v-pills-profile" aria-selected="false">Menu</a>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Notification</a>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Profile</a>
            </div>
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
    @stack('js')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
</body>
</html>
