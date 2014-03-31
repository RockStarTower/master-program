<?php
include 'users/loginheader.php';

$domain = $_POST['domain'];
$user_permissions = $_POST['user_permissions'];

switch ($user_permissions) {
	case 'Content':
		$query = "UPDATE DomainDetails SET ContentAdmin='' WHERE Domain ='$domain'";
		break;
	case 'Writer':
		$query = "UPDATE DomainDetails SET Reviewer='' WHERE Domain ='$domain'";
		break;
	case 'Designer':
		$query = "UPDATE DomainDetails SET Designer='',DesignStart='0000-00-00' WHERE Domain ='$domain'";
		break;
	case 'Support':
		$query = "UPDATE DomainDetails SET Cloner='' WHERE Domain ='$domain'";
		break;
	case 'Admin':
		$query = "UPDATE DomainDetails SET Developer='',DevStart='0000-00-00' WHERE Domain ='$domain'";
		break;
	case 'QA':
		$query = "UPDATE DomainDetails SET QAInspector='',Type='' WHERE Domain ='$domain'";
		break;
}
mysqli_query($mysqli, $query);
?>