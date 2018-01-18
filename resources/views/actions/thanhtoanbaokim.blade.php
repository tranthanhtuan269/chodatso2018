<?php

//CẤU HÌNH TÀI KHOẢN (Configure account)
define('EMAIL_BUSINESS','tran.thanh.tuan269@gmail.com');//Email Bảo kim
define('MERCHANT_ID','25062');                // Mã website tích hợp
define('SECURE_PASS','1668e88103de7f36');

// Cấu hình tài khoản tích hợp
define('API_USER','chodatso');  //API USER
define('API_PWD','upNC2sTx3Vt64onHF42AJGac10MmE');       //API PASSWORD
define('PRIVATE_KEY_BAOKIM','-----BEGIN PRIVATE KEY-----
MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQCotQBJ2VzVIC6f
eFpppj3SO5jCr7K7fs4k62XSNPqfSP04zdQWuhvY/7xvMxk+sFRsTPvM2qh7m2aF
FMXMn56knIAfoM8yR5bRclWz1zk0EWLZR+MJ/VEVo7om/qE8c/K7ntNZDxosHB9r
D8FubHDh+9SjvmrUDxVzpbiQniSJeW2Lx+r9f9e4G4lVyTkRqOCA2BASSXMX9NbM
qP97oj3aAQBIMALE5t7hXp2lxkGxMfu13CKRCXsL2DVpIEVw1GTpbIzr1XWADgZZ
Q5yvePvu0Co19TVkY4zkedXY+gZF7Uzeo3GcjHyGO+FOOYfkg/QUmz0mgk5eAc/2
u4gcpLhjAgMBAAECggEAXGoqKkoDbEwgvgJzpIQIQW2cFKmiQssHqXm5YRjcYPze
mYtGrtxr/Ma6Nj/LiGeXF2xkUqdEu9E4q5XhdGHLyWhhVvIEDgrhNwJmqAkxsLAF
cfjLCeHV1QDHLC03raHmSZiLNbHsKFWPcFpFH3QPsfr9VGUup9NLcPpKzA2U/ii+
YpINLgp2j61Ot/D8nZsy6AeGqw4e51yl2jq27d4fjF6pF+QKm4wFbDpv/OoRWm/I
K5epJJJatTGIFfEFTXi1AGnPvGz3v7wakQcSj/V/q3zNcjVpDNYBUaobstqRt3bi
u2eNUXx9PKDXFEVoezKtw/iYXwA4QAG8f02T5ISFwQKBgQDXPdxVq+sFWxjz9VtO
mNoZty1EDOtON0OHsXbi15oIvyIACu0HhRXI9KiknRFxAzTaWw0qLs9ko892r1Tc
xcRAn+KLT7ldu8GmoUuQyr/Y2iDkQF2oxe0kNP5WoQYqGxi0fVxK1+xKN6HOlN1r
Hxp1wjn+GpO/QlKPkqN+hv5aKwKBgQDIp09ySntCngQ4hfCqGp+1c2w5rRTTARH3
kzgmkBYlOl+/ErI8B4yfNROOs84gxUGKPaFFI6ZIcKzVJi040PTpmydezyl/arTe
RSZB+zMMxKwhBzpPiKYOfve8glN+7/tX3yL6b1O7z8yegrvGgt9RYMvHnvBN5sJN
P20ZzLKWqQKBgQCeB5Ae4nNSYlkGvKzGHxl6ae/1F5snuRF+rgAAepVgOJyI9Xyj
2cVt3pt3CM8Gb3k9nD4lK2sfk9m9ZOtkkFsPq5PT/ru1IyYB5kipzQJf/37Itq1N
PcxnmfTmu6DgBzbzRVsepDubHg9RsiCDBroRnYGgm/jAIrylJt+dBRX4MwKBgQCW
cFqwZgdkOvUPK9z0rGFxucg6tfoW+YZvCIHg58aywsFmkK3xM/fKphCzvTuedkZd
TzfKjp/tUA1FAgqFvqThQOKTwt5qGabhvxagAaaUvCAR40lkuB9IXwl+3HedhG/9
wd6HxVASUAoqDfqbKyQj717Zm+Cvh4PGRveVkFOVgQKBgE2bQGwLwpbl16PZvEGs
w5jYwbFN8nyObyXZ6ydppU4gZ5ISc3ZUIH1VrZUuYLDfpQhFHi/O80LqGbc59hI7
765L8L4IOrvfWScx/+iOnyx6TZtgz9mcQmXD14sGEvo18LBB4EuzPFnWIOnLl+pT
1OKg6of38x8kWggrdRk261lf
-----END PRIVATE KEY-----
');

define('BAOKIM_API_SELLER_INFO','/payment/rest/payment_pro_api/get_seller_info');
define('BAOKIM_API_PAY_BY_CARD','/payment/rest/payment_pro_api/pay_by_card');
define('BAOKIM_API_PAYMENT','/payment/order/version11');

define('BAOKIM_URL','https://www.baokim.vn');
//define('BAOKIM_URL','http://kiemthu.baokim.vn');

//Phương thức thanh toán bằng thẻ nội địa
define('PAYMENT_METHOD_TYPE_LOCAL_CARD', 1);
//Phương thức thanh toán bằng thẻ tín dụng quốc tế
define('PAYMENT_METHOD_TYPE_CREDIT_CARD', 2);
//Dịch vụ chuyển khoản online của các ngân hàng
define('PAYMENT_METHOD_TYPE_INTERNET_BANKING', 3);
//Dịch vụ chuyển khoản ATM
define('PAYMENT_METHOD_TYPE_ATM_TRANSFER', 4);
//Dịch vụ chuyển khoản truyền thống giữa các ngân hàng
define('PAYMENT_METHOD_TYPE_BANK_TRANSFER', 5);


class CallRestful
{
	/**
	 * Gọi API Bảo Kim thực hiện thanh toán với thẻ ngân hàng
	 *
	 * @param $method Sử dụng phương thức GET, POST cho với từng API
	 * @param $data Dữ liệu gửi đên Bảo Kim
	 * @param $api API được gọi sang Bảo Kim
	 * @param $object WC_Gateway_Baokim_Pro
	 * @var $object WC_Gateway_Baokim_Pro
	 * @return mixed
	 */
	function call_API($method, $data, $api)
	{
		$business = EMAIL_BUSINESS;
		$username = API_USER;
		$password = API_PWD;
		$private_key = PRIVATE_KEY_BAOKIM;
		$server = BAOKIM_URL;

		$arrayPost = array();
		$arrayGet = array();

		ksort($data);
		if ($method == 'GET') {
			$arrayGet = $data;
		} else {
			$arrayPost = $data;
		}

		$signature = $this->makeBaoKimAPISignature($method, $api, $arrayGet, $arrayPost, $private_key);
		$url = $server . $api . '?' . 'signature=' . $signature . (($method == "GET") ? $this->createRequestUrl($data) : '');
		$curl = curl_init($url);
		//	Form
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLINFO_HEADER_OUT, 1);
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST | CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_USERPWD, $username . ':' . $password);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		if ($method == 'POST') {
			curl_setopt($curl, CURLOPT_POSTFIELDS, $this->httpBuildQuery($arrayPost));
		}

		$result = curl_exec($curl);
		$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		$error = curl_error($curl);
		if (empty($result)) {
			return array(
				'status' => $status,
				'error' => $error
			);
		}
		return $result;
	}

	/**
	 * Hàm thực hiện việc tạo chữ ký với dữ liệu gửi đến Bảo Kim
	 *
	 * @param $method
	 * @param $url
	 * @param array $getArgs
	 * @param array $postArgs
	 * @param $priKeyFile
	 * @return string
	 */
	private function makeBaoKimAPISignature($method, $url, $getArgs = array(), $postArgs = array(), $priKeyFile)
	{
		if (strpos($url, '?') !== false) {
			list($url, $get) = explode('?', $url);
			parse_str($get, $get);
			$getArgs = array_merge($get, $getArgs);
		}
		ksort($getArgs);
		ksort($postArgs);
		$method = strtoupper($method);

		$data = $method . '&' . urlencode($url) . '&' . urlencode(http_build_query($getArgs)) . '&' . urlencode(http_build_query($postArgs));

		$priKey = openssl_get_privatekey($priKeyFile);
		assert('$priKey !== false');

		$x = openssl_sign($data, $signature, $priKey, OPENSSL_ALGO_SHA1);
		assert('$x !== false');
		return urlencode(base64_encode($signature));
	}

	private function httpBuildQuery($formData, $numericPrefix = '', $argSeparator = '&', $arrName = '')
	{
		$query = array();
		foreach ($formData as $k => $v) {
			if (is_int($k)) $k = $numericPrefix . $k;
			if (is_array($v)) $query[] = httpBuildQuery($v, $numericPrefix, $argSeparator, $k);
			else $query[] = rawurlencode(empty($arrName) ? $k : ($arrName . '[' . $k . ']')) . '=' . rawurlencode($v);
		}

		return implode($argSeparator, $query);
	}

	private function createRequestUrl($data)
	{
		$params = $data;
		ksort($params);
		$url_params = '';
		foreach ($params as $key => $value) {
			if ($url_params == '')
				$url_params .= $key . '=' . urlencode($value);
			else
				$url_params .= '&' . $key . '=' . urlencode($value);
		}
		return "&" . $url_params;
	}
}

