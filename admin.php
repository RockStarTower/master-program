<?php
include 'users/loginheader.php';
include 'header.php';
if(login_check($mysqli) == true) {

$allowed = array('users', 'export');

if ( ! isset($_GET['action'])) {
   die('missing param');
}

$action = $_GET['action'];

if ( ! in_array($action, $allowed)) {
   die('invalid');
}

$url = $action . '_' . 'admin.php';
require $url;
} else {?>
	<div id="notauthorized">
   <p>You are not authorized to access this page.</p>
   <a href="users/login.php">Please Login</a></div><?php
}
include 'footer.php';
?>