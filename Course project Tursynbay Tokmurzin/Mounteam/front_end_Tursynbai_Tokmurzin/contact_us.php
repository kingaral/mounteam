<?php
include 'shablon/header.php';
session_start();
 ?>
  <!-- Nav bar -->
  <div class="container-fluid image_1">
    <?php include 'shablon/navbar.php'; ?>
    <div class="container  d-flex justify-content-between">

    </div>
    <div class="container d-flex justify-content-between  text-uppercase" >



<div class="cotact d-flex justify-content-between" style="width: 1200px; background-color: #6E9DC5" id="formandmaps">
   <form class="p-3" style="width: 50%" id="blockcontact" action="db/contact_us_db.php" method="post">
          <div class="text-center" style="color: #ffffff;font-size: 50px;font-family: 'Bebas-Roboto',Arial,sans-serif;line-height: 1.25;font-weight: 400;">Обратная связь</div>
          <div class="form-group">
            <label for="name">Имя</label>
          <input type="text" name="name" id="name" value="<?php if (isset($_SESSION['user'])) echo $_SESSION['user']['name']; ?>" placeholder="Ваше имя" class="form-control" required>
          </div>

           <div class="form-group">
            <label for="name">Номер телефона</label>
          <input type="text" name="phone" id="phone" placeholder="Ваш Номер" class="form-control" required>
          </div>

           <div class="form-group">
            <label for="name">Сообщение</label>
          <input type="text" name="message" id="message" placeholder="Ваше сообщение" class="form-control" required>
          </div>
          <div class="fade">
         <input type="text" name="id" value="<?php if(isset($_SESSION['user'])) echo $_SESSION['user']['id'];?>">
         </div>
         <?php
         if(isset($_GET['success'])){
           ?>
           <div class="alert alert-success" role="alert">
             Ваше сообщение успешно отправлено!
           </div>
           <?php
         }  ?>
         <?php
         if(isset($_GET['nouser'])){
           ?>
           <div class="alert alert-danger" role="alert">
             Чтобы отправить сообщение авторизуйтесь!
           </div>
           <?php
         }  ?>
          <button type="submit" class="btn btn-success">Отправить</button>



        </form>

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2906.776453341527!2d76.90755611538819!3d43.235146379137944!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3883692f027581ad%3A0x2426740f56437e63!2z0JzQtdC20LTRg9C90LDRgNC-0LTQvdGL0Lkg0YPQvdC40LLQtdGA0YHQuNGC0LXRgiDQuNC90YTQvtGA0LzQsNGG0LjQvtC90L3Ri9GFINGC0LXRhdC90L7Qu9C-0LPQuNC5!5e0!3m2!1sru!2skz!4v1616071901046!5m2!1sru!2skz" width="50%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" id="maps"></iframe>



</div>








    </div>
  </div>
  <div class="container-fluid image_2">
  </div>

  <div class="container-fluid group1">

    <div class="container  d-flex align-items-center justify-content-center mt-5 p-3">
<div class="m-5">
      <a style="margin-left: 26%;" href=""> <img src="img/free-icon-instagram-1384031.png" width="100"></a>
      <a class="m-3" href=""><img src="img/free-icon-whatsapp-1384023.png" width="100"> </a>
      <a href=""> <img src="img/free-icon-facebook-1077041.png" width="100"></a>
      <a class="m-3" href=""><img src="img/vk (1).png" width="120"> </a>

      <p style="color: #ffffff;font-size: 100px;font-family: 'Bebas-Roboto',Arial,sans-serif;line-height: 1.25;font-weight: 400;" class="text-center text-uppercase" >присоединяйтесь</p>
</div>


    </div>

  </div>





  <?php include 'shablon/footer.php'; ?>