class BaoKimPaymentPro{

	/**
	 * Call API GET_SELLER_INFO
	 *  + Create bank list show to frontend
	 *
	 * @internal param $method_code
	 * @return string
	 */
	public function get_seller_info()
	{
		$param = array(
			'business' => EMAIL_BUSINESS,
		);
		$call_restfull = new CallRestful();
		$call_API = $call_restfull->call_API("GET", $param, BAOKIM_API_SELLER_INFO );
		if (is_array($call_API)) {
			if (isset($call_API['error'])) {
				return "<strong style='color:red'>call_API" . json_encode($call_API['error']) . "- code:" . $call_API['status'] . "</strong> - " . "System error. Please contact to administrator";
			}
		}

		$seller_info = json_decode($call_API, true);
		if (!empty($seller_info['error'])) {
			return "<strong style='color:red'>eller_info" . json_encode($seller_info['error']) . "</strong> - " . "System error. Please contact to administrator";
		}

		$banks = $seller_info['bank_payment_methods'];

		return $banks;
	}


	/**
	 * Call API PAY_BY_CARD
	 *  + Get Order info
	 *  + Sent order, action payment
	 *
	 * @param $orderid
	 * @return mixed
	 */
	public function pay_by_card($data)
	{
		$base_url = "http://" . $_SERVER['SERVER_NAME'];
		$url_success = $base_url.'/success';
		$url_cancel = $base_url.'/cancel';
		$order_id = time();
		$total_amount = str_replace('.','',$data['total_amount']);

		$params['business'] = strval(EMAIL_BUSINESS);
		$params['bank_payment_method_id'] = intval($data['bank_payment_method_id']);
		$params['transaction_mode_id'] = '1'; // 2- trực tiếp
		$params['escrow_timeout'] = 3;

		$params['order_id'] = $order_id;
		$params['total_amount'] = $total_amount;
		$params['shipping_fee'] = '0';
		$params['tax_fee'] = '0';
		$params['currency_code'] = 'VND'; // USD

		$params['url_success'] = $url_success;
		$params['url_cancel'] = $url_cancel;
		$params['url_detail'] = '';

		$params['order_description'] = 'Thanh toán đơn hàng từ Website '. $base_url . ' với mã đơn hàng ' . $order_id;
		$params['payer_name'] = $data['payer_name'];
		$params['payer_email'] = $data['payer_email'];
		$params['payer_phone_no'] = $data['payer_phone_no'];
		$params['payer_address'] = $data['address'];

		$call_restfull = new CallRestful();
		$result = json_decode($call_restfull->call_API("POST", $params, BAOKIM_API_PAY_BY_CARD), true);

		return $result;
	}

