<?php
include '../users/loginheader.php';

$domainName = $_GET['domain'];

$domain = mysqli_query($mysqli, "SELECT * FROM DomainDetails WHERE Domain='$domainName'");
$domain = mysqli_fetch_assoc($domain);
?>

<div class="editButton"><a id="domain_logistics" class="edit_link btn-edit" data-section="log" href="javascript:void(0)">Edit</a></div>
<div>
	<section class="vSection"><p><strong>ManageWP Account</strong></p>
	<p><?=$domain['ManageWPAccount']?></p></section>
	<section class="vSection"><p><strong>Database Name</strong></p>
	<p><?=$domain['DBName']?></p></section>
</div>
<div>
	<section class="vSection"><p><strong>Theme</strong></p>
	<p><?=$domain['Theme']?></p></section>
	<section class="vSection"><p><strong>Database User</strong></p>
	<p><?=$domain['DBUser']?></p></section>
</div>
<div>
	<section class="vSection"><p><strong>Wireframe</strong></p>
	<p><?=$domain['Wireframe']?></p></section>
	<section class="vSection"><p><strong>Database Password</strong></p>
	<p><?=$domain['DBPass']?></p></section>
</div>
<div>
	<section class="vSection"><p><strong>Author Nickname</strong></p>
	<p><?=$domain['AuthorNickname']?></p></section>
	<section class="vSection"><p><strong>Database Host</strong></p>
	<p><?=$domain['DBHost']?></p></section>
</div>