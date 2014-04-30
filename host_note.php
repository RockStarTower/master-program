<?php
include 'users/loginheader.php';
include 'functions.php';

$host = $_GET['host'];
$date = $_GET['date'];
$fullname = $_GET['name'];
$note = addslashes($_GET['note']);
hostNotes($mysqli, $host, $date, $fullname, $note);
?>