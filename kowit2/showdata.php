<?php require_once('Connections/conn.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "login.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_conn, $conn);
$query_Recordset1 = "SELECT * FROM `user` ORDER BY id ASC";
$Recordset1 = mysql_query($query_Recordset1, $conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="80%" border="0" align="center">
    <tr>
      <td colspan="7" align="center">แสดงข้อมูล [จำนวน <?php echo $totalRows_Recordset1 ?> คน]</td>
      <td width="6%" align="center"><a href="<?php echo $logoutAction ?>">Logout</a></td>
    </tr>
    <?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
      <tr>
        <td width="7%" align="center" bgcolor="#FFFF00">ลำดับ</td>
        <td width="16%" align="center" bgcolor="#FFFF00">ชื่อ สกุล</td>
        <td width="19%" align="center" bgcolor="#FFFF00">ที่อยู่</td>
        <td width="18%" align="center" bgcolor="#FFFF00">โทรศัพท์</td>
        <td width="13%" align="center" bgcolor="#FFFF00">Username</td>
        <td width="13%" align="center" bgcolor="#FFFF00">รายละเอียด</td>
        <td width="8%" align="center" bgcolor="#FFFF00">แก้ไข</td>
        <td align="center" bgcolor="#FFFF00">ลบ</td>
      </tr>
      <?php 
	  $n=1;
	  do { ?>
     
        <tr>
          <td><?php echo $n++?></td>
          <td><?php echo $row_Recordset1['name']; ?></td>
          <td><?php echo $row_Recordset1['address']; ?></td>
          <td><?php echo $row_Recordset1['mobile']; ?></td>
          <td><?php echo $row_Recordset1['username']; ?></td>
          <td align="center">รายละเอียด</td>
          <td align="center">แก้ไข</td>
          <td align="center">ลบ</td>
        </tr>
        <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
      <?php } // Show if recordset not empty ?>
    <?php if ($totalRows_Recordset1 == 0) { // Show if recordset empty ?>
      <tr>
        <td colspan="7" align="center">ไม่พบข้อมูล</td>
        <td align="center">&nbsp;</td>
      </tr>
      <?php } // Show if recordset empty ?>
  </table>
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
