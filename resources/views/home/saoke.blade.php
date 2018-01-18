@extends('layouts.app_nguoi_mua')

@section('title')
    chodatso.com | Sao kê giao dịch
@stop

@section('description')
    Sao kê giao dịch
@stop

@section('content')

<h1 class="text-center">DANH SÁCH GIAO DỊCH</h1>
<hr>
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">TỔNG SỐ HOA HỒNG</h3>
        </div>
        <div class="panel-body">
           <?php echo (count($giaodichs["dangtin"]) + count($giaodichs["yeucau"])) * 5 * 0.25; ?>.000 VNĐ
        </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">KHÁCH ĐĂNG TIN</h3>
      </div>
      <div class="panel-body">
          @if(count($giaodichs["dangtin"]) == 0) 
            Không có giao dịch nào!
          @else
        Có <?php echo count($giaodichs["dangtin"]); ?> giao dịch
        <hr />
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="15%">Khách đăng tin</th>
                    <th width="15%">Mã giao dịch</th>
                    <th width="15%">Mã tin đăng</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($giaodichs["dangtin"] as $giaodich)
                    <tr>
                        <td>
                            {{$giaodich->nguoiyeucau}}
                        </td>
                        <td>
                            {{$giaodich->magiaodich}}
                        </td>
                        <td>
                            {{$giaodich->matin}}
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
        @endif
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">KHÁCH YÊU CẦU</h3>
      </div>
      <div class="panel-body">
          @if(count($giaodichs["yeucau"]) == 0) 
            Không có giao dịch nào!
          @else
          Có <?php echo count($giaodichs["yeucau"]); ?> giao dịch
          <hr />
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="15%">Khách yêu cầu</th>
                    <th width="15%">Mã giao dịch</th>
                    <th width="15%">Mã tin đăng</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($giaodichs["yeucau"] as $giaodich)
                    <tr>
                        <td>
                            {{$giaodich->nguoiyeucau}}
                        </td>
                        <td>
                            {{$giaodich->magiaodich}}
                        </td>
                        <td>
                            {{$giaodich->matin}}
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
          @endif
      </div>
    </div>
@stop