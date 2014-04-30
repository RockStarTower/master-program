<?php
include '../users/loginheader.php';

$hostAccount = $_GET['hostAccount'];

$host = mysqli_query($mysqli, "SELECT * FROM HostDetails WHERE HostAccount='$hostAccount'");
$host = mysqli_fetch_assoc($host);
?>

<div class="editButton"><a id="host_login" class="edit_link btn-edit" data-section="login" href="javascript:void(0)">Edit</a></div>
<div class="hostHeaders"><h2 class="cbheader">cPanel</h2><h2 class="cbheader">Billing</h2></div>
<div>
	<section class="vSection"><p><strong>cPanel URL</strong></p>
	<p><?=$host['cPanelURL']?></p></section>
	<section class="vSection"><p><strong>Billing URL</strong></p>
	<p ><?=$host['BillingURL']?></p></section>
</div>
<div>
	<section class="vSection"><p><strong>cPanel Username</strong></p>
	<p><?=$host['cPanelUser']?></p></section>
	<section class="vSection"><p><strong>Billing Username</strong></p>
	<p><?=$host['BillingUser']?></p></section>
</div>
<div>
	<section class="vSection"><p><strong>cPanel Password</strong></p>
	<p><?=$host['cPanelPass']?></p></section>
	<section class="vSection"><p><strong>Billing Password</strong></p>
	<p><?=$host['BillingPass']?></p></section>
</div>
<div class="hostHeaders"><h2 class="cbheader">FTP</h2><h2 class="cbheader">Security</h2></div>
<div>
	<section class="vSection"><p><strong>FTP Host</strong></p>
	<p><?=$host['FTPHost']?></p></section>
	<section class="vSection"><p></p>
	<p></p></section>
</div>
<div>
	<section class="vSection"><p><strong>FTP Username</strong></p>
	<p><?=$host['FTPUser']?></p></section>
	<section class="vSection"><p><strong>Security PIN</strong></p>
	<p><?=$host['PIN']?></p></section>
</div>
<div>
	<section class="vSection"><p><strong>FTP Password</strong></p>
	<p><?=$host['FTPPass']?></p></section>
	<section class="vSection"><p><strong>Security Question Answer</strong></p>
	<p><?=$host['SecurityAnswer']?></p></section>
</div>