<?php
include 'users/loginheader.php';
//include('users/db_connect.php');
//$json = '';
//$array = array();
//$variable = '[';
//$results = mysqli_query($mysqli, "SELECT * FROM DomainDetails");
//	$rows = mysqli_num_rows($results);
//	for ($i = 0; $i <= $rows; $i++){
//	mysqli_data_seek($results, $i);
//	$domain_data = mysqli_fetch_assoc($results);
//	$array = array("Domain" => $domain_data['Domain'], "HostAccount" => $domain_data['HostAccount'], "Vertical" => $domain_data['Vertical']);
//	$variable .= json_encode($array);
//	if($i !== $rows){
//		$variable .= ',';
//	}
//}
//$variable .= ']';
//print_r($variable);
//file_put_contents('data.json', $variable);
setcookie('name', $fullname, strtotime('+30 days'));
print_r($_COOKIE);
?>