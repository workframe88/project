<?php
include "connect.php";
$tel = $_GET['tel'];
$pin = $_GET['pin'];
$point = $_GET['point'];
$time = $_GET['time'];

if($point==0){
	$time =0;
}
$sql = "INSERT INTO `users` (`tel_user`, `pin_user`,points) VALUES ('$tel', '$pin','$point')";
$conn->query($sql);
$conn->close();

header("Refresh: 0; URL=welcome.php?tel=$tel&time=$time&point=$point");
?>