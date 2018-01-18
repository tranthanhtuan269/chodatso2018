@extends('layouts.app_nha_ban')

@section('title')
    chodatso.com | Danh sách nhà bán
@stop

@section('description')
    Danh sách nhà bán
@stop

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Kết quả tìm kiếm</h3>
    </div>
    <div class="panel-body">
        <div class="row end-row">
        <?php 
            if(count($tinbdss) <= 0) echo "Không tìm thấy bất động sản nào phù hợp!";
            foreach ($tinbdss as $tinbds) {
                //echo $tinbds->tieu_de;
                //echo $tinbds->images;
                //dd($tinbds);
                if($tinbds->images == ''){
                    $images = [];
                }else{
                    $temp = substr($tinbds->images,0,-1);
                    $images = explode( ';', $temp ); 
                }
                //var_dump(sizeof($images));
                
        ?>
            <div class="col-xs-12 col-md-3 col-sm-12 image-product">
                <?php if(sizeof($images) > 0){ ?>
                <a href="{{URL::to('/')}}/{{ $tinbds->tin_id }}"><img src="{{ URL::to('/') }}/public/images/{{ $images[0] }}" class="img-thumbnail" alt="Responsive image"></a>
                <?php }else{ ?>
                <a href="{{URL::to('/')}}/{{ $tinbds->tin_id }}"><img src="{{ URL::to('/') }}/public/images/home128_3.png" class="img-thumbnail" alt="Responsive image"></a>
                <?php } ?>
                <div class="row"> 
                    <div class="col-xs-12 col-md-12 col-sm-12 price-prod"><span class="price-product"> @if($tinbds->gia / 1000000000 < 1) {{ $tinbds->gia / 1000000 }} triệu @else {{ $tinbds->gia / 1000000000 }} tỷ @endif </span> - <span class="size-product">{{ $tinbds->dien_tich }} m<sup>2</sup></span></div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-8 col-sm-12 address-product">{{$tinbds->ten_huyen}} - {{$tinbds->ten_tinh}}.</div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-sm-12">
                        <h4 class="title-product"><a href="{{URL::to('/')}}/{{ $tinbds->tin_id }}">{{ $tinbds->tieu_de }}</a></h4>
                    </div>
                </div>
            </div>
        <?php 
        }
        ?>
        </div>
        <div class="row text-center">
            {{ $tinbdss->links() }}
        </div>
        
        <div class="row text-center">
            <a href="{{ url('/') }}" class="btn btn-default">Trở về trang chủ</a>
            {!! link_to(URL::previous(), 'Trở về trang trước', ['class' => 'btn btn-default']) !!}
        </div>
    </div>
</div>
        
@endsection
