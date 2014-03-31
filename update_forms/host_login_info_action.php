<?php

	$newCpanelURL = $_POST['CpanelURL'];
	$CpanelURL_Before = $_POST['CpanelURL_Before'];
	$CpanelURL_Field = $_POST['CpanelURL_Field'];
	$newCpanelUsername = $_POST['CpanelUsername'];
	$CpanelUsername_Before = $_POST['CpanelUsername_Before'];
	$CpanelUsername_Field = $_POST['CpanelUsername_Field'];
	$newCpanelPassword = $_POST['CpanelPassword'];
	$CpanelPassword_Before = $_POST['CpanelPassword_Before'];
	$CpanelPassword_Field = $_POST['CpanelPassword_Field'];
	$newFTPHost = $_POST['FTPHost'];
	$FTPHost_Before = $_POST['FTPHost_Before'];
	$FTPHost_Field = $_POST['FTPHost_Field'];
	$newFTPUsername = $_POST['FTPUsername'];
	$FTPUsername_Before = $_POST['FTPUsername_Before'];
	$FTPUsername_Field = $_POST['FTPUsername_Field'];
	$newFTPPassword = $_POST['FTPPassword'];
	$FTPPassword_Before = $_POST['FTPPassword_Before'];
	$FTPPassword_Field = $_POST['FTPPassword_Field'];
	$newBillingURL = $_POST['BillingURL'];
	$BillingURL_Before = $_POST['BillingURL_Before'];
	$BillingURL_Field = $_POST['BillingURL_Field'];
	$newBillingUsername = $_POST['BillingUsername'];
	$BillingUsername_Before = $_POST['BillingUsername_Before'];
	$BillingUsername_Field = $_POST['BillingUsername_Field'];
	$newBillingPassword = $_POST['BillingPassword'];
	$BillingPassword_Before = $_POST['BillingPassword_Before'];
	$BillingPassword_Field = $_POST['BillingPassword_Field'];
	$newSecurityPIN = $_POST['SecurityPIN'];
	$SecurityPIN_Before = $_POST['SecurityPIN_Before'];
	$SecurityPIN_Field = $_POST['SecurityPIN_Field'];
	$newSecurityAnswer = $_POST['SecurityAnswer'];
	$SecurityAnswer_Before = $_POST['SecurityAnswer_Before'];
	$SecurityAnswer_Field = $_POST['SecurityAnswer_Field'];
	$TimeStamp = $_POST['TimeStamp'];
	$User = $_POST['User'];
	$HostAccount = $_POST['HostAccount'];
	$DomainName = $_POST['DomainName'];

	$fields = array(
		$CpanelURL_Field,
		$CpanelUsername_Field,
		$CpanelPassword_Field,
		$FTPHost_Field,
		$FTPUsername_Field,
		$FTPPassword_Field,
		$BillingURL_Field,
		$BillingUsername_Field,
		$BillingPassword_Field,
		$SecurityPIN_Field,
		$SecurityAnswer_Field,
	);

	$before_after = array(
		$newCpanelURL => $CpanelURL_Before,
		$newCpanelUsername => $CpanelUsername_Before,
		$newCpanelPassword => $CpanelPassword_Before,
		$newFTPHost => $FTPHost_Before,
		$newFTPUsername => $FTPUsername_Before,
		$newFTPPassword => $FTPPassword_Before,
		$newBillingURL => $BillingURL_Before,
		$newBillingUsername => $BillingUsername_Before,
		$newBillingPassword => $BillingPassword_Before,
		$newSecurityPIN => $SecurityPIN_Before,
		$newSecurityAnswer => $SecurityAnswer_Before,
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
	$update = "UPDATE HostDetails SET cPanelURL='$newCpanelURL',cPanelUser='$newCpanelUsername',cPanelPass='$newCpanelPassword',FTPHost='$newFTPHost',FTPUser='$newFTPUsername',FTPPass='$newFTPPassword',BillingURL='$newBillingURL',BillingUser='$newBillingUsername',BillingPass='$newBillingPassword',PIN='$newSecurityPIN',SecurityAnswer='$newSecurityAnswer' WHERE HostAccount='$HostAccount'";
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