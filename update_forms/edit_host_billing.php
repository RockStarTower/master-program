<?php
include '../users/loginheader.php';
if(isset($_GET['DomainName'])) {
	$DomainName = $_GET['DomainName'];
} else {
$DomainName = '';
}
$HostAccount = $_GET['HostAccount'];

$con = mysqli_connect('localhost', 'root', 'root', 'ecoabsor_master');
$request = "SELECT * FROM HostDetails WHERE HostAccount='$HostAccount'";
if ($result = mysqli_query($con, $request) or die("Error: ".mysqli_error($con))) {
	while ( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
		// variable for HostDomain exists - $HostAccount
		$CCOnAccount = $row['CCOnAccount'];
		$RenewDate = $row['RenewDate'];
		$YearlyHostingCost = $row['YearlyCost'];
		$YearlyDedicatedIPCost = $row['DedicatedIPCost'];
		$TotalCost = $row['TotalCost'];
	}
}
?>

<form id="edit_host_billing_info" action="update_forms/host_billing_info_action.php" method="post">
	<ul>
		<li>
			<p>Credit Card on Account: </p>
			<input class="select" type="text" name="CCOnAccount" value="<?php echo $CCOnAccount; ?>" autocomplete="off" />
			<ul id="CCOnAccount" class="dropdown">
				<li><a href="javascript::void(0);">Michael Bennett</a></li>
				<li><a href="javascript::void(0);">Bart Gibby</a></li>
				<li><a href="javascript::void(0);">Travis Thorpe</a></li>
			</ul>
		</li>
		<input name="CCOnAccount_Before" type="hidden" value="<?php echo $CCOnAccount; ?>" />
		<input name="CCOnAccount_Field" type="hidden" value="CCOnAccount" />
		<li>
			<p>Renewal Date: </p>
			<input class="Date"  type="text" name="RenewDate" value="<?php echo $RenewDate; ?>" />
		</li>
		<input name="RenewDate_Before" type="hidden" value="<?php echo $RenewDate; ?>" />
		<input name="RenewDate_Field" type="hidden" value="RenewDate" />
		<li>
			<p>Yearly Hosting Cost: </p>
			<input class="add" type="text" name="YearlyHostingCost" value="<?php echo $YearlyHostingCost; ?>" />
		</li>
		<input name="YearlyHostingCost_Before" type="hidden" value="<?php echo $YearlyHostingCost; ?>" />
		<input name="YearlyHostingCost_Field" type="hidden" value="YearlyHostingCost" />
		<li>
			<p>Yearly Dedicated IP Cost: </p>
			<input class="add" type="text" name="YearlyDedicatedIPCost" value="<?php echo $YearlyDedicatedIPCost; ?>" />
		</li>
		<input name="YearlyDedicatedIPCost_Before" type="hidden" value="<?php echo $YearlyDedicatedIPCost; ?>" />
		<input name="YearlyDedicatedIPCost_Field" type="hidden" value="YearlyDedicatedIPCost" />
		<li>
			<p>Total Cost: </p>
			<input class="TotalCost" type="text" name="TotalCost" value="<?php echo $TotalCost; ?>" />
		</li>
		<input name="TotalCost_Before" type="hidden" value="<?php echo $TotalCost; ?>" />
		<input name="TotalCost_Field" type="hidden" value="TotalCost" />
		<input name="TimeStamp" type="hidden" value="<?php echo date("Y-m-d h:m:s"); ?> " />
		<input name="User" type="hidden" value="<?php echo $user; ?>" />
		<input name="HostAccount" type="hidden" value="<?=$HostAccount?>" />
		<input name="DomainName" type="hidden" value="<?=$DomainName?>" />
		<input type="submit" class="popout_button" value="Submit">
	</ul>
</form>