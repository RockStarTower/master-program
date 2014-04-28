<?php
include 'users/loginheader.php';
include 'header.php';
if(login_check($mysqli) == true) {
if($permissions == 'Content'){
	$teamName = 'Writer';
	$team = 'Writer';
} elseif ($permissions == 'Admin') {
	$teamName = 'Dev';
	$team = 'Admin';
} elseif ($permissions == 'Designer'){
	$teamName = 'Design';
	$team = $permissions;
} else {
	$teamName = $permissions;
	$team = $permissions;
}


?>
<div class="page-wrap dashboard">
	<div id="overview">
	<h1>Team Overview</h1>
	<?php if($permissions == 'Content' || $permissions == 'Writer'){?>
	<h2 class='floatOverview'>Writing</h2>
		<div class="box"><h2>Day</h2><?php writeChart($mysqli, $teamName, 'Day', '250','250');?><div class="donutKey"><span class="completedSpan"><span class="completedColor">&#x25A7;</span>Completed <span class='cnumber'></span></span><span class="inQSpan"><span class="inQColor">&#x25A7;</span>In Queue <span class='qnumber'></span></span><span class="inProcessSpan"><span class="inProcessColor">&#x25A7;</span>In Process <span class='pnumber'></span></span></div></div>
		<div class="box"><h2>Week</h2><?php writeChart($mysqli, $teamName, 'Week', '250','250');?><div class="donutKey"><span class="completedSpan"><span class="completedColor">&#x25A7;</span>Completed <span class='cnumber'></span></span><span class="inQSpan"><span class="inQColor">&#x25A7;</span>In Queue <span class='qnumber'></span></span><span class="inProcessSpan"><span class="inProcessColor">&#x25A7;</span>In Process <span class='pnumber'></span></span></div></div>
		<div class="box"><h2>Month</h2><?php writeChart($mysqli, $teamName, 'Month', '250','250');?><div class="donutKey"><span class="completedSpan"><span class="completedColor">&#x25A7;</span>Completed <span class='cnumber'></span></span><span class="inQSpan"><span class="inQColor">&#x25A7;</span>In Queue <span class='qnumber'></span></span><span class="inProcessSpan"><span class="inProcessColor">&#x25A7;</span>In Process <span class='pnumber'></span></span></div></div>
	<h2 class='floatOverview'>Reviewing</h2>
		<div class="box"><h2>Day</h2><?php reviewChart($mysqli, $teamName, 'Day', '250','250');?><div class="donutKey"><span class="completedSpan"><span class="completedColor">&#x25A7;</span>Completed <span class='cnumber'></span></span><span class="inQSpan"><span class="inQColor">&#x25A7;</span>In Queue <span class='qnumber'></span></span><span class="inProcessSpan"><span class="inProcessColor">&#x25A7;</span>In Process <span class='pnumber'></span></span></div></div>
		<div class="box"><h2>Week</h2><?php reviewChart($mysqli, $teamName, 'Week', '250','250');?><div class="donutKey"><span class="completedSpan"><span class="completedColor">&#x25A7;</span>Completed <span class='cnumber'></span></span><span class="inQSpan"><span class="inQColor">&#x25A7;</span>In Queue <span class='qnumber'></span></span><span class="inProcessSpan"><span class="inProcessColor">&#x25A7;</span>In Process <span class='pnumber'></span></span></div></div>
		<div class="box"><h2>Month</h2><?php reviewChart($mysqli, $teamName, 'Month', '250','250');?><div class="donutKey"><span class="completedSpan"><span class="completedColor">&#x25A7;</span>Completed <span class='cnumber'></span></span><span class="inQSpan"><span class="inQColor">&#x25A7;</span>In Queue <span class='qnumber'></span></span><span class="inProcessSpan"><span class="inProcessColor">&#x25A7;</span>In Process <span class='pnumber'></span></span></div></div>
	<?php  } else { ?>
		<div class="box"><h2>Day</h2><?php teamChart($mysqli, $teamName, 'Day', '250','250');?><div class="donutKey"><span class="completedSpan"><span class="completedColor">&#x25A7;</span>Completed <span class='cnumber'></span></span><span class="inQSpan"><span class="inQColor">&#x25A7;</span>In Queue <span class='qnumber'></span></span><span class="inProcessSpan"><span class="inProcessColor">&#x25A7;</span>In Process <span class='pnumber'></span></span></div></div>
		<div class="box"><h2>Week</h2><?php teamChart($mysqli, $teamName, 'Week', '250','250');?><div class="donutKey"><span class="completedSpan"><span class="completedColor">&#x25A7;</span>Completed <span class='cnumber'></span></span><span class="inQSpan"><span class="inQColor">&#x25A7;</span>In Queue <span class='qnumber'></span></span><span class="inProcessSpan"><span class="inProcessColor">&#x25A7;</span>In Process <span class='pnumber'></span></span></div></div>
		<div class="box"><h2>Month</h2><?php teamChart($mysqli, $teamName, 'Month', '250','250');?><div class="donutKey"><span class="completedSpan"><span class="completedColor">&#x25A7;</span>Completed <span class='cnumber'></span></span><span class="inQSpan"><span class="inQColor">&#x25A7;</span>In Queue <span class='qnumber'></span></span><span class="inProcessSpan"><span class="inProcessColor">&#x25A7;</span>In Process <span class='pnumber'></span></span></div></div>
	<?php } ?>
	</div>
	<?php if($is_admin){ ?>
	<input type="text" id="filter" class="dashboardFilter" placeholder="Filter Team">
		<div id="user_list">
		<?php 
		$results = mysqli_query($mysqli, "SELECT * FROM Users WHERE Permissions='$team'") or die(mysqli_error($mysqli));
		$rows = mysqli_num_rows($results);
		for ($a = 0; $a < $rows; $a++){
			mysqli_data_seek($results, $a);
			$user_data = mysqli_fetch_assoc($results);
			$name = $user_data['FirstName'] . ' ' . $user_data['LastName'];
			?><div class="user" data-name="<?=$name?>"><p class="user_info"><?=$name?><span class="links"><a href="javascript:void(0)" class="userOverview">Overview</a> | <a href="javascript:void(0)" class="historyView" data-date='Today' data-team='<?=$team?>' data-user='<?=$name?>'>History</a></span></p>
				<?php if($permissions == 'Content' || $permissions == 'Writer'){?>
			<div class="user_view">
				<div class="writeView">
					<h2 class='floatOverview'>Writing Tasks</h2>
					<?php $userOverview = writerOverview($mysqli, $name); $permissions = 'Writer'; $userTasks = inMyQueue($mysqli, $name, $permissions);
					$turnary = ($userTasks == 0 ? '0' : '<a href="javascript:void(0);" class="dashAssigned" data-name="'.$name.'" data-permissions="'.$permissions.'">'.$userTasks.'</a>');?>
					<div class="box"><h2>Completed Today</h2><span><?=$userOverview['day']['complete']?></span></div>
					<div class="box"><h2>Completed This Week</h2><span><?=$userOverview['week']['complete']?></span></div>
					<div class="box"><h2>Completed This Month</h2><span><?=$userOverview['month']['complete']?></span></div>
					<div class="box"><h2>In Queue</h2><span><?=$turnary?></span></div>
				</div>
				<div class="reviewView">
					<h2 class='floatOverview'>Reviewing Tasks</h2>
					<?php $userOverview = reviewerOverview($mysqli, $name); $permissions = 'Writer'; $userTasks = inMyQueue($mysqli, $name, $permissions);
					$turnary = ($userTasks == 0 ? '0' : '<a href="javascript:void(0);" class="dashAssigned" data-name="'.$name.'" data-permissions="'.$permissions.'">'.$userTasks.'</a>');?>
					<div class="box"><h2>Completed Today</h2><span><?=$userOverview['day']['complete']?></span></div>
					<div class="box"><h2>Completed This Week</h2><span><?=$userOverview['week']['complete']?></span></div>
					<div class="box"><h2>Completed This Month</h2><span><?=$userOverview['month']['complete']?></span></div>
					<div class="box"><h2>In Queue</h2><span><?=$turnary?></span></div>
				</div>
			</div>
				<?php } else{ ?>
				<div class="user_view">
					<?php $userOverview = userOverview($mysqli, $name, $permissions); $userTasks = inMyQueue($mysqli, $name, $permissions);
					$turnary = ($userTasks == 0 ? '0' : '<a href="javascript:void(0);" class="dashAssigned" data-name="'.$name.'" data-permissions="'.$permissions.'">'.$userTasks.'</a>');?>
					<div class="box"><h2>Completed Today</h2><span><?=$userOverview['day']['complete']?></span></div>
					<div class="box"><h2>Completed This Week</h2><span><?=$userOverview['week']['complete']?></span></div>
					<div class="box"><h2>Completed This Month</h2><span><?=$userOverview['month']['complete']?></span></div>
					<div class="box"><h2>In Queue</h2><span><?=$turnary?></span></div>
				</div>
				<?php } ?>
			</div>
		<?php } ?>
		</div>
	<?php } else {
		$results = mysqli_query($mysqli, "SELECT * FROM Users WHERE Username='$user'") or die(mysqli_error($mysqli));
		$user_data = mysqli_fetch_assoc($results);
		$name = $user_data['FirstName'] . ' ' . $user_data['LastName'];
		?><div class="user"><p class="user_info"><?=$name?><span class="links">Overview | History</span></p>
		<?php if($permissions == 'Writer'){?>
		<div class='user_view'>
			<div class="writeView">
				<h2 class='floatOverview'>Writing Tasks</h2>
				<?php $userOverview = writerOverview($mysqli, $name); $permissions = 'Writer'; $userTasks = inMyQueue($mysqli, $name, $permissions);
				$turnary = ($userTasks == 0 ? '0' : '<a href="javascript:void(0);" class="dashAssigned" data-name="'.$name.'" data-permissions="'.$permissions.'">'.$userTasks.'</a>');?>
				<div class="box"><h2>Completed Today</h2><span><?=$userOverview['day']['complete']?></span></div>
				<div class="box"><h2>Completed This Week</h2><span><?=$userOverview['week']['complete']?></span></div>
				<div class="box"><h2>Completed This Month</h2><span><?=$userOverview['month']['complete']?></span></div>
				<div class="box"><h2>In Queue</h2><span><?=$turnary?></span></div>
			</div>
			<div class="reviewView">
				<h2 class='floatOverview'>Reviewing Tasks</h2>
				<?php $userOverview = reviewerOverview($mysqli, $name); $permissions = 'Writer'; $userTasks = inMyQueue($mysqli, $name, $permissions);
				$turnary = ($userTasks == 0 ? '0' : '<a href="javascript:void(0);" class="dashAssigned" data-name="'.$name.'" data-permissions="'.$permissions.'">'.$userTasks.'</a>');?>
				<div class="box"><h2>Completed Today</h2><span><?=$userOverview['day']['complete']?></span></div>
				<div class="box"><h2>Completed This Week</h2><span><?=$userOverview['week']['complete']?></span></div>
				<div class="box"><h2>Completed This Month</h2><span><?=$userOverview['month']['complete']?></span></div>
				<div class="box"><h2>In Queue</h2><span><?=$turnary?></span></div>
			</div>
		</div>
			<?php } else { ?>
			<div class="user_view">
			<?php $userOverview = userOverview($mysqli, $name, $permissions); $userTasks = inMyQueue($mysqli, $name, $permissions); ?>
				<div class="box"><h2>Completed Today</h2><span><?=$userOverview['day']['complete']?></span></div>
				<div class="box"><h2>Completed This Week</h2><span><?=$userOverview['week']['complete']?></span></div>
				<div class="box"><h2>Completed This Month</h2><span><?=$userOverview['month']['complete']?></span></div>
				<div class="box"><h2>In Queue</h2><span><?=$userTasks?></span></div>
			</div>
			<?php } ?>
			<div class="history">
				<p class="history_heading"><h2>My History</h2></p><p><a class="change_date" href="javascript:void(0);">Today</a> | <a class="change_date" href="javascript:void(0);">This Week</a> | <a class="change_date" href="javascript:void(0);">This Month</a> | <a class="change_date" href="javascript:void(0);">All</a></p>
				<input type="hidden" class="historyjs" data-date='Today' data-team='<?=$team?>' data-user='<?=$name?>'>
				<div class="history_view"></div>
			</div>
		</div>
	<?php } ?>
</div>
<?php } else {
	header('Location: users/login.php');
}

