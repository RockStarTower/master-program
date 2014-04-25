<?php
include '../functions.php';
include '../users/loginheader.php';
$name = $_GET['name'];
$userOverview = userOverview($mysqli, $name, $permissions); $userTasks = inMyQueue($mysqli, $name, $permissions); ?>
<div class="box"><h2>Completed Today</h2><span><?=$userOverview['day']['complete']?></span></div>
<div class="box"><h2>Completed This Week</h2><span><?=$userOverview['week']['complete']?></span></div>
<div class="box"><h2>Completed This Month</h2><span><?=$userOverview['month']['complete']?></span></div>
<div class="box"><h2>In Queue</h2><span><a href="javascript:void(0);" class="dashAssigned" data-name="<?=$name?>" data-permissions="<?=$permissions?>"><?=$userTasks?></a></span></div>