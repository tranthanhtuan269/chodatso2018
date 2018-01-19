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
    <meta name="google-site-verification" content="vjUotcB0Mrw3NVPiKaTE6ipwe9L_OmOih-cYbuwlCDA" />
    
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

    <script src="{{ URL::to('/') }}/public/dist/js/unslider-min.js"></script>
    <link rel="stylesheet" href="{{ URL::to('/') }}/public/dist/css/unslider.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/public/dist/css/unslider-dots.css">

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
                        <li><a href="{{ url('/login') }}">Đăng nhập</a></li>
                        <li><a href="{{ url('/register') }}">Đăng ký</a></li>
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
    <form class="form-horizontal col-sm-offset-1 col-sm-4 hide-with-small" style="border-radius: 6px;padding-top: 8px;margin-top: 5px;background: rgba(255,255,255,0.5);" action="{{URL::to('/')}}/tim-kiem-nguoi-mua" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
        <label for="loaibds" class="col-sm-5 control-label">Loại BĐS</label>
        <div class="col-sm-7">
          <select class="form-control" id="loaibds" name="loaibds"><option value="0">--Chọn loại nhà--</option><option value="1">Nhà mặt phố</option><option value="2">Nhà ngõ, hẻm</option><option value="3">Biệt thự</option><option value="4">Căn hộ chung cư</option><option value="5">Phòng trọ, nhà trọ</option><option value="6">Văn phòng</option><option value="7">Kho, xưởng</option><option value="8">Nhà hàng, khách sạn</option><option value="9">Shop, kiot, quán</option><option value="10">Trang trại</option><option value="11">Mặt bằng</option><option value="12">Đất</option><option value="13">Đất nền, phân lô</option><option value="14">Đất nông, lâm nghiệp</option><option value="15">Các loại khác</option></select>
        </div>
      </div>
      <div class="form-group">
        <label for="tinh" class="col-sm-5 control-label">Tỉnh / Thành phố</label>
        <div class="col-sm-7">
          <select class="form-control" id="tinh" name="tinh"><option value="0">--Chọn Tỉnh / Thành Phố--</option><option value="1">Hà Nội</option><option value="2">Hồ Chí Minh</option><option value="3">Đà Nẵng</option><option value="4">Hải Phòng</option><option value="5">Cần Thơ</option><option value="6">An Giang</option><option value="7">Bà Rịa Vũng Tàu</option><option value="8">Bạc Liêu</option><option value="9">Bắc Cạn</option><option value="10">Bắc Giang</option><option value="11">Hải Dương</option><option value="12">Bắc Ninh</option><option value="13">Bến Tre</option><option value="14">Bình Dương</option><option value="15">Bình Định</option><option value="16">Bình Phước</option><option value="17">Bình Thuận</option><option value="18">Cà Mau</option><option value="19">Cao Bằng</option><option value="20">Đắk Lắk</option><option value="21">Đăk Nông</option><option value="22">Điện Biên</option><option value="23">Đồng Nai</option><option value="24">Đồng Tháp</option><option value="25">Gia Lai</option><option value="26">Hà Giang</option><option value="27">Hà Nam</option><option value="28">Hà Tĩnh</option><option value="29">Hậu Giang</option><option value="30">Hòa Bình</option><option value="31">Hưng Yên</option><option value="32">Khánh Hòa</option><option value="33">Kiên Giang</option><option value="34">Kon Tum</option><option value="35">Lai Châu</option><option value="36">Lâm Đồng</option><option value="37">Lạng Sơn</option><option value="38">Lào Cai</option><option value="39">Long An</option><option value="40">Nam Định</option><option value="41">Nghệ An</option><option value="42">Ninh Bình</option><option value="43">Ninh Thuận</option><option value="44">Phú Thọ</option><option value="45">Phú Yên</option><option value="46">Quảng Bình</option><option value="47">Quảng Nam</option><option value="48">Quảng Ngãi</option><option value="49">Quảng Ninh</option><option value="50">Quảng Trị</option><option value="51">Sóc Trăng</option><option value="52">Sơn La</option><option value="53">Tây Ninh</option><option value="54">Thái Bình</option><option value="55">Thái Nguyên</option><option value="56">Thanh Hóa</option><option value="57">Huế</option><option value="58">Tiền Giang</option><option value="59">Trà Vinh</option><option value="60">Tuyên Quang</option><option value="61">Vĩnh Long</option><option value="62">Vĩnh Phúc</option><option value="63">Yên Bái</option></select>
        </div>
      </div>
      <div class="form-group">
        <label for="huyen" class="col-sm-5 control-label">Quận / Huyện</label>
        <div class="col-sm-7">
          <select class="form-control" id="huyen" name="huyen"><option value="0">--Chọn Quận / Huyện--</option></select>
        </div>
      </div>
      <div class="form-group">
        <label for="gia" class="col-sm-5 control-label">Mức giá</label>
        <div class="col-sm-7">
          <select class="form-control" name="gia">
            <option value="0">--Chọn mức giá--</option>
            <option value="1">Dưới 1 tỷ</option>
            <option value="2">Từ 1 tới 3 tỷ</option>
            <option value="3">Từ 3 tới 5 tỷ</option>
            <option value="4">Từ 5 tới 10 tỷ</option>
            <option value="5">Hơn 10 tỷ</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="dien_tich" class="col-sm-5 control-label">Diện tích</label>
        <div class="col-sm-7">
          <select class="form-control" name="dien_tich">
            <option value="0">--Chọn diện tích--</option>
            <option value="1">Dưới 30 m2</option>
            <option value="2">Từ 30 tới 50 m2</option>
            <option value="3">Từ 50 tới 100 m2</option>
            <option value="4">Từ 100 tới 300 m2</option>
            <option value="5">Hơn 300 m2</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="huong" class="col-sm-5 control-label">Hướng nhà</label>
        <div class="col-sm-7">
          <select class="form-control" name="huong_nha"><option value="0">--Chọn hướng nhà--</option><option value="1">Không xác định</option><option value="2">Đông</option><option value="3">Tây</option><option value="4">Nam</option><option value="5">Bắc</option><option value="6">Đông Nam</option><option value="7">Đông Bắc</option><option value="8">Tây Nam</option><option value="9">Tây Bắc</option></select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-5 col-sm-7">
          <button type="submit" class="btn btn-default">Tìm kiếm</button>
        </div>
      </div>
    </form>
  </section>
  <!-- / catg header banner section -->
