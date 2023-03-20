<!DOCTYPE html>
<html>
<head>
  <title>FCrispyfry</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script data-require="jquery@*" data-semver="2.1.1" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">


</head>
  

<body>
  <?php
  error_reporting( error_reporting() & ~E_NOTICE );
  session_start();
  $p_id = $_GET['p_id']; 
  $act = $_GET['act'];
    
  

  $a1=0;
      include "connect.php";
      $sql="select * from product";
      $result1=mysql_db_query($dbname,$sql);
      mysql_close();
    ?>
  <center>
    <nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="\index.php">
      <img src="https://scontent.furt1-1.fna.fbcdn.net/v/t1.6435-9/80883566_108369020678374_7176301120757694464_n.jpg?_nc_cat=107&ccb=1-3&_nc_sid=09cbfe&_nc_eui2=AeHEruF06mcUNLDY1PEje8bvTaEalDloGFlNoRqUOWgYWYXMXJQhnqlyeQNDDpqzOQ3hxlzwfNK2SogmnFcows1G&_nc_ohc=Umek4D5i_T8AX-B2DW-&_nc_ht=scontent.furt1-1.fna&oh=ea8eaff177699e8bb46e76d745e51fc5&oe=60AD7D2D" alt="" width="30"  class="d-inline-block align-text-top">
      FCrispyfry
    </a>


    <h3 style="color:blue ; margin-top: 10px" >
      <?php 
      echo number_format($_SESSION['toltal'],2);
      ?>
    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-top: -10px">
  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-cart4" viewBox="0 0 16 16">
  <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
</svg>
</button>
      </h3>
  </div>
</nav>
  

  
    <div class="container">
        <div class="row">
  <?php 
        $n=1;

        while($row=mysql_fetch_row($result1)) //for($a=1;$a<=1;$a++)
      {
      ?>

      <div class="col-md-3" style="margin-top: 40px">
      <div class="" style="width: 18rem;">
    <img src="<?php echo $row[4]?>" width="80%">
    <div class="card-body">
      <h5 class="card-title"><b><?php echo $row[1]?> <?php echo $row[2]?>฿</b></h5>
      <?php
        $_SESSION["a1"] = $row[2];
      ?>
      <p class="card-text"><?php echo $row[3]?></p>

      <a href="sum.php?a1=<?php echo $_SESSION['a1']; ?>&&p_id=<?php  echo $row[0];?>&&act=add" class="btn btn-primary">
        ใส่ตะกร้า
        </a>
    </div>
    </div>
    </div>



    <?php
    $n++;

      }
      ?>
      

  </center>

  <br><br>
</body>

<!-- Modal -->
<form method="post" action="line.php" >
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="staticBackdropLabel">ยืนยันรายการ </h3>
        <input type="text" name="name1" placeholder="ชื่อเล่น" style="margin-left:5%;width: 60px" class="form-label" id="textfield1"  >&nbsp;
        <input type=”tel” , pattern="\d{10}" , name="tel" placeholder="เบอร์โทรคุณ"  class="form-label" style="width: 90px" id="textfield2">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

<table width="100%" border="0" align="center" class="square">
<tr>
      <td colspan="6" bgcolor='#FFFF33'>
      <b>ตะกร้าสินค้า</span></td>
    </tr>
    <tr>
      <td bgcolor="#EAEAEA">รูป</td>
      <td bgcolor="#EAEAEA">สินค้า</td>
      <td align="right" bgcolor="#EAEAEA">ราคา</td>
      <td align="right" bgcolor="#EAEAEA">จำนวน</td>
      <td align="right" bgcolor="#EAEAEA">รวม(บาท)</td>
      <td align="center" bgcolor="#EAEAEA">ลบ</td>
    </tr>

    <?php 
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
    
    //remove product
    echo "<td width='46' align='center'><a href='sum.php?p_id=$p_id&act=remove&sum1=$sum'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
  <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
</svg></a></td>";
    echo "</tr>";
  }
  if($total >=100){
    $free = "Promotion ฟรี";
  }else{
    //$free = "+10";
   // $total =$total+10;
    $free = "Promotion ฟรี";
  }
  
  echo "<tr>";
    echo "<td align='center' colspan='3' bgcolor='#CEE7FF' >สั่งครบ 100 ฿ ขึ้นไปส่งฟรี</td>";
   // echo "<td align='left' bgcolor='#CEE7FF'></td>";
    echo "<td align='right'  bgcolor='#CEE7FF' ><b>ค่าส่ง</b></td>";
    echo "<td align='right'  bgcolor='#CEE7FF' ><b>".$free."</b></td>";
    echo "<td align='left' bgcolor='#CEE7FF'></td>";
  echo "</tr>";
  echo "<tr>";
    echo "<td  colspan='3' bgcolor='#FFFF33' align='center'>ผงชีส,บาร์บีคิว,ปาปริก้า | ซอสชีส,มะเขือ,พริก | ใส่ไข่มุก,ไม่ใส่ไข่มุก </td>";
    echo "<td align='right'  bgcolor='#FFFF33' align='center'><b>ราคารวม</b></td>";
    echo "<td align='right' bgcolor='#FFFF33'>"."<b>".number_format($total,2)."</b>"."</td>";
    echo "<td align='left' bgcolor='#FFFF33'></td>";
  echo "</tr>";

}

      ?>
</table>
  

      
      <div class="modal-footer">
        <a href="https://www.google.co.th/maps/" target="blank">ดูตำแหน่ง</a>
        <textarea id="demo1" name="demo" placeholder="วางลิงค์ตำแหน่งของคุณ" required></textarea>
        <textarea id="demo2" name="oder" placeholder="รายละเอียดทั้งหมด" style="width:50%;" class="form-label" required></textarea>
        <input type="number" id="a" value=<?php echo $total ;?> hidden>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
        <button type="button" class="btn btn-primary"  id="sub1" onclick="myFunction()" >ยืนยัน</button>
        <button type="submit" class="btn btn-primary"  id="sub2" onclick="this.disabled=true; form.submit();" hidden>ยืนยันคำสั่งซื้อ</button>
      </div>
    </div>
  </div>
</div>
</form>

<script>
function myFunction() {
    
    if(document.getElementById('a').value == "0"){
        document.getElementById("sub2").hidden = true;
        alert('เลือกสินค้าก่อน');
        return false;
    }else{
        if(document.getElementById('textfield1').value == "")
    {
        alert('กรอกชื่อเล่นก่อน');
        return false;
    }
    if(document.getElementById('textfield2').value == "")
    {
        alert('กรอกเบอร์โทรศัพท์');
        return false;
    }
    if(document.getElementById('demo1').value == "")
    {
        alert('ใส่ตำแหน่งของคุณ');
        return false;
    }
    if(document.getElementById('demo2').value == "")
    {
        alert('กรอกรายละเอียด');
        return false;
    }
  document.getElementById("sub1").hidden = true;
  document.getElementById("sub2").hidden = false;
    }

    
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</html>