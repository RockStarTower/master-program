<?php
include 'users/loginheader.php';

$domain = $_POST['domain'];

$query = "UPDATE DomainDetails SETDevStart='0000-00-00' WHERE Domain ='$domain'";
mysqli_query($mysqli, $query);
?>