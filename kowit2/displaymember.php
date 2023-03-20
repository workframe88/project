<?php
session_start();
include "connect.php";
$eid=$_SESSION['sid'];
$sql="select * from employee where id='$eid';";
$result=mysql_db_query($dbname,$sql);
$row=mysql_fetch_row($result);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>
    <ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="#">Display Member</a>
        <h1 align="center"><b>Display Member</b></h1>
   <center><?php
        echo "สวัสดีคุณ ".$row[1]."<br>";
        echo "ที่อยู่ :".$row[2]."<br>";
        echo "เบอร์โทรศัพท์ :".$row[3]."<br>";
        echo "รูปภาพ :"."<br>";
        $p=$row[7];
        echo "<img src='pictuerMember/$p' width='250' height='300'>"."<br>"."<br>";
   ?>
<div class="btn-group btn-group-justified" role="group" aria-label="">
  <div class="btn-group" role="group">
    <a href="formeditmember.php"><button type="button" class="btn btn-default">แก้ไขข้อมูลส่วนตัว</button></a>
  </div>
  <div class="btn-group" role="group">
    <a href="changeimg.php"><button type="button" class="btn btn-default">เปลี่ยนรูปภาพ</button></a>
  </div>
  <div class="btn-group" role="group">
    <a href="logout.php"><button type="button" class="btn btn-default">ออกจากระบบ</button></a>
  </div>
</div>
  </body>
</html>