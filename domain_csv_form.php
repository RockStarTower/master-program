<?php
include 'users/loginheader.php';
include 'header.php';
sec_session_start();
if(login_check($mysqli) == true) {
?>
<div class="page-wrap">
	<form name="domain_csv-upload" id="csv-upload" action="domain_csv_confirm.php" method="post" enctype="multipart/form-data">
		<div class="fileUpload btn btn-primary">
			<span id="upload">Upload</span>
			<input type="file" name="file" id="uploadBtn" class="upload">
			<input id="uploadFile" placeholder="Choose File" disabled="disabled" />
			<input id="csv_submit" type="submit" name="submit" value="Submit">
		</div>
	</form>
	<h1 class="or">OR</h1>
	<div id="new_domain_reponse"></div>
	<form id="new_domain_form" method="post">
		<h2>New Domain</h2>
		<ul>
			<li>
				<span class="duplicate_domain">This domain already exists!</span>
				<input id="DomainEntry" class="required" name="Domain" data="Domain" placeholder="Domain" type="text" required />
			</li>
			<li>
				<select id="HostAccount" class="select required" name="HostAccount" required>
					<option value="">Host Account</option>
				<?php echo HostAccountDropdownList(); ?>
			</li>
			<li>
				<select name="Vertical" class="Vertical required" required>
					<option value="">Vertical</option>
					<option>Accident & Personal Injury Attorneys</option>
					<option>Accountants</option>
					<option>Agricultural</option>
					<option>Agricultural Equipment & Supplies</option>
					<option>Appeal Attorneys</option>
					<option>Appliance Sales</option>
					<option>Appliance Services</option>
					<option>Art Galleries & Dealers</option>
					<option>Arts & Entertainment</option>
					<option>Audio Visual</option>
					<option>Auto Accessories</option>
					<option>Auto Body & Paint</option>
					<option>Auto Dealers</option>
					<option>Auto Insurance</option>
					<option>Auto Parts</option>
					<option>Auto Service</option>
					<option>Automotive</option>
					<option>Bakeries</option>
					<option>Bankruptcy Attorneys</option>
					<option>Beauty & Fashion</option>
					<option>Beauty Schools</option>
					<option>Business</option>
					<option>Business Attorneys</option>
					<option>Camping</option>
					<option>Car Wash & Auto Detailing</option>
					<option>Child Care</option>
					<option>Child Education</option>
					<option>Chiropractors</option>
					<option>Cleaning Services</option>
					<option>Clothing & Accessories</option>
					<option>Colleges & Universities</option>
					<option>Commercial Insurance</option>
					<option>Computer Services</option>
					<option>Concrete Contractors</option>
					<option>Construction & Contractors</option>
					<option>Consulting</option>
					<option>Cosmetics & Hygiene</option>
					<option>Counseling</option>
					<option>Crafts & Hobbies</option>
					<option>Criminal Attorneys</option>
					<option>Damage Contractors</option>
					<option>Dentist</option>
					<option>Doors</option>
					<option>Education & Development</option>
					<option>Educational Books & Supplies</option>
					<option>Electricians</option>
					<option>Electronics</option>
					<option>Emergency Care</option>
					<option>Energy</option>
					<option>Energy & Environment</option>
					<option>Entertainers</option>
					<option>Events</option>
					<option>Exercise</option>
					<option>Extreme Sports</option>
					<option>Family & Divorce Attorneys</option>
					<option>Fence Contractors</option>
					<option>Financial Planning</option>
					<option>Finance & Money</option>
					<option>Florists</option>
					<option>Food & Cooking</option>
					<option>Food Services</option>
					<option>Food Suppliers</option>
					<option>Funeral Homes</option>
					<option>Furniture</option>
					<option>Garage Doors</option>
					<option>Garden Equipment & Supplies</option>
					<option>General Attorneys</option>
					<option>General Contractors</option>
					<option>Glass</option>
					<option>Government & Politics</option>
					<option>Hair & Skin Care</option>
					<option>Health & Medical </option>
					<option>Health Care Clinics</option>
					<option>Heavy Construction Equipment</option>
					<option>Home & Garden</option>
					<option>Home Insurance</option>
					<option>Home Health Care</option>
					<option>Hotels & Lodging</option>
					<option>HVAC Contractors</option>
					<option>Industrial & Manufacturing</option>
					<option>Industrial Equipment & Supplies</option>
					<option>Insurance</option>
					<option>Interior Design</option>
					<option>Internet Service Providers</option>
					<option>Immigration Attorneys</option>
					<option>Jewelry</option>
					<option>K-12 Education</option>
					<option>Landscape</option>
					<option>Law</option>
					<option>Life Insurance</option>
					<option>Loans & Financing</option>
					<option>Locks, Keys, & Safes</option>
					<option>Marketing</option>
					<option>Medical Equipment & Supplies</option>
					<option>Medical Insurance</option>
					<option>Message</option>
					<option>Miscellaneous</option>
					<option>Mobile Windshield Repair</option>
					<option>Motor Sports & Accessories</option>
					<option>Money Services</option>
					<option>Movies & Theaters</option>
					<option>Moving & Storage</option>
					<option>Music</option>
					<option>Natural Health Care</option>
					<option>Nightlife</option>
					<option>Novels & Stories</option>
					<option>Nursing Homes & Assisted Living</option>
					<option>Online Marketing</option>
					<option>Opticians & Optical Goods</option>
					<option>Optometrists</option>
					<option>Painters & Wallpaper Hangers</option>
					<option>Party Planners</option>
					<option>Paving Contractors</option>
					<option>Pest Control</option>
					<option>Pet Day Care & Boarding</option>
					<option>Pet Stores & Supplies</option>
					<option>Pet Training</option>
					<option>Pets</option>
					<option>Phone Service</option>
					<option>Photography</option>
					<option>Plumbers</option>
					<option>Podiatrists</option>
					<option>Pool Contractors</option>
					<option>Primary Care</option>
					<option>Printing Services</option>
					<option>Private Lessons</option>
					<option>Processing & Manufacturing</option>
					<option>Real Estate</option>
					<option>Real Estate Agents & Brokers</option>
					<option>Real Estate Attorneys</option>
					<option>Recreation & Sports
					<option>Recycling</option>
					<option>Relationships & Family</option>
					<option>Religion & Spirituality</option>
					<option>Religious Goods</option>
					<option>Religious Organization</option>
					<option>Religious School</option>
					<option>Remodeling Contractors</option>
					<option>Repair & Restoration</option>
					<option>Restaurants</option>
					<option>Roofers</option>
					<option>Sanitation</option>
					<option>Security</option>
					<option>Security Systems</option>
					<option>Shopping</option>
					<option>Signs</option>
					<option>Spas & Salons
					<option>Specialty Foods</option>
					<option>Sports & Sporting Goods</option>
					<option>Tax Services</option>
					<option>Technology</option>
					<option>Telephones</option>
					<option>Timeshares</option>
					<option>Tires & Wheels</option>
					<option>Trade Schools</option>
					<option>Transportation</option>
					<option>Travel & Tourism</option>
					<option>Travel Agencies</option>
					<option>Tree Service</option>
					<option>TV Service</option>
					<option>Veterinarians</option>
					<option>Wedding</option>
					<option>Windows</option>

					
				</select>
			</li>
			<li>
				<select name="Type" class="select Type required" required>
					<option value="">Type</option>
					<option>Blog</option>
					<option>Article</option>
					<option>Geo-Based</option>
					<option>Duplicate</option>
					<option>Clone</option>
					<option>Boost Use</option>
					<option>Employee Sandbox</option>
					<option>Marketing</option>
					<option>Client Blog</option>
				</select>
			</li>
			<li>
				<select class="select Version required" name="Version" required>
					<option value="">Version</option>
					<option>N/A</option>
					<option>1.0</option>
					<option>2.0</option>
					<option>3.0</option>
				</select>
			</li>
			<li>
				<select class="select Country required" name="Country" required>
					<option value=''>Country</option>
					<option>US/CA</option>
					<option>US</option>
					<option>CA</option>
					<option>AU</option>
				</select>
			</li>
			<li>
				<select class="select required" name="Language" required>
					<option value="">Language</option>
					<option>English</option>
					<option>French</option>
					<option>Spanish</option>
				</select>
			</li>			
			<li>
				<input class="select Location" name="Location" data="Location" placeholder="Location" type="text" autocomplete="off" />
			</li>
			<li>
				<select class="select Status required" name="Status" required>
					<option value="">Status</option>
					<option value="Active" class="active">Active</option>
					<option value="Inactive" class="inactive">Inactive</option>
					<option value="In Process" class="inprocess">In Process</option>
					<option value="Down" class="down">Down</option>
					<option value="Researched" class="researched">Researched</option>
					<option value="D-indexed" class="deindexed">D-indexed</option>
					<option value="Retired" class="retired">Retired</option>
				</select>
			</li>
			<li>
				<input class="Date required" name="RenewalDate" data="Renewal Date" placeholder="Renewal Date" type="text" required />
			</li>
			<li>
				<input class="Date select required DateBought" name="DateBought" data="Date Bought" placeholder="Date Bought" type="text" autocomplete="off" required />
			</li>
			<li>
				<input class="select BoughtBy required" name="BoughtBy" data="Bought By" placeholder="Bought By" type="text" required />
			</li>
			<li>
				<input class="select required PR" name="PR" data="PR" placeholder="PR" type="text" required />
			</li>
			<li>
				<input class="select required DA" name="DA" data="DA" placeholder="DA" type="text" required />
			</li>
			<li>
				<input class="select required PA" name="PA" data="PA" placeholder="PA" type="text" required />
			</li>
			<li>
				<input class="select required" name="BackLinks" data="Back Links" placeholder="Back Links" type="text" required />
			</li>
			<li>
				<input class="select required" name="MozTrust" data="Moz Trust" placeholder="Moz Trust" type="text" required />
			</li>
			<li>
				<select class="select Registrar required" name="Registrar" required>
					<option value="">Registrar</option>
				<?php echo HostAccountDropdownList(); ?>
			</li>
			<li>
				<input class="RenewalCost required" name="RenewalCost" data="Renewal Cost" placeholder="Renewal Cost" type="text" required />
			</li>
			<li>
				<input class="Date WhoIsRenewal required" name="WhoIsRenewal" data="Whois Renewal" placeholder="Whois Renewal" type="text" required />
			</li>
			<li>
				<input class="add WhoisCost required" name="WhoisCost" data="Who is Cost" placeholder="Who is Cost" type="text" required />
			</li>
			<li>
				<input class="add InitialCost required" name="InitialCost" data="Initial Cost" placeholder="Initial Cost" type="text" required />
			</li>
			<li>
				<input class="TotalCost required" name="TotalCost" data="Total Cost" placeholder="Total Cost" type="text" required />
			</li>
			<li>
				<input class="select ResearchedBy required" name="ResearchedBy" data="Researched By" placeholder="Researched By" type="text" required />
			</li>
		</ul>
		<h3>Notes:</h3>
		<textarea name="DomainNotes" rows="10" cols="143"></textarea>
		<input class="newDomainSubmit" type="submit" value="Submit">
	</form>
</div>
<?php
} else {?>
	<div id="notauthorized">
   <p>You are not authorized to access this page.</p>
   <a href="users/login.php">Please Login</a></div><?php
}
include 'footer.php';
?>