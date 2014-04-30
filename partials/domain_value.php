<?php
include '../users/loginheader.php';

$domainName = $_GET['domain'];

$domain = mysqli_query($mysqli, "SELECT * FROM DomainDetails WHERE Domain='$domainName'");
$domain = mysqli_fetch_assoc($domain);
?>

<div class="editButton"><a id="domain_value" class="edit_link btn-edit"  data-section="value" href="javascript:void(0)">Edit</a></div>
<div>
	<section class="vSection"><p><strong>Page Rank</strong></p>
	<p><?=$domain['PR']?></p></section>
	<section class="vSection"><p><strong>Domain Authority</strong></p>
	<p ><?=$domain['DA']?></p></section>
</div>
<div>
	<section class="vSection"><p><strong>Page Authority</strong></p>
	<p><?=$domain['PA']?></p></section>
	<section class="vSection"><p><strong>Back Links</strong></p>
	<p><?=$domain['BackLinks']?></p></section>
</div>
<div>
	<section class="vSection"><p><strong>Moz-Trust</strong></p>
	<p><?=$domain['MozTrust']?></p></section>
</div>