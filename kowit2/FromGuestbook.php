<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Guestbook</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>
    <form method="post" action="SaveGuestbook.php">
      <input type="text" name="gtext">
      <input type="submit" name="">
      <input type="reset" name="">     
    </form>
<?php
    include "connect.php";
    $sql="select * from guestbook order by Guest_id desc";
    $result=mysql_db_query($dbname,$sql);
    mysql_close();    
?>
<div class="cotainer" style="margin-top: 40px">
  <div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
      <table class="table table-hover" >
    <tr class="danger" align="center">
      <td>ลำดับ</td>
      <td>ข้อความ</td>
      <td>วันเดือนปี / เวลา</td>
    </tr>
<?php
$n=1;
while ($row=mysql_fetch_row($result)) 
  {
?>
    <tr align="center">
      <td><?php echo $n++;?></td>
      <td><?php echo $row[1];?></td>
      <td><?php echo $row[2];?></td>
    </tr>
<?php
  }
?>
  </table>
    </div>
    <div class="col-md-3">
    </div>
  </div>
</div>

  </body>
</html>