<?php
include 'users/loginheader.php';
include 'header.php';

$inprocess = array(
	'review_inprocess' => 0,
	'content_inprocess' => 0,
	'design_inprocess' => 0,
	'support_inprocess' => 0,
	'dev_inprocess' => 0,
	'qa_inprocess' => 0
);

$results = mysqli_query($mysqli, "SELECT * FROM DomainDetails WHERE Status='In Process'");
$rows = mysqli_num_rows($results);
for ($i = 0; $i < $rows; $i++){
	mysqli_data_seek($results, $i);
	$domain_data = mysqli_fetch_assoc($results);
	if (strtotime($domain_data['ContentFinished']) == false && strtotime($domain_data['ContentStart']) == true && $domain_data['Writer'] != ''){
		$inprocess['review_inprocess'] = $inprocess['review_inprocess'] + 1;
	}
	if (strtotime($domain_data['DateBought']) == true && strtotime($domain_data['ContentStart']) == false){
		$inprocess['content_inprocess'] = $inprocess['content_inprocess'] + 1;
	}
	if (strtotime($domain_data['ContentFinished']) == true && strtotime($domain_data['DesignStart']) == false){
		$inprocess['design_inprocess'] = $inprocess['design_inprocess'] + 1;
	}
	if (strtotime($domain_data['DesignFinish']) == true && strtotime($domain_data['CloneFinished']) == false && $domain_data['Cloner'] == ''){
		$inprocess['support_inprocess'] = $inprocess['support_inprocess'] + 1;
	}
	if (strtotime($domain_data['CloneFinished']) == true && strtotime($domain_data['DevStart']) == false){
		$inprocess['dev_inprocess'] = $inprocess['dev_inprocess'] + 1;
	}
	if (strtotime($domain_data['DevFinish']) == true && $domain_data['QAInspector'] == ''){
		$inprocess['qa_inprocess'] = $inprocess['qa_inprocess'] + 1;
	}
}

$inprocess = json_encode($inprocess);
file_put_contents('json/inprocess.json', $inprocess);
?>