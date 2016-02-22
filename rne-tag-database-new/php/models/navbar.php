<?php
	$conn = mysqlConn();
	$access = $_SESSION[$USER_ACCESS] <> 99;
?>
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<!-------------------------------------------->
			<!-- Collapsed navigation for small screens -->
			<!-------------------------------------------->
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
			
			<!----------->
			<!-- Brand -->
			<!----------->
			<a class="navbar-brand" href="."><?php echo ( isset($_SESSION[$PRJ]) ? $_SESSION[$PRJ] . ( isset($_SESSION[$PRJ_SUB]) ? '-' . $_SESSION[$PRJ_SUB] : '') : 'RNE'); ?></a>
		</div> <!-- /.navbar-header -->
		
		<div class="navbar-collapse collapse">
		
			<ul class="nav navbar-nav">
				
				<!-------------->
				<!-- Projects -->
				<!-------------->
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Projects <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li>
							<form class="navbar-form" method="post">
							<?php
								$sql = "SHOW DATABASES LIKE 'rne_prj_%'";
								$result = $conn->query($sql);
							
								if ( $result->num_rows > 0) {
									while ( $row = $result->fetch_assoc() ) {
										$project = str_replace("rne_prj_", "", $row['Database (rne_prj_%)']); ?>
									
										<li>
											<button type="submit" class="btn btn-link" id="<?php echo $PRJ; ?>" name="<?php echo $PRJ; ?>" title="<?php echo $project; ?>" value="<?php echo $project; ?>"><?php echo $project; ?></button>
										</li>
										
									<?php
									}
								}
							?>
							</form>
						</li>
					</ul>
				</li>
				
					
				<!----------->
				<!-- Tools -->
				<!----------->
				<?php if ( isset($_SESSION[$PRJ]) ) { ?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Sub Project <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li>
							<form class="navbar-form" method="post">
							<?php
								$sql = "SELECT DISTINCT `subproject` FROM `rne_prj_" . $_SESSION[$PRJ] . "`.`tags` ORDER BY `subproject`";
								$result = $conn->query($sql);
							
								if ( $result->num_rows > 0 ) {
									while ( $row = $result->fetch_assoc() ) { ?>
									
										<li>
											<button type="submit" class="btn btn-link" id="<?php echo $PRJ_SUB; ?>" name="<?php echo $PRJ_SUB; ?>" title="<?php echo $PRJ_SUB; ?>" value="<?php echo $row['subproject']; ?>"><?php echo $row['subproject']; ?></button>
										</li>
									<?php }
								}
							?>
							</form>
							</li>
						</ul>
					</li>
				<?php } ?>
					
				<!---------->
				<!-- Tags -->
				<!---------->
				<?php 
					// Only display if current user has access
					if ( $access ) {
				?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Tags <span class="caret"></span></a>
						
						<ul class="dropdown-menu">
							<li>
								<form class="navbar-form" method="post">
									<li>
										<a class="glyphicon glyphicon-plus open-tag-model" style='cursor: pointer' data-toggle='modal' data-id='' data-name='NEW' data-description='' data-type='' data-eu='' data-min='' data-max='' data-hihi='' data-high='' data-low='' data-lolo='' data-drop='' data-plc='' data-rack='' data-slot='' data-channel='' data-memory='' data-pnid='' data-elec='' data-wireline='' data-datasheet='' data-comment='' data-deleted='' data-completed='' data-target='#tag-model'> New Tag</a>
										
										<button type="submit" class="btn btn-link" id="<?php echo $TAGS_ACTIVE; ?>" name="<?php echo $TAGS_ACTIVE; ?>" title="<?php echo $TAGS_ACTIVE_TITLE ?>">Active</button>
									</li>
									<li>
										<button type="submit" class="btn btn-link" id="<?php echo $TAGS_REMAINING; ?>" name="<?php echo $TAGS_REMAINING; ?>" title="<?php echo $TAGS_REMAINING_TITLE ?>">Remaining</button>
									</li>
									<li>
										<button type="submit" class="btn btn-link" id="<?php echo $TAGS_COMPLETED; ?>" name="<?php echo $TAGS_COMPLETED; ?>" title="<?php echo $TAGS_COMPLETED_TITLE ?>">Completed</button>
									</li>
									<li>
										<button type="submit" class="btn btn-link" id="<?php echo $TAGS_DELETED; ?>" name="<?php echo $TAGS_DELETED; ?>" title="<?php echo $TAGS_DELETED_TITLE ?>">Deleted</button>
									</li>
									<li>
										<button type="submit" class="btn btn-link" id="<?php echo $TAGS_ALL; ?>" name="<?php echo $TAGS_ALL; ?>" title="<?php echo $TAGS_ALL_TITLE ?>">All</button>
									</li>
								</form>
							</li>
						</ul>
				</li>
				<?php
					}
				?>
					
				<!------------->
				<!-- Reports -->
				<!------------->
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Reports <span class="caret"></span></a>
						
					<ul class="dropdown-menu">
						<li>
							<form class="navbar-form" method="post">
								<li>
									<button type="submit" class="btn btn-link" id="<?php echo $REPORT_ACTIVE; ?>" name="<?php echo $REPORT_ACTIVE; ?>" title="<?php echo $REPORT_ACTIVE_TITLE ?>">Active</button>
								</li>
								<li>
									<button type="submit" class="btn btn-link" id="<?php echo $REPORT_REMAINING; ?>" name="<?php echo $REPORT_REMAINING; ?>" title="<?php echo $REPORT_REMAINING_TITLE ?>">Remaining</button>
								</li>
								<li>
									<button type="submit" class="btn btn-link" id="<?php echo $REPORT_COMPLETED; ?>" name="<?php echo $REPORT_COMPLETED; ?>" value="<?php echo $REPORT_COMPLETED; ?>" title="<?php echo $REPORT_COMPLETED_TITLE ?>">Completed</button>
								</li>
								<li>
									<button type="submit" class="btn btn-link" id="<?php echo $REPORT_DELETED; ?>" name="<?php echo $REPORT_DELETED; ?>" title="<?php echo $REPORT_DELETED_TITLE ?>">Deleted</button>
								</li>
								<li>
									<button type="submit" class="btn btn-link" id="<?php echo $REPORT_ALL; ?>" name="<?php echo $REPORT_ALL; ?>" title="<?php echo $REPORT_ALL_TITLE ?>">All</button>
								</li>
								<li>
									<button type="submit" class="btn btn-link" id="<?php echo $REPORT_SPARES; ?>" name="<?php echo $REPORT_SPARES; ?>" title="<?php echo $REPORT_SPARES_TITLE ?>">Spares</button>
								</li>
							</form>
						</li>
					</ul>
				</li>
					
				<!----------->
				<!-- Tools -->
				<!----------->
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Tools <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li>
								<button type="submit" class="btn btn-link" id="" name="" title="">IO Builder </button>
								<button type="submit" class="btn btn-link" id="" name="" title="">SD Key </button>
							</li>
						</ul> <!-- dropdown-menu -->
				</li> <!-- dropdown -->
				
			</ul>
			
			<!------------------>
			<!-- Navbar Right -->
			<!------------------>
			<ul class="nav navbar-nav navbar-right">
			
				<!------------------>
				<!-- IO Selection -->
				<!------------------>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">IO Selection <span class="caret"></span></a>
					<ul class="dropdown-menu scrollable-menu">
						<li>
							<?php
									$sql = "SELECT * FROM `rne_prj_$project`.`tags`" . (isset($_SESSION[$PRJ_SUB]) ? " WHERE `subproject` LIKE " . "'$_SESSION[$PRJ_SUB]'" : "") .  "ORDER BY `channel`, `slot`,`rack`,`plc`,`drop`";
									$result = $conn->query($sql);
									
									while ( $row = $result->fetch_assoc() ) { ?>
							<a><?php echo "PLC: " . $row['plc'] . "" . " Drop: " . $row['drop'] . "" . " Rack: " . $row['rack'] . "" . " Slot: " . $row['slot'] . "" . " Channel: " . $row['channel']; ?></a>
							<?php
								}
							?>
						</li>
					</ul>
				</li>
				
				<!------------>
				<!-- Search -->
				<!------------>
				<li>
					<form class="navbar-form navbar-left" role="search" action="#" method="post">
						<div class="form-group">
							<input class="form-control search" id="ex3 search" type="text" name="search" placeholder="Search" data-toggle="tooltip" title="Search">
						</div>
					</form>
				</li>
				
				<!-------------------->
				<!-- User Functions -->
				<!-------------------->
				<li>
					<form method="post" class="">
						<div class="btn-group" roll="group">
								<button type="submit button" class="btn btn-info navbar-btn glyphicon glyphicon-cog" name="<?php echo $ADMIN_BTN; ?>" id="<?php echo $ADMIN_BTN; ?>" value="<?php echo $ADMIN_BTN; ?>" data-toggle="tooltip" title="Configuration"></button>
						</div>
						<div class="btn-group" roll="group">
								<button type="submit button" class="btn btn-danger navbar-btn glyphicon glyphicon-log-out" name="<?php echo $LOGOUT_BTN; ?>" id="<?php echo $LOGOUT_BTN; ?>" value="<?php echo $LOGOUT_BTN; ?>" data-toggle="tooltip" title="Logout"></button>
						</div>
					</form>
				</li>
			</ul>
		</div>
	</div>
</nav>

<!------------->
<!-- Wrap-Up -->
<!------------->
<?php
	// Close any open MySQL connections
	$conn->close();
?>
