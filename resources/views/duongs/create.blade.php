@extends('layouts.app')

@section('title')
    chodatso.com | Tạo mới một đường.
@stop

@section('description')
    Tạo mới một đường.
@stop

@section('content')

<h1>Tạo mới Đường</h1>

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

{!! Form::open([
    'route' => 'duong.store'
]) !!}

<div class="form-group">
    {!! Form::label('name', 'Tên Đường:', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('name', 'Tên Quận / Huyện:', ['class' => 'control-label']) !!}
    {!! Form::select('huyen_id', $huyens, null, array('class' => 'form-control')) !!}
</div>

{!! Form::submit('Tạo mới', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}



@stop