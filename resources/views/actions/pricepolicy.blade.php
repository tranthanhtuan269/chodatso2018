@extends('layouts.app')

@section('title')
    chodatso.com | Chính sách về giá
@stop

@section('description')
    Bảng giá dịch vụ.
@stop

@section('content')

<h2 class="text-normal">Bảng giá tại chodatso.com</h2>

<div class="span-note-1">Đối với khách hàng đăng tin bán:</div>
<div class="span-note-2">- Đăng tin hoàn toàn miễn phí.</div>
<div class="span-note-2 sr-only">- Up tin 1 coin/tin ( Tin up chỉ được đẩy lên đầu trang Tìm nhà bán, không gửi lại email quảng bá sản phẩm ).</div>

<div class="span-note-1">Đối với khách hàng đăng yêu cầu mua:</div>
<div class="span-note-2">- Đăng yêu cầu hoàn toàn miễn phí.</div>
<div class="span-note-2">- Với mỗi email giới thiệu nhà bán 5 coins/email ( Số tiền được trừ trực tiếp vào tài khoản của Quý khách, khi tài khoản của Quý khách không còn đủ để thực hiện giao dịch, dịch vụ sẽ tạm ngưng, chodatso.com sẽ có email thông báo để Quý khách nạp thêm tiền ).</div>

<div class="span-note-1">Truy vấn thông tin tài khoản:</div>
<div class="span-note-2">Mỗi Quý khách được cấp 1 trang quản lý tài khoản.</div>
<div class="span-note-2">Mọi thắc mắc về tài khoản xin liên hệ qua email: <span class="text-bold">admin@chodatso.com</span></div>

<div class="span-note-1">Lời cảm ơn! </div>
<div class="span-note-2">chodatso.com hy vọng sẽ đồng hành tốt nhất với Quý khách trong những giao dịch Bất động sản sắp tới.</div>
<div class="span-note-2">Mọi ý kiến góp ý, hay yêu cầu trợ giúp, xin liên hệ email: <span class="text-bold">admin@chodatso.com</span>. Xin chân thành cảm ơn!</div>

<div class="text-center span-note-1"><a href="{{ url('/') }}" class="btn btn-default">Về trang chủ</a></div>

@stop