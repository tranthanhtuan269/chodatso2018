@extends('layouts.app')

@section('content')

<h1>Danh sách câu hỏi</h1>
<hr>

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

<p>{{ link_to_route('questions.create', 'Tạo mới câu hỏi') }}</p>

@if ($duans->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th width="30%">Câu hỏi</th>
                <th width="20%">Trả lời</th>
                <th width="20%">Người tạo</th>
                <th width="10%">Xem</th>
                <th width="10%">Sửa</th>
                <th width="10%">Xóa</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($$questionAndAnswers as $questionAndAnswer)
                <tr>
                    <td>{{ $questionAndAnswer->question }}</td>
                    <td>{{ $questionAndAnswer->answer }}</td>
                    <td>{{ $questionAndAnswer->user_created }}</td>
                    <td>{{ link_to_route('questions.show', 'Xem', array($duan->id), array('class' => 'btn btn-primary')) }}</td>
                    <td>{{ link_to_route('questions.edit', 'Sửa', array($duan->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('questions.destroy', $questionAndAnswer->id))) }}                       
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
              
        </tbody>
      
    </table>
@else
    Chưa có câu hỏi nào!
@endif

@stop