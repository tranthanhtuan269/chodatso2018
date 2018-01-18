@extends('layouts.app')

@section('content')

<h1>Danh sách Loại BDS</h1>
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

<p>{{ link_to_route('loaibds.create', 'Tạo mới Loại BDS') }}</p>

@if ($loaibdss->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th width="70%">Tên Loại BDS</th>
                <th width="10%">Xem</th>
                <th width="10%">Sửa</th>
                <th width="10%">Xóa</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($loaibdss as $loaibds)
                <tr>
                    <td>{{ $loaibds->name }}</td>
                    <td>{{ link_to_route('loaibds.show', 'Xem', array($loaibds->id), array('class' => 'btn btn-primary')) }}</td>
                    <td>{{ link_to_route('loaibds.edit', 'Sửa', array($loaibds->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('loaibds.destroy', $loaibds->id))) }}                       
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
              
        </tbody>
      
    </table>
@else
    Chưa có Loại BDS nào!
@endif

@stop