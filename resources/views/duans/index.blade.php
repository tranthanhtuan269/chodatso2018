@extends('layouts.app')

@section('title')
    chodatso.com | Danh sách dự án
@stop

@section('description')
    Danh sách các dự án đã được tạo.
@stop

@section('content')

<h1>Danh sách Dự án</h1>
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

<p>{{ link_to_route('duan.create', 'Tạo mới Dự án') }}</p>

@if ($duans->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th width="30%">Tên Dự án</th>
                <th width="20%">Tên Quận / Huyện</th>
                <th width="20%">Tên Tỉnh / Thành Phố</th>
                <th width="10%">Xem</th>
                <th width="10%">Sửa</th>
                <th width="10%">Xóa</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($duans as $duan)
                <tr>
                    <td>{{ $duan->name }}</td>
                    <td>{{ $duan->huyen->name }}</td>
                    <td>{{ $duan->huyen->tinh->name }}</td>
                    <td>{{ link_to_route('duan.show', 'Xem', array($duan->id), array('class' => 'btn btn-primary')) }}</td>
                    <td>{{ link_to_route('duan.edit', 'Sửa', array($duan->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('duan.destroy', $duan->id))) }}                       
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
              
        </tbody>
      
    </table>
@else
    Chưa có Dự án nào!
@endif

@stop