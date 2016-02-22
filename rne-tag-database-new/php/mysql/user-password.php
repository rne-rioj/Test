<?php
	// Establish connection to user database
	//session_start();
	$conn = mysqlConn($USER_DB);
	
	die($_POST[$USER_CHANGE_PASSWORD]);
	
	// Generate hash from password
	$cost = 10;
	$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
	$salt = sprintf("$2a$%02d$", $cost) . $salt;	// Blowfish
	$hash = crypt($_POST[$USER_CHANGE_PASSWORD], $salt);
	
	// Modify
	$sql = "UPDATE `user_accounts` SET `hash` = $hash WHERE `id` = " . $SESSION[$UID];
	$conn->query($sql);
	$conn->close();
	
	header("location: index.php");
?>
