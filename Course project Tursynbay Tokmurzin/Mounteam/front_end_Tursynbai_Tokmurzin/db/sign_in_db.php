<?php
require "db.php";
session_start();
if(isset($_POST)) {
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);
  $user=getUsersByEmail($email);
  if ($user!=null) {
      if ($user['password'] == $password) {
          if($user['role_id'] == 1) {
              $_SESSION['admin'] = $user;
              header("Location:../index.php");
          }
          else if($user['role_id'] == 2){
              $_SESSION['user'] = $user;
              header("Location:../index.php");
      }
    }
      else header("Location:../sign_in.php?errorpassword");
  } else   header("Location:../sing_in.php?erroremail");

}

?>
