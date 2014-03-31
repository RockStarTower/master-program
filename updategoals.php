<?php
include 'users/loginheader.php';
include 'header.php';

//take the week posted from the submission page and update the database
$weekof = $_POST['weekof'];
$query = "INSERT INTO Goals (WeekOf) VALUES ('".$weekof."')";
mysqli_query($mysqli,$query);
//here is the csv file posted over from the sumbission page
$file1 = $_FILES['file']['tmp_name'];

//Function to convert an imported CSV File to an Array
function csv_to_array($file, $delimiter=',')
{
	if(!file_exists($file) || !is_readable($file))
		return FALSE;
	
	$header = NULL;
	$data = array();
	if (($handle = fopen($file, 'r')) !== FALSE)
	{
		while (($row = fgetcsv($handle, $delimiter)) !== FALSE)
		{
			if(!$header){                            
				$header = $row;
				}
			else{
				$data[] = array_combine($header, $row);
				}
		}
		fclose($handle);               
	}       
	return $data;
}
// Calling csv_to_array and applying it to the file imported from the firstlaunchform.php
$goals = csv_to_array($file1);
$db_goals = json_encode($goals);
//Here is the query that updates the corresponding cells in the master with either the launch_goals json or the all_goals json
$update = "UPDATE goals SET `Launch Goals`='".$db_goals."' WHERE WeekOf='".$weekof."'";
mysqli_query($mysqli,$update);
echo "Thank you for your goals submission.";

include 'footer.php'

?>