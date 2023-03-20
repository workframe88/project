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
$n=$_POST['name'];
$l=$_POST['lastname'];
$u=$_POST['username'];
$p=$_POST['password'];
$c=$_POST['cardID'];
$m=$_POST['mobile'];
$e=$_POST['email'];
$sql="insert into users (name,lastname,username,password,cardID,mobile,email) values('$n','$l','$u','$p','$c','$m','$e');";
$result=mysql_db_query($dbname,$sql);
mysql_close();
if($result)
	echo"<center><h1>Add User Complete !</h1></center>";
else
	echo"<center><h1>Add User Not Complete !</h1></center>";
echo "<meta http-equiv='refresh' content='1;URL=admin.php'>";
?>