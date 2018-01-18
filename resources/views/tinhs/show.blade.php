@extends('layouts.app')

@section('content')

<h1>Tỉnh {{ $tinh->name }}</h1>
<hr>

<p>{{ link_to_route('tinh.create', 'Tạo mới Tỉnh') }}</p>

<div class="panel panel-primary">
    <div class="panel-heading">Tỉnh {{ $tinh->name }}</div>
    <table class="table table-bordered">
            <tr>
                <td>Tên Tỉnh:</td>
                <td>{{ $tinh->name }}</td>
            </tr>
        </table>
</div>

<p>{{ link_to_route('tinh.index', 'Danh sách Tỉnh') }}</p>

@stop