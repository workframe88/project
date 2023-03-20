<?php
	session_start();

	if(empty($_SESSION["login"]) || $_SESSION["login"] != 2)
	{
        
        header("Location: index.php");
	}
	else
	{
		include "connect.php";
	}
?>
<?php 

include "connect.php";
$u=$_SESSION['user_id'];
$sql2="select * from users where id_users='$u'";
$result2=mysql_db_query($dbname,$sql2);
$row2=mysql_fetch_row($result2);
?>
<html>
<head>
<title>Product</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body >
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="https://www.flaticon.com/svg/static/icons/svg/3567/3567097.svg" width="35" height="30" class="d-inline-block align-top" alt="" loading="lazy">
    Shop Product
  </a>

    
    <form class="form-inline my-10 my-lg-0">
        
      <div class="dropdown">
  <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img src="https://www.flaticon.com/svg/static/icons/svg/711/711769.svg" width="25" height="25" class="d-inline-block align-top" alt="" loading="lazy">&nbsp;
        <h7><?php echo $row2[1];?>&nbsp;&nbsp;<?php echo $row2[2];?></h7>&nbsp;
  </button>
  <?php $i;?>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="product.php">All Product</a>
    <a class="dropdown-item" href="admin.php">All User</a>
  </div>
</div>&nbsp;&nbsp;
<a class="btn btn-primary" href="logout.php " onclick="return confirm(' ต้องการออกจากระบบ ') " role="button">Logout</a>
    </form>
</nav>
    <form action="#" method="post">
        
    </form>
    
    <?php
      include "connect.php";
     $sql="select * from product";
      $result=mysql_db_query($dbname,$sql);
      mysql_close();
    ?>
    <center><font style="font-size: 100px;color: #000000">All Product</font></center>
    <center><a class="btn btn-primary" href="add_product.php" role="button">Add Product</a></center>
    <br>
     <div class="container">
    
     <div class="row" style="margin-top: 30px">
      <?php 
        $n=1;
        while($row=mysql_fetch_row($result)) //for($a=1;$a<=1;$a++)
        
      {
      ?>
     
    <div class="col-md-3" style="margin-bottom: 30px ">
      <div >
     
      <div class="thumbnail" style="background-color: #F5F5F5">
        <label style="margin-top: 15px"></label>
        
        <td><a href="delete_product.php?sid=<?php echo $row[0]; ?>" onclick="return confirm(' ต้องการลบใช่ไหม ') " style="margin-left:225px"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg></a>
<br>
        <label style="margin-left: 15px"><b><?php echo $row[1]; ?></b></label>
        
        <center>
  
      <img src="images/<?php echo $row[3];  ?>"  class="rounded mx-auto d-block" width="200px" height="200px">
  
      <label style="margin-top: 10px">ราคา : <?php echo $row[2]; ?></label><br>
      <td><a href="edit_product.php?sid=<?php echo $row[0]; ?>" onclick="return confirm(' ต้องการแก้ไขใช่ไหม ') " style="margin-left:225px"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg></a>
<label style="margin-bottom: 10px"></label>
      </div>
      </center>
    </div>
    
    </div>
    
   
      <?php
      }
      ?>


     </div>
    
</body>
</html>