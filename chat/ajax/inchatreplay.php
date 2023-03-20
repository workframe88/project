<?php
session_start();
include("connect.php");

$data = $_POST['data'];
$data2 = $_POST['data2'];
$id = $_SESSION["UserID"];
$EZ = GetHostByName($_SERVER['HTTP_X_FORWARDED_FOR']);

$sql2="SELECT * FROM chat WHERE No ='$data2'";
$result2 = mysqli_query($con,$sql2);
$row = mysqli_fetch_array($result2);
$data3 = $row['Chat_ms'];
$data4 = $row['Chat_time'];
$data5 = $row['Chat_ip'];
$data6 = $row['Type'];
$data7 = $row['Chat_id'];

$data01 ='<div class="chat-content"style="margin-top: 5px;margin-bottom: 5px;background: #ff8470;padding-top: 5px;padding-left: 5px;padding-right: 5px;padding-bottom: 5px;"><div class="chat chat-left" style="text-align:left; "><div class="chat-avatar"> <a class="avatar avatar-online"> <img src="img/';
$data02 = $data7;
$data03 = '1234.png" alt="...">';
$data04 = '<i></i></a></div><div style="text-align:left;margin-left: 50px"><span class="badge rounded-pill bg-primary"><i class="fas fa-user"></i>';
$data05 = $data7;
$data06 = ' / ';
$data07 = $data5;
$data08 ='<a style="text-align:left;" class="chat-time" datetime="';
$data09 = $data4;
$data010 = '">';
$data011 = $data4;
$data012 = '</a></span></div><div class="chat-body" > <div class="chat-content hard_break" ><p class="hard_break" style="">';
$data013 =$data3;
$data014 ='</p></div></div></div></div>';
$data016 ='<hr>';
$data015 =$data;

$sql = "INSERT INTO Chat (Chat_id,Chat_ms,Chat_ip,Type) VALUES
    ('$id','$data01$data02$data03$data04$data05$data06$data07$data08$data09$data010$data011$data012$data013$data014$data016$data015','$EZ','img')";
$result = mysqli_query($con, $sql);

?>
