<?php
include 'users/loginheader.php';
include 'header.php';
if( ! isset($_SESSION['Username'])){
	sec_session_start();
}

//foreach ($RenewDate as $key => $value) {
	//$update = "UPDATE HostDetails SET RenewDate='$value' WHERE HostAccount='$key'";
	//mysqli_query($mysqli, $update);
//}

?>
<h2> THE UPDATE FILE ISN'T UPDATING ANYTHING AT THE MOMENT </h2>




























