<?php
if ($_COOKIE['basket'] && isset($_GET['id']) &&isset($_GET)) {
              $count=$_GET['count'];
              $basket=unserialize($_COOKIE['basket']);

            for ($i=0; $i < count($basket); $i++) {

              if ($basket[$i]!=null && $basket[$i]['id']==$_GET['id']) {
                $basket[$i]['count']-=$count;
                if($basket[$i]['count']==0) $basket[$i]=null;
              }
             }
            setcookie("basket",serialize($basket),time() + 3600, "/");
            header("Location:../basket.php");


  }


 ?>
