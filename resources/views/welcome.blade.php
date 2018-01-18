<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>chodatso.com | Kết nối nhanh nhất người bán với người mua</title>
    <meta name="description" content="@yield('description')">
    <meta name='revisit-after' content='1 days' />
    <meta name="google-site-verification" content="vjUotcB0Mrw3NVPiKaTE6ipwe9L_OmOih-cYbuwlCDA" />

    <!-- Bootstrap -->
    <link href="{{ URL::to('/') }}/public/css/bootstrap.css" rel="stylesheet">   

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="{{ URL::to('/') }}/public/css/customize.css" rel="stylesheet">   
  </head>
  <body style="height:100vh; width: 100vw;">
    <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-86220808-1', 'auto');
          ga('send', 'pageview');

    </script>
    <div class="container-fluid background-chodatso">
        <div class="row welcome-row row1">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
                <span class="text-category">Bên Bán</span>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
                <span class="text-category">Bên Mua</span>
            </div>
        </div>
        <div class="row welcome-row row2">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center ip-margin">
                <span class="text-pro"><a href="{{URL::to('/')}}/tinbds/create">Đăng bán nhà</a></span>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center ip-margin">
                <span class="text-pro"><a href="{{URL::to('/')}}/tim-nguoi-mua">Tìm người mua</a></span>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center ip-margin">
                <span class="text-pro"><a href="{{URL::to('/')}}/yeucaunha/create">Đăng nhu cầu</a></span>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center ip-margin">
                <span class="text-pro"><a href="{{URL::to('/')}}/tim-nha-ban">Tìm nhà bán</a></span>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ URL::to('/') }}/public/js/bootstrap.js"></script>  
  </body>
</html>