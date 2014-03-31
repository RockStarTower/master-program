<?php
if ($_REQUEST['functionName'] == 'export') {
$dbh = new PDO("mysql:host=localhost;dbname=ecoabsor_master", "root", "root");
$tables = array ('ChangeHistory', 'DomainDetails', 'HostDetails', 'Users');
foreach ($tables as $string){
	$file = 'export/'.$string.'.csv';
	$stmt = $dbh->prepare("SELECT * FROM $string");
	$stmt->execute();
	$arrValues = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$fp = fopen($file, 'w');
	$arrMerge = array();
	$arrMerge = array_merge((array)$arrMerge, (array)array_keys($arrValues[0]));
	    fputcsv($fp, $arrMerge);
	foreach ($arrValues as $key){
	    fputcsv($fp, $key);
	}
	fclose($fp);
}
}
?>