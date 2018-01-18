@extends('layouts.app')

@section('content')

<h1>Danh sách Tỉnh / Thành phố</h1>
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

<p>{{ link_to_route('tinh.create', 'Tạo mới Tỉnh') }}</p>

@if ($tinhs->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th width="70%">Tên tỉnh</th>
                <th width="10%">Xem</th>
                <th width="10%">Sửa</th>
                <th width="10%">Xóa</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($tinhs as $tinh)
                <tr>
                    <td>{{ $tinh->name }}</td>
                    <td>{{ link_to_route('tinh.show', 'Xem', array($tinh->id), array('class' => 'btn btn-primary')) }}</td>
                    <td>{{ link_to_route('tinh.edit', 'Sửa', array($tinh->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('tinh.destroy', $tinh->id))) }}                       
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
              
        </tbody>
      
    </table>
@else
    Chưa có Tỉnh nào!
@endif

@stop