<!DOCTYPE html>
<html>
<head>
	<title>สำเร็จ</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<script data-require="jquery@*" data-semver="2.1.1" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<center><br>
		<h1>รับออเดอร์แล้วรอ 15 นาที</h1>
		<img src="https://cdn.dribbble.com/users/129972/screenshots/3964116/75_smile.gif" width="80%">
		<div class="container">
		<table width="80%" border="1" align="center" class="table">
<tr>
      <td colspan="5" bgcolor="#CCCCCC">
      <center><b>รายการสั่งซื้อ</b></center></td>
    </tr>
    <tr>
      <td bgcolor="#EAEAEA">รูป</td>
      <td bgcolor="#EAEAEA">สินค้า</td>
      <td align="right" bgcolor="#EAEAEA">ราคา</td>
      <td align="right" bgcolor="#EAEAEA">จำนวน</td>
      <td align="right" bgcolor="#EAEAEA">รวม</td>
    </tr>

    <?php 
    error_reporting( error_reporting() & ~E_NOTICE );
	session_start();
    $total=0;
        if(!empty($_SESSION['cart']))
{
  include("connect.php");
  foreach($_SESSION['cart'] as $p_id=>$qty)
  {
    $sql1 = "select * from product where p_id=$p_id";
    $query1=mysql_db_query($dbname,$sql1);
    $row1 = mysql_fetch_array($query1);
    $sum = $row1['p_price'] * $qty;
    $total += $sum;
    $_SESSION['total2'] = $total;
    echo "<tr>";
    echo "<td width='172'><img src='" . $row1["p_img1"] ." ' width='100%'></td>"; 
    echo "<td width='190'>" . $row1["p_name"] . "</td>";
    echo "<td width='40' align='right'>" .number_format($row1["p_price"],2) . "</td>";
    echo "<td width='57' align='right'>";  
    echo "<h7 name='amount[$p_id]'>$qty</h7>";
    //echo "<input type='text' name='amount[$p_id]' value='$qty' size='2'/></td>";
    echo "<td width='70' align='right'>".number_format($sum,2)."</td>";
    
    echo "</tr>";
   
  }
   if($total >=100){
    $free = "ฟรี";
  }else{
    $free = "10";
    $total =$total+10;
  }
  echo "<tr>";
    echo "<td align='center' colspan='3' bgcolor='#CEE7FF' ></td>";
   // echo "<td align='left' bgcolor='#CEE7FF'></td>";
    echo "<td align='right'  bgcolor='#CEE7FF' ><b>ค่าส่ง</b></td>";
    echo "<td align='right'  bgcolor='#CEE7FF' ><b>"."+".$free."</b></td>";
  echo "</tr>";
  echo "<tr>";
  	echo "<td  colspan='2' bgcolor='#CEE7FF' align='center'>"."<p>".$_SESSION['oder']."</p>"."</td>";
    
    echo "<td align='right' colspan='2' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
    echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
    
  echo "</tr>";

}
session_destroy();
	mysql_close();
      ?>
      
</table>
<a href="index.php" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
</svg> ออก</a>
</div><br>
	</center>
	
</body>
</html>