<?php
include 'shablon/header.php';
require 'db/db.php';
session_start();




 ?>

  <div class="container-fluid image_1">
    <?php include 'shablon/navbar.php'; ?>

    <div class="px-4 px-lg-0">


  <div class="pb-5 mt-5">

  </div>
</div>


<div id="submit" class="modal fade" aria-labelledby="exampleModalCenterTitle" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Успех</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
          <?php
          $trip=getTripById($_GET['id']);

          ?>
          <div class="card-body font-weight-bold" style="font-family: 'Bebas-Roboto',Arial,sans-serif;">
            <h4 class="card-title "><?=$trip['name']?></h5>
            <p class="card-text  m-0">Цена:<?=$trip['price']?>тг</p>
            <p class="card-text  m-0">Осталось <?=$trip['count']?> мест</p>
            <p class="card-text  m-0">Сколько билетов надо?</p>
            <form method="get" action="db/add_basket_db.php">
            <select class="" name="count">
              <?php for ($i=0; $i <= $trip['count']; $i++) {
                  echo "<option value=".$i.">".$i."</option>";
              } ?>
            </select>
            <div class="fade">
              <input type="text" name="id" value="<?=$trip['id']?>">
            </div>
            <button  class="btn btn-outline-success btn-sm" type="submit">
            Добавить в корзину
            </button>
          </form>
          </div>
        </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
              </div>
            </div>
    </div>
  </div>

  <div id="successadd" class="modal fade">
<div class="modal-dialog">
  <div class="modal-content">
    <!-- Заголовок модального окна -->
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h4 class="modal-title">Успешно добавлено</h4>
    </div>
    <!-- Основное содержимое модального окна -->
    <div class="modal-body">
      В корзину добавлено <?=$_GET['successadd']?>
    </div>
    <div class="modal-footer">
      <a href="poezdki.php"><button type="button" class="btn btn-primary">Вернуться к путевкам</button></a>
      <a href="basket.php"><button type="button" class="btn btn-primary"> Перейти в корзину</button></a>
    </div>
  </div>
</div>
</div>








    </div>
  </div>


 <script>
  <?php
  if (isset($_GET['id'])) { ?>
    $(document).ready(function() {
      $("#submit").modal('show');
    });
    <?php
  }elseif (isset($_GET['successadd'])) {
    ?>
      $(document).ready(function() {
        $("#successadd").modal('show');
      });
      <?php
  }
         ?>
  </script>

  <?php include 'shablon/footer.php';
