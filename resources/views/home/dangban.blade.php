@extends('layouts.app')

@section('content')

<h1>Tạo mới Loại BDS</h1>
<hr>

<p>{{ link_to_route('loaibds.index', 'Danh sách Loại BDS') }}</p>

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
    'route' => 'loaibds.store'
]) !!}

<div class="form-group">
    {!! Form::label('name', 'Tên Loại BDS:', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Tạo mới', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}



@stop