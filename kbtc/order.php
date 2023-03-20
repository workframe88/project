<?php
include "connect.php";
session_start();

$name=$_GET['name'];
$tel=$_GET['tel'];


$sql="select * from menu";
$result=mysql_db_query($dbname,$sql);

$cal = "SELECT *,sum(`price_order`) FROM `order_cus`WHERE `tel_cus`= $tel";
$cal_all=mysql_db_query($dbname,$cal);
while($cal_price=mysql_fetch_row($cal_all)){
 $price=$cal_price[5];
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Order</title>
	<!-- CSS only -->
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<meta name="viewport" content="width=320; initial-scale=0.9; maximum-scale=1.0; user-scalable=0;" />

 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
<style>
	body {
  		background-image: url('img/menu1.jpg');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
	}
</style>

</head>
<body>

	<table border="0" width="100%">
		<tr>
			<td><img src="img/logo.png" alt="Girl in a jacket" width="90px" height="90px" style="margin-left: 10px;margin-top: 10px"></td>
			<td width="100%"></td>
			<td><h1 style="color: white;font-size: 30px;margin-right: 5px;margin-top: 10px">
          <?php 
            if($price==0){
              echo '0.00'; 
            }else{
              echo $price.".00";
            }
          ;?>
      </h1></td>
			<td><button class="btn btn-warning" class="form-control" style="margin-right: 10px" data-toggle="modal" data-target="#flyoutmodal" type="button">
				<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
  <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
</svg>
			</button></td>
		</tr>
	</table>

<br><br><br><br><br>


<form action="add.php" method="post">
<input type="text" name="name_cus" value="<?php echo $name ;?>" hidden>
<input type="text" name="tel_cus" value="<?php echo $tel ;?>" hidden>
		<div class="container" align="center">
	<div class="row">
		<?php 
        while($row=mysql_fetch_row($result)) //for($a=1;$a<=1;$a++)
      {
      ?>
		<div class="col-6"><a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal-<?php echo $row[0]?>"><center>
      <img src="<?php echo $row[2]?>" class="rounded mx-auto d-block" alt="..." style="width: 150px;height: 150px"></center></a><br><br></div>
	

		<!-- Modal -->
<div class="modal fade" id="exampleModal-<?php echo $row[0]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?php echo $row[1]?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
        <table border="0" class="table">
        	<tr>
        		<td><b>เลือก</b></td>
        	</tr>

        	<tr>
        		<td>
        			<?php 
        			$id_menu = $row[0];
        $sql2="SELECT * FROM `price` INNER JOIN menu ON menu.id_menu = price.id_menu where menu.id_menu = $id_menu";
        $result2=mysql_db_query($dbname,$sql2);

        while($row2=mysql_fetch_row($result2)) //for($a=1;$a<=1;$a++)
      {
      ?>
        			<div class="form-check">
					  <input class="form-check-input" type="radio" name="choice1" id="choice1" value="<?php echo $row2[1]?> ">
					  <label class="form-check-label" for="choice1">
              <table border="0">
                <tr>
                  <td width="55px"><?php echo $row2[1]?></td>
                  <td>ราคา <?php echo $row2[2]?></td>
                </tr>
              </table>
					     
					  </label>
					</div>
		<?php
      }
      ?>
        		</td>
        	</tr>

        	<tr>
        		<td><b>ผง</b></td>
        	</tr>
        	<tr>
        		<td>
              <?php
                $sql4 = "SELECT * FROM powder";
                $result4=mysql_db_query($dbname,$sql4);
                    
                if($row[0]==3){
                    while($row4=mysql_fetch_row($result4)) //for($a=1;$a<=1;$a++)
                    {
                      echo "<div class='form-check'>
            <input class='form-check-input' type='radio' name='choice2' id='choice2' value='".$row4[1]."' disabled>
            <label class='form-check-label' for='choice2'>
              ".$row4[1]."
            </label>
          </div>";
                }
                }else{
                  while($row4=mysql_fetch_row($result4)) //for($a=1;$a<=1;$a++)
                    {
                      echo "<div class='form-check'>
            <input class='form-check-input' type='radio' name='choice2' id='choice2' value='".$row4[1]."' >
            <label class='form-check-label' for='choice2'>
              ".$row4[1]."
            </label>
          </div>";

                }
              }

              ?>
        			
        			
		
        		</td>
        	</tr>

        	<tr>
        		<td><b>ซอส</b></td>
        	</tr>
        	<tr>
        		<td>
        			<?php
        $sql3 = "SELECT * FROM sauce";
		$result3=mysql_db_query($dbname,$sql3);
        			while($row3=mysql_fetch_row($result3)) //for($a=1;$a<=1;$a++)
      {
      ?>
        			<div class="form-check">
					  <input class="form-check-input" type="radio" name="choice3" id="choice3" value="<?php echo $row3[1]?>">
					  <label class="form-check-label" for="choice3">
					    <?php echo $row3[1]?>
					  </label>
					</div>
		<?php
      }
      ?>
        		</td>
        	</tr>
          <tr>
            <td>
              <div class="form-check">
  <input class="form-check-input" type="checkbox" id="name_pro-<?php echo $row[0]?>" name="name_pro" value="<?php echo $row[1]?>">
  <label class="form-check-label">
    กดเพื่อยืนยัน
  </label>
</div>
            </td>
          </tr>
        </table>


      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
        <input type="submit" id="btn_send-<?php echo $row[0]?>" value="ใส่ตะกร้า" class="btn btn-primary" disabled>

      </div>
    </div>
  </div>
</div>
  
<script>
    $("#name_pro-<?php echo $row[0]?>").click(function(){
        if( $(this).prop("checked") ) {
            $("#btn_send-<?php echo $row[0]?>").prop("disabled", false);
        } else {
            $("#btn_send-<?php echo $row[0]?>").prop("disabled", true);
        }
    });
</script>

		<?php
      }
      ?>
	</div></div>

</form>




 
<center>
<!-- Modal -->
<div class="modal" id="flyoutmodal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog fadeInRight animated ml-auto" role="document"  style="width:98%">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">รายการ : <?php echo $tel ;?></h5>
        <a  class="close" data-dismiss="modal" >
        	<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
</svg>
        </a>
      </div>
      <div class="modal-body">
         <?php
          if($price == 0){
            echo "<h1 style='color: gray'>โปรดเลือกเมนู</h1>";
          }else{
        ?>
                  <table border="0" class="table" >
          <tr>
            <td ><b>รายการ</b></td>
            <td align="center"><b>ราคา</b></td>
            <td align="center"><b>จำนวน</b></td>
            <td align="center"><b>รวม</b></td>
            <td width="20px" align="center"><b>ลบ</b></td>
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
          <td width="20px" align="center">
  <a href="del.php?id_oder=<?php echo $row6[0]; ?>&&name_cus=<?php echo $name ;?>&&tel_cus=<?php echo $tel ;?>&&price=<?php echo $row6[2]; ?>" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg></a></td>
        </tr>
        
        
      <?php
      }
      ?>
      <tr>
        <td colspan="3" align="center"><b>ราคารวม</b></td>
        <td><h5><b><?php echo $price;?>.00</b></h5></td>
        <td width="20px"><b>บาท</b></td>
      </tr>
        </table>
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
  ชำระเงิน
</button>
      </div>
        <?php
          }
        ?>


    </div>
  </div>
