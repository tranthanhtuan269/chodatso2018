@extends('layouts.app')

@section('title')
    chodatso.com | Sửa một đường đã được tạo
@stop

@section('description')
    Sửa một đường đã được tạo.
@stop

@section('content')

<h1>Sửa Đường {{ $duong->name }}</h1>
<hr>

<p>{{ link_to_route('duong.index', 'Danh sách Đường') }}</p>

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

{{ Form::model($duong, array('method' => 'PATCH', 'route' => array('duong.update', $duong->id))) }}
    <div class="panel panel-primary">
        <div class="panel-heading">Quận / Đường {{ $duong->name }}</div>
        <table class="table table-bordered">
            <tr>
                <td class="text-right">{{ Form::label('name', 'Tên Đường:') }}</td>
                <td>{{ Form::text('name') }}</td>
            </tr>
            <tr>
                <td class="text-right">{{ Form::label('name', 'Tên Quận / Huyện:') }}</td>
                <td>{!! Form::select('huyen_id', $huyens, $duong->huyen_id, array('class' => 'form-control')) !!}</td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">{{ Form::submit('Lưu', array('class' => 'btn btn-info')) }} {{ link_to_route('duong.show', 'Cancel', $duong->id, array('class' => 'btn btn-default')) }}</td>
            </tr>
        </table>
    </div>

{{ Form::close() }}

@stop