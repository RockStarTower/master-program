<?php
include 'users/loginheader.php';
include 'functions.php';

$domain = $_GET['domain'];
$date = $_GET['date'];
$fullname = $_GET['name'];
$newnote = $_GET['newnote'];
$oldnote = $_GET['oldnote'];
modifyNotes($mysqli, $domain, $date, $fullname, $oldnote, $newnote);
?>