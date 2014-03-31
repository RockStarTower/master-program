<?php

include '../users/loginheader.php';
include 'update_forms_header.php';
sec_session_start();
if(login_check($mysqli) == true) {
echo '<div class="page-wrap">';
$HostAccount = $_POST['HostAccount'];
$DateBought = $_POST['DateBought'];
$YearlyCost = $_POST['YearlyCost'];
$DedicatedIPCost = $_POST['DedicatedIPCost'];
$TotalCost = $_POST['TotalCost'];
$RenewDate = $_POST['RenewDate'];
$CCOnAccount = $_POST['CCOnAccount'];
$Country = $_POST['Country'];
$ServerLocations = $_POST['ServerLocations'];
$EmailOnAccount = $_POST['EmailOnAccount'];
$BillingURL = $_POST['BillingURL'];
$BillingUser = $_POST['BillingUser'];
$BillingPass = $_POST['BillingPass'];
$SecurityPIN = $_POST['SecurityPIN'];
$SecurityAnswer = $_POST['SecurityAnswer'];
$HostNotes = addslashes($_POST['HostNotes']);

$con = mysqli_connect('localhost', 'root', 'root', 'ecoabsor_master');
$query = "INSERT INTO `HostDetails`(`HostAccount`,`DateBought`,`YearlyCost`,`DedicatedIPCost`,`TotalCost`,`RenewDate`,`CCOnAccount`,`Country`,`ServerLocations`,`Email`,`BillingURL`,`BillingUser`,`BillingPass`,`PIN`,`SecurityAnswer`,`HostNotes`) VALUES ('$HostAccount','$DateBought','$YearlyCost','$DedicatedIPCost','$TotalCost','$RenewDate','$CCOnAccount','$Country','$ServerLocations','$EmailOnAccount','$BillingURL','$BillingUser','$BillingPass','$SecurityPIN','$SecurityAnswer','$HostNotes')";

if (!mysqli_query($con,$query)) {
	if (mysqli_errno($con) == 1062) {
		echo '<strong>' . $HostAccount . '</strong> is a duplicate. <br />';
		echo 'Also you are a moron because you were already told that it is a duplicate!';
	} else {
		die('Error: ' . mysqli_error($con));
	}
} else {

	echo '<h1><em>' . $HostAccount . '</em> was successfully added to the database.</h1>';
	echo '<a href="../new_host.php">Add Another Host</a>';
	
}
echo '</div>';
include '../footer.php';
} else {
   echo 'You are not authorized to access this page.<br/>';
   echo '<a href="users/login.php">Please Login</a>';
}

?>