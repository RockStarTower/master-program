<?php

$DomainName = $_POST['DomainName'];
$HostAccount = $POST['HostAccount'];
$Vertical = $_POST['Vertical'];
$Type = $_POST['Type'];
$Location = $_POST['Location'];
$Language = $_POST['Language'];
$Status = $_POST['Status'];
$PR = $_POST['PR'];
$DA = $_POST['DA'];
$PA = $_POST['PA'];
$BackLinks = $_POST['BackLinks'];
$MozTrust = $_POST['MozTrust'];
$DomainNotes = htmlspecialchars( $_POST['DomainNotes'] );
$TimeStamp = $_POST['TimeStamp'];

$con = new mysqli('localhost', 'ecoabsor_master', 'B00st3r!', 'ecoabsor_master');
if (mysqli_connect_errno())	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

    $query = "INSERT INTO DomainDetails (Domain, HostAccount, Vertical, Type, Location, Language, Status, PR, DA, PA, BackLinks, MozTrust, DomainNotes, RevisedTimeStamp) VALUES('$DomainName','$HostAccount','$Vertical','$Type','$Location','$Language','$Status','$PR','$DA','$PA','$BackLinks','$MozTrust','$DomainNotes','$TimeStamp')";


    if (!mysqli_query($con,$query))	{
		die('Error: ' . mysqli_error($con));
	}
	echo "1 record added";
	
	mysqli_close($con);

?>