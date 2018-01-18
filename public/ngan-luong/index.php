<?php
//include('config.php');

header("Content-Type: text/html; charset=utf-8");	
define('NGANLUONG_URL_CARD_POST', 'https://www.nganluong.vn/mobile_card.api.post.v2.php');
define('NGANLUONG_URL_CARD_SOAP', 'https://nganluong.vn/mobile_card_api.php?wsdl');		
class Config
{
          public static $_FUNCTION = "CardCharge";
          public static $_VERSION = "2.0";
          //Thay đổi 3 thông tin ở phía dưới
          public static $_MERCHANT_ID = "48091";
          public static $_MERCHANT_PASSWORD = "24ef2a0e943f94b70070f18c01efaf7f";
          public static $_EMAIL_RECEIVE_MONEY = "tran.thanh.tuan269@gmail.com";
}

// end include config.php

//include('includes/MobiCard.php');
  class Result {
	 var $error_code = "";
	 var $merchant_id = "";
	 var $merchant_account = "";				
	 var $pin_card = "";
	 var $card_serial = "";
	 var $type_card = "";
	 var $order_id = "";
	 var $client_fullname = "";
	 var $client_email = "";
	 var $client_mobile = "";
	 var $card_amount = "";
	 var $amount = "";
	 var $transaction_id = "";
	 var $error_message = "";
  } 
  
  class MobiCard{
	
	
    function CardPay($pin_card,$card_serial,$type_card,$_order_id,$client_fullname,$client_mobile,$client_email){
		 $params = array(
				'func'					=> Config::$_FUNCTION,
				'version'				=> Config::$_VERSION,
				'merchant_id'			=> Config::$_MERCHANT_ID,
				'merchant_account'		=> Config::$_EMAIL_RECEIVE_MONEY,
				'merchant_password'		=> MD5(Config::$_MERCHANT_ID.'|'.Config::$_MERCHANT_PASSWORD),
				'pin_card'				=> $pin_card,
				'card_serial'			=> $card_serial,
				'type_card'				=> $type_card,
				
				'ref_code'				=> $_order_id,
				'client_fullname'		=> $client_fullname,
				'client_email'			=> $client_email,
				'client_mobile'			=> $client_mobile,
			);					
			$post_field = '';
			foreach ($params as $key => $value){
				if ($post_field != '') $post_field .= '&';
				$post_field .= $key."=".$value;
			}
			
			$api_url = NGANLUONG_URL_CARD_POST;
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$api_url);
		curl_setopt($ch, CURLOPT_ENCODING , 'UTF-8');
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_field);
		$result = curl_exec($ch);
		$status = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
		$error = curl_error($ch);
		
		//print_r($result);
		//die();
		$kq = new Result();
		
		if ($result != '' && $status==200){
			$arr_result = explode("|",$result);
			if (count($arr_result) == 13) {
			   $kq->error_code	     = $arr_result[0];
			   $kq->merchant_id	     = $arr_result[1];
			   $kq->merchant_account = $arr_result[2];				
			   $kq->pin_card	         = $arr_result[3];
				$kq->card_serial     = $arr_result[4];
				$kq->type_card	     = $arr_result[5];
				$kq->order_id		 = $arr_result[6];
				$kq->client_fullname = $arr_result[7];
				$kq->client_email    = $arr_result[8];
				$kq->client_mobile   = $arr_result[9];
				$kq->card_amount     = $arr_result[10];
				$kq->amount			 = $arr_result[11];
				$kq->transaction_id	 = $arr_result[12];
				
				if ($kq->error_code == '00'){
				   $kq->error_message ="Nạp thẻ thành công, mệnh giá thẻ = ".$kq->card_amount;
				}
				else {
				   $kq->error_message = $this->GetErrorMessage($kq->error_code);
				}
			}
			
		}
		else $kq->error_message = $error;	
		
		return $kq;
	}
	
	function GetErrorMessage($error_code) {
		$arrCode = array(
		   '00'=>  'Giao dịch thành công',
		   '99'=>  'Lỗi, tuy nhiên lỗi chưa được định nghĩa hoặc chưa xác định được nguyên nhân',
		   '01'=>  'Lỗi, địa chỉ IP truy cập API của NgânLượng.vn bị từ chối',
		   '02'=>  'Lỗi, tham số gửi từ merchant tới NgânLượng.vn chưa chính xác (thường sai tên tham số hoặc thiếu tham số)',
		   '03'=>  'Lỗi, Mã merchant không tồn tại hoặc merchant đang bị khóa kết nối tới NgânLượng.vn',
		   '04'=>  'Lỗi, Mã checksum không chính xác (lỗi này thường xảy ra khi mật khẩu giao tiếp giữa merchant và NgânLượng.vn không chính xác, hoặc cách sắp xếp các tham số trong biến params không đúng)',
		   '05'=>  'Tài khoản nhận tiền nạp của merchant không tồn tại',
		   '06'=>  'Tài khoản nhận tiền nạp của merchant đang bị khóa hoặc bị phong tỏa, không thể thực hiện được giao dịch nạp tiền',
		   '07'=>  'Thẻ đã được sử dụng ',
		   '08'=>  'Thẻ bị khóa',
		   '09'=>  'Thẻ hết hạn sử dụng',
		   '10'=>  'Thẻ chưa được kích hoạt hoặc không tồn tại',
		   '11'=>  'Mã thẻ sai định dạng',
		   '12'=>  'Sai số serial của thẻ',
		   '13'=>  'Mã thẻ và số serial không khớp',
		   '14'=>  'Thẻ không tồn tại',
		   '15'=>  'Thẻ không sử dụng được',
		   '16'=>  'Số lần thử (nhập sai liên tiếp) của thẻ vượt quá giới hạn cho phép',
		   '17'=>  'Hệ thống Telco bị lỗi hoặc quá tải, thẻ chưa bị trừ',
		   '18'=>  'Hệ thống Telco bị lỗi hoặc quá tải, thẻ có thể bị trừ, cần phối hợp với NgânLượng.vn để tra soát',
		   '19'=>  'Kết nối từ NgânLượng.vn tới hệ thống Telco bị lỗi, thẻ chưa bị trừ (thường do lỗi kết nối giữa NgânLượng.vn với Telco, ví dụ sai tham số kết nối, mà không liên quan đến merchant)',
		   '20'=>  'Kết nối tới telco thành công, thẻ bị trừ nhưng chưa cộng tiền trên NgânLượng.vn');
		   
		   return $arrCode[$error_code];
	}
	
	function CardPayWebservice($pin_card,$card_serial,$type_card,$ref_code,$client_fullname,$client_mobile,$client_email){
							
			 $strparams = $pin_card.'|'. $type_card .'|'. $ref_code .'|'. Config::$_EMAIL_RECEIVE_MONEY .'|'. $client_fullname .'|'. $client_email .'|'. $client_mobile .'|'.$card_serial ;
						
			 $params = array(						
					'merchant_id'			=> Config::$_MERCHANT_ID,						
					'checksum'		=> MD5($strparams .'|'.Config::$_MERCHANT_PASSWORD),
					'params'		=> $strparams
				);
				
				$webservice = NGANLUONG_URL_CARD_SOAP ; //"https://nganluong.vn/mobile_card_api.php?wsdl";
				$client	= new nusoap_client($webservice, true);
				$result = $client->call('CardCharge_v2', $params);
			
				$kq = new Result();
				if ($result != ''){
					$arr_result = explode("|",$result);	
				
					if (count($arr_result) == 12) {
						$kq->error_code	     = $arr_result[0];
						$kq->merchant_id	 = $arr_result[1];
						$kq->transaction_id  = $arr_result[2];				
						$kq->amount	      	 = $arr_result[3];
						$kq->pin_card	     = $arr_result[4];
						$kq->type_card	     = $arr_result[5];
						$kq->ref_code     	 = $arr_result[6];
						$kq->merchant_account = $arr_result[7];
						$kq->client_fullname = $arr_result[8];
						$kq->client_email    = $arr_result[9];
						$kq->client_mobile   = $arr_result[10];
						$kq->card_amount     = $arr_result[11];
						
						if ($kq->error_code == '00'){
						   $kq->error_message ="Nạp thẻ thành công, mệnh giá thẻ = ".$kq->card_amount;
						}
						else {
						   $kq->error_message = $this->GetErrorMessageV2($kq->error_code);
						}
					}
					
				}else $kq->error_message = 'Lỗi gọi webservice';	
		
				return $kq;
				
		}
		
	function GetErrorMessageV2($error_code) {
			$arrCode = array(
			   '00' => 'Thành công',
				'01' => 'Lỗi chưa xác minh',
				'05' => 'Mã thẻ nạp không đúng hoặc đã được sử dụng',
				'06' => 'Lỗi kết nối với hệ thống xác thực thẻ',
				'07' => 'Tài khoản nhận tiền nạp không tồn tại',
				'08' => 'Tài khoản truy cập hệ thống nạp thẻ tạm thời bị khóa',
				'09' => 'Khách hàng đang nạp thẻ bị khóa (do nhập sai mã thẻ liên tiếp)',
				'10' => 'Không nạp được tiền vào tài khoản NgânLượng.vn',
				'11' => 'Hệ thống NgânLượng.vn không sinh được phiếu thu',
				'12' => 'Phiếu thu tại NgânLượng.vn không cập nhật được trạng thái Đã thu tiền',
				'13' => 'Không chuyển tiền được vào tài khoản NgânLượng.vn của người nhận',
				);
			   return $arrCode[$error_code];
		}
		
	function getParam($param_name){
				$result = '';
				if (!empty($_POST[$param_name]))		
					$result = trim($_POST[$param_name]);
				return $result;
		}
			
}

