<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Hana Sushi</title>

  <!-- Tailwind is included -->
  <link rel="stylesheet" href="/css/main.css?v=1628755089081">

  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png"/>
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png"/>
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png"/>
  <link rel="mask-icon" href="safari-pinned-tab.svg" color="#00b4b6"/>

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
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-130795909-1');
  </script>

</head>
<body>
<div id="app">
<nav id="navbar-main" class="navbar is-fixed-top">
  <div class="navbar-brand">
    <a class="navbar-item mobile-aside-button">
      <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
    </a>
    
  </div>
  <div class="navbar-brand is-right">
    <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
      <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
    </a>
  </div>
  <div class="navbar-menu" id="navbar-menu">
    <div class="navbar-end">
      <div class="navbar-item dropdown has-divider has-user-avatar">
        <a class="navbar-link">
          <div class="user-avatar">
            <img src="https://avatars.dicebear.com/v2/initials/john-doe.svg" alt="John Doe" class="rounded-full">
          </div>
          <div class="is-user-name"><span>Admin</span></div>
          <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
        </a>
        <div class="navbar-dropdown">
          <a href="{{route('profile')}}" class="navbar-item">
            <span class="icon"><i class="mdi mdi-account"></i></span>
            <span>My Profile</span>
          </a>
          <a class="navbar-item">
            <span class="icon"><i class="mdi mdi-settings"></i></span>
            <span>Settings</span>
          </a>
          <a class="navbar-item">
            <span class="icon"><i class="mdi mdi-email"></i></span>
            <span>Messages</span>
          </a>
          <hr class="navbar-divider">
          <a class="navbar-item">
            <span class="icon"><i class="mdi mdi-logout"></i></span>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="btn btn-outline-warning btn-icon">
                <span>Đăng xuất</span>
              </button>
            </form>
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>

<aside class="aside is-placed-left is-expanded">
  <div class="aside-tools">
    <div>
      Admin <b class="font-black">Hana Sushi</b>
    </div>
  </div>
  <div class="menu is-menu-main">
    <p class="menu-label">Chung</p>
    <ul class="menu-list">
        <li class="{{ request()->routeIs('admins') ? 'active' : '' }}">
            <a href="{{route('admins')}}">
                <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                <span class="menu-item-label">Tổng quan</span>
            </a>
        </li>
        <li class="{{ request()->routeIs('categories') ? 'active' : '' }}">
            <a href="{{route('categories')}}">
                <span class="icon"><i class="mdi mdi-table"></i></span>
                <span class="menu-item-label">Danh mục</span>
            </a>
        </li>
        <li class="{{ request()->routeIs('warehouses') ? 'active' : '' }}">
            <a href="{{route('warehouses')}}">
                <span class="icon"><i class="mdi mdi-table"></i></span>
                <span class="menu-item-label">Kho</span>
            </a>
        </li>
        <li class="{{ request()->routeIs('order.list') ? 'active' : '' }}">
            <a href="{{route('order.list')}}">
                <span class="icon"><i class="mdi mdi-table"></i></span>
                <span class="menu-item-label">Đơn hàng</span>
            </a>
        </li>
      <li class="{{ request()->routeIs('profile') ? 'active' : '' }}">
        <a href="{{route('profile')}}">
          <span class="icon"><i class="mdi mdi-account-circle"></i></span>
          <span class="menu-item-label">Hồ sơ</span>
        </a>
      </li>
      <li class="{{ request()->routeIs('pages') ? 'active' : '' }}">
        <a href="{{route('pages')}}">
          <span class="icon"><i class="mdi mdi-lock"></i></span>
          <span class="menu-item-label">Trang chủ</span>
        </a>
      </li>
    </ul>
</div>
</aside>

@yield('content')
</div>
<!-- Scripts below are for demo only -->
<script type="text/javascript" src="/js/main.min.js?v=1628755089081"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script type="text/javascript" src="/js/chart.sample.min.js"></script>


<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '658339141622648');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=658339141622648&ev=PageView&noscript=1"/></noscript>

<!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('.menu-link').each(function() {
        var href = $(this).attr('href');
        if (window.location.href.indexOf(href) !== -1) {
            $(this).closest('li').addClass('active');
        }
    });

</script>

</body>
</html>