	public function generateBankImage($banks,$payment_method_type){
		$html = '';
		if (is_array($banks) || is_object($banks))
		{
			foreach ($banks as $bank) {	
				if ($bank['payment_method_type'] == $payment_method_type) {
					$html .= '<li><img class="img-bank"   id="' . $bank['id'] .  '" src="' .  $bank['logo_url'] . '" title="' .  $bank['name'] . '"/></li>';
				}
			}
		}
		return $html;
	}

}

class BaoKimPayment
{
	/**
	 * Cấu hình phương thức thanh toán với các tham số
	 * E-mail Bảo Kim - E-mail tài khoản bạn đăng ký với BaoKim.vn.
	 * Merchant ID - là “mã website” được Baokim cấp khi bạn đăng ký tích hợp.
	 * Mã bảo mật - là “mật khẩu” được Baokim cấp khi bạn đăng ký tích hợp
	 * Vd : 12f31c74fgd002b1
	 * Server Bảo Kim
	 * Trang ​Kiểm thử - server để test thử phương thức thanh. .toán
	 * Trang thực tế - Server thực tế thực hiện thanh toán.
	 * https://www.baokim.vn/payment/order/version11' => ('Trang thực tế'),
	 * http://kiemthu.baokim.vn/payment/order/version11' => ('Trang kiểm thử')
	 * Chọn Save configuration để áp dụng thay đổi
	 * Hàm xây dựng url chuyển đến BaoKim.vn thực hiện thanh toán, trong đó có tham số mã hóa (còn gọi là public key)
	 * @param $order_id                Mã đơn hàng
	 * @param $business            Email tài khoản người bán
	 * @param $total_amount            Giá trị đơn hàng
	 * @param $shipping_fee            Phí vận chuyển
	 * @param $tax_fee                Thuế
	 * @param $order_description    Mô tả đơn hàng
	 * @param $url_success            Url trả về khi thanh toán thành công
	 * @param $url_cancel            Url trả về khi hủy thanh toán
	 * @param $url_detail            Url chi tiết đơn hàng
	 * @param null $payer_name
	 * @param null $payer_email
	 * @param null $payer_phone_no
	 * @param null $shipping_address
	 * @return url cần tạo
	 */
	public function createRequestUrl($data)
	{
		//var_dump($data);die;
		$order_id = time();
		$total_amount = str_replace('.','',$data['total_amount']);
		$base_url = "http://" . $_SERVER['SERVER_NAME'];
		$url_success = $base_url.'/success';
		$url_cancel = $base_url.'/cancel';
		$currency = 'VND'; // USD
		// Mảng các tham số chuyển tới baokim.vn
		$params = array(
			'merchant_id'		=>	strval(MERCHANT_ID),
			'order_id'			=>	strval($order_id),
			'business'			=>	strval(EMAIL_BUSINESS),
			'total_amount'		=>	strval($total_amount),
			'shipping_fee'		=>  strval('0'),
			'tax_fee'			=>  strval('0'),
			'order_description'	=>	strval('Thanh toán đơn hàng từ Website '. $base_url . ' với mã đơn hàng ' . $order_id),
			'url_success'		=>	strtolower($url_success),
			'url_cancel'		=>	strtolower($url_cancel),
			'url_detail'		=>	strtolower(''),
			'payer_name'		=>  strval($data['payer_name']),
			'payer_email'		=> 	strval($data['payer_email']),
			'payer_phone_no'	=> 	strval($data['payer_phone_no']),
			'shipping_address'  =>  strval($data['address']),
			'currency' => strval($currency),

		);
                
		ksort($params);

		$params['checksum']=hash_hmac('SHA1',implode('',$params),SECURE_PASS);

		//Kiểm tra  biến $redirect_url xem có '?' không, nếu không có thì bổ sung vào
		$redirect_url = BAOKIM_URL . BAOKIM_API_PAYMENT;
		if (strpos($redirect_url, '?') === false)
		{
			$redirect_url .= '?';
		}
		else if (substr($redirect_url, strlen($redirect_url)-1, 1) != '?' && strpos($redirect_url, '&') === false)
		{
			// Nếu biến $redirect_url có '?' nhưng không kết thúc bằng '?' và có chứa dấu '&' thì bổ sung vào cuối
			$redirect_url .= '&';
		}

		// Tạo đoạn url chứa tham số
		$url_params = '';
		foreach ($params as $key=>$value)
		{
			if ($url_params == '')
				$url_params .= $key . '=' . urlencode($value);
			else
				$url_params .= '&' . $key . '=' . urlencode($value);
		}
		return $redirect_url.$url_params;
	}

