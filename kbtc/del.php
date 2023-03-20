<?php
session_start();
include "connect.php";
$id_oder=$_GET['id_oder'];
$name_cus=$_GET['name_cus'];
$tel_cus=$_GET['tel_cus'];
$price=$_GET['price'];

$sql="DELETE FROM `order_cus` WHERE `order_cus`.`id_order` = $id_oder";
$result=mysql_db_query($dbname,$sql);
mysql_close();
header("Location:order.php?name=$name_cus&&tel=$tel_cus");
?>