@extends('layouts.app')

@section('content')

<h1>Huyện {{ $huyen->name }}</h1>
<hr>

<p>{{ link_to_route('huyen.create', 'Tạo mới Quận / Huyện') }}</p>

<div class="panel panel-primary">
    <div class="panel-heading">Tỉnh {{ $huyen->name }}</div>
    <table class="table table-bordered">
            <tr>
                <td>Tên Quận / Huyện:</td>
                <td>{{ $huyen->name }}</td>
            </tr>
            <tr>
                <td>Tên Tỉnh / Thành phố:</td>
                <td>{{ $huyen->tinh->name }}</td>
            </tr>
        </table>
</div>

<p>{{ link_to_route('huyen.index', 'Danh sách Quận / Huyện') }}</p>

@stop