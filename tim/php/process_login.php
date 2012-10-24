<?php
include db_connect.php;
include common.php;

secure_session_start();

if (isset($_POST['email'], $_POST['p'])) {
	$email = $_POST['email'];
	$password = $_POST['p'];
	
	if (login($email, $password, $mysqli) == true) {
		echo "Login Success";
	} else {
		echo "Login failed";
	}
	
} else {
	echo 'Invalid request';
}
?>