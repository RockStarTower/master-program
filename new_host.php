<?php
include 'users/loginheader.php';
include 'header.php';
sec_session_start();
if(login_check($mysqli) == true) {
?>
<div class="page-wrap">
	<form id="new_host" action="update_forms/new_host_action.php" method="post">
		<h1>New Host</h1>
		<ul>
			<li>
				<span class="duplicate_host">This host account already exists!</span>
				<span class="host-error"></span>
				<input id="HostAccountEntry" class="required" name="HostAccount" data="Host Account" placeholder="Host Account" type="text" action="update_forms/new_host_action.php" />
			</li>
			<li>
				<span class="host-error"></span>
				<input name="DateBought" class="Date required" data="Date Bought" placeholder="Date Bought" type="text" />
			</li>
			<li>
				<span class="host-error"></span>
				<input class="add required" name="YearlyCost" data="Yearly Cost" placeholder="Yearly Cost" type="text" />
			</li>
			<li>
				<input  class="add" name="DedicatedIPCost" data="Dedicated IP Cost" placeholder="Dedicated IP Cost" type="text" />
			</li>
			<li>
				<span class="host-error"></span>
				<input class="TotalCost required" name="TotalCost" data="TotalCost" placeholder="Total Cost" type="text" />
			</li>
			<li>
				<span class="host-error"></span>
				<input name="RenewDate" class="Date required" data="Renew Date" placeholder="Renew Date" type="text" />
			</li>			
			<li>
				<span class="host-error"></span>
				<input class="select required" name="CCOnAccount" data="Credit Card On Account" placeholder="Credit Card On Account" type="text" autocomplete="off" />
				<ul id="CCOnAccount" class="dropdown" style="display: none;">
					<li><a href="javascript::void(0);">Michael Bennett</a></li>
					<li><a href="javascript::void(0);">Bart Gibby</a></li>
					<li><a href="javascript::void(0);">Travis Thorpe</a></li>
				</ul>
			</li>
			<li>
				<span class="host-error"></span>
				<input class="select required" name="Country" data="Country" placeholder="Country" type="text" autocomplete="off" />
				<ul id="Country" class="dropdown" style="display: none;">
					<li><a href="javascript::void(0);">US</a></li>
					<li><a href="javascript::void(0);">CA</a></li>
					<li><a href="javascript::void(0);">AU</a></li>
				</ul>
			</li>
			<li>
				<input name="ServerLocations" data="Server Locations" placeholder="Server Locations" type="text" />
			</li>
			<li>
				<span class="host-error"></span>
				<input class="select required" name="EmailOnAccount" data="Email On Account" placeholder="Email On Account" type="text" autocomplete="off" />
				<ul id="EmailOnAccount" class="dropdown" style="display: none;"> 
					<li><a href="javascript::void(0);">master@logicfury.com</a></li>
					<li><a href="javascript::void(0);">info@logicfury.com</a></li>
					<li><a href="javascript::void(0);">support@logicfury.com</a></li>
					<li><a href="javascript::void(0);">tech@logicfury.com</a></li>
				</ul>
			</li>
			<li>
				<span class="host-error"></span>
				<input class="required" name="BillingURL" data="Billing URL" placeholder="Billing URL" type="text" />
			</li>
			<li>
				<span class="host-error"></span>
				<input class="required" name="BillingUser" data="Billing Username" placeholder="Billing Username" type="text" />
			</li>
			<li>
				<span class="host-error"></span>
				<input class="required" name="BillingPass" data="Billing Password" placeholder="Billing Password" type="text" />
			</li>
			<li>
				<input name="SecurityPIN" data="Security PIN" placeholder="Security PIN" type="text" />
			</li>
			<li>
				<input name="SecurityAnswer" data="Security Answer" placeholder="Security Answer" type="text" />
			</li>
		</ul>
		<h3>Notes:</h3>
		<textarea name="HostNotes" rows="10" cols="143"></textarea>
		<input class="newHostSubmit" type="submit" value="Submit">
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