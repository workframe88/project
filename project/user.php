<?php 
error_reporting (E_ALL ^ E_NOTICE);

$point = $_GET['point'];
$time = $_GET['time'];

if($point == ""){
	$point = 0;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>User</title>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Mali:wght@200&family=Mochiy+Pop+One&family=Prompt:wght@300&display=swap" rel="stylesheet">
<style> @import url('https://fonts.googleapis.com/css2?family=Mali:wght@200&family=Mochiy+Pop+One&family=Prompt:wght@300&display=swap'); </style>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
  <script src="https://sdk.form.run/js/v2/formrun.js"></script>
<audio controls autoplay hidden="true"><source src="music/hello.mp3" type="audio/mpeg" ></audio>
<script>
	var count;
    function getValueFromText($num) {
        var data = document.getElementById("txt").value;
        var chk = document.getElementById('time').value;

		  function ModifyData () {
		   data =  document.getElementById("txt").value += $num;
		  };
		  ModifyData();
		  console.log(data);
		  console.log("-------------"+data.length);
		  	var tel = data;
		  	var point = document.getElementById("point").value;
		  	
		  	
		 if(chk != ""){	
		  	if(data.length == 10){
		  		var time = document.getElementById("time").value;
  				window.location.href = "check_use.php?tel=" + tel + "&point=" + point + "&time=" + time;
		  	}
		 }else{
		 	if(data.length == 10){
  				window.location.href = "check_use.php?tel=" + tel + "&point=" + point;
		  	}
		 }
    }
    
</script>
<script type="text/javascript">
	function del(){
    	var data = document.getElementById("txt").value;
    	var data2 = data.substring(0, data.length - 1);
    	document.getElementById("txt").value = data2;   

    }
</script>

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

<?php
if($point == 0){
?>

<body style="background-color: #ADFF2F">
	<input type="text" id="time"  name="time" value="" hidden>
	<input type="text" name="point" value="<?php echo $point ; ?>" id="point" hidden>
	<br><br>
	<br><br>
	<center><h1 style="font-size: 60px;font-family: 'Mali', cursive;
font-family: 'Mochiy Pop One', sans-serif;
font-family: 'Prompt', sans-serif;">เบอร์โทรศัพท์</h1>
<br><br>

<input type="text" class="form-control" style="width: 350px;font-size: 45px;font-family: 'Mali', cursive;
font-family: 'Mochiy Pop One', sans-serif;
font-family: 'Prompt', sans-serif;text-align: center;" id="txt" disabled placeholder="xxx-xxx-xxxx">



<table border="0" style="margin-top: 30px">
	<tr>
		<td style="padding: 5px"><input id="b1" type="button" value="1" onclick="getValueFromText(1)" class="btn btn-secondary" style="font-size: 40px;width: 95px;height: 95px;border-radius: 50px;"></td>
		<td style="padding: 5px"><input id="b2" type="button" value="2" onclick="getValueFromText(2)"class="btn btn-secondary" style="font-size: 40px;width: 95px;height: 95px;border-radius: 50px;"></td>
		<td style="padding: 5px"><input id="b3" type="button" value="3" onclick="getValueFromText(3)" class="btn btn-secondary" style="font-size: 40px;width: 95px;height: 95px;border-radius: 50px;"></td>
	</tr>
	<tr>
		<td style="padding: 5px"><input id="b4" type="button" value="4" onclick="getValueFromText(4)" class="btn btn-secondary" style="font-size: 40px;width: 95px;height: 95px;border-radius: 50px;"></td>
		<td style="padding: 5px"><input id="b5" type="button" value="5" onclick="getValueFromText(5)" class="btn btn-secondary" style="font-size: 40px;width: 95px;height: 95px;border-radius: 50px;"></td>
		<td style="padding: 5px"><input id="b6" type="button" value="6" onclick="getValueFromText(6)" class="btn btn-secondary" style="font-size: 40px;width: 95px;height: 95px;border-radius: 50px;"></td>
	</tr>
	<tr>
		<td style="padding: 5px"><input id="b7" type="button" value="7" onclick="getValueFromText(7)" class="btn btn-secondary" style="font-size: 40px;width: 95px;height: 95px;border-radius: 50px;"></td>
		<td style="padding: 5px"><input id="b8" type="button" value="8" onclick="getValueFromText(8)" class="btn btn-secondary" style="font-size: 40px;width: 95px;height: 95px;border-radius: 50px;"></td>
		<td style="padding: 5px"><input id="b9" type="button" value="9" onclick="getValueFromText(9)" class="btn btn-secondary" style="font-size: 40px;width: 95px;height: 95px;border-radius: 50px;"></td>
	</tr>
	<tr>
		<td style="padding: 5px">
			<a href="menu.php" class="btn btn-secondary" type="button" style="font-size: 40px;width: 95px;height: 95px;border-radius: 50px;">
				<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-reply-fill" viewBox="0 0 16 16">
  <path d="M5.921 11.9 1.353 8.62a.719.719 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"/>
</svg>
			</a>
		</td>
		<td style="padding: 5px"><input id="b0" type="button" value="0" onclick="getValueFromText(0)" class="btn btn-secondary" style="font-size: 40px;width: 95px;height: 95px;border-radius: 50px;"></td>
		<td style="padding: 5px"> <button type="button" id="del" onclick="del()" style="font-size: 25px;width: 95px;height: 95px;border-radius: 50px;" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
  <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/>
</svg></button></td>
	</tr>
</table>

</center>

</body>
<?php
}
else{
	
?>
<body style="background-color: #ADFF2F">
	<form action="wait.php" method="get">

	<input type="text" id="time"  name="time" value="60" hidden>
	<a href="finish.php" class="btn btn-danger" style="float:right;width: 100px;height: 100px" id="b1" hidden="true">รับสินค้า</a>
	<h1 id="result" name="time"  style="font-size: 80px;font-family: 'Mali', cursive;
font-family: 'Mochiy Pop One', sans-serif;
font-family: 'Prompt';float:right"><?php echo $time ;?></h1>
	
	<br><br><br><br><br>

	<input type="text" name="point" value="<?php echo $point ; ?>" id="point" hidden>
	
	<center><h1 style="font-size: 60px;font-family: 'Mali', cursive;
font-family: 'Mochiy Pop One', sans-serif;
font-family: 'Prompt', sans-serif;">เบอร์โทรศัพท์</h1>

<br><br>

<input type="text" class="form-control" style="width: 350px;font-size: 45px;font-family: 'Mali', cursive;
font-family: 'Mochiy Pop One', sans-serif;
font-family: 'Prompt', sans-serif;text-align: center;" id="txt" disabled placeholder="xxx-xxx-xxxx">



<table border="0" style="margin-top: 30px;">
	<tr>
		<td style="padding: 5px"><input id="b1" type="button" value="1" onclick="getValueFromText(1)" class="btn btn-secondary" style="font-size: 40px;width: 95px;height: 95px;border-radius: 50px;"></td>
		<td style="padding: 5px"><input id="b2" type="button" value="2" onclick="getValueFromText(2)"class="btn btn-secondary" style="font-size: 40px;width: 95px;height: 95px;border-radius: 50px;"></td>
		<td style="padding: 5px"><input id="b3" type="button" value="3" onclick="getValueFromText(3)" class="btn btn-secondary" style="font-size: 40px;width: 95px;height: 95px;border-radius: 50px;"></td>
	</tr>
	<tr>
		<td style="padding: 5px"><input id="b4" type="button" value="4" onclick="getValueFromText(4)" class="btn btn-secondary" style="font-size: 40px;width: 95px;height: 95px;border-radius: 50px;"></td>
		<td style="padding: 5px"><input id="b5" type="button" value="5" onclick="getValueFromText(5)" class="btn btn-secondary" style="font-size: 40px;width: 95px;height: 95px;border-radius: 50px;"></td>
		<td style="padding: 5px"><input id="b6" type="button" value="6" onclick="getValueFromText(6)" class="btn btn-secondary" style="font-size: 40px;width: 95px;height: 95px;border-radius: 50px;"></td>
	</tr>
	<tr>
		<td style="padding: 5px"><input id="b7" type="button" value="7" onclick="getValueFromText(7)" class="btn btn-secondary" style="font-size: 40px;width: 95px;height: 95px;border-radius: 50px;"></td>
		<td style="padding: 5px"><input id="b8" type="button" value="8" onclick="getValueFromText(8)" class="btn btn-secondary" style="font-size: 40px;width: 95px;height: 95px;border-radius: 50px;"></td>
		<td style="padding: 5px"><input id="b9" type="button" value="9" onclick="getValueFromText(9)" class="btn btn-secondary" style="font-size: 40px;width: 95px;height: 95px;border-radius: 50px;"></td>
	</tr>
	<tr>
		<td style="padding: 5px">
			
			<button  class="btn btn-secondary" type="submit" style="font-size: 25px;width: 95px;height: 95px;border-radius: 50px;">
				<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-reply-fill" viewBox="0 0 16 16">
  <path d="M5.921 11.9 1.353 8.62a.719.719 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"/>
</svg>
			</button>
			

			

			</form>
		</td>
		<td style="padding: 5px"><input id="b0" type="button" value="0" onclick="getValueFromText(0)" class="btn btn-secondary" style="font-size: 40px;width: 95px;height: 95px;border-radius: 50px;"></td>

		<td style="padding: 5px"> <button type="button" id="del2" onclick="del()" style="font-size: 25px;width: 95px;height: 95px;border-radius: 50px;" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
  <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/>
</svg></button></td>
	</tr>
</table>

</center>

</body>
<?php
}
?>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</html>