<?php
include 'db_connect.php';
include 'loginfunctions.php';
sec_session_start(); // Our custom secure way of starting a php session. 
 
if(isset($_POST['Email'], $_POST['Password'])) { 
   $email = $_POST['Email'];
   $password = $_POST['Password']; // The hashed password.
   if(login($email, $password, $mysqli) == true) {
      // Login success
		header('Location: ../searchindex.php');
   } else {
      // Login failed
		header('Location: ./login.php?error=1');
   }
} else { 
   // The correct POST variables were not sent to this page.
   echo 'Invalid Request';
}
?>