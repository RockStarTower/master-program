<?php
include 'users/loginheader.php';
include 'header.php';
sec_session_start();
if(login_check($mysqli) == true) {

	echo '<div class="page-wrap confirm-wrap">';
	echo '<div id="display_error"></div>';
	echo '<div id="domain_success"><h1>These domains were uploaded successfully!</h1></div>';
	echo '<table id="domain-results">';
	echo '<thead>';
	echo '<td>Domain</td>';
	echo '<td>Host Account</td>';
	echo '<td>Vertical</td>';
	echo '<td>Type</td>';
	echo '<td>Version</td>';
	echo '<td>Country</td>';
	echo '<td>Language</td>';
	echo '<td>Location</td>';
	echo '<td>Status</td>';
	echo '<td>Renewal Date</td>';
	echo '<td>Date Bought</td>';
	echo '<td>PR</td>';
	echo '<td>DA</td>';
	echo '<td>PA</td>';
	echo '<td>Back Links</td>';
	echo '<td>Moz Trust</td>';
	echo '<td>Registrar</td>';
	echo '<td>Renewal Cost</td>';
	echo '<td>Whois Renewal</td>';
	echo '<td>Whois Cost</td>';
	echo '<td>Initial Cost</td>';
	echo '<td>Total Cost</td>';
	echo '<td>Researched By</td>';
	echo '<td>Domain Notes</td>';
	echo '<td>Wireframe</td>';
	echo '</thead>';
	$duplicates = '<span class="duplicates">These domains are duplicates:</span> ';

	$con = new mysqli('localhost', 'root', 'root', 'ecoabsor_master');
	if (mysqli_connect_errno())	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	foreach ( $_POST['domain'] as $data ) {
		$Domain = $data['Domain'];
		$HostAccount = $data['HostAccount'];
		$Vertical = addslashes($data['Vertical']);
		$Type = $data['Type'];
		$Version = $data['Version'];
		$Country = addslashes($data['Country']);
		$Language = $data['Language'];
		$Location = addslashes($data['Location']);
		$Status = $data['Status'];
		$RenewDate = $data['RenewDate'];
		$DateBought = $data['DateBought'];
		$Type = $data['Type'];
		$PR = $data['PR'];
		$DA = $data['DA'];
		$PA = $data['PA'];
		$BackLinks = $data['BackLinks'];
		$MozTrust = $data['MozTrust'];
		$Registrar = $data['Registrar'];
		$RenewalCost = $data['RenewalCost'];
		$WhoIsRenewal = $data['WhoIsRenewal'];
		$WhoisCost = $data['WhoisCost'];
		$InitialCost = $data['InitialCost'];
		$TotalCost = $data['TotalCost'];
		$ResearchedBy = addslashes($data['ResearchedBy']);
		$DomainNotes = addslashes($data['DomainNotes']);	
		$Wireframe = $data['Wireframe'];
			
		$query = "INSERT INTO DomainDetails (Domain, HostAccount, Vertical, Type, Version, Country, Language, Location, Status, RenewalDate, DateBought, PR, DA, PA, BackLinks, MozTrust, Registrar, RenewalCost,WhoIsRenewal, WhoisCost, InitialCost, TotalCost, ResearchedBy, DomainNotes, Wireframe) VALUES('$Domain','$HostAccount','$Vertical','$Type','$Version','$Country','$Language','$Location','$Status','$RenewDate','$DateBought','$PR','$DA','$PA','$BackLinks','$MozTrust','$Registrar','$RenewalCost','$WhoIsRenewal','$WhoisCost','$InitialCost','$TotalCost','$ResearchedBy','$DomainNotes','$Wireframe')";
		if (!mysqli_query($con,$query))	{
			if (mysqli_errno($con) == 1062) {
				$duplicates .= $Domain . ', ';
				continue;
			} else {
				die('Error: ' . mysqli_error($con));
			}
		}
		echo '<tr>';
		echo '<td>' . $data['Domain'] . '</td>';
		echo '<td>' . $data['HostAccount'] . '</td>';
		echo '<td>' . $data['Vertical'] . '</td>';
		echo '<td>' . $data['Type'] . '</td>';
		echo '<td>' . $data['Version'] . '</td>';
		echo '<td>' . $data['Country'] . '</td>';
		echo '<td>' . $data['Language'] . '</td>';
		echo '<td>' . $data['Location'] . '</td>';
		echo '<td>' . $data['Status'] . '</td>';
		echo '<td>' . $data['RenewDate'] . '</td>';
		echo '<td>' . $data['DateBought'] . '</td>';
		echo '<td>' . $data['PR'] . '</td>';
		echo '<td>' . $data['DA'] . '</td>';
		echo '<td>' . $data['PA'] . '</td>';
		echo '<td>' . $data['BackLinks'] . '</td>';
		echo '<td>' . $data['MozTrust'] . '</td>';
		echo '<td>' . $data['Registrar'] . '</td>';
		echo '<td>' . $data['RenewalCost'] . '</td>';
		echo '<td>' . $data['WhoIsRenewal'] . '</td>';
		echo '<td>' . $data['WhoisCost'] . '</td>';
		echo '<td>' . $data['InitialCost'] . '</td>';
		echo '<td>' . $data['TotalCost'] . '</td>';
		echo '<td>' . $data['ResearchedBy'] . '</td>';
		echo '<td>' . $data['DomainNotes'] . '</td>';
		echo '<td>' . $data['Wireframe'] . '</td>';
		echo '</tr>';
		
	}
	mysqli_close($con);
	echo '</table>';
	$dupLen = strlen($duplicates) - 2;
	$dupFinal = substr($duplicates, 0, $dupLen);
	if($duplicates != '<span class="duplicates">These domains are duplicates:</span> ') {
		echo '<div id="domain_error">' . $dupFinal . '.</div>';
	}
	echo '</div>';
	include 'footer.php';} else {
	echo '<div id="notauthorized">';
	echo '<p>You are not authorized to access this page.</p>';
	echo '<a href="users/login.php">Please Login</a></div>';
}
include 'footer.php';
?>

?>