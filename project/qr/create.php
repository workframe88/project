<?php 
error_reporting(E_ALL);
date_default_timezone_set('Asia/Bangkok');
header("Content-type: application/json; charset=utf-8");

/**
 | ใส่ Token ของตัวเองในนี้ |
*/
$token = "REn4+kNnYwPItXSWRfnkXcf7zYo0e+YmeLOMvzG1aMPrHrv90s+Yxvn5xEsg//pyYTFfNozP2MFD35H0I+vfnLO4TLr4mrsvKmRzOg48SXhDGjwQ42BiwQM7Ddy/mOUZnemCzU/o7AhtG3DnVIOTMnALIpaIp4BEdrMsxoAkPUCTWFhM";

/** ====================================================================== */

/**
 | ใส่ URL สำหรับการยิง Webhook กลับมา |
*/
$backgroundUrl = "http://localhost/project/qr";


$referenceNo = ceil(microtime(true));
$url  = 'https://api.gbprimepay.com/gbp/gateway/qrcode';
$imageFile = $referenceNo .'.png';

$data = array(
    'amount' => $_POST['price'],
    'token' => $token,
    'detail' => $_POST['name'],
    'backgroundUrl' => $backgroundUrl,
    'referenceNo' => $referenceNo
);

$fp = fopen('uploads/'.$imageFile, 'w+');
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_exec($ch);
fclose($fp);

$resultStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if ($resultStatus == 200) {
    http_response_code(200);
    echo json_encode(array(
        'referenceNo' => $referenceNo
    ));
} else {
    http_response_code(400);
    echo json_encode(array("error"=> $resultStatus));
}