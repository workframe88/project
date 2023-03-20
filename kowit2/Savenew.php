<?php
include "connectnew.php";
$txt=$_POST['gtext'];
$e=$_POST['ttext'];

if(!empty($_FILES["file"]["tmp_name"])){
	$d= date("dmYHis");
	$i="$d.jpg";
copy($_FILES["file"]["tmp_name"],"./ggggg/".$i);
}
else{
	$i="def.jpg";
}
$sql="insert into new (head_on,detail,image) values('$txt','$e','$i');";
$result=mysql_db_query($dbname,$sql);
mysql_close();
echo "<meta http-equiv='refresh' content='0;URL=fromnew2.php'>";
?>