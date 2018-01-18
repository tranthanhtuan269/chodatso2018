@extends('layouts.app')

@section('content')

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">TIN MỚI NHẤT</h3>
                </div>
                <div class="panel-body">
                <?php 
                    foreach ($tinmns as $tinbds) {
                        //echo $tinbds->tieu_de;
                        //echo $tinbds->images;
                        //dd($tinbds);
                        $temp = substr($tinbds->images,0,-1);
                        $images = explode( ';', $temp ); 
                        
                ?>
                    <div class="row end-row">
                        <div class="col-xs-12 col-md-3 col-sm-12 image-product"><img src="{{ URL::to('/') }}/public/images/{{ $images[0] }}" class="img-thumbnail" alt="Responsive image"></div>
                        <div class="col-xs-12 col-md-9 col-sm-12">
                            <div class="row"><div class="col-xs-12 col-md-12 col-sm-12"><h4 class="title-product">{{ $tinbds->tieu_de }}</h4></div></div>
                            <div class="row"><div class="col-xs-12 col-md-12 col-sm-12">{{ substr($tinbds->mo_ta, 0, 369) }}...</div></div>
                            <div class="row">
                                <div class="col-xs-12 col-md-8 col-sm-12">Diện tích: <span class="price-product">{{ $tinbds->dien_tich }}</span> m<sup>2</sup>.</div>
                                <div class="col-xs-12 col-md-4 col-sm-12">Giá: <span class="price-product">{{ $tinbds->gia }}</span> tỷ.</div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-8 col-sm-12">{{$tinbds->ten_huyen}} - {{$tinbds->ten_tinh}}.</div>
                                <div class="col-xs-12 col-md-4 col-sm-12">Liên hệ với người bán</div>
                            </div>
                        </div>
                    </div>
                    <hr />
                <?php 
                }
                ?>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">XEM NHIỀU NHẤT</h3>
                </div>
                <div class="panel-body">
                <?php 
                    foreach ($tinmns as $tinbds) {
                        //echo $tinbds->tieu_de;
                        //echo $tinbds->images;
                        //dd($tinbds);
                        $temp = substr($tinbds->images,0,-1);
                        $images = explode( ';', $temp ); 
                        
                ?>
                    <div class="row end-row">
                        <div class="col-xs-12 col-md-3 col-sm-12 image-product"><img src="{{ URL::to('/') }}/public/images/{{ $images[0] }}" class="img-thumbnail" alt="Responsive image"></div>
                        <div class="col-xs-12 col-md-9 col-sm-12">
                            <div class="row"><div class="col-xs-12 col-md-12 col-sm-12"><h4 class="title-product">{{ $tinbds->tieu_de }}</h4></div></div>
                            <div class="row"><div class="col-xs-12 col-md-12 col-sm-12">{{ substr($tinbds->mo_ta, 0, 369) }}...</div></div>
                            <div class="row">
                                <div class="col-xs-12 col-md-8 col-sm-12">Diện tích: <span class="price-product">{{ $tinbds->dien_tich }}</span> m<sup>2</sup>.</div>
                                <div class="col-xs-12 col-md-4 col-sm-12">Giá: <span class="price-product">{{ $tinbds->gia }}</span> tỷ.</div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-8 col-sm-12">{{$tinbds->ten_huyen}} - {{$tinbds->ten_tinh}}.</div>
                                <div class="col-xs-12 col-md-4 col-sm-12">Liên hệ với người bán</div>
                            </div>
                        </div>
                    </div>
                    <hr />
                <?php 
                }
                ?>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">LIÊN HỆ NHIỀU NHẤT</h3>
                </div>
                <div class="panel-body">
                <?php 
                    foreach ($tingois as $tinbds) {
                        //echo $tinbds->tieu_de;
                        //echo $tinbds->images;
                        //dd($tinbds);
                        $temp = substr($tinbds->images,0,-1);
                        $images = explode( ';', $temp ); 
                        
                ?>
                    <div class="row end-row">
                        <div class="col-xs-12 col-md-3 col-sm-12 image-product"><img src="{{ URL::to('/') }}/public/images/{{ $images[0] }}" class="img-thumbnail" alt="Responsive image"></div>
                        <div class="col-xs-12 col-md-9 col-sm-12">
                            <div class="row"><div class="col-xs-12 col-md-12 col-sm-12"><h4 class="title-product">{{ $tinbds->tieu_de }}</h4></div></div>
                            <div class="row"><div class="col-xs-12 col-md-12 col-sm-12">{{ substr($tinbds->mo_ta, 0, 369) }}...</div></div>
                            <div class="row">
                                <div class="col-xs-12 col-md-8 col-sm-12">Diện tích: <span class="price-product">{{ $tinbds->dien_tich }}</span> m<sup>2</sup>.</div>
                                <div class="col-xs-12 col-md-4 col-sm-12">Giá: <span class="price-product">{{ $tinbds->gia }}</span> tỷ.</div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-8 col-sm-12">{{$tinbds->ten_huyen}} - {{$tinbds->ten_tinh}}.</div>
                                <div class="col-xs-12 col-md-4 col-sm-12">Liên hệ với người bán</div>
                            </div>
                        </div>
                    </div>
                    <hr />
                <?php 
                }
                ?>
                </div>
            </div>
        
@endsection
