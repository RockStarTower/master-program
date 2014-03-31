<?php
include '../users/loginheader.php';
$DomainName = $_GET['DomainName'];

$con = mysqli_connect('localhost', 'root', 'root', 'ecoabsor_master');
$request = "SELECT * FROM DomainDetails WHERE Domain='$DomainName'";
if ($result = mysqli_query($con, $request) or die("Error: ".mysqli_error($con))) {
	while ( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
		// variable for HostDomain exists - $DomainName
		$PR = $row['PR'];
		$DA = $row['DA'];
		$PA = $row['PA'];
		$BackLinks = $row['BackLinks'];
		$MozTrust = $row['MozTrust'];
	}
}
?>

<form id="edit_domain_value_metrics" action="update_forms/domain_value_metrics_action.php" method="post">
	<ul>
		<li>
			<p>Page Rank: </p>
			<input class="select" type="text" name="PR" value="<?php echo $PR; ?>" autocomplete="off" />
			<ul id="PR" class="dropdown">
				<li><a href="javascript::void(0);">0</a></li>
				<li><a href="javascript::void(0);">1</a></li>
				<li><a href="javascript::void(0);">2</a></li>
				<li><a href="javascript::void(0);">3</a></li>
				<li><a href="javascript::void(0);">4</a></li>
				<li><a href="javascript::void(0);">5</a></li>
				<li><a href="javascript::void(0);">6</a></li>
				<li><a href="javascript::void(0);">7</a></li>
				<li><a href="javascript::void(0);">8</a></li>
				<li><a href="javascript::void(0);">9</a></li>
				<li><a href="javascript::void(0);">10</a></li>
			</ul>
		</li>
		<input name="PR_Before" type="hidden" value="<?php echo $PR; ?>" />
		<input name="PR_Field" type="hidden" value="PR" />
		<li>
			<p>Domain Authority: </p>
			<input type="text" name="DA" value="<?php echo $DA; ?>" />
		</li>
		<input name="DA_Before" type="hidden" value="<?php echo $DA; ?>" />
		<input name="DA_Field" type="hidden" value="DA" />
		<li>
			<p>Page Authority: </p>
			<input type="text" name="PA" value="<?php echo $PA; ?>" />
		</li>
		<input name="PA_Before" type="hidden" value="<?php echo $PA; ?>" />
		<input name="PA_Field" type="hidden" value="PA" />
		<li>
			<p>Back Links: </p>
			<input type="text" name="BackLinks" value="<?php echo $BackLinks; ?>" />
		</li>
		<input name="BackLinks_Before" type="hidden" value="<?php echo $BackLinks; ?>" />
		<input name="BackLinks_Field" type="hidden" value="BackLinks" />
		<li>
			<p>Moz-Trust: </p>
			<input type="text" name="MozTrust" value="<?php echo $MozTrust; ?>" />
		</li>
		<input name="MozTrust_Before" type="hidden" value="<?php echo $MozTrust; ?>" />
		<input name="MozTrust_Field" type="hidden" value="MozTrust" />
		<input name="TimeStamp" type="hidden" value="<?php echo date("Y-m-d h:m:s"); ?> " />
		<input name="User" type="hidden" value="<?php echo $user; ?>" />
		<input name="DomainName" type="hidden" value="<?=$DomainName?>" />
		<input type="submit" class="popout_button" value="Submit">
	</ul>
</form>