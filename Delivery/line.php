<?php
session_start();
include "connect.php";
header('Content-Type: text/html; charset=utf-8');
error_reporting( error_reporting() & ~E_NOTICE );

$tel = $_POST['tel']; 
$name1 = $_POST['name1'];
$demo=$_POST['demo'];
$oder=$_POST['oder'];
$_SESSION['oder'] = $oder;
$total=0;
        if(!empty($_SESSION['cart']))
{
  foreach($_SESSION['cart'] as $p_id=>$qty)
  {
    $sql1 = "select * from product where p_id=$p_id";
    $query1=mysql_db_query($dbname,$sql1);
    $row1 = mysql_fetch_array($query1);
    $sum = $row1['p_price'] * $qty;
    $total += $sum;
    echo "<tr>";
    echo "<td width='172'><img src='" . $row1["p_img1"] ." ' width='10%'></td>"."\n"; 
    echo "<td width='190'>" . $row1["p_name"] . "</td>"."\n";
    echo "<td width='40' align='right'>" .number_format($row1["p_price"],2) . "</td>"."\n";
    echo "<td width='57' align='right'>";  
    echo "<h7 name='amount[$p_id]'>$qty</h7>"."\n";
    //echo "<input type='text' name='amount[$p_id]' value='$qty' size='2'/></td>";
    echo "<td width='70' align='right'>".number_format($sum,2)."</td>"."\n";

    $_SESSION['sum'] = $sum;

    ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	date_default_timezone_set("Asia/Bangkok");

	$sToken = "2wLOkLpQWuJwO9INWxY0A9hk3ePvsMh79gsWjFk463V";
	$sMessage = 'มีรายการสั่งซื้อ'."\n".$row1["p_name"]."\n".'จำนวน : '.$qty."\n".'ราคารวม : '.$sum.' บาท';

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
		echo "<br/>";
		echo "status : ".$result_['status'];
		echo "<br/>";
		echo "message : ". $result_['message'];
		echo $demo;

	} 
	curl_close( $chOne );   

  }
  if($total >=100){
  }else{
    $total =$total+10;
  }
  echo "<tr>";
    echo "<td align='right' colspan='4' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
    echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
    echo "<td align='left' bgcolor='#CEE7FF'></td>";
  echo "</tr>";
	$sToken2 = "2wLOkLpQWuJwO9INWxY0A9hk3ePvsMh79gsWjFk463V";
	$sMessage2 = 'รายละเอียด : '.$oder."\n".'ราคารวม : '.$total."\n".'ชื่อ : '.$name1."\n".'เบอร์โทร : '.$tel."\n".'พิกัด : '.$demo;
	$chOne2 = curl_init(); 
	curl_setopt( $chOne2, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
	curl_setopt( $chOne2, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt( $chOne2, CURLOPT_SSL_VERIFYPEER, 0); 
	curl_setopt( $chOne2, CURLOPT_POST, 1); 
	curl_setopt( $chOne2, CURLOPT_POSTFIELDS, "message=".$sMessage2); 
	$headers2 = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken2.'', );
	curl_setopt($chOne2, CURLOPT_HTTPHEADER, $headers2); 
	curl_setopt( $chOne2, CURLOPT_RETURNTRANSFER, 1); 
	$result2 = curl_exec( $chOne2 ); 

	//Result error 
	if(curl_error($chOne2)) 
	{ 
		echo 'error:' . curl_error($chOne2); 
	} 
	else { 
		$result_2 = json_decode($result2, true); 
		echo "<br/>";
		echo "status : ".$result_2['status'];
		echo "<br/>";
		echo "message : ". $result_2['message'];
		

	} 
	curl_close( $chOne2 );   
	
}
mysql_close();
header("Location: order.php");
?>