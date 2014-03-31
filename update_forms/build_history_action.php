<?php

	$newResearchedBy = $_POST['ResearchedBy'];
	$ResearchedBy_Before = $_POST['ResearchedBy_Before'];
	$ResearchedBy_Field = $_POST['ResearchedBy_Field'];
	$newBoughtBy = $_POST['BoughtBy'];
	$BoughtBy_Before = $_POST['BoughtBy_Before'];
	$BoughtBy_Field = $_POST['BoughtBy_Field'];
	$newDateBought = $_POST['DateBought'];
	$DateBought_Before = $_POST['DateBought_Before'];
	$DateBought_Field = $_POST['DateBought_Field'];
	$newWriter = $_POST['Writer'];
	$Writer_Before = $_POST['Writer_Before'];
	$Writer_Field = $_POST['Writer_Field'];
	$newContentStart = $_POST['ContentStart'];
	$ContentStart_Before = $_POST['ContentStart_Before'];
	$ContentStart_Field = $_POST['ContentStart_Field'];
	$newContentFinish = $_POST['ContentFinish'];
	$ContentFinish_Before = $_POST['ContentFinish_Before'];
	$ContentFinish_Field = $_POST['ContentFinish_Field'];
	$newContentHours = $_POST['ContentHours'];
	$ContentHours_Before = $_POST['ContentHours_Before'];
	$ContentHours_Field = $_POST['ContentHours_Field'];
	$newDesigner = $_POST['Designer'];
	$Designer_Before = $_POST['Designer_Before'];
	$Designer_Field = $_POST['Designer_Field'];
	$newDesignStart = $_POST['DesignStart'];
	$newCloner = $_POST['Cloner'];
	$Cloner_Before = $_POST['Cloner_Before'];
	$Cloner_Field = $_POST['Cloner_Field'];
	$newDesignStart = $_POST['DesignStart'];
	$DesignStart_Before = $_POST['DesignStart_Before'];
	$DesignStart_Field = $_POST['DesignStart_Field'];
	$newCloneFinished = $_POST['CloneFinished'];
	$CloneFinished_Before = $_POST['CloneFinished_Before'];
	$CloneFinished_Field = $_POST['CloneFinished_Field'];
	$newReviewer = $_POST['Reviewer'];
	$Reviewer_Before = $_POST['Reviewer_Before'];
	$Reviewer_Field = $_POST['Reviewer_Field'];
	$newReviewStart = $_POST['ReviewStart'];
	$ReviewStart_Before = $_POST['ReviewStart_Before'];
	$ReviewStart_Field = $_POST['ReviewStart_Field'];
	$newContentAdmin = $_POST['ContentAdmin'];
	$ContentAdmin_Before = $_POST['ContentAdmin_Before'];
	$ContentAdmin_Field = $_POST['ContentAdmin_Field'];
	$newDesignFinish = $_POST['DesignFinish'];
	$DesignFinish_Before = $_POST['DesignFinish_Before'];
	$DesignFinish_Field = $_POST['DesignFinish_Field'];
	$newDeveloper = $_POST['Developer'];
	$Developer_Before = $_POST['Developer_Before'];
	$Developer_Field = $_POST['Developer_Field'];
	$newDevStart = $_POST['DevStart'];
	$DevStart_Before = $_POST['DevStart_Before'];
	$DevStart_Field = $_POST['DevStart_Field'];
	$newDevFinish = $_POST['DevFinish'];
	$DevFinish_Before = $_POST['DevFinish_Before'];
	$DevFinish_Field = $_POST['DevFinish_Field'];
	$newQAInspector = $_POST['QAInspector'];
	$QAInspector_Before = $_POST['QAInspector_Before'];
	$QAInspector_Field = $_POST['QAInspector_Field'];
	$newDateComplete = $_POST['DateComplete'];
	$DateComplete_Before = $_POST['DateComplete_Before'];
	$DateComplete_Field = $_POST['DateComplete_Field'];
	$TimeStamp = $_POST['TimeStamp'];
	$User = $_POST['User'];
	$DomainName = $_POST['DomainName'];

	$fields = array(
		$ResearchedBy_Field,
		$BoughtBy_Field,
		$DateBought_Field,
		$Writer_Field,
		$ContentStart_Field,
		$ContentFinish_Field,
		$ContentHours_Field,
		$Designer_Field,
		$DesignStart_Field,
		$DesignFinish_Field,
		$Developer_Field,
		$DevStart_Field,
		$DevFinish_Field,
		$QAInspector_Field,
		$DateComplete_Field,
		$Cloner_Field,
		$CloneFinished_Field,
		$Reviewer_Field,
		$ReviewStart_Field,
		$ContentAdmin,
	);

	$before_after = array(
		$newResearchedBy => $ResearchedBy_Before,
		$newBoughtBy => $BoughtBy_Before,
		$newDateBought => $DateBought_Before,
		$newWriter => $Writer_Before,
		$newContentStart => $ContentStart_Before,
		$newContentFinish => $ContentFinish_Before,
		$newContentHours => $ContentHours_Before,
		$newDesigner => $Designer_Before,
		$newDesignStart => $DesignStart_Before,
		$newDesignFinish => $DesignFinish_Before,
		$newDeveloper => $Developer_Before,
		$newDevStart => $DevStart_Before,
		$newDevFinish => $DevFinish_Before,
		$newQAInspector => $QAInspector_Before,
		$newDateComplete => $DateComplete_Before,
		$newCloner => $Cloner_Before,
		$newCloneFinished => $CloneFinished_Before,
		$newReviewer => $Reviewer_Before,
		$newReviewStart => $ReviewStart_Before,
		$newContentAdmin => $ContentAdmin_Before,
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
	$update = "UPDATE DomainDetails SET Cloner='$newCloner',CloneFinished='$newCloneFinished',Reviewer='$newReviewer',ReviewStart='$newReviewStart',ContentAdmin='$newContentAdmin',ResearchedBy='$newResearchedBy',BoughtBy='$newBoughtBy',DateBought='$newDateBought',Writer='$newWriter',ContentStart='$newContentStart',ContentFinished='$newContentFinish',ContentHours='$newContentHours',Designer='$newDesigner',DesignStart='$newDesignStart',DesignFinish='$newDesignFinish',Developer='$newDeveloper',DevStart='$newDevStart',DevFinish='$newDevFinish',QAInspector='$newQAInspector',DateComplete='$newDateComplete' WHERE Domain='$DomainName'";
	if (!mysqli_query($con,$update)) {
		die('Error: ' . mysqli_error($con));
	}
	header('Location: ../domain-accordion.php?DomainName=' . $DomainName . '&HostAccount=' . $newHostAccount);
?>