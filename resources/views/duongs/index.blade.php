@extends('layouts.app')

@section('title')
    chodatso.com | Danh sách đường
@stop

@section('description')
    Hiển thị danh sách đường.
@stop

@section('content')

<h1>Danh sách Đường</h1>
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

<p>{{ link_to_route('duong.create', 'Tạo mới Đường') }}</p>

@if ($duongs->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th width="30%">Tên Đường</th>
                <th width="20%">Tên Quận / Huyện</th>
                <th width="20%">Tên Tỉnh / Thành Phố</th>
                <th width="10%">Xem</th>
                <th width="10%">Sửa</th>
                <th width="10%">Xóa</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($duongs as $duong)
                <tr>
                    <td>{{ $duong->name }}</td>
                    <td>{{ $duong->huyen->name }}</td>
                    <td>{{ $duong->huyen->tinh->name }}</td>
                    <td>{{ link_to_route('duong.show', 'Xem', array($duong->id), array('class' => 'btn btn-primary')) }}</td>
                    <td>{{ link_to_route('duong.edit', 'Sửa', array($duong->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('duong.destroy', $duong->id))) }}                       
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
              
        </tbody>
      
    </table>
@else
    Chưa có Đường nào!
@endif

@stop