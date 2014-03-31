<?php
include 'users/loginheader.php';
if (login_check($mysqli) == true){
	header('location: /searchindex.php');
} else {
	header('location: users/login.php');
}
?>