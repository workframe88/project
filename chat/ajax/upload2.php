<?php
session_start();
include("connect.php");

if(isset($_FILES['file']['name'])){

	/* Getting file name */
	$filename = $_FILES['file']['name'];
	/* Location */
	$location = "../Chat/$filename";
	$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
	$imageFileType = strtolower($imageFileType);

	/* Valid extensions */
	$valid_extensions = array("jpg","jpeg","png","gif");

	$response = 0;
	/* Check file extension */
	if(in_array(strtolower($imageFileType), $valid_extensions)) {
		$sql="SELECT * FROM chat";
		$result = mysqli_query($con,$sql);
		$rowcount = mysqli_num_rows($result);
		
		$data = '<img class="rounded mx-auto d-block" style="width: 100%; height: 100%;" src="Chat/';
		$data2 ='.png">';
		$d1 ='<a data-fancybox="gallery" data-caption="" href="Chat/';
		$d2 ='.png">';
		$d3 ='</a>';
		$id = $_SESSION["UserID"];
		$EZ = GetHostByName($_SERVER['HTTP_X_FORWARDED_FOR']);
		$msg1 = $_SESSION["msg1"];
		$msg2 = $_SESSION["msg2"];
		$sql1 = "INSERT INTO Chat (Chat_id,Chat_ms,Chat_ip,Type) VALUES
			('$id','$d1$rowcount$d2$data$rowcount$data2$d3$msg1','$EZ','img')";
		$result1 = mysqli_query($con, $sql1);
		
		$location = "../Chat/$rowcount.png";

	   	if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
	     	$response = $location;
	   	}
	}

	echo $response;
	exit;
}


echo 0;
?>
