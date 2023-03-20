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
$u=$_GET['sid'];
$sql="select * from product where id_product='$u'";
$result=mysql_db_query($dbname,$sql);
$row=mysql_fetch_row($result);
?>
<html>
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Edit Product</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Add Product By Admin</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="update_product.php" enctype="multipart/form-data">
                        
                        <div class="form-row">
                            <div class="name">Name Product</div>
                            <div class="value">
                                <div class="input-group">
                                <input class="input--style-5" type="text" name="id1"  id="id1" value="<?php echo $row[0];?>" hidden>
                                    <input class="input--style-5" type="text" name="name"  id="data" value="<?php echo $row[1];?>" >
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Price</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="number" name="price" value="<?php echo $row[2];?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">image</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="file" name="image" >
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="form-row p-t-5">
                            
                        
                        <div><br>
                            <button class="btn btn--radius-2 btn--red" type="submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>