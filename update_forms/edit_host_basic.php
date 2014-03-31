<?php
include '../users/loginheader.php';
include '../functions.php';

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
		$DateBought = $row['DateBought'];
		$Country = $row['Country'];
		$RenewDate = $row['RenewDate'];
		$ServerLocations = $row['ServerLocations'];
		$TotalCost = $row['TotalCost'];
		$NameServers = $row['NameServers'];
		$EmailOnAccount = $row['Email'];
		$IPAddress = $row['IPAddress'];
	}
}
?>

<form id="edit_host_basic_details" action="update_forms/host_basic_details_action.php" method="post">
	<ul>
		<li>
			<p>Host Account: </p>
			<input class="select" type="text" name="HostAccount" value="<?php echo $HostAccount; ?>" autocomplete="off" />
			<?php echo HostAccountList(); ?>
		</li>
		<input name="HostAccount_Before" type="hidden" value="<?php echo $HostAccount; ?>" />
		<input name="HostAccount_Field" type="hidden" value="HostAccount" />
		<li>
			<p>Date Bought: </p>
			<input class="Date" type="text" name="DateBought" value="<?php echo $DateBought; ?>" />
		</li>
		<input name="DateBought_Before" type="hidden" value="<?php echo $DateBought; ?>" />
		<input name="DateBought_Field" type="hidden" value="DateBought" />
		<li>
			<p>Country: </p>
			<input class="select" type="text" name="Country" value="<?php echo $Country; ?>" autocomplete="off" />
			<ul id="Country" class="dropdown">
				<li><a href="javascript::void(0);">US</a></li>
				<li><a href="javascript::void(0);">CA</a></li>
				<li><a href="javascript::void(0);">AU</a></li>
			</ul>
		</li>
		<input name="Country_Before" type="hidden" value="<?php echo $Country; ?>" />
		<input name="Country_Field" type="hidden" value="Country" />
		<li>
			<p>Renew Date: </p>
			<input class="Date" type="text" name="RenewDate" value="<?php echo $RenewDate; ?>" />
		</li>
		<input name="RenewDate_Before" type="hidden" value="<?php echo $RenewDate; ?>" />
		<input name="RenewDate_Field" type="hidden" value="RenewDate" />
		<li>
			<p>Server Locations: </p>
			<input type="text" name="ServerLocations" value="<?php echo $ServerLocations; ?>" />
		</li>
		<input name="ServerLocations_Before" type="hidden" value="<?php echo $ServerLocations; ?>" />
		<input name="ServerLocations_Field" type="hidden" value="ServerLocations" />
		<li>
			<p>Total Cost: </p>
			<input type="text" name="TotalCost" value="<?php echo $TotalCost; ?>" />
		</li>
		<input name="TotalCost_Before" type="hidden" value="<?php echo $TotalCost; ?>" />
		<input name="TotalCost_Field" type="hidden" value="TotalCost" />
		<li>
			<p>Nameservers: </p>
			<input type="text" name="NameServers" value="<?php echo $NameServers; ?>" />
		</li>
		<input name="NameServers_Before" type="hidden" value="<?php echo $NameServers; ?>" />
		<input name="Nameservers_Field" type="hidden" value="Nameservers" />
		<li>
			<p>Email on Account: </p>
			<input class="select" type="text" name="EmailOnAccount" value="<?php echo $EmailOnAccount; ?>" autocomplete="off" />
			<ul id="EmailOnAccount" class="dropdown"> 
				<li><a href="javascript::void(0);">master@logicfury.com</a></li>
				<li><a href="javascript::void(0);">info@logicfury.com</a></li>
				<li><a href="javascript::void(0);">support@logicfury.com</a></li>
				<li><a href="javascript::void(0);">tech@logicfury.com</a></li>
			</ul>
		</li>
		<input name="EmailOnAccount_Before" type="hidden" value="<?php echo $EmailOnAccount; ?>" />
		<input name="EmailOnAccount_Field" type="hidden" value="EmailOnAccount" />
		<li>
			<p>IP Address: </p>
			<input type="text" name="IPAddress" value="<?php echo $IPAddress; ?>" />
		</li>
		<input name="IPAddress_Before" type="hidden" value="<?php echo $IPAddress; ?>" />
		<input name="IPAddress_Field" type="hidden" value="IPAddress" />
		<input name="TimeStamp" type="hidden" value="<?php echo date("Y-m-d h:m:s"); ?> " />
		<input name="User" type="hidden" value="<?php echo $user; ?>" />
		<input name="HostAccount" type="hidden" value="<?=$HostAccount?>" />
		<input name="DomainName" type="hidden" value="<?=$DomainName?>" />
		<input type="submit" class="popout_button" value="Submit">
	</ul>
</form>