function writeChart($mysqli, $team, $time, $width, $height){
	$curDate = date ("Y-m-d");
	$curMonth = date('m');
	$curYear = date('Y');
	$beginWeek = date("Y-m-d", strtotime('last sunday'));
	$endWeek = date("Y-m-d", strtotime('this friday'));
	$monthBegin = $curYear . '-' . $curMonth . '-01';
	$monthEnd = $curYear . '-' . $curMonth . '-31';
	
	$date1 = 'ContentStart';
	$date2 = 'ReviewStart';
	$previous = 'DateBought';
	$person = 'Writer';
	
	$stmt = "SELECT * FROM DomainDetails WHERE ContentFinished='0000-00-00' AND DateBought!='0000-00-00'";

	$results = mysqli_query($mysqli, $stmt) or die(mysqli_error($mysqli));
		$rows = mysqli_num_rows($results);
		$complete = 0;
		$inQ = 0;
		$inProcess = 0;
		for ($a = 0; $a < $rows; $a++){
			mysqli_data_seek($results, $a);
			$chart_data = mysqli_fetch_assoc($results);
			switch ($time) {
				case 'Day':
					if($chart_data[$date2] == $curDate){
						$complete++;
					}
					if($chart_data[$date1] == $curDate && strtotime($chart_data[$date2]) == false && $chart_data[$person] != ''){
						$inQ++;
					}
					if(strtotime($chart_data['ContentFinished']) == false && strtotime($chart_data['ContentStart']) == true && $chart_data['Writer'] != '' && strtotime($chart_data['ReviewStart']) == false && $chart_data['Reviewer'] == ''){
						$inProcess++;
					}
					break;
				case 'Week':
					if($chart_data[$date2] >= $beginWeek && $chart_data[$date2] <= $endWeek){
						$complete++;
					}
					if($chart_data[$date1] >= $beginWeek && $chart_data[$date1] <= $endWeek && strtotime($chart_data[$date2]) == false && $chart_data[$person] != ''){
						$inQ++;
					}
					if(strtotime($chart_data['ContentFinished']) == false && strtotime($chart_data['ContentStart']) == true && $chart_data['Writer'] != '' && strtotime($chart_data['ReviewStart']) == false && $chart_data['Reviewer'] == ''){
						$inProcess++;
					}
					break;
				case 'Month':
					if($chart_data[$date2] >= $monthBegin && $chart_data[$date2] <= $monthEnd){
						$complete++;
					}
					if($chart_data[$date1] >= $monthBegin && $chart_data[$date1] <= $monthEnd && strtotime($chart_data[$date2]) == false && $chart_data[$person] != ''){
						$inQ++;
					}
					if(strtotime($chart_data['ContentFinished']) == false && strtotime($chart_data['ContentStart']) == true && $chart_data['Writer'] != '' && strtotime($chart_data['ReviewStart']) == false && $chart_data['Reviewer'] == ''){
						$inProcess++;
					}
					break;
				case 'All':
					if(strtotime($chart_data[$date2]) == true){
						$complete++;
					}
					if(strtotime($chart_data[$date1]) == true && strtotime($chart_data[$date2]) == false && $chart_data[$person] != ''){
						$inQ++;
					}
					if(strtotime($chart_data['ContentFinished']) == false && strtotime($chart_data['ContentStart']) == true && $chart_data['Writer'] != '' && strtotime($chart_data['ReviewStart']) == false && $chart_data['Reviewer'] == ''){
						$inProcess++;
					}
					break;
			}
		}
	$vars = 'data-complete="'.$complete.'" data-inq="'.$inQ.'" data-inprocess="'.$inProcess.'"';
	echo '<canvas '.$vars.' id="'.$team.$time.'Chart" width="'.$width.'" height="'.$height.'"></canvas>';
}

