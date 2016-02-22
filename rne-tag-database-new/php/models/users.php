<?php
	$conn = mysqlConn('rne_users');
	$sql = "SELECT * FROM `user_accounts`";
	$result = $conn->query($sql);
	$conn->close();
?>
<div class="jumbotron device-info-jumbotron" style="width:100%; padding:0">
	<div class="container" style="width:100%">
		
		<!-- Header -->
		<h2><?php echo $USERS_HEADER; ?></h2>
		
		<!-- Users -->
		<div class='table-responsive'>
			<table id='table-user table-custom-sort' border='1' class='tag-table table table-striped table-bordered table-hover table-condensed sortable'>
				<thead>
					<th>ID</th>
					<th>NAME</th>
					<th>ACCESS LEVEL</th>
				</thead>
				<tbody>
					<?php
						while ( $row = $result->fetch_assoc() ) {
					?>
					
					<tr>
						<td>
							<?php echo $row['id']; ?>
						</td>
						<td>
							<?php echo $row['username']; ?>
						</td>
						<td>
							<?php echo $row['access_id']; ?>
						</td>
					</tr>
						
					<?php
						}
					?>
				</tbody>
				<tfoot>
				</tfoot>
			</table>
		</div>

		<!-------------->
		<!-- User Add -->
		<!-------------->
		<form method="post">
			<input id="user-name-input" name="<?php echo $USER_ADD_USERNAME; ?>" id="<?php echo $USER_ADD_USERNAME; ?>" placeholder="username"></input>
			<input class="password" name="<?php echo $USER_ADD_PASSWORD; ?>" id="<?php echo $USER_ADD_PASSWORD; ?>" placeholder="password"></input>
			<button type="submit button" class="btn btn-success" value="<?php echo $USER_ADD_BTN; ?>" name="<?php echo $USER_ADD_BTN; ?>" id="<?php echo $USER_ADD_BTN; ?>" onclick="return confirm('Are you sure?')" tabindex="1">Add User</button>
		</form>
		
		<!-------------------------->
		<!-- User Change Password -->
		<!-------------------------->
		<form method="post">
			<button type="submit button" class="btn btn-success" value="<?php echo $USER_CHANGE_BTN; ?>" name="<?php echo $USER_CHANGE_BTN; ?>" id="<?php echo $USER_CHANGE_BTN; ?>" onclick="return confirm('Are you sure?')" tabindex="1">Change Password</button>
		</form>
	</div>
</div>
