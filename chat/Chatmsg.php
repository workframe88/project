<?php
session_start();
include("connect.php");
$_SESSION["msg1"] = $_POST['data'];
$_SESSION["msg2"] = $_POST['data2'];

?>