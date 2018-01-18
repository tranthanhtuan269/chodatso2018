<?php
//CẤU HÌNH TÀI KHOẢN (Configure account)
define('EMAIL_BUSINESS','tran.thanh.tuan269@gmail.com');//Email Bảo kim
define('MERCHANT_ID','24860');                // Mã website tích hợp
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

?>