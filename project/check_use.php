<?php
error_reporting (E_ALL ^ E_NOTICE);
include "connect.php";
$tel = $_GET['tel'];
$point = $_GET['point'];

$time = $_GET['time'];
if($point==0){
	$time =0;
}
$sql = "SELECT * FROM users where tel_user ='$tel'";
$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		//echo $sql = "UPDATE `users` SET `points` = $point WHERE `users`.`tel_user` = $tel;";
		$conn->query($sql);
		$conn->close();
	 	header("Refresh: 0; URL=pin.php?tel=$tel&point=$point&time=$time");
	}else {
		header("Refresh: 0; URL=new_use.php?tel=$tel&point=$point&time=$time");
	//echo "0 results";
	}
?>