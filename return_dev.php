<?php
include 'users/loginheader.php';

$domain = $_POST['domain'];

$mon = date('m');
$year = date('Y');
$day = date('d');
$fulldate = $year.'-'.$mon.'-'.$day;

$query = "UPDATE DomainDetails SET DevStart='$fulldate' WHERE Domain='$domain'";
mysqli_query($mysqli, $query);
?>