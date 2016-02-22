<?php
	//----------------------------------------------------------------------------------------------------
	// Device
	//----------------------------------------------------------------------------------------------------
	$DEVICE_NAME = 'rpi-000';
	$DEVICE_DESC = 'rpi main server';
	
	//----------------------------------------------------------------------------------------------------
	// Directories
	//----------------------------------------------------------------------------------------------------
	$ROOT_DIR = '/home/travis/rne-tag-database-new/';	// Update $ROOT_DIR/html/index.php to match
	$MODELS_DIR = $ROOT_DIR . 'php/models/';			// Model directory
	$MYSQL_DIR = $ROOT_DIR . 'php/mysql/';				// MySQL directory
	$REPORT_DIR = $ROOT_DIR . 'php/reports/';			// Reporting directory
	$IMG_DIR = '/img/';			// Reporting directory
		
	//----------------------------------------------------------------------------------------------------
	// Models
	//----------------------------------------------------------------------------------------------------
	// Header
	$HEADER_MODEL = $MODELS_DIR . 'header.php';
	
	// Footer
	$FOOTER_MODEL = $MODELS_DIR . 'footer.php';
	
	// Navigation
	$NAVBAR_MODEL = $MODELS_DIR . 'navbar.php';
	
	// Login
	$LOGIN_MODEL = $MODELS_DIR . 'login.php';
	$LOGIN_CHECK_MODEL = $MYSQL_DIR . 'login.php';
	$LOGIN_BTN = 'login-btn';
	$LOGIN_USERNAME = 'login-username';
	$LOGIN_PASSWORD = 'login-password';

	// Logout
	$LOGOUT_MODEL = $MYSQL_DIR . 'logout.php';
	$LOGOUT_BTN = 'logout-btn';
	
	// Tags
	$TAGS_MODEL = $MODELS_DIR . 'tags.php';
	$TAG_MODEL = $MODELS_DIR . 'tag.php';
	
	// Administration
	$ADMIN_MODEL = $MODELS_DIR . 'admin.php';
	$ADMIN_BTN = "admin_btn";
	
	$USER_ADD = "user-add";
	$USER_ADD_BTN = "user-add-btn";
	$USER_ADD_MODEL = $MYSQL_DIR . "create-guest.php";
	$USER_DB = "rne_users";
	$USER_ACCOUNTS_TABLE = "user_accounts";
	$USER_ADD_USERNAME = "username";
	$USER_ADD_PASSWORD = "password";
	$USER_ACCESS = 'access_id';
	
	$USER_CHANGE_MODEL = $MYSQL_DIR . "user_password.php";
	$USER_CHANGE_BTN = "user_change_btn";
	$USER_CHANGE_PASSWORD = "user_change_password";
	
	// Administration
	$TIME_MODEL = $MODELS_DIR . 'time.php';
	$TIME_HEADER = 'System Clock Configuration';
	$TIME_SCRIPT = 'js/systemTime.js';
	
	// Network
	$NETWORK_MODEL = $MODELS_DIR . 'network.php';
	$NETWORK_HEADER = 'Network Configuration';
	
	// Users
	$USERS_MODEL = $MODELS_DIR . 'users.php';
	$USERS_HEADER = 'User Accounts';
	
	// Projects
	$PROJECTS_MODEL = $MODELS_DIR . 'projects.php';
	$PROJECTS_HEADER = 'Projects';
	
	// Projects
	$RPIS_MODEL = $MODELS_DIR . 'rpis.php';
	$RPIS_HEADER = 'RPis';
	
	$IOSELECT = 'ioselect';
	
	//----------------------------------------------------------------------------------------------------
	// Session variables
	//----------------------------------------------------------------------------------------------------
	$UID = 'uid';			// User ID
	$PAGE = 'page';			// Page name
	$PRJ = 'prj';			// Project name
	$PRJ_DESC = 'prj_desc';	// Project description
	$PRJ_SUB = 'prj_sub';	// Sub project
	$SEARCH = 'search';		// Current search value
	$DB = 'db';				// Current database
	
	//----------------------------------------------------------------------------------------------------
	//	MySQL
	//----------------------------------------------------------------------------------------------------
	$MYSQL_FUNCTIONS = $MYSQL_DIR . 'mysql.php';
	$MYSQL_USER = 'root';
	$MYSQL_PASS = 'RNEl3tm3!n';
	$MYSQL_SERV = 'localhost';
	
	//----------------------------------------------------------------------------------------------------
	//	Reporting
	//----------------------------------------------------------------------------------------------------
	$TAGS_FILTER = "tags_filter";
	
	$TAGS_ACTIVE = "tags_active";
	$TAGS_ACTIVE_TITLE = "Remaining and Completed Tags from Selected Project/Sub-Project";
	$TAGS_ACTIVE_FILTER = " AND `deleted` = 0";
	
	$TAGS_REMAINING = "tags_remaining";
	$TAGS_REMAINING_TITLE = "Remaining Tags from Selected Project/Sub-Project";
	$TAGS_REMAINING_FILTER = $TAGS_ACTIVE_FILTER . " AND `completed` = 0";
	
	$TAGS_COMPLETED = "tags_completed";
	$TAGS_COMPLETED_TITLE = "Completed Tags from Selected Project/Sub-Project";
	$TAGS_COMPLETED_FILTER = " AND `completed` <> 0";
	
	$TAGS_DELETED = "tags_deleted";
	$TAGS_DELETED_TITLE = "Deleted Tags from Selected Project/Sub-Project";
	$TAGS_DELETED_FILTER = " AND `deleted` <> 0";
	
	$TAGS_ALL = "tags_all";
	$TAGS_ALL_TITLE = "All Tags from Selected Project/Sub-Project";
	$TAGS_ALL_FILTER = "";
	
	//----------------------------------------------------------------------------------------------------
	//	Reporting
	//----------------------------------------------------------------------------------------------------
	$REPORT = "report";
	$REPORT_COMMISSION = $REPORT_DIR . "complete_percent.php";
	
	$REPORT_ACTIVE = "report_active";
	$REPORT_ACTIVE_TITLE = "Required and Completed Tags from Selected Project/Sub-Project";
	$REPORT_ACTIVE_MODEL = $REPORT_DIR . "active.php";
	$REPORT_ACTIVE_FILTER = " AND `deleted` = 0 AND `name` NOT LIKE '%SPARE%'";
	
	$REPORT_REMAINING = "report_remaining";
	$REPORT_REMAINING_TITLE = "Remaining Tags from Selected Project/Sub-Project";
	$REPORT_REMAINING_MODEL = $REPORT_DIR . "remaining.php";
	$REPORT_REMAINING_FILTER = " AND `completed` = 0 AND `deleted` = 0 AND `name` NOT LIKE '%SPARE%'";
	
	$REPORT_COMPLETED = "report_completed";
	$REPORT_COMPLETED_TITLE = "Completed Tags from Selected Project/Sub-Project";
	$REPORT_COMPLETED_MODEL = $REPORT_DIR . "completed.php";
	$REPORT_COMPLETED_FILTER = " AND `completed` <> 0 AND `name` NOT LIKE '%SPARE%'";
	
	$REPORT_DELETED = "report_deleted";
	$REPORT_DELETED_TITLE = "Deleted Tags from Selected Project/Sub-Project";
	$REPORT_DELETED_MODEL = $REPORT_DIR . "deleted.php";
	$REPORT_DELETED_FILTER = " AND `deleted` <> 0 AND `name` NOT LIKE '%SPARE%'";
	
	$REPORT_ALL = "report_all";
	$REPORT_ALL_TITLE = "All Tags from Selected Project/Sub-Project";
	$REPORT_ALL_MODEL = $REPORT_DIR . "all.php";
	$REPORT_ALL_FILTER = "";
	
	$REPORT_SPARES = "report_spares";
	$REPORT_SPARES_TITLE = "Spare Tags";
	$REPORT_SPARES_MODEL = $REPORT_DIR . "spares.php";
	$REPORT_SPARES_FILTER = " AND `name` LIKE '%SPARE%'";
	
	//----------------------------------------------------------------------------------------------------
	//	Tools
	//----------------------------------------------------------------------------------------------------
	$TOOLS = "tools";
	
	$TOOLS_IOBUILDER = "tools_iobuilder";
	
	//---
	// Logos
	//---
	$LOGO = $IMG_DIR . "RNE.png";
	$LOGO_SMALL = $IMG_DIR . "RNE-small.png";
	
?>
