@extends('layouts.app_nha_ban')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Bán nhà {{ $khuvuc }}</h3>
    </div>
    <div class="panel-body">
        <div class="row end-row">
        <?php 
            foreach ($tinmns as $tinbds) {
                $temp = substr($tinbds->images,0,-1);
                $images = explode( ';', $temp ); 
                
        ?>
            <div class="col-xs-12 col-md-3 col-sm-12 image-product">
                <a href="{{URL::to('/')}}/{{ $tinbds->tin_id }}"><img src="{{ URL::to('/') }}/public/images/{{ $images[0] }}" class="img-thumbnail" alt="Responsive image"></a>
                <div class="row"> 
                    <div class="col-xs-12 col-md-12 col-sm-12 price-prod"><span class="price-product">{{ $tinbds->gia / 1000000000 }} tỷ </span> - <span class="size-product">{{ $tinbds->dien_tich }} m<sup>2</sup></span></div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-8 col-sm-12 address-product">{{$tinbds->ten_huyen}} - {{$tinbds->ten_tinh}}.</div>
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
        </div>
        <div class="row text-center">
            {{ $tinmns->links() }}
        </div>
    </div>
</div>
        
@endsection
