<?php
require_once "../../../../db_connect.php";
include 'login_header.php';

if (isset($_POST['email'], $_POST['user'], $_POST['p'])) {
	$email = $_POST['email'];
	$user_name = $_POST['user'];
	$password = $_POST['p'];
	
	$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
	
	$password = hash('sha512', $password.$random_salt);
	
	if ($stmt = $mysqli->prepare("INSERT INTO members (user, email, password, salt) VALUES (?, ?, ?, ?)")) {
		$stmt->bind_params('ssss', $user_name, $email, $password, $random_salt);
		$stmt->execute();
		echo "Registration complete";
		if (isset($_SERVER['HTTP_REFERER'])) {
			$ref_url = $_SERVER['HTTP_REFERER'];
			header("Location: $ref_url");
			exit();
		}
	} 
} else {
	//improper form
	echo "Registration incomplete.  check parameters";
}
?>