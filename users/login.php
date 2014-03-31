<?php
if(isset($_GET['error'])) { 
   echo 'Error Logging In!';
}
?>
<head>
<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body class="loginpage">
<div class="login">
<form action="process_login.php" method="post" name="login_form" >
	<h1>Master Login</h1>
	<input type="text" required="required" name="Email" placeholder="Email" /><br />
	<input type="Password" required="required" name="Password" placeholder="Password"/><br />
	<button type="submit" class="btn btn-primary btn-block btn-large">Login</button>
</form>
</div>
</body>