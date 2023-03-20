<?php
include "connect.php";
$txt=$_POST['gtext'];

$word=$arrayName = array("โง่","บ้า","เสือก");
for($i=0;$i<count($word);$i++)
		 $txt=eregi_replace($word[$i],"***",$txt);

$date=date("d/m/Y H:i");
$sql="insert into guestbook (Guest_text,Guest_date) values('$txt','$date');";
$result=mysql_db_query($dbname,$sql);
mysql_close();
echo "<meta http-equiv='refresh' content='0;URL=FromGuestbook.php'>";
?>