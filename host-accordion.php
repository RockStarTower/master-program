<?php
include 'users/loginheader.php';
include 'header.php';
sec_session_start();
if(login_check($mysqli) == true) {
?>
<?php 
$HostAccount = $_GET['HostAccount'];
$con = mysqli_connect('localhost', 'root', 'root', 'ecoabsor_master');
$request = "SELECT * FROM HostDetails WHERE HostAccount='$HostAccount'";
if ($result = mysqli_query($con, $request) or die("Error: ".mysqli_error($con))) {
	while ( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
		$DateBought = $row['DateBought'];
		$Country = $row['Country'];
		$RenewDate = $row['RenewDate'];
		$ServerLocations = $row['ServerLocations'];
		$TotalCost = $row['TotalCost'];
		$NameServers = $row['NameServers'];
		$Email = $row['Email'];
		$IPAddress = $row['IPAddress'];
		$CpanelURL = $row['cPanelURL'];
		$CpanelUsername = $row['cPanelUser'];
		$CpanelPassword = $row['cPanelPass'];
		$BillingURL = $row['BillingURL'];
		$BillingUsername = $row['BillingUser'];
		$BillingPassword = $row['BillingPass'];
		$FTPUsername = $row['FTPUser'];
		$FTPPassword = $row['FTPPass'];
		$SecurityPIN = $row['PIN'];
		$SecurityAnswer = $row['SecurityAnswer'];
		$CCOnAccount = $row['CCOnAccount'];
		$YearlyHostingCost = $row['YearlyCost'];
		$YearlyDedicatedIPCost = $row['DedicatedIPCost'];
		$HostNotes = stripslashes($row['HostNotes']);
	}
}

?>
<div class="page-wrap">
	<div id="tabs">
		<div id="accordion">
			<h3>Basic Details</h3>
			<div>
				<a id="host_basic" class="edit_link" name="<?=$HostAccount?>" href="javascript:void(0)">Edit</a>
				<table>
					<tbody>
						<tr>
							<td><strong>Host Account:</strong></td>
							<td><?=$HostAccount?></td>
							<td><strong>Date Bought:</strong></td>
							<td><?=$DateBought?></td>
						</tr>
						<tr>
							<td><strong>Country:</strong></td>
							<td><?=$Country?></td>
							<td><strong>Renew Date:</strong></td>
							<td><?=$RenewDate?></td>
						</tr>
						<tr>
							<td><strong>Server Locations:</strong></td>
							<td><?=$ServerLocations?></td>
							<td><strong>Total Cost:</strong></td>
							<td><?=$TotalCost?></td>
						</tr>
						<tr>
							<td><strong>Nameservers:</strong></td>
							<td><?=$NameServers?></td>
							<td><strong>Email on Account:</strong></td>
							<td><?=$Email?></td>
						</tr>
						<tr>
							<td><strong>IP Address:</strong></td>
							<td><?=$IPAddress?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<h3>Login Information</h3>
			<div>
				<a id="host_login" class="edit_link" name="<?=$HostAccount?>" href="javascript:void(0)">Edit</a>
				<table>
					<thead>
						<tr>
							<th>Cpanel</th>
							<th>Billing</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><strong>CPanel URL:</strong></td>
							<td><?=$CpanelURL?></td>
							<td><strong>Billing URL:</strong></td>
							<td><?=$BillingURL?></td>
						</tr>
						<tr>
							<td><strong>CPanel Username:</strong></td>
							<td><?=$CpanelUsername?></td>
							<td><strong>Billing Username:</strong></td>
							<td><?=$BillingUsername?></td>
						</tr>
						<tr>
							<td><strong>CPanel Password:</strong></td>
							<td><?=$CpanelPassword?></td>
							<td><strong>Billing Password:</strong></td>
							<td><?=$BillingPassword?></td>
						</tr>
					</tbody>
				</table>
				<table>
					<thead>
						<tr>
							<th>FTP</th>
							<th>Security</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><strong>FTP Username:</strong></td>
							<td><?=$FTPUsername?></td>
							<td><strong>Security PIN:</strong></td>
							<td><?=$SecurityPIN?></td>
						</tr>
						<tr>
							<td><strong>FTP Password:</strong></td>
							<td><?=$FTPPassword?></td>
							<td><strong>Security Question Answer:</strong></td>
							<td><?=$SecurityAnswer?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<h3>Billing Information</h3>
			<div>
				<a id="host_billing" class="edit_link" name="<?=$HostAccount?>" href="javascript:void(0)">Edit</a>
				<table>
					<tbody>
						<tr>
							<td><strong>Credit Card on Account:</strong></td>
							<td><?=$CCOnAccount?></td>
						</tr>
						<tr>
							<td><strong>Renewal Date:</strong></td>
							<td><?=$RenewDate?></td>
						</tr>
						<tr>
							<td><strong>Yearly Hosting Cost:</strong></td>
							<td>&#36;<?=$YearlyHostingCost?></td>
						</tr>
						<tr>
							<td><strong>Yearly Dedicated IP Cost:</strong></td>
							<td>&#36;<?=$YearlyDedicatedIPCost?></td>
						</tr>
						<tr>
							<td><strong>Total Cost:</strong></td>
							<td>&#36;<?=$TotalCost?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<form id="HostNotes_Form" action="" method="post">
			<?php if ($HostNotes != '') { echo '<img class="vadernotes" src="images/vadernotes.png" />'; } ?>
			<a id="Host_Notes_img" class="notes_img" href="javascript:void(0);"><img src="images/Host-Notes.png" /></a>
			<span class="hostupdated"></span>
			<textarea id="HostNotes" name="HostNotes" rows="25" cols="30"><?=$HostNotes?></textarea>
			<input id="HostNotes_Before" name="HostNotes_Before" type="hidden" value="<?=$HostNotes?>" />
			<input id="Host_Time" name="TimeStamp" type="hidden" value="<?php echo date("h:m:s"); ?> " />
			<input id="Host_User" name="User" type="hidden" value="<?php echo $user; ?>" />
			<input id="Host_Account" name="HostAccount" type="hidden" value="<?=$HostAccount?>" />
		</form>
	</div>	
</div>
<div id="edit_wrap">
	<div id="edit_wrapper">
		<a class="close" href="javascript:void(0)">Close</a>
		<div id="edit"></div>
	</div>
</div>
<?php
} else {?>
	<div id="notauthorized">
   <p>You are not authorized to access this page.</p>
   <a href="users/login.php">Please Login</a></div><?php
}
include 'footer.php';
?>