<?php
include '../functions.php';
include '../users/loginheader.php';
$name = $_GET['name'];

if($permissions == 'Content'){$permissions = 'Writer';}
if($permissions == 'Writer'){ ?>
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
<?php } else {
	$userOverview = userOverview($mysqli, $name, $permissions); $userTasks = inMyQueue($mysqli, $name, $permissions);
	$turnary = ($userTasks == 0 ? '0' : '<a href="javascript:void(0);" class="dashAssigned" data-name="'.$name.'" data-permissions="'.$permissions.'">'.$userTasks.'</a>');?>
	<div class="box"><h2>Completed Today</h2><span><?=$userOverview['day']['complete']?></span></div>
	<div class="box"><h2>Completed This Week</h2><span><?=$userOverview['week']['complete']?></span></div>
	<div class="box"><h2>Completed This Month</h2><span><?=$userOverview['month']['complete']?></span></div>
	<div class="box"><h2>In Queue</h2><span><?=$turnary?></span></div>
 <?php } ?>