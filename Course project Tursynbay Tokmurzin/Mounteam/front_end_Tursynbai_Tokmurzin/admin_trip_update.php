<?php
include 'shablon/header.php';
require 'db/db.php';
session_start();
if (isset($_SESSION['admin']) && isset($_GET['id'])) {
$trip=getTripById($_GET['id']);

 ?>
 <div class="container-fluid image_1 " style="  background: url(img/Main.png) no-repeat ;background-size: cover;">
   <?php include 'shablon/navbar.php';?>

   <div class="container text-center d-flex align-items-center justify-content-center">

    <div class="signup-form">

        <form action="db/admin_trip_update_db.php" method="post" enctype="multipart/form-data">
    		<p class="hint-text"></p>
            <h1>Обновить информацию</h1>
            <div class="form-group">
              <input type="text" class="form-control"   name="name" value="<?=$trip['name']?>">
            </div>

            <div class="form-group">
              <input type="text" class="form-control"   name="details" value="<?=$trip['details']?>">

            </div>


            <div class="form-group">
            	<input type="number" class="form-control" name="price" placeholder="Цена" value="<?=$trip['price']?>" required="required">
            </div>
    		<div class="form-group">
                <input type="number" class="form-control" name="count" placeholder="Количество" value="<?=$trip['count']?>" required="required">
        </div>
    		<div class="form-group" placeholder="Категория">
          <select name="category"  class="form-control">
          <?php

          $category = getCategory();
              if($category!=null)
            foreach ($category as $value) {
              if ($value['type_category']==$films['type_category']) {
                echo "<option selected value=".$value['id'].">".$value['type_category']."</option>";
              }
              else
                {
                  echo "<option value=".$value['id'].">".$value['type_category']."</option>";
              }

                }

                 ?>

          </select>
        </div>
        <div class="fade">
          <input type="text" name="id" value="<?=$trip['id']?>">
        </div>

    		<div class="form-group">
                <button type="submit" class="btn btn-success btn-lg btn-block">Обновить</button>
            </div>
        </form>
    </div>

  </div>


  <div class="container-fluid group1" style="margin-top:-500px;">

  </div>


  <?php include 'shablon/footer.php';
}
else {
  header("Location:index.php");
}?>