	/**
	 * Hàm thực hiện xác minh tính chính xác thông tin trả về từ BaoKim.vn
	 * @param $url_params chứa tham số trả về trên url
	 * @return true nếu thông tin là chính xác, false nếu thông tin không chính xác
	 */
	public function verifyResponseUrl($url_params = array())
	{
		if(empty($url_params['checksum'])){
			echo "invalid parameters: checksum is missing";
			return FALSE;
		}

		$checksum = $url_params['checksum'];
		unset($url_params['checksum']);

		ksort($url_params);

		if(strcasecmp($checksum,hash_hmac('SHA1',implode('',$url_params),SECURE_PASS))===0)
			return TRUE;
		else
			return FALSE;
	}
}

$baokim = new BaoKimPaymentPro();
$banks = $baokim->get_seller_info();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Payment</title>
	<meta content="index, follow" name="robots"/>
	<meta content="" name="description"/>
	<meta content="" name="keywords"/>
	<meta name="ROBOTS" content="index, follow"/>

	<link type="text/css" rel="stylesheet" href="{{ URL::to('/') }}/bao-kim/css/bootstrap.min.css"/>
	<link type="text/css" rel="stylesheet" href="{{ URL::to('/') }}/bao-kim/css/bootstrap-responsive.css"/>
	<link type="text/css" rel="stylesheet" href="{{ URL::to('/') }}/bao-kim/css/main.css"/>
	<script src="{{ URL::to('/') }}/bao-kim/js/jquery-1.9.1.min.js"></script>
	<script src="{{ URL::to('/') }}/bao-kim/js/bootstrap.min.js"></script>
	<script src="{{ URL::to('/') }}/bao-kim/js/jquery.number.js"></script>

