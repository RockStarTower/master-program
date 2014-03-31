<?php

	$newNotes = addslashes($_POST['DomainNotes']);
	$Notes_Before = addslashes($_POST['DomainNotes_Before']);
	$Notes_Field = 'DomainNotes';
	$TimeStamp = $_POST['TimeStamp'];
	$User = $_POST['User'];
	$DomainName = $_POST['DomainName'];
	
	$con = mysqli_connect('localhost', 'root', 'root', 'ecoabsor_master');
	$query = "INSERT INTO `ChangeHistory`(`UserID`, `FieldsChanged`, `Before`, `After`) VALUES ('$User','$Notes_Field','$Notes_Before','$newNotes')";
	if ($Notes_Before != $newNotes) {
		if (!mysqli_query($con,$query))	{
			die('Error: ' . mysqli_error($con));
		}
	}

	$update = "UPDATE DomainDetails SET DomainNotes='$newNotes' WHERE Domain='$DomainName'";
	if (!mysqli_query($con,$update)) {
		die('Error: ' . mysqli_error($con));
	}	
?>