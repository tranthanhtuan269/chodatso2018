@extends('layouts.app')

@section('content')

<h1>Danh sách Phố</h1>
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

<p>{{ link_to_route('pho.create', 'Tạo mới Phố') }}</p>

@if ($phos->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th width="30%">Tên Phố</th>
                <th width="20%">Tên Quận / Huyện</th>
                <th width="20%">Tên Tỉnh / Thành Phố</th>
                <th width="10%">Xem</th>
                <th width="10%">Sửa</th>
                <th width="10%">Xóa</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($phos as $pho)
                <tr>
                    <td>{{ $pho->name }}</td>
                    <td>{{ $pho->huyen->name }}</td>
                    <td>{{ $pho->huyen->tinh->name }}</td>
                    <td>{{ link_to_route('pho.show', 'Xem', array($pho->id), array('class' => 'btn btn-primary')) }}</td>
                    <td>{{ link_to_route('pho.edit', 'Sửa', array($pho->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('pho.destroy', $pho->id))) }}                       
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
              
        </tbody>
      
    </table>
@else
    Chưa có Phố nào!
@endif

@stop