<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="{{ url('/') . '/js/index.js' }}" type="text/javascript"></script>
  <title>@yield('title')</title>
  <style>
    /*CSS cho phần tiêu đề */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
      box-shadow: 5px 5px 5px #666;
      padding-left: 400px;
      display: inline;
      background-color: green;
    }
    .active_nav{
      background-color: #005300;
    }
    /*CSS cho phần cột bên trái col-2 */
    .sidenav {
      padding-top: 0px;
      text-align: left;
      margin-top: 10px;
      overflow: hidden;
    }
    .col-2 {
      width: 250px;
    }
    #button_left{
      padding: 20px;
    }
    .banquyen {
      width: 200px;
      height: 200px;
      padding-top: 100px;
      padding-bottom: 100px;
      font-size: 12px;
      font-family: cursive;
      color: rgb(128,128,128)
    }

    /*CSS phần nội dung hiển thị ảnh */
    /* Nội dung chung */
    .row.content {
      padding-top: 50px;
      background-color: #f1f1f1;
    }

    /* CSS cho mỗi phần hiển thị ảnh của 1 người */
    .user {
      background-color: white;
      padding: 20px;
      margin-top: 20px;
      margin-bottom: 50px;
      margin-right: 20px;
      margin-left: 50px;
    }
    /* CSS cho avatar */
    .tieude {
      font-weight: bold;
      padding-left: 0px;
    }

    /* Set black background color, white text and some padding */

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
    }

  </style>
</head>
<body>
<nav id="nav" class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li id="trangchu"><a href="/project1/public/home" style="color: white">Trang chủ</a></li>
      @yield('profile')
	    @if (Auth::check())
      <li id="trangcanhan"><a href="/myapp/public/profile" style="color: white">
      <img src="{{ url('/') . '/images/' . Auth::user()->avatar_photo }}" class="img-circle" alt="Cinque Terre" width="25" height="25"/> {{ Auth::user()->name }}</a></li>
	     @endif
    </ul>
    <ul id="login" class="nav navbar-nav navbar-right">
	@if(!Auth::check())
      <li><a href="{{ route('register') }}" style="color: white"><span class="glyphicon glyphicon-user"></span> Đăng kí</a></li>
      <li><a href="{{ route('login') }}" style="color: white"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a></li>
	@else
      <li>
        <a href="{{ route('logout') }}" style="color:white" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
          Đăng xuất
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
      </li>
  	  <div id="thongbao" style="background-color: white; margin-top: 50px; width: 200px"></div>
	@endif
    </ul>
  </div>
</nav>
<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <div class="container col-2" data-spy="affix">
        @if(Auth::check())
        <ul class="nav nav-pills nav-stacked">
          <li id="danganh">
            <a href="#"><i class="fa fa-camera" style="font-size:20px"></i> <span id="button_left"> Đăng ảnh </span></a>
          </li>
          <li id="khoanh">
            <a href="#"><i class="fa fa-image" style="font-size:20px"></i> <span id="button_left"> Kho ảnh</span></a>
          </li>
        </ul>
        @endif
        <div class="banquyen">
          <p><i style="font-size:20px" class="fa">&#xf1f9;</i> 5/2017 Comita team- HUST </p>
          <p>Web XXX</p>
        </div>
      </div>
    </div>
    @section('content')
    <div id="div1" class="col-sm-5 sidenav">
      @yield('name1')
    </div>
    <div id="div2" class="col-sm-5 sidenav">
      @yield('name2')
    </div>
    @show
  </div>
</div>
</body>
</html>
