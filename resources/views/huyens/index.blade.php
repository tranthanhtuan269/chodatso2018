@extends('layouts.app')

@section('content')

<h1>Danh sách Quận / Huyện</h1>
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

<p>{{ link_to_route('huyen.create', 'Tạo mới Huyện') }}</p>

@if ($huyens->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th width="35%">Tên Quận / Huyện</th>
                <th width="35%">Tên Tỉnh / Thành Phố</th>
                <th width="10%">Xem</th>
                <th width="10%">Sửa</th>
                <th width="10%">Xóa</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($huyens as $huyen)
                <tr>
                    <td>{{ $huyen->name }}</td>
                    <td>{{ $huyen->tinh->name }}</td>
                    <td>{{ link_to_route('huyen.show', 'Xem', array($huyen->id), array('class' => 'btn btn-primary')) }}</td>
                    <td>{{ link_to_route('huyen.edit', 'Sửa', array($huyen->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('huyen.destroy', $huyen->id))) }}                       
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
              
        </tbody>
      
    </table>
@else
    Chưa có Quận / Huyện nào!
@endif

@stop