<?php
include "connect.php";
$eid=$_GET['sid'];
$sql="select * from employee where id='$eid';";
$result=mysql_db_query($dbname,$sql);
mysql_close();
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
     <div class="container">
      <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4">
<!-- start-->
  <div class="panel panel-primary" style="margin-top: 100px">
            <div class="panel-heading">
            <h3 class="panel-title"><h1>Update data</h1></h3>
          </div>
<div class="panel-body">
<form method="post" action="edid2.php">
  <div class="form-group">
    <input type="hidden" name="id1" value="<?php echo $row[0]?>">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="name1" placeholder="name" name="name" value="<?php echo $row[1]?>">
  </div>
    <textarea class="form-control" rows="3" placeholder="address"  name="address" ><?php echo $row[2]?></textarea>
  <div class="form-group">  
  <div class="form-group" style="margin-top: 15px"></div>
    <input type="Mobile" class="form-control" id="exampleInputMobile1" placeholder="Mobile" name="mobile" value="<?php echo $row[3]?>">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="name1" placeholder="username" name="username" value="<?php echo $row[4]?>">
  </div>
  <div class="form-group">
    <input type="" class="form-control" id="name1" placeholder="password" name="password" value="<?php echo $row[5]?>">
  </div>
  <button type="submit" class="btn btn-primary btn-block" style="margin-top: 10px">Update</button>
<button type="Reset" class="btn btn-warning btn-block" >Reset</button>
<td><center><a href="display.php"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true" style="margin:10px"></span></a></center></td>
</form>
          </div>
          </div>
  <!--end-->
          </div>
          <div class="col-md-4"></div>
      </div>
  </body>
</html>