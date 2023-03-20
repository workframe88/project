<?php
    include "connect.php";
    $id=$_GET['nid'];
    $sql="select * from allP where new_id='$id'";
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
  <div class="panel panel-primary" style="margin-top: 20px">
            <div class="panel-heading">
            <h3 class="panel-title"><center><h1>NEWS</h1></center></h3>
          </div>
<div class="panel-body">
<form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <center><h3><?php echo $row[1];?></h3></center>
  </div>
  <center><img src='ggggg/<?php echo $row[4];?>' width='220' class='img-thumbnail'></center>
  <div class="form-group">
  <textarea class="form-control" rows="3" placeholder="" readonly name="" style="margin-top: 20px"><?php echo $row[2];?></textarea>
  </div>
  <center><a href=""><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></center>
</form>
  </body>
</html>