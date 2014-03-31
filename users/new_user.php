<?php
$username = $_POST['Username'];
$firstname = $_POST['FirstName'];
$lastname = $_POST['LastName'];
$permissions = $_POST['Permissions'];
$email = $_POST['Email'];
$password = $_POST['Password'];
if(isset($_POST['Admin'])){
	$admin = 1;
} else {
	$admin = 0;
}

$con = new mysqli('localhost', 'root', 'root', 'ecoabsor_master');
if (mysqli_connect_errno())	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

    $query = "INSERT INTO Users (Username, FirstName, LastName, Permissions, Email, Password, Admin) VALUES('$username','$firstname','$lastname','$permissions','$email','$password','$admin')";


    if (!mysqli_query($con,$query))	{
		die('Error: ' . mysqli_error($con));
	}

	header("Location: ../admin.php?action=users");
	
	mysqli_close($con);
?>