// end include mobicard.php

if(isset($_POST['NLNapThe'])){
		$soseri = $_POST['txtSoSeri'];
		$sopin = $_POST['txtSoPin'];
		$type_card = $_POST['select_method'];
		
		
		if ($_POST['txtSoSeri'] == "" ) {
			echo '<script>alert("Vui lòng nhập Số Seri");</script>';
			echo "<script>location.href='".$_SERVER['HTTP_REFERER']."';</script>";
			exit();
		}
		if ($_POST['txtSoPin'] == "" ) {
			echo '<script>alert("Vui lòng nhập Mã Thẻ");</script>';
			echo "<script>location.href='".$_SERVER['HTTP_REFERER']."';</script>";
			exit();
		}
		
		 $arytype= array(92=>'VMS',93=>'VNP',107=>'VIETTEL',121=>'VCOIN',120=>'GATE');
	//Tiến hành kết nối thanh toán Thẻ cào.
	          $call = new MobiCard();
			  $rs = new Result();
			  $coin1 = rand(10,999);
			  $coin2 = rand(0,999);
			  $coin3 = rand(0,999);
			  $coin4 = rand(0,999);
			  $ref_code = $coin4 + $coin3 * 1000 + $coin2 * 1000000 + $coin1 * 100000000;
					
			  $rs = $call->CardPay($sopin,$soseri,$type_card,$ref_code,"","","");
			  
			  if($rs->error_code == '00') {				
				// Cập nhật data tại đây
				   echo  '<script>alert("Bạn đã nạp thành công '.$rs->card_amount.' vào trong tài khoản.");</script>'; //$total_results;
			   }
			   else {
				   echo  '<script>alert("Lỗi :'.$rs->error_message.'");</script>';
			   }
	
		 //var_dump($rs);
	
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Nap thẻ - Có thêm Vcoin và GATE</title>
<style>
#ttNganluong {
    background: url("<?php URL::to('/'); ?>/ngan-luong/includes/images/napthe.png") no-repeat scroll 0 0 transparent;
    border: 0 none;
    cursor: pointer;
    display: inline-block;
    height: 30px;
    margin-right: 5px;
    text-indent: -3000px;
    vertical-align: middle;
    width: 122px;
}
</style>
</head><body>