</head>

<body>
<div id="wrapper">
	<!-- nav -->
	<div class="nav">
		<div class="nav_title">Phương thức thanh toán</div>
	</div>
	<!--/ end nav -->

	<!-- payment -->
	<div class="payment_list">
		<div id="select_payment">
			<form method="post" action="" id="form-action">
				<div class="row-fluid customer_info ">
					<div class="info">
						<span class="title">Thông tin người thanh toán<!--<img src="{{ URL::to('/') }}/public/images/safe.png" border="0" style="vertical-align: bottom; margin-left: 5px;" />--></span>
						<dl class="dl-horizontal">
							<dt>Họ tên:</dt>
							<dd><input type="text" name="payer_name"></dd>
							<dt>Số điện thoại:</dt>
							<dd><input type="text" name="payer_phone_no"></dd>
							<dt>Email:</dt>
							<dd><input type="text" name="payer_email"></dd>
							<dt>Địa chỉ:</dt>
							<dd><input type="text" name="address"></dd>
							<dt>Số tiền thanh toán:</dt>
							<dd><input id="total_amount" type="text" name="total_amount"></dd>
						</dl>
					</div>
				</div>
				<div class="method row-fluid" id="2">
					<div class="icon"><img src="{{ URL::to('/') }}/bao-kim/images/creditcard.png" border="0"/></div>
					<div class="info">
						<span class="title">Thanh toán trực tuyến bằng thẻ quốc tế <!--<img src="images/safe.png" border="0" style="vertical-align: bottom; margin-left: 5px;" />--></span>

						<div class="bank_list">
							<ul id="b_l">
								<?php echo $baokim->generateBankImage($banks,PAYMENT_METHOD_TYPE_CREDIT_CARD); ?>
							</ul>
							<div class="clr"></div>
						</div>
					</div>
					<div class="check_box"></div>
				</div>

				<div class="row-fluid method" id="3">
					<div class="icon"><img src="{{ URL::to('/') }}/bao-kim/images/transfer.png" border="0"/></div>
					<div class="info">
						<span class="title">Chuyển khoản InternetBanking</span>
						<span class="desc">Chọn ngân hàng thanh toán</span>

						<div class="bank_list">
							<ul id="b_l">
								<?php echo $baokim->generateBankImage($banks,PAYMENT_METHOD_TYPE_INTERNET_BANKING); ?>
							</ul>
						</div>
					</div>
					<div class="check_box"></div>
				</div>
				<div class="row-fluid method" id="1">
					<div class="icon"><img src="{{ URL::to('/') }}/bao-kim/images/atm.png" border="0"/></div>
					<div class="info">
						<span class="title">Thanh toán trực tuyến bằng thẻ ATM nội địa</span>
						<span class="desc">Chọn ngân hàng thanh toán</span>

						<div class="bank_list">
							<ul id="b_l">
								<?php echo $baokim->generateBankImage($banks,PAYMENT_METHOD_TYPE_LOCAL_CARD); ?>
							</ul>
							<div class="clr"></div>
						</div>
					</div>
					<div class="check_box"></div>
				</div>

				<div class="row-fluid method" id="0">
					<div class="icon"><img src="{{ URL::to('/') }}/bao-kim/images/sercurity.png" border="0"/></div>
					<div class="info">
						<div class="bk_logo"><a href="http://baokim.vn" target="_blank"><img
									src="{{ URL::to('/') }}/bao-kim/images/bk_logo.png" border="0"/></a></div>
						<span class="title">Thanh toán Bảo Kim</span>
						<span class="desc">Thanh toán bằng tài khoản Bảo Kim (Baokim.vn)</span>
					</div>
					<div class="check_box" id="check_bk"></div>
				</div>
				<!---<li class="mode">
					<div class="info1">
						<span class="title">Hình thức thanh toán</span>

						<div class="payment-mode">
							<input type="radio" checked="true" class="input-mode" name="payment_mode" value="1">								<span class="desc-mode">Thanh toán trực tiếp</span>
						</div>

						<div class="payment-mode">
							<input type="radio" class="input-mode" name="payment_mode" value="2" >								<span class="desc-mode">Thanh toán an toàn</span>
						</div>
						<div id="daykeep" >
							<span class="desc-mode" style="margin-right:5px;">Số ngày tạm giữ</span>
							<select name="escrow_timeout" class="daykeep">
								<option value=3>3 ngày</option>
								<option value=5>5 ngày</option>
								<option value=7>7 ngày</option>
							<select>
						</div>
					</div>

				</li>--->


				<input type="hidden" name="active_submit" value="submit"/>
				<input type="hidden" name="bank_payment_method_id" id="bank_payment_method_id" value=""/>
				<input type="hidden" name="shipping_address" size="30" value="Hà Nội"/>
				<input type="hidden" name="payer_message" size="30" value="Ok"/>
				<input type="hidden" name="extra_fields_value" size="30" value=""/>
				<input type="hidden" name="extra_payment" id="extra_payment" value=""/>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="submit">
					<input type="submit" class="btn btn-success pm_submit" name="submit" value="Hoàn thành"/>
				</div>
			</form>
		</div>

	</div>
	<!--/ end payment -->
