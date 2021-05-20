<?php
include 'shablon/header.php';
require 'db/db.php';
session_start();
if (isset($_SESSION['admin'])) {

 ?>
 <div class="container-fluid image_1 " style="  background: url(img/Main.png) no-repeat ;background-size: cover;">
   <?php include 'shablon/navbar.php'; ?>

   <div class="container text-center d-flex align-items-center justify-content-center">

    <div class="signup-form">

        <form action="db/admin_add_trip_db.php" method="post" enctype="multipart/form-data">
    		<p class="hint-text"></p>
            <h1>Добавить поездку</h1>
            <div class="form-group">
              <input type="text" class="form-control" name="name" placeholder="Название поездки" required="required">
            </div>

            <div class="form-group">
              <textarea class="form-control" id="textAreaExample"  name="details" placeholder="Детали" rows="4"></textarea>

            </div>


            <div class="form-group">
            	<input type="number" class="form-control" name="price" placeholder="Цена" required="required">
            </div>
    		<div class="form-group">
                <input type="number" class="form-control" name="count" placeholder="Количество" required="required">
        </div>
    		<div class="form-group" placeholder="Категория">
          <select name="category"  class="form-control">
          <?php

          $category = getCategory();
              if($category!=null)
            foreach ($category as $value) {
                    echo "<option value=".$value['id'].">".$value['type_category']."</option>";
                }

                 ?>

          </select>
        </div>
        <div class="form-group">
              <label for="">Загрузите фото:</label>
              <input type="file" name="image">
        </div>

    		<div class="form-group">
                <button type="submit" class="btn btn-success btn-lg btn-block"> Добавить</button>
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
