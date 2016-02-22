<div class="jumbotron device-info-jumbotron" style="width:100%; padding:0">
	<div class="container" style="width:100%">
		
		<!-- Header -->
		<h2><?php echo $NETWORK_HEADER; ?></h2>
		
		<?php
			// Calculate valid subnet masks (TRUE/FALSE)
			function isValidIPv4Mask($mask) {
				return ($result = log((ip2long($mask)^-1)+1,2)) != 0 && $result-(int)$result == 0;
			}

			// IP update request
			if ( isset($_POST["ipset-btn"]) ) {
				$address = $_POST["ipset-address"];
				$subnet = $_POST["ipset-subnet"];

				// Valididate IP and subnet				
				if ( !filter_var($address, FILTER_VALIDATE_IP) ) {
					echo $address . " is NOT a valid address <br />";
				}
				else if ( !isValidIPv4Mask($subnet) ) {
					echo $subnet . " is NOT a valid subnet <br />";
				}
				else {
					shell_exec("sudo bash /home/pi/documents/plcTagDB/bash/interfaceConfig.sh '$address' '$subnet'");
					exec("sudo service networking restart");
				}
			}
		?>
		
		<div class='table-responsive'>
			<table id='table-interface table-custom-sort' border='1' class='tag-interface table table-striped table-bordered table-hover table-condensed sortable'>
				<thead>
					<th>INTERFACE</th>
					<th>ADDRESS</th>
					<th>NETMASK</th>
				</thead>
				<tbody>
					<tr> <!-- eth0 -->
						<td><label for="ex3">eth0 (dhcp)</label></td>
						<td><label for="ex3"><?php echo shell_exec('/sbin/ifconfig eth0 | grep \'inet addr:\' | cut -d: -f2 | awk \'{ print $1}\' '); ?></label></td>
						<td><label for="ex3"><?php echo shell_exec('/sbin/ifconfig eth0 | grep \'Mask:\' | cut -d: -f4 | awk \'{ print $1}\''); ?></label></td>
					</tr>
					<tr> <!-- eth0:0 -->
						<td><label for="ex3">eth0:0 (static)</label></td>
						<td><label for="ex3"><?php echo shell_exec('/sbin/ifconfig eth0:0 | grep \'inet addr:\' | cut -d: -f2 | awk \'{ print $1}\' '); ?></label></td>
						<td><label for="ex3"><?php echo shell_exec('/sbin/ifconfig eth0:0 | grep \'Mask:\' | cut -d: -f4 | awk \'{ print $1}\''); ?></label></td>
					</tr>
					<tr> <!-- eth0:1 -->
						<td><label for="ex3">eth0:1 (static-user)</label></td>
						<td><label for="ex3"><?php echo shell_exec('/sbin/ifconfig eth0:1 | grep \'inet addr:\' | cut -d: -f2 | awk \'{ print $1}\' '); ?></label></td>
						<td><label for="ex3"><?php echo shell_exec('/sbin/ifconfig eth0:1 | grep \'Mask:\' | cut -d: -f4 | awk \'{ print $1}\''); ?></label></td>
					</tr>
				</tbody>
				<tfoot>
				</tfoot>
			</table>
		</div>
		
		<form method="post" name="ip-form">
			<label>Address:&nbsp</label><input id="ipset-address" name="ipset-address" placeholder="<?php echo shell_exec('/sbin/ifconfig eth0:1 | grep \'inet addr:\' | cut -d: -f2 | awk \'{ print $1}\' '); ?>" type="ipset-address" tabindex="2">
		
			<label>Netmask:&nbsp</label><input id="ipset-subnet" name="ipset-subnet" placeholder="<?php echo shell_exec('/sbin/ifconfig eth0:1 | grep \'Mask:\' | cut -d: -f4 | awk \'{ print $1}\''); ?>" type="ipset-subnet" tabindex="3">
			<br /><br />
			<button type="submit button" class="btn btn-success" name="ipset-btn" onclick="return confirm('Are you sure?')">Update eth0:1</button>
		</form>
	</div> <!-- ./container -->
</div> <!-- ./jumbotron -->
