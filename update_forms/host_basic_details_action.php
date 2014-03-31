<?php

	$newHostAccount = $_POST['HostAccount'];
	$HostAccount_Before = $_POST['HostAccount_Before'];
	$HostAccount_Field = $_POST['HostAccount_Field'];
	$newDateBought = $_POST['DateBought'];
	$DateBought_Before = $_POST['DateBought_Before'];
	$DateBought_Field = $_POST['DateBought_Field'];
	$newCountry = $_POST['Country'];
	$Country_Before = $_POST['Country_Before'];
	$Country_Field = $_POST['Country_Field'];
	$newRenewDate = $_POST['RenewDate'];
	$RenewDate_Before = $_POST['RenewDate_Before'];
	$RenewDate_Field = $_POST['RenewDate_Field'];
	$newServerLocations = $_POST['ServerLocations'];
	$ServerLocations_Before = $_POST['ServerLocations_Before'];
	$ServerLocations_Field = $_POST['ServerLocations_Field'];
	$newTotalCost = $_POST['TotalCost'];
	$TotalCost_Before = $_POST['TotalCost_Before'];
	$TotalCost_Field = $_POST['TotalCost_Field'];
	$newNameServers = $_POST['NameServers'];
	$NameServers_Before = $_POST['NameServers_Before'];
	$Nameservers_Field = $_POST['Nameservers_Field'];
	$newEmailOnAccount = $_POST['EmailOnAccount'];
	$EmailOnAccount_Before = $_POST['EmailOnAccount_Before'];
	$EmailOnAccount_Field = $_POST['EmailOnAccount_Field'];
	$newIPAddress = $_POST['IPAddress'];
	$IPAddress_Before = $_POST['IPAddress_Before'];
	$IPAddress_Field = $_POST['IPAddress_Field'];
	$TimeStamp = $_POST['TimeStamp'];
	$User = $_POST['User'];
	$HostAccount = $_POST['HostAccount'];
	$DomainName = $_POST['DomainName'];

	$fields = array(
		$HostAccount_Field,
		$DateBought_Field,
		$Country_Field,
		$RenewDate_Field,
		$ServerLocations_Field,
		$TotalCost_Field,
		$Nameservers_Field,
		$EmailOnAccount_Field,
		$IPAddress_Field,
	);

	$before_after = array(
		$newHostAccount => $HostAccount_Before,
		$newDateBought => $DateBought_Before,
		$newCountry => $Country_Before,
		$newRenewDate => $RenewDate_Before,
		$newServerLocations => $ServerLocations_Before,
		$newTotalCost => $TotalCost_Before,
		$newNameServers => $NameServers_Before,
		$newEmailOnAccount => $EmailOnAccount_Before,
		$newIPAddress => $IPAddress_Before,
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
	$update = "UPDATE HostDetails SET HostAccount='$newHostAccount',DateBought='$newDateBought',Country='$newCountry',RenewDate='$newRenewDate',ServerLocations='$newServerLocations',NameServers='$newNameServers',Email='$newEmailOnAccount',IPAddress='$newIPAddress' WHERE HostAccount='$newHostAccount'";
	if (!mysqli_query($con,$update)) {
		die('Error: ' . mysqli_error($con));
	}
	$Query_String = '';
	if ($DomainName == '') {
		$Query_String = '../host-accordion.php?HostAccount=' . $HostAccount;
	} else {
		$Query_String = '../domain-accordion.php?DomainName=' . $DomainName . '&HostAccount=' . $HostAccount;
	}
	header('Location: ' . $Query_String);
?>