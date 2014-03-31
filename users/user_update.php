<?php
include './db_connect.php';
$user_id = $_POST['UserID'];
$firstnamechange = $_POST['Firstname'];
$lastnamechange = $_POST['Lastname'];
$usernamechange = $_POST['Username'];
$emailchange = $_POST['Email'];
$Password = $_POST['Password'];
$permissions = $_POST['Permissions'];
if(isset($_POST['Admin'])){
	$Admin = 1;
} else {
	$Admin = 0;
}
mysqli_query($mysqli, "UPDATE Users SET Permissions='$permissions', Username='$usernamechange', Email='$emailchange', Firstname='$firstnamechange', Lastname='$lastnamechange', Password='$Password', Admin='$Admin' WHERE UserID='$user_id'")
 or die(mysqli_error()); 

header("Location: ../admin.php?action=users"); 
?>