<?php
include 'users/loginheader.php';
include 'header.php';
sec_session_start();
if(login_check($mysqli) == true) {
?>
<?php
	$mon = date('m');
	$year = date('Y');
	$day = date('d');
	$fulldate = $year.'-'.$mon.'-'.$day;
$DomainName = $_GET['DomainName'];
$HostAccount = $_GET['HostAccount'];
$domain_request = "SELECT * FROM DomainDetails WHERE Domain='$DomainName'";
$domain = mysqli_query($mysqli, $domain_request) or die("Error: ".mysqli_error($con));
$domain = mysqli_fetch_assoc($domain);

$host_request = "SELECT * FROM HostDetails WHERE HostAccount='$HostAccount'";
$host = mysqli_query($mysqli, $host_request) or die("Error: ".mysqli_error($con));
$host = mysqli_fetch_assoc($host);

$class = '';
$statusArr = array(
	'Active' => 'active',
	'Inactive' => 'inactive',
	'In Process' => 'inprocess',
	'Down' => 'down',
	'Researched' => 'researched',
);
foreach ($statusArr as $key => $val) {
	if ($domain['Status'] == $key) {
		$class = $val;
	}
}
?>
<group  class="domainAccordion">
<div id="topOverview">
<span id="domainName" class="currentSelection" data-button="domain"><?=$domain['Domain']?></span><span id="hostName" class="btn-overview" data-button="hostAccount"><?=$domain['HostAccount']?></span>
	<a id="domain_basic" class="edit_link btn-edit" data-section="basic" href="javascript:void(0)">Edit</a>
	<a id="host_basic" class="edit_link" name="<?=$HostAccount?>" data-domain="<?=$DomainName?>" href="javascript:void(0)">Edit</a>
	<section id="domainArea">
		<div>
			<section class="tSection"><p><strong>Domain</strong></p>
			<p><?=$domain['Domain']?></p></section>
			<section class="tSection"><p><strong>Status</strong></p>
			<p class="<?=$class?>"><?=$domain['Status']?></p></section>
		</div>
		<div>
			<section class="tSection"><p><strong>Vertical</strong></p>
			<p><?=$domain['Vertical']?></p></section>
			<section class="tSection"><p><strong>Host Account</strong></p>
			<p><?=$domain['HostAccount']?></p></section>
		</div>
		<div>
			<section class="tSection"><p><strong>Version</strong></p>
			<p><?=$domain['Version']?></p></section>
			<section class="tSection"><p><strong>Type</strong></p>
			<p><?=$domain['Type']?></p></section>
		</div>
		<div>
			<section class="tSection"><p><strong>Renewal Date</strong></p>
			<p><?=$domain['RenewalDate']?></p></section>
			<section class="tSection"><p><strong>Country</strong></p>
			<p><?=$domain['Country']?></p></section>
		</div>
		<div>								
			<section class="tSection"><p><strong>Date Bought</strong></p>
			<p><?=$domain['DateBought']?></p></section>
			<section class="tSection"><p><strong>Location</strong></p>
			<p><?=$domain['Location']?></p></section>
		</div>
		<div>
			<section class="tSection"><p><strong>Date Complete</strong></p>
			<p><?=$domain['DateComplete']?></p></section>
			<section class="tSection"><p><strong>Language</strong></p>
			<p><?=$domain['Language']?></p></section>
		</div>
	</section>
	<section id="hostArea">
		<div>
			<section class="tSection"><p><strong>Host Account</strong></p>
			<p><?=$host['HostAccount']?></p></section>
			<section class="tSection"><p><strong>Date Bought</strong></p>
			<p><?=$host['DateBought']?></p></section>
		</div>
		<div>
			<section class="tSection"><p><strong>Country</strong></p>
			<p><?=$host['Country']?></p></section>
			<section class="tSection"><p><strong>Renew Date</strong></p>
			<p><?=$host['RenewDate']?></p></section>
		</div>
		<div>
			<section class="tSection"><p><strong>Server Locations</strong></p>
			<p><?=$host['ServerLocations']?></p></section>
			<section class="tSection"><p><strong>Total Cost</strong></p>
			<p><?=$host['TotalCost']?></p></section>
		</div>
		<div>
			<section class="tSection"><p><strong>Nameservers</strong></p>
			<p><?=$host['NameServers']?></p></section>
			<section class="tSection"><p><strong>Email on Account</strong></p>
			<p><?=$host['Email']?></p></section>
		</div>
		<div>		
			<section class="tSection"><p><strong>IP Address</strong></p>
			<p><?=$host['IPAddress']?></p></section>
			<p></p>
			<p></p>
		</div>
	</section>
		<div><p><h2 class="domainNotes">Domain Notes <a id="addNote" class="addAccordionNote" href="javascript:void(0);" data-name="<?=$fullname?>" data-date="<?=$fulldate?>" data-domain="<?=$DomainName?>">Add Note</a><p id="noteSuccess"></p></h2><h2 class="hostNotes">Host Notes <a id="addHostNote" class="addAccordionNote" href="javascript:void(0);" data-name="<?=$fullname?>" data-date="<?=$fulldate?>" data-host="<?=$HostAccount?>">Add Note</a><p id="hostNoteSuccess"></p></h2><div id="newDomainNotes" class="notesArea"><?=stripslashes($domain['DomainNotes'])?></div><div id="newHostNotes" class="notesArea floatRight"><?=stripslashes($host['HostNotes'])?></div></p></div>
</div>

<div id="bottomOverview">
<div id="leftNav">
	<section id="domainNav">
		<a href="javascript:void(0);" class="jsNavs navItem" data-click="build">Build History</a>
		<a href="javascript:void(0);" class="jsNavs btn-menu" data-click="val">Value Metrics</a>
		<a href="javascript:void(0);" class="jsNavs btn-menu" data-click="log">Logistics Info</a>
		<a href="javascript:void(0);" class="jsNavs btn-menu" data-click="reg">Registration Details</a>
	</section>
	<section id="hostNav">
		<a href="javascript:void(0);" class="jsNavs navItem" data-click="login">Login Information</a>
		<a href="javascript:void(0);" class="jsNavs btn-menu" data-click="billing">Billing Information</a>
	</section>
</div>

	<div id="viewBox">
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
	</div>
</div>
</group>
<div class="clearBoth"></div>
<div id="edit_wrap">
	<div id="edit_wrapper">
		<a class="close" href="javascript:void(0)">X</a>
		<div id="edit"></div>
	</div>
</div>
<?php
} else {
header('Location: users/login.php');
}
include 'footer.php';
?>