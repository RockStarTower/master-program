<?php

	$newRegistrar = $_POST['Registrar'];
	$Registrar_Before = $_POST['Registrar_Before'];
	$Registrar_Field = $_POST['Registrar_Field'];
	$newRenewalDate = $_POST['RenewalDate'];
	$RenewalDate_Before = $_POST['RenewalDate_Before'];
	$RenewalDate_Field = $_POST['RenewalDate_Field'];
	$newRenewalCost = $_POST['RenewalCost'];
	$RenewalCost_Before = $_POST['RenewalCost_Before'];
	$RenewalCost_Field = $_POST['RenewalCost_Field'];
	$newWhoIsRenewal = $_POST['WhoIsRenewal'];
	$WhoIsRenewal_Before = $_POST['WhoIsRenewal_Before'];
	$WhoIsRenewal_Field = $_POST['WhoIsRenewal_Field'];
	$newWhoisCost = $_POST['WhoisCost'];
	$WhoisCost_Before = $_POST['WhoisCost_Before'];
	$WhoisCost_Field = $_POST['WhoisCost_Field'];
	$newInitialCost = $_POST['InitialCost'];
	$InitialCost_Before = $_POST['InitialCost_Before'];
	$InitialCost_Field = $_POST['InitialCost_Field'];
	$newTotalCost = $_POST['TotalCost'];
	$TotalCost_Before = $_POST['TotalCost_Before'];
	$TotalCost_Field = $_POST['TotalCost_Field'];
	$TimeStamp = $_POST['TimeStamp'];
	$User = $_POST['User'];
	$DomainName = $_POST['DomainName'];
	$HostAccount = $_POST['HostAccount'];

	$fields = array(
		$Registrar_Field,
		$RenewalDate_Field,
		$RenewalCost_Field,
		$WhoIsRenewal_Field,
		$WhoisCost_Field,
		$InitialCost_Field,
		$TotalCost_Field,
	);

	$before_after = array(
		$newRegistrar => $Registrar_Before,
		$newRenewalDate => $RenewalDate_Before,
		$newRenewalCost => $RenewalCost_Before,
		$newWhoIsRenewal => $WhoIsRenewal_Before,
		$newWhoisCost => $WhoisCost_Before,
		$newInitialCost => $InitialCost_Before,
		$newTotalCost => $TotalCost_Before,
	);

	$con = mysqli_connect('localhost', 'root', 'root', 'ecoabsor_master');
	$counter = 0;
	foreach ($before_after as $key => $val) {
		$query = "INSERT INTO `ChangeHistory`(`UserID`, `FieldsChanged`, `Before`, `After`) VALUES ('$User','$fields[$counter]','$val','$key')";
		if ($key != $val) {
			if (!mysqli_query($con,$query))	{
				die('Error: ' . mysqli_error($con));
			}
		}
		$counter += 1;
	}
	$update = "UPDATE DomainDetails SET Registrar='$newRegistrar',RenewalDate='$newRenewalDate',RenewalCost='$newRenewalCost',WhoIsRenewal='$newWhoIsRenewal',WhoisCost='$newWhoisCost',InitialCost='$newInitialCost',TotalCost='$newTotalCost' WHERE Domain='$DomainName'";
	if (!mysqli_query($con,$update)) {
		die('Error: ' . mysqli_error($con));
	}	
	header('Location: ../domain-accordion.php?DomainName=' . $DomainName . '&HostAccount=' . $newHostAccount);
?>