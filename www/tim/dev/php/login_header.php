<?php
require_once '../../../lib/php/db_connect.php';
require '../../../lib/php/common.php';

secure_session_start();

if (!login_check($mysqli)) {
	//http_response_code(403);
	header('Location: ./e_403_unauthorized.html');
	exit();
}
?>