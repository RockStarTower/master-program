<?php
	
	$HostAccount = $_POST['HostAccount'];
		
	$con = mysqli_connect('localhost', 'root', 'root', 'ecoabsor_master');
	if (mysqli_connect_errno())	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$query = "SELECT * FROM HostDetails WHERE HostAccount='$HostAccount'";

	$result = mysqli_query($con,$query);
	if (!$result){
		die('Error: ' . mysqli_error($con));
	}
	
	$Check = mysqli_num_rows($result);
	
	if ($Check == 1) {
		echo 'duplicate';
	}  else {
		echo 'not duplicate';
	}
?>