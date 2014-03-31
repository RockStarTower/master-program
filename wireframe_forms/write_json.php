<?php
include('../users/loginheader.php');
include('../header.php');
?>
<link rel="stylesheet" href="wf_style.css" type="text/css" />
<div id="wrapper_json"><?php
	echo '<div class="write_json"><p>Thank You For Submitting!</p>';
	include('create_content.php');

	$domain_content = array();
	foreach ($_POST as $key => $val){
		$temp_array = array($key => $val);
		
		$domain_content = array_merge($domain_content, $temp_array);
	}
	$json = json_encode($domain_content);
	$domain = $_POST['domain'];
	$query = "UPDATE DomainDetails SET SiteContent='$json' WHERE Domain='$domain'";
	mysqli_query($mysqli, $query);

	echo '<a class="download_content site_content_button" href="download.php?domain='.$_POST['domain'].'">Download Content</a></div>';
?></div><?php
include ('../footer.php');
?>