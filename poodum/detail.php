<?php
session_start();
include "connect.php";
$no=$_GET['no'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Detail</title>
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
</head>
<body>
<!-- list -->

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">รายละเอียดออเดอร์ &nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket-fill" viewBox="0 0 16 16">
  <path d="M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717L5.07 1.243zM3.5 10.5a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3z"/>
</svg></h5>
        
      </div>
      <div class="modal-body">
        <form action='history.php' method='post'>
        <table border="0">
<?php
    $n1=1;
  
  if(empty($_POST['search'])){
    $sql1 = "SELECT * FROM money WHERE  id_money= $no";
   }else{
    $search1 = $_POST['search'];
    $sql1 = "SELECT * FROM money WHERE `datetime` LIKE '%$search1%' and id_money= $no";
  }
  $result1 = mysqli_query($conn, $sql1);
        while($row1=mysqli_fetch_row($result1)){
    ;?>  
          <tr>
            <td><b>ออร์เดอร์เวลา : &nbsp;</b></td>
            <td><?php echo $_SESSION['time']=$row1[1]; ?></td>
          </tr>
          <tr>
            <td><b>รายการ : &nbsp;</b></td>
            <td >
              <?php echo $row1[3]; ?>
            </td>

            
            
          </tr>
          <tr>
            <td><b>ยอดเงิน : &nbsp;</b></td>
            <td><?php echo $_SESSION['moo']=$row1[2]; ?></td>
          </tr>
<?php  };?>
        </table>
        
      </div>
      <div class="modal-footer">
        <a href="history.php" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">รายการผิดพลาด!</a>
        <button type="submit" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5zM10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5z"/>
</svg> กลับ</button>
        </form>
      </div>
    </div>
  </div>

<!-- worng -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">รายงาน รายการผิดพลาด !</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action='line.php' method='post'>
        <table border="0">
       
          <tr>
            <td>ออร์เดอร์เวลา :</td>
            <td><input type="text" name="time" style="width: 150px" id="time" value="<?php echo $_SESSION['time']?>" disabled ></td>
          </tr>
          <tr>
            <td>ยอดเก่า :</td>
            <td><input type="number" name="old" style="width: 150px" id="old" value="<?php echo $_SESSION['moo']?>" disabled></td>
          </tr>
          <tr>
            <td>ยอดใหม่ :</td>
            <td><input type="number" name="new" style="width: 150px" id="new"></td>
          </tr>
          <tr>
            <td>หมายเหตุ :</td>
            <td><textarea type="text" name="new" style="width: 150px" id="text"></textarea>
          </tr>


        </table>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
        <button type="submit" class="btn btn-primary">ส่ง</button>
        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>