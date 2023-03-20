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

   <center><form method="post" action="display.php" style="margin-top: 30px">
    <h1>ค้าหา <select  name="Search"></h1>
      <option value="man">ชาย</option>
       <option value="woman">หญิง</option>
       <option value="">ทั้งหมด</option>
     </select>
  <button type="submit">ยืนยัน</button>
</form>
</center>


    <?php
      include "connect.php";
      if (empty($_POST['Search']))
      {
        $sql="select * from employee";
      }
      else
      {
        $s=$_POST['Search'];
        $sql="select * from employee where sex='$s'";
      }
      $result=mysql_db_query($dbname,$sql);
      mysql_close();
    ?>





    <div class="container">
    <table class="table table-hover" style="margin-top: 40px">
      <tr class="danger" align="center">
        <td>ที่</td>
        <td>ชื่อ-สกุล</td>
        <td>เบอร์โทรศัพท์</td>
        <td>ผู้ใช้</td>
        <td><a href="logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></td>
      </tr>
      <?php 
        $n=1;
        while($row=mysql_fetch_row($result)) //for($a=1;$a<=1;$a++)
      {
      ?>
      <tr align="center">
        <!--<td><?php echo $a;?></td>-->
        <td><?php echo $n++;?></td>
        <td><?php echo $row[1]?></td>
        <td><?php echo $row[3]?></td>
        <td><?php echo $row[4]?></td>
        <td><a href="delete.php?sid=<?php echo $row[0]; ?>" onclick="return confirm('ต้องการลบใช่ไหม')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a> <a href="edit.php?sid=<?php echo $row[0]; ?> "><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a></td>
      </tr>
      <?php
      }
      ?>
    </table>
  </div>
  </body>
</html>