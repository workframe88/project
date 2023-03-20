<?php
session_start();
include "connect.php";

$name_cus=$_POST['name_cus'];
$tel_cus=$_POST['tel_cus'];

$choice1=$_POST['choice1'];
$choice2=$_POST['choice2'];
$choice3=$_POST['choice3'];
$name_pro=$_POST['name_pro'];

if($choice2==""){
	$choice2="ไม่ใส่ผง";
}

if($choice1==""||$choice2==""||$choice3==""||$name_pro==""){
	header("Location:order.php?name=$name_cus&&tel=$tel_cus");
}else{
	$price=0;

$sql="SELECT * FROM price WHERE name_price= '$choice1'";
 $result=mysql_db_query($dbname,$sql);

        while($row=mysql_fetch_row($result)) //for($a=1;$a<=1;$a++)
      {
      	$price = $row[2];
      }
     
$sql="insert into order_cus (name_order,price_order,name_cus,tel_cus)
values('<b>$name_pro</b><br>- $choice1<br>- $choice2<br>- $choice3','$price','$name_cus','$tel_cus');";
$result=mysql_db_query($dbname,$sql);
mysql_close();
header("Location:order.php?name=$name_cus&&tel=$tel_cus");
}


?>