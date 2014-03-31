<?php
include '../users/loginheader.php';
include '../functions.php';
$DomainName = $_GET['DomainName'];

$con = mysqli_connect('localhost', 'root', 'root', 'ecoabsor_master');
$request = "SELECT * FROM DomainDetails WHERE Domain='$DomainName'";
if ($result = mysqli_query($con, $request) or die("Error: ".mysqli_error($con))) {
	while ( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
		// variable for HostDomain exists - $DomainName
		$Cloner = $row['Cloner'];
		$CloneFinished = $row['CloneFinished'];
		$Reviewer = $row['Reviewer'];
		$ContentAdmin = $row['ContentAdmin'];
		$ReviewStart = $row['ReviewStart'];
		$ResearchedBy = $row['ResearchedBy'];
		$BoughtBy = $row['BoughtBy'];
		$DateBought = $row['DateBought'];
		$Writer = $row['Writer'];
		$ContentStart = $row['ContentStart'];
		$ContentFinish = $row['ContentFinished'];
		$ContentHours = $row['ContentHours'];
		$Designer = $row['Designer'];
		$DesignStart = $row['DesignStart'];
		$DesignFinish = $row['DesignFinish'];
		$Developer = $row['Developer'];
		$DevStart = $row['DevStart'];
		$DevFinish = $row['DevFinish'];
		$QAInspector = $row['QAInspector'];
		$DateComplete = $row['DateComplete'];
	}
}
?>
<!--<select name="Writer"><?php users_list($mysqli, $user, $Writer);?></select>-->
<form id="edit_build_history" action="update_forms/build_history_action.php" method="post">
	<p>Researched By: <input type="text" name="ResearchedBy" value="<?=$ResearchedBy?>"></p>
	<input name="ResearchedBy_Before" type="hidden" value="<?php echo $ResearchedBy; ?>" />
	<input name="ResearchedBy_Field" type="hidden" value="ResearchedBy" />
	<p>Bought By: <input type="text" name="BoughtBy" value="<?=$BoughtBy?>"></p>
	<input name="BoughtBy_Before" type="hidden" value="<?php echo $BoughtBy; ?>" />
	<input name="BoughtBy_Field" type="hidden" value="BoughtBy" />
	<p>Date Bought: <input class="Date" type="text" name="DateBought" value="<?php echo $DateBought; ?>" /></p>
	<input name="DateBought_Before" type="hidden" value="<?php echo $DateBought; ?>" />
	<input name="DateBought_Field" type="hidden" value="DateBought" />
	<p>Writer: <input type="text" name="Writer" value="<?=$Writer?>"></p>
	<input name="Writer_Before" type="hidden" value="<?php echo $Writer; ?>" />
	<input name="Writer_Field" type="hidden" value="Writer" />
	<p>Content Admin: <input type="text" name="ContentAdmin" value="<?=$ContentAdmin?>"></p>
	<input name="ContentAdmin_Before" type="hidden" value="<?php echo $ContentAdmin; ?>" />
	<input name="ContentAdmin_Field" type="hidden" value="ContentAdmin" />
	<p>Content Start: <input class="Date" type="text" name="ContentStart" value="<?php echo $ContentStart; ?>" /></p>
	<input name="ContentStart_Before" type="hidden" value="<?php echo $ContentStart; ?>" />
	<input name="ContentStart_Field" type="hidden" value="ContentStart" />
	<p>Content Finish: <input class="Date" type="text" name="ContentFinish" value="<?php echo $ContentFinish; ?>" /></p>
	<input name="ContentFinish_Before" type="hidden" value="<?php echo $ContentFinish; ?>" />
	<input name="ContentFinish_Field" type="hidden" value="ContentFinish" />
	<p>Content Hours: <input type="text" name="ContentHours" value="<?php echo $ContentHours; ?>" /></p>
	<input name="ContentHours_Before" type="hidden" value="<?php echo $ContentHours; ?>" />
	<input name="ContentHours_Field" type="hidden" value="ContentHours" />
	<p>Reviewer: <input type="text" name="Reviewer" value="<?=$Reviewer?>"></p>
	<input name="Reviewer_Before" type="hidden" value="<?php echo $Reviewer; ?>" />
	<input name="Reviewer_Field" type="hidden" value="Reviewer" />
	<p>Review Start: <input class="Date" type="text" name="ReviewStart" value="<?php echo $ReviewStart; ?>" /></p>
	<input name="ReviewStart_Before" type="hidden" value="<?php echo $ReviewStart; ?>" />
	<input name="ReviewStart_Field" type="hidden" value="ReviewStart" />
	<p>Designer: <input type="text" name="Designer" value="<?=$Designer?>"></p>
	<input name="Designer_Before" type="hidden" value="<?php echo $Designer; ?>" />
	<input name="Designer_Field" type="hidden" value="Designer" />
	<p>Design Start: <input class="Date" type="text" name="DesignStart" value="<?php echo $DesignStart; ?>" /></p>
	<input name="DesignStart_Before" type="hidden" value="<?php echo $DesignStart; ?>" />
	<input name="DesignStart_Field" type="hidden" value="DesignStart" />
	<p>Design Finish: <input class="Date" type="text" name="DesignFinish" value="<?php echo $DesignFinish; ?>" /></p>
	<input name="DesignFinish_Before" type="hidden" value="<?php echo $DesignFinish; ?>" />
	<input name="DesignFinish_Field" type="hidden" value="DesignFinish" />
	<p>Cloner: <input type="text" name="Cloner" value="<?=$Cloner?>"></p>
	<input name="Cloner_Before" type="hidden" value="<?php echo $Cloner; ?>" />
	<input name="Cloner_Field" type="hidden" value="Cloner" />
	<p>Clone Finished: <input class="Date" type="text" name="CloneFinished" value="<?php echo $CloneFinished; ?>" /></p>
	<input name="CloneFinished_Before" type="hidden" value="<?php echo $CloneFinished; ?>" />
	<input name="CloneFinished_Field" type="hidden" value="CloneFinished" />
	<p>Developer: <input type="text" name="Developer" value="<?=$Developer?>"></p>
	<input name="Developer_Before" type="hidden" value="<?php echo $Developer; ?>" />
	<input name="Developer_Field" type="hidden" value="Developer" />
	<p>Dev Start: <input class="Date" type="text" name="DevStart" value="<?php echo $DevStart; ?>" /></p>
	<input name="DevStart_Before" type="hidden" value="<?php echo $DevStart; ?>" />
	<input name="DevStart_Field" type="hidden" value="DevStart" />
	<p>Dev Finish: <input class="Date" type="text" name="DevFinish" value="<?php echo $DevFinish; ?>" /></p>
	<input name="DevFinish_Before" type="hidden" value="<?php echo $DevFinish; ?>" />
	<input name="DevFinish_Field" type="hidden" value="DevFinish" />
	<p>QA Inspector: <input type="text" name="QAInspector" value="<?=$QAInspector?>"></p>
	<input name="QAInspector_Before" type="hidden" value="<?php echo $QAInspector; ?>" />
	<input name="QAInspector_Field" type="hidden" value="QAInspector" />
	<p>Date Complete: <input class="Date" type="text" name="DateComplete" value="<?php echo $DateComplete; ?>" /></p>
	<input name="DateComplete_Before" type="hidden" value="<?php echo $DateComplete; ?>" />
	<input name="DateComplete_Field" type="hidden" value="DateComplete" />
	<input name="TimeStamp" type="hidden" value="<?php echo date("Y-m-d h:m:s"); ?> " />
	<input name="User" type="hidden" value="<?php echo $user; ?>" />
	<input name="DomainName" type="hidden" value="<?=$DomainName?>" />
	<input type="submit" class="popout_button" value="Submit">
</form>