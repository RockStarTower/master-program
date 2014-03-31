<?php
include 'users/loginheader.php';

if(isset($_POST['blog']) && $_POST['blog'] == 'Blog'){
	$blog = 'Blog';
} else {
	$blog = 'Article';
}
$username = $_POST['username'];
$date = $_POST['date_submitted'];
$domain = $_POST['domain'];
$user_permissions = $_POST['user_permissions'];

switch ($user_permissions) {
	case 'Content':
		$query = "UPDATE DomainDetails SET ContentAdmin='$username' WHERE Domain ='$domain'";
		break;
	case 'Writer':
		$query = "UPDATE DomainDetails SET Reviewer='$username' WHERE Domain ='$domain'";
		break;
	case 'Designer':
		$query = "UPDATE DomainDetails SET Designer='$username',DesignStart='$date' WHERE Domain ='$domain'";
		break;
	case 'Support':
		$query = "UPDATE DomainDetails SET Cloner='$username' WHERE Domain ='$domain'";
		break;
	case 'Admin':
		$query = "UPDATE DomainDetails SET Developer='$username',DevStart='$date' WHERE Domain ='$domain'";
		break;
	case 'QA':
		$query = "UPDATE DomainDetails SET QAInspector='$username',Type='$blog' WHERE Domain ='$domain'";
		break;
}
mysqli_query($mysqli, $query);
?>