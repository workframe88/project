<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db ='poodum';

$conn = mysqli_connect($host,$user,$password,$db);// you can select db separately as you did already
mysqli_set_charset($conn, "utf8");
if($conn){
     // do all your stuff that you want
}else{
   echo "db connection error because of".mysqli_connect_error();
}
?>