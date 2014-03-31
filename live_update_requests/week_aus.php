<?php

	$curMonth = date('m');
	$curYear = date('Y');
	$beginWeek = date('d', strtotime('last sunday'));
	$endWeek = date('d', strtotime('this saturday'));
	$weekBegin = $curMonth . '/' . $beginWeek . '/' . $curYear;
	$weekEnd = $curMonth . '/' . $endWeek . '/' . $curYear;


	$con = new mysqli('localhost', 'root', 'root', 'ecoabsor_master');
	if (mysqli_connect_errno())	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$query = "SELECT * FROM DomainDetails WHERE Country='AU' AND DateComplete BETWEEN '$weekBegin' AND '$weekEnd'";

	$result = mysqli_query($con,$query);
	if (!$result){
		die('Error: ' . mysqli_error($con));
	}
	
	$week_AUSNumbers = mysqli_num_rows($result);
	
	echo $week_AUSNumbers;
	
	
?>