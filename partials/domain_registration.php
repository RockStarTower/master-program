<?php
include '../users/loginheader.php';

$domainName = $_GET['domain'];

$domain = mysqli_query($mysqli, "SELECT * FROM DomainDetails WHERE Domain='$domainName'");
$domain = mysqli_fetch_assoc($domain);
?>

<div class="editButton"><a id="domain_registration" class="edit_link btn-edit" data-section="reg" href="javascript:void(0)">Edit</a></div>
<div>
	<section class="vSection"><p><strong>Registrar</strong></p>
	<p><?=$domain['Registrar']?></p></section>
	<section class="vSection"><p><strong>Renewal Date</strong></p>
	<p><?=$domain['RenewalDate']?></p></section>
</div>
<div>
	<section class="vSection"><p><strong>Renewal Cost</strong></p>
	<p>&#36;<?=$domain['RenewalCost']?></p></section>
	<section class="vSection"><p><strong>Whois Renewal</strong></p>
	<p><?=$domain['WhoIsRenewal']?></p></section>
</div>
<div>
	<section class="vSection"><p><strong>Whois Cost</strong></p>
	<p>&#36;<?=$domain['WhoisCost']?></p></section>
	<section class="vSection"><p><strong>Initial Cost</strong></p>
	<p>&#36;<?=$domain['InitialCost']?></p></section>
</div>
<div>								
	<section class="vSection"><p><strong>Total Cost</strong></p>
	<p>&#36;<?=$domain['TotalCost']?></p></section>
	<section class="vSection"><p></p>
	<p></p></section>
</div>