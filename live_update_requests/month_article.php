<?php

	$curMonth = date('m');
	$curYear = date('Y');
	$monthBegin = $curMonth . '/01/' . $curYear;
	$monthEnd = $curMonth . '/31/' . $curYear;


	$con = new mysqli('localhost', 'root', 'root', 'ecoabsor_master');
	if (mysqli_connect_errno())	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$query = "SELECT * FROM DomainDetails WHERE Type='Article' AND DateComplete BETWEEN '$monthBegin' AND '$monthEnd'";

	$result = mysqli_query($con,$query);
	if (!$result){
		die('Error: ' . mysqli_error($con));
	}
	
	$month_ArticleNumbers = mysqli_num_rows($result);
	
	echo $month_ArticleNumbers;
	
	
?>