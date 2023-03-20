<?php
$n = "wait";
$num = $_GET['num'];
echo $num ;

header("Refresh: 5; URL=http://esp32.local/$n");
?>