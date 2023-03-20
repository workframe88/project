<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE);

include "connect.php";

$qty_id = $_GET['qty_id'];
$qty = $_GET['qty'];


$sql = "SELECT * FROM stock where id_stock ='$qty_id'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	$total = $row["qty_stock"];
}

$total = $qty + $total;

$sql = "UPDATE stock SET qty_stock = '$total' WHERE id_stock = $qty_id;";
$conn->query($sql);
$conn->close();
header("Refresh: 0; URL=admin.php");
?>