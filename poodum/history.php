<?php
error_reporting( error_reporting() & ~E_NOTICE );
session_start();
$search = $_POST['search'];
include "connect.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>History</title>
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
<body><br>
	<center><a href="index.php" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5zM10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5z"/>
</svg> กลับ</a></center><br>
  
	<?php 
  $date2=date('Y-m-d');
  if(empty($_POST['search'])){
    $sql1 = "SELECT sum(money) FROM money";
    $sql_money1 = "SELECT sum(money) FROM money WHERE `type`=0";
    $sql_money2 = "SELECT sum(money) FROM money WHERE `type`=1";
   }else{
    $search = $_POST['search'];
    $sql1 = "SELECT sum(money) FROM money WHERE `datetime` LIKE '%$search%' ";
    $sql_money1 = "SELECT sum(money) FROM money WHERE `type`=0 and `datetime` LIKE '%$search%'";
    $sql_money2 = "SELECT sum(money) FROM money WHERE `type`=1 and `datetime` LIKE '%$search%'";

  }
	$result1 = mysqli_query($conn, $sql1);

  $result2 = mysqli_query($conn, $sql_money1);
  while($row2=mysqli_fetch_row($result2)){
    $_SESSION['money1']=$row2[0];
  }
  $result3 = mysqli_query($conn, $sql_money2);
  while($row3=mysqli_fetch_row($result3)){
    $_SESSION['money2']=$row3[0];
  }
  $_SESSION['end'] = $_SESSION['money1'] + $_SESSION['money2'];
       	while($row1=mysqli_fetch_row($result1)){
       		echo "<center><h1>ยอดรวม : $row1[0]</h1><center>";        
          echo "<form action='history.php' method='post'>";
          echo "<input type='search' placeholder='Search : 0000-00-00' style='margin-bottom: 10px;width:100px' name='search' id='search' value='".$date2."'> <button type='submit' style='background-color: orange;border-radius: 5px;'>
          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye' viewBox='0 0 16 16'>
  <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z'/>
  <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z'/>
</svg>
          </button>";
          echo "</form>";
          echo "<center><a href='https://docs.google.com/forms/d/e/1FAIpQLSd1TSiPdLhAPJBbCSuyZ_8zkY7NnpCoBOHY5IS2DR1iCWdeaw/viewform' class='btn btn-warning'>บันทึกยอดขาย</a>
            <a href='' data-bs-toggle='modal' data-bs-target='#exampleModal3' class='btn btn-warning'>เช็คยอด</a>
          <center>";


       	}
	;?>
  

<table class="table"  >
	<tr>
		<td>No</td>
		<td>Date time</td>
    <td>Pay</td>
		<td>Money</td>
    <td>Wrong</td>

	</tr>
    <?php
    $n=1;
	
  if(empty($_POST['search'])){
    $sql = "SELECT * FROM money ";
   }else{
    $search = $_POST['search'];
    $sql = "SELECT * FROM money WHERE `datetime` LIKE '%$search%'";
  }
	$result = mysqli_query($conn, $sql);
       	while($row=mysqli_fetch_row($result)){
		;?>
        	<tr>
        		<td>
        		<?php echo $n++; 
              //$_SESSION['No'] = $row[0]; 
            ?>

        		</td>
        		<td>
        		<?php echo $row[1]; ?>
        		</td>
            <td><center><?php echo $row[4]; ?></center></td>
        		<td>
        		<?php echo $row[2]; ?>
        		</td>
            <td>
              <a href="detail.php?no=<?php echo $row[0]; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
</svg></a>
&nbsp;
            


            </td>
        	</tr>

        <?php  };?>
      	
</table>





<!-- worng 2 -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">บันทึกยอดขาย</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action='line.php' method='post'>
        <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSd1TSiPdLhAPJBbCSuyZ_8zkY7NnpCoBOHY5IS2DR1iCWdeaw/viewform" height="500px" width="330px"></iframe>
        
      </div>
      
        </form>
      
    </div>
  </div>
</div>

<!-- Pay -->
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">เช็คยอด <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-down" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M3.5 10a.5.5 0 0 1-.5-.5v-8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 0 0 1h2A1.5 1.5 0 0 0 14 9.5v-8A1.5 1.5 0 0 0 12.5 0h-9A1.5 1.5 0 0 0 2 1.5v8A1.5 1.5 0 0 0 3.5 11h2a.5.5 0 0 0 0-1h-2z"/>
  <path fill-rule="evenodd" d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"/>
</svg></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<?php
echo "<table border='1' class='table' style='text-align: center;'><tr>
                <td>ยอดเงินโอน = 1</td>
                <td>ยอดเงินสด = 0</td>
          </tr>
          <tr>
            <td>".$_SESSION['money2']."</td>
            <td>".$_SESSION['money1']."</td>
          </tr>
          <tr>
            <td colspan='2'>ยอดรวม : ".$_SESSION['end']."</td>
          </tr>
          <table>";
?>
        
      </div>
      
        
      
    </div>
  </div>
</div>



</body>
</html>

