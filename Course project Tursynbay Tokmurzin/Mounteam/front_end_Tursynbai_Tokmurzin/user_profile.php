<?php
include 'shablon/header.php';
require 'db/db.php';

session_start();
if (isset($_SESSION['user'])) {
$user=isset($_SESSION['user']);
 ?>

  <div class="container-fluid image_1">
    <?php include 'shablon/navbar.php'; ?>

    <div class="px-4 px-lg-0">


      <div id="update" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Профиль</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              </div>
                <div class="modal-body">
                  <div class="container">

                  <form action="db/user_update_db.php" method="post">
              		<p class="hint-text"></p>

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

        <div id="successupdate" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Успшно обнавлено</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                  <div class="modal-body">
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
 <?php if(isset($_GET['successupdate'])){
?>
$(document).ready(function() {
  $("#successupdate").modal('show');
});


<?php
 }else{ ?>
    $(document).ready(function() {
      $("#update").modal('show');
    });
<?php } ?>
  </script>

  <?php include 'shablon/footer.php';
}
else {
  header("Location:index.php");
}
