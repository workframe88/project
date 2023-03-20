<?php
$host="localhost";
$user="root";
$passwd="";
$dbname="fcrispyfry";
mysql_connect($host,$user,$passwd)or die("error1");
mysql_select_db($dbname)or die("error2");
mysql_query("SET NAMES utf8");
