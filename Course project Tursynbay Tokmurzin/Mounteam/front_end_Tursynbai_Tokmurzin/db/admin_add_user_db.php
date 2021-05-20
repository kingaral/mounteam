<?php
    require "db.php";
    if(isset($_POST)) {
        $name = trim($_POST['name']);
				$lastname = trim($_POST['last_name']);
				$password = trim($_POST['password']);
        $email = trim($_POST['email']);
        $role=trim($_POST['roles']);
          $user = getUsersByEmail($email);
            if($user == null) {
                $user['email'] = $email;
                $user['name'] = $name;
                $user['last_name'] = $lastname;
                $user['password'] = $password;
                $user['role_id']=$role;
							  if(addUser($user)) {
                      header("Location:../admin_page.php");
                }
            }
            else {
                  header("Location:../admin_page.php?havemail");
            }

    }
?>
