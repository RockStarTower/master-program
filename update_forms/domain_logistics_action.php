<?php

	$newManageWPAccount = $_POST['ManageWPAccount'];
	$ManageWPAccount_Before = $_POST['ManageWPAccount_Before'];
	$ManageWPAccount_Field = $_POST['ManageWPAccount_Field'];
	$newTheme = $_POST['Theme'];
	$Theme_Before = $_POST['Theme_Before'];
	$Theme_Field = $_POST['Theme_Field'];
	$newWireframe = $_POST['Wireframe'];
	$Wireframe_Before = $_POST['Wireframe_Before'];
	$Wireframe_Field = $_POST['Wireframe_Field'];
	$newAuthorNickname = $_POST['AuthorNickname'];
	$AuthorNickname_Before = $_POST['AuthorNickname_Before'];
	$AuthorNickname_Field = $_POST['AuthorNickname_Field'];
	$newDatabaseName = $_POST['DatabaseName'];
	$DatabaseName_Before = $_POST['DatabaseName_Before'];
	$DatabaseName_Field = $_POST['DatabaseName_Field'];
	$newDatabaseUser = $_POST['DatabaseUser'];
	$DatabaseUser_Before = $_POST['DatabaseUser_Before'];
	$DatabaseUser_Field = $_POST['DatabaseUser_Field'];
	$newDatabasePassword = $_POST['DatabasePassword'];
	$DatabasePassword_Before = $_POST['DatabasePassword_Before'];
	$DatabasePassword_Field = $_POST['DatabasePassword_Field'];
	$newDatabaseHost = $_POST['DatabaseHost'];
	$DatabaseHost_Before = $_POST['DatabaseHost_Before'];
	$DatabaseHost_Field = $_POST['DatabaseHost_Field'];
	$TimeStamp = $_POST['TimeStamp'];
	$User = $_POST['User'];
	$DomainName = $_POST['DomainName'];

	$fields = array(
		$ManageWPAccount_Field,
		$Theme_Field,
		$Wireframe_Field,
		$AuthorNickname_Field,
		$DatabaseName_Field,
		$DatabaseUser_Field,
		$DatabasePassword_Field,
		$DatabaseHost_Field,
	);

	$before_after = array(
		$newManageWPAccount => $ManageWPAccount_Before,
		$newTheme => $Theme_Before,
		$newWireframe => $Wireframe_Before,
		$newAuthorNickname => $AuthorNickname_Before,
		$newDatabaseName => $DatabaseName_Before,
		$newDatabaseUser => $DatabaseUser_Before,
		$newDatabasePassword => $DatabasePassword_Before,
		$newDatabaseHost => $DatabaseHost_Before,
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
	$update = "UPDATE DomainDetails SET ManageWPAccount='$newManageWPAccount',Theme='$newTheme',Wireframe='$newWireframe',AuthorNickname='$newAuthorNickname',DBName='$newDatabaseName',DBUser='$newDatabaseUser',DBPass='$newDatabasePassword',DBHost='$newDatabaseHost' WHERE Domain='$DomainName'";
	if (!mysqli_query($con,$update)) {
		die('Error: ' . mysqli_error($con));
	}
	header('Location: ../domain-accordion.php?DomainName=' . $DomainName . '&HostAccount=' . $newHostAccount);
?>