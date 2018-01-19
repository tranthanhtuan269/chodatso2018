@extends('layouts.app_nha_ban')

@section('content')

<h1 class="text-center">DANH SÁCH NHÀ BÁN</h1>
<hr>
<div class="panel panel-default">
    <div class="row end-row">
    <?php 
    if(count($tinmns) > 0){
        foreach ($tinmns as $tinbds) {
            $images = [];
            if($tinbds->images != ""){
                $temp = substr($tinbds->images,0,-1);
                $images = explode( ';', $temp ); 
            }
    ?>
        <div class="col-xs-12 col-md-3 col-sm-12 image-product">
            <?php if(sizeof($images) > 0){ ?>
            <a href="{{URL::to('/')}}/{{ $tinbds->id }}"><img src="{{ URL::to('/') }}/images/{{ $images[0] }}" class="img-thumbnail" alt="Responsive image"></a>
            <?php }else{ ?>
            <a href="{{URL::to('/')}}/{{ $tinbds->id }}"><img src="{{ URL::to('/') }}/images/home128_3.png" class="img-thumbnail" alt="Responsive image"></a>
            <?php } ?>
            <div class="row"> 
                <div class="col-xs-12 col-md-12 col-sm-12 price-prod"><span class="price-product"> @if($tinbds->gia / 1000000000 < 1) {{ $tinbds->gia / 1000000 }} triệu @else {{ $tinbds->gia / 1000000000 }} tỷ @endif </span> - <span class="size-product">{{ $tinbds->dien_tich }} m<sup>2</sup></span></div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-12 col-sm-12 address-product">{{$tinbds->ten_huyen}} - {{$tinbds->ten_tinh}}.</div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-12 col-sm-12">
                    <h4 class="title-product"><a href="{{URL::to('/')}}/{{ $tinbds->id }}">{{ $tinbds->tieu_de }}</a></h4>
                </div>
            </div>
        </div>
    <?php 
    }
    ?>
    
    
    <?php }else{ ?>
        <div class="col-xs-12 col-md-12 col-sm-12 text-center">Hiện chưa có bất động sản nào được duyệt bán!</div>
    <?php } ?>
        
    </div>
    <div class="row text-center">
        {{ $tinmns->links() }}
    </div>
    
    <div class="row text-center end-row">
        <a href="{{ url('/') }}" class="btn btn-default">Trở về trang chủ</a>
        {!! link_to(URL::previous(), 'Trở về trang trước', ['class' => 'btn btn-default']) !!}
    </div>
</div>
        
@endsection
