<?php
include '../users/loginheader.php';
if(isset($_GET['DomainName'])) {
	$DomainName = $_GET['DomainName'];
} else {
$DomainName = '';
}
$HostAccount = $_GET['HostAccount'];

$con = mysqli_connect('localhost', 'root', 'root', 'ecoabsor_master');
$request = "SELECT * FROM HostDetails WHERE HostAccount='$HostAccount'";
if ($result = mysqli_query($con, $request) or die("Error: ".mysqli_error($con))) {
	while ( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
		// variable for HostDomain exists - $HostAccount
		$CpanelURL = $row['cPanelURL'];
		$CpanelUsername = $row['cPanelUser'];
		$CpanelPassword = $row['cPanelPass'];
		$BillingURL = $row['BillingURL'];
		$BillingUsername = $row['BillingUser'];
		$BillingPassword = $row['BillingPass'];
		$FTPHost = $row['FTPHost'];
		$FTPUsername = $row['FTPUser'];
		$FTPPassword = $row['FTPPass'];
		$SecurityPIN = $row['PIN'];
		$SecurityAnswer = $row['SecurityAnswer'];
	}
}
?>

<form id="edit_host_login_info" action="update_forms/host_login_info_action.php" method="post">
	<p>CPanel URL: <input type="text" name="CpanelURL" value="<?php echo $CpanelURL; ?>" /></p>
	<input name="CpanelURL_Before" type="hidden" value="<?php echo $CpanelURL; ?>" />
	<input name="CpanelURL_Field" type="hidden" value="CpanelURL" />
	<p>CPanel Username: <input type="text" name="CpanelUsername" value="<?php echo $CpanelUsername; ?>" /></p>
	<input name="CpanelUsername_Before" type="hidden" value="<?php echo $CpanelUsername; ?>" />
	<input name="CpanelUsername_Field" type="hidden" value="CpanelUsername" />
	<p>CPanel Password: <input type="text" name="CpanelPassword" value="<?php echo $CpanelPassword; ?>" /></p>
	<input name="CpanelPassword_Before" type="hidden" value="<?php echo $CpanelPassword; ?>" />
	<input name="CpanelPassword_Field" type="hidden" value="CpanelPassword" />
	<p>FTP Host: <input type="text" name="FTPHost" value="<?php echo $FTPHost; ?>" /></p>
	<input name="FTPHost_Before" type="hidden" value="<?php echo $FTPHost; ?>" />
	<input name="FTPHost_Field" type="hidden" value="FTPHost" />
	<p>FTP Username: <input type="text" name="FTPUsername" value="<?php echo $FTPUsername; ?>" /></p>
	<input name="FTPUsername_Before" type="hidden" value="<?php echo $FTPUsername; ?>" />
	<input name="FTPUsername_Field" type="hidden" value="FTPUsername" />
	<p>FTP Password: <input type="text" name="FTPPassword" value="<?php echo $FTPPassword; ?>" /></p>
	<input name="FTPPassword_Before" type="hidden" value="<?php echo $FTPPassword; ?>" />
	<input name="FTPPassword_Field" type="hidden" value="FTPPassword" />
	<p>Billing URL: <input type="text" name="BillingURL" value="<?php echo $BillingURL; ?>" /></p>
	<input name="BillingURL_Before" type="hidden" value="<?php echo $BillingURL; ?>" />
	<input name="BillingURL_Field" type="hidden" value="BillingURL" />
	<p>Billing Username: <input type="text" name="BillingUsername" value="<?php echo $BillingUsername; ?>" /></p>
	<input name="BillingUsername_Before" type="hidden" value="<?php echo $BillingUsername; ?>" />
	<input name="BillingUsername_Field" type="hidden" value="BillingUsername" />
	<p>Billing Password: <input type="text" name="BillingPassword" value="<?php echo $BillingPassword; ?>" /></p>
	<input name="BillingPassword_Before" type="hidden" value="<?php echo $BillingPassword; ?>" />
	<input name="BillingPassword_Field" type="hidden" value="BillingPassword" />
	<p>Security PIN: <input type="text" name="SecurityPIN" value="<?php echo $SecurityPIN; ?>" /></p>
	<input name="SecurityPIN_Before" type="hidden" value="<?php echo $SecurityPIN; ?>" />
	<input name="SecurityPIN_Field" type="hidden" value="SecurityPIN" />
	<p>Security Question Answer: <input type="text" name="SecurityAnswer" value="<?php echo $SecurityAnswer; ?>" /></p>
	<input name="SecurityAnswer_Before" type="hidden" value="<?php echo $SecurityAnswer; ?>" />
	<input name="SecurityAnswer_Field" type="hidden" value="SecurityAnswer" />
	<input name="TimeStamp" type="hidden" value="<?php echo date("Y-m-d h:m:s"); ?> " />
	<input name="User" type="hidden" value="<?php echo $user; ?>" />
	<input name="HostAccount" type="hidden" value="<?=$HostAccount?>" />
	<input name="DomainName" type="hidden" value="<?=$DomainName?>" />
	<input type="submit" class="popout_button" value="Submit">
</form>