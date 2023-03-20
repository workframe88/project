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
$name=$_POST['name'];
$price=$_POST['price'];
date_default_timezone_set('Asia/Bangkok');
$n=date("YmdHis");
	$new = $n.".jpg";
	if(empty($_FILES["image"]["tmp_name"]))
	{
		$new =  "image.jpg";
	}
	else
	{
		copy($_FILES["image"]["tmp_name"],"./images/".$new);
	}

$sql="update product set name='$name',price='$price',image='$new' where id_product='$i' ";
$result=mysql_db_query($dbname,$sql);
mysql_close();
if($result)
	echo"<h1>Update Complete !</h1>";
else
	echo"<h1>Update Not complete !</h1>";

echo"<meta http-equiv='refresh' content='2;URL=product.php'>";
?>

