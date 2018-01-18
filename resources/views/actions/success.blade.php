@extends('layouts.app_nha_ban')

@section('content')

<div class="">Quý khách đã nạp tiền thành công! </div>


<?php
    foreach($_GET as $key=>$value){
        //echo $key, ' => ', $value, "<br/>n";
        echo '<div class="hidden" id="'. $key .'">'. $value .'</div>';
        echo $key . '=>' . $value . ',';
    }
?>

<script type="text/javascript">
    $(document).ready(function(){
        var request = $.ajax({
          url: "https://www.baokim.vn/bpn/verify",
          method: "POST",
          data: { 
              "created_on":$("#created_on").text(),
              "customer_address":$("#customer_address").text(),
              "customer_email":$("#customer_email").text(),
              "customer_location":$("#customer_location").text(),
              "customer_name":$("#customer_name").text(),
              "customer_phone":$("#customer_phone").text(),
              "fee_amount":$("#fee_amount").text(),
              "merchant_email":$("#merchant_email").text(),
              "merchant_id":$("#merchant_id").text(),
              "merchant_location":$("#merchant_location").text(),
              "merchant_name":$("#merchant_name").text(),
              "merchant_phone":$("#merchant_phone").text(),
              "net_amount":$("#net_amount").text(),
              "order_id":$("#order_id").text(),
              "payment_type":$("#payment_type").text(),
              "total_amount":$("#total_amount").text(),
              "transaction_id":$("#transaction_id").text(),
              "transaction_status":$("#transaction_status").text(),
              "checksum":$("#checksum").text()
          },
          dataType: "html"
        });

        request.done(function( msg ) {
          $( "#log" ).html( msg );
        });

        request.fail(function( jqXHR, textStatus ) {
          alert( "Request failed: " + textStatus );
        });
    });
</script>
@endsection