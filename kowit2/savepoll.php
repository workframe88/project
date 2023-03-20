<?php
include "connect.php"; 
$a=$_POST['choice'];
$sql="insert into poll (poll_score) values('$a');";
$result=mysql_db_query($dbname,$sql);
mysql_close();
echo "<meta http-equiv='refresh' content='0;URL=poll.php'>";
?>