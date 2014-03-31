<?php
include("../users/loginheader.php");
include("../header.php");
?><link rel="stylesheet" href="wf_style.css" type="text/css" /><?php
if(login_check($mysqli) == true) {
	?><div id="page-wrap"><div class="page-wrap">
	<form id="live-search" action="" class="styled" method="post">
    	<label for="filter">Start Typing Domain Name</label>
        <input type="text" class="text-input" id="filter" value="" />
        <span id="filter-count"></span>
	</form>
	<div class="commentlist">
	<?php
$results = mysqli_query($mysqli, "SELECT * FROM DomainDetails WHERE Status='In Process'");
$rows = mysqli_num_rows($results);
for ($i = 0; $i <= $rows; $i++){
	mysqli_data_seek($results, $i);
	$domain_data = mysqli_fetch_assoc($results);
	?><div class="design_content">
		<p class="float-left"><?=$domain_data['Domain'];?></p>
		<p class="float-right"><a href="Wireframe.php?wireframe=<?=$domain_data['Wireframe'];?>&domain=<?=$domain_data['Domain'];?>"><?if (!empty($domain_data['site_content'])){if ($permissions == "Designer" || $permissions == "Admin"){echo 'Add Design';}else{echo 'Edit Content';}}else{echo 'Add Content';}?></a></p>
	</div>
<?php } ?></div></div></div><?php
} else {?>
	<div id="notauthorized">
   <p>You are not authorized to access this page.</p>
   <a href="<?=root_url();?>users/login.php">Please Login</a></div><?php
}
include 'http://66.147.244.85/~ecoabsor/Master_Project/footer.php';
?>