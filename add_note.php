<?php
include 'users/loginheader.php';
include 'functions.php';

$domain = $_GET['domain'];
$date = $_GET['date'];
$fullname = $_GET['name'];
$note = addslashes($_GET['note']);
domainNotes($mysqli, $domain, $date, $fullname, $note);
?>