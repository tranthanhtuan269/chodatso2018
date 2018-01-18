@extends('layouts.app')

@section('content')

<h1>Sửa Quận / Huyện {{ $huyen->name }}</h1>
<hr>

<p>{{ link_to_route('huyen.index', 'Danh sách Huyện') }}</p>

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

{{ Form::model($huyen, array('method' => 'PATCH', 'route' => array('huyen.update', $huyen->id))) }}
    <div class="panel panel-primary">
        <div class="panel-heading">Quận / Huyện {{ $huyen->name }}</div>
        <table class="table table-bordered">
            <tr>
                <td class="text-right">{{ Form::label('name', 'Tên Huyện:') }}</td>
                <td>{{ Form::text('name') }}</td>
            </tr>
            <tr>
                <td class="text-right">{{ Form::label('name', 'Tên Tỉnh / Thành phố:') }}</td>
                <td>{!! Form::select('tinh_id', $tinhs, $huyen->tinh_id, array('class' => 'form-control')) !!}</td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">{{ Form::submit('Lưu', array('class' => 'btn btn-info')) }} {{ link_to_route('huyen.show', 'Cancel', $huyen->id, array('class' => 'btn btn-default')) }}</td>
            </tr>
        </table>
    </div>

{{ Form::close() }}

@stop