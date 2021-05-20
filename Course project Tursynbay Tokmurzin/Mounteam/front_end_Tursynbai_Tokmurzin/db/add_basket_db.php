<?php
session_start();



  if (isset($_GET)) {
		$count=$_GET['count'];

    if ($_COOKIE['basket']) {
              $basketKey=unserialize($_COOKIE['basket']);
  }
    else {
      $basketKey=array();
    }  if (isset($_GET['id'])) {
             $aim['id']=$_GET['id'];
             $aim['count']=$count;

           array_push($basketKey,$aim);
             }
              setcookie("basket",serialize($basketKey),time() + 3600, "/");
            header("Location:../poezdki_add.php?successadd=$count");


  }


 ?>
