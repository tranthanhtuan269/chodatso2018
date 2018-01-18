@extends('layouts.app')

@section('content')

<h1>Loại BDS {{ $loaibds->name }}</h1>
<hr>

<p>{{ link_to_route('loaibds.create', 'Tạo mới Loại BDS') }}</p>

<div class="panel panel-primary">
    <div class="panel-heading">Loại BDS {{ $loaibds->name }}</div>
    <table class="table table-bordered">
            <tr>
                <td>Tên Loại BDS:</td>
                <td>{{ $loaibds->name }}</td>
            </tr>
        </table>
</div>

<p>{{ link_to_route('loaibds.index', 'Danh sách Loại BDS') }}</p>

@stop