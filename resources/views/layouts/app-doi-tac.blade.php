<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">   
    <link rel="shortcut icon" href="{{ URL::to('/') }}/public/images/home.png" />
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="chodatso, chodat, datso, cho, dat, so, cần mua nhà, nhà bán, mua bán nhà, Hà Nội, tìm mua nhà, nhaban, bán nhà mặt phố, nhà mặt tiền, sổ đỏ, chỉnh chủ, sdcc, giá rẻ">
    <meta name="copyright" content="©2016 chodatso.com" />
    <meta name="robots" content="follow" />
    <meta http-equiv="content-language" content="vi" />
    <meta name='revisit-after' content='1 days' />
    
    <!-- Font awesome -->
    <link href="{{ URL::to('/') }}/public/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ URL::to('/') }}/public/css/bootstrap.css" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="{{ URL::to('/') }}/public/css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Theme color -->
    <link id="switcher" href="{{ URL::to('/') }}/public/css/theme-color/default-theme.css" rel="stylesheet">


    <link rel="stylesheet" href="{{ URL::to('/') }}/public/css/main.css" />
    <script type="text/JavaScript" src="{{ URL::to('/') }}/public/js/sha512.js"></script> 
    <script type="text/JavaScript" src="{{ URL::to('/') }}/public/js/forms.js"></script> 
    <!-- jQuery library -->
    <script src="{{ URL::to('/') }}/public/js/jquery.min.js"></script>
    <script src="{{ URL::to('/') }}/public/js/priceFormat.js"></script>

    <!-- Main style sheet -->
    <link href="{{ URL::to('/') }}/public/css/style.css" rel="stylesheet">  
    <link href="{{ URL::to('/') }}/public/css/customize.css" rel="stylesheet"> 

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!-- !Important notice -->
  <!-- Only for product page body tag have to added .productPage class -->
  <body class="productPage">  
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-86220808-1', 'auto');
        ga('send', 'pageview');

      </script>
   <!-- wpf loader Two -->
    <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div> 
    <!-- / wpf loader Two -->       
 <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->


  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>+8497-361-9398</p>
                </div>
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/trang-ca-nhan') }}"><i class="glyphicon glyphicon-user"></i>Trang cá nhân</a></li>
                                <li><a href="{{ url('/quan-ly-tai-khoan') }}"><i class="glyphicon glyphicon-sort"></i>Quản lý giao dịch</a></li>
                                <li><a href="{{ url('/nap-tien') }}"><i class="glyphicon glyphicon-usd"></i>Nạp tiền</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="glyphicon glyphicon-log-out"></i>Thoát</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="{{ URL::to('/') }}/">
                  <span class="fa fa-home"></span>
                  <p>chodatso<strong>.com</strong> <span>Kết nối ngay lập tức</span><span>người bán với người mua</span></p>
                </a>
                <!-- img based logo -->
                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->
              
              <!-- search box -->
              <!-- <div class="aa-search-box">
                <form action="">
                  <input type="text" name="" id="" placeholder="">
                  <button type="submit"><span class="fa fa-search"></span></button>
                </form>
              </div> -->
              <!-- / search box -->             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->
  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="{{ URL::to('/') }}/"><span class="fa fa-home"></span></a></li>
<!--               <li><a href="{{ URL::to('/') }}/">Muốn bán</span></a></li>
              <li><a href="{{ URL::to('/') }}/">Cho thuê</span></a></li>
              <li><a href="/nha-dat-can-mua">Cần mua</span></a></li>
              <li><a href="{{ URL::to('/') }}/nha-dat-can-thue">Cần thuê</a></li> -->
              <li><a href="{{ URL::to('/') }}/xay-dung">Xây dựng</a></li>
              <li><a href="{{ URL::to('/') }}/kien-truc">Kiến trúc</a></li>
              <li><a href="{{ URL::to('/') }}/noi-that">Nội thất</a></li>
              <li><a href="{{ URL::to('/') }}/ngoai-that">Ngoại thất</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
  </section>
  <!-- / menu -->  
 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner" class="banner-image">
    
  </section>
  <!-- / catg header banner section -->
<div class="clear-fix"></div>

<div class="container-fluid">    
    <div class="row">
        <div class="col-md-12">
            @yield('content')
        </div>
    </div>
