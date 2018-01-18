@extends('layouts.app')

@section('content')
<form class="form-horizontal" action="{{URL::to('/')}}/updateUser" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
       <img src="{{ URL::to('/') }}/public/images/{{ $user->avatar }}" alt="" width="120px" height="90px" /></td>
    </div>
</div>
  <div class="form-group">
      {!! Form::label('avatar', 'Avatar:', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-10">
          <input type="file" name="avatar">
      </div>
  </div>
  <div class="form-group">
    <label for="username" class="col-sm-2 control-label">Họ và tên:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="username" name="name" placeholder="Họ và tên" value="{{$user->name}}">
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$user->email}}">
    </div>
  </div>
  <div class="form-group">
    <label for="address" class="col-sm-2 control-label">Địa chỉ:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="address" name="address" placeholder="Địa chỉ" value="{{$user->address}}">
    </div>
  </div>
  <div class="form-group">
    <label for="phone" class="col-sm-2 control-label">Số điện thoại:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="phone" name="phone" placeholder="Số điện thoại" value="{{$user->phone}}">
    </div>
  </div>
  <div class="form-group">
    <label for="phone2" class="col-sm-2 control-label">Số điện thoại 2:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="phone2" name="phone2" placeholder="Số điện thoại 2" value="{{$user->phone2}}">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
</form>

@stop