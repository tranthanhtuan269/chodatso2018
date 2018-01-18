@extends('layouts.app_dang_tin')

@section('title')
    chodatso.com | Sửa một nhu cầu
@stop

@section('description')
    Sửa một nhu cầu
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

{{ Form::model($yeucaunha, array('method' => 'PATCH', 'route' => array('yeucaunha.update', $yeucaunha->id), 'files'=>true, 'class' => 'form-horizontal')) }}
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
    {!! Form::label('tinh', 'Tên tỉnh / thành phố:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('tinh', $tinhs, $yeucaunha->tinh, array('class' => 'form-control', 'id' => 'tinhSelect')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('huyen', 'Tên quận / huyện:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('huyen', $huyens, $yeucaunha->huyen, array('class' => 'form-control', 'id' => 'huyenSelect')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('phuong', 'Tên phường / xã:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('phuong', $phuongs, $yeucaunha->phuong, array('class' => 'form-control', 'id' => 'phuongSelect')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('duong', 'Tên đường:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('duong', $duongs, $yeucaunha->duong, array('class' => 'form-control', 'id' => 'duongSelect')) !!}
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
    {!! Form::number('tam_tien', $yeucaunha->tam_tien / 1000000, ['class' => 'form-control', 'placeholder' => 'Tầm tiền (VNĐ)']) !!}
    </div>
    <div class="col-sm-5 price-sub"><span>0 Tỷ đồng</span></div>
</div>

<div class="form-group">
    {!! Form::label('loaibds', 'Loại BĐS:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
    {!! Form::select('loaibds', $loaibdss, $yeucaunha->loaibds, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('dien_tich', 'Diện tích:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
    {!! Form::number('dien_tich', $yeucaunha->dien_tich, ['class' => 'form-control', 'placeholder' => 'Diện tích (m2)']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('mat_tien', 'Mặt tiền:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
    {!! Form::number('mat_tien', $yeucaunha->mat_tien, ['class' => 'form-control', 'placeholder' => 'Mặt tiền (m)']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('duong_vao', 'Đường vào:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
    {!! Form::number('duong_vao', $yeucaunha->duong_vao, ['class' => 'form-control', 'placeholder' => 'Đường vào (m)']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('huong', 'Hướng nhà:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
    {!! Form::select('huong_nha', $huongs, $yeucaunha->huong_nha, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('tang', 'Số tầng:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
    {!! Form::number('tang', $yeucaunha->tang, ['class' => 'form-control', 'placeholder' => 'Số tầng']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('phong_ngu', 'Số phòng ngủ:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
    {!! Form::number('phong_ngu', $yeucaunha->phong_ngu, ['class' => 'form-control', 'placeholder' => 'Số phòng ngủ']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('phong_khach', 'Số phòng khách:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
    {!! Form::number('phong_khach', $yeucaunha->phong_khach, ['class' => 'form-control', 'placeholder' => 'Số phòng khách']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('wc', 'Nhà vệ sinh:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
    {!! Form::number('wc', $yeucaunha->wc, ['class' => 'form-control', 'placeholder' => 'Số nhà vệ sinh']) !!}
    </div>
</div>

<hr />

<div class="form-group">
    {!! Form::label('kinh_doanh', 'Nhu cầu:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-2">
    {!! Form::label('mua_gap', 'Mua gấp', ['class' => 'control-label']) !!}
    {{ Form::checkbox('mua_gap', 1, $yeucaunha->mua_gap) }}
    </div>
    <div class="col-sm-3">
    {!! Form::label('kinh_doanh', 'Để kinh doanh', ['class' => 'control-label']) !!}
    {{ Form::checkbox('kinh_doanh', 1, $yeucaunha->kinh_doanh) }}
    </div>
    <div class="col-sm-3">
    {!! Form::label('dau_tu', 'Để đầu tư', ['class' => 'control-label']) !!}
    {{ Form::checkbox('dau_tu', 1, $yeucaunha->dau_tu) }}
    </div>
    <div class="col-sm-2">
    {!! Form::label('de_o', 'Để ở', ['class' => 'control-label']) !!}
    {{ Form::checkbox('de_o', 1, $yeucaunha->de_o) }}
    </div>
</div>

<div class="form-group">
    {!! Form::label('yeu_cau', 'Mô tả:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('yeu_cau', $yeucaunha->yeu_cau, ['class' => 'form-control summernote', 'placeholder' => 'Mô tả yêu cầu']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    {!! Form::submit('Lưu lại', ['class' => 'btn btn-primary']) !!}
    <div class="btn btn-default"><a href="{{URL::to('/')}}/tim-nha-ban">Danh sách tin</a></div>
</div>

{!! Form::close() !!}
</div>

<script type="text/javascript">
$(document).ready(function(){
    if($("#tam_tien").val() > 0 && $("#tam_tien").val() < 1000) $('.price-sub span').html($("#tam_tien").val() + " Triệu đồng");
    if($("#tam_tien").val() >= 1000) $('.price-sub span').html($("#tam_tien").val() / 1000 + " Tỉ đồng");
    
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