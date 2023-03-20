<?php 
$respFile = fopen("result.json", "w") or die("Unable to open file!");
$json_str = file_get_contents('php://input');
fwrite($respFile, $json_str);
fclose($respFile);
?>