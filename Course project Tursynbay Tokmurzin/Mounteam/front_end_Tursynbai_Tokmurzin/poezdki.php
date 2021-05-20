<?php
include 'shablon/header.php';
require 'db/db.php';
if (isset($_GET['eco'])) {
$trips=getTripsByCategory(1);
}elseif (isset($_GET['adven'])) {
  $trips=getTripsByCategory(2);
}elseif (isset($_GET['mount'])) {
  $trips=getTripsByCategory(3);
}else
  $trips=getAllTrips();
 ?>
  <div class="container-fluid image_1">
    <?php include 'shablon/navbar.php'; ?>
    <div class="container  d-flex justify-content-between">

    <div class="container d-flex justify-content-between  text-uppercase" id="block_photo">

      <div class="container" style="margin-bottom:50px">

    <section id="gallery">
    <div class="container">
      <div class="row">
        <?php
        foreach ($trips as  $value) {

         ?>
        <div class="col-lg-4 mb-4">
          <div class="card rounded-lg" style="background-color: rgba(255, 255, 255, 0.78); " >
        <img src="img/<?=$value['img']?>" alt=""  height="172"class="card-img-top" style="border-width: 1px;
        border-radius: 50px; width:90%; margin:5% auto">
        <div class="card-body font-weight-bold" style="font-family: 'Bebas-Roboto',Arial,sans-serif;">
          <h4 class="card-title "><?=$value['Имя']?></h5>
          <p class="card-text m-0"><?=$value['Детали']?></p>
          <p class="card-text  m-0">Цена:<?=$value['Цена']?>тг</p>
          <p class="card-text  m-0">Осталось <?=$value['Количество']?> мест</p>
          <p class="card-text  m-0">Категория:<?=$value['Категория']?></p>
          <a href="poezdki_add.php?id=<?=$value['id']?>" ><button  class="btn btn-outline-success btn-sm" data-target="myModalBox" data-toggle="modal">
          Добавить в корзину
        </button></a>
        </div>
        </div>
      </div>
    <?php } ?>


    </div>
  </div>
  </section>

<!--
  <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">

          <h4 class="modal-title" id="myModalLabel">Корзина</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Закрыть">
            <span aria-hidden="true">×</span>
          </button>
        </div>

        <div class="modal-body">
        <?php
        echo $_GET['id'];
        $trip=getTripById($_GET['id']);

        ?>
        <div class="card-body font-weight-bold" style="font-family: 'Bebas-Roboto',Arial,sans-serif;">
          <h4 class="card-title "><?=$trip['name']?></h5>
          <p class="card-text  m-0">Цена:<?=$trip['price']?>тг</p>
          <p class="card-text  m-0">Осталось <?=$trip['count']?> мест</p>
          <p class="card-text  m-0">Категория:<?=$trip['Категория']?></p>
          <a href="#?id='<?=$value['id']?>'" ><button  class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#submit">
          Добавить в корзину
        </button></a>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
          <a href=""><button type="button" class="btn btn-primary">Да</button>
        </div>
      </div>
    </div>
  </div> -->

  <!-- <div class="modal fade" id="submit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
        echo "<h1>".$_GET['id']."</h1>";
        $trip=getTripById();

        ?>
        <div class="card-body font-weight-bold" style="font-family: 'Bebas-Roboto',Arial,sans-serif;">
          <h4 class="card-title "><?=$trip['name']?></h5>
          <p class="card-text  m-0">Цена:<?=$trip['price']?>тг</p>
          <p class="card-text  m-0">Осталось <?=$trip['count']?> мест</p>
          <p class="card-text  m-0">Категория:<?=$trip['Категория']?></p>
          <a href="#?id='<?=$value['id']?>'" ><button  class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#submit">
          Добавить в корзину
        </button></a>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
  </div> -->
      </div>

      <div id="myModalBox" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Заголовок модального окна -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Заголовок модального окна</h4>
        </div>
        <!-- Основное содержимое модального окна -->
        <div class="modal-body">
          Содержимое модального окна...
        </div>
        <!-- Футер модального окна -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
          <button type="button" class="btn btn-primary">Сохранить изменения</button>
        </div>
      </div>
    </div>
  </div>




    </div>

  </div>

  <div class="container-fluid group1">




  </div>

  <script>
    $(document).ready(function() {
      $("#myModalBox").modal('show');
    });
    </script>

  <?php include 'shablon/footer.php'; ?>
