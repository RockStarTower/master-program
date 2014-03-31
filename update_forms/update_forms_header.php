<!DOCTYPE html>
<html>
<head>
<?php
include '../functions.php';
?>
<link rel="stylesheet" type="text/css" href="../style.css">
<link rel="stylesheet" href="../jquery-ui-1.10.3.custom/css/smoothness/jquery-ui-1.10.3.custom.css" />
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript" src="../js.js"></script>
<script type="text/javascript">
<?php 
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
<body <?php
//New Design Change
$filename = basename($_SERVER['PHP_SELF']);
if ($filename == 'searchindex.php') {
	echo 'class="home_background"';
}
?>>
<div id="page-wrap">
<div id="header-wrapper">
	<img id="logo_small" src="../images/Darth-Serverus-Logo_small.png" />
	<div id="header">
	<div id="login_header">
		<p>Logged in as:</p><strong><?php echo $user; ?></strong></p><a href="../users/logout.php">Log Out?</a></div>
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
			<li><a href="../searchindex.php">Search</a></li>
			<li><a href="../new_host.php">New Host</a></li>
			<li><a href="../domain_csv_form.php">Add Domains</a></li>
			<!-- New Design Change -->
			<li><a href="../live_numbers.php">Live Numbers</a></li>
			<!-- End New Design Change -->
			<?php if ($permissions == "Admin"){?>
			<li><a href="../admin.php?action=users">Admin Area</a>
				<ul class="sub-menu">
					<li><a href="../admin.php?action=users">User Management</a></li>
					<li><a href="../admin.php?action=export">Export Database</a></li>
				</ul></li>
			<?php }
			?>
		</ul>
	</div>
</div>
