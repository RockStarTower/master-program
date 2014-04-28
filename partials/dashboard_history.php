<?php 
include '../users/loginheader.php';
$user = $_GET['user'];
$team = $_GET['team'];
$date = $_GET['date'];
if(isset($_GET['teamLead']) && !empty($_GET['teamLead'])){
	$teamLead = $_GET['teamLead'];
} else {
	$teamLead = '';
}
$curDate = date ("Y-m-d");
$curMonth = date('m');
$curYear = date('Y');
switch ($team) {
	case 'Writer':
		$task = 'ContentFinished';
		break;
	case 'Designer':
		$task = 'DesignFinish';
		break;
	case 'Support':
		$task = 'CloneFinished';
		$team = 'Cloner';
		break;
	case 'Admin':
		$task = 'DevFinish';
		$team = 'Developer';
		break;
	case 'QA':
		$task = 'DateComplete';
		break;
}

if($team == 'Writer'){

	$task = 'ReviewStart';
	$team = 'Writer';
//WRITING HISTORY FOR WRITERS
	switch ($date) {
		case 'Today':
			$date = date('Y-m-d', strtotime('now'));
			$query = "SELECT * FROM DomainDetails WHERE $team='$user' AND $task='$curDate'";
			break;
		case 'This Week';
			$beginWeek = date("Y-m-d", strtotime('last sunday'));
			$endWeek = date("Y-m-d", strtotime('this friday'));
			$query = "SELECT * FROM DomainDetails WHERE $team='$user' AND $task BETWEEN '$beginWeek' AND '$endWeek'";
			break;
		case 'This Month';
			$monthBegin = $curYear . '-' . $curMonth . '-01';
			$monthEnd = $curYear . '-' . $curMonth . '-31';
			$query = "SELECT * FROM DomainDetails WHERE $team='$user' AND $task BETWEEN '$monthBegin' AND '$monthEnd'";
			break;
		case 'All';
			$query = "SELECT * FROM DomainDetails WHERE $team='$user' AND $task!='0000-00-00'";
			break;
	}

	$mydata = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
	$rows = mysqli_num_rows($mydata);
	if($teamLead == 'yes'){
		?><div class="historyNav"><span class="history_nav"><a class="changeHistory" href="javascript:void(0);">Today</a> | <a class="changeHistory" href="javascript:void(0);">This Week</a> | <a class="changeHistory" href="javascript:void(0);">This Month</a> | <a class="changeHistory" href="javascript:void(0);">All</a><p></p></span></div><?php
	}
	?><div class="domains"><?php
	if($rows != 0){
	for($i = 0; $i < $rows; $i++){
		mysqli_data_seek($mydata, $i);
		$my_data = mysqli_fetch_assoc($mydata);		
		?><p><?=$my_data['Domain']?> - Written<?='<span class="dateSpan"> - '.$my_data[$task].'</span>'?></p><?php
	}
	?><?php
	} else {
		echo '<p>No Writing History For '.$date.'</p>';
	}
//REVIEWING HISTORY FOR WRITERS

	$task = 'ContentFinished';
	$team = 'Reviewer';

	switch ($date) {
		case 'Today':
			$date = date('Y-m-d', strtotime('now'));
			$query = "SELECT * FROM DomainDetails WHERE $team='$user' AND $task='$curDate'";
			break;
		case 'This Week';
			$beginWeek = date("Y-m-d", strtotime('last sunday'));
			$endWeek = date("Y-m-d", strtotime('this friday'));
			$query = "SELECT * FROM DomainDetails WHERE $team='$user' AND $task BETWEEN '$beginWeek' AND '$endWeek'";
			break;
		case 'This Month';
			$monthBegin = $curYear . '-' . $curMonth . '-01';
			$monthEnd = $curYear . '-' . $curMonth . '-31';
			$query = "SELECT * FROM DomainDetails WHERE $team='$user' AND $task BETWEEN '$monthBegin' AND '$monthEnd'";
			break;
		case 'All';
			$query = "SELECT * FROM DomainDetails WHERE $team='$user' AND $task!='0000-00-00'";
			break;
	}

	$mydata = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
	$rows = mysqli_num_rows($mydata);
	?><?php
	if($rows != 0){
	for($i = 0; $i < $rows; $i++){
		mysqli_data_seek($mydata, $i);
		$my_data = mysqli_fetch_assoc($mydata);		
		?><p><?=$my_data['Domain']?> - Reviewed<?='<span class="dateSpan"> - '.$my_data[$task].'</span>'?></p><?php
	}
	?></div><?php
	} else {
		echo '<p>No Review History For '.$date.'</p>';
	}
} else {
	switch ($date) {
		case 'Today':
			$date = date('Y-m-d', strtotime('now'));
			$query = "SELECT * FROM DomainDetails WHERE $team='$user' AND $task='$date'";
			break;
		case 'This Week';
			$beginWeek = date("Y-m-d", strtotime('last sunday'));
			$endWeek = date("Y-m-d", strtotime('this friday'));
			$query = "SELECT * FROM DomainDetails WHERE $team='$user' AND $task BETWEEN '$beginWeek' AND '$endWeek'";
			break;
		case 'This Month';
			$monthBegin = $curYear . '-' . $curMonth . '-01';
			$monthEnd = $curYear . '-' . $curMonth . '-31';
			$query = "SELECT * FROM DomainDetails WHERE $team='$user' AND $task BETWEEN '$monthBegin' AND '$monthEnd'";
			break;
		case 'All';
			$query = "SELECT * FROM DomainDetails WHERE $team='$user' AND $task!='0000-00-00'";
			break;
	}

	$mydata = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
	$rows = mysqli_num_rows($mydata);
	if($teamLead == 'yes'){
		?><div class="historyNav"><span class="history_nav"><a class="changeHistory" href="javascript:void(0);">Today</a> | <a class="changeHistory" href="javascript:void(0);">This Week</a> | <a class="changeHistory" href="javascript:void(0);">This Month</a> | <a class="changeHistory" href="javascript:void(0);">All</a><p></p></span></div><?php
	}
	?><div class="domains"><?php
	if($rows != 0){
	for($i = 0; $i < $rows; $i++){
		mysqli_data_seek($mydata, $i);
		$my_data = mysqli_fetch_assoc($mydata);	
		?><p><?=$my_data['Domain']?><?='<span class="dateSpan"> - '.$my_data[$task].'</span>'?></p><?php
	}
	?></div><?php
	} else {
		echo 'No History For '.$date;
	}
}