<?php
require 'db.php';

if (isset($_GET['id'])) {
  if (deleteUser($_GET['id'])) {
      header("Location:../admin_page.php?successdelete");
  }

}

?>
