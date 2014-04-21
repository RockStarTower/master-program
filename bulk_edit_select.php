<?php
include 'users/loginheader.php';
include 'header.php';
sec_session_start();
if(login_check($mysqli) == true) {
?>
<div class="page-wrap">
<?php
if($_GET['changes'] == 'domains'){
	$curMonth = date('m');
	$curYear = date('Y');
	$monthBegin = $curMonth . '/01/' . $curYear;
	$monthEnd = $curMonth . '/31/' . $curYear;

	$results = array();
	foreach ($_POST as $ex){
		array_push($results, $ex);
	}

	$query = "SELECT * FROM DomainDetails WHERE Domain='".$ex."'";
	$result = mysqli_query($mysqli,$query);
	$total_results = mysqli_num_rows($result);
	$row = mysqli_fetch_assoc($result);
	?>
	<form id="bulkedit" method="post" action="bulk_edit.php"><?php
	$count = 1;
	$total = 0;
	foreach ($results as $key => $val){
		${"Domain$count"} = $val;
		?><input type="hidden" name="domain<?=$count;?>" value="<?=${"Domain$count"};?>"><?php
		$count ++;
		$total ++;
	}
	?><input type="hidden" name="total" value="<?=$total;?>"><?php
	$headers = array('Domain','Host Account','Status','Registrar','Researched By');
		foreach ($headers as $exiest){
    			?><h4><?=$exiest?></h4>
    			<?php
    		}?>
		<?php
		$start = 0;
	for ($i = $start; $i < $total_results; $i++){
		foreach ($results as $ex){
			?><div><?php
			for ($i = $start; $i < $total_results; $i++){
				if (isset($result)){
					$query = "SELECT * FROM DomainDetails WHERE Domain='".$ex."'";
					$result = mysqli_query($mysqli,$query);
					$total_results = mysqli_num_rows($result);
					$rows = mysqli_fetch_array($result);
    				?><p><input type="hidden" name="<?=$rows['0']?>"><?=$rows['0']?></p>
					<p><?=$rows['1']?></p>
					<p><?=$rows['7']?></p>
					<p><?=$rows['21']?></p>
					<p><?=$rows['27']?></p><?php
					unset($rows);
				}
			}?></div><?php
		}

	}
	?><div><h2>Select the Fields you would like to edit</h2></div><div class="fieldselector"><div><a href="javascript:void(0);" id="selectall">Select All</a><a href="javascript:void(0);" id="deselectall">De-Select All</a></div><?php
	$counter = 0;
	$filter = array('Domain', 'DomainNotes', 'ReviewNotes');
	$filteredResult = array_diff_key($row, array_flip($filter));
	foreach ($filteredResult as $key => $val){
		?><p><label for="check<?=$counter;?>"><?=$key;?></label>
		<?php if ($key == 'Location' || $key == 'Status' || $key == 'HostAccount' || $key == 'Type' || $key == 'Vertical' || $key == 'Registrar' || $key == 'RenewalDate' || $key == 'DateBought' || $key == 'Country'){ ?>
		<input type="checkbox" class="bulkcheckbox" checked id="check<?=$counter;?>" name="<?=$key;?>" value="<?=$key;?>"></p><?php }
		else { ?>
		<input type="checkbox" class="bulkcheckbox" id="check<?=$counter;?>" name="<?=$key;?>" value="<?=$key;?>"></p>
		<?php } ?>
		<?php
		$counter ++;
	}?>
	<input type="hidden" name="Domain" value="Domain">
	<input type="hidden" name="changes" value="domains">
	</div><input type="submit" value="Bulk Edit"></form><?php

} elseif ($_GET['changes'] == 'hosts') {
	$curMonth = date('m');
	$curYear = date('Y');
	$monthBegin = $curMonth . '/01/' . $curYear;
	$monthEnd = $curMonth . '/31/' . $curYear;

	$results = array();
	foreach ($_POST as $ex){
		array_push($results, $ex);
	}

	$query = "SELECT * FROM HostDetails WHERE HostAccount='".$ex."'";
	$result = mysqli_query($mysqli,$query);
	$total_results = mysqli_num_rows($result);
	$row = mysqli_fetch_assoc($result);
	?>
	<form id="bulkedit" method="post" action="bulk_edit.php"><?php
	$count = 1;
	$total = 0;
	foreach ($results as $key => $val){
		${"HostAccount$count"} = $val;
		?><input type="hidden" name="hostaccount<?=$count;?>" value="<?=${"HostAccount$count"};?>"><?php
		$count ++;
		$total ++;
	}
	?><input type="hidden" name="total" value="<?=$total;?>"><?php
	$headers = array('Host Account');
		foreach ($headers as $exiest){
    			?><h4><?=$exiest?></h4>
    			<?php
    		}?>
		<?php
		$start = 0;
	for ($i = $start; $i < $total_results; $i++){
		foreach ($results as $ex){
			?><div class="hostas"><?php
			for ($i = $start; $i < $total_results; $i++){
				if (isset($result)){
					$query = "SELECT * FROM HostDetails WHERE HostAccount='".$ex."'";
					$result = mysqli_query($mysqli,$query);
					$total_results = mysqli_num_rows($result);
					$rows = mysqli_fetch_array($result);
    				?><p><input type="hidden" name="<?=$rows['0']?>"><?=$rows['0']?></p>
					<?php
					unset($rows);
				}
			}?></div><?php
		}

	}
	?><div><h2>Select the Fields you would like to edit</h2></div><div class="fieldselector"><div><a href="javascript:void(0);" id="selectall">Select All</a><a href="javascript:void(0);" id="deselectall">De-Select All</a></div><?php
	$counter = 0;
	foreach ($row as $key => $val){
		?><p><label for="check<?=$counter;?>"><?=$key;?></label>
		<input type="checkbox" class="bulkcheckbox" id="check<?=$counter;?>" name="<?=$key;?>" value="<?=$key;?>"></p>
		<?php
		$counter ++;
	}?>
	<input type="hidden" name="HostAccount" value="HostAccount">
	<input type="hidden" name="changes" value="hosts">
	</div><input type="submit" value="Bulk Edit"></form><?php
}
?>
</div>
<?php
} else {?>
	<div id="notauthorized">
   <p>You are not authorized to access this page.</p>
   <a href="users/login.php">Please Login</a></div><?php
}
include 'footer.php';
?>