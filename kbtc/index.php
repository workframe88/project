<?php
session_start();
$_SESSION["cal"]=0;
?>
<html>
<title>KBTC</title>
<head>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<meta name="viewport" content="width=320; initial-scale=0.9; maximum-scale=1.0; user-scalable=0;" />
<style>
	body {
  		background-image: url('img/bg1.jpg');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
	}
</style> 
</head>
<body>
	<form action="order.php" method="get" onsubmit='return checkValue()'>
<center>
<br><br>
<img src="img/logo.png" alt="Girl in a jacket" width="300px" height="300px"><br>
<h3 style="font-size:30px;color: white" >สาขาเทคนิคกระบี่</h3>
<h1 style="font-size: 13px;color: white">สั่งไว้ก่อนแล้วไปรับที่ร้านได้เลย</h1><br>
<input type="text" name="name" class="form-control" placeholder="ชื่อเล่น" style="width: 200px" id='txt' onKeyUp="if(!(isNaN(this.value))) { alert('กรุณากรอกอักษร'); this.value='';}"><br>
<input type="tel" name="tel" class="form-control"  placeholder="เบอร์โทรศัพท์" style="width: 200px" id='txt2' onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" maxlength="10"><br>
<button class="btn btn-warning" class="form-control" type="submit" >เลือกซื้อเลย</button>
</form>
</center>
</body>
<script>
    function checkValue() {
        let txt = document.getElementById("txt");
        let txt2 = document.getElementById("txt2");

        if( txt.value == "" ) {
            alert("กรุณากรอกชื่อเล่น");
            return false;
        }

        if( txt2.value == "" ) {
            alert("กรุณากรอกเบอร์โทรศัพท์");
            return false;
        }
    }
</script>
</html>