@php
$statuses = [
0 => 'Chưa thanh toán',
1 => 'Đã thanh toán'
];
@endphp
<!DOCTYPE html>
<html lang="en" class="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hana Sushi</title>

  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png" />
  <link rel="mask-icon" href="safari-pinned-tab.svg" color="#00b4b6" />

  <meta name="description" content="Admin Hana Sushi">

  <meta property="og:url" content="https://justboil.github.io/admin-one-tailwind/">
  <meta property="og:site_name" content="JustBoil.me">
  <meta property="og:title" content="Admin Hana Sushi">
  <meta property="og:description" content="Admin Hana Sushi">
  <meta property="og:image" content="https://justboil.me/images/one-tailwind/repository-preview-hi-res.png">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="1920">
  <meta property="og:image:height" content="960">

  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:title" content="Admin Hana Sushi">
  <meta property="twitter:description" content="Admin Hana Sushi">
  <meta property="twitter:image:src" content="https://justboil.me/images/one-tailwind/repository-preview-hi-res.png">
  <meta property="twitter:image:width" content="1920">
  <meta property="twitter:image:height" content="960">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="/css/dashboard.css">
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130795909-1"></script>

</head>

<body>
  <section class="is-title-bar">
    <div style="text-align: center;">
      <h2>HANA SUSHI</h2>
    </div>
  </section>
  <div>
    <div style="padding-left: 40px;">
      <p><b>Ngày giờ :</b> {{$bill->created_at}}</p>
      <p><b>Số hóa đơn :</b> {{$bill->id}}</p>
      <p><b>Khách hàng :</b> {{$bill->order->infor->name}}</p>
      <p><b>Số bàn :</b> {{$bill->order->infor->table_number}}</p>
    </div>
    <table class="table-fixed" style="border-collapse: collapse; width: 100%; border-spacing: 0; border-color: #fff;">
      <thead>
        <tr class="table-active bt-table">
          <th>STT</th>
          <th>Tên món ăn</th>
          <th>Số lượng</th>
          <th>Đơn giá</th>
          <th>Tổng tiền</th>
        </tr>
      </thead>
      <tbody>
        @if(!empty($bill->order))
        @foreach($bill->order->orderMenus as $key => $orderMenu)
        <tr class="text-center">
          <td>{{ $key + 1 }}</td>
          <td>{{$orderMenu->menu->name}}</td>
          <td>{{$orderMenu->amount}}</td>
          <td>{{number_format($orderMenu->menu->price)}}đ</td>
          <td>{{number_format($orderMenu->menu->price * $orderMenu->amount)}}đ</td>
        </tr>
        @endforeach
        <tr class="bt-table">
          <td>VAT</td>
          <td colspan="3"></td>
          <td>{{$vat}}%</td>
        </tr>
        <tr>
          <td>Tổng tiền thanh toán :</td>
          <td colspan="3"></td>
          <td>{{number_format($bill->total_order)}}đ</td>
        </tr>
        @else
        <tr>
          <td colspan="7" class="text-center">Không có dữ liệu</td>
        </tr>
        @endif
      </tbody>
    </table>
  </div>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
  <script type="text/javascript" src="/js/chart.sample.min.js"></script>
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    function printPage() {
      window.print();
    }
    printPage()
  </script>
</body>

</html>