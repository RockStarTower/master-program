<?php

include 'users/loginheader.php';

$curDate = date ("Y-m-d");
$curMonth = date('m');
$curYear = date('Y');
$beginWeek = date('d', strtotime('last sunday'));
$endWeek = date('d', strtotime('this saturday'));
$weekBegin = $curYear . '-' . $curMonth . '-' . $beginWeek;
$weekEnd = $curYear . '-' . $curMonth . '-' . $endWeek;
$permissions1 = $_GET['permissions'];

switch ($permissions1) {
	case 'Content':
		$prevRole = 'DateBought';
		$role = 'ContentFinished';
		$user = 'ContentAdmin';
		break;
	case 'Writer':
		$prevRole = 'ReviewStart';
		$role = 'ContentFinished';
		$title = 'Writer';
		$user = 'Reviewer';
		break;
	case 'Designer':
		$prevRole = 'ContentFinished';
		$role = 'DesignFinish';
		$user = 'Designer';
		break;
	case 'Support':
		$prevRole = 'DesignFinish';
		$role = 'CloneFinished';
		$user = 'Cloner';
		break;
	case 'Admin':
		$prevRole = 'CloneFinished';
		$role = 'DevFinish';
		$user = 'Developer';
		break;
	case 'QA':
		$prevRole = 'DevFinish';
		$role = 'DateComplete';
		$user = 'QAInspector';
		break;
}

$vertical = $_GET['vertical'];
$country = $_GET['country'];
$language = $_GET['language'];
if(isset($_GET['blog']) && !empty($_GET['blog'])){
	$blog = 'data-blog="'.$blog.'"';
}
else {
$blog = '';
}
echo '<h2 id="popout_vertical">'.$vertical.'</h2>';
echo '<div id="popout_goals">';
$results = mysqli_query($mysqli, "SELECT * FROM DomainDetails WHERE Status='In Process'");
$rows = mysqli_num_rows($results);
for ($a = 0; $a < $rows; $a++){
	mysqli_data_seek($results, $a);
	$domain_data = mysqli_fetch_assoc($results);
	if ($vertical == $domain_data['Vertical'] && $country == $domain_data['Country'] && $language == $domain_data['Language']){
		if (strtotime($domain_data[$prevRole]) == true){
			if (strtotime($domain_data[$role]) != true && $domain_data[$user] == NULL) {
				echo '<div class="claimer"><a href="http://'.$domain_data['Domain'].'" target="_blank">'.$domain_data['Domain'].'</a><a href="javascript:void(0);" class="claim_button ready active_goal" '.$blog.' data-username="'.$fullname.'" data-date="'.$curDate.'" data-domain="'.$domain_data['Domain'].'" data-user_permissions="'.$permissions1.'"> Claim Task </a></div>';
			}
		}						
	}
}
echo '</div>';
?>