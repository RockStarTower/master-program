<?php
include("users/loginheader.php");
include("header.php");

if(isset($_GET['permissions'])){
	$permissions = $_GET['permissions'];
}
$mon = date('m');
$year = date('Y');
$day = date('d');
$fulldate = $year.'-'.$mon.'-'.$day;
if(login_check($mysqli) == true) {

	?><div class="page-wrap">
	<form id="live-search" action="" class="styled" method="post">
        <input type="text" class="text-input" id="filter" placeholder="Start Typing Domain Name" value="" />
        <span id="filter-count"></span>
	</form>
	<div class="commentlist">
	<?php
	$results = mysqli_query($mysqli, "SELECT * FROM DomainDetails WHERE Status='In Process'");
	$rows = mysqli_num_rows($results);
	for ($i = 0; $i < $rows; $i++){
	mysqli_data_seek($results, $i);
	$domain_data = mysqli_fetch_assoc($results);
	if (strtotime($domain_data['DateBought']) == true && strtotime($domain_data['ContentStart']) == false && $domain_data['Writer'] == ''){
		$content_inprocess = true;
	} else {$content_inprocess = false;}
	if (strtotime($domain_data['ContentFinished']) == false && strtotime($domain_data['ContentStart']) == true && $domain_data['Writer'] != '' && strtotime($domain_data['ReviewStart']) == false){
		$review_inprocess = true;
	} else {$review_inprocess = false;}
	if (strtotime($domain_data['DateBought']) == true && strtotime($domain_data['ContentStart']) == false && $domain_data['Writer'] == ''){
		$writer_inprocess = true;
	} else {$writer_inprocess = false;}
	if (strtotime($domain_data['ContentFinished']) == true && strtotime($domain_data['DesignStart']) == false && $domain_data['Designer'] == ''){
		$design_inprocess = true;
	} else {$design_inprocess = false;}
	if (strtotime($domain_data['DesignFinish']) == true && strtotime($domain_data['CloneFinished']) == false && $domain_data['Cloner'] == ''){
		$support_inprocess = true;
	} else {$support_inprocess = false;}
	if (strtotime($domain_data['CloneFinished']) == true && strtotime($domain_data['DevStart']) == false && $domain_data['Developer'] == ''){
		$dev_inprocess = true;
	} else {$dev_inprocess = false;}
	if (strtotime($domain_data['DevFinish']) == true && $domain_data['QAInspector'] == ''){
		$qa_inprocess = true;
	} else {$qa_inprocess = false;}
	if ($permissions == 'Content' && $content_inprocess == true){ ?>
	<form class="design_content" action="claim_process.php" method="post">
		<p class="float-left domain_info"><?=$domain_data['Domain'];?> - <?=$domain_data['Country'];?>-<?=$domain_data['Language'];?> - <?=$domain_data['Vertical'];?></p>
		<input type="hidden" value="<?=$fullname;?>" name="username">
		<input type="hidden" value="<?=$fulldate;?>" name="date_submitted">
		<input type="hidden" name="domain" value="<?=$domain_data['Domain'];?>">
		<input type="hidden" name="user_permissions" value="Content">
		<button class="float-right">Claim Domain</button>
	</form>
	<?php }
	if ($permissions == 'Writer' && $writer_inprocess == true){ ?>
	<form class="design_content" action="claim_process.php" method="post">
		<p class="float-left domain_info"><?=$domain_data['Domain'];?> - <?=$domain_data['Country'];?>-<?=$domain_data['Language'];?> - <?=$domain_data['Vertical'];?></p>
		<input type="hidden" value="<?=$fullname;?>" name="username">
		<input type="hidden" value="<?=$fulldate;?>" name="date_submitted">
		<input type="hidden" name="domain" value="<?=$domain_data['Domain'];?>">
		<input type="hidden" name="user_permissions" value="Writer">
		<button class="float-right">Claim Domain</button>
	</form>
	<?php }
	if ($permissions == 'Writer' && $review_inprocess == true){ ?>
	<form class="design_content" action="claim_process.php" method="post">
		<p class="float-left domain_info"><?=$domain_data['Domain'];?> - <?=$domain_data['Country'];?>-<?=$domain_data['Language'];?> - <?=$domain_data['Vertical'];?></p>
		<input type="hidden" value="<?=$fullname;?>" name="username">
		<input type="hidden" value="<?=$fulldate;?>" name="date_submitted">
		<input type="hidden" name="domain" value="<?=$domain_data['Domain'];?>">
		<input type="hidden" name="user_permissions" value="Reviewer">
		<button class="float-right">Claim Domain</button>
	</form>
	<?php }
	if ($permissions == 'Designer' && $design_inprocess == true){ ?>
	<form class="design_content" action="claim_process.php" method="post">
		<p class="float-left domain_info"><?=$domain_data['Domain'];?> - <?=$domain_data['Country'];?>-<?=$domain_data['Language'];?> - <?=$domain_data['Vertical'];?></p>
		<input type="hidden" value="<?=$fullname;?>" name="username">
		<input type="hidden" value="<?=$fulldate;?>" name="date_submitted">
		<input type="hidden" name="domain" value="<?=$domain_data['Domain'];?>">
		<input type="hidden" name="user_permissions" value="Designer">
		<button class="float-right">Claim Domain</button>
	</form>
	<?php }
	if ($permissions == 'Support' && $support_inprocess == true){ ?>
	<form class="design_content" action="claim_process.php" method="post">
		<p class="float-left domain_info"><?=$domain_data['Domain'];?> - <?=$domain_data['Country'];?>-<?=$domain_data['Language'];?> - <?=$domain_data['Vertical'];?></p>
		<input type="hidden" value="<?=$fullname;?>" name="username">
		<input type="hidden" value="<?=$fulldate;?>" name="date_submitted">
		<input type="hidden" name="domain" value="<?=$domain_data['Domain'];?>">
		<input type="hidden" name="user_permissions" value="Support">
		<button class="float-right">Claim Domain</button>
	</form>
	<?php }
	if ($permissions == 'Admin' && $dev_inprocess == true){ ?>
	<form class="design_content" action="claim_process.php" method="post">
		<p class="float-left domain_info"><?=$domain_data['Domain'];?> - <?=$domain_data['Country'];?>-<?=$domain_data['Language'];?> - <?=$domain_data['Vertical'];?></p>
		<input type="hidden" value="<?=$fullname;?>" name="username">
		<input type="hidden" value="<?=$fulldate;?>" name="date_submitted">
		<input type="hidden" name="domain" value="<?=$domain_data['Domain'];?>">
		<input type="hidden" name="user_permissions" value="Admin">
		<button class="float-right">Claim Domain</button>
	</form>
	<?php }
	if ($permissions == 'QA' && $qa_inprocess == true){ ?>
	<form class="design_content" action="claim_process.php" method="post">
		<p class="float-left domain_info"><?=$domain_data['Domain'];?> - <?=$domain_data['Country'];?>-<?=$domain_data['Language'];?> - <?=$domain_data['Vertical'];?></p>
		<input type="hidden" value="<?=$fullname;?>" name="username">
		<input type="hidden" value="<?=$fulldate;?>" name="date_submitted">
		<input type="hidden" name="domain" value="<?=$domain_data['Domain'];?>">
		<input type="hidden" name="user_permissions" value="QA">
		<button class="float-right">Claim Domain</button>
	</form>
	<?php } ?>
<?php } ?></div></div><?php

} else {?>
	<div id="notauthorized">
   <p>You are not authorized to access this page.</p>
   <a href="<?=root_url();?>users/login.php">Please Login</a></div><?php
}
include 'footer.php';
?>