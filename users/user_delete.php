<?php
include 'db_connect.php';
$user_id = $_GET['id'];
$results = mysqli_query($mysqli, "DELETE FROM Users WHERE UserID='$user_id'");
   header("Location: ../admin.php?action=users"); 
?>