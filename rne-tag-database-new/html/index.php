<?php
	session_start();
	//session_destroy();
	require_once '/home/travis/rne-tag-database-new/config/config.php';
	require_once $MYSQL_FUNCTIONS;
	
	// Set correct timezone
	date_default_timezone_set('America/Edmonton');
	
	// User logged in
	if ( isset($_SESSION[$UID]) ) {	
		// Time update request
		if ( isset($_POST["timeset-btn"]) ) {
			if ( isset($_POST["client-time-input"]) ) {
				shell_exec("sudo bash /home/pi/documents/plcTagDB/bash/setTime.sh " . $_POST["client-time-input"]);
				sleep(1); // Delay to display new updated time
			}
		}
		
		// Project selected
		if ( isset($_POST[$PRJ]) ) {
			//die("FAIL: " . $_POST[$PRJ]);
			$_SESSION[$PRJ] = $_POST[$PRJ];						// Unset subproject when a new project is selected
			$_SESSION[$SEARCH] = "";
			$_SESSION[$PRJ_DESC] = "PROJECT DESCRIPTION GOES HERE";
			$_SESSION[$DB] = "rne_prj_" . $_SESSION[$PRJ];
			
			if ( $_SESSION[$USER_ACCESS] <> 99 ) {
				$_SESSION[$PAGE] = $TAGS_MODEL;
			} else {
				$_SESSION[$PAGE] = $REPORT_COMPLETED_MODEL;
			}
			
			unset($_SESSION[$PRJ_SUB]);		
			unset($_POST[$PRJ]);
		}
		
		// Sub-project selected
		if ( isset($_POST[$PRJ_SUB]) ) {
			if ( $_POST[$PRJ_SUB] == "") {
				unset($_SESSION[$PRJ_SUB]);
			} else {
				$_SESSION[$PRJ_SUB] = $_POST[$PRJ_SUB];
			}
			
			if ( $_SESSION[$USER_ACCESS] <> 99 ) {
				$_SESSION[$PAGE] = $TAGS_MODEL;
			} else {
				$_SESSION[$PAGE] = $REPORT_COMPLETED_MODEL;
			}
			
			unset($_POST[$PRJ_SUB]);
		}
	
		// User logout requested
		if ( isset($_POST[$LOGOUT_BTN]) ) {
			$_SESSION[$PAGE] = $LOGOUT_MODEL;
		}
		
		
		if ( isset($_POST[$SEARCH]) ) {
			if ( $_POST[$SEARCH] == "" ) {
				$_SESSION[$SEARCH] = "";
			}
			$_SESSION[$SEARCH] .= $_POST[$SEARCH];
			unset($_POST[$SEARCH]);
		}
		
		//----------
		// Reports
		//----------
		
		//if ( isset($_POST[$REPORT]) ) {			// Report selected
		//	$_SESSION[$PAGE] = $REPORT_COMMISSION;	// Use report page on current load
		//}
		
		if ( isset($_POST[$TAGS_ACTIVE]) ) {
			$_SESSION[$PAGE] = $TAGS_MODEL;
			$_SESSION[$TAGS_FILTER] = $TAGS_ACTIVE_FILTER;
		}
		
		else if ( isset($_POST[$TAGS_REMAINING]) ) {
			$_SESSION[$PAGE] = $TAGS_MODEL;
			$_SESSION[$TAGS_FILTER] = $TAGS_REMAINING_FILTER;
		}
		
		else if ( isset($_POST[$TAGS_COMPLETED]) ) {
			$_SESSION[$PAGE] = $TAGS_MODEL;
			$_SESSION[$TAGS_FILTER] = $TAGS_COMPLETED_FILTER;
		}
		
		else if ( isset($_POST[$TAGS_DELETED]) ) {
			$_SESSION[$PAGE] = $TAGS_MODEL;
			$_SESSION[$TAGS_FILTER] = $TAGS_DELETED_FILTER;
		}
		
		else if ( isset($_POST[$TAGS_ALL]) ) {
			$_SESSION[$PAGE] = $TAGS_MODEL;
			$_SESSION[$TAGS_FILTER] = $TAGS_ALL_FILTER;
		} 
		
		else {
			unset($_SESSION[$TAGS_FILTER]);
		}
		
		
		// Reporting
		if ( isset($_POST[$REPORT_ACTIVE]) ) {
			$_SESSION[$PAGE] = $REPORT_ACTIVE_MODEL;
			unset($_POST[$REPORT_ACTIVE]);
		}
		
		else if ( isset($_POST[$REPORT_COMPLETED]) ) {
			$_SESSION[$PAGE] = $REPORT_COMPLETED_MODEL;
			unset($_POST[$REPORT_COMPLETED]);
		}
		
		else if ( isset($_POST[$REPORT_REMAINING]) ) {
			$_SESSION[$PAGE] = $REPORT_REMAINING_MODEL;
			unset($_POST[$REPORT_REMAINING]);
		}
		
		else if ( isset($_POST[$REPORT_DELETED]) ) {
			$_SESSION[$PAGE] = $REPORT_DELETED_MODEL;
			unset($_POST[$REPORT_DELETED]);
		}
		
		else if ( isset($_POST[$REPORT_ALL]) ) {
			$_SESSION[$PAGE] = $REPORT_ALL_MODEL;
			unset($_POST[$REPORT_ALL]);
		} 
		
		else if ( isset($_POST[$REPORT_SPARES]) ) {
			$_SESSION[$PAGE] = $REPORT_SPARES_MODEL;
			unset($_POST[$REPORT_SPARES]);
		} 
		
		else {
			unset($_SESSION[$REPORT_FILTER]);
		}
		
		// Administration
		if ( !isset($_SESSION[$PAGE]) or isset($_POST[$ADMIN_BTN])) {
			$_SESSION[$PAGE] = $ADMIN_MODEL;
			
			if ( $_SESSION[$USER_ACCESS] <> 99 ) {
				$_SESSION[$PAGE] = $ADMIN_MODEL;
			} else {
				unset($_SESSION[$PAGE]);
			}
		}
		
		if ( isset($_POST[$USER_ADD_BTN]) ) {
			$_SESSION[$PAGE] = $USER_ADD_MODEL;
			unset($_POST[$USER_ADD_BTN]);
		}
		
		// User change password
		if ( isset($_POST[$USER_CHANGE_BTN]) ) {
			$_SESSION[$PAGE] = $USER_CHANGE_MODEL;
			unset($_POST[$USER_CHANGE_PASSWORD]);
		}
		
		if ( isset($_POST[$IOSELECT]) ) {
			$_SESSION[$IOSELECT] = $_POST[$IOSELECT];
			unset($_POST[$IOSELECT]);
			$_SESSION[$ID_FILTER] = $_SESSION[$IOSELECT];
		}
		
		if (isset($_POST['tag-update']) ){
				$conn = mysqlConn($_SESSION[$DB]);
				$name = $_POST['name'];
				$description = $_POST['description'];
				$type = $_POST['type'];
				$eu = $_POST['eu'];
				$min = $_POST['min'];
				$max = $_POST['max'];
				$hihi = $_POST['hihi'];
				$high = $_POST['high'];
				$low = $_POST['low'];
				$lolo = $_POST['lolo'];
				$hihiCheck = (isset($_POST['hihiCheck'])) ? 1 : 0;
				$highCheck = (isset($_POST['highCheck'])) ? 1 : 0;
				$lowCheck = (isset($_POST['lowCheck'])) ? 1 : 0;
				$loloCheck = (isset($_POST['loloCheck'])) ? 1 : 0;
				$drop = $_POST['drop'];
				$plc = $_POST['plc'];
				$rack = $_POST['rack'];
				$slot = $_POST['slot'];
				$channel = $_POST['channel'];
				$memory = $_POST['memory'];
				$pnid = $_POST['pnid'];
				$elec = $_POST['elec'];
				$wireline = $_POST['wireline'];
				$datasheet = $_POST['datasheet'];
				$comment = $_POST['comment'];
				$panelDate = $_POST['panel-date'];
				$panelNote = $_POST['panel-note'];
				$constructionDate = $_POST['construction-date'];
				$constructionNote = $_POST['construction-note'];
				$hmiDate = $_POST['hmi-date'];
				$hmiNote = $_POST['hmi-note'];
				$plcDate = $_POST['plc-date'];
				$plcNote = $_POST['plc-note'];
				$deleted = $_POST['deleted'];
				$completed = $_POST['completed'];
				$created = $_POST['created'];
				$subproject = $_POST['subproject'];
			
			

			if ($_POST['id'] <> null) {
				$id = $_POST['id'];
				$sql = "UPDATE `tags` SET
					`name` = '" . $name . "', 
					`description` = '" . $description . "', 
					`type` = '" . $type . "', 
					`eu` = '" . $eu . "', 
					`min` = '" . $min . "', 
					`max` = '" . $max . "', 
					`hihi` = '" . $hihi . "', 
					`high` = '" . $high . "', 
					`low` = '" . $low . "', 
					`lolo` = '" . $lolo . "', 
					`hihiCheck` = '" . $hihiCheck . "', 
					`highCheck` = '" . $highCheck . "', 
					`lowCheck` = '" . $lowCheck . "', 
					`loloCheck` = '" . $loloCheck . "', 
					`drop` = '" . $drop . "', 
					`plc` = '" . $plc . "', 
					`rack` = '" . $rack . "', 
					`slot` = '" . $slot . "', 
					`channel` = '" . $channel . "', 
					`memory` = '" . $memory . "', 
					`pnid` = '" . $pnid . "', 
					`elec` = '" . $elec . "', 
					`wireline` = '" . $wireline . "', 
					`datasheet` = '" . $datasheet . "', 
					`comment` = '" . $comment . "', 
					`panel_date` = '" . $panelDate . "', 
					`panel_note` = '" . $panelNote . "', 
					`construction_date` = '" . $constructionDate . "', 
					`construction_note` = '" . $constructionNote . "', 
					`hmi_date` = '" . $hmiDate . "', 
					`hmi_note` = '" . $hmiNote . "', 
					`plc_date` = '" . $plcDate . "', 
					`plc_note` = '" . $plcNote . "', 
					`deleted` = '" . $deleted . "', 
					`completed` = '" . $completed . "', 
					`created` = '" . $created . "', 
					`subproject` = '" . $subproject . "', 
					`user_id` = '" . $_SESSION["uid"] . "'
				WHERE `id` = '" . $id . "'";
			
				$conn->query($sql);
			} else {
				$sql = "INSERT INTO `tags` 
				(
					`name`, 
					`description`, 
					`type`, 
					`eu`, 
					`min`, 
					`max`, 
					`hihi`, 
					`high`, 
					`low`, 
					`lolo`, 
					`hihiCheck`, 
					`highCheck`, 
					`lowCheck`, 
					`loloCheck`, 
					`drop`, 
					`plc`, 
					`rack`, 
					`slot`, 
					`channel`, 
					`memory`, 
					`pnid`, 
					`elec`, 
					`wireline`, 
					`datasheet`, 
					`comment`, 
					`panel_date`, 
					`panel_note`, 
					`construction_date`, 
					`construction_note`, 
					`hmi_date`, 
					`hmi_note`, 
					`plc_date`, 
					`plc_note`, 
					`deleted`, 
					`completed`, 
					`created`, 
					`subproject`, 
					`user_id`
				)
				VALUES
				(
					'$name', 
					'$description', 
					'$type', 
					'$eu', 
					'$min', 
					'$max', 
					'$hihi', 
					'$high', 
					'$low', 
					'$lolo', 
					'$hihiCheck', 
					'$highCheck', 
					'$lowCheck', 
					'$loloCheck', 
					'$drop', 
					'$plc', 
					'$rack', 
					'$slot', 
					'$channel', 
					'$memory', 
					'$pnid', 
					'$elec',
					'$wireline', 
					'$datasheet', 
					'$comment', 
					'$panelDate', 
					'$panelNote', 
					'$constructionDate', 
					'$constructionNote', 
					'$hmiDate', 
					'$hmiNote', 
					'$plcDate', 
					'$plcNote', 
					'$deleted', 
					'$completed', 
					'$created', 
					'$subproject', 
					'" . $_SESSION["uid"] . "'
				)";
			
				$conn->query($sql);
			$conn->close();
			}
			
		}

		if ( isset($_POST['tag-delete']) ) {
			$conn = mysqlConn($_SESSION[$DB]);
			$id = $_POST['id'];
			$sql = "UPDATE `tags` SET `deleted` = now() FROM `tags` WHERE `id` = $id";
			$conn->query($sql);
			$conn->close();
		}
		
		if ( isset($_POST["deficiencies-add-btn"]) && $_POST["deficiencies-add-input"] <> '' ) {
			$conn = mysqlConn($_SESSION[$DB]);
			$sql = "INSERT INTO `deficiencies` (`row_id`, `description`) VALUES (" . $_POST["deficiencies-input-id"] . ", '" . $_POST["deficiencies-add-input"] . "')";
			$conn->query($sql);
			$conn->close();

		} elseif ( isset($_POST["deficiencies-btn-resolved"]) ) {
			$conn = mysqlConn($_SESSION[$DB]);
			//die($_SESSION[$DB]);
			$sql = "UPDATE `deficiencies` SET `complete_date` = now() WHERE `id` = " . $_POST['deficiencies-btn-resolved'];
			$conn->query($sql);
			$conn->close();
		}
	} 
	
	// User NOT logged in
	else {
		// Load login model
		$_SESSION[$PAGE] = $LOGIN_MODEL;
		
		if ( isset($_POST[$LOGIN_BTN]) ) {
			$_SESSION[$LOGIN_USERNAME] = $_POST[$LOGIN_USERNAME];
			$_SESSION[$LOGIN_PASSWORD] = $_POST[$LOGIN_PASSWORD];
			$_SESSION[$PAGE] = $LOGIN_CHECK_MODEL;
		}
	}
	
	// Page header
	require $HEADER_MODEL; // Open html, head and body. Redirect user to home page when logged in
	
	// Page footer
	require $FOOTER_MODEL; // Close-up body and html and include common scripts
?>
