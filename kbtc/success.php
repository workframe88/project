<?php
 error_reporting(E_ERROR | E_PARSE);
include "connect.php";
$name=$_GET['name'];
$tel=$_GET['tel'];

$cal = "SELECT *,sum(`price_order`) FROM `order_cus`WHERE `tel_cus`= $tel";
$cal_all=mysql_db_query($dbname,$cal);
while($cal_price=mysql_fetch_row($cal_all)){
 $price=$cal_price[5];
}
date_default_timezone_set('Asia/Bangkok');
$date=date("d/m/Y h:i:sa");

?>

<!DOCTYPE html>
<html>
<head>
	<title>success</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<meta name="viewport" content="width=320; initial-scale=0.9; maximum-scale=1.0; user-scalable=0;" />
<style>
	body {
  		background-image: url('img/slip2.jpg');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
	}

</style>
<style type="text/css">
	@page{
		size: A4;
		
	}

</style>

</head>
<body>
	<br><br>
	<center>
		<img src="https://media2.giphy.com/media/2o6exHkliyUd5Jg6FZ/giphy.gif?cid=6c09b9525ced0a463e99f656c89d8bed9a3db82e1c741568&rid=giphy.gif&ct=s" width="130px"><br>
		<h5 style="margin-bottom: 20px;margin-top: 15px" ><b>ใบเสร็จอิเล็กทรอนิกส์</b></h5>
		<center>
		<table width="80%" border="0">
			<tr>
				<td ><h6 style="font-size: 17px" >No : <?php echo $tel ;?></h6></td>
				<td align="right"><h6 style="font-size: 13px"><?php echo $date ;?></h6></td>
			</tr>
		</table>
		</center>

<table border="0" class="table table-sm" style="width: 80%">
          <tr>
            <td ><b>รายการ</b></td>
            <td align="center"><b>ราคา</b></td>
            <td align="center"><b>จำนวน</b></td>
            <td align="center"><b>รวม</b></td>
          </tr>
          <?php
          
        $sql6 = "SELECT *,COUNT(`name_order`) ,sum(`price_order`) FROM `order_cus`WHERE `tel_cus`= $tel GROUP BY `name_order` DESC";
    $result6=mysql_db_query($dbname,$sql6);
              while($row6=mysql_fetch_row($result6)) //for($a=1;$a<=1;$a++)
      {
      ?>
        <tr>
          <td><?php echo $row6[1]; ?></td>
          <td align="center"><?php echo $row6[2]; ?>.00</td>
          <td align="center">x<?php echo $row6[5]; ?></td>
          <td align="center"><?php echo $row6[6]; ?>.00</td>
        </tr>
        
        
      <?php
      }
      ?>
      <tr>
        <td colspan="2" align="center"><b>ราคารวม</b></td>
        <td><h5><b><?php echo $price;?>.00</b></h5></td>
        <td width="20px"><b>บาท</b></td>
      </tr>
        </table>
        <h1 style="font-size: 13px"><b>** โปรดแคปใบเสร็จนี้ เพื่อยืนยันการรับออเดอร์ **</b></h1>
        <a href="index.php" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
</svg> กลับ</a>
        </center>
</body>
</html>
<?php
$sql="DELETE FROM `order_cus` WHERE tel_cus = $tel";
$result=mysql_db_query($dbname,$sql);

//unlink("img/-".$tel.".png");

?>