function reviewChart($mysqli, $team, $time, $width, $height){
	$curDate = date ("Y-m-d");
	$curMonth = date('m');
	$curYear = date('Y');
	$beginWeek = date("Y-m-d", strtotime('last sunday'));
	$endWeek = date("Y-m-d", strtotime('this friday'));
	$monthBegin = $curYear . '-' . $curMonth . '-01';
	$monthEnd = $curYear . '-' . $curMonth . '-31';
	
	$date1 = 'ReviewStart';
	$date2 = 'ContentFinished';
	$previous = 'ContentStart';
	$person = 'Reviewer';
	
	$stmt = "SELECT * FROM DomainDetails WHERE ContentStart!='0000-00-00' AND DesignStart!='0000-00-00'";

	$results = mysqli_query($mysqli, $stmt) or die(mysqli_error($mysqli));
		$rows = mysqli_num_rows($results);
		$complete = 0;
		$inQ = 0;
		$inProcess = 0;
		for ($a = 0; $a < $rows; $a++){
			mysqli_data_seek($results, $a);
			$chart_data = mysqli_fetch_assoc($results);
			switch ($time) {
				case 'Day':
					if($chart_data[$date2] == $curDate){
						$complete++;
					}
					if($chart_data[$date1] == $curDate && strtotime($chart_data[$date2]) == false && $chart_data[$person] != ''){
						$inQ++;
					}
					if(strtotime($chart_data['ContentFinished']) == false && strtotime($chart_data['ContentStart']) == true && $chart_data['Writer'] != '' && strtotime($chart_data['ReviewStart']) == false && $chart_data['Reviewer'] == ''){
						$inProcess++;
					}
					break;
				case 'Week':
					if($chart_data[$date2] >= $beginWeek && $chart_data[$date2] <= $endWeek){
						$complete++;
					}
					if($chart_data[$date1] >= $beginWeek && $chart_data[$date1] <= $endWeek && strtotime($chart_data[$date2]) == false && $chart_data[$person] != ''){
						$inQ++;
					}
					if(strtotime($chart_data['ContentFinished']) == false && strtotime($chart_data['ContentStart']) == true && $chart_data['Writer'] != '' && strtotime($chart_data['ReviewStart']) == false && $chart_data['Reviewer'] == ''){
						$inProcess++;
					}
					break;
				case 'Month':
					if($chart_data[$date2] >= $monthBegin && $chart_data[$date2] <= $monthEnd){
						$complete++;
					}
					if($chart_data[$date1] >= $monthBegin && $chart_data[$date1] <= $monthEnd && strtotime($chart_data[$date2]) == false && $chart_data[$person] != ''){
						$inQ++;
					}
					if(strtotime($chart_data['ContentFinished']) == false && strtotime($chart_data['ContentStart']) == true && $chart_data['Writer'] != '' && strtotime($chart_data['ReviewStart']) == false && $chart_data['Reviewer'] == ''){
						$inProcess++;
					}
					break;
				case 'All':
					if(strtotime($chart_data[$date2]) == true){
						$complete++;
					}
					if(strtotime($chart_data[$date1]) == true && strtotime($chart_data[$date2]) == false && $chart_data[$person] != ''){
						$inQ++;
					}
					if(strtotime($chart_data['ContentFinished']) == false && strtotime($chart_data['ContentStart']) == true && $chart_data['Writer'] != '' && strtotime($chart_data['ReviewStart']) == false && $chart_data['Reviewer'] == ''){
						$inProcess++;
					}
					break;
			}
		}
	$team = 'Review';
	$vars = 'data-complete="'.$complete.'" data-inq="'.$inQ.'" data-inprocess="'.$inProcess.'"';
	echo '<canvas '.$vars.' id="'.$team.$time.'Chart" width="'.$width.'" height="'.$height.'"></canvas>';
}