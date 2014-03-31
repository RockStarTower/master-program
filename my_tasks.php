<?php
include 'users/loginheader.php';
include 'header.php';
if(login_check($mysqli) == true) {
$mon = date('m');
$year = date('Y');
$day = date('d');
if(isset($_GET['permissions'])){
	$permissions = $_GET['permissions'];
}
$fulldate = $year.'-'.$mon.'-'.$day;
?>
<div id="messages"></div>
<div class="page-wrap">
<?php
?><h1 id="my_claim_h1">My Claimed Tasks</h1><?php

function my_proccess_content($mysqli, $query, $fullname, $fulldate){
	$results = mysqli_query($mysqli, $query);
	$rows = mysqli_num_rows($results);
	$counter = 1;
	for ($i = 0; $i < $rows; $i++){
	mysqli_data_seek($results, $i);
	$domain_data = mysqli_fetch_assoc($results);
	if ($domain_data['Domain'] !== ''){
	?><div class="my_task">
		<a class="view_task ready active_goal" data-domain="<?=$domain_data['Domain']?>" href="#">View</a>
		<h2 class="float-left domain_info"><?=$domain_data['Domain'];?> - <?=$domain_data['Vertical']?> - <?=$domain_data['Country']?> - <?=$domain_data['Language']?></h2>
	</div>
	<?php } $counter++; }
}
function my_proccess_writer($mysqli, $query, $fullname, $fulldate, $permissions){
	$results = mysqli_query($mysqli, $query);
	$rows = mysqli_num_rows($results);
	$counter = 1;
	for ($i = 0; $i < $rows; $i++){
	mysqli_data_seek($results, $i);
	$domain_data = mysqli_fetch_assoc($results);
	if ($domain_data['Domain'] !== ''){
	$writing = (strtotime($domain_data['ReviewStart']) ? 'Reviewing' : 'Writing');
	$reg_class = (!empty($domain_data['ReviewNotes']) ? 'rejected' : '');
	$status = ($reg_class == 'rejected' ? 'Needs Revision' : '');
	?><div class="my_task <?=$reg_class?>">
		<a class="view_task ready active_goal" data-domain="<?=$domain_data['Domain']?>" data-writing="<?=$writing?>" href="#">View</a>
		<h2 class="float-left domain_info <?=$writing?>"><?=$domain_data['Domain'];?> - <?=$domain_data['Vertical']?> - <?=$domain_data['Country']?> - <?=$domain_data['Language']?><?php if(!empty($status)){ echo ' - '.$status;}?></h2>
	</div>
	<?php } $counter++; }
}
function my_proccess_designer($mysqli, $query, $fullname, $fulldate){
	$results = mysqli_query($mysqli, $query);
	$rows = mysqli_num_rows($results);
	$counter = 1;
	for ($i = 0; $i < $rows; $i++){
	mysqli_data_seek($results, $i);
	$domain_data = mysqli_fetch_assoc($results);
	if ($domain_data['Domain'] !== ''){
	?><div class="my_task">
		<a class="view_task ready active_goal" data-domain="<?=$domain_data['Domain']?>" href="#">View</a>
		<h2 class="float-left domain_info"><?=$domain_data['Domain'];?> - <?=$domain_data['Vertical']?> - <?=$domain_data['Country']?> - <?=$domain_data['Language']?></h2>		
	</div>
	<?php } $counter++; }
}
function my_proccess_support($mysqli, $query, $fullname, $fulldate){
	$results = mysqli_query($mysqli, $query);
	$rows = mysqli_num_rows($results);
	$counter = 1;
	for ($i = 0; $i < $rows; $i++){
	mysqli_data_seek($results, $i);
	$domain_data = mysqli_fetch_assoc($results);
	if ($domain_data['Domain'] !== ''){
	?><div class="my_task">
		<a class="view_task ready active_goal" data-domain="<?=$domain_data['Domain']?>" href="#">View</a>
		<h2 class="float-left domain_info"><?=$domain_data['Domain'];?> - <?=$domain_data['Vertical']?> - <?=$domain_data['Country']?> - <?=$domain_data['Language']?></h2>
	</div>
	<?php } $counter++; }
}

function my_proccess_developer($mysqli, $query, $fullname, $fulldate){
	$results = mysqli_query($mysqli, $query);
	$rows = mysqli_num_rows($results);
	$counter = 1;
	for ($i = 0; $i < $rows; $i++){
	mysqli_data_seek($results, $i);
	$domain_data = mysqli_fetch_assoc($results);
	if ($domain_data['Domain'] !== ''){
	?><div class="my_task">
		<a class="view_task ready active_goal" data-domain="<?=$domain_data['Domain']?>" href="#">View</a>
		<h2 class="float-left domain_info"><?=$domain_data['Domain'];?> - <?=$domain_data['Vertical']?> - <?=$domain_data['Country']?> - <?=$domain_data['Language']?></h2>
	</div>
	<?php } $counter++; }
}
function my_proccess_qa($mysqli, $query, $fullname, $fulldate){
	$results = mysqli_query($mysqli, $query);
	$rows = mysqli_num_rows($results);
	$counter = 1;
	for ($i = 0; $i < $rows; $i++){
	mysqli_data_seek($results, $i);
	$domain_data = mysqli_fetch_assoc($results);
	if ($domain_data['Domain'] !== ''){
	?><div class="my_task">
		<a class="view_task ready active_goal" data-domain="<?=$domain_data['Domain']?>" href="#">View</a>
		<h2 class="float-left domain_info"><?=$domain_data['Domain'];?> - <?=$domain_data['Vertical']?> - <?=$domain_data['Country']?> - <?=$domain_data['Language']?></h2>
	</div>
	<?php } $counter++; }
}

switch ($permissions) {
	case 'Content':
		echo '<div class="task_box"><h2 class="write_review">Assign To Writers</h2>';
		$query = "SELECT * FROM DomainDetails WHERE ContentAdmin='$fullname' AND ContentStart='0000-00-00'";
		my_proccess_content($mysqli, $query, $fullname, $fulldate);
		echo '</div>';
		echo '<div class="task_box"><h2 class="write_review">Writing Tasks</h2>';
		$query = "SELECT * FROM DomainDetails WHERE Writer='$fullname' AND ContentStart!='0000-00-00' AND ReviewStart='0000-00-00' AND ContentFinished='0000-00-00'";
		my_proccess_writer($mysqli, $query, $fullname, $fulldate, $permissions);
		echo '</div>';
		echo '<div class="task_box"><h2 class="write_review">Review Tasks</h2>';
		$query = "SELECT * FROM DomainDetails WHERE Reviewer='$fullname' AND ReviewStart!='0000-00-00' AND ContentFinished='0000-00-00' AND DesignStart='0000-00-00'";
		my_proccess_writer($mysqli, $query, $fullname, $fulldate, $permissions);
		echo '</div>';
		break;
	case 'Writer':
		echo '<div class="task_box"><h2 class="write_review">Writing Tasks</h2>';
		$query = "SELECT * FROM DomainDetails WHERE Writer='$fullname' AND ContentStart!='0000-00-00' AND ReviewStart='0000-00-00' AND ContentFinished='0000-00-00'";
		my_proccess_writer($mysqli, $query, $fullname, $fulldate, $permissions);
		echo '</div>';
		echo '<div class="task_box"><h2 class="write_review">Review Tasks</h2>';
		$query = "SELECT * FROM DomainDetails WHERE Reviewer='$fullname' AND ReviewStart!='0000-00-00' AND ContentFinished='0000-00-00' AND DesignStart='0000-00-00'";
		my_proccess_writer($mysqli, $query, $fullname, $fulldate, $permissions);
		echo '</div>';
		break;
	case 'Designer':
		echo '<div class="task_box"><h2 class="write_review">Design Tasks</h2>';
		$query = "SELECT * FROM DomainDetails WHERE Designer='$fullname' AND DesignFinish='0000-00-00'";
		my_proccess_designer($mysqli, $query, $fullname, $fulldate);
		echo '</div>';
		break;
	case 'Support':
		echo '<div class="task_box"><h2 class="write_review">Clone Tasks</h2>';
		$query = "SELECT * FROM DomainDetails WHERE Cloner='$fullname' AND CloneFinished='0000-00-00' AND DevStart='0000-00-00'";
		my_proccess_support($mysqli, $query, $fullname, $fulldate);
		echo '</div>';
		break;
	case 'Admin':
		echo '<div class="task_box"><h2 class="write_review">Developer Tasks</h2>';
		$query = "SELECT * FROM DomainDetails WHERE Developer='$fullname' AND DevFinish='0000-00-00'";
		my_proccess_developer($mysqli, $query, $fullname, $fulldate);
		echo '</div>';
		break;
	case 'QA':
		echo '<div class="task_box"><h2 class="write_review">QA Tasks</h2>';
		$query = "SELECT * FROM DomainDetails WHERE QAInspector='$fullname' AND DateComplete='0000-00-00'";
		my_proccess_qa($mysqli, $query, $fullname, $fulldate);
		echo '</div>';
		break;
}

?></div>
<div id="popout_wrap">
	<div id="popout_wrapper">
		<a class="close_popout" href="javascript:void(0)">X</a>
		<div id="popout_box"></div>
	</div>
</div>
<?php
} else {?>
<div id="notauthorized">
	<p>You are not authorized to access this page.</p>
	<a href="<?=root_url();?>users/login.php">Please Login</a>
</div><?php
}
include 'footer.php';
?>