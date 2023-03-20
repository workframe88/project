<?php 
session_start();
$a=$_GET['a1'];
$p_id=$_GET['p_id'];
$act=$_GET['act'];

$sum1=$_GET['sum1'];
$_SESSION['toltal'] += $a;

/*echo $a; echo "<br/>";
echo $p_id; echo "<br/>";
echo $act;*/

if($act=='add' && !empty($p_id))
  {
    if(isset($_SESSION['cart'][$p_id]))
    {
      $_SESSION['cart'][$p_id]++;
      
    }
    else
    {
      $_SESSION['cart'][$p_id]=1;

    }
  }

  if($act=='remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
  {
    unset($_SESSION['cart'][$p_id]);
    $_SESSION['toltal'] -=  $sum1;
  }

if($act=='update')
  {
    $amount_array = $_POST['amount'];
    foreach($amount_array as $p_id=>$amount)
    {
      $_SESSION['cart'][$p_id]=$amount;
    }
  }
header("Location: index.php?a1=$a&p_id=$p_id&act=add");

?>