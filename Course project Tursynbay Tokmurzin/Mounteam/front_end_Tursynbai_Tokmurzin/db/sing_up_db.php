<?php
    require "db.php";
    if(isset($_POST)) {
        $name = trim($_POST['name']);
				$lastname = trim($_POST['last_name']);
				$password = trim($_POST['password']);
        $confirm_password = trim($_POST['confirm_password']);
        $email = trim($_POST['email']);
        echo $name." ".$lastname." ".$password." ".$confirm_password." ".$email;
        if($password != $confirm_password) {
              header("Location:../sing_up.php?errorpassword");
        }else
				{
            $user = getUsersByEmail($email);
            if($user == null) {
                $user['email'] = $email;
                $user['name'] = $name;
                $user['last_name'] = $lastname;
                $user['password'] = $password;
                $user['role_id']=2;
							  if(addUser($user)) {
                      header("Location:../sing_in.php?successreg");
                }
                else {
                      header("Location:../sing_up.php?registrationfail");
                }
            }
            else {
                  header("Location:../sing_up.php?errormail");
            }
        }
    }
?>
