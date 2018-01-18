@extends('layouts.app')

@section('content')

<h1>Tạo mới Phố</h1>

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

{!! Form::open([
    'route' => 'pho.store'
]) !!}

<div class="form-group">
    {!! Form::label('name', 'Tên Phố:', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('name', 'Tên Quận / Huyện:', ['class' => 'control-label']) !!}
    {!! Form::select('huyen_id', $huyens, null, array('class' => 'form-control')) !!}
</div>

{!! Form::submit('Tạo mới', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}



@stop