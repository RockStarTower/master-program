<?php

include '../functions.php';
include '../users/loginheader.php';
$DomainName = $_GET['DomainName'];
$con = mysqli_connect('localhost', 'root', 'root', 'ecoabsor_master');
$request = "SELECT * FROM DomainDetails WHERE Domain='$DomainName'";
if ($result = mysqli_query($con, $request) or die("Error: ".mysqli_error($con))) {
	while ( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
		// variable for HostDomain exists - $DomainName
		$Status = $row['Status'];
		$Vertical = $row['Vertical'];
		$HostAccount = $row['HostAccount'];
		$Version = $row['Version'];
		$Type = $row['Type'];
		$Converted = $row['Converted'];
		$RenewalDate = $row['RenewalDate'];
		$Country = $row['Country'];
		$DateBought = $row['DateBought'];
		$Location = $row['Location'];
		$DateComplete = $row['DateComplete'];
		$Language = $row['Language'];
	}
}
?>

<form id="edit_domain_basic_info" action="update_forms/domain_basic_details_action.php" method="post">
	<ul>
		<li>
			<p>Vertical: </p>
			<input class="select" type="text" name="Vertical" value="<?php echo $Vertical; ?>" autocomplete="off" />
			<ul id="Vertical" class="dropdown">
				<li><a href="javascript::void(0);">Automotive</a></li>
				<li><a href="javascript::void(0);">Beauty & Fashion</a></li>
				<li><a href="javascript::void(0);">Business</a></li>
				<li><a href="javascript::void(0);">Construction & Contractors</a></li>
				<li><a href="javascript::void(0);">Education & Development</a></li>
				<li><a href="javascript::void(0);">Entertainment</a></li>
				<li><a href="javascript::void(0);">Environmental</a></li>
				<li><a href="javascript::void(0);">Finance & Money</a></li>
				<li><a href="javascript::void(0);">Food & Cooking</a></li>
				<li><a href="javascript::void(0);">Government & Politics</a></li>
				<li><a href="javascript::void(0);">Health & Medical</a></li>
				<li><a href="javascript::void(0);">Home & Garden</a></li>
				<li><a href="javascript::void(0);">Industrial & Manufacturing</a></li>
				<li><a href="javascript::void(0);">Law</a></li>
				<li><a href="javascript::void(0);">Miscellaneous</a></li>
				<li><a href="javascript::void(0);">N/A</a></li>
				<li><a href="javascript::void(0);">Pets & Animals</a></li>
				<li><a href="javascript::void(0);">Real Estate</a></li>
				<li><a href="javascript::void(0);">Recreation & Sports</a></li>
				<li><a href="javascript::void(0);">Relationships & Family</a></li>
				<li><a href="javascript::void(0);">Religion & Spirituality</a></li>
				<li><a href="javascript::void(0);">Shopping</a></li>
				<li><a href="javascript::void(0);">Technology</a></li>
				<li><a href="javascript::void(0);">Travel</a></li>
				<li><a href="javascript::void(0);">Insurance</a></li>
				<li><a href="javascript::void(0);">Dentist</a></li>
			</ul>
		</li>
		<input name="Vertical_Before" type="hidden" value="<?php echo $Vertical; ?>" />
		<input name="Vertical_Field" type="hidden" value="Vertical" />
		<li>
			<p>Status: </p>
			<input id="Status" class="select" type="text" name="Status" value="<?php echo $Status; ?>" autocomplete="off" />
			<ul id="Status" class="dropdown">
				<li><a class="active" href="javascript::void(0);">Active</a></li>
				<li><a class="inactive" href="javascript::void(0);">Inactive</a></li>
				<li><a class="inprocess" href="javascript::void(0);">In Process</a></li>
				<li><a class="down" href="javascript::void(0);">Down</a></li>
				<li><a class="researched" href="javascript::void(0);">Researched</a></li>
				<li><a class="deindexed" href="javascript::void(0);">De-indexed</a></li>
				<li><a class="retired" href="javascript::void(0);">Retired</a></li>
			</ul>
		</li>
		<input name="Status_Before" type="hidden" value="<?php echo $Status; ?>" />
		<input name="Status_Field" type="hidden" value="Status" />
		<li>
			<p>Version: </p>
			<input class="select" type="text" name="Version" value="<?php echo $Version; ?>" autocomplete="off" />
			<ul id="Version" class="dropdown">
				<li><a href="javascript::void(0);">n/a</a></li>
				<li><a href="javascript::void(0);">1.0</a></li>
				<li><a href="javascript::void(0);">2.0</a></li>
				<li><a href="javascript::void(0);">3.0</a></li>
			</ul>
		</li>
		<input name="Version_Before" type="hidden" value="<?php echo $Version; ?>" />
		<input name="Version_Field" type="hidden" value="Version" />
		<li>
			<p>Type: </p>
			<input class="select" type="text" name="Type" value="<?php echo $Type; ?>" autocomplete="off" />
			<ul id="Type" class="dropdown">
				<li><a href="javascript::void(0);">Blog</a></li>
				<li><a href="javascript::void(0);">Article</a></li>
				<li><a href="javascript::void(0);">Geo-Based</a></li>
				<li><a href="javascript::void(0);">Duplicate</a></li>
				<li><a href="javascript::void(0);">Clone</a></li>
				<li><a href="javascript::void(0);">Boost Use</a></li>
				<li><a href="javascript::void(0);">Employee Sandbox</a></li>
				<li><a href="javascript::void(0);">Marketing</a></li>
				<li><a href="javascript::void(0);">Client Blog</a></li>
			</ul>
		</li>
		<input name="Type_Before" type="hidden" value="<?php echo $Type; ?>" />
		<input name="Type_Field" type="hidden" value="Type" />
		<li>
			<p>Converted: </p>
			<input class="select" type="text" name="Converted" value="<?php echo $Converted; ?>" autocomplete="off" />
			<ul id="Converted" class="dropdown">
				<li><a href="javascript::void(0);">n/a</a></li>
				<li><a href="javascript::void(0);">Yes</a></li>
				<li><a href="javascript::void(0);">No</a></li>
			</ul>
		</li>
		<input name="Converted_Before" type="hidden" value="<?php echo $Converted; ?>" />
		<input name="Converted_Field" type="hidden" value="Converted" />
		<li>
			<p>Host Account: </p>
			<input class="select HostAccount" type="text" name="HostAccount" value="<?php echo $HostAccount; ?>" autocomplete="off" />
			<?php echo HostAccountList(); ?>
		</li>
		<input name="HostAccount_Before" type="hidden" value="<?php echo $HostAccount; ?>" />
		<input name="HostAccount_Field" type="hidden" value="HostAccount" />
		<li>
			<p>Country: </p>
			<input class="select" type="text" name="Country" value="<?php echo $Country; ?>" autocomplete="off" />
			<ul id="Country" class="dropdown">
				<li><a href="javascript::void(0);">US/CA</a></li>
				<li><a href="javascript::void(0);">US</a></li>
				<li><a href="javascript::void(0);">CA</a></li>
				<li><a href="javascript::void(0);">AU</a></li>
			</ul>
		</li>
		<input name="Country_Before" type="hidden" value="<?php echo $Country; ?>" />
		<input name="Country_Field" type="hidden" value="Country" />
		<li>
			<p>Renewal Date: </p>
			<input class="Date" type="text" name="RenewalDate" value="<?php echo $RenewalDate; ?>" />
		</li>
		<input name="RenewalDate_Before" type="hidden" value="<?php echo $RenewalDate; ?>" />
		<input name="RenewalDate_Field" type="hidden" value="RenewalDate" />
		<li>
			<p>Location: </p>
			<input type="text" name="Location" value="<?php echo $Location; ?>" />
		</li>
		<input name="Location_Before" type="hidden" value="<?php echo $Location; ?>" />
		<input name="Location_Field" type="hidden" value="Location" />
		<li>
			<p>Date Bought: </p>
			<input class="Date" type="text" name="DateBought" value="<?php echo $DateBought; ?>" />
		</li>
		<input name="DateBought_Before" type="hidden" value="<?php echo $DateBought; ?>" />
		<input name="DateBought_Field" type="hidden" value="DateBought" />
		<li>
			<p>Language: </p>
			<input class="select" type="text" name="Language" value="<?php echo $Language; ?>" autocomplete="off" />
			<ul id="Language" class="dropdown">
				<li><a href="javascript::void(0);">English</a></li>
				<li><a href="javascript::void(0);">French</a></li>
				<li><a href="javascript::void(0);">Spanish</a></li>
			</ul>
		</li>
		<input name="Language_Before" type="hidden" value="<?php echo $Language; ?>" />
		<input name="Language_Field" type="hidden" value="Language" />
		<li>
			<p>Date Complete: </p>
			<input class="Date" type="text" name="DateComplete" value="<?php echo $DateComplete; ?>" />
		</li>
		<input name="DateComplete_Before" type="hidden" value="<?php echo $DateComplete; ?>" />
		<input name="DateComplete_Field" type="hidden" value="DateComplete" />
		<input name="TimeStamp" type="hidden" value="<?php echo date("Y-m-d h:m:s"); ?> " />
		<input name="User" type="hidden" value="<?php echo $user; ?>" />
		<input name="DomainName" type="hidden" value="<?=$DomainName?>" />
		<input type="submit" class="popout_button" value="Submit">
	</ul>
</form>