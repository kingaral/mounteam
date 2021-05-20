<?php
require "db.php";
if(isset($_POST) && isset($_FILES['image'])) {

    $name = trim($_POST[' name']);
    $details = trim($_POST['details']);
    $price = trim($_POST['price']);
    $count = trim($_POST['count']);
    $category = trim($_POST['category']);
            $img_name = $_FILES['image']['name'];
            $img_size = $_FILES['image']['size'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $error = $_FILES['image']['error'];

            if ($error == 0) {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc =  strtolower($img_ex);
                $allowed_exs = array("jpg", "jpeg", "png");


                    $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
                    $img_upload_path = $new_img_name;
                    move_uploaded_file($tmp_name, "../img/".$new_img_name);

                    $trips['name'] =$name;
                    $trips['details'] =$details;
                    $trips['price'] =$price;
                    $trips['count'] =$count;
                    $trips['category'] =$category;
                    $trips['img'] =$new_img_name;

                    if(addTrip($trips)) {
                          header("Location:../admin_page_trips.php");
                    }
                    else {
                        header("Location:../admin_add_trip.php");
                    }
                }
        }



?>
