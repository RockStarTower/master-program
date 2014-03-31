<?php

	$newVertical = $_POST['Vertical'];
	$Vertical_Before = $_POST['Vertical_Before'];
	$Vertical_Field = $_POST['Vertical_Field'];
	$newStatus = $_POST['Status'];
	$Status_Before = $_POST['Status_Before'];
	$Status_Field = $_POST['Status_Field'];
	$newVersion = $_POST['Version'];
	$Version_Before = $_POST['Version_Before'];
	$Version_Field = $_POST['Version_Field'];
	$newType = $_POST['Type'];
	$Type_Before = $_POST['Type_Before'];
	$Type_Field = $_POST['Type_Field'];
	$newConverted = $_POST['Converted'];
	$Converted_Before = $_POST['Converted_Before'];
	$Converted_Field = $_POST['Converted_Field'];
	$newHostAccount = $_POST['HostAccount'];
	$HostAccount_Before = $_POST['HostAccount_Before'];
	$HostAccount_Field = $_POST['HostAccount_Field'];
	$newCountry = $_POST['Country'];
	$Country_Before = $_POST['Country_Before'];
	$Country_Field = $_POST['Country_Field'];
	$newRenewalDate = $_POST['RenewalDate'];
	$RenewalDate_Before = $_POST['RenewalDate_Before'];
	$RenewalDate_Field = $_POST['RenewalDate_Field'];
	$newLocation = $_POST['Location'];
	$Location_Before = $_POST['Location_Before'];
	$Location_Field = $_POST['Location_Field'];
	$newDateBought = $_POST['DateBought'];
	$DateBought_Before = $_POST['DateBought_Before'];
	$DateBought_Field = $_POST['DateBought_Field'];
	$newLanguage = $_POST['Language'];
	$Language_Before = $_POST['Language_Before'];
	$Language_Field = $_POST['Language_Field'];
	$newDateComplete = $_POST['DateComplete'];
	$DateComplete_Before = $_POST['DateComplete_Before'];
	$DateComplete_Field = $_POST['DateComplete_Field'];
	$TimeStamp = $_POST['TimeStamp'];
	$User = $_POST['User'];
	$DomainName = $_POST['DomainName'];

	$fields = array(
		$Vertical_Field,
		$Status_Field,
		$Version_Field,
		$Type_Field,
		$Converted_Field,
		$HostAccount_Field,
		$Country_Field,
		$RenewalDate_Field,
		$Location_Field,
		$DateBought_Field,
		$Language_Field,
		$DateComplete_Field,
	);

	$before_after = array(
		$newVertical => $Vertical_Before,
		$newStatus => $Status_Before,
		$newVersion => $Version_Before,
		$newType => $Type_Before,
		$newConverted => $Converted_Before,
		$newHostAccount => $HostAccount_Before,
		$newCountry => $Country_Before,
		$newRenewalDate => $RenewalDate_Before,
		$newLocation => $Location_Before,
		$newDateBought => $DateBought_Before,
		$newLanguage => $Language_Before,
		$newDateComplete => $DateComplete_Before,
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
	$update = "UPDATE DomainDetails SET Vertical='$newVertical',Status='$newStatus',Version='$newVersion',Type='$newType',Converted='$newConverted',HostAccount='$newHostAccount',Country='$newCountry',RenewalDate='$newRenewalDate',Location='$newLocation',DateBought='$newDateBought',Language='$newLanguage',DateComplete='$newDateComplete' WHERE Domain='$DomainName'";
	if (!mysqli_query($con,$update)) {
		die('Error: ' . mysqli_error($con));
	}
	header('Location: ../domain-accordion.php?DomainName=' . $DomainName . '&HostAccount=' . $newHostAccount);
?>