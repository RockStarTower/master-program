<?php
	
	$newPR = $_POST['PR'];
	$PR_Before = $_POST['PR_Before'];
	$PR_Field = $_POST['PR_Field'];
	$newDA = $_POST['DA'];
	$DA_Before = $_POST['DA_Before'];
	$DA_Field = $_POST['DA_Field'];
	$newPA = $_POST['PA'];
	$PA_Before = $_POST['PA_Before'];
	$PA_Field = $_POST['PA_Field'];
	$newBackLinks = $_POST['BackLinks'];
	$BackLinks_Before = $_POST['BackLinks_Before'];
	$BackLinks_Field = $_POST['BackLinks_Field'];
	$newMozTrust = $_POST['MozTrust'];
	$MozTrust_Before = $_POST['MozTrust_Before'];
	$MozTrust_Field = $_POST['MozTrust_Field'];
	$TimeStamp = $_POST['TimeStamp'];
	$User = $_POST['User'];
	$DomainName = $_POST['DomainName'];

	$fields = array(
		$PR_Field,
		$DA_Field,
		$PA_Field,
		$BackLinks_Field,
		$MozTrust_Field,
	);

	$before_after = array(
		$newPR => $PR_Before,
		$newDA => $DA_Before,
		$newPA => $PA_Before,
		$newBackLinks => $BackLinks_Before,
		$newMozTrust => $MozTrust_Before,
	);

	$con = mysqli_connect('localhost', 'root', 'root', 'ecoabsor_master');
	$counter = 0;
	foreach ($before_after as $key => $val) {
		$query = "INSERT INTO `ChangeHistory`(`UserID`, `FieldsChanged`, `Before`, `After`) VALUES ('$User','$fields[$counter]','$val','$key')";
		if ($key != $val) {
			if (!mysqli_query($con,$query))	{
				die('Error: ' . mysqli_error($con));
			}
		}
		$counter += 1;
	}
	$update = "UPDATE DomainDetails SET PR='$newPR',DA='$newDA',PA='$newPA',BackLinks='$newBackLinks',MozTrust='$newMozTrust' WHERE Domain='$DomainName'";
	if (!mysqli_query($con,$update)) {
		die('Error: ' . mysqli_error($con));
	}
	header('Location: ../domain-accordion.php?DomainName=' . $DomainName . '&HostAccount=' . $newHostAccount);
?>