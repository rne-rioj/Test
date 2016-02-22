<?php
	$conn = mysqlConn($USER_DB);
	
	// Generate hash from password
	$cost = 10;
	$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
	$salt = sprintf("$2a$%02d$", $cost) . $salt;	// Blowfish
	$hash = crypt($password, $salt);

	$sql = "INSERT INTO `user_accounts` (`access_id`, `username`, `hash`) VALUES (99, '$username', '$hash')";
	$conn->query($sql);
	$conn->close();
	
	header("location: index.php");
?>
