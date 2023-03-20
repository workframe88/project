<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE);
$_SESSION['chk'] = 0;
include "connect.php";




?>
<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Mali:wght@200&family=Mochiy+Pop+One&family=Prompt:wght@300&display=swap" rel="stylesheet">
<style> @import url('https://fonts.googleapis.com/css2?family=Mali:wght@200&family=Mochiy+Pop+One&family=Prompt:wght@300&display=swap'); </style>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
	<br><br><br><br><br>
	<center><h1 style="font-size: 60px;font-family: 'Mali', cursive;
font-family: 'Mochiy Pop One', sans-serif;
font-family: 'Prompt', sans-serif;">จำนวนทั้งหมด</h1>
<br><br>
	<?php
		$sql = "SELECT * FROM stock";
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()) {

echo "<div class='btn-group' role='group' aria-label='Third group'><button type='button' class='btn btn-info' style='width:150px;height:150px'><b>";
echo $name = $row["name_stock"];
echo "</b><br><br><b>";
echo $qty = $row["qty_stock"];
echo "</b></button></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

		}
	?>
<br><br><br>
<form action="update_stock.php" method="get">
	<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" style="width: 15%" name="qty_id">
		<option selected style="text-align: center" >- เลือกรายการ -</option>
  	<?php
  		$result2 = $conn->query($sql);
  		$n=0;
  		while($row2 = $result2->fetch_assoc()) {
  			$n++;
  			echo "<option value=".$n." >".$name2 = $row2["name_stock"]."</option>";
  		}
  	?>
 </select><br>
<table border="0" width="35%">
	<tr>
		<td style="text-align: center"><input type='button' class='btn btn-info' style='width:80px;height:80px;border-radius: 50px;' value="<<" onclick="min1()"> </td>
		<td style="text-align: center"><input type='button' class='btn btn-info' style='width:80px;height:80px;border-radius: 50px;' value="-" onclick="down()"></td>
		<td style="text-align: center"><center>
			<p id="qty" style="width: 70%;height:100px;font-size: 70px" >0</p>
			<input type="text"  name="qty" style="width: 70%;height:100px;font-size: 70px;text-align: center;" class="form-control" id="num" value="0" hidden ></center></td>
		<td style="text-align: center"><input type='button' class='btn btn-info' style='width:80px;height:80px;border-radius: 50px;' value="+" onclick="up()"></td>
		<td style="text-align: center"><input type='button' class='btn btn-info' style='width:80px;height:80px;border-radius: 50px;' value=">>" onclick="max1()"> </td>

		
	</tr>
</table>
<br>
<a href="index.php" class='btn btn-info' style="width: 150px">ออกระบบ</a>&nbsp;
<button type="submit" class='btn btn-info' style="width: 150px">อัพเดตจำนวน</button>

		</form>

</center>
</body>
<script type="text/javascript">
	function up() {
        var number = document.getElementById("num").value;
        var s = parseInt(number) + 1;
		document.getElementById("num").value = s;
		document.getElementById("qty").innerHTML = s;
    }

    function down() {
        var number = document.getElementById("num").value;
        
        	var s = parseInt(number) - 1;
        
		document.getElementById("num").value = s;  
		document.getElementById("qty").innerHTML = s;
    }

    function max1() {
        var number = document.getElementById("num").value;
        var s = parseInt(number) + 10;
		document.getElementById("num").value = s;  
		document.getElementById("qty").innerHTML = s;
    }

    function min1() {
        var number = document.getElementById("num").value;
        
        	var s = parseInt(number) - 10;
        
		document.getElementById("num").value = s;  
		document.getElementById("qty").innerHTML = s;
    }
</script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>