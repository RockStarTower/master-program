<?php

	$newNotes = addslashes($_POST['HostNotes']);
	$Notes_Before = addslashes($_POST['HostNotes_Before']);
	$Notes_Field = 'HostNotes';
	$TimeStamp = $_POST['TimeStamp'];
	$User = $_POST['User'];
	$HostAccount = $_POST['HostAccount'];
	
	$con = mysqli_connect('localhost', 'root', 'root', 'ecoabsor_master');
	$query = "INSERT INTO `ChangeHistory`(`UserID`, `FieldsChanged`, `Before`, `After`) VALUES ('$User','$Notes_Field','$Notes_Before','$newNotes')";
	if ($Notes_Before != $newNotes) {
		if (!mysqli_query($con,$query))	{
			die('Error: ' . mysqli_error($con));
		}
	}

	$update = "UPDATE HostDetails SET HostNotes='$newNotes' WHERE HostAccount='$HostAccount'";
	if (!mysqli_query($con,$update)) {
		die('Error: ' . mysqli_error($con));
	}	
?>