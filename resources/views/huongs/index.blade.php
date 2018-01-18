@extends('layouts.app')

@section('content')

<h1>Danh sách Hướng</h1>
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

<p>{{ link_to_route('huong.create', 'Tạo mới Hướng') }}</p>

@if ($huongs->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th width="70%">Tên Hướng</th>
                <th width="10%">Xem</th>
                <th width="10%">Sửa</th>
                <th width="10%">Xóa</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($huongs as $huong)
                <tr>
                    <td>{{ $huong->name }}</td>
                    <td>{{ link_to_route('huong.show', 'Xem', array($huong->id), array('class' => 'btn btn-primary')) }}</td>
                    <td>{{ link_to_route('huong.edit', 'Sửa', array($huong->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('huong.destroy', $huong->id))) }}                       
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
              
        </tbody>
      
    </table>
@else
    Chưa có Hướng nào!
@endif

@stop