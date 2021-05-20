<?php
require 'db.php';

if (isset($_GET['id'])) {
  if (deleteTrip($_GET['id'])) {
      header("Location:../admin_page_trips.php?successdelete");
  }

}

?>
