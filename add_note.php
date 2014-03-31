<?php
include 'users/loginheader.php';
include 'functions.php';

$domain = $_GET['domain'];
$date = $_GET['date'];
$fullname = $_GET['name'];
domainNotes($mysqli, $domain, $date, $fullname, $_GET['note']);
?>