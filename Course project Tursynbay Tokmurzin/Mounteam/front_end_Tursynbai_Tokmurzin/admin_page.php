<?php
include 'shablon/header.php';
require 'db/db.php';
session_start();
if (isset($_SESSION['admin'])) {

$users=getAllUsers();

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
                    $keys=array_keys($users[0]);
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

                foreach ($users as  $value) {
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
                  echo ' <td> <a href="admin_user_update.php?id='.$value['id'] .'"><button  type="button" class="btn btn-success">EDIT</button></a></td>';

                  echo '<td class="align-middle "><a href="admin_page.php?id='.$value['id'] .'"><button type="button" class="btn btn-primary btn-danger" data-toggle="modal" data-target="#delete">
                  Удалить
                </button></a></td>
                ';

                echo '</tr></tbody>';
                }
                 ?>

                </tr>
              </tbody>
            </table><br>
            <a href="admin_add_user.php"><button  type="button" class="btn btn-success">Добавить полтзователя</button></a>;
          </div>

        </div>
      </div>

      <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">

              <h4 class="modal-title" id="myModalLabel">Вы уверены что хотите удлить?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Закрыть">
                <span aria-hidden="true">×</span>
              </button>
            </div>

            <div class="modal-body">
              Удалить пользователя
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
              <a href="db/admin_user_delete_db.php?id=<?=$_GET['id']?>"><button type="button" class="btn btn-primary">Да</button>
            </div>
          </div>
        </div>
      </div>

      <div id="successdelete" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Успех</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              </div>
                <div class="modal-body">
                  Успешно удалено!
                </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    </div>
                  </div>
          </div>
        </div>
        <div id="successupdate" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Успех</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                  <div class="modal-body">
                    Успешно Обновлено!
                  </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                      </div>
                    </div>
            </div>
          </div>
          <div id="havemail" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Успех</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                    <div class="modal-body">
                      Пользователь уже существует!
                    </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
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

    }elseif (isset($_GET['havemail'])) { ?>
            $(document).ready(function() {
              $("#havemail").modal('show');
            });
            <?php

                }
                elseif (isset($_GET['id'])) { ?>
                        $(document).ready(function() {
                          $("#delete").modal('show');
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
