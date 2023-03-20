<?php
    header("Refresh: 60; URL=index.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Mali:wght@200&family=Mochiy+Pop+One&family=Prompt:wght@300&display=swap" rel="stylesheet">
<style> @import url('https://fonts.googleapis.com/css2?family=Mali:wght@200&family=Mochiy+Pop+One&family=Prompt:wght@300&display=swap'); </style>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<audio controls autoplay hidden="true"><source src="music/menu.mp3" type="audio/mpeg" ></audio>

<script>
    function plus() {
        if(document.all.txt.value != 3 ){
    		document.all.txt.value++;
    	}
    	else{
          	document.all.txt.value = 0;
    	} 
    }
    function reduce() {
    	if(document.all.txt.value > 0){
    		document.all.txt.value--;
    	}
    	else{
          	document.all.txt.value = 3;
    	}
    }
    
</script>

</head>
<body style="background-color: #ADFF2F" >
	<br><br><br><br>
	<center><h1 style="font-size: 60px;font-family: 'Mali', cursive;
font-family: 'Mochiy Pop One', sans-serif;
font-family: 'Prompt', sans-serif;">เลือกรสชาติ</h1>
<br><br><br><br>
		


<table border="0" width="50%">
	<tr>
		<td><center><button  type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev" style="border: 0;background-color: #ADFF2F" onclick="reduce()">
    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16" >
  <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
  <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
</svg>
    <span class="visually-hidden">Previous</span>
  </button></center></td>
		<td><center>
			<div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/4.png" style="width: 350px ;height: 320px" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/5.png" style="width: 350px ;height: 320px" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/7.png" style="width: 350px ;height: 320px" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/6.png" style="width: 350px ;height: 320px" alt="...">
    </div>
  </div>
</div></center>
		</td>
		<td><center><button  type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next" style="border: 0;background-color: #ADFF2F" onclick="plus()">
    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
  <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
</svg>
    <span class="visually-hidden">Next</span>
  </button></center></td>
	</tr>
</table>
<br><br>

<form action="order.php" method="post">
<input type="number" name="num" id="txt" value="0" hidden="true">
<button type="submit" class="btn btn-primary" style="width: 200px;font-size: 20px">ยืนยัน</button>
</form>
	</center>
	

<a href="user.php" type="button" class="btn btn-success"
	style="height:80px;width: 80px;
	position:fixed;
	left:5px;
	bottom:40px;
	border: 0px;
	"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
</svg>สมาชิก</a>

</body>



<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>