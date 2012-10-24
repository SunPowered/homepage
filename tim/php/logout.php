<?php
include 'common.php';

secure_session_start();

$_SESSION = array();

$cookie_params = session_get_cookie_params();

setcookie(session_name(), "", time()-42000, $cookie_params['path'], $cookie_params['domain'], $cookie_params['secure'], $cookie_params['http_only']);

session_destroy();

header('Location: ./');
?>