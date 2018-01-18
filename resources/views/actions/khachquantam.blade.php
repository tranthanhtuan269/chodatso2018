@extends('layouts.app_nguoi_mua')

@section('title')
    chodatso.com | Danh sách quan tâm
@stop

@section('description')
    Danh sách người mua
@stop

@section('content')

<h1 class="text-center">SỐ KHÁCH MUỐN MUA PHÂN THEO QUẬN / HUYỆN</h1>
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

<div>
    <table class="table table-striped table-bordered">
        <thead class="table-header">
            <tr>
                <th width="25%">Tỉnh / Thành phố</th>
                <th width="25%">Quận / Huyện</th>
                <th width="50%">Số yêu cầu</th>
            </tr>
        </thead>

        <tbody class="table-content">
            @foreach ($yeucaunhas as $yeucaunha)
                <tr>
                    <td>{{$yeucaunha->ten_tinh}}</td>
                    <td>{{$yeucaunha->ten_huyen}}</td>
                    <td>{{$yeucaunha->yc_count}} khách</td>
                </tr>
            @endforeach
              
        </tbody>
      
    </table>
    <div class="row text-center end-row">
        <a href="{{ url('/') }}" class="btn btn-default">Trở về trang chủ</a>
        {!! link_to(URL::previous(), 'Trở về trang trước', ['class' => 'btn btn-default']) !!}
    </div>
</div>
@stop

