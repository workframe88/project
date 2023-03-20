<?php
session_start();
include "connect.php";
$u=$_POST['username'];
$p=$_POST['password'];
$sql="select * from employee where username='$u' and password='$p'";
$result=mysql_db_query($dbname,$sql);
mysql_close();
$o= mysql_num_rows($result); //echo $o;
if($o==1){
	$row=mysql_fetch_row($result);
	if($row[6]=="0"){
		echo"<center><h1>Login Admin Complete !</h1></center>";
		echo "<meta http-equiv='refresh' content='2;URL=Display.php'>";
		}
	else{
		//$_SESSION['name']=$row[1];
		//$_SESSION['address']=$row[2];
		//$_SESSION['image']=$row[7];
		$_SESSION['sid']=$row[0];
		echo"<center><h1>Login User Complete !</h1></center>";
		echo "<meta http-equiv='refresh' content='1;URL=Displaymember.php'>";
		}
	
}
else {
	echo"<center><h1>Login Not Complete !</h1></center>";
echo "<meta http-equiv='refresh' content='1;URL=login.html'>";
}
?>