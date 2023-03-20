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
$p1=$_GET['sid'];
$sql="delete from product where id_product='$p1';";
$result=mysql_db_query($dbname,$sql);
mysql_close();
if($result)
	echo"<center><h1>delete Complete !</h1></center>";
else
	echo"<center><h1>delete Not Complete !</h1></center>";
echo "<meta http-equiv='refresh' content='1;URL=product.php'>";
?>