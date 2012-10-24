<?php
function secure_session_start() {
	$session_id = 'sunpowered_session';
	$secure = false;
	$http_only = true;
	
	init_set('session.use_only_cookies', 1);
	$cookie_params = session_get_cookies_params();
	session_set_cookies_params($cookie_params['lifetime'], $cookie_params['path'], $cookie_params['domain'], $secure, $http_only);
	session_name($session_id);
	session_start();
	session_regenerate_id(true);
}

function login($email, $password, $mysqli) {
	if ($stmt = $mysqli->prepare("SELECT id, user, password, salt FROM members WHERE email = ? LIMIT 1")){
		$stmt->bind_params('s', $email);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bin_result($user_id, $user_name, $db_password, $db_salt);
		$stmt->fetch();
		$password = hash('sha512', $password.$db_salt);
		
		if ($stmt->num_rows == 1){
			if ($db_password == $password) {
				//all good
				$ip_address = $_SERVER['REMOTE_ADDR'];
				$user_agent = $_SERVER['HTTP_USER_AGENT'];
				
				$user_id = preg_replace('/[^0-9]+/', "", $user_id);
				$_SESSION['user_id'] = $user_id;
				
				$user_name = preg_replace('/[^a-zA-Z0-9_/-]+/', "", $user_name);
				$_SESSION['user_name'] = $user_name;
				
				$_SESSION['login_string'] = hash('sha512', $password.$ip_address.$user_agent);
				
				return true;
			} else {
				//wrong password
				$now = time();
				$mysqli->query("INSERT INTO failed_logins ('time_stamp, 'user) VALUES ('$now', '$user_id')");
				return false;
			} 
		} else {
			//no user exists
			return false;	
		}
	}
}

function login_check($mysqli) {
	if (isset($_SESSION['user_id'], $_SESSION['user_name'], $_SESSION['login_string'])) {
		$user_id = $_SESSION['user_id'];
		$user_name = $_SESSION['user_name'];
		$login_string = $_SESSION['login_string'];
		$ip_address = $_SERVER['REMOTE_ADDR'];
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		
		
		if ($stmt = $mysqli->prepare("SELECT password FROM members WHERE id = ? LIMIT 1")) {
			$stmt->bind_params('s', $user_id);
			$stmt->execute();
			$stmt->store_result();
			
			if ($stmt->num_rows == 1) {
				$stmt->bind_result($password);
				$stmt->fetch();
				
				$login_check = hash('sha512', $password.$ip_address.$user_agent);
				if ($login_check == $login_string) {
					//all good
					return true;
				} else {
					// different password, ip address, or user agent
					return false;
				}
			} else {
				// no user found
				return false;
			}
		} else {
			//not logged in
			return false;
		}
	} else {
		//no session
		return false;
	}
}
?>