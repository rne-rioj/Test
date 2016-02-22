<?php
	//====================================================================================================
	// Routine: login.php
	// Description: Log-in as an existing user (check username and password)
	// Author: Travis Gall
	// Create Date: 151012
	// Updates:
	// 151012 - Created [Travis Gall]
	//====================================================================================================

	$error = "";		// Blank error message

	$conn = mysqlConn($USER_DB);
	
	$username=$conn->real_escape_string(stripslashes($_POST[$LOGIN_USERNAME]));		// Clean username
	$password=$conn->real_escape_string(stripslashes($_POST[$LOGIN_PASSWORD]));		// Clean password
	
	// Find matching user (there should only be one match or zero matches)
	$sql = "SELECT * FROM $USER_ACCOUNTS_TABLE WHERE `username` = '$username' LIMIT 1";	// User query string
	$result = $conn->query($sql);													// User query results
	
	$error = "Username and/or Password are invalid";	// Default error message
	
	// Match found
	if ( $result->num_rows > 0 ) {
		$row = $result->fetch_assoc();		// Get row from database
		
		// Compare given password to hashed password
		if ( strcmp($row['hash'], crypt($password, $row['hash'])) == 0 ) {
			$_SESSION[$UID] = $row['id'];					// Update session information
			$_SESSION[$USER_ACCESS] = $row[$USER_ACCESS];	// Current user access level
			$error = "";									// Clear error message
		}
	}
	
	// Close MySQL connection
	$conn->close();
	
	unset($_SESSION[$PAGE]);
	header("location: index.php");
?>
