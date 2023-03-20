<!DOCTYPE html>
<html>
<head>
	<title>Line</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mali:wght@200&family=Mochiy+Pop+One&family=Prompt:wght@300&display=swap" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>

</body>
</html>

<?php
session_start();
include "connect.php";
header('Content-Type: text/html; charset=utf-8');
error_reporting( error_reporting() & ~E_NOTICE );

$time = $_POST['time']; 
$old = $_POST['old'];
$new=$_POST['new'];


ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	date_default_timezone_set("Asia/Bangkok");

	$sToken = "4Ynz32NWO9TSb4a5sEIVCs2y9eLAQhXBBsxn2pKBOnC";
	$sMessage = "\n".'ออร์เดอร์เวลา '.$time.' น.'."\n".'ยอดเก่า : '.$old.' บาท'."\n".'ยอดใหม่ : '.$new.' บาท'."\n".'**สาขาปูดำ**';

	$chOne = curl_init(); 
	curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
	curl_setopt( $chOne, CURLOPT_POST, 1); 
	curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
	$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
	curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
	curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
	$result = curl_exec( $chOne ); 

	//Result error 
	if(curl_error($chOne)) 
	{ 
		echo 'error:' . curl_error($chOne); 
	} 
	else { 
		$result_ = json_decode($result, true); 
		//echo "<br/>";
		//echo "status : ".$result_['status'];
		//echo "<br/>";
		//echo "message : ". $result_['message'];
		//echo $new;

		echo "<br/>";
		echo"<center><h1>Complete !</h1>";
		echo "<img src='https://cdn.pixabay.com/photo/2016/03/31/14/37/check-mark-1292787_960_720.png' width='200px'><br/><br/>";
		echo "<a href='history.php' class='btn btn-warning'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill=currentColor' class='bi bi-arrow-bar-left' viewBox='0 0 16 16'>
  <path fill-rule='evenodd' d='M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5zM10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5z'/>
</svg> กลับ</a></center><br/>";
		echo "</center>";
	} 
	curl_close( $chOne );   


?>