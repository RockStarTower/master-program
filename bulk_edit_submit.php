<?php
include 'users/loginheader.php';
include 'header.php';

//If Bulk Editing Domains
if($_POST['changes'] == 'domains'){

$query = "SELECT * FROM DomainDetails";
$result = mysqli_query($mysqli,$query);
$total_results = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

$longarray = array();
$counting = 1;
$start = 1;
$finalstring = '';
$updatestr = "UPDATE DomainDetails SET ";
$total = $_POST['total'];
$filter = array('Domain');
$filteredResult = array_diff_key($row, array_flip($filter));

for ($i = $start; $i <= $total; $i++){
	${"longarray$counting"} = array();
	foreach ($filteredResult as $key => $val){
		if (isset($_POST[''.$key.$counting.''])){
		${"new$key"} = $_POST[''.$key.$counting.''];
		$bdom = 'before' . $key . $counting;
		${"before$key"} = $_POST[''.$bdom.''];
		$fdom = 'field' . $key . $counting;
		${"field$key"} = $_POST[''.$fdom.''];
		$tempstring = ${"field$key"} . "='" . ${"new$key"} . "'";
		$tempppp = array($tempstring);
		${"longarray$counting"} = array_merge((array)${"longarray$counting"}, (array)$tempppp);
		}
	}
	${"longstring$counting"} = implode(",", ${"longarray$counting"});
	$finalstring .= $updatestr . ${"longstring$counting"} . " WHERE Domain='" . $_POST[''."Domain".$counting.''] . "';";
	$counting ++;
}
$fields = array();
foreach ($filteredResult as $arkey => $arval){
	if (isset($_POST[''.$arkey.''])){
		array_push($fields, ${"field$arkey"});
	}
}

$before_after = array();
foreach ($filteredResult as $arrkey => $arrval){
	if (isset($_POST[''.$arrkey.''])){
		$temparray = array(${"before$arrkey"} => ${"new$arrkey"});
		$before_after = array_merge((array)$before_after, (array)$temparray);
	}
}

$counter = 0;
foreach ($before_after as $akey => $aval) {
	$query = "INSERT INTO `ChangeHistory`(`UserID`, `FieldsChanged`, `Before`, `After`) VALUES ('$user','$fields[$counter]','$akey','$aval')";
	if ($akey != $aval) {
		if (!mysqli_query($mysqli,$query))	{
			die('ChangeHistory Table Error: ' . mysqli_error($mysqli));
		}
	}
	$counter += 1;
}

if (!mysqli_multi_query($mysqli,$finalstring)) {
	die('DomainDetails Table Error: ' . mysqli_error($mysqli));
}

echo '<div class="page-wrap">';
$numbers = 1;
echo '<div class="greenconfirmation">';
for ($i = $start; $i <= $total; $i++){
		echo '<h2 class="domainconfirmation">' . $_POST[''."Domain".$i.''] . ' Has Been Edited</h2>';
		foreach ($filteredResult as $key => $val){
			if (isset($_POST[''.$key.$numbers.''])){
				${"new$key"} = $_POST[''.$key.$numbers.''];
				$bdom = 'before' . $key . $numbers;
				${"before$key"} = $_POST[''.$bdom.''];
				$fdom = 'field' . $key . $numbers;
				${"field$key"} = $_POST[''.$fdom.''];
					if (${"before$key"} != ${"new$key"}){
						echo '<strong><p class="headerconfirmation">'.${"field$key"}.'</p></strong>';
						echo '<p class="beforechange">Before: ' . ${"before$key"} . '</p><p class="afterchange">After: ' . ${"new$key"} .'</p><br>';
					}
			}
		}
		$numbers ++;
}
echo '</div>';
echo '</div>';

//If Bulk Editing Hosts
} elseif($_POST['changes'] == 'hosts'){

$query = "SELECT * FROM HostDetails";
$result = mysqli_query($mysqli,$query);
$total_results = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

$longarray = array();
$counting = 1;
$start = 1;
$finalstring = '';
$updatestr = "UPDATE HostDetails SET ";
$total = $_POST['total'];

for ($i = $start; $i <= $total; $i++){
	${"longarray$counting"} = array();
	foreach ($row as $key => $val){
		if (isset($_POST[''.$key.$counting.''])){
		${"new$key"} = $_POST[''.$key.$counting.''];
		$bdom = 'before' . $key . $counting;
		${"before$key"} = $_POST[''.$bdom.''];
		$fdom = 'field' . $key . $counting;
		${"field$key"} = $_POST[''.$fdom.''];
		$tempstring = ${"field$key"} . "='" . ${"new$key"} . "'";
		$tempppp = array($tempstring);
		${"longarray$counting"} = array_merge((array)${"longarray$counting"}, (array)$tempppp);
		}
	}
	${"longstring$counting"} = implode(",", ${"longarray$counting"});
	$finalstring .= $updatestr . ${"longstring$counting"} . " WHERE HostAccount='" . $_POST[''."HostAccount".$counting.''] . "';";
	$counting ++;
}
$fields = array();
foreach ($row as $arkey => $arval){
	if (isset($_POST[''.$arkey.''])){
		array_push($fields, ${"field$arkey"});
	}
}

$before_after = array();
foreach ($row as $arrkey => $arrval){
	if (isset($_POST[''.$arrkey.''])){
		$temparray = array(${"before$arrkey"} => ${"new$arrkey"});
		$before_after = array_merge((array)$before_after, (array)$temparray);
	}
}

$counter = 0;
foreach ($before_after as $akey => $aval) {
	$query = "INSERT INTO `ChangeHistory`(`UserID`, `FieldsChanged`, `Before`, `After`) VALUES ('$user','$fields[$counter]','$akey','$aval')";
	if ($akey != $aval) {
		if (!mysqli_query($mysqli,$query))	{
			die('ChangeHistory Table Error: ' . mysqli_error($mysqli));
		}
	}
	$counter += 1;
}

if (!mysqli_multi_query($mysqli,$finalstring)) {
	die('HostDetails Table Error: ' . mysqli_error($mysqli));
}

echo '<div class="page-wrap">';
$numbers = 1;
echo '<div class="greenconfirmation">';
for ($i = $start; $i <= $total; $i++){
		echo '<h2 class="domainconfirmation">' . $_POST[''."HostAccount".$i.''] . ' Has Been Edited</h2>';
		foreach ($row as $key => $val){
			if (isset($_POST[''.$key.$numbers.''])){
				${"new$key"} = $_POST[''.$key.$numbers.''];
				$bdom = 'before' . $key . $numbers;
				${"before$key"} = $_POST[''.$bdom.''];
				$fdom = 'field' . $key . $numbers;
				${"field$key"} = $_POST[''.$fdom.''];
					if (${"before$key"} != ${"new$key"}){
						echo '<strong><p class="headerconfirmation">'.${"field$key"}.'</p></strong>';
						echo '<p class="beforechange">Before: ' . ${"before$key"} . '</p><p class="afterchange">After: ' . ${"new$key"} .'</p><br>';
					}
			}
		}
		$numbers ++;
}
echo '</div>';
echo '</div>';
}
?>