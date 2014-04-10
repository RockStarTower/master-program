<!DOCTYPE html>
<html>
<head>
<?php
include 'config.php';
include 'functions.php';
?>
<link rel="icon" type="image/ico" href="<?=root_url();?>xampp.ico">
<link rel="stylesheet" type="text/css" href="<?=root_url();?>style.css">
<link rel="stylesheet" type="text/css" href="responsive.css">
<link rel="stylesheet" href="jquery-ui-1.10.3.custom/css/smoothness/jquery-ui-1.10.3.custom.css" />
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript" src="<?=root_url();?>Chart.js"></script>
<script type="text/javascript" src="<?=root_url();?>js.js"></script>
<script type="text/javascript" src="<?=root_url();?>space.js"></script>
<script type="text/javascript">
<?php 
$my_tasks = inMyQueue($mysqli, $fullname, $permissions);
echo autocompleteHostAccountList();
echo autocompleteVerticalList();
echo autocompleteTypeList();
echo autocompleteCountryList();
echo autocompleteStatusList();
echo autocompleteLanguageList();
echo autocompleteManageWPList();
echo autocompleteRegistrarList();
?>
</script>
</head>
<body>
<canvas id="spacejs"></canvas>
<div id="page-wrap">
<div id="header-wrapper">
	<img id="logo_small" src="<?=root_url();?>images/Darth-Serverus-Logo_small.png" />
	<div id="header">
	<div id="login_header" >
		<div>
			<img class="storm" src="<?=root_url();?>images/storm-trooper.png">
			<a class="user_log" href="#"><?php echo $user; echo ' ('.$my_tasks.')'; ?></a>
			<ul class="sub-menu" style="display: none;">
				<li><a href="<?=root_url();?>my_tasks.php">My Tasks</a></li>
				<li><a href="<?=root_url();?>users/logout.php">Log Out?</a></li>
			</ul>
		</div>
	</div>
		<!-- New Design Change
		<div id="logo">
			<h1>The Master</h1>
		</div>
		-->
		<div style="clear: both;"></div>
		<!-- New Design Change 
		<a class="live" href="live_numbers.php">Live Numbers</a>
		-->
		<ul id="navigation">
			<li><a href="<?=root_url();?>searchindex.php">Search</a></li>
			<li><a href="<?=root_url();?>new_host.php">New Host</a></li>
			<li><a href="<?=root_url();?>domain_csv_form.php">Add Domains</a></li>
			<!-- New Design Change -->
			<li><a href="<?=root_url();?>live_numbers.php">Live Numbers</a></li>
			<li><a href="<?=root_url();?>goals.php">Goals</a></li>
			
			<!--<li><a href="goals.php">Goals</a></li>-->
			<!-- End New Design Change -->
			<?php
			$admin_area = ($is_admin ? 'Admin Area' : 'Export Database'); ?>
			<li><a href="#"><?=$admin_area?></a>
				<ul class="sub-menu">
				<?php if ($is_admin){?>
					<li><a href="<?=root_url();?>admin.php?action=users">User Management</a></li>
					<li><a href="<?=root_url();?>firstlaunchform.php">Upload Goals</a></li>
				<?php } ?>
					<li><a href="<?=root_url();?>admin.php?action=export">Export Database</a></li>
				</ul>
			</li>
		</ul>
		<?php include 'mini-search.php';?>
	</div>
</div>