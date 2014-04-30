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
$HostAccount = $_GET['HostAccount'];

$host_request = "SELECT * FROM HostDetails WHERE HostAccount='$HostAccount'";
$host = mysqli_query($mysqli, $host_request) or die("Error: ".mysqli_error($con));
$host = mysqli_fetch_assoc($host);
?>
<group class="hostAccordion">
<div id="topOverview">
<span id="hostName" class="currentSelection"><?=$host['HostAccount']?></span>
	<a id="host_basic" class="edit_link btn-edit" data-section="hbasic" href="javascript:void(0)">Edit</a>
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
		<div><p><h2 class="hostNotes">Host Notes <a id="addHostNote" class="addAccordionNote" href="javascript:void(0);" data-name="<?=$fullname?>" data-date="<?=$fulldate?>" data-host="<?=$HostAccount?>">Add Note</a><p id="hostNoteSuccess"></p></h2><div id="newHostNotes" class="notesArea floatRight"><?=stripslashes($host['HostNotes'])?></div></p></div>
</div>

<div id="bottomOverview">
<div id="leftNav">
	<a href="javascript:void(0);" class="jsNavs navItem" data-click="login">Login Information</a>
	<a href="javascript:void(0);" class="jsNavs btn-menu" data-click="billing">Billing Information</a>
</div>

	<div id="viewBox">
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
			<p></p>
			<p></p>
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