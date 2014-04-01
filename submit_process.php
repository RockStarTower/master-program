<?php
include 'users/loginheader.php';

$domain = $_POST['domain'];
$date = $_POST['date_submitted'];
$username = $_POST['user'];
if(isset($_POST['permissions'])){
	$permissions = $_POST['permissions'];
}
if(isset($_POST['outsourced'])){$outsourced = $_POST['outsourced'];}
if(isset($_POST['reviewnotes'])){$reviewnotes = $_POST['reviewnotes'];}
if(isset($_POST['writer'])){$writer = $_POST['writer'];}
if(isset($_POST['contenthours'])){$content_hours = $_POST['contenthours'];}
if(isset($_POST['authornickname'])){$author_nickname = $_POST['authornickname'];}
if(isset($_POST['managewpaccount'])){$managewpaccount = $_POST['managewpaccount'];}
if(isset($_POST['theme'])){$theme = $_POST['theme'];}
if(isset($_POST['wireframe'])){$wireframe = $_POST['wireframe'];}
if(isset($_POST['databasename'])){$dbname = $_POST['databasename'];}
if(isset($_POST['databaseuser'])){$dbuser = $_POST['databaseuser'];}
if(isset($_POST['databasepw'])){$dbpass = $_POST['databasepw'];}
if(isset($_POST['databasehost'])){$dbhost = $_POST['databasehost'];}

switch ($permissions) {
	case 'Content':
		$query = "UPDATE DomainDetails SET Outsourced='$outsourced',ContentStart='$date',Writer='$writer' WHERE Domain='$domain'";
		break;
	case 'Writer':
		if(isset($_POST['reviewed']) && $_POST['reviewed'] == 'reviewed'){
		$query = (empty($reviewnotes) 
			? "UPDATE DomainDetails SET ContentFinished='$date' WHERE Domain='$domain' AND Writer='$writer'"
			: "UPDATE DomainDetails SET ReviewNotes='$reviewnotes',ReviewStart='0000-00-00' WHERE Domain='$domain' AND Writer='$writer'"
			);
		echo $query;
		} else {
		$query = "UPDATE DomainDetails SET ReviewNotes='',ReviewStart='$date',ContentHours='$content_hours',AuthorNickname='$author_nickname' WHERE Domain='$domain' AND Writer='$username'";
		}
		break;
	case 'Designer':
		$query = "UPDATE DomainDetails SET DesignFinish='$date' WHERE Domain='$domain' AND Designer='$username'";
		break;
	case 'Support':
		$query = "UPDATE DomainDetails SET CloneFinished='$date',ManageWPAccount='$managewpaccount',Theme='$theme',Wireframe='$wireframe',DBName='$dbname',DBUser='$dbuser',DBPass='$dbpass',DBHost='$dbhost' WHERE Domain='$domain' AND Cloner='$username'";
		break;
	case 'Admin':
		$query = "UPDATE DomainDetails SET DevFinish='$date' WHERE Domain='$domain' AND Developer='$username'";
		break;
	case 'QA':
		$query = "UPDATE DomainDetails SET DateComplete='$date',Status='Active' WHERE Domain='$domain' AND QAInspector='$username'";
		break;
}

mysqli_query($mysqli, $query);
?>