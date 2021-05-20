<?php require 'db.php'; ?>


 <?php
 if (isset($_POST)) {
 if(isset($_POST['name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['password'])  && isset($_POST['roles']) ){

   $newUsers['name']=$_POST['name'];
   $newUsers['surname']=$_POST['last_name'];
   $newUsers['email']=$_POST['email'];
   $newUsers['password']=$_POST['password'];
   $newUsers['roles']=$_POST['roles'];
   $newUsers['id']=$_POST['id'];

   if (updateUser($newUsers)) {


    header("Location:../admin_page.php?successupdate");

  } else {

		    header("Location:../admin_user_update.php?error");
  }

 }

 }
?>
