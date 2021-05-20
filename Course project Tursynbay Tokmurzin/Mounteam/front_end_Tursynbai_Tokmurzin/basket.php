<?php
include 'shablon/header.php';
require 'db/db.php';
$basket=unserialize($_COOKIE['basket']);
 ?>
  <!-- Nav bar -->
  <div class="container-fluid image_1">
    <?php include 'shablon/navbar.php'; ?>

    <div class="px-4 px-lg-0">
  <!-- For demo purpose -->

  <!-- End -->

  <div class="pb-5 mt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-5 rounded shadow-sm mb-5" style="background-color: white; opacity: 0.96">

          <!-- Shopping cart table -->
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Поездки</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Стоимость</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Вы берете</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Осталось</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase"></div>
                  </th>
                </tr>
              </thead>
              <?php
              for ($i=0; $i < count($basket) ; $i++) {
                  for ($j=$i+1; $j < count($basket) ; $j++) {
                    if ($basket[$i]['id']==$basket[$j]['id']) {
                    $basket[$i]['count']+=$basket[$j]['count'];
                    $basket[$j]=null;
                  }
                }
                }





              $sum=0;

              foreach ($basket as $value) {
                if($value!=null){
                $trip=getTripById($value['id']);
                ?>
                <tbody>
                  <tr>
                    <th scope="row" class="border-0">
                      <div class="p-2">
                        <img src="img/<?=$trip['img']?>" alt="" width="100" class="img-fluid rounded shadow-sm">
                        <div class="ml-3 d-inline-block align-middle">
                          <h5 class="mb-0 text-dark d-inline-block align-middle"><?=$trip['name']?></h5>
                      </div>
                    </th>
                    <td class="border-0 align-middle"><strong><?=$trip['price']?>тг</strong></td>
                    <?php if($value['count']>$trip['count']) $value['count']=$trip['count'];  ?>
                    <td class="border-0 align-middle"><strong><?=$value['count']?> билетов</strong></td>
                    <td class="border-0 align-middle"><strong><?=$trip['count']?> билетов</strong></td>
                    <td class="border-0 align-middle"><a href="basket.php?id=<?=$trip['id']?>"><button type="button" class="btn btn-danger">Удалить</button></td>

                  </tr></tbody>
              <?php
              $sum+=$trip['price']*$value['count'];
              }}
               ?>
               <td class="border-0 align-middle"><strong></strong></td>
              <td class="border-0 align-middle"><strong></strong></td>
              <td class="border-0 align-middle "><strong>Общая сумма <?=$sum?> тг</strong></td>
            <td class="border-0 align-middle"><a href="db/buy_ticket.php"><button type="button" class="btn btn-success">Купить</button></a></td>
            </table>
          </div>

        </div>
      </div>



    </div>
  </div>
</div>




<div id="submit" class="modal fade" aria-labelledby="exampleModalCenterTitle" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Сколько билетов нужно удалить?</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
          <form method="get" action="db/delete_from_basket_db.php">
          <?php
          foreach ($basket as $value) {
            if ($value!=null && $value['id']==$_GET['id']) {
              echo '<select class="" name="count">';
              for ($i=0; $i <= $value['count']; $i++) {
                echo "<option value=".$i.">".$i."</option>";
              }
              echo "</select>";
            }
          }
          ?>
          <div class="fade">
            <input type="text" name="id" value="<?=$_GET['id']?>">
          </div>
          <button  class="btn btn-outline-success btn-sm" type="submit">
          Удалить
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
    </div>
  </div>
</div>
</div>








    </div>
  </div>




  <?php include 'shablon/footer.php'; ?>


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
