@extends('layouts.app')

@section('title')
    chodatso.com | Hiển thị một đường đã được tạo
@stop

@section('description')
    Hiển thị một đường đã được tạo.
@stop

@section('content')

<h1>Đường {{ $duong->name }}</h1>
<hr>

<p>{{ link_to_route('duong.create', 'Tạo mới Đường') }}</p>

<div class="panel panel-primary">
    <div class="panel-heading">Đường {{ $duong->name }}</div>
    <table class="table table-bordered">
            <tr>
                <td>Tên Đường:</td>
                <td>{{ $duong->name }}</td>
            </tr>
            <tr>
                <td>Tên Quận / Huyện:</td>
                <td>{{ $duong->huyen->name }}</td>
            </tr>
            <tr>
                <td>Tên Tỉnh / Thành phố:</td>
                <td>{{ $duong->huyen->tinh->name }}</td>
            </tr>
        </table>
</div>

<p>{{ link_to_route('duong.index', 'Danh sách Đường') }}</p>

@stop