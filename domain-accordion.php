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
$con = mysqli_connect('localhost', 'root', 'root', 'ecoabsor_master');
$domain_request = "SELECT * FROM DomainDetails WHERE Domain='$DomainName'";
if ($domain_result = mysqli_query($con, $domain_request) or die("Error: ".mysqli_error($con))) {
	while ( $domain_row = mysqli_fetch_array($domain_result, MYSQLI_ASSOC) ) {
		$Status = $domain_row['Status'];
		$Vertical = $domain_row['Vertical'];
		$Version = $domain_row['Version'];
		$Type = $domain_row['Type'];
		$Converted = $domain_row['Converted'];
		$Registrar = $domain_row['Registrar'];
		$RenewalDate = $domain_row['RenewalDate'];
		$RenewalCost = $domain_row['RenewalCost'];
		$WhoIsRenewal = $domain_row['WhoIsRenewal'];
		$WhoisCost = $domain_row['WhoisCost'];
		$InitialCost = $domain_row['InitialCost'];
		$Domain_TotalCost = $domain_row['TotalCost'];
		$Country = $domain_row['Country'];
		$DateBought = $domain_row['DateBought'];
		$Location = $domain_row['Location'];
		$DateLaunched = $domain_row['DateComplete'];
		$Language = $domain_row['Language'];
		$PR = $domain_row['PR'];
		$DA = $domain_row['DA'];
		$PA = $domain_row['PA'];
		$BackLinks = $domain_row['BackLinks'];
		$MozTrust = $domain_row['MozTrust'];
		$ManageWPAccount = $domain_row['ManageWPAccount'];
		$DatabaseName = $domain_row['DBName'];
		$DatabaseUser = $domain_row['DBUser'];
		$DatabasePassword = $domain_row['DBPass'];
		$DatabaseHost = $domain_row['DBHost'];
		$Theme = $domain_row['Theme'];
		$Wireframe = $domain_row['Wireframe'];
		$AuthorNickname = $domain_row['AuthorNickname'];
		$ResearchedBy = $domain_row['ResearchedBy'];
		$BoughtBy = $domain_row['BoughtBy'];
		$DateBought = $domain_row['DateBought'];
		$ContentAdmin = $domain_row['ContentAdmin'];
		$Writer = $domain_row['Writer'];
		$Reviewer = $domain_row['Reviewer'];
		$ContentStart = $domain_row['ContentStart'];
		$ReviewStart = $domain_row['ReviewStart'];
		$ContentFinish = $domain_row['ContentFinished'];
		$ContentHours = $domain_row['ContentHours'];
		$Designer = $domain_row['Designer'];
		$DesignStart = $domain_row['DesignStart'];
		$DesignFinish = $domain_row['DesignFinish'];
		$Cloner = $domain_row['Cloner'];
		$CloneFinished = $domain_row['CloneFinished'];
		$Developer = $domain_row['Developer'];
		$DevStart = $domain_row['DevStart'];
		$DevFinish = $domain_row['DevFinish'];
		$QAInspector = $domain_row['QAInspector'];
		$DateComplete = $domain_row['DateComplete'];
		$DomainNotes = stripslashes($domain_row['DomainNotes']);
	}
}
$host_request = "SELECT * FROM HostDetails WHERE HostAccount='$HostAccount'";
if ($host_result = mysqli_query($con, $host_request) or die("Error: ".mysqli_error($con))) {
	while ( $row = mysqli_fetch_array($host_result, MYSQLI_ASSOC) ) {
		$Host_DateBought = $row['DateBought'];
		$Host_Country = $row['Country'];
		$RenewDate = $row['RenewDate'];
		$ServerLocations = $row['ServerLocations'];
		$Host_TotalCost = $row['TotalCost'];
		$NameServers = $row['NameServers'];
		$Email = $row['Email'];
		$IPAddress = $row['IPAddress'];
		$CpanelURL = $row['cPanelURL'];
		$CpanelUsername = $row['cPanelUser'];
		$CpanelPassword = $row['cPanelPass'];
		$BillingURL = $row['BillingURL'];
		$BillingUsername = $row['BillingUser'];
		$BillingPassword = $row['BillingPass'];
		$FTPHost = $row['FTPHost'];
		$FTPUsername = $row['FTPUser'];
		$FTPPassword = $row['FTPPass'];
		$SecurityPIN = $row['PIN'];
		$SecurityAnswer = $row['SecurityAnswer'];
		$CCOnAccount = $row['CCOnAccount'];
		$YearlyHostingCost = $row['YearlyCost'];
		$YearlyDedicatedIPCost = $row['DedicatedIPCost'];
		$HostNotes = stripslashes($row['HostNotes']);
	}
}
$class = '';
$statusArr = array(
	'Active' => 'active',
	'Inactive' => 'inactive',
	'In Process' => 'inprocess',
	'Down' => 'down',
	'Researched' => 'researched',
);
foreach ($statusArr as $key => $val) {
	if ($Status == $key) {
		$class = $val;
	}
}
?>
<div class="page-wrap">
	<div id="tabs">
		<ul>
			<li><a href="#tabs-1">Domain Details</a></li>
			<li><a href="#tabs-2">Host Details</a></li>
		</ul>
		<div id="tabs-1">
			<div id="accordion">
				<h3>Basic Details</h3>
				<div>
				<a id="domain_basic" class="edit_link" name="<?=$DomainName?>" href="javascript:void(0)">Edit</a>
				<?php if ($Converted == 'Yes') { ?><img class="converted" src="images/Converted.png" /> <?php } ?>
					<table>
						<tbody>
							<tr>
								<td><strong>Domain:</strong></td>
								<td><?=$DomainName?></td>
								<td><strong>Status:</strong></td>
								<td class="Status <?=$class?>"><?=$Status?></td>
							</tr>
							<tr>
								<td><strong>Vertical:</strong></td>
								<td><?=$Vertical?></td>
								<td><strong>Host Account:</strong></td>
								<td><?=$HostAccount?></td>
							</tr>
							<tr>
								<td><strong>Version:</strong></td>
								<td><?=$Version?></td>
								<td><strong>Type:</strong></td>
								<td><?=$Type?></td>
							</tr>
							<tr>
								<td><strong>Renewal Date:</strong></td>
								<td><?=$RenewalDate?></td>
								<td><strong>Country:</strong></td>
								<td><?=$Country?></td>
							</tr>
							<tr>								
								<td><strong>Date Bought:</strong></td>
								<td><?=$DateBought?></td>
								<td><strong>Location:</strong></td>
								<td><?=$Location?></td>
							</tr>
							<tr>
								<td><strong>Date Complete:</strong></td>
								<td><?=$DateComplete?></td>
								<td><strong>Language:</strong></td>
								<td><?=$Language?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<h3>Value Metrics</h3>
				<div>
				<a id="domain_value" class="edit_link" name="<?=$DomainName?>" href="javascript:void(0)">Edit</a>
					<table>
						<tbody>
							<tr>
								<td><strong>Page Rank:</strong></td>
								<td><?=$PR?></td>
							</tr>
							<tr>
								<td><strong>Domain Authority:</strong></td>
								<td><?=$DA?></td>
							</tr>
							<tr>
								<td><strong>Page Authority:</strong></td>
								<td><?=$PA?></td>
							</tr>
							<tr>
								<td><strong>Back Links:</strong></td>
								<td><?=$BackLinks?></td>
							</tr>
							<tr>
								<td><strong>Moz-Trust:</strong></td>
								<td><?=$MozTrust?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<h3>Logistics Info</h3>
				<div>
				<a id="domain_logistics" class="edit_link" name="<?=$DomainName?>" href="javascript:void(0)">Edit</a>
					<table>
						<tbody>
							<tr>
								<td><strong>ManageWP Account:</strong></td>
								<td><?=$ManageWPAccount?></td>
								<td><strong>Database Name:</strong></td>
								<td><?=$DatabaseName?></td>
							</tr>
							<tr>
								<td><strong>Theme:</strong></td>
								<td><?=$Theme?></td>
								<td><strong>Database User:</strong></td>
								<td><?=$DatabaseUser?></td>
							</tr>
							<tr>
								<td><strong>Wireframe:</strong></td>
								<td><?=$Wireframe?></td>
								<td><strong>Database Password:</strong></td>
								<td><?=$DatabasePassword?></td>
							</tr>
							<tr>
								<td><strong>Author Nickname:</strong></td>
								<td><?=$AuthorNickname?></td>
								<td><strong>Database Host:</strong></td>
								<td><?=$DatabaseHost?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<h3>Registration Details</h3>
				<div>
				<a id="domain_registration" class="edit_link" name="<?=$DomainName?>" href="javascript:void(0)">Edit</a>
					<table>
						<tbody>
							<tr>
								<td><strong>Registrar:</strong></td>
								<td><?=$Registrar?></td>
							</tr>
							<tr>
								<td><strong>Renewal Date:</strong></td>
								<td><?=$RenewalDate?></td>
							</tr>
							<tr>
								<td><strong>Renewal Cost:</strong></td>
								<td>&#36;<?=$RenewalCost?></td>
							</tr>
							<tr>
								<td><strong>Whois Renewal:</strong></td>
								<td><?=$WhoIsRenewal?></td>
							</tr>
							<tr>
								<td><strong>Whois Cost:</strong></td>
								<td>&#36;<?=$WhoisCost?></td>
							</tr>
							<tr>
								<td><strong>Initial Cost:</strong></td>
								<td>&#36;<?=$InitialCost?></td>
							</tr>
							<tr>
								<td><strong>Total Cost:</strong></td>
								<td>&#36;<?=$Domain_TotalCost?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<h3>Build History</h3>
				<div>
				<a id="domain_history" class="edit_link" name="<?=$DomainName?>" href="javascript:void(0)">Edit</a>
					<table>
						<tbody>
							<tr>
								<td><strong>Researched By:</strong></td>
								<td><?=$ResearchedBy?></td>
								<td><strong>Date Bought</strong></td>
								<td><?=$DateBought?></td>
							</tr>
							<tr>
								<td><strong>Bought By:</strong></td>
								<td><?=$BoughtBy?></td>
							</tr>
							<tr>
								<td><strong>Content Admin:</strong></td>
								<td><?=$ContentAdmin?></td>
								<td><strong>Content Start:</td>
								<td><?=$ContentStart?></td>
							</tr>
							<tr>
								<td><strong>Reviewer:</strong></td>
								<td><?=$Reviewer?></td>
								<td><strong>Review Start:</strong></td>
								<td><?=$ReviewStart?></td>
							</tr>
							<tr>
								<td><strong>Writer:</strong></td>
								<td><?=$Writer?></td>
								<td><strong>Content Finish:</strong></td>
								<td><?=$ContentFinish?></td>
							</tr>
							<tr>
								<td><strong>Content Hours:</strong></td>
								<td><?=$ContentHours?></td>
							</tr>
							<tr>
								<td><strong>Designer:</strong></td>
								<td><?=$Designer?></td>
								<td><strong>Design Start:</strong></td>
								<td><?=$DesignStart?></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><strong>Design Finish:</strong></td>
								<td><?=$DesignFinish?></td>
							</tr>
							<tr>
								<td><strong>Cloner:</strong></td>
								<td><?=$Cloner?></td>
								<td><strong>Clone Finish:</strong></td>
								<td><?=$CloneFinished?></td>
							</tr>
							<tr>
								<td><strong>Developer:</strong></td>
								<td><?=$Developer?></td>
								<td><strong>Dev Start:</strong></td>
								<td><?=$DevStart?></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><strong>Dev Finish:</strong></td>
								<td><?=$DevFinish?></td>
							</tr>
							<tr>
								<td><strong>QA Inspector:</strong></td>
								<td><?=$QAInspector?></td>
								<td><strong>Date Complete:</strong></td>
								<td><?=$DateComplete?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div id="DomainNotes_Form">
				<?php if ($DomainNotes != '') { echo '<img class="vadernotes vadernoteshost" src="images/vadernotes.png" />'; } ?>
				<a id="Domain_Notes_img" class="notes_img" href="javascript:void(0);"><img src="images/Domain-Notes.png" /></a>
				<div id="DomainNotesAccordion">
					<p>Domain Notes</p>
					<hr />
					<div id="accordionNotes"><?=$DomainNotes?></div>
					<a id="addNote" class="addAccordionNote" href="javascript:void(0);" data-name="<?=$fullname?>" data-date="<?=$fulldate?>" data-domain="<?=$DomainName?>">Add Note</a>
					<p id="noteSuccess"></p>
				</div>
			</div>
		</div>
		<div id="tabs-2">
			<div id="accordion-1">
				<h3>Basic Details</h3>
				<div>
				<a id="host_basic" class="edit_link" name="<?=$HostAccount?>" data-domain="<?=$DomainName?>" href="javascript:void(0)">Edit</a>
					<table>
						<tbody>
							<tr>
								<td><strong>Host Account:</strong></td>
								<td><?=$HostAccount?></td>
								<td><strong>Date Bought:</strong></td>
								<td><?=$Host_DateBought?></td>
							</tr>
							<tr>
								<td><strong>Country:</strong></td>
								<td><?=$Host_Country?></td>
								<td><strong>Renew Date:</strong></td>
								<td><?=$RenewDate?></td>
							</tr>
							<tr>
								<td><strong>Server Locations:</strong></td>
								<td><?=$ServerLocations?></td>
								<td><strong>Total Cost:</strong></td>
								<td><?=$Host_TotalCost?></td>
							</tr>
							<tr>
								<td><strong>Nameservers:</strong></td>
								<td><?=$NameServers?></td>
								<td><strong>Email on Account:</strong></td>
								<td><?=$Email?></td>
							</tr>
							<tr>
								<td><strong>IP Address:</strong></td>
								<td><?=$IPAddress?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<h3>Login Information</h3>
				<div>
				<a id="host_login" class="edit_link" name="<?=$HostAccount?>" data-domain="<?=$DomainName?>" href="javascript:void(0)">Edit</a>
					<table>
						<thead>
							<tr>
								<th colspan="2">Cpanel</th>
								<th colspan="2">Billing</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><strong>CPanel URL:</strong></td>
								<td><?=$CpanelURL?></td>
								<td><strong>Billing URL:</strong></td>
								<td><?=$BillingURL?></td>
							</tr>
							<tr>
								<td><strong>CPanel Username:</strong></td>
								<td><?=$CpanelUsername?></td>
								<td><strong>Billing Username:</strong></td>
								<td><?=$BillingUsername?></td>
							</tr>
							<tr>
								<td><strong>CPanel Password:</strong></td>
								<td><?=$CpanelPassword?></td>
								<td><strong>Billing Password:</strong></td>
								<td><?=$BillingPassword?></td>
							</tr>
						</tbody>
					</table>
					<table>
						<thead>
							<tr>
								<th colspan="2">FTP</th>
								<th colspan="2">Security</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><strong>FTP Host:</strong></td>
								<td><?=$FTPHost?></td>
							</tr>
							<tr>
								<td><strong>FTP Username:</strong></td>
								<td><?=$FTPUsername?></td>
								<td><strong>Security PIN:</strong></td>
								<td><?=$SecurityPIN?></td>
							</tr>
							<tr>
								<td><strong>FTP Password:</strong></td>
								<td><?=$FTPPassword?></td>
								<td><strong>Security Question Answer:</strong></td>
								<td><?=$SecurityAnswer?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<h3>Billing Information</h3>
				<div>
					<a id="host_billing" class="edit_link" name="<?=$HostAccount?>" data-domain="<?=$DomainName?>" href="javascript:void(0)">Edit</a>
					<table>
						<tbody>
							<tr>
								<td><strong>Credit Card on Account:</strong></td>
								<td><?=$CCOnAccount?></td>
							</tr>
							<tr>
								<td><strong>Renewal Date:</strong></td>
								<td><?=$RenewDate?></td>
							</tr>
							<tr>
								<td><strong>Yearly Hosting Cost:</strong></td>
								<td>&#36;<?=$YearlyHostingCost?></td>
							</tr>
							<tr>
								<td><strong>Yearly Dedicated IP Cost:</strong></td>
								<td>&#36;<?=$YearlyDedicatedIPCost?></td>
							</tr>
							<tr>
								<td><strong>Total Cost:</strong></td>
								<td>&#36;<?=$Host_TotalCost?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<form id="HostNotes_Form" action="" method="post">
			<?php if ($HostNotes != '') { echo '<img class="vadernotes vadernoteshost" src="images/vadernotes.png" />'; } ?>
				<a id="Host_Notes_img" class="notes_img" href="javascript:void(0);"><img src="images/Host-Notes.png" /></a>
				<span class="hostupdated"></span>
				<textarea id="HostNotes" name="HostNotes" rows="25" cols="30"><?=$HostNotes?></textarea>
				<input id="HostNotes_Before" name="HostNotes_Before" type="hidden" value="<?=$HostNotes?>" />
				<input id="Host_Time" name="TimeStamp" type="hidden" value="<?php echo date("h:m:s"); ?> " />
				<input id="Host_User" name="User" type="hidden" value="<?php echo $user; ?>" />
				<input id="Host_Account" name="HostAccount" type="hidden" value="<?=$HostAccount?>" />
			</form>
		</div>
	</div>
</div>
<div id="edit_wrap">
	<div id="edit_wrapper">
		<a class="close" href="javascript:void(0)">X</a>
		<div id="edit"></div>
	</div>
</div>
<?php
} else {?>
	<div id="notauthorized">
   <p>You are not authorized to access this page.</p>
   <a href="users/login.php">Please Login</a></div><?php
}
include 'footer.php';
?>