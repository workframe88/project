<?php
session_start();
if(!empty($_FILES["file"]["tmp_name"])){
	include "connect.php";
	$i=$_SESSION['sid'];
	$p="$i.jpg";
	$sql="update employee set image='$p'where id='$i'";
	$result=mysql_db_query($dbname,$sql);
	mysql_close();
	copy($_FILES["file"]["tmp_name"],"./pictuerMember/".$p);
}
echo "<meta http-equiv='refresh' content='1;URL=displaymember.php'>";
?>