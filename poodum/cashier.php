<?php
include "connect.php";
session_start();

$num1=$_POST['num1'];
$num2=$_POST['num2'];
$detail=$_POST['detail'];
$type=$_GET['type'];
$sum=$num1-$num2;

$sql="insert into money (datetime,money,detail,type) values(now(),'$num2','$detail','$type');";
$result=mysqli_query($conn,$sql);

if($result)
{
    echo"<center><h1>Complete !</h1></center>";
}
else
{
    echo"<center><h1>Not Complete !</h1></center>";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Money</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mali:wght@200&family=Mochiy+Pop+One&family=Prompt:wght@300&display=swap" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
	<center>
		<img src="https://cdn.pixabay.com/photo/2016/03/31/14/37/check-mark-1292787_960_720.png" width="200px">
<h1 >ยอดเงิน <?php echo $num1;?> &nbsp;&nbsp;&nbsp; ราคา <?php echo $num2;?></h1>

<h1></h1>

<h1 >เงินทอน <?php echo $num1-$num2;?></h1>
<br>
<a href="index.php" class='btn btn-warning'>กลับ</a></center>
</body>
</html>
<?php session_destroy(); ?>