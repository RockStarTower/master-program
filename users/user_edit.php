<?php
include 'db_connect.php';
include '../config.php';
$user_id = $_GET['id'];
$results = mysqli_query($mysqli, "SELECT * FROM Users WHERE UserID='$user_id'");
  $row = mysqli_fetch_array($results, MYSQLI_BOTH);
	$username = $row['Username'];
	$firstname = $row['FirstName'];
	$lastname = $row['LastName'];
	$email = $row['Email'];
	$Password = $row['Password'];
	if($row['Admin'] == 0){
		$admin = '';
	} else {
		$admin = 'checked';
	}
?>
 <form id="edit_user_form" action="users/user_update.php" method="post">
 <input type="hidden" name="UserID" value="<?=$user_id;?>"/>
 <div>
 <p>UserID: <?=$user_id; ?></p>
 <p>Username:  <input type="text" name="Username" value="<?=$username?>"/></p>
 <p>First Name:  <input type="text" name="Firstname" value="<?=$firstname?>"/></p>
 <p>Last Name:  <input type="text" name="Lastname" value="<?=$lastname?>"/></p>
 <p>Email:  <input type="text" name="Email" value="<?=$email?>"/></p>
 <p>Password:  <input type="text" name="Password" value="<?=$Password?>"/></p>
 <p>Admin:  <input type="checkbox" <?=$admin?> name="Admin" /></p>
 <p>Permissions: <select id="Permissions" name="Permissions">
		<?php
		foreach ($user_permission_array as $val){?>
		<option value="<?=$val;?>"><?=$val;?></option>
		<?php } ?>
	</select></p>
 <input type="submit" name="submit" value="Submit">
 </div>
 </form> 