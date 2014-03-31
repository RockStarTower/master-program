<?
include 'loginfunctions.php';
include 'db_connect.php';
sec_session_start();
if(login_check($mysqli) == true) {
 
   // Add your protected page content here!
 
} else {
   echo 'You are not authorized to access this page.<br/>';
   echo "<a href="login.php">Please Login</a>";
}
?>