<div class="clearfix"></div>

<div class="container-fluid">    
    <div class="row">
        <div class="col-md-9">
            @yield('content')
        </div>
        <div class="col-md-3 sidebar-left">
          @if (Auth::guest())
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">KHU VỰC</h3>
                </div>
                <ul class="list-group">
                    <li class="list-group-item"><?php echo link_to_action('KhuvucController@show', $title = "Hà Nội", $parameters = array("id"=>1), $attributes = array()); ?></li>
                    <li class="list-group-item"><?php echo link_to_action('KhuvucController@show', $title = "TP.Hồ Chí Minh", $parameters = array("id"=>2), $attributes = array()); ?></li>
                    <li class="list-group-item"><?php echo link_to_action('KhuvucController@show', $title = "Đà Nẵng", $parameters = array("id"=>3), $attributes = array()); ?></li>
                    <li class="list-group-item"><?php echo link_to_action('KhuvucController@show', $title = "Bình Dương", $parameters = array("id"=>14), $attributes = array()); ?></li>
                </ul>
            </div>
            @else
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">QUẢN LÝ</h3>
                </div>
                <ul class="list-group">
                    <?php if(\Auth::user()->coins <= 0){ ?>
                    <li class="list-group-item"><?php echo link_to_action('ActionController@thongbao', $title = "Thông báo(1)", $parameters = array(), $attributes = array('class'=>'red-text')); ?></li>
                    <?php } ?>
                    <li class="list-group-item"><?php echo link_to_action('HomeController@trangcanhan', $title = "Cập nhật thông tin", $parameters = array(), $attributes = array()); ?></li>
                    <li class="list-group-item"><?php echo link_to_action('TinBDSController@index', $title = "Quản lý tin", $parameters = array(), $attributes = array()); ?></li>
                    <li class="list-group-item"><?php echo link_to_action('ActionController@quanlyyeucau', $title = "Quản lý yêu cầu", $parameters = array(), $attributes = array()); ?></li>
                    <li class="list-group-item"><?php echo link_to_action('HomeController@quanlytaikhoan', $title = "Quản lý tài khoản", $parameters = array(), $attributes = array()); ?></li>
                    <li class="list-group-item"><?php echo link_to_action('ActionController@naptien', $title = "Nạp tiền", $parameters = array(), $attributes = array()); ?></li>
                    <li class="list-group-item">
                      {{ link_to_route('tinbds.create', 'Đăng tin') }}
                    </li>
                </ul>
            </div>
          @endif 
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
