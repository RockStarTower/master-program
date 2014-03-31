<?php

	$con = new mysqli('localhost', 'root', 'root', 'ecoabsor_master');
	if (mysqli_connect_errno())	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$query = "SELECT * FROM DomainDetails WHERE Status='Active' AND Type='Geo-Based'";

	$result = mysqli_query($con,$query);
	if (!$result){
		die('Error: ' . mysqli_error($con));
	}
	
	$active_Geo = mysqli_num_rows($result);
	
	echo $active_Geo;
	
	
?>