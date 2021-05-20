<?php
include 'shablon/header.php';
require 'db/db.php';

session_start();
if (isset($_SESSION['admin'])) {

 ?>

  <div class="container-fluid image_1">
    <?php include 'shablon/navbar.php'; ?>

    <div class="px-4 px-lg-0">


      <div id="update" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Обновить данные</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              </div>
                <div class="modal-body">
                  <div class="container">
                    <?php
                    $user=getUsersById($_GET['id']);
                     ?>
                  <form action="db/admin_user_update_db.php" method="post">
              		<p class="hint-text">Отредактируйте</p>

                      <div class="form-group">
              			<div class="row">
              				<div class="col"><input type="text" class="form-control" value="<?=$user['name']?>" name="name" placeholder="Имя" required="required"></div>
              				<div class="col"><input type="text" value="<?=$user['surname']?>" class="form-control" name="last_name" placeholder="Фамилия" required="required"></div>
              			</div>
                      </div>
                      <div class="form-group">
                      	<input type="email" class="form-control" name="email" value="<?=$user['email']?>" placeholder="Email" required="required">
                      </div>
              		<div class="form-group">
                          <input  class="form-control" name="password" value="<?=$user['password']?>" placeholder="Пароль" required="required">
                  </div>
                  <div class="form-group">
                    <select name="roles"  class="form-control">
                    <?php

                    $roles = getRoles();
                        if($roles!=null)
                      foreach ($roles as $value) {
                            if ($value['name']!=$user['name'])
                            {
                    					echo "<option value=".$value['id'].">".$value['name']."</option>";
                          }
                          elseif ($value['name']==$user['name']) {
                            echo "<option selected value=".$value['id'].">".$value['name']."</option>";
                          }
                          }

                           ?>

                    </select>
                  </div>
                  <div class="fade">
                    <input type="text" name="id" value="<?=$user['id']?>">
                  </div>
              		<div class="form-group">
                          <button type="submit" class="btn btn-success btn-lg btn-block"> Обновить</button>
                      </div>
                  </form>
                </div>
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


 <script>
  <?php
  if (isset($_GET['id'])) { ?>
    $(document).ready(function() {
      $("#update").modal('show');
    });
    <?php

        }

         ?>
  </script>

  <?php include 'shablon/footer.php';
}
else {
  header("Location:index.php");
}
