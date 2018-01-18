@extends('layouts.app')

@section('content')

<h1>Hướng {{ $huong->name }}</h1>
<hr>

<p>{{ link_to_route('huong.create', 'Tạo mới Hướng') }}</p>

<div class="panel panel-primary">
    <div class="panel-heading">Hướng {{ $huong->name }}</div>
    <table class="table table-bordered">
            <tr>
                <td>Tên Hướng:</td>
                <td>{{ $huong->name }}</td>
            </tr>
        </table>
</div>

<p>{{ link_to_route('huong.index', 'Danh sách Hướng') }}</p>

@stop