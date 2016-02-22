<?php
	// Destroy existing session variables
	session_destroy();		
	// Reload page
	echo	'<script type="text/javascript">
				location.reload(true);
			</script>';
?>
