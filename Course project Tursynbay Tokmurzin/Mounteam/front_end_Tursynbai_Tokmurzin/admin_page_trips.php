<?php
include 'shablon/header.php';
require 'db/db.php';
session_start();
if (isset($_SESSION['admin'])) {

$trips=getAllTrips();
$id;
$name;
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
                    $keys=array_keys($trips[0]);
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
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase"> </div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase"> </div>
                  </th>
                </tr>
              </thead>
              <tbody>


                <?php

                foreach ($trips as  $value) {
                  foreach ($value as $key=>  $value2) {
                    if (gettype($key)== 'string') {

                    if ($key=='img'){

                           ?>
                              <td><img width="50" src="img/<?=$value['img']?>" alt=""></td>;

                           <?php
                         } else {?>
                    <th scope="row" class="border-0">
                        <div class="ml-3 d-inline-block align-middle">
                          <h5 class="mb-0 text-dark d-inline-block align-middle"><?=$value2?></h5>

                      </div>
                    </th>

                    <?php
                  }
                  }

                  }
                  $id=$value['id'];
                  $name=$value['??????'];
                  echo ' <td  class="align-middle"> <a href="admin_trip_update.php?id='.$value['id'] .'"><button  type="button" class="btn btn-success">EDIT</button></a></td>';
                  echo '<td class="align-middle "><a href="#?id='.$value['id'] .'"><button type="button" class="btn btn-primary btn-danger" data-toggle="modal" data-target="#delete">
                  ??????????????
                </button></a></td>
                ';

                echo '</tr></tbody>';
                }
                 ?>

                </tr>
              </tbody>
            </table> <br>
            <a href="admin_add_trip.php"><button  type="button" class="btn btn-success">???????????????? ??????????????</button></a>;
          </div>

        </div>
      </div>

      <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">

              <h4 class="modal-title" id="myModalLabel">???? ?????????????? ?????? ???????????? ?????????????</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="??????????????">
                <span aria-hidden="true">??</span>
              </button>
            </div>

            <div class="modal-body">
              ?????????????? ????????????????????????
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">??????????????</button>
              <a href="db/admin_trips_delete.php?id=<?=$_GET['id']?>"><button type="button" class="btn btn-primary">????</button>
            </div>
          </div>
        </div>
      </div>

      <div id="successdelete" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">??????????</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
              </div>
                <div class="modal-body">
                  ?????????????? ??????????????!
                </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">??????????????</button>
                    </div>
                  </div>
          </div>
        </div>
        <div id="successupdate" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">??????????</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
                </div>
                  <div class="modal-body">
                    ?????????????? ??????????????????!
                  </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">??????????????</button>
                      </div>
                    </div>
            </div>
          </div>




    </div>
  </div>
</div>










    </div>
  </div>


 <script>
  <?php
  if (isset($_GET['successdelete'])) { ?>
    $(document).ready(function() {
      $("#successdelete").modal('show');
    });
    <?php
    }elseif (isset($_GET['successupdate'])) { ?>
      $(document).ready(function() {
        $("#successupdate").modal('show');
      });
      <?php

    }

         ?>
  </script>

  <?php include 'shablon/footer.php';
}
else {
  header("Location:index.php");
}?>
