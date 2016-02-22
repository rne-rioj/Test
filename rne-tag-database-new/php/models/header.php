<!DOCTYPE html>
<html> <!-- HTML begins here -->
	<head>
		<title><?php echo isset($_SESSION['project-name']) ? $_SESSION['project-name'] : $PROJECT_TITLE; ?></title>
		
		<meta charset="utf-8"></meta>
		<meta content="IE=edge" http-equiv="X-UA-Compatible"></meta>
		<meta content="width=device-width, initial-scale=1" name="viewport"></meta>
		<meta content="" name="description"></meta>
		<meta content="" name="author"></meta>

		<link rel="stylesheet" href="css/bootstrap.min.css"></link>
		<link rel="stylesheet" href="css/bootstrap-datetimepicker.css"></link>
		<link rel="stylesheet" href="css/navbarscroll.css"></link>
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/moment.js"></script>
		<script src="js/datetimepicker.js"></script>
		<script src="js/tags.js"></script>
		
		<script src="js/scrollfix.js" type="text/javascript"></script>
		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	
	<body onLoad="self.focus(); loadP('UniquePageNameHereScroll')" onunload="unloadP('UniquePageNameHereScroll')">	<!-- Body starts here -->
		<?php if ( isset($_SESSION[$UID]) ) { include $NAVBAR_MODEL; } ?>
			<?php echo $_SESSION[$SEARCH]; ?>
			<div class="container page-container" id="page-container" style="width:100%; margin-top:4em;">
				<?php require $_SESSION[$PAGE]; ?>
