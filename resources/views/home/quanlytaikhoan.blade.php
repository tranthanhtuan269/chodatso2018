@extends('layouts.app')

@section('title')
    chodatso.com | Quản lý tài khoản cá nhân
@stop

@section('description')
    Quản lý tài khoản cá nhân.
@stop

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Số dư tài khoản</h3>
  </div>
  <div class="panel-body">
      <div class="row">
        <div class="col-md-6 hide-with-small">Số dư khả dụng</div>
        <div class="col-xs-12 col-md-6"><?php echo $user->coins; ?> Coins.</div>
      </div>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Lịch sử giao dịch</h3>
  </div>
  <div class="panel-body">
    <div class="row hide-with-small">
        <div class="col-md-2">Số dư</div>
        <div class="col-md-3">Thời gian giao dịch</div>
        <div class="col-md-5">Nội dung giao dịch</div>
    </div>
    <hr />
    <?php foreach($history as $his){ ?>
    <div class="row">
        <div class="col-md-2"><span class="text-bold"><?php echo $his->new;?></span> Coins</div>
        <div class="col-md-3"><?php echo $his->created_at;?></div>
        <div class="col-md-5"><?php echo $his->description;?></div>
    </div>
    <hr />
    <?php
    } 
    ?>
  </div>
</div>

<div class="text-center span-note-1">
    <a href="{{ url('/') }}/nap-tien" class="btn btn-primary">Nạp tiền</a>
    <a href="{{ url('/') }}" class="btn btn-default">Về trang chủ</a>
</div>
@stop