<?php
session_start();?>
<nav class="navbar navbar-expand-lg navbar-dark" style="margin-left:10%;margin-right: 10%;">
  <div class="container">
    <a class="navbar-brand" href="#"><img mg src="img/Logo.svg" width=130 height=130 alt="" class="img-rounded center-block"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="true" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarsExample07" style="">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php"style="font-family: 'Bebas-Roboto',Arial,sans-serif;color: #ffffff;font-size: 30px;line-height: 1.55;" href="#">Главная <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="poezdki.php" style="font-family: 'Bebas-Roboto',Arial,sans-serif;color: #ffffff;font-size: 30px;line-height: 1.55;" href="#" href="#">Поездки</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="otzyv.php" style="font-family: 'Bebas-Roboto',Arial,sans-serif;color: #ffffff;font-size: 30px;line-height: 1.55;" href="#" href="#">Отзывы</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="font-family: 'Bebas-Roboto',Arial,sans-serif;color: #ffffff;font-size: 30px;line-height: 1.55;" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Больше</a>
          <div class="dropdown-menu" aria-labelledby="dropdown07">
            <a class="dropdown-item" href="contact_us.php">Контакты</a>
            <a class="dropdown-item" href="basket.php">Корзина</a>
          </div>
        </li>
       </ul>
       <?php
       if(isset($_SESSION['user'])) {
           $user = $_SESSION['user'];
   ?>

       <div class="dropdown">
     <a class="nav-link dropdown-toggle" style="font-family: 'Bebas-Roboto',Arial,sans-serif;color: #ffffff;font-size: 30px;line-height: 1.55;" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Привет <?=$user['name']?></a>
     <div class="dropdown-menu text-center justify-content-center" style="background-color: rgba(0, 125, 215, 0.0);border:none;  " aria-labelledby="dropdownMenu2">

       <a href="user_profile.php" class="btn btn-primary p-2 m-3" id="buttonorder" role="button" aria-pressed="true">Профиль</a>
     <a href="history.php" class="btn btn-primary p-2 m-3" id="buttonorder" role="button" aria-pressed="true">История заказов</a>
     <a href="db/log_out.php" class="btn btn-primary p-2 m-3" id="buttonorder" role="button" aria-pressed="true">Выйти</a>

     </div>
     </div>


   <?php
       }else if(isset($_SESSION['admin'])) {
           $admin = $_SESSION['admin'];
   ?>
   <div class="dropdown">
 <a class="nav-link dropdown-toggle" style="font-family: 'Bebas-Roboto',Arial,sans-serif;color: #ffffff;font-size: 30px;line-height: 1.55;" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Привет <?=$admin['name']?></a>
 <div class="dropdown-menu text-center justify-content-center" style="background:none;border:none;  " aria-labelledby="dropdownMenu2">

 <a href="admin_page.php" class="btn btn-primary p-2 m-3" id="buttonorder" role="button" aria-pressed="true">Пользователи</a>
 <a href="admin_page_trips.php" class="btn btn-primary p-2 m-3" id="buttonorder" role="button" aria-pressed="true">Поездки</a>
 <a href="admin_message.php" class="btn btn-primary p-2 m-3" id="buttonorder" role="button" aria-pressed="true">Письма</a>
 <a href="list_orders.php" class="btn btn-primary p-2 m-3" id="buttonorder" role="button" aria-pressed="true">Доход</a>
 <a href="db/log_out.php" class="btn btn-primary p-2 m-3" id="buttonorder" role="button" aria-pressed="true">Выйти</a>

 </div>
 </div>
   <?php
       }
       else {

       ?>
       <a href="sing_in.php" class="btn btn-primary p-2 mr-3" id="buttonorder" role="button" aria-pressed="true">Вход</a>

     <?php } ?>





    </div>
  </div>
</nav>
