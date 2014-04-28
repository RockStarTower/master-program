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
	<form id="filterForm" action="" class="styled" method="post">
        <input type="text" class="inProcessFilter" id="filter" placeholder="Start Typing" value="" />
		<div id="filters" class="inProcessFilters"></div>
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
		if (strtotime($domain_data['ContentFinished']) == false && strtotime($domain_data['ContentStart']) == true && $domain_data['Writer'] != '' && strtotime($domain_data['ReviewStart']) == false && $domain_data['Reviewer'] == ''){
			$review_inprocess = true;
		} else {$review_inprocess = false;}
		if (strtotime($domain_data['ContentFinished']) == true && strtotime($domain_data['DesignStart']) == false && $domain_data['Designer'] == ''){
			$design_inprocess = true;
		} else {$design_inprocess = false;}
		if (strtotime($domain_data['DesignFinish']) == true && strtotime($domain_data['CloneFinished']) == false && $domain_data['Cloner'] == ''){
			$support_inprocess = true;
		} else {$support_inprocess = false;}
		if (strtotime($domain_data['CloneFinished']) == true && strtotime($domain_data['DevStart']) == false && $domain_data['Developer'] == ''){
			$dev_inprocess = true;
		} else {$dev_inprocess = false;}
		if (strtotime($domain_data['DevFinish']) == true && $domain_data['QAInspector'] == '' && strtotime($domain_data['DateComplete']) == false ){
			$qa_inprocess = true;
		} else {$qa_inprocess = false;}

		if(isset($domain_data['Type']) && !empty($domain_data['Type'])){
			$blog = 'data-blog="'.$blog.'"';
		} else {
			$blog = '';
		}

		if ($permissions == 'Content' && $content_inprocess == true){ ?>
			<div class="inProcessTask">
				<p class="float-left domain_info"><a target="_blank" href="http://<?=$domain_data['Domain'];?>"><?=$domain_data['Domain'];?></a> - <?=$domain_data['Country'];?>-<?=$domain_data['Language'];?> - <?=$domain_data['Vertical'];?></p>
				<a href="javascript:void(0);" class="claim_button ready active_goal" <?=$blog?> data-username="<?=$fullname?>" data-date="<?=$fulldate?>" data-domain="<?=$domain_data['Domain']?>" data-user_permissions="<?=$permissions?>"> Claim Task </a>
			</div>
		<?php }
		if ($permissions == 'Writer' && $review_inprocess == true){ ?>
			<div class="inProcessTask">
				<p class="float-left domain_info"><a target="_blank" href="http://<?=$domain_data['Domain'];?>"><?=$domain_data['Domain'];?></a> - <?=$domain_data['Country'];?>-<?=$domain_data['Language'];?> - <?=$domain_data['Vertical'];?></p>
				<a href="javascript:void(0);" class="claim_button ready active_goal" <?=$blog?> data-username="<?=$fullname?>" data-date="<?=$fulldate?>" data-domain="<?=$domain_data['Domain']?>" data-user_permissions="<?=$permissions?>"> Claim Task </a>
			</div>
		<?php }
		if ($permissions == 'Designer' && $design_inprocess == true){ ?>
			<div class="inProcessTask">
				<p class="float-left domain_info"><a target="_blank" href="http://<?=$domain_data['Domain'];?>"><?=$domain_data['Domain'];?></a> - <?=$domain_data['Country'];?>-<?=$domain_data['Language'];?> - <?=$domain_data['Vertical'];?></p>
				<a href="javascript:void(0);" class="claim_button ready active_goal" <?=$blog?> data-username="<?=$fullname?>" data-date="<?=$fulldate?>" data-domain="<?=$domain_data['Domain']?>" data-user_permissions="<?=$permissions?>"> Claim Task </a>
			</div>
		<?php }
		if ($permissions == 'Support' && $support_inprocess == true){ ?>
			<div class="inProcessTask">
				<p class="float-left domain_info"><a target="_blank" href="http://<?=$domain_data['Domain'];?>"><?=$domain_data['Domain'];?></a> - <?=$domain_data['Country'];?>-<?=$domain_data['Language'];?> - <?=$domain_data['Vertical'];?></p>
				<a href="javascript:void(0);" class="claim_button ready active_goal" <?=$blog?> data-username="<?=$fullname?>" data-date="<?=$fulldate?>" data-domain="<?=$domain_data['Domain']?>" data-user_permissions="<?=$permissions?>"> Claim Task </a>
			</div>
		<?php }
		if ($permissions == 'Admin' && $dev_inprocess == true){ ?>
			<div class="inProcessTask">
				<p class="float-left domain_info"><a target="_blank" href="http://<?=$domain_data['Domain'];?>"><?=$domain_data['Domain'];?></a> - <?=$domain_data['Country'];?>-<?=$domain_data['Language'];?> - <?=$domain_data['Vertical'];?></p>
				<a href="javascript:void(0);" class="claim_button ready active_goal" <?=$blog?> data-username="<?=$fullname?>" data-date="<?=$fulldate?>" data-domain="<?=$domain_data['Domain']?>" data-user_permissions="<?=$permissions?>"> Claim Task </a>
			</div>
		<?php }
		if ($permissions == 'QA' && $qa_inprocess == true){ ?>
			<div class="inProcessTask">
				<p class="float-left domain_info"><a target="_blank" href="http://<?=$domain_data['Domain'];?>"><?=$domain_data['Domain'];?></a> - <?=$domain_data['Country'];?>-<?=$domain_data['Language'];?> - <?=$domain_data['Vertical'];?></p>
				<a href="javascript:void(0);" class="claim_button ready active_goal" <?=$blog?> data-username="<?=$fullname?>" data-date="<?=$fulldate?>" data-domain="<?=$domain_data['Domain']?>" data-user_permissions="<?=$permissions?>"> Claim Task </a>
			</div>
		<?php }
 	} ?></div></div><?php

} else {?>
	<div id="notauthorized">
   <p>You are not authorized to access this page.</p>
   <a href="<?=root_url();?>users/login.php">Please Login</a></div><?php
}
include 'footer.php';
?>