<?php
include 'loginheader.php';
include 'header.php';
if(login_check($mysqli) == true) {
?>
<div id="DomainEntry">
<form id="mainForm">
	<p>Domain Name: <input type="text" id="DomainName" name="DomainName"></p>
	<p>Host Account: <select id="HostAccount" name="HostAccount"><?php echo HostAccountList(); ?></select></p>
	<p>Vertical: <select id="Vertical" name="Vertical">
			  	<option value="">&#45;Select&#45;</option>
				<option value="Automotive">Automotive</option>
			  	<option value="Beauty &amp; Fashion">Beauty & Fashion</option>
			  	<option value="Business">Business</option>
			  	<option value="Construction &amp; Contractors">Construction & Contractors</option>
			  	<option value="Dentist">Dentist</option>
			  	<option value="Education &amp; Development">Education & Development</option>
			  	<option value="Entertainment">Entertainment</option>
			  	<option value="Environmental">Environmental</option>
			  </select></p>
	<p>Type: <select id="Type" name="Type">
		  	<option value="">&#45;Select&#45;</option>
			<option value="Action Blog">Action Blog</option>
		  	<option value="Article">Article</option>
		  	<option value="Boost Use">Boost Use</option>
		  	<option value="Clone">Clone</option>
		  	<option value="Converted">Converted</option>
		  	<option value="Duplicate">Dulplicate</option>
		  	<option value="Geo&#45;Based">Geo-Based</option>
		  	<option value="Non&#45;Value">Non-Value</option>
		  	<option value="Value Blog">Value Blog</option>
		  </select></p>
	<p>Location: <input type="text" id="Location" name="Location"></p>
	<p>Language: <select id="Language" name="Language">
				<option value="">&#45;Select&#45;</option>
				<option value="English">English</option>
				<option value="French">French</option>
				<option value="Spanish">Spanish</option>
			  </select></p>
	<p>Status: <select id="Status" name="Status">
			  <option value="">&#45;Select&#45;</option>
			  <option value="In Process">In Process</option>
			  <option value="Active">Active</option>
			  <option value="Inactive">Inactive</option>
			  <option value="Down">Down</option>
			</select></p>
	<p>PR: <select id="PR" name="PR">
			<option value="">&#45;Select&#45;</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
		</select></p>
	<p>DA: <input id="DA" type="text" name="DA"></p>
	<p>PA: <input type="text" id="PA" name="PA"></p>
	<p>B-Links: <input type="text" id="BackLinks" name="BackLinks"></p>
	<p>Moz Trust: <input type="text" id="MozTrust" name="MozTrust"></p>
	<p>Domain Notes:</p> <textarea rows="4" cols="50" id="DomainNotes" name="DomainNotes"></textarea>
	<input id="TimeStamp" name="TimeStamp" type="hidden" value="<?php echo date("Y-m-d h:m:s"); ?> " />
	<input class="button" type="submit" value="Submit">
</form>
</div>
<?php
} else {
   echo 'You are not authorized to access this page.<br/>';
   echo '<a href="login.php">Please Login</a>';
}
include 'footer.php';
?>