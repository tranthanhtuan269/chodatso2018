@extends('layouts.app')

@section('content')

<h1>Giới thiệu khách hàng</h1>

<hr>

@if($error !== null)
<div class="alert alert-success">
    {{ $error }}
</div>
@endif

{!! Form::open([
    'action' => 'UserAttackController@gioithieu'
]) !!}

<div class="form-group">
    {!! Form::label('phone', 'Số điện thoại:', ['class' => 'control-label']) !!}
    {!! Form::number('phone', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group end-row text-center">
{!! Form::submit('Giới thiệu', ['class' => 'btn btn-primary']) !!}
<a href="{{ url('/danh-sach-khach-hang') }}" class="btn btn-default">Danh sách khách hàng</a>
</div>
{!! Form::close() !!}

@stop