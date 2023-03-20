<?php
include "connect.php";
header('Content-Type: text/html; charset=utf-8');
error_reporting( error_reporting() & ~E_NOTICE );
$name_cus=$_POST['name_cus'];
$tel_cus=$_POST['tel_cus'];

date_default_timezone_set('Asia/Bangkok');
$date=date("d/m/Y h:i:sa");
$n=$tel_cus;
	$new = "/".$n.".jpg";
	if(empty($_FILES["image"]["tmp_name"]))
	{
		$new =  "def.jpg";
		echo "111";
	}
	else
	{
		copy($_FILES["image"]["tmp_name"],"./img/".$new);
		echo "222";
	}

$token = "2wLOkLpQWuJwO9INWxY0A9hk3ePvsMh79gsWjFk463V" ; // LINE Token

$sticker_package_id = '446';  // Package ID sticker
$sticker_id = '2023';    // ID sticker
$mymessage = "\n____ $date ____";
$data = array (
    'message' => $mymessage,
    //'imageFile' => $imageFile,
    //'stickerPackageId' => $sticker_package_id,
    //'stickerId' => $sticker_id
  );
$chOne = curl_init();
  curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
  curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt( $chOne, CURLOPT_POST, 1);
  curl_setopt( $chOne, CURLOPT_POSTFIELDS, $data);
  curl_setopt( $chOne, CURLOPT_FOLLOWLOCATION, 1);
  $headers = array( 'Method: POST', 'Content-type: multipart/form-data', 'Authorization: Bearer '.$token, );
  curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
  curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec( $chOne );

//Message
$sql6 = "SELECT *,COUNT(`name_order`) ,sum(`price_order`) FROM `order_cus`WHERE `tel_cus`= $tel_cus GROUP BY `name_order` DESC";
    $result6=mysql_db_query($dbname,$sql6);
              while($row6=mysql_fetch_row($result6)) //for($a=1;$a<=1;$a++)
      {
        $mymessage = "\n รายการ : $row6[1] \n จำนวน : $row6[5]"; //Set new line with '\n'

  $data = array (
    'message' => $mymessage,
    //'imageFile' => $imageFile,
    //'stickerPackageId' => $sticker_package_id,
    //'stickerId' => $sticker_id
  );
  $chOne = curl_init();
  curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
  curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt( $chOne, CURLOPT_POST, 1);
  curl_setopt( $chOne, CURLOPT_POSTFIELDS, $data);
  curl_setopt( $chOne, CURLOPT_FOLLOWLOCATION, 1);
  $headers = array( 'Method: POST', 'Content-type: multipart/form-data', 'Authorization: Bearer '.$token, );
  curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
  curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec( $chOne );
      }

$text='htdocs\kbtc\img\/'.$new;
  $cal = "SELECT *,sum(`price_order`) FROM `order_cus`WHERE `tel_cus`= $tel_cus";
$cal_all=mysql_db_query($dbname,$cal);
while($cal_price=mysql_fetch_row($cal_all)){
	$mymessage = "\n ราคารวม : $cal_price[5] \n ชื่อ : $cal_price[3] \n เบอร์โทร : $cal_price[4]";
	$imageFile = new CURLFILE($text); // Local Image file Path
	$data = array (
    'message' => $mymessage,
    'imageFile' => $imageFile,
    //'stickerPackageId' => $sticker_package_id,
    //'stickerId' => $sticker_id
  );
	$chOne = curl_init();
  curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
  curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt( $chOne, CURLOPT_POST, 1);
  curl_setopt( $chOne, CURLOPT_POSTFIELDS, $data);
  curl_setopt( $chOne, CURLOPT_FOLLOWLOCATION, 1);
  $headers = array( 'Method: POST', 'Content-type: multipart/form-data', 'Authorization: Bearer '.$token, );
  curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
  curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec( $chOne );
}

//Check error
  if(curl_error($chOne)) { echo 'error:' . curl_error($chOne); }
  else { $result_ = json_decode($result, true);
  echo "status : ".$result_['status']; echo "message : ". $result_['message']; 
  }
  //Close connection
  curl_close( $chOne );"<br>";
  echo $text ;
  //header("Location:success.php?name=$name_cus&&tel=$tel_cus");
?>
