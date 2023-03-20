<?php
session_start();
include("connect.php");
$sql= "select NOW() as test";
$result1 = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result1);
$dq = $row['test'];
$data = $_POST['data'];


$de = '<sapn class="badge bg-success"><i class="fas fa-times-circle"></i> นำออกแล้ว เวลา : ';

$de1 = '</sapn>';
$strSQL = "UPDATE Chat SET Chat_ms = '$de $dq$de1' ,Type = 'img' WHERE No = '$data'";
    $result = mysqli_query($con,$strSQL);

?>
