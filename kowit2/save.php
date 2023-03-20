<?php
session_start();
include "connect.php";
$n=$_POST['name'];
$a=$_POST['address'];
$m=$_POST['mobile'];
$u=$_POST['username'];
$p=$_POST['password'];
$sql="insert into employee (name,address,mobile,username,password) values('$n','$a','$m','$u','$p');";
$result=mysql_db_query($dbname,$sql);
mysql_close();
if($result)
	echo"<center><h1>Register Complete !</h1></center>";
else
	echo"<center><h1>Register Not Complete !</h1></center>";
echo "<meta http-equiv='refresh' content='1;URL=login.html'>";
?>