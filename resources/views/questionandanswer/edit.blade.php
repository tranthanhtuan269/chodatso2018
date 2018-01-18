@extends('layouts.app')

@section('content')

<h1>{{ $questionAndAnswer->question }}</h1>
<hr>

<p>{{ link_to_route('questions.index', 'Danh sách câu hỏi') }}</p>

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

{{ Form::model($questionAndAnswer, array('method' => 'PATCH', 'route' => array('questions.update', $questionAndAnswer->id))) }}
    <div class="panel panel-primary">
        <div class="panel-heading">Quận / Dự án {{ $duan->name }}</div>
        <table class="table table-bordered">
            <tr>
                <td class="text-right">{{ Form::label('question', 'Câu hỏi:') }}</td>
                <td>{{ Form::text('question') }}</td>
            </tr>
            <tr>
                <td class="text-right">{{ Form::label('answer', 'Trả lời:') }}</td>
                <td>{{ Form::text('answer') }}</td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">{{ Form::submit('Lưu', array('class' => 'btn btn-info')) }} {{ link_to_route('duan.show', 'Cancel', $duan->id, array('class' => 'btn btn-default')) }}</td>
            </tr>
        </table>
    </div>

{{ Form::close() }}

@stop