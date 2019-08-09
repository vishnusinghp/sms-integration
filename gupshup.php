<?php

$digits = 4;
$otp_number = rand(pow(10, $digits-1), pow(10, $digits)-1);


$request =""; //initialise the request variable
$param['method']= "sendMessage";
$param['send_to'] = "7974965011";//9713717875
$param['msg'] = '1020 is your OTP to verify your mobile number on RCFS Mobile App. Please do not share this';
$param['userid'] = "*********";
$param['password'] = "********";
$param['v'] = "1.1";
$param['msg_type'] = "TEXT"; //Can be "FLASH”/"UNICODE_TEXT"/”BINARY”
$param['auth_scheme'] = "PLAIN";
//Have to URL encode the values
foreach($param as $key=>$val) {
$request.= $key."=".urlencode($val);
//we have to urlencode the values
$request.= "&";
//append the ampersand (&) sign after each
//parameter/value pair
}
$request = substr($request, 0, strlen($request)-1);
//remove final (&) sign from the request
$url =
"http://enterprise.smsgupshup.com/GatewayAPI/rest?".$request;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$curl_scraped_page = curl_exec($ch);
curl_close($ch);
$a = explode('|', $curl_scraped_page);
print_r($a);
echo $a[0];
?>
