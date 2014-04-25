<?php

include '../users/loginheader.php';

$name = $_GET['name'];
$permissions = $_GET['permissions'];
echo "<div class='domains'>";
$counter = 0;
switch ($permissions) {
case 'Content':
	$query = "SELECT * FROM DomainDetails WHERE ContentAdmin='$name' AND ContentStart='0000-00-00'";
	$results = mysqli_query($mysqli, $query);
	$rows = mysqli_num_rows($results);
	
	for ($i = 0; $i < $rows; $i++){
		mysqli_data_seek($results, $i);
		$domain_data = mysqli_fetch_assoc($results);
		echo "<p>".$domain_data['Domain']."</p>";
	}
	$query = "SELECT * FROM DomainDetails WHERE Writer='$name' AND ContentStart!='0000-00-00' AND ReviewStart='0000-00-00' AND ContentFinished='0000-00-00'";
	$results = mysqli_query($mysqli, $query);
	$rows = mysqli_num_rows($results);
	
	for ($i = 0; $i < $rows; $i++){
		mysqli_data_seek($results, $i);
		$domain_data = mysqli_fetch_assoc($results);
		echo "<p>".$domain_data['Domain']."</p>";
	}
	$query = "SELECT * FROM DomainDetails WHERE Reviewer='$name' AND ReviewStart!='0000-00-00' AND ContentFinished='0000-00-00' AND DesignStart='0000-00-00'";
	$results = mysqli_query($mysqli, $query);
	$rows = mysqli_num_rows($results);
	
	for ($i = 0; $i < $rows; $i++){
		mysqli_data_seek($results, $i);
		$domain_data = mysqli_fetch_assoc($results);
		echo "<p>".$domain_data['Domain']."</p>";
	}
	break;
case 'Writer':
	$query = "SELECT * FROM DomainDetails WHERE Writer='$name' AND ContentStart!='0000-00-00' AND ReviewStart='0000-00-00' AND ContentFinished='0000-00-00'";
	$results = mysqli_query($mysqli, $query);
	$rows = mysqli_num_rows($results);
	
	for ($i = 0; $i < $rows; $i++){
		mysqli_data_seek($results, $i);
		$domain_data = mysqli_fetch_assoc($results);
		echo "<p>".$domain_data['Domain']."</p>";
	}
	$query = "SELECT * FROM DomainDetails WHERE Reviewer='$name' AND ReviewStart!='0000-00-00' AND ContentFinished='0000-00-00' AND DesignStart='0000-00-00'";
	$results = mysqli_query($mysqli, $query);
	$rows = mysqli_num_rows($results);
	
	for ($i = 0; $i < $rows; $i++){
		mysqli_data_seek($results, $i);
		$domain_data = mysqli_fetch_assoc($results);
		echo "<p>".$domain_data['Domain']."</p>";
	}
	break;
case 'Designer':
	$query = "SELECT * FROM DomainDetails WHERE Designer='$name' AND DesignFinish='0000-00-00'";
	$results = mysqli_query($mysqli, $query);
	$rows = mysqli_num_rows($results);
	
	for ($i = 0; $i < $rows; $i++){
		mysqli_data_seek($results, $i);
		$domain_data = mysqli_fetch_assoc($results);
		echo "<p>".$domain_data['Domain']."</p>";
	}
	break;
case 'Support':
	$query = "SELECT * FROM DomainDetails WHERE Cloner='$name' AND CloneFinished='0000-00-00' AND DevStart='0000-00-00' AND Developer=''";
	$results = mysqli_query($mysqli, $query);
	$rows = mysqli_num_rows($results);
	
	for ($i = 0; $i < $rows; $i++){
		mysqli_data_seek($results, $i);
		$domain_data = mysqli_fetch_assoc($results);
		echo "<p>".$domain_data['Domain']."</p>";
	}
	$query = "SELECT * FROM DomainDetails WHERE Cloner='$name' AND DevStart='0000-00-00' AND CloneFinished='0000-00-00'";
	$results = mysqli_query($mysqli, $query);
	$rows = mysqli_num_rows($results);
	
	for ($i = 0; $i < $rows; $i++){
		mysqli_data_seek($results, $i);
		$domain_data = mysqli_fetch_assoc($results);
		echo "<p>".$domain_data['Domain']."</p>";
	}
	break;
case 'Admin':
	$query = "SELECT * FROM DomainDetails WHERE Developer='$name' AND DevFinish='0000-00-00' AND DevStart!='0000-00-00'";
	$results = mysqli_query($mysqli, $query);
	$rows = mysqli_num_rows($results);
	
	for ($i = 0; $i < $rows; $i++){
		mysqli_data_seek($results, $i);
		$domain_data = mysqli_fetch_assoc($results);
		echo "<p>".$domain_data['Domain']."</p>";
	}
	break;
case 'QA':
	$query = "SELECT * FROM DomainDetails WHERE QAInspector='$name' AND DateComplete='0000-00-00'";
	$results = mysqli_query($mysqli, $query);
	$rows = mysqli_num_rows($results);
	
	for ($i = 0; $i < $rows; $i++){
		mysqli_data_seek($results, $i);
		$domain_data = mysqli_fetch_assoc($results);
		echo "<p>".$domain_data['Domain']."</p>";
	}
	break;
}
echo "</div>";