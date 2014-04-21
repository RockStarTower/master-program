<?php
include 'users/loginheader.php';
include 'header.php';
sec_session_start();
if(login_check($mysqli) == true) {
?>
<?php
if($_POST['changes'] == 'domains'){
		$domains = array();
		$editfield = array();
		$results = array();
		$count = 1;
		$start = 0;
		$counter = 0;
		$total = $_POST['total'];
		for ($i = $start; $i < $total; $i++){
			$domain = 'domain' . $count;
			if (isset($_POST[$domain])){
				array_push($domains, $_POST[$domain]);
			}
			$count ++;
		}
		foreach ($domains as $ex){
			array_push($results, $ex);
		}
		$query = "SELECT * FROM DomainDetails WHERE Domain='".$ex."'";
		$result = mysqli_query($mysqli,$query) or die(mysqli_error($mysqli));
		$total_results = mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);
		$finalarray = array();
		foreach ($row as $arrkey => $arrval){
			$temparray = array($arrkey => $arrval);
			if (isset($_POST[$arrkey])){
				$finalarray = array_merge((array)$finalarray, (array)$temparray);
			}
		}
		$filteredResult = array_intersect($finalarray, $row);
		?>
		<div class="bulkwrapper"><form id="bulkeditform" method="post" action="bulk_edit_submit.php"><div class="bulkscrolldiv">
		<div id="widediv">
		<div id="bulkheaders"><?php
    		foreach ($filteredResult as $exiest => $value){
    			?><h4><?=$exiest?></h4><a href="#"  name="<?=$exiest?>" class="bulkhead"><img src="images/downarrow.png"></a>
    			<?php
    		}?></div>
		<?php
	$counter = 1;	
	foreach ($results as $ex){
		$start = 0;
		
		for ($i = $start; $i < $total_results; $i++){
		if (isset($result)){
			$query = "SELECT * FROM DomainDetails WHERE Domain='".$ex."'";
			$result = mysqli_query($mysqli,$query) or die(mysqli_error($mysqli));
			$total_results = mysqli_num_rows($result);
			$row = mysqli_fetch_assoc($result);
			$finalarray = array();
			foreach ($row as $arrkey => $arrval){
				$temparray = array($arrkey => $arrval);
				if (isset($_POST[$arrkey])){
					$finalarray = array_merge((array)$finalarray, (array)$temparray);
				}
			}
			$filteredResult = array_intersect($finalarray, $row);
    		?><div>
			<ul><?php
    		foreach ($filteredResult as $exiest => $value){
    			dropdown($exiest, $value, $counter);?>
    			<input name="before<?=$exiest . $counter;?>" type="hidden" value="<?=$value;?>" />
				<input name="field<?=$exiest . $counter;?>" type="hidden" value="<?=$exiest;?>" /><?php
    		}
    		?></ul></div><?php			
		}
		$counter ++;
	}
}
?><input type="hidden" name="changes" value="domains"><?php
} elseif($_POST['changes'] == 'hosts'){
		$hosts = array();
		$editfield = array();
		$results = array();
		$count = 1;
		$start = 0;
		$counter = 0;
		$total = $_POST['total'];
		for ($i = $start; $i < $total; $i++){
			$host = 'hostaccount' . $count;
			if (isset($_POST[$host])){
				array_push($hosts, $_POST[$host]);
			}
			$count ++;
		}
		foreach ($hosts as $ex){
			array_push($results, $ex);
		}
		$query = "SELECT * FROM HostDetails WHERE HostAccount='".$ex."'";
		$result = mysqli_query($mysqli,$query) or die(mysqli_error($mysqli));
		$total_results = mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);
		$finalarray = array();
		foreach ($row as $arrkey => $arrval){
			$temparray = array($arrkey => $arrval);
			if (isset($_POST[$arrkey])){
				$finalarray = array_merge((array)$finalarray, (array)$temparray);
			}
		}
		$filteredResult = array_intersect($finalarray, $row);
		?>
		<div class="bulkwrapper"><form id="bulkeditform" method="post" action="bulk_edit_submit.php"><div class="bulkscrolldiv">
		<div id="widediv">
		<div id="bulkheaders"><?php
    		foreach ($filteredResult as $exiest => $value){
    			?><h4><?=$exiest?></h4><a href="#"  name="<?=$exiest?>" class="bulkhead"><img src="images/downarrow.png"></a>
    			<?php
    		}?></div>
		<?php
	$counter = 1;	
	foreach ($results as $ex){
		$start = 0;
		
		for ($i = $start; $i < $total_results; $i++){
		if (isset($result)){
			$query = "SELECT * FROM HostDetails WHERE HostAccount='".$ex."'";
			$result = mysqli_query($mysqli,$query) or die(mysqli_error($mysqli));
			$total_results = mysqli_num_rows($result);
			$row = mysqli_fetch_assoc($result);
			$finalarray = array();
			foreach ($row as $arrkey => $arrval){
				$temparray = array($arrkey => $arrval);
				if (isset($_POST[$arrkey])){
					$finalarray = array_merge((array)$finalarray, (array)$temparray);
				}
			}
			$filteredResult = array_intersect($finalarray, $row);
    		?><div>
			<ul><?php
    		foreach ($filteredResult as $exiest => $value){ ?>
    			<input name="<?=$exiest . $counter;?>" type="text" value="<?=$value;?>" />
    			<input name="before<?=$exiest . $counter;?>" type="hidden" value="<?=$value;?>" />
				<input name="field<?=$exiest . $counter;?>" type="hidden" value="<?=$exiest;?>" /><?php
    		}
    		?></ul></div><?php			
		}
		$counter ++;
	}
}
?><input type="hidden" name="changes" value="hosts"><?php
}
?>
<input type="hidden" name="total" value="<?php echo $counter -1; ?>" />
</div>
</div>
<button id="submitbutton">Submit ALL Data</button>
</form></div>
<?php
} else {?>
	<div id="notauthorized">
   <p>You are not authorized to access this page.</p>
   <a href="users/login.php">Please Login</a></div><?php
}
include 'footer.php';
?>