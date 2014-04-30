<?php
include '../users/loginheader.php';

$domainName = $_GET['domain'];

$domain = mysqli_query($mysqli, "SELECT * FROM DomainDetails WHERE Domain='$domainName'");
$domain = mysqli_fetch_assoc($domain);
?>

<div class="editButton"><a id="domain_history" class="edit_link btn-edit" data-section="history" href="javascript:void(0)">Edit</a></div>
<div>
	<section class="vSection"><p><strong>Researched By</strong></p>
	<p><?=$domain['ResearchedBy']?></p></section>
	<section class="vSection"><p><strong>Date Bought</strong></p>
	<p ><?=$domain['DateBought']?></p></section>
</div>
<div>
	<section class="vSection"><p><strong>Bought By</strong></p>
	<p><?=$domain['BoughtBy']?></p></section>
	<p></p>
	<p></p>
</div>
<div>
	<section class="vSection"><p><strong>Content Admin</strong></p>
	<p><?=$domain['ContentAdmin']?></p></section>
	<section class="vSection"><p><strong>Content Start</strong></p>
	<p><?=$domain['ContentStart']?></p></section>
</div>
<div>
	<section class="vSection"><p><strong>Reviewer</strong></p>
	<p><?=$domain['Reviewer']?></p></section>
	<section class="vSection"><p><strong>Review Start</strong></p>
	<p><?=$domain['ReviewStart']?></p></section>
</div>
<div>								
	<section class="vSection"><p><strong>Writer</strong></p>
	<p><?=$domain['Writer']?></p></section>
	<section class="vSection"><p><strong>Content Finished</strong></p>
	<p><?=$domain['ContentFinished']?></p></section>
</div>
<div>
	<section class="vSection"><p><strong>Content Hours</strong></p>
	<p><?=$domain['ContentHours']?></p></section>
	<p></p>
	<p></p>
</div>
<div>
	<section class="vSection"><p><strong>Designer</strong></p>
	<p><?=$domain['Designer']?></p></section>
	<section class="vSection"><p><strong>Design Start</strong></p>
	<p><?=$domain['DesignStart']?></p></section>
</div>
<div>
	<p></p>
	<p></p>
	<section class="vSection"><p><strong>Design Finished</strong></p>
	<p><?=$domain['DesignFinish']?></p></section>
</div>
<div>
	<section class="vSection"><p><strong>Cloner</strong></p>
	<p><?=$domain['Cloner']?></p></section>
	<section class="vSection"><p><strong>Clone Finished</strong></p>
	<p><?=$domain['CloneFinished']?></p></section>
</div>
<div>
	<section class="vSection"><p><strong>Developer</strong></p>
	<p><?=$domain['Developer']?></p></section>
	<section class="vSection"><p><strong>Dev Start</strong></p>
	<p><?=$domain['DevStart']?></p></section>
</div>
<div>
	<p></p>
	<p></p>		
	<section class="vSection"><p><strong>Dev Finish</strong></p>
	<p><?=$domain['DevFinish']?></p></section>
</div>
<div>
	<section class="vSection"><p><strong>QA Inspector</strong></p>
	<p><?=$domain['QAInspector']?></p></section>
	<section class="vSection"><p><strong>Date Complete</strong></p>
	<p><?=$domain['DateComplete']?></p></section>
</div>