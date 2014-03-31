<?php

	$newCCOnAccount = $_POST['CCOnAccount'];
	$CCOnAccount_Before = $_POST['CCOnAccount_Before'];
	$CCOnAccount_Field = $_POST['CCOnAccount_Field'];
	$newRenewDate = $_POST['RenewDate'];
	$RenewDate_Before = $_POST['RenewDate_Before'];
	$RenewDate_Field = $_POST['RenewDate_Field'];
	$newYearlyHostingCost = $_POST['YearlyHostingCost'];
	$YearlyHostingCost_Before = $_POST['YearlyHostingCost_Before'];
	$YearlyHostingCost_Field = $_POST['YearlyHostingCost_Field'];
	$newYearlyDedicatedIPCost = $_POST['YearlyDedicatedIPCost'];
	$YearlyDedicatedIPCost_Before = $_POST['YearlyDedicatedIPCost_Before'];
	$YearlyDedicatedIPCost_Field = $_POST['YearlyDedicatedIPCost_Field'];
	$newTotalCost = $_POST['TotalCost'];
	$TotalCost_Before = $_POST['TotalCost_Before'];
	$TotalCost_Field = $_POST['TotalCost_Field'];
	$TimeStamp = $_POST['TimeStamp'];
	$User = $_POST['User'];
	$HostAccount = $_POST['HostAccount'];
	$DomainName = $_POST['DomainName'];

	$fields = array(
		$CCOnAccount_Field,
		$RenewDate_Field,
		$YearlyHostingCost_Field,
		$YearlyDedicatedIPCost_Field,
		$TotalCost_Field,
	);

	$before_after = array(
		$newCCOnAccount => $CCOnAccount_Before,
		$newRenewDate => $RenewDate_Before,
		$newYearlyHostingCost => $YearlyHostingCost_Before,
		$newYearlyDedicatedIPCost => $YearlyDedicatedIPCost_Before,
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
	$update = "UPDATE HostDetails SET CCOnAccount='$newCCOnAccount',RenewDate='$newRenewDate',YearlyCost='$newYearlyHostingCost',DedicatedIPCost='$newYearlyDedicatedIPCost',TotalCost='$newTotalCost' WHERE HostAccount='$HostAccount'";
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