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
    <?php
      include "connect.php";
      $sql="select count(*) as countall from poll";
      $result=mysql_db_query($dbname,$sql);
      $row= mysql_fetch_row($result);
      $sum=$row[0];
      //1
      $sql="select count(*) as count1 from poll where poll_score='1'";
      $result=mysql_db_query($dbname,$sql);
      $row= mysql_fetch_row($result);
      $ch1=$row[0];
      //2  
       $sql="select count(*) as count1 from poll where poll_score='2'";
      $result=mysql_db_query($dbname,$sql);
      $row= mysql_fetch_row($result);
      $ch2=$row[0];
      //3
       $sql="select count(*) as count1 from poll where poll_score='3'";
      $result=mysql_db_query($dbname,$sql);
      $row= mysql_fetch_row($result);
      $ch3=$row[0];
      //4
       $sql="select count(*) as count1 from poll where poll_score='4'";
      $result=mysql_db_query($dbname,$sql);
      $row= mysql_fetch_row($result);
      $ch4=$row[0];
      //5
       $sql="select count(*) as count1 from poll where poll_score='5'";
      $result=mysql_db_query($dbname,$sql);
      $row= mysql_fetch_row($result);
      $ch5=$row[0];
    ?>
      <table align="center" width="50%" border="1">
        <tr> <td colspan="3"><h1>ผลการสำรวจ <?php echo $sum;?></h1></td> </tr>
        <tr> <td colspan="3"><h1>คุณชอบสีอะไรมากที่สุด</h1></td> </tr>
        <tr> <td>1.สีเหลือง</td> <td><?php echo $ch1;?></td><td><?php echo number_format(($ch2/$sum*100),2)." %";?></td> </tr>
        <tr> <td>2.สีแดง</td>  <td><?php echo $ch2;?></td><td><?php echo number_format(($ch2/$sum*100),2)." %";?></td> </tr>
        <tr> <td>3.สีเขียว</td> <td><?php echo $ch3;?></td><td><?php echo number_format(($ch3/$sum*100),2)." %";?></td> </tr>
        <tr> <td>4.สีฟ้า</td>   <td><?php echo $ch4;?></td><td><?php echo number_format(($ch4/$sum*100),2)." %";?></td> </tr>
        <tr> <td>5.ไม่ต้องการเลือก</td> <td><?php echo $ch5;?></td><td><?php echo number_format(($ch5/$sum*100),2)." %";?></td> </tr>
      </table>
  </body>
</html>