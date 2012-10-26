<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'php/login_header.php'?>
<!DOCTYPE HTML>
<html>
<head>
<link rel='stylesheet' type='text/css' href='css/base.css'>
</head>
<body>
	Congrats, you are now logged in.  <a href='php/logout.php'>Logout</a>
	<div>
	<form title='Register New User' method='post' action='php/register.php'>
		<label>Username: <input type='text' name='user'></label>
		<label>Email:<input type='text' name='email'></label>
		<label>Password:<input type='password' name='p'></label>
		<button type='submit'>Submit</button>
	</form>
	</div>
</body>
</html>