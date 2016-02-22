<?php
	$conn = mysqlConn($_SESSION[$DB]);
	$sql = "SELECT * FROM `tags` WHERE `subproject`" . (isset($_SESSION[$PRJ_SUB]) ? " = " .$_SESSION[$PRJ_SUB] : " LIKE '%'") . $REPORT_SPARES_FILTER; 
	$result = $conn->query($sql);
	$conn->close();
?>

<div class="jumbotron device-info-jumbotron" style="width:100%; padding:0">
	<div class="container" style="width:100%">
		<!-- Header -->
		<div class="row">
			<div class="col-xs-6">
				<h2><?php echo strtoupper($_SESSION[$PRJ] . ( isset($_SESSION[$PRJ_SUB]) ? $_SESSION[$PRJ_SUB] : "" )); ?> - Spare Tags </h2>
			</div> <!-- /.col -->
		
			<div class="col-xs-6">
				<div class="pull-right">
					<img src="<?php echo $LOGO; ?>">
				</div>
			</div> <!-- /.col -->
		</div> <!-- /.row -->
		
		<!-- Time Stamp -->
		<div class="row">
			<center>
				<div class="col-xs-12">
					<p><?php echo date('l jS \of F Y h:i:s A T', $_SERVER['REQUEST_TIME']); ?></p>
				</div> <!-- /.col -->
			</center>
		</div> <!-- /.row -->
	
		<hr /> <!-- Line Break -->
		
		<?php require_once $REPORT_COMMISSION; ?>
	</div> <!-- /.container -->
</div> <!-- /.jumbotron -->

