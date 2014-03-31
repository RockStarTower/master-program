<?php

include '../functions.php';
include '../users/loginheader.php';
$DomainName = $_GET['DomainName'];

$con = mysqli_connect('localhost', 'root', 'root', 'ecoabsor_master');
$request = "SELECT * FROM DomainDetails WHERE Domain='$DomainName'";
if ($result = mysqli_query($con, $request) or die("Error: ".mysqli_error($con))) {
	while ( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
		// variable for HostDomain exists - $DomainName
		$Registrar = $row['Registrar'];
		$RenewalDate = $row['RenewalDate'];
		$RenewalCost = $row['RenewalCost'];
		$WhoIsRenewal = $row['WhoIsRenewal'];
		$WhoisCost = $row['WhoisCost'];
		$InitialCost = $row['InitialCost'];
		$TotalCost = $row['TotalCost'];
	}
}
?>

<form id="edit_domain_registration_info" action="update_forms/domain_registration_action.php" method="post">
	<ul>
		<li>
			<p>Registrar: </p>
			<input class="select" type="text" name="Registrar" value="<?php echo $Registrar; ?>" autocomplete="off" />
			<?php echo RegistrarList(); ?>
		</li>
		<input name="Registrar_Before" type="hidden" value="<?php echo $Registrar; ?>" />
		<input name="Registrar_Field" type="hidden" value="Registrar" />
		<li>
			<p>Renewal Date: </p>
			<input class="Date" type="text" name="RenewalDate" value="<?php echo $RenewalDate; ?>" />
		</li>
		<input name="RenewalDate_Before" type="hidden" value="<?php echo $RenewalDate; ?>" />
		<input name="RenewalDate_Field" type="hidden" value="RenewalDate" />	
		<li>
			<p>Renewal Cost: </p>
			<input type="text" name="RenewalCost" value="<?php echo $RenewalCost; ?>" />
		</li>
		<input name="RenewalCost_Before" type="hidden" value="<?php echo $RenewalCost; ?>" />
		<input name="RenewalCost_Field" type="hidden" value="RenewalCost" />
		<li>
			<p>Whois Renewal: </p>
			<input class="Date" type="text" name="WhoIsRenewal" value="<?php echo $WhoIsRenewal; ?>" />
		</li>
		<input name="WhoIsRenewal_Before" type="hidden" value="<?php echo $WhoIsRenewal; ?>" />
		<input name="WhoIsRenewal_Field" type="hidden" value="WhoIsRenewal" />
		<li>
			<p>Whois Cost: </p>
			<input class="add" type="text" name="WhoisCost" value="<?php echo $WhoisCost; ?>" />
		</li>
		<input name="WhoisCost_Before" type="hidden" value="<?php echo $WhoisCost; ?>" />
		<input name="WhoisCost_Field" type="hidden" value="WhoisCost" />
		<li>
			<p>Initial Cost: </p>
			<input class="add" type="text" name="InitialCost" value="<?php echo $InitialCost; ?>" />
		</li>
		<input name="InitialCost_Before" type="hidden" value="<?php echo $InitialCost; ?>" />
		<input name="InitialCost_Field" type="hidden" value="InitialCost" />
		<li>
			<p>Total Cost: </p>
			<input class="TotalCost" type="text" name="TotalCost" value="<?php echo $TotalCost; ?>" />
		</li>
		<input name="TotalCost_Before" type="hidden" value="<?php echo $TotalCost; ?>" />
		<input name="TotalCost_Field" type="hidden" value="TotalCost" />
		<input name="TimeStamp" type="hidden" value="<?php echo date("Y-m-d h:m:s"); ?> " />
		<input name="User" type="hidden" value="<?php echo $user; ?>" />
		<input name="DomainName" type="hidden" value="<?=$DomainName?>" />
		<input name="HostAccount" type="hidden" value="<?=$HostAccount?>" />
		<input type="submit" class="popout_button" value="Submit">
	</ul>
</form>