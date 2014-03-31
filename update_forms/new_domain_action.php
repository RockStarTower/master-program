<?php

include '../users/db_connect.php';

$Domain = $_POST['Domain'];
$HostAccount = $_POST['HostAccount'];
$Vertical = $_POST['Vertical'];
$Type = $_POST['Type'];
$Version = $_POST['Version'];
$Country = $_POST['Country'];
$Language = $_POST['Language'];
$Location = $_POST['Location'];
$Status = $_POST['Status'];
$RenewalDate = $_POST['RenewalDate'];
$DateBought = $_POST['DateBought'];
$BoughtBy = $_POST['BoughtBy'];
$PR = $_POST['PR'];
$DA = $_POST['DA'];
$PA = $_POST['PA'];
$BackLinks = $_POST['BackLinks'];
$MozTrust = $_POST['MozTrust'];
$Registrar = $_POST['Registrar'];
$RenewalCost = $_POST['RenewalCost'];
$WhoIsRenewal = $_POST['WhoIsRenewal'];
$WhoisCost = $_POST['WhoisCost'];
$InitialCost = $_POST['InitialCost'];
$TotalCost = $_POST['TotalCost'];
$ResearchedBy = $_POST['ResearchedBy'];
$DomainNotes = $_POST['DomainNotes'];

$query = "INSERT INTO DomainDetails (Domain, HostAccount, Vertical, Type, Version, Country, Language, Location, Status, RenewalDate, DateBought, BoughtBy, PR, DA, PA, Backlinks, MozTrust, Registrar, RenewalCost, WhoIsRenewal, WhoisCost, InitialCost, TotalCost, ResearchedBy, DomainNotes) 
VALUES 
('$Domain','$HostAccount','$Vertical','$Type','$Version','$Country','$Language','$Location','$Status','$RenewalDate','$DateBought','$BoughtBy','$PR','$DA','$PA','$BackLinks','$MozTrust','$Registrar','$RenewalCost','$WhoIsRenewal','$WhoisCost','$InitialCost','$TotalCost','$ResearchedBy','$DomainNotes')";

if (!mysqli_query($mysqli,$query)) {
	if (mysqli_errno($mysqli) == 1062) {
		echo '<div id="new_domain_error"><strong>' . $Domain . '</strong> is a duplicate. <br />';
		echo 'Also you are a moron because you were already told that it is a duplicate!</div>';
	} else {
		die('Error: ' . mysqli_error($mysqli));
	}
} else {

	echo '<div id="new_domain_success"><h1><em>' . $Domain . '</em> was successfully added to the database.</h1></div>';
	
}

?>