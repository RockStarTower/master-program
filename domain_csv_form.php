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
					<option>Automotive</option>
					<option>Beauty & Fashion</option>
					<option>Business</option>
					<option>Construction & Contractors</option>
					<option>Education & Development</option>
					<option>Entertainment</option>
					<option>Environmental</option>
					<option>Finance & Money</option>
					<option>Food & Cooking</option>
					<option>Government & Politics</option>
					<option>Health & Medical</option>
					<option>Home & Garden</option>
					<option>Industrial & Manufacturing</option>
					<option>Law</option>
					<option>Miscellaneous</option>
					<option>N/A</option>
					<option>Pets & Animals</option>
					<option>Real Estate</option>
					<option>Recreation & Sports</option>
					<option>Relationships & Family</option>
					<option>Religion & Spirituality</option>
					<option>Shopping</option>
					<option>Technology</option>
					<option>Travel</option>
					<option>Insurance</option>
					<option>Dentist</option>
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