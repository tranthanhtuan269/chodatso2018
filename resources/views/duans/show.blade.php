@extends('layouts.app')

@section('title')
    chodatso.com | Hiển thị một dự án đã được tạo
@stop

@section('description')
    Hiển thị một dự án đã được tạo.
@stop

@section('content')

<h1>Dự án {{ $duan->name }}</h1>
<hr>

<p>{{ link_to_route('duan.create', 'Tạo mới Dự án') }}</p>

<div class="panel panel-primary">
    <div class="panel-heading">Dự án {{ $duan->name }}</div>
    <table class="table table-bordered">
            <tr>
                <td>Tên Dự án:</td>
                <td>{{ $duan->name }}</td>
            </tr>
            <tr>
                <td>Tên Quận / Huyện:</td>
                <td>{{ $duan->huyen->name }}</td>
            </tr>
            <tr>
                <td>Tên Tỉnh / Thành phố:</td>
                <td>{{ $duan->huyen->tinh->name }}</td>
            </tr>
        </table>
</div>

<p>{{ link_to_route('duan.index', 'Danh sách Dự án') }}</p>

@stop