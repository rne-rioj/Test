
			<div id="tag-model" class="modal fade small" tabindex="-1" role="dialog" aria-hidden="true" style="padding:0;">
			<form action="." method="post">
	<small>
		<div class="form-group-sm" style="padding:0;">
				<div class="modal-dialog" style="width:100%">
					<div class="modal-content">
			
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" data-toggle="tooltip" title="Close">&times;</button>
							<div class="row">
								<div class="col-md-4">
									<h4 class="modal-title" id="">Modal Title</h4>
								</div>
								<div class="col-md-2 pull-right">
									<button type="submit button " class="btn glyphicon glyphicon-floppy-save btn-success" name="tag-update" data-toggle="tooltip" title="Save"></button>
									<button type="submit button " class="btn glyphicon glyphicon-erase btn-warning" name="tag-update" data-toggle="tooltip" title="Spare"></button>
									<button type="submit button " class="btn glyphicon glyphicon-trash btn-danger tag-delete" name="tag-update" onclick="return confirm('Are you sure you would like to delete this tag?')" data-toggle="tooltip" title="Delete"></button>
								</div>
							</div>
						</div>
				
						<div class="modal-body">
							<div class="row">
								<input style="display: none;" class="id form-control input-sm" type="text" name="id"></input>
								<div class="col-md-4">
									<label>Name:</label>
									<input class="name form-control input-sm" type="text" name="name"></input>
								</div>
								<div class="col-md-4">
									<label>Sub-Project:</label>
									<input class="subproject form-control input-sm" type="text" name="subproject"></input>
								</div>
								<div class="col-md-2">
									<label>Type:</label>
									<input class="type form-control input-sm" type="text" name="type"></input>
								</div>
								<div class="col-md-2">
									<label>EU:</label>
									<input class="eu form-control input-sm" type="text" name="eu"></input>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label>Description:</label>
									<input class="description form-control input-sm" type="text" name="description"></input>
								</div>								
							</div>
							
							<!-- Merge into next row -->
							<div class="row">
								<div class="col-md-2">
									<label>Min:</label>
								</div>
								<div class="col-md-2">
									<label>Max:</label>
								</div>
								<div class="col-md-2">
									<label>HiHi:</label>
								</div>
								<div class="col-md-2">
									<label>High:</label>
								</div>
								<div class="col-md-2">
									<label>Low:</label>
								</div>
								<div class="col-md-2">
									<label>LoLo:</label>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-2">
									
									<input class="min form-control input-sm" type="text" name="min"></input>
									
								</div>
								<div class="col-md-2">
									<input class="max form-control input-sm" type="text" name="max"></input>
								</div>
								<div class="col-md-2">
								
									 <div class="input-group">
										<span class="input-group-addon">
											<input class="hihiCheck" id="hihiCheck" name="hihiCheck" type="checkbox">
										</span>
										<input class="hihi form-control input-sm" type="text" name="hihi"></input>
									</div><!-- /input-group -->
								</div>
								<div class="col-md-2">
								
									 <div class="input-group">
										<span class="input-group-addon">
											<input class="highCheck" id="highCheck" name="highCheck" type="checkbox">
										</span>
										<input class="high form-control input-sm" type="text" name="high"></input>
									</div><!-- /input-group -->
								</div>
								<div class="col-md-2">
								
									 <div class="input-group">
										<span class="input-group-addon">
											<input class="lowCheck" id="lowCheck" name="lowCheck" type="checkbox">
										</span>
										<input class="low form-control input-sm" type="text" name="low"></input>
									</div><!-- /input-group -->
								</div>
								<div class="col-md-2">
								
									 <div class="input-group">
										<span class="input-group-addon">
											<input class="loloCheck" id="loloCheck" name="loloCheck" type="checkbox">
										</span>
										<input class="lolo form-control input-sm" type="text" name="lolo"></input>
									</div><!-- /input-group -->
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-2">
									<label>PLC:</label>
									<input class="plc form-control input-sm" type="text" name="plc"></input>
								</div>
								<div class="col-md-2">
									<label>Drop:</label>
									<input class="drop form-control input-sm" type="text" name="drop"></input>
								</div>
								<div class="col-md-2">
									<label>Rack:</label>
									<input class="rack form-control input-sm" type="text" name="rack"></input>
								</div>
								<div class="col-md-2">
									<label>Slot:</label>
									<input class="slot form-control input-sm" type="text" name="slot"></input>
								</div>
								<div class="col-md-2">
									<label>Channel:</label>
									<input class="channel form-control input-sm" type="text" name="channel"></input>
								</div>
								<div class="col-md-2">
									<label>Memory:</label>
									<input class="memory form-control input-sm" type="text" name="memory"></input>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-2">
									<label>P&ID:</label>
									<input class="pnid form-control input-sm" type="text" name="pnid"></input>
								</div>
								<div class="col-md-2">
									<label>Elec:</label>
									<input class="elec form-control input-sm" type="text" name="elec"></input>
								</div>
								<div class="col-md-2">
									<label>Wireline:</label>
									<input class="wireline form-control input-sm" type="text" name="wireline"></input>
								</div>
								<div class="col-md-6">
									<label>Datasheet:</label>
									<input class="datasheet form-control input-sm" type="text" name="datasheet"></input>
								</div>
							</div>
							
							<label>Comment:</label>
							<input class="comment form-control input-sm" type="text" name="comment"></input>
							
							<div class="row">
								<div class="col-md-2">
									<label>Panel Date:</label>
									<div class="input-group">
										<input class="panel-date form-control input-sm" type="text" name="panel-date"></input>
										<span class="panel-date-btn input-group-addon">
											<i id="panel-date-btn" class="panel-date-btn glyphicon glyphicon-calendar"></i>
										</span>
									</div>
								</div>
								<div class="col-md-10">
									<label>Panel Notes:</label>
									<input class="panel-notes form-control input-sm" type="text" name="panel-notes"></input>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-2">
									<label>Construction Date:</label>
									<div class="input-group">
										<input class="construction-date form-control input-sm" type="text" name="construction-date"></input>
										<span class="construction-date-btn input-group-addon">
											<i id="construction-date-btn" class="construction-date-btn glyphicon glyphicon-calendar"></i>
										</span>
									</div>
								</div>
								<div class="col-md-10">
									<label>Construction Notes:</label>
									<input class="contruction-notes form-control input-sm" type="text" name="construction-notes"></input>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-2">
									<label>HMI Date:</label>
									<div class="input-group">
										<input class="hmi-date form-control input-sm" type="text" name="hmi-date"></input>
										<span class="hmi-date-btn input-group-addon">
											<i id="hmi-date-btn" class="hmi-date-btn glyphicon glyphicon-calendar"></i>
										</span>
									</div>
								</div>
								<div class="col-md-10">
									<label>HMI Notes:</label>
									<input class="hmi-notes form-control input-sm" type="text" name="hmi-notes"></input>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-2">
									<label>PLC Date:</label>
									<div class="input-group">
										<input class="plc-date form-control input-sm" type="text" name="plc-date"></input>
										<span class="plc-date-btn input-group-addon">
											<i id="plc-date-btn" class="plc-date-btn glyphicon glyphicon-calendar"></i>
										</span>
									</div>
								</div>
								<div class="col-md-10">
									<label>PLC Notes:</label>
									<input class="plc-notes form-control input-sm" type="text" name="plc-notes"></input>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-4">
									<label>Created:</label>
									<input class="created form-control input-sm " type="text" name="created"></input>
								</div>
								<div class="col-md-4">
									<label>Completed:</label>
									<input class="completed form-control input-sm" type="text" name="completed"></input>
								</div>
								<div class="col-md-4">
									<label>Deleted:</label>
									<input class="deleted form-control input-sm" type="text" name="deleted"></input>
								</div>
							</div>
						</div>
						
						<!-- Deficiencies -->
						<div>
							<hr />
							<center><h1 style="margin:0;"><small>Deficiencies</small></h1></center>
							<form method='post' id="form-deficiencies">
								<div style="display:none;">
									<label for="ex3">id:</label>
									<input class="form-control deficiencies-input-id" id="ex3 deficiencies-input-id" type="text" name="deficiencies-input-id"></input>
								</div>
								<input class="form-control deficiencies-add-input" id="deficiencies-add-input" name="deficiencies-add-input"></input>
								<button name="deficiencies-add-btn">Add</button>
								<table class="table table-deficiencies sortable" id="table-deficiencies table-custom-sort">
									<thead><!--<th>id</th><th>row_id</th>--><th>description</th><th>complete</th></thead>
									<?php
										$conn = mysqlConn($_SESSION[$DB]);
										$sql = "SELECT * FROM `deficiencies` WHERE `complete_date` = 0 ORDER BY `id` DESC";
										$result = $conn->query($sql);
						
										if ( $result->num_rows > 0 ) {
											while ($row = $result->fetch_assoc()) {
												echo "<tr style='display:false'>" . "<td style='display: none' name='deficiencies-row-id'>" . $row['row_id'] . "</td><td>" . $row['description'] . "</td><td><button name='deficiencies-btn-resolved' value=" . $row['id'] . ">Resolved</button></td></tr>";
											}
										}
									?>
								</table>
							</form>
						</div>
						
						<!-- Audit -->
						<div>
							<hr />
							<center><h1 style="margin:0;"><small>Audit Log</small></h1></center>
							<table class="table table-audits sortable" id="table-audits table-custom-sort">
								<thead><!--<th>id</th><th>table</th>--><th>column</th><!--<th>row_id</th>--><th>before</th><th>after</th><th>datetime</th></thead>
								<?php
									$conn = mysqlConn($_SESSION[$DB]);
									$sql = "SELECT * FROM `audit` ORDER BY `id` DESC";
									$result = $conn->query($sql);
						
									if ( $result->num_rows > 0 ) {
										while ($row = $result->fetch_assoc()) {
											echo "<tr style='display:false'>" /*<td>" . $row['id'] . "</td><td>" . $row['table'] . "</td>*/ . "<td>" . $row['column'] . "</td><td style='display: none'>" . $row['row_id'] . "</td><td>" . $row['before'] . "</td><td>" . $row['after'] . "</td><td>" . $row['datetime'] . "</td></tr>";
										}
									}
									$conn->close();
								?>
							</table>
						</div>
						<div class="modal-footer">
						</div>
					</div>
				</div>
		</div>
	</small>

</form>
</div> <!-- #tag_model -->
