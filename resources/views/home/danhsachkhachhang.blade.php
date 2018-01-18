@extends('layouts.app_nguoi_mua')

@section('title')
    chodatso.com | Danh sách khách hàng
@stop

@section('description')
    Danh sách khách hàng
@stop

@section('content')

<h1 class="text-center">DANH SÁCH KHÁCH HÀNG</h1>
<hr>

<div class="table-responsive">
@if ($danhsachkhachhang->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th width="15%">id</th>
                <th width="30%">Họ và tên</th>
                <th width="30%">Email</th>
                <th width="25%">Phone</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($danhsachkhachhang as $khachhang)
                <tr>
                    <td>
                        {{ $khachhang->id }}
                    </td>
                    <td>
                        {{ $khachhang->name }}
                    </td>
                    <td>
                        {{ $khachhang->email }}
                    </td>
                    <td>
                        {{ $khachhang->phone }}
                    </td>
                </tr>
            @endforeach
              
        </tbody>
      
    </table>

    <div class="row text-center">
        {{ $danhsachkhachhang->links() }}
    </div>
@else
    <div class="col-xs-12 col-md-12 col-sm-12 text-center">Hiện chưa có yêu cầu nào!</div>
@endif
    <div class="row text-center end-row">
        <a href="{{ url('/sao-ke-giao-dich') }}" class="btn btn-default">Sao kê giao dịch</a>
        {!! link_to(URL::previous(), 'Trở về trang trước', ['class' => 'btn btn-default']) !!}
    </div>
</div>
@stop

