<?php
$host="localhost";
$user="root";
$passwd="";
$dbname="company";
mysql_connect($host,$user,$passwd)or die("error1");
mysql_select_db($dbname)or die("error2");
mysql_query("SET NAMES utf8");
date_default_timezone_set('Asia/Bangkok');
?>