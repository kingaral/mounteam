<?php require 'db.php'; ?>


 <?php
 if (isset($_POST)) {
 if(isset($_POST['name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['password'])  ){

   $newUsers['name']=$_POST['name'];
   $newUsers['surname']=$_POST['last_name'];
   $newUsers['email']=$_POST['email'];
   $newUsers['password']=$_POST['password'];
   $newUsers['roles']=2;
   $newUsers['id']=$_POST['id'];

   if (updateUser($newUsers)) {


    header("Location:../user_profile.php?successupdate");

  } else {

		    header("Location:../user_profile.php?error");
  }

 }

 }
?>
