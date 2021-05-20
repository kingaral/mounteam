<?php require 'db.php';

 if (isset($_POST)) {
   $name = trim($_POST['name']);
   $details = trim($_POST['details']);
   $price = trim($_POST['price']);
   $count = trim($_POST['count']);
   $category = trim($_POST['category']);
   $id=trim($_POST['id']);
   $trips['name'] =$name;
   $trips['details'] =$details;
   $trips['price'] =$price;
   $trips['count'] =$count;
   $trips['category'] =$category;
   $trips['id']=$id;

   if (updateTrip($trips)) {


    header("Location:../admin_page_trips.php?successupdate");

  } else {

		    header("Location:../admin_trip_update.php?error");
  }

 }


?>
