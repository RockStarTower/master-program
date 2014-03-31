<?php
include("users/loginheader.php");
include("header.php");
$mon = date('m');
$year = date('Y');
$day = date('d');
$fulldate = $year.'-'.$mon.'-'.$day;
if(login_check($mysqli) == true) {
$data_fields_text = array(
	'Domain',
	'Vertical',
	'Type',
	'Country',
	'Language',
	'Location',
	'BoughtBy',
	'Registrar',
	'ResearchedBy',
	'DomainNotes'
	);
$data_fields_number = array(
	'Version',
	'PR',
	'DA',
	'PA',
	'MozTrust',
	'RenewalCost',
	'BackLinks',
	'WhoisCost',
	'InitialCost',
	'TotalCost',
	);
$data_fields_date = array(
	'RenewDate',
	'DateBought',
	'WhoIsRenwal',
	);
?>
<div id="domain_csv_wrapper">
<?php if (!isset($_GET['domains'])){?>

<div id="bulk_domains">
<form method="post" action="domain_csv_replace.php?domains=entered" id="display_domains">
	<p class="add_domains">Paste Domains Here from csv</p>
	<textarea name="csv_domains" id="csv_domains"></textarea>
	<input type="submit" value="Submit">
</form>
</div>
<?php
}

if (isset($_GET['domains']) && $_GET['domains'] == 'entered'){
$domains = $_POST['csv_domains'];
$domains = preg_split("/\s+/",  $domains);
$domains = array_filter($domains);
?>
<form id="domain_csv_form" action="" method="post">

<a href="javascript:void(0)" id="add_fields">Add Another Field</a>

<div id="empty_fields" style="display:none;">
<div class="fields">
<h2 id="domain_name">Domain Data</h2>
<?php foreach ($data_fields_text as $key => $val){
	if ($val == 'Domain'){?>
	<input type="text" data-field="<?=$val?>" required class="domain" data-click='' name="<?=$val?>" placeholder="<?=$val?>"><a href="javascript:void(0);" class="apply_all" data-target="<?=$val?>">+</a>
<?php } else { ?>
	<input type="text" data-field="<?=$val?>" required name="<?=$val?>" placeholder="<?=$val?>"><a href="javascript:void(0);" class="apply_all" data-target="<?=$val?>">+</a>
<?php } } ?>
	<input type="hidden" name="status" value="In Process">
<?php foreach ($data_fields_number as $key => $val){?>
	<input type="number" data-field="<?=$val?>" required name="<?=$val?>" placeholder="<?=$val?>"><a href="javascript:void(0);" class="apply_all" data-target="<?=$val?>">+</a>
<?php } ?>
<?php foreach ($data_fields_date as $key => $val){?>
	<p>
		<label for="<?=$val?>"><?=$val?></label>
		<input id="<?=$val?>" data-field="<?=$val?>" type="date" required name="<?=$val?>" value="<?=$fulldate?>"><a href="javascript:void(0);" class="apply_all" data-target="<?=$val?>">+</a>
	</p>
<?php } ?>
<a href="javascript:void(0)" class="delete_fields">Delete</a>
</div>
</div>


<?php $counter = 1; 
foreach ($domains as $keyit => $valit){
?>
<div class="fields last">
<h2 id="domain_name<?=$counter?>">Domain Data</h2>
<?php foreach ($data_fields_text as $key => $val){
	if ($val == 'Domain'){?>
		<input type="text" data-field="<?=$val?>" required class="domain" data-click='<?=$counter?>' value="<?=$valit?>" name="<?=$val?><?=$counter?>" placeholder="<?=$val?>"><a href="javascript:void(0);" class="apply_all" data-target="<?=$val?>">+</a>
	<?php } else { ?>
		<input type="text" data-field="<?=$val?>" required name="<?=$val?><?=$counter?>" placeholder="<?=$val?>"><a href="javascript:void(0);" class="apply_all" data-target="<?=$val?>">+</a>
<?php } } ?>
	<input type="hidden" name="status<?=$counter?>" value="In Process">
<?php foreach ($data_fields_number as $key => $val){?>
	<input type="number" data-field="<?=$val?>" required name="<?=$val?><?=$counter?>" placeholder="<?=$val?>"><a href="javascript:void(0);" class="apply_all" data-target="<?=$val?>">+</a>
<?php } ?>
<?php foreach ($data_fields_date as $key => $val){?>
	<p>
		<label for="<?=$val?>"><?=$val?></label>
		<input id="<?=$val?>" data-field="<?=$val?>" type="date" required name="<?=$val?><?=$counter?>"  value="<?=$fulldate?>"><a href="javascript:void(0);" class="apply_all" data-target="<?=$val?>">+</a>
	</p>
<?php } ?>
<a href="javascript:void(0)" class="delete_fields">Delete</a>
</div>
<?php $counter++; } ?>
</form>

<?php }?>

</div>
<?php } else {?>
	<div id="notauthorized">
   	<p>You are not authorized to access this page.</p>
   	<a href="<?=root_url();?>users/login.php">Please Login</a></div><?php
}
include 'footer.php';
?>