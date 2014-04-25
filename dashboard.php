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
		<div class="box"><h2>Day</h2><?php teamChart($mysqli, $teamName, 'Day', '250','250');?><div class="donutKey"><span class="completedSpan"><span class="completedColor">&#x25A7;</span>Completed</span><span class="inQSpan"><span class="inQColor">&#x25A7;</span>In Queue</span><span class="inProcessSpan"><span class="inProcessColor">&#x25A7;</span>In Process</span></div></div>
		<div class="box"><h2>Week</h2><?php teamChart($mysqli, $teamName, 'Week', '250','250');?><div class="donutKey"><span class="completedSpan"><span class="completedColor">&#x25A7;</span>Completed</span><span class="inQSpan"><span class="inQColor">&#x25A7;</span>In Queue</span><span class="inProcessSpan"><span class="inProcessColor">&#x25A7;</span>In Process</span></div></div>
		<div class="box"><h2>Month</h2><?php teamChart($mysqli, $teamName, 'Month', '250','250');?><div class="donutKey"><span class="completedSpan"><span class="completedColor">&#x25A7;</span>Completed</span><span class="inQSpan"><span class="inQColor">&#x25A7;</span>In Queue</span><span class="inProcessSpan"><span class="inProcessColor">&#x25A7;</span>In Process</span></div></div>
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
				<div class="user_view">
					<?php $userOverview = userOverview($mysqli, $name, $permissions); $userTasks = inMyQueue($mysqli, $name, $permissions);
					$turnary = ($userTasks == 0 ? '0' : '<a href="javascript:void(0);" class="dashAssigned" data-name="'.$name.'" data-permissions="'.$permissions.'">'.$userTasks.'</a>');?>
					<div class="box"><h2>Completed Today</h2><span><?=$userOverview['day']['complete']?></span></div>
					<div class="box"><h2>Completed This Week</h2><span><?=$userOverview['week']['complete']?></span></div>
					<div class="box"><h2>Completed This Month</h2><span><?=$userOverview['month']['complete']?></span></div>
					<div class="box"><h2>In Queue</h2><span><?=$turnary?></span></div>
				</div>
			</div>
		<?php } ?>
		</div>
	<?php } else {
		$results = mysqli_query($mysqli, "SELECT * FROM Users WHERE Username='$user'") or die(mysqli_error($mysqli));
		$user_data = mysqli_fetch_assoc($results);
		$name = $user_data['FirstName'] . ' ' . $user_data['LastName'];
		?><div class="user"><p class="user_info"><?=$name?><span class="links">Overview | History</span></p>
			<div class="user_view">
			<?php $userOverview = userOverview($mysqli, $name, $permissions); $userTasks = inMyQueue($mysqli, $name, $permissions); ?>
				<div class="box"><h2>Completed Today</h2><span><?=$userOverview['day']['complete']?></span></div>
				<div class="box"><h2>Completed This Week</h2><span><?=$userOverview['week']['complete']?></span></div>
				<div class="box"><h2>Completed This Month</h2><span><?=$userOverview['month']['complete']?></span></div>
				<div class="box"><h2>In Queue</h2><span><?=$userTasks?></span></div>
			</div>
			<div class="history">
				<p class="history_heading"><h2>My History</h2></p><p><a class="change_date" href="javascript:void(0);">Today</a> | <a class="change_date" href="javascript:void(0);">This Week</a> | <a class="change_date" href="javascript:void(0);">This Month</a> | <a class="change_date" href="javascript:void(0);">All</a></p>
				<input type="hidden" class="historyjs" data-date='Today' data-team='<?=$team?>' data-user='<?=$name?>'>
				<div class="history_view"></div>
			</div>
		</div>
	<?php } ?>
</div>
<?php } else {
	header('Location: user/login.php');
}