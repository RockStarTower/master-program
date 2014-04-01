<?php
include 'loginfunctions.php';
sec_session_start();
$permissions = $_COOKIE['Permissions'];
$user = $_COOKIE['Username'];
$firstname = $_COOKIE['FirstName'];
$lastname = $_COOKIE['LastName'];
$fullname = $firstname . ' ' . $lastname;
if($_COOKIE['Admin'] == 0){
	$is_admin = false;
} else {
	$is_admin = true;
}
?>