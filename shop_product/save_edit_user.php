<?php
	session_start();

	if(empty($_SESSION["login"]) || $_SESSION["login"] != 2)
	{
        
        header("Location: index.php");
	}
	else
	{
		include "connect.php";
	}
?>
<?php
include "connect.php";
$i=$_POST['id1'];
$n1=$_POST['name'];
$l=$_POST['lastname'];
$u=$_POST['username'];
$p=$_POST['password'];
$c=$_POST['cardID'];
$m=$_POST['mobile'];
$e=$_POST['email'];

$sql="update users set name='$n1',lastname='$l',username='$u',password='$p',cardID='$c',mobile='$m',email='$e' where id_users='$i' ";
$result=mysql_db_query($dbname,$sql);
mysql_close();
if($result)
	echo"<center><h1>Update Complete !</h1></center>";
else
	echo"<center><h1>Update Not complete !</h1></center>";

echo"<meta http-equiv='refresh' content='2;URL=admin.php'>";
?>