@extends('layouts.app')

@section('content')

<h1>Tạo mới câu hỏi</h1>

<hr>

<p>{{ link_to_route('questionandanswer.index', 'Danh sách câu hỏi') }}</p>

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
    'route' => 'questionandanswer.store'
]) !!}

<div class="form-group">
    {!! Form::label('name', 'Câu hỏi:', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Tạo mới', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}



@stop