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
            <h3 class="panel-title"><center><h1>ข่าวประชาสัมพันธ์</h1></center></h3>
          </div>
<div class="panel-body">
<form method="post" action="Savenew.php" enctype="multipart/form-data">
  <div class="form-group">
    <h1>หัวข้อ</h1><input type="text" class="form-control" id="name1" placeholder="เพิ่มหัวข้อ" name="gtext">
  </div>
    <h1>รายละเอียด</h1><textarea input type="text" class="form-control" id="name2" placeholder="เพิ่มรายละเอียด"  name="ttext"></textarea>
    <div class="form-group">
    <label for="exampleInputFile">เพิ่มรูป</label>
    <input type="file" id="exampleInputFile" name="file">
    </div>
  <div class="form-group" style="margin-top: 20px">  
 <input type="submit" name="" type="" class="btn btn-warning btn-block" ></form>
   
          </div>
          </div>
  <!--end-->
          </div>
          <div class="col-md-4"></div>
      </div>

<div class="cotainer" style="margin-top: 40px">
  <div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
      
    </div>
    <div class="col-md-3">
    </div>
  </div>
</div>


  </body>
</html>