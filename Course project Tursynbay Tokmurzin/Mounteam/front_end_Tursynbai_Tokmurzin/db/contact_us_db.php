<?php
require 'db.php';

if (isset($_POST)) {
		if (isset($_POST['id']) &&  isset($_POST['phone']) &&  isset($_POST['message'])) {
			$message['user_id'] = $_POST['id'];
			$message['phone'] = $_POST['phone'];
			$message['message'] = $_POST['message'];
			if (addMessage($message)) {
				  header("Location:../contact_us.php?success");
			}
		}
		if (isset($_POST['id']) == false){
			header("Location:../contact_us.php?nouser");

		}
}
?>
