@extends('layouts.app')

@section('content')

<h1>Sửa Phố {{ $pho->name }}</h1>
<hr>

<p>{{ link_to_route('pho.index', 'Danh sách Phố') }}</p>

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

{{ Form::model($pho, array('method' => 'PATCH', 'route' => array('pho.update', $pho->id))) }}
    <div class="panel panel-primary">
        <div class="panel-heading">Quận / Phố {{ $pho->name }}</div>
        <table class="table table-bordered">
            <tr>
                <td class="text-right">{{ Form::label('name', 'Tên Phố:') }}</td>
                <td>{{ Form::text('name') }}</td>
            </tr>
            <tr>
                <td class="text-right">{{ Form::label('name', 'Tên Quận / Huyện:') }}</td>
                <td>{!! Form::select('huyen_id', $huyens, $pho->huyen_id, array('class' => 'form-control')) !!}</td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">{{ Form::submit('Lưu', array('class' => 'btn btn-info')) }} {{ link_to_route('pho.show', 'Cancel', $pho->id, array('class' => 'btn btn-default')) }}</td>
            </tr>
        </table>
    </div>

{{ Form::close() }}

@stop