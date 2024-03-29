<!DOCTYPE html>
<?php 
error_reporting(E_ALL); 
ini_set('display_errors', 1);?>
<html manifest='tvb.appcache'>
<head>
	<meta charset="UTF-8">
	<title>Tim van Boxtel</title>
	<link rel='stylesheet' type='text/css' href='css/jquery-ui-1.9.0.custom.css'>
	<script src="js/jquery-1.8.2.js"></script>
	<script src="js/jquery-ui-1.9.0.custom.js"></script>
	<script src='js/sha512.js'></script>
	<script type='text/javascript' src='js/tvb_main.js'></script>
	<link rel="stylesheet" type='text/css' href="./css/style.css">
</head>
<body> 

<div class='main'>
		
	<ul class='menu'>
		<li id='li_home'><a href='#'>Home</a></li>
		<li id='li_blog'><a href='wp/'>Blog</a></li>
		
		<li id='li_projects'><a href='#'>Projects</a></li>
		
		<li id='li_history'><a href='#'>CV</a></li>
		<li id='li_contact'><a href='&#109;&#97;&#105;&#108;&#116;&#111;&#58;&#105;&#110;&#102;&#111;&#64;&#118;&#97;&#110;&#98;&#111;&#120;&#116;&#101;&#108;&#46;&#99;&#97;'>&#67;&#111;&#110;&#116;&#97;&#99;&#116;</a></li>
	</ul>
	

	<div id="content_home" class='content'>
		<h1>Welcome</h1>
		<p>This is my interface to the web.  Check out the stuff that may or may not be available</p>
	</div>
		
	<div id="content_blog" class='content'>
		<h1>Blog</h1>
		<p>Where I jot down notes or rants I feel need to be set free</p>
	</div>
	
	<div id="content_projects" class='content'>
		<h1>Projects</h1>
		<p>A collection of projects I have documented</p>
	</div>
	
	<div id="content_history" class='content'>
		<h1>CV</h1>
		<p>My web cv, detailing academic and professional experience</p>
	</div>
	
	<div id="content_contact" class='content'>
		<h1>Contact Me</h1>
		<p>Feel free to send an email to <a href='&#109;&#97;&#105;&#108;&#116;&#111;&#58;&#105;&#110;&#102;&#111;&#64;&#118;&#97;&#110;&#98;&#111;&#120;&#116;&#101;&#108;&#46;&#99;&#97;'>&#105;&#110;&#102;&#111;&#64;&#118;&#97;&#110;&#98;&#111;&#120;&#116;&#101;&#108;&#46;&#99;&#97;</a></p>
	</div>
	
	
	<div id="copyright">
		&copy; 2012 Tim van Boxtel
	</div>
</div>

<div id='bg_credit'><i>Aurora Image Credit: NASA</i></div>
<div><a class='dev_login' href='#'>Dev. Login</a></div>
<div id='login' class='login' title='Login' style='display: none'>
	<form id='login_form' action='php/process_login.php' method='post' name='login_form'>
		<label class='label_login'><p>Email:</p>
		<input type='email' id='email'/></label>
		<label class='label_login'><p>Password:</p>
		<input type='password' id='password'/></label>
		<button type='submit' onclick='formhash(this.form, this.form.password);'>Submit</button>
	</form>
</div>
</body>
</html>