</div>
<script>
	$("#total_amount").number( true, 0 , ',','.' );
	$(function () {

		$('#check_bk').click(function(){
			$('#bank_payment_method_id').val(0);
		});

		$('.img-bank').click(function () {
			$('.method img').removeClass('img-active');
			$(this).addClass('img-active');
			var id = $(this).attr('id');
			$('#bank_payment_method_id').val(id);
		});

		$('.method').click(function () {
			$(this).siblings().children().find('img').removeClass('img-active');
			$('.method').removeClass('selected');
			$('.check_box').removeClass('checked_box');
			$(this).addClass('selected');
			$('.selected .check_box').addClass('checked_box');
			var method = $(this).attr('id');
			if (method != 0) {
				//$('.mode').css('display','block');
				$('.info1').slideDown();
				$('.selected img').click(function () {
					$('.method img').removeClass('img-active');
					$(this).addClass('img-active');
					var id = $(this).attr('id');
					$('#bank_payment_method_id').val(id);

				});
			}
			else {
				//$('.mode').css('display','none');
				$('.info1').slideUp('slow');
				$('.method img').removeClass('img-active');
			}
			$('#form-action').attr('action', 'tienhanhthanhtoan');
		});

		$('.input-mode').click(function () {
			var a = $(this).val();
			if (a == 2) {
				$('#daykeep').css('display', 'block');
			}
			if (a == 1) {
				$('#daykeep').css('display', 'none');
			}

		});
	});
</script>
</body>
</html>