<div class="jumbotron device-info-jumbotron" style="width:100%; padding:0">
	<div class="container" style="width:100%">
			
		<!-- Table -->			
		<div style="width:100%">
			<small>
			<table id="table-custom-sort" class="table table-sm table-bordered table-hover table-condensed sortable" style="width:100%">
				<thead>
					<tr>
						<th style="display:none">ID</th>
						<th style="display:none">Project</th>
						<th>Name</th>
						<th>Description</th>
						<th>Type</th>
						<th>EU</th>
						<th>Min</th>
						<th>Max</th>
						<th>Hi Hi</th>
						<th style="display:none">hihiCheck</th>
						<th>High</th>
						<th style="display:none">highCheck</th>
						<th>Low</th>
						<th style="display:none">lowCheck</th>
						<th>Lo Lo</th>
						<th style="display:none">loloCheck</th>
						<th>PLC</th>
						<th>Drop</th>
						<th>Rack</th>
						<th>Slot</th>
						<th>Channel</th>
						<th style="display:none">Memory</th>
						<th style="display:none">pnid</th>
						<th style="display:none">elec</th>
						<th style="display:none">wireline</th>
						<th style="display:none">datasheet</th>
						<th style="display:none">comment</th>
						<th style="display:none">panel_date</th>
						<th style="display:none">panel_note</th>
						<th style="display:none">construction_date</th>
						<th style="display:none">construction_note</th>
						<th style="display:none">hmi_date</th>
						<th style="display:none">hmi_note</th>
						<th style="display:none">plc_date</th>
						<th style="display:none">plc_note</th>
						<th style="display:none">deleted</th>
						<th style="display:none">completed</th>
						<th style="display:none">created</th>
						<th style="display:none">user_id</th>
					</tr>
				</thead>
				<tbody>
					<?php
						while ( $row = $result->fetch_assoc() ) {
					?>
							<tr class="<?php echo ($row['completed'] <> 0 ? 'success' : 'warning' ); ?> small" style="cursor: pointer" 
							data-toggle="modal" 
							data-target="#tag_model"
							<?php echo "			
								data-id='".$row["id"]."' 
								data-name='".$row["name"]."' 
								data-description='".$row["description"]."' 
								data-type='".$row["type"]."' 
								data-eu='".$row["eu"]."' 
								data-min='".$row["min"]."' 
								data-max='".$row["max"]."' 
								data-hihi='".$row["hihi"]."' 
								data-high='".$row["high"]."' 
								data-low='".$row["low"]."' 
								data-lolo='".$row["lolo"]."' 
								data-hihicheck='".$row["hihiCheck"]."' 
								data-highcheck='".$row["highCheck"]."' 
								data-lowcheck='".$row["lowCheck"]."' 
								data-lolocheck='".$row["loloCheck"]."' 
								data-plc='".$row["plc"]."' 
								data-drop='".$row["drop"]."' 
								data-rack='".$row["rack"]."' 
								data-slot='".$row["slot"]."' 
								data-channel='".$row["channel"]."' 
								data-memory='".$row["memory"]."' 
								data-pnid='".$row["pnid"]."' 
								data-elec='".$row["elec"]."' 
								data-wireline='".$row["wireline"]."' 
								data-datasheet='".$row["datasheet"]."' 
								data-comment='".$row["comment"]."' 
								data-panel-date='".$row["panel_date"]."' 
								data-construction-date='".$row["construction_date"]."' 
								data-hmi-date='".$row["hmi_date"]."' 
								data-plc-date='".$row["plc_date"]."'
								data-panel-note='".$row["panel_note"]."' 
								data-construction-note='".$row["construction_note"]."' 
								data-hmi-note='".$row["hmi_note"]."' 
								data-plc-note='".$row["plc_note"]."' 
								data-deleted='".$row["deleted"]."' 
								data-completed='".$row["completed"]."' 
								data-created='".$row["created"] . "'>";
							?>
								<td style="display:none"><?php echo $row['id']; ?></td>
								<td style="display:none"><?php echo strtoupper($_SESSION[$PRJ] . ($row['subproject'] ? "-" . $row['subproject'] : "")); ?></td>
								<td><?php echo $row['name']; ?></td>
								<td><?php echo $row['description']; ?></td>
								<td><?php echo $row['type']; ?></td>
								<td><?php echo $row['eu']; ?></td>
								<td><?php echo $row['min']; ?></td>
								<td><?php echo $row['max']; ?></td>
								<td><?php echo $row['hihi']; ?></td>
								<td style="display:none"><?php echo $row['hihiCheck']; ?></td>
								<td><?php echo $row['high']; ?></td>
								<td style="display:none"><?php echo $row['highCheck']; ?></td>
								<td><?php echo $row['low']; ?></td>
								<td style="display:none"><?php echo $row['lowCheck']; ?></td>
								<td><?php echo $row['lolo']; ?></td>
								<td style="display:none"><?php echo $row['loloCheck']; ?></td>
								<td><?php echo $row['plc']; ?></td>
								<td><?php echo $row['drop']; ?></td>
								<td><?php echo $row['rack']; ?></td>
								<td><?php echo $row['slot']; ?></td>
								<td><?php echo $row['channel']; ?></td>
								<td style="display:none"><?php echo $row['memory']; ?></td>
								<td style="display:none"><?php echo $row['pnid']; ?></td>
								<td style="display:none"><?php echo $row['elec']; ?></td>
								<td style="display:none"><?php echo $row['wireline']; ?></td>
								<td style="display:none"><?php echo $row['datasheet']; ?></td>
								<td style="display:none"><?php echo $row['comment']; ?></td>
								<td style="display:none"><?php echo $row['panel_date']; ?></td>
								<td style="display:none"><?php echo $row['panel_note']; ?></td>
								<td style="display:none"><?php echo $row['construction_date']; ?></td>
								<td style="display:none"><?php echo $row['construction_note']; ?></td>
								<td style="display:none"><?php echo $row['hmi_date']; ?></td>
								<td style="display:none"><?php echo $row['hmi_note']; ?></td>
								<td style="display:none"><?php echo $row['plc_date']; ?></td>
								<td style="display:none"><?php echo $row['plc_note']; ?></td>
								<td style="display:none"><?php echo $row['deleted']; ?></td>
								<td style="display:none"><?php echo $row['completed']; ?></td>
								<td style="display:none"><?php echo $row['created']; ?></td>
								<td style="display:none"><?php echo $row['user_id']; ?></td>
							</tr>
					<?php
						}
					?>
				</tbody>
			</table>
			</small>
		</div>
	</div> <!-- /container -->
</div> <!-- /jumbotron -->
