@extends('layouts.app_nha_ban')

@section('title')
    chodatso.com | {{ $tinbds->tieu_de }}
@stop

@section('description')
    {{ $tinbds->tieu_de }}
@stop

@section('content')

<style>
    #galleria{height:640px; width:100%;}
</style>

@if ($tinbds->da_ban == 0)
<h1>{{ $tinbds->tieu_de }}</h1>
@else 
<h1><del>{{ $tinbds->tieu_de }}</del></h1>
@endif
<hr>
<?php //var_dump($tinbds->images); ?>
<div class="panel panel-primary">
    <div class="panel-heading">Mô tả</div>
    <div class="panel-body">
        {{ strip_tags($tinbds->mo_ta) }}
    </div>
</div>

<hr />

<div class="form-group">
   <div id="map"></div>
    <script>
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
      }

    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdqU90Q0avDyQQIEmD8L__zK9v-JpaE9g&libraries=places&callback=initMap">
    </script>
</div>

<hr />

<?php 
    if(strlen($tinbds->images) > 0){
        $temp = substr($tinbds->images,0,-1);
        $images = explode( ';', $temp ); 
?>

<div class="content">
    <div id="galleria">
        <?php 
        foreach ($images as $image) {?>
            <a href="<?php echo URL::to('/') . '/images/' . $image; ?>">
                <img 
                    src="<?php echo URL::to('/') . '/images/' . $image; ?>" 
                    data-big="<?php echo URL::to('/') . '/images/' . $image; ?>"
                    data-title="<?php echo '' . $tinbds->tieu_de; ?>"
                    data-description="<?php echo '' . $tinbds->tieu_de; ?>"
                >
            </a>
        <?php
            }
        ?>
    </div>
</div>
<!--end-->
<?php 
    }
    ?>
<hr />

<div class="panel panel-primary">
    <div class="panel-heading">Thông tin Bất Động Sản</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-6 col-md-2 col-sm-2">Địa chỉ:</div>
            <div class="col-xs-6 col-md-10 col-sm-10"><?php if($tinbds->dia_chi == "") echo "Không xác định"; else echo $tinbds->dia_chi; ?></div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-md-2 col-sm-2">Đường / Phố:</div>
            <div class="col-xs-6 col-md-4 col-sm-4"><?php if($tinbds->duong == "") echo "Không xác định"; else echo $tinbds->ten_duong; ?></div>
            <div class="col-xs-6 col-md-2 col-sm-2">Phường / Xã:</div>
            <div class="col-xs-6 col-md-4 col-sm-4"><?php if($tinbds->phuong == "") echo "Không xác định"; else echo $tinbds->ten_pho; ?></div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-md-2 col-sm-2">Quận / Huyện:</div>
            <div class="col-xs-6 col-md-4 col-sm-4"><?php if($tinbds->huyen == "") echo "Không xác định"; else echo $tinbds->ten_huyen; ?></div>
            <div class="col-xs-6 col-md-2 col-sm-2">Tỉnh / Thành phố:</div>
            <div class="col-xs-6 col-md-4 col-sm-4"><?php if($tinbds->tinh == "") echo "Không xác định"; else echo $tinbds->ten_tinh; ?></div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-md-2 col-sm-2">Diện tích:</div>
            <div class="col-xs-6 col-md-4 col-sm-4"><?php if($tinbds->dien_tich == "") echo "Không xác định"; else echo $tinbds->dien_tich . '  m <sup>2</sup>'; ?></div>
            <div class="col-xs-6 col-md-2 col-sm-2">Giá chào:</div>
            <div class="col-xs-6 col-md-4 col-sm-4"><span class="price-format"> @if($tinbds->gia / 1000000000 < 1) {{ $tinbds->gia / 1000000 }} triệu @else {{ $tinbds->gia / 1000000000 }} tỷ @endif</div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-md-2 col-sm-2">Đường vào:</div>
            <div class="col-xs-6 col-md-4 col-sm-4"><?php if($tinbds->duong_vao == "") echo "Không xác định"; else echo $tinbds->duong_vao . ' m'; ?></div>
            <div class="col-xs-6 col-md-2 col-sm-2">Hướng nhà:</div>
            <div class="col-xs-6 col-md-4 col-sm-4"><?php if($tinbds->huong_nha == "") echo "Không xác định"; else echo $tinbds->ten_huong; ?></div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-md-2 col-sm-2">Số phòng ngủ:</div>
            <div class="col-xs-6 col-md-4 col-sm-4"><?php if($tinbds->phong_ngu == "") echo "Không xác định"; else echo $tinbds->phong_ngu . '  phòng'; ?></div>
            <div class="col-xs-6 col-md-2 col-sm-2">Số phòng khách:</div>
            <div class="col-xs-6 col-md-4 col-sm-4"><?php if($tinbds->phong_khach == "") echo "Không xác định"; else echo $tinbds->phong_khach . '  phòng'; ?></div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-md-2 col-sm-2">Mặt tiền:</div>
            <div class="col-xs-6 col-md-4 col-sm-4"><?php if($tinbds->mat_tien == "") echo "Không xác định"; else echo $tinbds->mat_tien . '  m'; ?></div>
            <div class="col-xs-6 col-md-2 col-sm-2">Nhà vệ sinh:</div>
            <div class="col-xs-6 col-md-4 col-sm-4"><?php if($tinbds->wc == "") echo "Không xác định"; else echo $tinbds->wc . '  phòng'; ?></div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-md-2 col-sm-2">Số tầng:</div>
            <div class="col-xs-6 col-md-4 col-sm-4"><?php if($tinbds->tang == "") echo "Không xác định"; else echo $tinbds->tang . '  tầng'; ?></div>
            <div class="col-xs-6 col-md-2 col-sm-2">Nội thất:</div>
            <div class="col-xs-6 col-md-4 col-sm-4"><?php if($tinbds->noi_that == "") echo "Không xác định"; else echo $tinbds->noi_that; ?></div>
        </div>
    </div>
