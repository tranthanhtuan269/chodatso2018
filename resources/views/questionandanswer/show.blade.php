@extends('layouts.app')

@section('content')

<h1>Dự án {{ $questionAndAnswer->questions }}</h1>
<hr>

<p>{{ link_to_route('questions.create', 'Tạo mới câu hỏi') }}</p>

<div class="panel panel-primary">
    <div class="panel-heading">Dự án {{ $questionAndAnswer->questions }}</div>
    <table class="table table-bordered">
            <tr>
                <td>Trả lời:</td>
                <td>{{ $questionAndAnswer->answer }}</td>
            </tr>
        </table>
</div>

<p>{{ link_to_route('questions.index', 'Danh sách câu hỏi') }}</p>

@stop