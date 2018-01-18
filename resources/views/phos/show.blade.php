@extends('layouts.app')

@section('content')

<h1>Phố {{ $pho->name }}</h1>
<hr>

<p>{{ link_to_route('pho.create', 'Tạo mới Phố') }}</p>

<div class="panel panel-primary">
    <div class="panel-heading">Phố {{ $pho->name }}</div>
    <table class="table table-bordered">
            <tr>
                <td>Tên Phố:</td>
                <td>{{ $pho->name }}</td>
            </tr>
            <tr>
                <td>Tên Quận / Huyện:</td>
                <td>{{ $pho->huyen->name }}</td>
            </tr>
            <tr>
                <td>Tên Tỉnh / Thành phố:</td>
                <td>{{ $pho->huyen->tinh->name }}</td>
            </tr>
        </table>
</div>

<p>{{ link_to_route('pho.index', 'Danh sách Phố') }}</p>

@stop