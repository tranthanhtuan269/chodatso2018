@extends('layouts.app')

@section('title')
    chodatso.com | Danh sách yêu cầu
@stop

@section('description')
    Danh sách yêu cầu
@stop

@section('content')

<h1 class="text-center">Danh sách yêu cầu</h1>
<hr>

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif

<div class="row">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th width="20%">Tỉnh / Thành Phố</th>
                <th width="20%">Quận / Huyện</th>
                <th width="20%">Diện tích < m2 ></th>
                <th width="20%">Tầm tiền < triệu đồng ></th>
                <th width="20%"></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($yeucaus as $yeucau)
                <tr>
                    <td>{{ $yeucau->ten_tinh }}</td>
                    <td>{{ $yeucau->ten_huyen }}</td>
                    <td>{{ $yeucau->dien_tich }}</td>
                    <td>{{ $yeucau->tam_tien/1000000 }}</td>
                    <td>
                        <div>
                        <a class="btn btn-primary btn-xed" href="{{URL::to('/')}}/yeucaunha/{{ $yeucau->id }}">Xem</a>
                        {{ link_to_route('yeucaunha.edit', 'Sửa', array($yeucau->id), array('class' => 'btn btn-info btn-xed')) }}
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('yeucaunha.destroy', $yeucau->id)))}}                       
                        {{ Form::submit('Xóa', array('class' => 'btn btn-danger btn-xed')) }}
                        {{ Form::close() }}
                        </div>
                        <div class="clear-fix"></div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<hr />

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 "></div>
    
</div>

<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title text-center">Thêm yêu cầu</h3>
        </div>
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="form-group">
                <label for="inputTinh" class="col-sm-2 control-label">Tỉnh / Thành Phố</label>
                <div class="col-sm-10">
                    <select class="form-control" id="tinhSelect" name="tinh"><option value="0">--Chọn Tỉnh / Thành Phố--</option><option value="1">Hà Nội</option><option value="2">Hồ Chí Minh</option><option value="3">Đà Nẵng</option><option value="4">Hải Phòng</option><option value="5">Cần Thơ</option><option value="6">An Giang</option><option value="7">Bà Rịa Vũng Tàu</option><option value="8">Bạc Liêu</option><option value="9">Bắc Cạn</option><option value="10">Bắc Giang</option><option value="11">Hải Dương</option><option value="12">Bắc Ninh</option><option value="13">Bến Tre</option><option value="14">Bình Dương</option><option value="15">Bình Định</option><option value="16">Bình Phước</option><option value="17">Bình Thuận</option><option value="18">Cà Mau</option><option value="19">Cao Bằng</option><option value="20">Đắk Lắk</option><option value="21">Đăk Nông</option><option value="22">Điện Biên</option><option value="23">Đồng Nai</option><option value="24">Đồng Tháp</option><option value="25">Gia Lai</option><option value="26">Hà Giang</option><option value="27">Hà Nam</option><option value="28">Hà Tĩnh</option><option value="29">Hậu Giang</option><option value="30">Hòa Bình</option><option value="31">Hưng Yên</option><option value="32">Khánh Hòa</option><option value="33">Kiên Giang</option><option value="34">Kon Tum</option><option value="35">Lai Châu</option><option value="36">Lâm Đồng</option><option value="37">Lạng Sơn</option><option value="38">Lào Cai</option><option value="39">Long An</option><option value="40">Nam Định</option><option value="41">Nghệ An</option><option value="42">Ninh Bình</option><option value="43">Ninh Thuận</option><option value="44">Phú Thọ</option><option value="45">Phú Yên</option><option value="46">Quảng Bình</option><option value="47">Quảng Nam</option><option value="48">Quảng Ngãi</option><option value="49">Quảng Ninh</option><option value="50">Quảng Trị</option><option value="51">Sóc Trăng</option><option value="52">Sơn La</option><option value="53">Tây Ninh</option><option value="54">Thái Bình</option><option value="55">Thái Nguyên</option><option value="56">Thanh Hóa</option><option value="57">Huế</option><option value="58">Tiền Giang</option><option value="59">Trà Vinh</option><option value="60">Tuyên Quang</option><option value="61">Vĩnh Long</option><option value="62">Vĩnh Phúc</option><option value="63">Yên Bái</option></select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputHuyen" class="col-sm-2 control-label">Quận / Huyện</label>
                <div class="col-sm-10">
                    <select class="form-control" id="huyenSelect" name="huyen"><option value="0">--Chọn Quận / Huyện--</option></select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Diện tích</label>
                <div class="col-sm-10">
                    {!! Form::number('dien_tich', null, ['id'=>'dien_tich' ,'class' => 'form-control', 'placeholder' => 'Diện tích (m2)']) !!}
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Tầm tiền</label>
                <div class="col-sm-10">
                    {!! Form::number('tam_tien', null, ['id'=>'tam_tien', 'class' => 'form-control', 'placeholder' => 'Tầm tiền (Triệu VNĐ)']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" id="add-yeu-cau" class="btn btn-primary">Thêm yêu cầu</button>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $("#tinhSelect").change(function() {
        var tinhId = $("#tinhSelect").val();
        var request = $.ajax({
          url: "{{ URL::to('/') }}/getHuyen/"+tinhId,
          method: "GET",
          dataType: "html"
        });

        request.done(function( msg ) {
          $( "#huyenSelect" ).html( msg );
        });

        request.fail(function( jqXHR, textStatus ) {
          alert( "Request failed: " + textStatus );
        });
    });
    
    $("#add-yeu-cau").click(function(){
       if($("#tinhSelect").val() == 0){
           alert("Quý khách cần chọn 1 Tỉnh / Thành phố");
           return;
       }else if($("#dien_tich").val() == ""){
           alert("Quý khách chưa nhập diện tích mong muốn!");
           return;
       }else if($("#tam_tien").val() == ""){
           alert("Quý khách chưa nhập tầm tiền muốn mua!");
           return;
       }
       
       var request = $.ajax({
          url: "{{ URL::to('/') }}/create-yeu-cau",
          method: "POST",
          data: { 
          '_token': '<?php echo csrf_token(); ?>',
          'tinh': $("#tinhSelect").val(),
          'huyen': $("#huyenSelect").val(),
          'dien_tich': $("#dien_tich").val(),
          'tam_tien': $("#tam_tien").val(),
          },
          dataType: "json"
        });

        request.done(function( msg ) {
          if(msg.code == 1){
          location.reload();
          }else{
          alert("Quá trình lưu trữ bị lỗi, xin hãy liên hệ ban quản trị! Xin lỗi Quý khách về sự bất tiện này!");
          }
        });

        request.fail(function( jqXHR, textStatus ) {
          alert( "Request failed: " + textStatus );
        });
    });
});
</script>
@stop