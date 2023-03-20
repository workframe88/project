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
$n1=$_POST['name'];
$n2=$_POST['price'];
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
$sql="insert into product (name,price,image) values('$n1','$n2','$new');";
$result=mysql_db_query($dbname,$sql);
mysql_close();
if($result)
{
    echo"<center><h1>Complete !</h1></center>";
}
else
{
    echo"<center><h1>Not Complete !</h1></center>";
}
echo "<meta http-equiv='refresh' content='1;URL=product.php'>";
?>