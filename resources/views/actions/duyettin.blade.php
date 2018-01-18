@extends('layouts.app_nha_ban')

@section('content')

<h1 class="text-center">DANH SÁCH NHÀ CHỜ DUYỆT</h1>
<hr>
<div class="panel panel-default">
    
    <?php 
    if(count($tinmns) > 0){
        foreach ($tinmns as $tinbds) {
            $temp = substr($tinbds->images,0,-1);
            //$images = explode( ';', $temp ); 
            
    ?>
    <div class="row end-row a-product" id="{{$tinbds->id}}">
        <div class="col-xs-12 col-sm-12 col-md-3">
            <?php 
                $images = explode( ';', $tinbds->images ); 

                if(count($images) > 1){
            ?>
            <img src="{{ URL::to('/') }}/public/images/{{ $images[0] }}" alt="" width="120px" />
                <?php }else { ?>
            <img src="{{ URL::to('/') }}/public/images/home128_3.png" alt="" width="120px" />
                        <?php } ?>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-9">
            <div class="row">
                <div class="col-xs-3 col-md-3 col-sm-3">Người đăng tin</div>
                <div class="col-xs-9 col-md-9 col-sm-9">{{$tinbds->nguoi_dang}}</div>
            </div>
            <div class="row">
                <div class="col-xs-3 col-md-3 col-sm-3">Email</div>
                <div class="col-xs-9 col-md-9 col-sm-9">{{$tinbds->email}}</div>
            </div>
            <div class="row">
                <div class="col-xs-3 col-md-3 col-sm-3">Số điện thoại</div>
                <div class="col-xs-9 col-md-9 col-sm-9">{{$tinbds->phone}}</div>
            </div>
            <div class="row">
                <div class="col-xs-3 col-md-3 col-sm-3">Mã tin</div>
                <div class="col-xs-9 col-md-9 col-sm-9">{{$tinbds->id}}</div>
            </div>
            <div class="row">
                <div class="col-xs-3 col-md-3 col-sm-3">Actions</div>
                <div class="col-xs-3 col-md-3 col-sm-3"><button class="btn btn-primary accept-btn" data-accept-id="{{$tinbds->id}}">Duyệt tin</button><button class="btn btn-danger remove-btn" data-remove-id="{{$tinbds->id}}">Xóa tin</button></div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <?php 
    }
    ?>
    
    
    <?php }else{ ?>
        <div class="row end-row text-center">Hiện không có bất động sản nào chờ duyệt bán!</div>
    <?php } ?>
        
    <div class="row text-center">
        {{ $tinmns->links() }}
    </div>
    
    <div class="row text-center end-row">
        <a href="{{ url('/') }}" class="btn btn-default">Trở về trang chủ</a>
        {!! link_to(URL::previous(), 'Trở về trang trước', ['class' => 'btn btn-default']) !!}
    </div>
</div>

<script>
$(document).ready(function(){
    $(".accept-btn").click(function(){
        var _sefl = $(this);
        
        var id = $(this).attr('data-accept-id');
        
        var r = confirm("Bạn có chắc chắn duyệt cho tin này!");
        if (r == true) {
            var request = $.ajax({
                url: "{{ URL::to('/') }}/active",
                method: "POST",
                data: { 
                    "id" : id, 
                    "_token" : "{!! csrf_token() !!}",
                },
                dataType: "json"
            });
             
            request.done(function( msg ) {
                console.log("Success!");
                $("#" + id).hide();
            });
             
            request.fail(function( jqXHR, textStatus ) {
                alert( "Request failed: " + textStatus );
            });
        } else {
            
        }
    });
    
    $(".remove-btn").click(function(){
        var _sefl = $(this);
        
        var id = $(this).attr('data-remove-id');
        
        var r = confirm("Bạn có chắc chắn muốn xóa tin này!");
        if (r == true) {
            var request = $.ajax({
                url: "{{ URL::to('/') }}/remove",
                method: "POST",
                data: { 
                    "id" : id, 
                    "_token" : "{!! csrf_token() !!}",
                },
                dataType: "json"
            });
             
            request.done(function( msg ) {
                console.log(msg);
                $("#" + id).hide();
            });
             
            request.fail(function( jqXHR, textStatus ) {
                alert( "Request failed: " + textStatus );
            });
        } else {
            
        }
    });
});
</script>
        
@endsection
