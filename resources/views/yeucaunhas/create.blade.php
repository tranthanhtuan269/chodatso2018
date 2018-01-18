@extends('layouts.app_dang_tin')

@section('title')
    chodatso.com | Đăng nhu cầu mua nhà
@stop

@section('description')
    Đăng nhu cầu mua nhà
@stop
@section('content')

<!-- include libraries(jQuery, bootstrap) -->
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 

<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>

<h1 class="text-center">Đăng yêu cầu mua nhà</h1>
<hr>

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif

{!! Form::open([
    'route' => 'yeucaunha.store','method'=>'POST', 'class' => 'form-horizontal', 'id' => 'create_tinbds'
]) !!}
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
    {!! Form::label('tinh', 'Tên tỉnh / thành phố:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        <select class="form-control" id="tinhSelect" name="tinh"><option value="0">--Chọn Tỉnh / Thành Phố--</option><option value="1">Hà Nội</option><option value="2">Hồ Chí Minh</option><option value="3">Đà Nẵng</option><option value="4">Hải Phòng</option><option value="5">Cần Thơ</option><option value="6">An Giang</option><option value="7">Bà Rịa Vũng Tàu</option><option value="8">Bạc Liêu</option><option value="9">Bắc Cạn</option><option value="10">Bắc Giang</option><option value="11">Hải Dương</option><option value="12">Bắc Ninh</option><option value="13">Bến Tre</option><option value="14">Bình Dương</option><option value="15">Bình Định</option><option value="16">Bình Phước</option><option value="17">Bình Thuận</option><option value="18">Cà Mau</option><option value="19">Cao Bằng</option><option value="20">Đắk Lắk</option><option value="21">Đăk Nông</option><option value="22">Điện Biên</option><option value="23">Đồng Nai</option><option value="24">Đồng Tháp</option><option value="25">Gia Lai</option><option value="26">Hà Giang</option><option value="27">Hà Nam</option><option value="28">Hà Tĩnh</option><option value="29">Hậu Giang</option><option value="30">Hòa Bình</option><option value="31">Hưng Yên</option><option value="32">Khánh Hòa</option><option value="33">Kiên Giang</option><option value="34">Kon Tum</option><option value="35">Lai Châu</option><option value="36">Lâm Đồng</option><option value="37">Lạng Sơn</option><option value="38">Lào Cai</option><option value="39">Long An</option><option value="40">Nam Định</option><option value="41">Nghệ An</option><option value="42">Ninh Bình</option><option value="43">Ninh Thuận</option><option value="44">Phú Thọ</option><option value="45">Phú Yên</option><option value="46">Quảng Bình</option><option value="47">Quảng Nam</option><option value="48">Quảng Ngãi</option><option value="49">Quảng Ninh</option><option value="50">Quảng Trị</option><option value="51">Sóc Trăng</option><option value="52">Sơn La</option><option value="53">Tây Ninh</option><option value="54">Thái Bình</option><option value="55">Thái Nguyên</option><option value="56">Thanh Hóa</option><option value="57">Huế</option><option value="58">Tiền Giang</option><option value="59">Trà Vinh</option><option value="60">Tuyên Quang</option><option value="61">Vĩnh Long</option><option value="62">Vĩnh Phúc</option><option value="63">Yên Bái</option></select>
    </div>
</div>

<div class="form-group">
    {!! Form::label('huyen', 'Tên quận / huyện:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
    <select class="form-control" id="huyenSelect" name="huyen"><option value="0">--Chọn Quận / Huyện--</option></select>
    </div>
</div>

<div class="form-group">
    {!! Form::label('phuong', 'Tên phường / xã:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
    <select class="form-control" id="phuongSelect" name="phuong"><option value="0">--Chọn Phường / Xã --</option></select>
    </div>
</div>

<div class="form-group">
    {!! Form::label('duong', 'Tên đường:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        <select class="form-control" id="duongSelect" name="duong"><option value="0">--Chọn Đường / Phố --</option></select>
    </div>
</div>

<div class="form-group sr-only">
    {!! Form::label('duan', 'Tên dự án:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        <select class="form-control" id="duanSelect" name="duan"><option value="0">--Chọn Dự án--</option></select>
    </div>
</div>

<hr />
<div class="form-group">
    {!! Form::label('tam_tien', 'Tầm tiền:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
    {!! Form::number('tam_tien', null, ['class' => 'form-control', 'placeholder' => 'Tầm tiền (VNĐ)']) !!}
    </div>
    <div class="col-sm-5 price-sub"><span>0 Tỷ đồng</span></div>
</div>

<div class="form-group">
    {!! Form::label('loaibds', 'Loại BĐS:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
    {!! Form::select('loaibds', $loaibdss, null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('dien_tich', 'Diện tích:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
    {!! Form::number('dien_tich', null, ['class' => 'form-control', 'placeholder' => 'Diện tích (m2)']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('mat_tien', 'Mặt tiền:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
    {!! Form::number('mat_tien', null, ['class' => 'form-control', 'placeholder' => 'Mặt tiền (m)']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('duong_vao', 'Đường vào:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
    {!! Form::number('duong_vao', null, ['class' => 'form-control', 'placeholder' => 'Đường vào (m)']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('huong', 'Hướng nhà:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
    {!! Form::select('huong_nha', $huongs, null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('tang', 'Số tầng:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
    {!! Form::number('tang', null, ['class' => 'form-control', 'placeholder' => 'Số tầng']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('phong_ngu', 'Số phòng ngủ:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
    {!! Form::number('phong_ngu', null, ['class' => 'form-control', 'placeholder' => 'Số phòng ngủ']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('phong_khach', 'Số phòng khách:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
    {!! Form::number('phong_khach', null, ['class' => 'form-control', 'placeholder' => 'Số phòng khách']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('wc', 'Nhà vệ sinh:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
    {!! Form::number('wc', null, ['class' => 'form-control', 'placeholder' => 'Số nhà vệ sinh']) !!}
    </div>
</div>

<hr />

<div class="form-group">
    {!! Form::label('kinh_doanh', 'Nhu cầu:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-2">
    {!! Form::label('mua_gap', 'Mua gấp', ['class' => 'control-label']) !!}
    {{ Form::checkbox('mua_gap', 1, true) }}
    </div>
    <div class="col-sm-3">
    {!! Form::label('kinh_doanh', 'Để kinh doanh', ['class' => 'control-label']) !!}
    {{ Form::checkbox('kinh_doanh', 1, true) }}
    </div>
    <div class="col-sm-3">
    {!! Form::label('dau_tu', 'Để đầu tư', ['class' => 'control-label']) !!}
    {{ Form::checkbox('dau_tu', 1, true) }}
    </div>
    <div class="col-sm-2">
    {!! Form::label('de_o', 'Để ở', ['class' => 'control-label']) !!}
    {{ Form::checkbox('de_o', 1, true) }}
    </div>
</div>

<div class="form-group">
    {!! Form::label('yeu_cau', 'Mô tả:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('yeu_cau', null, ['class' => 'form-control summernote', 'placeholder' => 'Mô tả yêu cầu']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    {!! Form::submit('Tạo mới', ['class' => 'btn btn-primary']) !!}
    <div class="btn btn-default"><a href="{{URL::to('/')}}/tim-nha-ban">Danh sách tin</a></div>
</div>

{!! Form::close() !!}
</div>

<script type="text/javascript">
$(document).ready(function(){
    $("#tam_tien").on('keyup keypress', function(e) {
      if($("#tam_tien").val().length > 13){
          $("#tam_tien").val($("#tam_tien").val().substring(0,13));
      }
      $('.price-sub span').html($(this).val() / 1000000000);
    });
    
  $('#create_tinbds').on('keyup keypress', function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) { 
      e.preventDefault();
      return false;
    }
  });
  
  $("#tam_tien").on('keyup keypress', function(e) {
      if($("#tam_tien").val().length > 8){
          $("#tam_tien").val($("#tam_tien").val().substring(0,8));
      }
      if($(this).val() > 0 && $(this).val() < 1000) $('.price-sub span').html($(this).val() + " Triệu đồng");
      if($(this).val() >= 1000) $('.price-sub span').html($(this).val() / 1000 + " Tỉ đồng");
      //$('.price-sub span').html($(this).val() / 1000000);
  });

  $("#tinhSelect").change(function() {
    var tinhId = $("#tinhSelect").val();
    var request = $.ajax({
      url: "{{ URL::to('/') }}/getHuyen/"+tinhId,
      method: "GET",
      dataType: "html"
    });
     
    request.done(function( msg ) {
      $( "#huyenSelect" ).html( msg );
      $( "#phuongSelect" ).html('<option value="0">--Chọn Phường / Xã --</option>');
      $( "#duongSelect" ).html('<option value="0">--Chọn Đường / Phố --</option>');
      $( "#duanSelect" ).html('<option value="0">--Chọn Dự án--</option>');
    });
     
    request.fail(function( jqXHR, textStatus ) {
      alert( "Request failed: " + textStatus );
    });
  });

  $("#huyenSelect").change(function() {
    var huyenId = $("#huyenSelect").val();
    var request = $.ajax({
      url: "{{ URL::to('/') }}/getPhuong/"+huyenId,
      method: "GET",
      dataType: "html"
    });
     
    request.done(function( msg ) {
        $( "#phuongSelect" ).html( msg );
        var request = $.ajax({
            url: "{{ URL::to('/') }}/getDuong/"+huyenId,
            method: "GET",
            dataType: "html"
        });
        request.done(function( msg ) {
            $( "#duongSelect" ).html( msg );
            var request = $.ajax({
                url: "{{ URL::to('/') }}/getDuan/"+huyenId,
                method: "GET",
                dataType: "html"
            });
            request.done(function( msg ) {
                $( "#duanSelect" ).html( msg );
            });
             
            request.fail(function( jqXHR, textStatus ) {
              alert( "Request failed: " + textStatus );
            });
        });
         
        request.fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });
    });
     
    request.fail(function( jqXHR, textStatus ) {
        alert( "Request failed: " + textStatus );
    });
  });
  
  $('.summernote').summernote({
    height:300,
  });
  
  
});
</script> 



@stop