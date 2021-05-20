<?php
require 'db.php';
session_start();
if (isset($_SESSION['user']) && $_COOKIE['basket']) {
  $basket=unserialize($_COOKIE['basket']);
  foreach ($basket as  $value) {
    if ($value!=null) {
      $order['trip_id']=$value['id'];
      $order['user_id']=$_SESSION['user']['id'];
      $order['count']=$value['count'];
      setcookie("basket",serialize($basket),time() - 3600, "/");
      if (finalOrder($order)) {
        header("Location:../basket.php");
      }
    }
  }
}
?>
