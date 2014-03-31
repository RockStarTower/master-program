<?php

	$con = new mysqli('localhost', 'root', 'root', 'ecoabsor_master');
	if (mysqli_connect_errno())	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$query = "SELECT
  Vertical,
  COUNT(*)
FROM
  DomainDetails
GROUP BY
  Vertical";
	$result = mysqli_query($con,$query);
	if (!$result){
		die('Error: ' . mysqli_error($con));
	}
	echo '<table>';
	while ($row = mysqli_fetch_array($result)) {
		echo '<tr>';
		echo '<td>' . $row['Vertical'] . '</td>';
		echo '<td>' . $row['COUNT(*)'] . '</tr>';
		echo '</tr>';
	}	
	echo '<table>';
	
?>