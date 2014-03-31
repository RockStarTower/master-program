<!DOCTYPE html>
<html>
<head>
<?php
include '../functions.php';
?>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="js.js"></script>
</head>
<body>
<div id="header-wrapper">
	<div id="header">
		<ul id="navigation">
			<li><a href="#">Forms</a></li>
			<li><a href="#">Other Stuff</a></li>
			<? if ($permissions == "Admin"){
			echo '<li><a href="#">Admin Area</a></li>';}
			?>
		</ul>
	</div>
</div>
<div id="page-wrap">