<form name="napthe" action="#" method="post">
<div id="body12" style="border: 1px solid #444444;  margin: 0 auto;  padding: 10px;  width: 600px;">
<div style="color:#444444;margin-top:10px;font-size:14px" align="center">
	Chọn loại thẻ để nạp
</div>

<table align="center">
	
	<tr>
    	<td colspan="3">
        	<table>
            	<tr>
                    <td style="padding-left:0px;padding-top:5px" align="right" ><label for="92"><img  src="<?php URL::to('/'); ?>/ngan-luong/includes/images/mobifone.jpg" /></label> </td>
                    <td style="padding-left:10px;padding-top:5px"><label for="93"><img  src="<?php URL::to('/'); ?>/ngan-luong/includes/images/vinaphone.jpg" /></label></td>
                    <td style="padding-top:5px;padding-left:5px" align="left"><label for="107"><img  src="<?php URL::to('/'); ?>/ngan-luong/includes/images/viettel.jpg" width="110" height="35" /></label></td>
                    <td style="padding-top:5px;padding-left:5px" align="left"><label for="121"><img width="100" height="35" src="<?php URL::to('/'); ?>/ngan-luong/includes/images/vtc.jpg"></label> </td>
                    <td style="padding-top:5px;padding-left:5px" align="left"> <label for="120"><img width="100" height="35" src="<?php URL::to('/'); ?>/ngan-luong/includes/images/gate.jpg"></label></td>
                </tr>
                <tr>
					<td align="center" style="padding-bottom:0px;">
                        <input type="radio" name="select_method" checked="true" value="VMS" id="92"  />
                    </td>
                    <td align="center" style="padding-bottom:0px;padding-left:5px">
                        <input type="radio"  name="select_method" value="VNP" id="93" />
                    </td>
                     <td align="center" style="padding-bottom:0px;padding-right:0px">
                        <input type="radio"  name="select_method" value="VIETTEL" id="107" />
                    </td>
                    <td align="center" style="padding-right:10px">
						<input type="radio" id="121" value="VCOIN" name="select_method">
					</td>
					
                    <td align="center" style="padding-bottom:0px;padding-right:0px">
                         <input type="radio" id="120" value="GATE" name="select_method">
                    </td>
					
                </tr>
            </table>
        </td>
    </tr>
    
    <tr>
        <td align="right" style="padding-bottom:10px">Số Seri :</td>
        <td colspan="2"><input type="text" id="txtSoSeri" name="txtSoSeri" style="height:25px;width:200px" /></td>
    </tr>
     <tr>
        <td align="right">Mã số thẻ : </td>
        <td colspan="2">
        	<input type="text" id="txtSoPin" name="txtSoPin" style="height:25px;width:200px" />
            
        </td>
    </tr>
   
	<tr>
        <td colspan="3" align="center" style="padding-bottom:10px;padding-right:10px">
				<input type="submit" id="ttNganluong" name="NLNapThe" value="Nạp Thẻ"  /> 
		 </td>
    </tr>	
</table>

</div>
</form>
</body></html>
