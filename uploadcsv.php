<?php

$con = new mysqli('localhost', 'ecoabsor_master', 'B00st3r!', 'ecoabsor_master');
if (mysqli_connect_errno())	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	if(isset($_POST['submit'])) {
		$file = $_FILES['file']['tmp_name'];
		$handle = fopen($file,"r");

		while(($data = fgetcsv($handle,1000,",")) !==false) {
			$HostAccount = $data[0];
			$ExpDate = $data[1];
			$YearlyCost = $data[2];
			$query = "INSERT INTO HostDetails (HostAccount, ExpDate, YearlyCost) VALUES('$HostAccount','$ExpDate','$YearlyCost')";
			if (!mysqli_query($con,$query))	{
				die('Error: ' . mysqli_error($con));
			}
			echo '1 record added. <br />';
			echo $data[0] . '<br />';
			echo $data[1] . '<br />';
			echo $data[2] . '<br />';
		}
	}
	mysqli_close($con);

?>