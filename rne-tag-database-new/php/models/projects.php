<?php
	$conn = mysqlConn('rne_prj');
	$sql = "SELECT * FROM `projects`";
	$result = $conn->query($sql);
?>







<div class="jumbotron device-info-jumbotron" style="width:100%; padding:0">
	<div class="container" style="width:100%">
		
		<!-- Header -->
		<h2><?php echo $PROJECTS_HEADER; ?></h2>
		
		<div class='table-responsive'>
			<table id='table-user table-custom-sort' border='1' class='tag-table table table-striped table-bordered table-hover table-condensed sortable'>
				<thead>
					<th>ID</th>
					<th>Project</th>
					<th>Description</th>
				</thead>
				<tbody>
					<?php
						if ( $result->num_rows > 0) {
							while ( $row = $result->fetch_assoc() ) {
								$project = str_replace("rne_prj_", "", $row['Database (rne_prj_%)']); ?>
								<tr><td><?php echo $row['id']; ?></td><td><?php echo $row['name']; ?></td><td><?php echo $row['description']; ?></td></tr>			
							<?php
							}
						}
					?>
				</tbody>
			</table>
		</div>
		
		<form method="post">
			<input id="" name="<?php echo $PROJECT_ADD_NAME; ?>" id="<?php echo $PROJECT_ADD_NAME; ?>" placeholder="Project Name"></input>
			<input class="" id="" name="<?php echo $PROJECT_ADD_DESC; ?>" id="<?php echo $PROJECT_ADD_DESC; ?>" placeholder="Project Description"></input>
			<br /><br />
			<button type="submit button" class="btn btn-success" value="<?php echo $PROJECT_ADD_BTN; ?>" name="<?php echo $PROJECT_ADD_BTN; ?>" id="<?php echo $PROJECT_ADD_BTN; ?>" onclick="return confirm('Are you sure?')" tabindex="1">Add Project</button>
		</form>
	</div> <!-- ./container -->
</div> <!-- ./jumbotron -->

<!------------->
<!-- Wrap-Up -->
<!------------->
<?php
	$conn->close();
?>
