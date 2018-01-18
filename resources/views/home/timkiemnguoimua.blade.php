@extends('layouts.app_nguoi_mua')

@section('title')
    chodatso.com | Danh sách người mua
@stop

@section('description')
    Danh sách người mua
@stop

@section('content')

<h1 class="text-center">Danh sách người mua</h1>
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

<div class="table-responsive">
@if ($yeucaunhas->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th width="15%">Ngày đăng</th>
                <th width="85%">Thông tin chi tiết</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($yeucaunhas as $yeucaunha)
                <tr>
                    <td>
                      <?php 
                        $date = new DateTime($yeucaunha->create_at);
                        echo $date->format('d-m-Y') . "<br>";  // UTC time
                      ?>
                    </td>
                    <td>
                        <div class="big-field">
                          <h4> Muốn mua nhà tại 
                          <?php if($yeucaunha->ten_duong != null) echo $yeucaunha->ten_duong . ', '; ?> 
                          <?php if($yeucaunha->ten_pho != null) echo $yeucaunha->ten_pho . ', '; ?> 
                          <?php if($yeucaunha->ten_huyen != null) echo $yeucaunha->ten_huyen . ', '; ?>
                          <?php if($yeucaunha->ten_tinh != null) echo $yeucaunha->ten_tinh; ?>
                          </h4>
                        </div>
                        <div class="big-field">Người đăng: {{ $yeucaunha->name }} <span class="alert alert-danger">Mua gấp</span></div>
                        <div class="big-field">Tầm tiền: <span class="price-format"> @if($yeucaunha->tam_tien / 1000000000 >= 1) {{ $yeucaunha->tam_tien / 1000000000 }}</span> tỷ VNĐ @else {{ $yeucaunha->tam_tien / 1000000 }}</span> triệu VNĐ @endif</div>
                        <div class="big-field">Diện tích tối thiểu: {{ $yeucaunha->dien_tich }} m <sup>2</sup></div>
                        @if (Auth::guest())
                            <div class="big-field"><a href="{{ url('/login') }}" class="red-text">Đăng nhập để xem chi tiết!</a></div>
                        @else
                            <div class="big-field">Mặt tiền tối thiểu: {{ $yeucaunha->mat_tien }} m</div>
                            <div class="big-field">Đường vào tối thiểu: {{ $yeucaunha->duong_vao }} m</div>
                            <div class="big-field">Số tầng tối thiểu: {{ $yeucaunha->tang }} tầng</div>

                            <div class="big-field">Yêu cầu hướng nhà: {{ $yeucaunha->ten_huong }}</div>
                            <div class="big-field">Số phòng ngủ tối thiểu: {{ $yeucaunha->phong_ngu }} phòng</div>
                            <div class="big-field">Số phòng khách tối thiểu: {{ $yeucaunha->phong_khach }} phòng</div>
                            <div class="big-field">Số phòng vệ sinh tối thiểu: {{ $yeucaunha->wc }} phòng</div>
                            <div class="big-field">Mua để:
                            <?php 
                              if($yeucaunha->kinh_doanh +  $yeucaunha->dau_tu + $yeucaunha->de_o == 3){
                                echo 'Kinh doanh, đầu tư và để ở';
                              }
                              else if($yeucaunha->kinh_doanh +  $yeucaunha->dau_tu + $yeucaunha->de_o == 2){
                                if($yeucaunha->kinh_doanh + $yeucaunha->dau_tu > 1)
                                  echo 'Kinh doanh và đầu tư';
                                if($yeucaunha->kinh_doanh + $yeucaunha->de_o > 1)
                                  echo 'Kinh doanh và để ở';
                                if($yeucaunha->dau_tu + $yeucaunha->de_o > 1)
                                  echo 'Đầu tư và để ở';
                              }
                              else if($yeucaunha->kinh_doanh +  $yeucaunha->dau_tu + $yeucaunha->de_o == 1){
                              if($yeucaunha->kinh_doanh) echo 'Kinh doanh';
                                if($yeucaunha->dau_tu) echo 'Đầu tư';
                                if($yeucaunha->de_o) echo 'Để ở';
                              }
                              ?>
                            </div>
                        @endif
                        <div class="clear-fix"></div>
                    </td>
                </tr>
            @endforeach
              
        </tbody>
      
    </table>

    <div class="row text-center">
        {{ $yeucaunhas->links() }}
    </div>

    <div class="row text-center">
        <a href="{{ url('/') }}" class="btn btn-default">Trở về trang chủ</a>
        {!! link_to(URL::previous(), 'Trở về trang trước', ['class' => 'btn btn-default']) !!}
    </div>
@else
    Chưa có yêu cầu nhà nào!
@endif
</div>
@stop