<?php
include 'shablon/header.php';
 ?>
  <div class="container-fluid image_1 " style="  background: url(img/Main.png) no-repeat ;background-size: cover;">
    <?php include 'shablon/navbar.php'; ?>

    <div class="container text-center d-flex align-items-center justify-content-center">

  <form class="form-signin" action="db/sign_in_db.php" method="post">
    <img class="mb-4" src="img/Logo.svg" alt="" width="150" height="150">
    <h1 class="h3 mb-3 " style="font-weight: 900;">Aвторизация</h1>
    <label  class="sr-only">Email address</label>
    <input type="email" id="inputEmail" name="email" class="form-control mb-3" placeholder="Email address" required="" autofocus="">
    <label for="inputPassword" class="sr-only">Пароль</label>
    <input type="password" name="password" class="form-control mb-3" placeholder="Password" required="">

    <button class="btn btn-lg btn-primary btn-block" type="submit" style="font-weight: 900;">Вход</button>
    <p class="mt-1">Нету аккаунта?
<a href="sing_up.php">Зарегестрируйтесь</a></p>
  </form>
  </div>
  </div>
  <div class="container-fluid group1" style="margin-top:-500px;">
  </div>
  <div id="successreg" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Успех</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
            <div class="modal-body">
              Успешно зарегестрировались!
            </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Выполнить вход</button>
                </div>
              </div>
      </div>
    </div>
  <div id="errormail" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Успех</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
              <div class="modal-body">
                Такого логина нету
              </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Выполнить вход</button>
                  </div>
                </div>
        </div>
      </div>
  <div id="errorpassword" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Успех</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                  <div class="modal-body">
                    Пароль неверный
                  </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Выполнить вход</button>
                      </div>
                    </div>
            </div>
          </div>



  <script>
   <?php
   if (isset($_GET['successreg'])) { ?>
     $(document).ready(function() {
       $("#successreg").modal('show');
     });
     <?php

   }elseif (isset($_GET['errormail'])) {
     ?>
      $(document).ready(function() {
        $("#errormail").modal('show');
      });
      <?php
   }
   elseif (isset($_GET['errorpassword'])) {
     ?>
      $(document).ready(function() {
        $("#errorpassword").modal('show');
      });
      <?php
   }

         ?>
   </script>


  <?php include 'shablon/footer.php'; ?>
