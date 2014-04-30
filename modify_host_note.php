<?php
include 'users/loginheader.php';
include 'functions.php';

$host = $_GET['host'];
$date = $_GET['date'];
$fullname = $_GET['name'];
$newnote = $_GET['newnote'];
$oldnote = $_GET['oldnote'];
modHostNotes($mysqli, $host, $date, $fullname, $oldnote, $newnote);
?>