</div>

<hr>
@if ($tinbds->da_ban == 0)
<button class="btn btn-primary" id="showInfoPanel">Hiện thông tin người bán</button>

<div class="panel panel-primary" id="infoPanel">
    <div class="panel-heading">Thông tin người bán</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12 col-md-3 col-sm-3">
                <?php if(strlen($tinbds->avatar) == 0){ ?>
                    <img src="{{ URL::to('/') }}/public/images/1477801630_User_Yuppie_2.png" class="img-thumbnail" /></td>
                <?php }else{ ?>
                    <img src="{{ URL::to('/') }}/public/images/{{ $tinbds->avatar }}" class="img-thumbnail" /></td>
                <?php }?>
            </div>
            <div class="col-xs-12 col-md-9 col-sm-9">
                <div class="col-xs-4 col-md-4 col-sm-4">Họ và tên</div>
                <div class="col-xs-8 col-md-8 col-sm-8">{{ $tinbds->name }}</div>
                <div class="col-xs-4 col-md-4 col-sm-4">Email</div>
                <div class="col-xs-8 col-md-8 col-sm-8">{{ $tinbds->email }}</div>
                <div class="col-xs-4 col-md-4 col-sm-4">Phone</div>
                <div class="col-xs-8 col-md-8 col-sm-8">{{ $tinbds->phone }}</div>
            </div>
        </div>
    </div>
</div>

<hr />
@endif

<script type="text/javascript">
    $(document).ready(function(){
        // Load the classic theme
        Galleria.loadTheme('{{ URL::to("/") }}/galleria/themes/classic/galleria.classic.min.js');

        // Initialize Galleria
        Galleria.run('#galleria');
        
        $("#infoPanel").hide();
        $("#showInfoPanel").click(function(){
            $("#infoPanel").show();
            $("#showInfoPanel").hide();
            var request = $.ajax({
                url: "{{ URL::to('/') }}/updateCall",
                method: "POST",
                data: { 
                    "id" : {{ $tinbds->tin_id }}, 
                    "_token" : "{!! csrf_token() !!}",
                },
                dataType: "json"
            });
             
            request.done(function( msg ) {
                console.log("Success!")
            });
             
            request.fail(function( jqXHR, textStatus ) {
                alert( "Request failed: " + textStatus );
            });
        });
    });
</script>

@stop