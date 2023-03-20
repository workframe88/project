<?php
error_reporting (E_ALL ^ E_NOTICE);
session_start();

include "connect.php";
$tel = $_GET['tel'];
$point = $_GET['point'];
$time = $_GET['time'];
if($point==0){
	$time =0;
}

$sql = "SELECT * FROM users where tel_user ='$tel'";
$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	  while($row = $result->fetch_assoc()) {
	    $po = $row["points"];
	  }
	}


if($_SESSION['chk'] == 0){
	if($point == 1){
		$po = $po+$point;
		$pic = "img/p".$po.".jpg";
		$sql = "UPDATE `users` SET `point`= $po WHERE tel_user = $tel";
		$conn->query($sql);
		$conn->close();
		$_SESSION['chk'] = 1;
	}else{
		$pic = "img/p".$po.".jpg";
	}

}else{
	$pic = "img/p".$po.".jpg";

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
		<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Mali:wght@200&family=Mochiy+Pop+One&family=Prompt:wght@300&display=swap" rel="stylesheet">
<style> @import url('https://fonts.googleapis.com/css2?family=Mali:wght@200&family=Mochiy+Pop+One&family=Prompt:wght@300&display=swap'); </style>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php

  echo '<script type="text/javascript">';
  echo "let c = '$time';"; // ส่งค่า $data จาก PHP ไปยังตัวแปร data ของ Javascript
  echo "
   var counter = setInterval(() => {
        	c--;
        	document.getElementById('time').value = c;
        	document.getElementById('result').innerHTML = c;
        if(c==0){
        	document.getElementById('b1').hidden = false;
        	document.getElementById('result').hidden = true;
        	clearInterval( counter );
        }	
    }, 1000);";

  echo '</script>';
?>

</head>
<body style="background-color: #ADFF2F">
	<form action="wait.php" method="get">
		<input type="text" name="point" value="2" hidden>
	<?php
		if($time != 0){
	?>
	<input type="text" id="time"  name="time" value="60" hidden>
	<a href="finish.php" class="btn btn-danger" style="float:right;width: 100px;height: 100px" id="b1" hidden="true">รับสินค้า</a>
	<h1 id="result" name="time"  style="font-size: 80px;font-family: 'Mali', cursive;
font-family: 'Mochiy Pop One', sans-serif;
font-family: 'Prompt';float:right"><?php echo $time ;?></h1>
<?php
}else{
?>

	<input type="text" id="time"  name="time" value="0" hidden>

<?php
}
?>	
		<br><br><br><br><br>
	<center><h1 style="font-size: 60px;font-family: 'Mali', cursive;
font-family: 'Mochiy Pop One', sans-serif;
font-family: 'Prompt', sans-serif;">ยินดีต้อนรับ</h1><br>
<h1 style="font-size: 50px;font-family: 'Mali', cursive;
font-family: 'Mochiy Pop One', sans-serif;
font-family: 'Prompt', sans-serif;"><?php echo $tel ;?></h1>
<br>
<img src="<?php echo $pic ;?>" width="30%">
<br><br>
<?php
	if($point == 1){
?>
	<button type="submit" class="btn btn-primary">กลับ</button>
</form>
<?php
}else{
?>
	<a href="menu.php" class="btn btn-primary">ออก</a>
<?php
}
?>
<!--
<form action="otp2.php" method="get">
	<input type="text" name="key" value='<?php echo $tok?>'>
	<input type="text" name="pin">
<button type="submit">ยืนยัน</button>	 -->
</form>

</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</html>