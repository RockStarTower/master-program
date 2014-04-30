<?php
include '../users/loginheader.php';

$hostAccount = $_GET['hostAccount'];

$host = mysqli_query($mysqli, "SELECT * FROM HostDetails WHERE HostAccount='$hostAccount'");
$host = mysqli_fetch_assoc($host);
?>

<div class="editButton"><a id="host_billing" class="edit_link btn-edit" data-section="billing" href="javascript:void(0)">Edit</a></div>
<div>
	<section class="vSection"><p><strong>Credit Card on Account</strong></p>
	<p><?=$host['CCOnAccount']?></p></section>
	<section class="vSection"><p><strong>Renewal Date</strong></p>
	<p ><?=$host['RenewDate']?></p></section>
</div>
<div>
	<section class="vSection"><p><strong>Yearly Hosting Cost</strong></p>
	<p><?=$host['YearlyCost']?></p></section>
	<section class="vSection"><p><strong>Yearly Dedicated IP Cost</strong></p>
	<p><?=$host['DedicatedIPCost']?></p></section>
</div>
<div>
	<section class="vSection"><p><strong>Total Cost</strong></p>
	<p><?=$host['TotalCost']?></p></section>
	<p></p>
	<p></p>
</div>
