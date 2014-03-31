<?php

	$con = new mysqli('localhost', 'root', 'root', 'ecoabsor_master');
	if (mysqli_connect_errno())	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$query = "SELECT * FROM DomainDetails WHERE Status='Active'";

	$result = mysqli_query($con,$query);
	if (!$result){
		die('Error: ' . mysqli_error($con));
	}
	
	$Active = mysqli_num_rows($result);
	
	echo $Active;
	
	
?>