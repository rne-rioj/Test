<div class="jumbotron device-info-jumbotron" style="width:100%; padding:0">
	<div class="container" style="width:100%">
		
		
		<?php
			$conn = mysqlConn($_SESSION[$DB]);	// Open MySQL connection to current DB
			
			$sql_active = "SELECT * FROM `tags` WHERE `deleted` = 0" . (isset($_SESSION[$PRJ_SUB]) ? " AND `subproject` = " . $_SESSION[$PRJ_SUB] : "");
			$sql_completed = "SELECT * FROM `tags` WHERE `completed` <> 0" . (isset($_SESSION[$PRJ_SUB]) ? " AND `subproject` = " . $_SESSION[$PRJ_SUB] : "");
			$sql_deleted = "SELECT * FROM `tags` WHERE `deleted` <> 0" . (isset($_SESSION[$PRJ_SUB]) ? " AND `subproject` = " . $_SESSION[$PRJ_SUB] : "");
			
			$results_active = $conn->query($sql_active);
			$results_completed = $conn->query($sql_completed);
			$results_deleted = $conn->query($sql_deleted);
			
			$active_count = mysqli_num_rows($results_active);
			$completed_count = mysqli_num_rows($results_completed);
			$deleted_count = mysqli_num_rows($results_deleted);
			$percent_complete = 100 * $completed_count / $active_count;
			
			$conn->close();	// Close MySQL connection
		?>
		
		<table class="table table-striped table-bordered table-hover table-condensed text-center" style="width:100%">
			<thead>
				<th class="text-center">Active</th>
				<th class="text-center">Completed</th>
				<th class="text-center">Deleted</th>
				<th class="text-center">Percent Complete</th>
			</thead>
			
			<tbody>
				<td><?php echo $active_count; ?></td>
				<td><?php echo $completed_count; ?></td>
				<td><?php echo $deleted_count; ?></td>
				<td><?php echo $percent_complete . "%"; ?></td>
			</tbody>
		</table>
		
	</div> <!-- /container -->
</div> <!-- /jumbotron -->
