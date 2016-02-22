<div class="jumbotron device-info-jumbotron" style="width:100%; padding:0">
	<div class="container" style="width:100%">
		
		<!-- Database sync -->
		<h2>System Database Configuration</h2>
		<div class='table-responsive'>
			<table id='table-database table-custom-sort' border='1' class='table-database table table-striped table-bordered table-hover table-condensed'>
				<thead>
					<!--<th>ID</th>-->
					<th>NAME</th>
					<th>ADDRESS</th>
					<th>ACTIVE</th>
				</thead>
				<tbody>
					<?php //require "/var/www/html/php/database/server_get.php"; ?>
				</tbody>
				<tfoot>
				</tfoot>
			</table> <!-- table-database -->
		</div> <!-- table-responsive -->
		
		<!-- Server add -->
		<form action="config.php" method="post" name="form-server-add">
			<div class='row'>
				<div class='col-xs-2'>
					<label for="ex3">Server Name</label>
					<input id="server-name" name="server-name"></input>
				</div>
				<div class='col-xs-2'>
					<label for="ex3">Address</label>
					<input id="server-address" name="server-address"></input>
				</div>
				<div class='col-xs-2'>
					<label for="ex3">Username</label>
					<input id="server-username" name="server-username"></input>
				</div>
				<div class='col-xs-2'>
					<label for="ex3">Password</label>
					<input type="password" id="server-password" name="server-password"></input>
				</div>
				<div class='col-xs-2'>
					<br />
					<button type="submit button" class="btn btn-success" id="btn-server-add" name="btn-server-add" onclick="return confirm('Are you sure?')" tabindex="1">Add Server</button>
				</div>
			</div>
		</form>
	</div> <!-- ./container -->
</div> <!-- ./jumbotron -->
