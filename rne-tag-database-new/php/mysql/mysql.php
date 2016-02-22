<?php
	function mysqlConn($dbname) {
		global $MYSQL_SERV;	// Global server address
		global $MYSQL_USER;	// Global username
		global $MYSQL_PASS;	// Global password
		
		if ( isset($dbname) && $dbname != "" ) {
			$conn = new mysqli($MYSQL_SERV, $MYSQL_USER, $MYSQL_PASS, $dbname);
		} else {
			$conn = new mysqli($MYSQL_SERV, $MYSQL_USER, $MYSQL_PASS);
		}
		
		if ( $conn->connect_error ) {
			die("Connection failed: " . $conn->connect_error);
		}
		
		return $conn;
	}
?>
