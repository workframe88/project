<?php
$aid=$_GET['sid'];
include "connect.php";
$sql="delete from new where id='$aid';";
$result=mysql_db_query($dbname,$sql);
mysql_close();
if($result)
	echo"<center><h1>Delete Complete !</h1></center>";
else
	echo"<center><h1>Delete Not Complete !</h1></center>";
echo "<meta http-equiv='refresh' content='1;URL=newdetail.php'>";
?>