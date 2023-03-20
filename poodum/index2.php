<?php
error_reporting( error_reporting() & ~E_NOTICE );
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mali:wght@200&family=Mochiy+Pop+One&family=Prompt:wght@300&display=swap" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="icon" href="favicon.ico" type="image/x-icon"> 
<link rel="shortcut icon" href="ico.ico" type="image/x-icon">
</head>
<body>
  <center>
  <table border="0">
    <tr>
        <td><img src="https://scontent.furt1-1.fna.fbcdn.net/v/t1.6435-9/80883566_108369020678374_7176301120757694464_n.jpg?_nc_cat=107&ccb=1-5&_nc_sid=09cbfe&_nc_eui2=AeHEruF06mcUNLDY1PEje8bvTaEalDloGFlNoRqUOWgYWYXMXJQhnqlyeQNDDpqzOQ3hxlzwfNK2SogmnFcows1G&_nc_ohc=ckxbFliUr2wAX8XHuD5&tn=536wM4C1Z0PaEJne&_nc_ht=scontent.furt1-1.fna&oh=00_AT97sI2qo9G_Sp7YCR7R3h77Mpr9Vg7HDy9op3-GeZO_WQ&oe=620D7DAD" width="50px"></td>
      <td><h1 style="font-family: 'Mali', cursive; font-size 25px">สาขาถนนคนเดินกระบี่</h1></td>
      <td width="40px"></td>
      <td>
        <h3>
        <?php 
          echo number_format($_SESSION['toltal'],2);
      ?>&nbsp;
        <!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right; margin-right: 10px">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
</svg>
</button></h3></td>
    </tr>
  </table>
</center>

<br>
<div class="container">
<div class="row">
        <?php
  session_start();
  include "connect.php";
  $p_id = $_GET['p_id']; 
  $act = $_GET['act'];
  $a1=0;
  $sql = "SELECT * FROM menu2";
  $result = mysqli_query($conn, $sql);
        while($row=mysqli_fetch_row($result)){
    ;?>
    <div class="col-4">
          <center><a href="cart.php?a1=<?php echo $row[2]; ?>&&p_id=<?php  echo $row[0];?>&&act=add" class="btn btn-warning" style="width: 90px;margin-bottom: 30px;height: 90px" ><?php echo $row[1] ;?>&nbsp;&nbsp;&nbsp;<?php echo $row[2] ;?></a></center></div>
        <?php };?>
      
</div>
</div>


<table border="0" width="50%" align="center" class="table">
  
    
</table>
<br>
<center><a href="history.php" class="btn btn-warning">ประวัติยอดขาย</a></center>

<!--<table class="table">
  <tr style="background-color: yellow">
    <td width="20px">ลำดับ</td>
    <td>ชื่อเมนู</td>
    <td>ราคา</td>
    <td>จำนวน</td>
    <td>รวม</td>
  </tr>
  <tr>
    <td>1</td>
    <td>เฟรนฟราย M</td>
    <td>49</td>
    <td>2</td>
    <td>98</td>
  </tr>
</table>-->


 

<br><br><br>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><h3>&nbsp;รายการ <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
  <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
</svg></h3></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="cashier.php" method="post">

        <section class="main">
<table width="100%" border="0" align="center" class="square">
  <?php
  if(!empty($_SESSION['toltal'])){ ?>
       <tr>
      <td bgcolor="#FFFF33">No</td>
      <td bgcolor="#FFFF33">Name</td>
      <td align="right" bgcolor="#FFFF33">Price</td>
      <td align="right" bgcolor="#FFFF33">Qty</td>
      <td align="right" bgcolor="#FFFF33">(฿)</td>
      <td align="center" bgcolor="#FFFF33">Del</td>
    </tr>
    <?php
      }
    ?>
  
   

    <?php 
    $total=0;
    $n=1;
        if(!empty($_SESSION['cart']))
{
  include("connect.php");
  foreach($_SESSION['cart'] as $p_id=>$qty)
  {
    $sql1 = "select * from menu2 where id_product =$p_id";
    $query1=mysqli_query($conn,$sql1);
    $row1 = mysqli_fetch_array($query1);
    $sum = $row1[2] * $qty;
    $total += $sum;
    $_SESSION['total2'] = $total;
    $nnn .= $n.'.)'.$row1[1].' '.$qty.' = '.$sum.'<br/>';

    echo "<tr>"; 
    echo "<td width='40'>".$n++."</td>"; 
    echo "<td width='190'>" . $row1[1] . "</td>";
    
    
    
    echo "<td width='40' align='right'>" .number_format($row1[2],2) . "</td>";
    echo "<td width='57' align='right'>";  
    echo "<h7 name='amount[$p_id]'>$qty</h7>";
    //echo "<input type='text' name='amount[$p_id]' value='$qty' size='2'/></td>";
    echo "<td width='70' align='right'>".number_format($sum,2)."</td>";
    
    //remove product
    echo "<td width='46' align='center'><a href='cart.php?p_id=$p_id&act=remove&sum1=$sum&qty=$qty' onclick='this.disabled=true;' id='sub3'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
  <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
</svg></a></td>";
    echo "</tr>";
  }

 
  
  
  echo "<tr>";
    echo "<td  colspan='1' bgcolor='#FFFF33' align='center'></td>";
    echo "<td align='center' colspan='3' bgcolor='#FFFF33' align='center'><b>Total price</b></td>";
    echo "<td align='right' bgcolor='#FFFF33'>"."<b>".number_format($total,2)."</b>"."</td>";
    echo "<td  align='center' bgcolor='#FFFF33'><b>฿</b></td>";
  echo "</tr>";
  echo "<input type='text' name='detail'  id='detail' value='$nnn' hidden> ";
}else{

   echo "<td align='center' colspan='6'  align='center'><h1 style='color : #808080'>Order an empty list</h1></td>";
}

      ?>

</table>
<div class="modal-footer">
        
        <input type="number" name="num2" placeholder="money" id="num2" value="<?php echo $total ;?>" hidden>
                    <?php 
                      if(!empty($_SESSION['cart'])){
                        
                    ?>
                    <table border="0">
                      <tr>
                        <td><input type="number" name="num1" placeholder="ยอดเงิน" id="num1" style='width: 150px;margin-top: 22px'>&nbsp;</td>
                        <td><button class='btn btn-warning' style='width: 70px' id='sub1' type="button" onClick="this.form.action='cashier.php?type=1'; submit()">โอน</button></td>

                        <td><button class='btn btn-warning' style='width: 70px' id='sub2' type="button" onClick="this.form.action='cashier.php?type=0'; submit()">เงินสด</button></td>

                      </tr>
                    </table>
                    
                    
                  <?php } 
                    else{
                  ?>
                    <button type='submit' class='btn btn-warning' style='width: 70px' disabled=true>เลือกสินค้าก่อน</button>
                    <?php
                      }
                    ?>
      </div>

</section>
                    </div>
                </div>
                
                
              
            </div>
        </div>


 
</form>
      </div>
      
    </div>
  </div>
</div>
<?php  echo $_SESSION['list_order'] ;?>
</body>

<script>
function myFunction() {
    
   
  document.getElementById("sub1").hidden = false;
  document.getElementById("sub2").hidden = false;
  document.getElementById("sub3").hidden = false;
    }

    

</script>


</html>