<?php
include 'loginfunctions.php';
sec_session_start();
$expires = time() - 3600;
// Unset all session values
$_SESSION = array();
// get session parameters 
$params = session_get_cookie_params();
// Delete the actual cookie.
setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
setcookie('UserID', "", $expires, "/");
setcookie('Username', "", $expires, "/");
setcookie('login_string', "", $expires, "/");
setcookie('Permissions', "", $expires, "/");
setcookie('FirstName', "", $expires, "/");
setcookie('LastName', "", $expires, "/");
setcookie('Admin', "", $expires, "/");
// Destroy session
session_destroy();
header('Location: ./login.php');
?>