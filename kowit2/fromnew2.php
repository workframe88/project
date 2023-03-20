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
    include "connectnew.php";
    $sql="select * from new";
    $result=mysql_db_query($dbname,$sql);
    mysql_close();    
	?>

<div class="container">
    <table class="table table-hover" style="margin-top: 40px">
      <tr class="danger" align="center">
        <td>ที่</td>
        <td>หัวข้อ</td>
        <td>รายละเอียด</td>
      </tr>
      <?php
		$n=1;
		while ($row=mysql_fetch_row($result)) 
  		{
		?>
    <tr align="center">
      <td><?php echo $n++;?></td>
      <td><?php echo $row[1];?></td>
      <td><a href="newdetail2.php?nid=<?php echo $row[0];?>">คลิก</a></td>
    </tr>
		<?php
  		}
		?>
		<tr>
		 <div class="form-group" style="margin-top: 20px">  
 		<a href="index.php"><input name="" type="submit" class="btn btn-warning btn-block" ></div></form>
		</tr>
    </table>
  </div>
</body>
</html>