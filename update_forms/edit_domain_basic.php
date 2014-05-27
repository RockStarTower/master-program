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
				<li><a href="javascript::void(0);">Accident & Personal Injury Attorneys</a></li>
				<li><a href="javascript::void(0);">Accountants</a></li>
				<li><a href="javascript::void(0);">Agricultural</a></li>
				<li><a href="javascript::void(0);">Agricultural Equipment & Supplies</a></li>
				<li><a href="javascript::void(0);">Appeal Attorneys</a></li>
				<li><a href="javascript::void(0);">Appliance Sales</a></li>
				<li><a href="javascript::void(0);">Appliance Services</a></li>
				<li><a href="javascript::void(0);">Art Galleries & Dealers</a></li>
				<li><a href="javascript::void(0);">Arts & Entertainment</a></li>
				<li><a href="javascript::void(0);">Audio Visual</a></li>
				<li><a href="javascript::void(0);">Auto Accessories</a></li>
				<li><a href="javascript::void(0);">Auto Body & Paint</a></li>
				<li><a href="javascript::void(0);">Auto Dealers</a></li>
				<li><a href="javascript::void(0);">Auto Insurance</a></li>
				<li><a href="javascript::void(0);">Auto Parts</a></li>
				<li><a href="javascript::void(0);">Auto Service</a></li>
				<li><a href="javascript::void(0);">Automotive</a></li>
				<li><a href="javascript::void(0);">Bakeries</a></li>
				<li><a href="javascript::void(0);">Bankruptcy Attorneys</a></li>
				<li><a href="javascript::void(0);">Beauty & Fashion</a></li>
				<li><a href="javascript::void(0);">Beauty Schools</a></li>
				<li><a href="javascript::void(0);">Business</a></li>
				<li><a href="javascript::void(0);">Business Attorneys</a></li>
				<li><a href="javascript::void(0);">Camping</a></li>
				<li><a href="javascript::void(0);">Car Wash & Auto Detailing</a></li>
				<li><a href="javascript::void(0);">Child Care</a></li>
				<li><a href="javascript::void(0);">Child Education</a></li>
				<li><a href="javascript::void(0);">Chiropractors</a></li>
				<li><a href="javascript::void(0);">Cleaning Services</a></li>
				<li><a href="javascript::void(0);">Clothing & Accessories</a></li>
				<li><a href="javascript::void(0);">Colleges & Universities</a></li>
				<li><a href="javascript::void(0);">Commercial Insurance</a></li>
				<li><a href="javascript::void(0);">Computer Services</a></li>
				<li><a href="javascript::void(0);">Concrete Contractors</a></li>
				<li><a href="javascript::void(0);">Construction & Contractors</a></li>
				<li><a href="javascript::void(0);">Consulting</a></li>
				<li><a href="javascript::void(0);">Cosmetics & Hygiene</a></li>
				<li><a href="javascript::void(0);">Counseling</a></li>
				<li><a href="javascript::void(0);">Crafts & Hobbies</a></li>
				<li><a href="javascript::void(0);">Criminal Attorneys</a></li>
				<li><a href="javascript::void(0);">Damage Contractors</a></li>
				<li><a href="javascript::void(0);">Dentist</a></li>
				<li><a href="javascript::void(0);">Doors</a></li>
				<li><a href="javascript::void(0);">Education & Development</a></li>
				<li><a href="javascript::void(0);">Educational Books & Supplies</a></li>
				<li><a href="javascript::void(0);">Electricians</a></li>
				<li><a href="javascript::void(0);">Electronics</a></li>
				<li><a href="javascript::void(0);">Emergency Care</a></li>
				<li><a href="javascript::void(0);">Energy</a></li>
				<li><a href="javascript::void(0);">Energy & Environment</a></li>
				<li><a href="javascript::void(0);">Entertainers</a></li>
				<li><a href="javascript::void(0);">Events</a></li>
				<li><a href="javascript::void(0);">Exercise</a></li>
				<li><a href="javascript::void(0);">Extreme Sports</a></li>
				<li><a href="javascript::void(0);">Family & Divorce Attorneys</a></li>
				<li><a href="javascript::void(0);">Fence Contractors</a></li>
				<li><a href="javascript::void(0);">Financial Planning</a></li>
				<li><a href="javascript::void(0);">Finance & Money</a></li>
				<li><a href="javascript::void(0);">Florists</a></li>
				<li><a href="javascript::void(0);">Food & Cooking</a></li>
				<li><a href="javascript::void(0);">Food Services</a></li>
				<li><a href="javascript::void(0);">Food Suppliers</a></li>
				<li><a href="javascript::void(0);">Funeral Homes</a></li>
				<li><a href="javascript::void(0);">Furniture</a></li>
				<li><a href="javascript::void(0);">Garage Doors</a></li>
				<li><a href="javascript::void(0);">Garden Equipment & Supplies</a></li>
				<li><a href="javascript::void(0);">General Attorneys</a></li>
				<li><a href="javascript::void(0);">General Contractors</a></li>
				<li><a href="javascript::void(0);">Glass</a></li>
				<li><a href="javascript::void(0);">Government & Politics</a></li>
				<li><a href="javascript::void(0);">Hair & Skin Care</a></li>
				<li><a href="javascript::void(0);">Health & Medical </a></li>
				<li><a href="javascript::void(0);">Health Care Clinics</a></li>
				<li><a href="javascript::void(0);">Heavy Construction Equipment</a></li>
				<li><a href="javascript::void(0);">Home & Garden</a></li>
				<li><a href="javascript::void(0);">Home Insurance</a></li>
				<li><a href="javascript::void(0);">Home Health Care</a></li>
				<li><a href="javascript::void(0);">Hotels & Lodging</a></li>
				<li><a href="javascript::void(0);">HVAC Contractors</a></li>
				<li><a href="javascript::void(0);">Industrial & Manufacturing</a></li>
				<li><a href="javascript::void(0);">Industrial Equipment & Supplies</a></li>
				<li><a href="javascript::void(0);">Insurance</a></li>
				<li><a href="javascript::void(0);">Interior Design</a></li>
				<li><a href="javascript::void(0);">Internet Service Providers</a></li>
				<li><a href="javascript::void(0);">Immigration Attorneys</a></li>
				<li><a href="javascript::void(0);">Jewelry</a></li>
				<li><a href="javascript::void(0);">K-12 Education</a></li>
				<li><a href="javascript::void(0);">Landscape</a></li>
				<li><a href="javascript::void(0);">Law</a></li>
				<li><a href="javascript::void(0);">Life Insurance</a></li>
				<li><a href="javascript::void(0);">Loans & Financing</a></li>
				<li><a href="javascript::void(0);">Locks, Keys, & Safes</a></li>
				<li><a href="javascript::void(0);">Marketing</a></li>
				<li><a href="javascript::void(0);">Medical Equipment & Supplies</a></li>
				<li><a href="javascript::void(0);">Medical Insurance</a></li>
				<li><a href="javascript::void(0);">Message</a></li>
				<li><a href="javascript::void(0);">Miscellaneous</a></li>
				<li><a href="javascript::void(0);">Mobile Windshield Repair</a></li>
				<li><a href="javascript::void(0);">Motor Sports & Accessories</a></li>
				<li><a href="javascript::void(0);">Money Services</a></li>
				<li><a href="javascript::void(0);">Movies & Theaters</a></li>
				<li><a href="javascript::void(0);">Moving & Storage</a></li>
				<li><a href="javascript::void(0);">Music</a></li>
				<li><a href="javascript::void(0);">N/A</a></li>
				<li><a href="javascript::void(0);">Natural Health Care</a></li>
				<li><a href="javascript::void(0);">Nightlife</a></li>
				<li><a href="javascript::void(0);">Novels & Stories</a></li>
				<li><a href="javascript::void(0);">Nursing Homes & Assisted Living</a></li>
				<li><a href="javascript::void(0);">Online Marketing</a></li>
				<li><a href="javascript::void(0);">Opticians & Optical Goods</a></li>
				<li><a href="javascript::void(0);">Optometrists</a></li>
				<li><a href="javascript::void(0);">Painters & Wallpaper Hangers</a></li>
				<li><a href="javascript::void(0);">Party Planners</a></li>
				<li><a href="javascript::void(0);">Paving Contractors</a></li>
				<li><a href="javascript::void(0);">Pest Control</a></li>
				<li><a href="javascript::void(0);">Pet Day Care & Boarding</a></li>
				<li><a href="javascript::void(0);">Pet Stores & Supplies</a></li>
				<li><a href="javascript::void(0);">Pet Training</a></li>
				<li><a href="javascript::void(0);">Pets</a></li>
				<li><a href="javascript::void(0);">Phone Service</a></li>
				<li><a href="javascript::void(0);">Photography</a></li>
				<li><a href="javascript::void(0);">Plumbers</a></li>
				<li><a href="javascript::void(0);">Podiatrists</a></li>
				<li><a href="javascript::void(0);">Pool Contractors</a></li>
				<li><a href="javascript::void(0);">Primary Care</a></li>
				<li><a href="javascript::void(0);">Printing Services</a></li>
				<li><a href="javascript::void(0);">Private Lessons</a></li>
				<li><a href="javascript::void(0);">Processing & Manufacturing</a></li>
				<li><a href="javascript::void(0);">Real Estate</a></li>
				<li><a href="javascript::void(0);">Real Estate Agents & Brokers</a></li>
				<li><a href="javascript::void(0);">Real Estate Attorneys</a></li>
				<li><a href="javascript::void(0);">Recreation & Sports</a></li>
				<li><a href="javascript::void(0);">Recycling</a></li>
				<li><a href="javascript::void(0);">Relationships & Family</a></li>
				<li><a href="javascript::void(0);">Religion & Spirituality</a></li>
				<li><a href="javascript::void(0);">Religious Goods</a></li>
				<li><a href="javascript::void(0);">Religious Organization</a></li>
				<li><a href="javascript::void(0);">Religious School</a></li>
				<li><a href="javascript::void(0);">Remodeling Contractors</a></li>
				<li><a href="javascript::void(0);">Repair & Restoration</a></li>
				<li><a href="javascript::void(0);">Restaurants</a></li>
				<li><a href="javascript::void(0);">Roofers</a></li>
				<li><a href="javascript::void(0);">Sanitation</a></li>
				<li><a href="javascript::void(0);">Security</a></li>
				<li><a href="javascript::void(0);">Security Systems</a></li>
				<li><a href="javascript::void(0);">Shopping</a></li>
				<li><a href="javascript::void(0);">Signs</a></li>
				<li><a href="javascript::void(0);">Spas & Salons</a></li>
				<li><a href="javascript::void(0);">Specialty Foods</a></li>
				<li><a href="javascript::void(0);">Sports & Sporting Goods</a></li>
				<li><a href="javascript::void(0);">Tax Services</a></li>
				<li><a href="javascript::void(0);">Technology</a></li>
				<li><a href="javascript::void(0);">Telephones</a></li>
				<li><a href="javascript::void(0);">Timeshares</a></li>
				<li><a href="javascript::void(0);">Tires & Wheels</a></li>
				<li><a href="javascript::void(0);">Towing Services</a></li>
				<li><a href="javascript::void(0);">Trade Schools</a></li>
				<li><a href="javascript::void(0);">Transportation</a></li>
				<li><a href="javascript::void(0);">Travel & Tourism</a></li>
				<li><a href="javascript::void(0);">Travel Agencies</a></li>
				<li><a href="javascript::void(0);">Tree Service</a></li>
				<li><a href="javascript::void(0);">TV Service</a></li>
				<li><a href="javascript::void(0);">Veterinarians</a></li>
				<li><a href="javascript::void(0);">Wedding</a></li>
				<li><a href="javascript::void(0);">Windows</a></li>
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