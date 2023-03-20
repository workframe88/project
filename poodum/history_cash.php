<?php
include "connect.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>History Cash</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mali:wght@200&family=Mochiy+Pop+One&family=Prompt:wght@300&display=swap" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="icon" href="favicon.ico" type="image/x-icon"> 
<link rel="shortcut icon" href="ico.ico" type="image/x-icon">
</head>
<body><center>
	<img src="https://scontent.fbkk22-7.fna.fbcdn.net/v/t1.6435-9/80883566_108369020678374_7176301120757694464_n.jpg?_nc_cat=107&ccb=1-5&_nc_sid=09cbfe&_nc_eui2=AeHEruF06mcUNLDY1PEje8bvTaEalDloGFlNoRqUOWgYWYXMXJQhnqlyeQNDDpqzOQ3hxlzwfNK2SogmnFcows1G&_nc_ohc=-FjggYpGRwEAX_PYy0_&_nc_ht=scontent.fbkk22-7.fna&oh=00_AT-8cpBubbDyJiqpl1pNJqpDBMHeWLezBTV0vS0tHSDLfQ&oe=6254AEAD" width="100px">
		<h3>ประวัติ ยอดเงินโอน และ เงินสด</h3>
			<a href="index.php" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5zM10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5z"/>
</svg> กลับ</a><br><br>
		<table border="0"  style="width: 90%;text-align: center;">
			<tr>
				<td>
					<table border="0" class="table">
			<tr><td><b>วันที่</b></td><td><b>เงินโอน</b></td></tr>
			<?php
				$sql = "SELECT MID(`datetime`,1,10) as date ,sum(`money`) as cash FROM `money` WHERE `type`=1 GROUP BY DATE_FORMAT(`datetime`, '%Y%m%d')";
				$result = mysqli_query($conn, $sql);
       			while($row=mysqli_fetch_row($result)){
			;?>
			<tr>
				<td><?php  echo $row[0];?></td>
				<td><?php  echo $row[1];?></td>
			</tr>
			<?php };?>
		</table>
				</td>

				<td>
					<table border="0" class="table">
			<tr><td><b>เงินสด</b></td></tr>
			<?php
				$sql = "SELECT MID(`datetime`,1,10) as date ,sum(`money`) as cash FROM `money` WHERE `type`=0 GROUP BY DATE_FORMAT(`datetime`, '%Y%m%d')";
				$result = mysqli_query($conn, $sql);
       			while($row=mysqli_fetch_row($result)){
			;?>
			<tr>
				<td><?php  echo $row[1];?></td>
			</tr>
			<?php };?>
		</table>
				</td>

				<td>
					<table border="0" class="table">
			<tr><td><b>รวม</b></td></tr>
			<?php
				$sql = "SELECT MID(`datetime`,1,10) as date ,sum(`money`) as cash FROM `money` GROUP BY DATE_FORMAT(`datetime`, '%Y%m%d')";
				$result = mysqli_query($conn, $sql);
       			while($row=mysqli_fetch_row($result)){
			;?>
			<tr>
				<td><?php  echo $row[1];?></td>
			</tr>
			<?php };?>
		</table>
				</td>

			</tr>
		</table>
		</center>
</body>
</html>