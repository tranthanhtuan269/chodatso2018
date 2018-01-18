@extends('layouts.app')

@section('title')
    chodatso.com | Sửa nhà đăng bán
@stop

@section('description')
    Sửa nhà đăng bán
@stop

@section('content')

<!-- include libraries(jQuery, bootstrap) -->
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 

<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>

<h1 class="text-center">Sửa tin</h1>
<hr>

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-success">
        {{ Session::get('error') }}
    </div>
@endif
<?php //dd($tinbds); ?>
{{ Form::model($tinbds, array('method' => 'PATCH', 'route' => array('tinbds.update', $tinbds->id), 'files'=>true, 'class' => 'form-horizontal')) }}

<div class="form-group">
    {!! Form::label('tieu_de', 'Tiêu đề:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('tieu_de', $tinbds->tieu_de, ['class' => 'form-control', 'placeholder' => 'Tiêu đề tin']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('mo_ta', 'Mô tả:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('mo_ta', $tinbds->mo_ta, ['class' => 'form-control summernote', 'placeholder' => 'Mô tả']) !!}
    </div>
</div>

<hr />

<div class="form-group">
    {!! Form::label('images[]', 'Ảnh:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        <input type="file" name="images1[]" multiple>
    </div>
</div>

<div class="form-group">
    {!! Form::label('loaibds', 'Loại BĐS:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
    {!! Form::select('loaibds', $loaibdss, null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('tinh', 'Tên Tỉnh / Thành Phố:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('tinh', $tinhs, $tinbds->tinh, array('class' => 'form-control', 'id' => 'tinhSelect')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('huyen', 'Tên Quận / Huyện:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('huyen', $huyens, $tinbds->huyen, array('class' => 'form-control', 'id' => 'huyenSelect')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('phuong', 'Tên Phường / Xã:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('phuong', $phuongs, $tinbds->phuong, array('class' => 'form-control', 'id' => 'phuongSelect')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('duong', 'Tên Đường:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('duong', $duongs, $tinbds->duong, array('class' => 'form-control', 'id' => 'duongSelect')) !!}
    </div>
</div>

<div class="form-group sr-only">
    {!! Form::label('duan', 'Tên Dự án:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        <select class="form-control" id="duanSelect" name="duan"><option value="0">--Chọn Dự án--</option></select>
    </div>
</div>

<hr />

<div class="form-group">
    {!! Form::label('gia', 'Giá:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
    {!! Form::number('gia', $tinbds->gia / 1000000, ['class' => 'form-control', 'placeholder' => 'Giá ( VNĐ )', 'maxlength' => 12]) !!}
    </div>
    <div class="col-sm-5 price-sub"><span>0 Tỷ đồng</span></div>
</div>

<div class="form-group">
    {!! Form::label('dien_tich', 'Diện Tích:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
    {!! Form::number('dien_tich', $tinbds->dien_tich, ['class' => 'form-control', 'placeholder' => 'Diện tích ( m2 )']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('dia_chi', 'Số nhà:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
    {!! Form::text('dia_chi', $tinbds->dia_chi, ['class' => 'form-control', 'placeholder' => 'Số nhà']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('mat_tien', 'Mặt tiền:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
    {!! Form::number('mat_tien', $tinbds->mat_tien, ['class' => 'form-control', 'placeholder' => 'Mặt tiền ( m )']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('duong_vao', 'Đường vào:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
    {!! Form::number('duong_vao', $tinbds->duong_vao, ['class' => 'form-control', 'placeholder' => 'Đường vào ( m )']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('huong', 'Hướng nhà:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
    {!! Form::select('huong_nha', $huongs, $tinbds->huong_nha, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('tang', 'Số Tầng:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
    {!! Form::number('tang', $tinbds->tang, ['class' => 'form-control', 'placeholder' => 'Số tầng ( tầng )']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('phong_ngu', 'Số phòng ngủ:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
    {!! Form::number('phong_ngu', $tinbds->phong_ngu, ['class' => 'form-control', 'placeholder' => 'Số phòng ngủ ( phòng )']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('phong_khach', 'Số phòng khách:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
    {!! Form::number('phong_khach', $tinbds->phong_khach, ['class' => 'form-control', 'placeholder' => 'Số phòng khách ( phòng )']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('wc', 'Nhà vệ sinh:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
    {!! Form::number('wc', $tinbds->wc, ['class' => 'form-control', 'placeholder' => 'Số nhà vệ sinh ( phòng )']) !!}
    </div>
</div>

<hr />

<div class="form-group">
    {!! Form::label('noi_that', 'Nội thất:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
    {!! Form::textarea('noi_that', $tinbds->noi_that, ['class' => 'form-control summernote', 'placeholder' => 'Mô tả nội thất']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    <input id="searchBox" class="controls" type="text" placeholder="Tìm địa chỉ">
    {!! Form::text('lat', 21.02744393991086, ['class' => 'form-control', 'id' => 'lat']) !!}
    {!! Form::text('lng', 105.83038324970698, ['class' => 'form-control', 'id' => 'lng']) !!}
    <div id="map"></div>
    <script>
        $(document).ready(function(){
            $('.summernote').summernote('code', '<?php echo $tinbds->mo_ta; ?>');
            
        });
      function initMap() {
        point = {
            lat:{{$tinbds->lat}},
            lng:{{$tinbds->lng}}
        };

        var map = new google.maps.Map(document.getElementById('map'),{
          center:point,
          zoom:15
        });

        var marker = new google.maps.Marker({
          position:point,
          map:map,
          draggable:true
        });

        var searchBox = new google.maps.places.SearchBox(document.getElementById('searchBox'));

        google.maps.event.addListener(searchBox,'places_changed', function(){
          var places = searchBox.getPlaces();
          var bounds = new google.maps.LatLngBounds();
          var i, place;
          for (var i = 0; place = places[i]; i++) {
            bounds.extend(place.geometry.location);
            marker.setPosition(place.geometry.location);
          }

          map.fitBounds(bounds);
          map.setZoom(15);
        });

        google.maps.event.addListener(marker,'position_changed', function(){
          var lat = marker.getPosition().lat();
          var lng= marker.getPosition().lng();

          $("#lat").val(lat);
          $("#lng").val(lng);
        });
      }

    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdqU90Q0avDyQQIEmD8L__zK9v-JpaE9g&libraries=places&callback=initMap">
    </script>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    {{ Form::submit('Lưu', array('class' => 'btn btn-info')) }} 
    {{ link_to_route('tinbds.show', 'Trở lại trang tin', $tinbds->id, array('class' => 'btn btn-default')) }}
</div>

{!! Form::close() !!}
</div>

<script type="text/javascript">
$(document).ready(function(){
    if($("#gia").val() > 0 && $("#gia").val() < 1000) $('.price-sub span').html($("#gia").val() + " Triệu đồng");
    if($("#gia").val() >= 1000) $('.price-sub span').html($("#gia").val() / 1000 + " Tỉ đồng");
  $('#create_tinbds').on('keyup keypress', function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) { 
      e.preventDefault();
      return false;
    }
  });
  
  $("#gia").on('keyup keypress', function(e) {
      if($("#gia").val().length > 8){
          $("#gia").val($("#gia").val().substring(0,8));
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