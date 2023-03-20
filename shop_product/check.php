<?php
session_start();
include "connect.php";
$user=$_POST['username'];
$pass=$_POST['password'];
$sql="select * from users where username='$user' and password='$pass'";
$result=mysql_db_query($dbname,$sql);
mysql_close();
$a=mysql_num_rows($result);
if($a==1){ 
    
	$row=mysql_fetch_row($result);
	if($row[9]=="1"){
        $_SESSION["login"] = 2;
        $_SESSION['user_id']=$row[0];
		echo"<center><h1>Login By Admin Complete !</h1 ></center>";
		echo"<meta http-equiv='refresh' content='1;URL=admin.php'>";	
	}
	else{
        $_SESSION["login"] = 1;
        $_SESSION['user_id']=$row[0];
		echo"<center><h1>Login Complete !</h1 ></center>";
		echo"<meta http-equiv='refresh' content='1;URL=home.php'>";
	}
}
	else { 
		echo"<center><h1>Login Not complete !</h1></center>";
		echo"<meta http-equiv='refresh' content='1;URL=index.php'>";
	}
?>