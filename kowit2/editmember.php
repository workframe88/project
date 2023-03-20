<?php
include "connect.php";
$n=$_POST['name'];
$a=$_POST['address'];
$m=$_POST['mobile'];
$u=$_POST['username'];
$p=$_POST['password'];
$i=$_POST['id1'];
$sql="update employee set name='$n',address='$a',mobile='$m',username='$u',password='$p' where id='$i'";
$result=mysql_db_query($dbname,$sql);
mysql_close();
if($result)
	echo"<center><h1>Update Complete !</h1></center>";
else
	echo"<center><h1>Update Not Complete !</h1></center>";
echo "<meta http-equiv='refresh' content='1;URL=displaymember.php'>";
?>