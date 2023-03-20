<?php
	session_start();

	if(empty($_SESSION["login"]) || $_SESSION["login"] != 1)
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
<title>Home</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
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
    <a class="dropdown-item" href="edit_user2.php?sid=<?php echo $row2[0]; ?>">Edit Profile</a>
    
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
        <label style="margin-top: 20px"></label>
        <label style="margin-left: 15px"><b><?php echo $row[1]; ?></b></label>
        <center>
  <a href="status.php?sid=<?php echo $row[0]; ?>&t1=<?php echo $row[4];  ?>" class="thumbnail">
      <img src="images/<?php echo $row[3];  ?>"  class="rounded mx-auto d-block" width="200px" height="200px">
  </a>
      <label style="margin-top: 10px">ราคา : <?php echo $row[2]; ?></label><br>

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