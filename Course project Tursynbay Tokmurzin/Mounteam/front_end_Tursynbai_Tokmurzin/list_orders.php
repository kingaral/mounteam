<?php
include 'shablon/header.php';
require 'db/db.php';
session_start();
if (isset($_SESSION['admin'])) {
$ticket=getAllTickets();

 ?>

  <div class="container-fluid image_1">
    <?php include 'shablon/navbar.php'; ?>

    <div class="px-4 px-lg-0">


  <div class="pb-5 mt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-5 rounded shadow-sm mb-5" style="background-color: white; opacity: 0.96">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <?php
                    $keys=array_keys($ticket[0]);
                    foreach ($keys as  $value) {
                        if (gettype($value)== 'string') {
                        echo '
                         <th scope="col" class="border-0 bg-light">
                           <div class="p-2 px-3 text-uppercase">'.$value.'</div>
                         </th>
                         ';
                       }
                    }


                    ?>

                </tr>
              </thead>
              <tbody>


                <?php
                $sum=0;
                foreach ($ticket as  $value) {
                  foreach ($value as $key=>  $value2) {
                    if (gettype($key)== 'string') {
                    ?>
                    <th scope="row" class="border-0">
                        <div class="ml-3 d-inline-block align-middle">
                          <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle"><?=$value2?></a></h5>

                      </div>
                    </th>

                    <?php
                  }
                  }

                echo '</tr></tbody>';
                $sum+=$value['Цена']*$value['Вы_купили'];
                }
                 ?>

                </tr>
              </tbody>
              <td class="border-0 align-middle"><strong></strong></td>
             <td class="border-0 align-middle"><strong></strong></td>
             <td class="border-0 align-middle "><strong>Общая сумма <?=$sum?> тг</strong></td>
            </table><br>
          </div>

        </div>
      </div>



    </div>
  </div>
</div>












    </div>





  <?php include 'shablon/footer.php'; ?>

<?php } ?>