</div>
</center>

    <!-- Payment -->
<!-- Modal -->
<center>
  <form  action="line.php" method="post" onSubmit="JavaScript:return fncSubmit();" enctype="multipart/form-data">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered" style="width:98%" >
    <div class="modal-content">
      <input type="text" name="name_cus" value="<?php echo $name;?>" hidden>
      <input type="tel" name="tel_cus" value="<?php echo $tel;?>" hidden>
      <div class="modal-body">
        <center><br>
          <img src="img/payment.png" width="60%"><br>
          <h1 style="font-size: 13px;margin-top: 10px" ><b>บัญชีพร้อมเพย์ : 0902571577</b>
          </h1>
          <?php
          require_once("lib/PromptPayQR.php");

          $PromptPayQR = new PromptPayQR(); // new object
          $PromptPayQR->size = 8; // Set QR code size to 8
          $PromptPayQR->id = '0902571577'; // PromptPay ID
          $PromptPayQR->amount = $price; // Set amount (not necessary)
          echo '<img src="' . $PromptPayQR->generate() . '"  width="55%" />'
          ?>
          <br>
          <h1 style="font-size: 13px"><b>ชื่อบัญชี : โกวิทย์ ธนพฤฒิวงศ์</b></h1>
          <h1 style="font-size: 13px;margin-top: 10px"><b>จำนวนเงิน <?php echo $price;?>.00 บาท</b></h1>
          <h1 style="font-size: 13px;margin-top: 10px;color: gray">หมายเหตุ : ชำระเงินแล้ว โปรดแนบสลิป</h1>

          <div class="input-group mb-3" style="width: 85%">
            <input type="file" class="form-control" id="fileField" name="image">
            <label class="input-group-text" for="inputGroupFile02">Upload</label>
          </div>
        </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
        <button type="submit" class="btn btn-warning" onclick="fncSubmit();" id="bt1">สั่งซื้อ</button>
      </div>
    </div>
  </div>
</div>
</form>
</center>



</body>

<script type="text/javascript">
function fncSubmit()
{
    if(document.getElementById('fileField').value  == ""  )
    {
        alert('โปรดแนบหลักฐานการชำระเงิน');
        return false;
    }else{
        document.getElementById("bt1").hidden = true;
    }
}
</script>

</html>
<!--onclick="this.disabled=true;form.submit();"-->