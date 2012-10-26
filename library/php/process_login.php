<?php
include 'db_connect.php';
include 'common.php';

secure_session_start();

if (isset($_POST['email'], $_POST['p'])) {
	$email = $_POST['email'];
	$password = $_POST['p'];
	
	if (login($email, $password, $mysqli) == true) {
		echo "Login Success";
		header('Location: ./dev/');
	} else {
		//Login failed, go back to where you came from
		if (isset($_SERVER['HTTP_REFERER'])) {
			$ref_url = $_SERVER['HTTP_REFERER'];
			header("Location: $ref_url");
			exit;
		} else {
			echo "Login Failed";
		}
	}
	
} else {
	//Login failed, go back to where you came from
	if (isset($_SERVER['HTTP_REFERER'])) {
		$ref_url = $_SERVER['HTTP_REFERER'];
		header("Location: $ref_url");
		exit;
	} else {
	echo 'Invalid request';
	}
}	
?>