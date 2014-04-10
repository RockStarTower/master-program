<?php

include '../users/loginheader.php';

$permissions = $_GET['permissions'];
switch ($permissions) {
	case 'Content':
		$role = 'Writer';
		$date = 'ReviewStart';
		break;
	case 'Writer':
		$role = 'Reviewer';
		$date = 'ContentFinished';
		break;
	case 'Designer':
		$role = 'Designer';
		$date = 'DesignFinish';
		break;
	case 'Support':
		$role = 'Cloner';
		$date = 'CloneFinished';
		break;
	case 'Admin':
		$role = 'Developer';
		$date = 'DevFinish';
		break;
	case 'QA':
		$role = 'QAInspector';
		$date = 'DateComplete';
		break;
}

$vertical = $_GET['vertical'];
$country = $_GET['country'];
$language = $_GET['language'];

echo '<h2 id="popout_vertical">Assigned - '.$vertical .' '. $country .' '. $language.'</h2>';
echo '<div id="popout_goals">';
$results = mysqli_query($mysqli, "SELECT * FROM DomainDetails WHERE Status='In Process' AND $role!='' AND Vertical='$vertical' AND Country='$country' AND Language='$language' AND $date='0000-00-00'") or die(mysqli_error($mysqli));
$rows = mysqli_num_rows($results);
for ($a = 0; $a < $rows; $a++){
	mysqli_data_seek($results, $a);
	$domain_data = mysqli_fetch_assoc($results);
	?><div class="claimer"><a href="<?=$domain_data['Domain']?>" target="_blank"><?=$domain_data['Domain']?></a> - <?=$domain_data[$role]?></div><?php
}
echo '</div>';