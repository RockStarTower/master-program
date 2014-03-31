<?php
include 'users/loginheader.php';
include 'header.php';
sec_session_start();
if(login_check($mysqli) == true) {
	echo '<div class="page-wrap confirm-wrap">';
	echo '<form id="confirm_domains" action="domain_uploadcsv.php" method="post">';
	echo '<table id="domain-results">';
	echo '<thead>';
	echo '<td class="domain-header">Domain</td>';
	echo '<td class="hostaccount-header">Host Account</td>';
	echo '<td class="vertical-header">Vertical</td>';
	echo '<td class="type-header">Type</td>';
	echo '<td class="version-header">Version</td>';
	echo '<td class="country-header">Country</td>';
	echo '<td class="language-header">Language</td>';
	echo '<td class="location-header">Location</td>';
	echo '<td class="status-header">Status</td>';
	echo '<td class="renew-date-header">Renewal Date</td>';
	echo '<td class="date-bought-header">Date Bought</td>';
	echo '<td class="pr-header">PR</td>';
	echo '<td class="da-header">DA</td>';
	echo '<td class="pa-header">PA</td>';
	echo '<td class="backlinks-header">Back Links</td>';
	echo '<td class="moztrust-header">Moz Trust</td>';
	echo '<td class="registrar-header">Registrar</td>';
	echo '<td class="renewal-cost-header">Renewal Cost</td>';
	echo '<td class="whois-renewal-header">Whois Renewal</td>';
	echo '<td class="whois-cost-header">Whois Cost</td>';
	echo '<td class="initial-cost-header">Initial Cost</td>';
	echo '<td class="total-cost-header">Total Cost</td>';
	echo '<td class="researchedby-header">Researched By</td>';
	echo '<td class="domainnotes-header">Domain Notes</td>';
	echo '<td class="Wireframe-header">Wireframe</td>';
	echo '</thead>';

	if(isset($_POST['submit'])) {
		$file = $_FILES['file']['tmp_name'];
		$handle = fopen($file,"r");
		$data = fgetcsv($handle,1000,",");
		$counter = 0;
		while(($data = fgetcsv($handle,1000,",")) !==false) {
			echo '<tr>';
			echo '<td><input class="domain" type="text" name="domain[' . $counter . '][Domain]" value="' . $data[0] . '" /></td>';
			echo '<td><input class="hostaccount" type="text" name="domain[' . $counter . '][HostAccount]" value="' . $data[1] . '" /></td>';
			echo '<td><input class="vertical" type="text" name="domain[' . $counter . '][Vertical]" value="' . $data[2] . '" /></td>';
			echo '<td><input class="type" type="text" name="domain[' . $counter . '][Type]" value="' . $data[3] . '" /></td>';
			echo '<td><input class="version" type="text" name="domain[' . $counter . '][Version]" value="' . $data[4] . '" /></td>';
			echo '<td><input class="country" type="text" name="domain[' . $counter . '][Country]" value="' . $data[5] . '" /></td>';
			echo '<td><input class="language" type="text" name="domain[' . $counter . '][Language]" value="' . $data[6] . '" /></td>';
			echo '<td><input class="location" type="text" name="domain[' . $counter . '][Location]" value="' . $data[7] . '" /></td>';
			echo '<td><input class="status" type="text" name="domain[' . $counter . '][Status]" value="' . $data[8] . '" /></td>';
			echo '<td><input class="renew-date" type="text" name="domain[' . $counter . '][RenewDate]" value="' . $data[9] . '" /></td>';
			echo '<td><input class="date-bought" type="text" name="domain[' . $counter . '][DateBought]" value="' . $data[10] . '" /></td>';
			echo '<td><input class="PR" type="text" name="domain[' . $counter . '][PR]" value="' . $data[11] . '" /></td>';
			echo '<td><input class="DA" type="text" name="domain[' . $counter . '][DA]" value="' . $data[12] . '" /></td>';
			echo '<td><input class="PA" type="text" name="domain[' . $counter . '][PA]" value="' . $data[13] . '" /></td>';
			echo '<td><input class="backlinks" type="text" name="domain[' . $counter . '][BackLinks]" value="' . $data[14] . '" /></td>';
			echo '<td><input class="moztrust" type="text" name="domain[' . $counter . '][MozTrust]" value="' . $data[15] . '" /></td>';
			echo '<td><input class="registrar" type="text" name="domain[' . $counter . '][Registrar]" value="' . $data[16] . '" /></td>';
			echo '<td><input class="renewal-cost" type="text" name="domain[' . $counter . '][RenewalCost]" value="' . $data[17] . '" /></td>';
			echo '<td><input class="whois-renewal" type="text" name="domain[' . $counter . '][WhoIsRenewal]" value="' . $data[18] . '" /></td>';
			echo '<td><input class="whois-cost" type="text" name="domain[' . $counter . '][WhoisCost]" value="' . $data[19] . '" /></td>';
			echo '<td><input class="initial-cost" type="text" name="domain[' . $counter . '][InitialCost]" value="' . $data[20] . '" /></td>';
			echo '<td><input class="total-cost" type="text" name="domain[' . $counter . '][TotalCost]" value="' . $data[21] . '" /></td>';
			echo '<td><input class="researchedby" type="text" name="domain[' . $counter . '][ResearchedBy]" value="' . $data[22] . '" /></td>';
			echo '<td><input class="domainnotes" type="text" name="domain[' . $counter . '][DomainNotes]" value="' . $data[23] . '" /></td>';
			echo '<td><input class="Wireframe" type="text" name="domain[' . $counter . '][Wireframe]" value="' . $data[24] . '" /></td>';
			echo '</tr>';
			$counter ++;
		}		
	}
	echo '</table>';
	echo '<input type="submit" value="submit" />';
	echo '</form>';
	echo '</div>';
} else {
	echo '<div id="notauthorized">';
	echo '<p>You are not authorized to access this page.</p>';
	echo '<a href="users/login.php">Please Login</a></div>';
}
include 'footer.php';
?>