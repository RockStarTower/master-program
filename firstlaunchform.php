<?php

include 'users/loginheader.php';
include 'header.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of firstlaunchone
 *
 * @author jgalbraith
 */
?>

<form name="csv-upload" id="csv-upload" class="firstlaunchcsv" action="updategoals.php" method="post" enctype="multipart/form-data">
<div class="fileUpload btn btn-primary">
	<span id="upload" style="background-color: rgb(123, 123, 123); background-position: initial initial; background-repeat: initial initial;">Upload</span>
	<input type="file" name="file" id="uploadBtn" class="upload">
	<input id="uploadFile" placeholder="Choose File" disabled="disabled">
	<input type="date" required name="weekof" id="weekof">
	<input id="csv_submit" type="submit" name="submit" value="Submit">
</div>
</form>

<?php


include 'footer.php';

?>
