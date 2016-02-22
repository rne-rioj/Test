<div class="jumbotron device-info-jumbotron" style="width:100%; padding:0">
	<div class="container" style="width:100%">
		
		<!-- Header -->
		<h2><?php echo $TIME_HEADER; ?></h2>
		
		<!-- Time current -->
		<div class='table-responsive'>
			<table id='table-time table-custom-sort' border='1' class='tag-table table table-striped table-bordered table-hover table-condensed sortable'>
				<thead>
					<th>SERVER TIME</th>
					<th>CLIENT TIME</th>
					<th>DIFFERENCE (sec)</th>
				</thead>
				<tbody>
					<tr id="time-row">
						<td><label for="ex3" id="server-time"><?php echo date('l jS \of F Y h:i:s A T', $_SERVER['REQUEST_TIME']); ?></label></td>
						<td><label for="ex3" id="client-time">ERROR</label></td>
						<td><label for="ex3" id="compared-time">ERROR</label></td>
					</tr>
				</tbody>
				<tfoot>
				</tfoot>
			</table>
		</div>

		<!-- Time set -->
		<form method="post" name="timeset-form">
			<input hidden id="server-time-input" name="server-time-input" value="<?php echo time(); ?>"></input>
			<input hidden id="client-time-input" name="client-time-input"></input>
			<button type="submit button" class="btn btn-success" id="client-time-btn" name="timeset-btn" onclick="return confirm('Are you sure?')" tabindex="1">Update System Time</button>
		</form>
		
	</div> <!-- ./container -->
</div> <!-- ./jumbotron -->

<script type="text/javascript" src="<?php echo $TIME_SCRIPT; ?>"></script>
