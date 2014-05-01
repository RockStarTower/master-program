<?php
include 'users/loginheader.php';
include 'header.php';
if(login_check($mysqli) == true) {
if( ! isset($_GET['Permissions'])){
$viewPermissions = $permissions;
}
else {
$viewPermissions = $_GET['Permissions'];
}
$teamArray = teamGoals($viewPermissions, $mysqli);
if ($permissions == 'Support' && $_GET['Permissions'] == 'Domain') {
	$permissions = 'Domain';
}
$userArray = userGoals($fullname, $permissions, $mysqli);
$curDate = date ("Y-m-d");
$curMonth = date('m');
$curYear = date('Y');
$beginWeek = date('d', strtotime('last sunday'));
$beginWeekMonth = date('m', strtotime('last sunday'));
$endWeek = date('d', strtotime('this saturday'));
$endWeekMonth = date('m', strtotime('this saturday'));
$weekBegin = $curYear . '-' . $beginWeekMonth . '-' . $beginWeek;
$weekEnd = $curYear . '-' . $endWeekMonth . '-' . $endWeek;
//if( ! isset($_GET['goaldate'])){
$query1 = "SELECT * FROM `goals` ORDER BY `goals`.`WeekOf` DESC LIMIT 1";
$goaldate = mysqli_query($mysqli, $query1);
//}
//else {
//	$goalpost = $_GET['goaldate'];
//	$query1 = "SELECT * FROM goals WHERE WeekOf = '$goalpost' LIMIT 1";
//	$goaldate = mysqli_query($mysqli, $query1);
//}
$dateof = array();
// Query to pull all goals data 
$goaldates = mysqli_query($mysqli, "SELECT * FROM goals");
$rows = mysqli_num_rows($goaldates);
// Parse and push data to $dateof
for ($i = 0; $i < $rows; $i++){
	mysqli_data_seek($goaldates, $i);
	$domain_data = mysqli_fetch_assoc($goaldates);
	$data = $domain_data['WeekOf'];
	array_push($dateof, $data);
}
// Sort $dateof to be ascending
rsort($dateof);
?>
<div class="page-wrap">
<form name="goals-picker" id="goals-picker" action="goals.php" method="GET">
	<label for="Permissions">Team: </label>
		<select class="selectdudes" required name="Permissions" id="Permissions" value="<?=$_GET['Permissions']?>">
			<option value="Domain">Domains</option>
			<?php if( $permissions == 'Content') { echo '<option value="Content">Content</option>';}?>
			<?php if( $permissions != 'Content') { echo '<option value="Writer">Content</option>';}?>
			<option value="Designer">Designer</option>
			<option value="Support">Support</option>
			<option value="Admin">Developer</option>
			<option value="QA">QA</option>
		</select>
	<input type="submit" value="View Goals">
</form>
<form id="filterForm" action="" method="">
	<input type="text" id="filter" class="goalsFilter" placeholder="Filter Goals" />
</form>
<div id="filters"></div>
<?php

//take the week posted from the submission page and update the database
switch ($viewPermissions) {
	case 'Domain':
		$prevRole = 'DateBought';
		$role = 'DateBought';
		$title = 'Domain Purchasing';
		$user = 'BoughtBy';
		break;
	case 'Content':
		$prevRole = 'DateBought';
		$role = 'ContentFinished';
		$title = 'Content';
		$user = 'ContentAdmin';
		break;
	case 'Writer':
		$prevRole = 'ContentStart';
		$role = 'ContentFinished';
		$title = 'Writer';
		$user = 'Reviewer';
		break;
	case 'Designer':
		$prevRole = 'ContentFinished';
		$role = 'DesignFinish';
		$title = 'Design';
		$user = 'Designer';
		break;
	case 'Support':
		$prevRole = 'DesignFinish';
		$role = 'CloneFinished';
		$title = 'Support';
		$user = 'Cloner';
		break;
	case 'Admin':
		$prevRole = 'CloneFinished';
		$role = 'DevFinish';
		$title = 'Development';
		$user = 'Developer';
		break;
	case 'QA':
		$prevRole = 'DevFinish';
		$role = 'DateComplete';
		$title = 'Launch';
		$user = 'QAInspector';
		break;
}
	
$result = mysqli_fetch_assoc($goaldate);
$goals[] = json_decode($result['Launch Goals'], true);
$query = "SELECT * FROM DomainDetails WHERE Status='In Process' AND $prevRole!='0000-00-00' OR DateComplete BETWEEN '$weekBegin' AND '$weekEnd' AND $prevRole!='0000-00-00'";
$results = mysqli_query($mysqli, $query);
$rows = mysqli_num_rows($results);
$goalcount = count($goals[0]);
for ($i = 0; $i < $goalcount; $i++){
	$goals[0][$i]['InProcess'] = 0;
	$goals[0][$i]['Assigned'] = 0;
	if ($permissions == 'Content'){
		$goals[0][$i]['InProcess2'] = 0;
		$goals[0][$i]['Assigned2'] = 0;
	}
}
if( $title != 'Launch'){
	for ($c = 0; $c < count($goals[0]); $c++){
		for ($b = 0; $b < count($goals[0]); $b++){
			if($goals[0][$c]['Vertical'] == $goals[0][$b]['Vertical'] && $goals[0][$c]['Country'] == $goals[0][$b]['Country'] && $goals[0][$c]['Language'] == $goals[0][$b]['Language'] && $c != $b && $goals[0][$b]['Goal'] > 0 && $goals[0][$c]['Goal'] != 0){
				$goals[0][$c]['Goal'] = (int)$goals[0][$c]['Goal'] + (int)$goals[0][$b]['Goal'];				
				(int)$goals[0][$b]['Goal'] = 0;
			}		
		}
	}	
}
$goalcount = count($goals[0]);	
for ($a = 0; $a < $rows; $a++){
	mysqli_data_seek($results, $a);
	$domain_data = mysqli_fetch_assoc($results);
	for ($i = 0; $i < $goalcount; $i++){		
		if ($goals[0][$i]['Vertical'] == $domain_data['Vertical'] && $goals[0][$i]['Country'] == $domain_data['Country'] && $goals[0][$i]['Language'] == $domain_data['Language']){
			if ($title != 'Writer' && $user != 'QAInspector'){
				if (strtotime($domain_data[$role]) == true && $user != 'ContentAdmin' && $user != 'BoughtBy'){
					(int)$goals[0][$i]['Goal'] = (int)$goals[0][$i]['Goal'] - 1;
				}
				elseif ($user == 'ContentAdmin' && strtotime($domain_data[$role]) == true){
					(int)$goals[0][$i]['Goal'] = (int)$goals[0][$i]['Goal'] - 1;					
				}
				elseif ($user == 'BoughtBy' && strtotime($domain_data[$role]) == true){
					(int)$goals[0][$i]['Goal'] = (int)$goals[0][$i]['Goal'] - 1;					
				}
				elseif ($user == 'ContentAdmin' && $domain_data['Reviewer'] != NULL && strtotime($domain_data['ContentFinished']) == false){
					$goals[0][$i]['Assigned2'] = (int)$goals[0][$i]['Assigned2'] + 1;
				}
				elseif ($user == 'ContentAdmin' && strtotime($domain_data['ReviewStart']) == true && $domain_data['Reviewer'] == NULL){
					$goals[0][$i]['InProcess2'] = (int)$goals[0][$i]['InProcess2'] + 1;
				}
				elseif ($user == 'ContentAdmin' && $domain_data['Writer'] != NULL && strtotime($domain_data[$role]) == false && strtotime($domain_data['DateComplete']) == false){
					$goals[0][$i]['Assigned'] = (int)$goals[0][$i]['Assigned'] + 1;
				}
				elseif ($user == 'ContentAdmin' && $domain_data['ContentAdmin'] == NULL){
					$goals[0][$i]['InProcess'] = (int)$goals[0][$i]['InProcess'] + 1;
				}
				elseif ($domain_data[$user] == NULL && $user != 'ContentAdmin' && strtotime($domain_data['DateComplete']) == false) {
					$goals[0][$i]['InProcess'] = (int)$goals[0][$i]['InProcess'] + 1;
				}				 
				elseif ($domain_data[$user] != NULL && $user != 'ContentAdmin') {
					$goals[0][$i]['Assigned'] = (int)$goals[0][$i]['Assigned'] + 1;
				}
			}
			elseif ($title == 'Writer') {
				if (strtotime($domain_data['ReviewStart']) == true && $domain_data[$user] == NULL ) {
					$goals[0][$i]['InProcess'] = (int)$goals[0][$i]['InProcess'] + 1;
				}
				elseif ($domain_data[$user] != NULL && strtotime($domain_data[$role]) == false){
					$goals[0][$i]['Assigned'] = (int)$goals[0][$i]['Assigned'] + 1;
				}
				elseif ($domain_data[$user] != NULL && strtotime($domain_data[$role]) == true) {
					(int)$goals[0][$i]['Goal'] = (int)$goals[0][$i]['Goal'] - 1;
				}				
			}
			elseif ($viewPermissions == 'QA' && $user == 'QAInspector'){
				if (strtotime($domain_data['DateComplete']) == true){
					$goals[0][$i]['Goal'] = (int)$goals[0][$i]['Goal'] - 1;
				}
				if ($domain_data[$user] == NULL && strtotime($domain_data['DateComplete']) == false) {
					$goals[0][$i]['InProcess'] = (int)$goals[0][$i]['InProcess'] + 1;
				}
				elseif ($domain_data[$user] != NULL && strtotime($domain_data['DateComplete']) == false && $goals[0][$i]['Type'] == $domain_data['Type']){
					$goals[0][$i]['Assigned'] = (int)$goals[0][$i]['Assigned'] + 1;
				}
			}
		}
	}	
}

?>

<h1 class="goalsh1"><?php echo $title?> Goals</h1>
<table class="goals" id="goalsTable"<?php if ($viewPermissions == 'Content'){echo 'style="width:85%;"';}?>>
	<tr>
		<th><h2>Vertical</h2></th>
		<th><h2>Country</h2></th>
		<th><h2>Language</h2></th>
		<?php if( $title == 'Launch') { echo "<th><h2>Type</h2></th>";}?>
		<th><h2>DateWaiting</h2></th>
		<th><h2>Needed</h2></th>
		<?php if( $viewPermissions != 'Domain') { echo "<th><h2>Assigned</h2></th>";}?>
		<?php if( $permissions == 'Content' && $viewPermissions == 'Content') { echo "<th><h2>Assigned Review</h2></th>";}?>
		<?php if( $viewPermissions != 'Domain') { echo "<th><h2>Ready</h2></th>";}?>
		<?php if( $permissions == 'Content' && $viewPermissions == 'Content') { echo "<th><h2>Ready for Review</h2></th>";}?>
	</tr>
<?php

for ($i = 0; $i < $goalcount; $i++){
if ($permissions == 'QA') {
$blog = 'data-blog="'.$goals[0][$i]['Type'].'"';
}
else {
$blog = '';
}
	if ((int)$goals[0][$i]['Goal'] < 1){
		unset($goals[0][$i]);
	}
	else {
		echo '<tr class="goalslist">';
		echo '<td>'.$goals[0][$i]['Vertical'].'</td>';
		echo '<td>'.$goals[0][$i]['Country'].'</td>';
		echo '<td>'.$goals[0][$i]['Language'].'</td>';
		if( $title == 'Launch'){
			echo '<td>'.$goals[0][$i]['Type'].'</td>';
		}
		echo '<td>'.$goals[0][$i]['DateWaiting'].'</td>';
		echo '<td>'.$goals[0][$i]['Goal'].'</td>';
		if($viewPermissions != 'Domain') {$assigned = ($goals[0][$i]['Assigned'] != '0') ? '<td><a class="popout_assigned" href="javascript:void(0);" data-vertical="'.$goals[0][$i]['Vertical'].'" data-country="'.$goals[0][$i]['Country'].'" data-language="'.$goals[0][$i]['Language'].'" data-permissions="'.$permissions.'">'.$goals[0][$i]['Assigned'].'</a></td>' : '<td>'.$goals[0][$i]['Assigned'].'</td>'; echo $assigned;}
		if($permissions == 'Content' && $viewPermissions == 'Content') {echo '<td>'.$goals[0][$i]['Assigned2'].'</td>';}
		if($viewPermissions == $permissions && $goals[0][$i]['InProcess'] != 0) {
		echo '<td><p class="ready active_goal"><a href="javascript:void(0);" class="popout active_goal" '.$blog.' data-vertical="'.$goals[0][$i]['Vertical'].'" data-country="'.$goals[0][$i]['Country'].'" data-language="'.$goals[0][$i]['Language'].'" data-permissions="'.$permissions.'" >'.$goals[0][$i]['InProcess'].' Ready</a><p></td>';
		}
		elseif($viewPermissions != 'Domain'){
		echo '<td><p class="ready notactive_goal">'.$goals[0][$i]['InProcess'].' Ready</p></td>';
		}
		if($permissions == 'Content' && $goals[0][$i]['InProcess2'] != 0) {
		echo '<td><p class="ready active_goal"><a href="javascript:void(0);" class="popout active_goal" data-vertical="'.$goals[0][$i]['Vertical'].'" data-country="'.$goals[0][$i]['Country'].'" data-language="'.$goals[0][$i]['Language'].'" data-permissions="Writer" >'.$goals[0][$i]['InProcess2'].' Ready</a></p></td>';
		}
		elseif($permissions == 'Content' && $viewPermissions == 'Content' && $goals[0][$i]['InProcess2'] == 0) {
		echo '<td><p class="ready notactive_goal">'.$goals[0][$i]['InProcess2'].' Ready</p></td>';
		}
		echo '</tr>';
	}
}
	
?>

</table>
<div id="numbers" <?php if ($viewPermissions == 'Content'){echo 'style="width:14.5%;"';}?>>
    <div id="user_numbers">
  		<h1>My Numbers</h1>
  		<h2>Day</h2>
  		<p><?=$userArray[0]?></p>
  		<h2>Week</h2>
  		<p><?=$userArray[1]?></p>
  		<h2>Month</h2>
  		<p><?=$userArray[2]?></p>
     </div>
    <div id="team_numbers">
  		<h1>Team Numbers</h1>
  		<h2>Day</h2>
  		<p><?=$teamArray[0]?></p>
  		<h2>Week</h2>
  		<p><?=$teamArray[1]?></p>
  		<h2>Month</h2>
  		<p><?=$teamArray[2]?></p>
     </div>
</div>
</div>
<div id="popout_wrap">
	<div id="popout_wrapper">
		<a class="close_popout" href="javascript:void(0)">X</a>
		<div id="popout_box"></div>
	</div>
</div>
<?php
} else {
	header('Location: user/login.php');
}
include 'footer.php';

?>