<?php
	// Establish connection to user database
	$conn = mysqlConn($USER_DB);
	
	// Generate hash from password
	$cost = 10;
	$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
	$salt = sprintf("$2a$%02d$", $cost) . $salt;	// Blowfish
	$hash = crypt($_SESSION[$USER_CHANGE_PASSWORD], $salt);
	
	// Modify
	$sql = "UPDATE `user_accounts` SET `hash` = '$hash' WHERE `id` = '" . $_SESSION[$UID] . "'";
	//echo $_SESSION[$USER_CHANGE_PASSWORD];
	//echo "<script> console.log('" . $_SESSION[$USER_CHANGE_PASSWORD] ."'); </script>";
	
	die();
	
	$conn->query($sql);
	$conn->close();
	
	
	unset($_SESSION[$PAGE]);
	header("location: index.php");
?>
