<?php
include 'shablon/header.php';
 ?>
 <div class="container-fluid image_1 " style="  background: url(img/Main.png) no-repeat ;background-size: cover;">
   <?php include 'shablon/navbar.php'; ?>

   <div class="container text-center d-flex align-items-center justify-content-center">

    <div class="signup-form">
        <form action="db/sing_up_db.php" method="post">
    		<h2>Регистрация</h2>
    		<p class="hint-text">Создайте свой аккаунт. Это бесплатно и займет несколько минут</p>

            <div class="form-group">
    			<div class="row">
    				<div class="col"><input type="text" class="form-control" name="name" placeholder="Имя" required="required"></div>
    				<div class="col"><input type="text" class="form-control" name="last_name" placeholder="Фамилия" required="required"></div>
    			</div>
            </div>
            <div class="form-group">
            	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
            </div>
    		<div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Пароль" required="required">
            </div>
    		<div class="form-group">
                <input type="password" class="form-control" name="confirm_password" placeholder="Повторите пароль" required="required">
            </div>

    		<div class="form-group">
                <button type="submit" class="btn btn-success btn-lg btn-block"> Зарегестрироваться</button>
            </div>
        </form>
    	<div class="text-center">У вас есть аккаунт? <a href="sing_in.php">Войти</a></div>
    </div>

  </div>


  <div class="container-fluid group1" style="margin-top:-500px;">

  </div>


  <?php include 'shablon/footer.php'; ?>
