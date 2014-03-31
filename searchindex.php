<?php
include 'users/loginheader.php';
include 'header.php';
sec_session_start();
if(login_check($mysqli) == true) {
?>
<div class="home-wrap">
<!-- New Design Change -->
<img class="home_logo" src="Darth-Serverus-Logo.png">
<!-- End New Design Change -->
 <form id="searchbar" action="search.php" method="GET">
    <p>Search:</p><input type="text" name="query" />
    <div class="searchbarindex"><select class="searchselect" NAME="field">
		<option VALUE="DomainDetails">Domain</option>
		<option VALUE="HostDetails">Host</option>
	</select></div>
	<button id="searchsubmit"></button>
</form>
</div>
<div id="quote"><?php echo htmlspecialchars(quote()); ?></div>
</body>
</html>
<?php
} else {?>
	<div id="notauthorized">
   <p style="color: #fff;">You are not authorized to access this page.</p>
   <a href="users/login.php">Please Login</a></div><?php
}
include 'footer.php';
?>