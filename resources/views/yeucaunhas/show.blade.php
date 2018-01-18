@extends('layouts.app_nguoi_mua')

@section('title')
    chodatso.com | Thông tin nhu cầu
@stop

@section('description')
    Thông tin nhu cầu
@stop

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th width="20%">Ngày đăng</th>
                <th width="80%">Thông tin chi tiết</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                  <?php 
                    $date = new DateTime($yeucaunha->create_at);
                    echo $date->format('Y-m-d') . "<br>";  // UTC time
                  ?>
                <td>
                    <div class="big-field">
                      <h4> 
                      <?php if($yeucaunha->duong != null) echo $yeucaunha->ten_duong . ', '; ?> 
                      <?php if($yeucaunha->phuong != null) echo $yeucaunha->ten_pho . ', '; ?> 
                      <?php if($yeucaunha->huyen != null) echo $yeucaunha->ten_huyen . ', '; ?>
                      <?php if($yeucaunha->tinh != null) echo $yeucaunha->ten_tinh; ?>
                      </h4>
                    </div>

                    <div class="big-field">Người đăng: {{ $yeucaunha->name }} <span class="alert alert-danger">Mua gấp</span></div>
                    <div class="big-field">Tầm tiền: <span class="price-format"> {{ $yeucaunha->tam_tien / 1000000000 }}</span> tỷ VNĐ</div>

                    <div class="big-field">Diện tích: {{ $yeucaunha->dien_tich }} m <sup>2</sup></div>
                    <div class="big-field">Mặt tiền: {{ $yeucaunha->mat_tien }} m</div>
                    <div class="big-field">Đường vào: {{ $yeucaunha->duong_vao }} m</div>
                    <div class="big-field">Số tầng: {{ $yeucaunha->tang }} tầng</div>

                    <div class="big-field">Hướng nhà: {{ $yeucaunha->ten_huong }}</div>
                    <div class="big-field">Số phòng ngủ: {{ $yeucaunha->phong_ngu }} phòng</div>
                    <div class="big-field">Số phòng khách: {{ $yeucaunha->phong_khach }} phòng</div>
                    <div class="big-field">Số phòng vệ sinh: {{ $yeucaunha->wc }} phòng</div>
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
                    <div class="clear-fix"></div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@stop