<?php

   	include('../config/config.inc.php');
	include('../init.php');



	if (isset($_POST['post_like']) && !isset($_COOKIE['rating-mirjan'])) {

		Db::getInstance()->ExecuteS("UPDATE ratings SET likes=likes+1,total_votes=total_votes+1");

		$cookie_name = "rating-mirjan";
		$cookie_value = "Like";
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

	}


	elseif (isset($_POST['post_dislike']) && !isset($_COOKIE['rating-mirjan'])) {

		Db::getInstance()->ExecuteS("UPDATE ratings SET dislike=dislike+1,total_votes=total_votes+1");

		$cookie_name = "rating-mirjan";
		$cookie_value = "Dislike";
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

	}

	else {

		echo "You already rated this.";

	}


	if(isset($_POST['post_email'])) {

		function died() {
			echo "One of the inputs cannot be empty.";
			die();
		}

		if(!isset($_POST['post_email']) || !isset($_POST['post_message'])) {
			died();       
		}

		$email_from = $_POST['post_email'];

		$to      = 'milosz.sulkowski@mirjan24.com';
		$subject = 'T30 - nieprzydatnosc';
		$message = $_POST['post_message'];
		$headers = 'From: '.$email_from."\r\n".
		'Reply-To: '.$email_from."\r\n" .
		'X-Mailer: PHP/' . phpversion();
		mail($to, $subject, $message, $headers);
	}