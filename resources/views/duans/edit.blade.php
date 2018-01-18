@extends('layouts.app')

@section('title')
    chodatso.com | Sửa dự án
@stop

@section('description')
    Sửa dự án đã được tạo.
@stop

@section('content')

<h1>Sửa Dự án {{ $duan->name }}</h1>
<hr>

<p>{{ link_to_route('duan.index', 'Danh sách Dự án') }}</p>

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

{{ Form::model($duan, array('method' => 'PATCH', 'route' => array('duan.update', $duan->id))) }}
    <div class="panel panel-primary">
        <div class="panel-heading">Quận / Dự án {{ $duan->name }}</div>
        <table class="table table-bordered">
            <tr>
                <td class="text-right">{{ Form::label('name', 'Tên Dự án:') }}</td>
                <td>{{ Form::text('name') }}</td>
            </tr>
            <tr>
                <td class="text-right">{{ Form::label('name', 'Tên Quận / Huyện:') }}</td>
                <td>{!! Form::select('huyen_id', $huyens, $duan->huyen_id, array('class' => 'form-control')) !!}</td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">{{ Form::submit('Lưu', array('class' => 'btn btn-info')) }} {{ link_to_route('duan.show', 'Cancel', $duan->id, array('class' => 'btn btn-default')) }}</td>
            </tr>
        </table>
    </div>

{{ Form::close() }}

@stop