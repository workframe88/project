<?php
$con= mysqli_connect("localhost","root","","chat") or die("Error: " . mysqli_error($con));

mysqli_query($con, "SET NAMES 'utf8'");
/*mysqli_query($con, "SET character_set_results=tis620");*/

if(!$con) {
    echo "ไม่สามารถเชื่อมต่อฐานข้อมูลได้".mysql_error();
    die();
    }
    $sql_details = array(
        'user' => 'root',
        'pass' => '',
        'db'   => 'chat',
        'host' => 'localhost'
    );
?>
