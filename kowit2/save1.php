<?php
include "connect.php";
$n=$_POST['name'];
$a=$_POST['address'];
$m=$_POST['mobile'];
$u=$_POST['username'];
$p=$_POST['password'];

if(!empty($_FILES["file"]["tmp_name"])){
	$d= date("dmYHis");
	$i="$d.jpg";
copy($_FILES["file"]["tmp_name"],"./ggggg/".$i);
}
else{
	$i="def.jpg";
}
$sql="insert into employee (name,address,mobile,username,password,image) values('$n','$a','$m','$u','$p','$i');";
$result=mysql_db_query($dbname,$sql);
mysql_close();
if($result)
	echo"<center><h1>Register Complete !</h1></center>";
else
	echo"<center><h1>Register Not Complete !</h1></center>";
echo "<meta http-equiv='refresh' content='1;URL=formregister1.php'>";
?>