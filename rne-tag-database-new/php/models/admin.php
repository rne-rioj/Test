<?php

	//====================================================================================================
	// Routine: admin.php
	// Description: Login or redirect user to home page
	// Author: Travis Gall
	// Create Date: 151012
	// Updates:
	// 151012 - Created [Travis Gall]
	//====================================================================================================


	
	// Add server
	if ( isset($_POST["btn-server-add"]) ) {
		$conn = mysqlConn("rne_servers");

		$sql = "INSERT INTO `servers` (`name`, `address`, `username`, `password`) VALUES ('" . $_POST["server-name"] . "','" . $_POST["server-address"] . "','" . $_POST["server-username"] . "','" . $_POST["server-password"] . "')";
		$conn->query($sql);
	}
	
	// Add project
	if ( isset($_POST["btn-project-add"]) ) {
		$database = $_POST["input-project-name"];
		require "/var/www/html/php/database/project_add.php";
	}
		
	// Add user
	if ( isset($_POST["user-add-btn"]) ) {
		//require "/var/www/html/php/users/create_user.php";
	}

	// Time update request
	if ( isset($_POST["timeset-btn"]) ) {
		if ( isset($_POST["client-time-input"]) ) {
			shell_exec("sudo bash /home/pi/documents/plcTagDB/bash/setTime.sh " . $_POST["client-time-input"]);
			sleep(1); // Delay to display new updated time
		}

	}
	
	
	require $TIME_MODEL;
	require $NETWORK_MODEL;
	require $USERS_MODEL;
	//require $PROJECTS_MODEL;
	//require $RPIS_MODEL;
?>
