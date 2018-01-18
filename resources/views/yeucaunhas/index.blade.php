@extends('layouts.app_nha_ban')

@section('title')
    chodatso.com | Danh sách nhu cầu
@stop

@section('description')
    Danh sách nhu cầu
@stop

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Thông báo</h3>
    </div>
    <div class="panel-body">
        <div class="row end-row">
            <div class="col-md-12">Yêu cầu của Quý khách đã được lưu lại thành công! Bất cứ khi nào có bất động sản phù hợp được bán tại khu vực mà Quý khách quan tâm, <span class="text-bold">chodatso.com</span> sẽ gửi thông báo ngay lập tức tới Quý khách! Cám ơn Quý khách đã sử dụng dịch vụ của chúng tôi!</div> <br />
        </div>
        <?php
        if(count($tinbdss) <= 0) 
        {
            echo '<div class="row end-row">';
            echo '<div class="col-md-12 text-center">Hiện tại, không tìm thấy bất động sản nào phù hợp! <br />Chúng tôi sẽ thông báo tới bạn ngay khi có nhà phù hợp! Xin cảm ơn!</div>';
            echo '</div>';
        }else{
            echo '<div class="row end-row">';
            echo '<div class="col-md-12"><span class="text-bold">chodatso.com</span> xin gửi tới Quý khách danh sách bất động sản phù hợp! Danh sách bao gồm những bất động sản được kiểm tra muộn nhất 1 tuần. <span class="text-bold">chodatso.com</span> xin được không chịu bất kỳ trách nhiệm nào nếu một trong các bất động sản phía dưới đã được bán! <br /> Mọi ý kiến đóng góp thông tin nhà đã bán, Quý khách vui lòng gửi email về địa chỉ <span class="text-bold">admin@chodatso.com</span>. Xin chân thành cảm ơn! </div>';
            echo '</div>';
        }
        ?>
    </div>
</div>
    
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Kết quả tìm kiếm</h3>
    </div>
    <div class="panel-body">
        <?php 
            foreach ($tinbdss as $tinbds) {
                $temp = substr($tinbds->images,0,-1);
                $images = explode( ';', $temp );                 
        ?>
            <div class="col-xs-12 col-md-12 col-sm-12 image-product">
                <div class="col-xs-12 col-sm-12 col-md-4 image-prod">
                    <?php if(sizeof($images) > 1){ ?> 
                        <a href="{{URL::to('/')}}/{{ $tinbds->tin_id }}"><img src="{{ URL::to('/') }}/public/images/{{ $images[0] }}" class="img-thumbnail" alt="Responsive image"></a>
                    <?php }else{ ?>
                        <a href="{{URL::to('/')}}/{{ $tinbds->tin_id }}"><img src="{{ URL::to('/') }}/public/images/home128_3.png" class="img-thumbnail" alt="Responsive image"></a>
                    <?php } ?>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8 price-prod">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-sm-12">
                            <span class="price-product">{{ $tinbds->gia / 1000000000 }} tỷ </span> - <span class="size-product">{{ $tinbds->dien_tich }} m<sup>2</sup></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-sm-12 address-product">
                            {{$tinbds->ten_huyen}} - {{$tinbds->ten_tinh}}.
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-sm-12">
                            <h4 class="title-product">
                                {{ $tinbds->tieu_de }}
                            </h4>
                        </div>
                    </div>
                </div>
                
            </div>
        <?php 
            }
        ?>
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
