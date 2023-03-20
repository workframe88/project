<?php
session_start();
include("connect.php");



if(isset($_FILES['file']['name'])){

	/* Getting file name */
	$filename = $_FILES['file']['name'];
	/* Location */
	$location = "../Chat/$filename";
	$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
	$imageFileType = strtolower($imageFileType);

	/* Valid extensions */
	$valid_extensions = array("jpg","jpeg","png","gif");

	$response = 0;
	/* Check file extension */
	if(in_array(strtolower($imageFileType), $valid_extensions)) {
		$sql="SELECT * FROM chat";
		$result = mysqli_query($con,$sql);
		$rowcount = mysqli_num_rows($result);
		
		$data = '<img class="rounded mx-auto d-block" style="width: 100%; height: 100%;" src="Chat/';
		$data2 ='.png">';
		$d1 ='<a data-fancybox="gallery" data-caption="" href="Chat/';
		$d2 ='.png">';
		$d3 ='</a>';
		$id = $_SESSION["UserID"];
		$EZ = GetHostByName($_SERVER['HTTP_X_FORWARDED_FOR']);
		$msg1 = $_SESSION["msg1"];
$msg2 = $_SESSION["msg2"];
$sql2="SELECT * FROM chat WHERE No ='$msg2'";
$result2 = mysqli_query($con,$sql2);
$row = mysqli_fetch_array($result2);
$data003 = $row['Chat_ms'];
$data004 = $row['Chat_time'];
$data005 = $row['Chat_ip'];
$data006 = $row['Type'];
$data007 = $row['Chat_id'];

$data01 ='<div class="chat-content"style="margin-top: 5px;margin-bottom: 5px;background: #ff8470;padding-top: 5px;padding-left: 5px;padding-right: 5px;padding-bottom: 5px;"><div class="chat chat-left" style="text-align:left; "><div class="chat-avatar"> <a class="avatar avatar-online"> <img src="img/';
$data02 = $data007;
$data03 = '1234.png" alt="...">';
$data04 = '<i></i></a></div><div style="text-align:left;margin-left: 50px"><span class="badge rounded-pill bg-primary"><i class="fas fa-user"></i>';
$data05 = $data007;
$data06 = ' / ';
$data07 = $data005;
$data08 ='<a style="text-align:left;" class="chat-time" datetime="';
$data09 = $data004;
$data010 = '">';
$data011 = $data004;
$data012 = '</a></span></div><div class="chat-body" > <div class="chat-content hard_break" ><p class="hard_break" style="">';
$data013 =$data003;
$data014 ='</p></div></div></div></div>';
$data016 ='<hr>';
$data015 =$msg1;

$sql = "INSERT INTO Chat (Chat_id,Chat_ms,Chat_ip,Type) VALUES
    ('$id','$data01$data02$data03$data04$data05$data06$data07$data08$data09$data010$data011$data012$data013$data014$data016$d1$rowcount$d2$data$rowcount$data2$d3$data015','$EZ','img')";
$result = mysqli_query($con, $sql);
		
		$location = "../Chat/$rowcount.png";

	   	if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
	     	$response = $location;
	   	}
	}

	echo $response;
	exit;
}


echo 0;
?>