</div>

  <!-- footer -->  
  <footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-4">
                <div class="aa-footer-widget">
                  <h3>Trang chính</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="{{ URL::to('/') }}/">Trang chủ</a></li>
                    <li><a href="{{ URL::to('/') }}/">Dịch vụ đi kèm</a></li>
                    <li><a href="{{ URL::to('/') }}/">Các sản phẩm</a></li>
                    <li><a href="{{ URL::to('/') }}/">Thông tin về công ty</a></li>
                    <li><a href="{{ URL::to('/') }}/">Trang liên hệ</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-4">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Dịch vụ cơ bản</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="{{ URL::to('/') }}/nha-chua-duyet">Nhà chưa duyệt</a></li>
                      <li><a href="{{ URL::to('/') }}/nha-da-ban">Nhà đã bán</a></li>
                      <li><a href="{{ URL::to('/') }}/khach-quan-tam">Khách quan tâm</a></li>
                      <li><a href="#">Phản hồi khách mua</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-4">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Trang trợ giúp</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="{{ URL::to('/') }}/price-policy">Báo giá sản phẩm</a></li>
                      <li><a href="{{ URL::to('/') }}/privacy-policy">Chính sách bảo mật</a></li>
                      <li><a href="{{ URL::to('/') }}/terms-of-service">Điều khoản dịch vụ</a></li>
                      <li><a href="{{ URL::to('/') }}/questions-and-answers">Câu hỏi thường gặp</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Liên hệ với chúng tôi</h3>
                    <address>
                      <p> Số 138 - tổ 11 - Đông Anh - Hà Nội</p>
                      <p><span class="fa fa-phone"></span>+84 973 619 398</p>
                      <p><span class="fa fa-envelope"></span>chodatso@gmail.com</p>
                    </address>
                    <div class="aa-footer-social">
                      <a href="https://www.facebook.com/chodatso/"><span class="fa fa-facebook"></span></a>
                      <a href="https://twitter.com/chodatso"><span class="fa fa-twitter"></span></a>
                      <a href="https://plus.google.com/u/0/102629724998264921694"><span class="fa fa-google-plus"></span></a>
                      <!-- <a href="#"><span class="fa fa-youtube"></span></a> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
  </footer>
  <!-- / footer -->
  <!-- Login Modal -->  
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Đăng nhập</h4>
          <form class="aa-login-form" action="includes/process_login.php" method="post" name="login_form">
            <label for="">Email<span>*</span></label>
            <input type="text" name="email" placeholder="Email" />
            <label for="">Password<span>*</span></label>
            <input type="password" name="password" placeholder="Password"/>
            <div><button class="aa-browse-btn" type="button" onclick="formhash(this.form, this.form.password);">Đăng nhập</button></div>
            <div class="aa-lost-password"><a href="#">Quên mật khẩu!</a></div>
            <div class="aa-register-now">
              Nếu bạn không có tài khoản?<a href="{{ URL::to('/') }}/register.php">Đăng kí ngay!</a>
            </div>
          </form>
        </div>                        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>

  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="{{ URL::to('/') }}/public/js/bootstrap.js"></script>  
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="{{ URL::to('/') }}/public/js/jquery.smartmenus.js"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="{{ URL::to('/') }}/public/js/jquery.smartmenus.bootstrap.js"></script>  
  <!-- Custom js -->
  <script src="{{ URL::to('/') }}/public/js/custom.js"></script> 
  <script type="text/javascript">
    $(document).ready(function(){
      $("#tinh").change(function() {
        var tinhId = $("#tinh").val();
        var request = $.ajax({
          url: "{{ URL::to('/') }}/getHuyen/"+tinhId,
          method: "GET",
          dataType: "html"
        });
         
        request.done(function( msg ) {
          $( "#huyen" ).html( msg );
        });
         
        request.fail(function( jqXHR, textStatus ) {
          alert( "Request failed: " + textStatus );
        });
      });

      // $(".price-format").priceFormat({
      //     prefix: '',
      //     suffix: '',
      //     centsSeparator: ',',
      //     thousandsSeparator: '.',
      //     centsLimit: 0
      // });
    });
  </script> 

  </body>
</html>
