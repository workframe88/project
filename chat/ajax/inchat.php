<?php
session_start();
include("connect.php");

$data = $_POST['data'];
$id = $_SESSION["UserID"];
$EZ = GetHostByName($_SERVER['HTTP_X_FORWARDED_FOR']);

$sql = "INSERT INTO Chat (Chat_id,Chat_ms,Chat_ip) VALUES
    ('$id','$data','$EZ')";
$result = mysqli_query($con, $sql);

?>
