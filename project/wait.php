<?php 
error_reporting (E_ALL ^ E_NOTICE);

$time = $_GET['time'];
$point = $_GET['point'];
$num = $_GET['num'];

if($time == ""){
    $time = 60;
}
$wait = $time+1;

header("Refresh: $wait; URL=http://esp32.local/finish");
?>
<!DOCTYPE html>
<html>
<head>
	<title>wait</title>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Mali:wght@200&family=Mochiy+Pop+One&family=Prompt:wght@300&display=swap" rel="stylesheet">
<style> @import url('https://fonts.googleapis.com/css2?family=Mali:wght@200&family=Mochiy+Pop+One&family=Prompt:wght@300&display=swap'); </style>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body style="background-color: #ADFF2F"><br><br>
	<center>
		<h1 style="font-size: 60px;font-family: 'Mali', cursive;
font-family: 'Mochiy Pop One', sans-serif;
font-family: 'Prompt', sans-serif;">กำลังทอด</h1>

<img src="https://gifdb.com/images/high/elmo-hailing-french-fries-bnhqeyb8wo2fv8h0.gif" width="400px">
    <form action="user.php" method="get"><br>
	<p>กรุณารอ&nbsp;<h3 id="result1" name="time"><?php echo $time ;?></h3>&nbsp;วินาที</p>
    <input type="text" name="point" value="1" hidden>
    <input type="text" id="result"  name="time" value="60" hidden>
	<br>
  <?php
  if($point == 2){
  ?>
  <button class="btn btn-primary" type="submit" disabled>สะสมแต้มแล้ว</button>
	
<?php
}
else{
?>
  <button class="btn btn-primary" type="submit">สะสมแต้มไหม ?</button>
<?php
}
?>
    </form>
	</center>
</body>

<?php

  echo '<script type="text/javascript">';
  echo "let c = '$time';"; // ส่งค่า $data จาก PHP ไปยังตัวแปร data ของ Javascript
  echo "
   var counter = setInterval(() => {
        c--;
        document.getElementById('result').value = c;
        document.getElementById('result1').innerHTML = c;
        if( c == 0 ) {
            clearInterval( counter );
            //document.getElementById('result').innerHTML = 'Finish';
        }
    }, 1000);";

  echo '</script>';

?>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>