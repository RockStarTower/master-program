<?php
include 'header.php';
?>

<form name="csv-upload" id="csv-upload" action="uploadcsv.php" method="post" enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
<input type="submit" name="submit" value="Submit">
</form>

<?php
include 'footer.php';
?>