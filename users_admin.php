<div class="page-wrap">
<div class="adminwrapper">
	<div class="content">
		<div id="user_databasediv" class="user_database">
		<?php
		$dbh = new PDO("mysql:host=localhost;dbname=ecoabsor_master", "root", "root");
		$stmt = $dbh->prepare("SELECT * FROM Users");
		$stmt->execute();
		$arrValues = $stmt->fetchAll(PDO::FETCH_ASSOC);
		// open the table
		print "<table width=\"100%\">\n";
		print "<tr>\n";
		// add the table headers
		foreach ($arrValues[0] as $key => $useless){
		    print "<th>$key</th>";
		}
		print "</tr>";
		// display data
		foreach ($arrValues as $row){
		    print "<tr>";
		    foreach ($row as $key => $val){
		    	if($key == 'Admin'){
		    		if($val == 0){
						$val = 'False';
		    		} else {
		    			$val = 'True';
		    		}
		    	} 
		        print "<td>$val</td>";
		    }
		        print '<td><a class="edit_user" name="'.$row['UserID'].'" href="javascript:void(0)">Edit</a></td>';
				print '<td><form id="delete_user" method="post" action="users/user_delete.php?id='.$row['UserID'].'"><input type="hidden" name="user_id" value="'.$row['UserID'].'"><input type="submit" value="Delete"></form></td>';
		    print "</tr>\n";
		}

		// close the table
		print "</table>\n";
		?>
		</div>
	</div>
	<div class="sidebar">
		<div id="adduserdiv">
		<h2>Add User</h2>
		<script type="text/javascript" src="sha512.js"></script>
		<form id="add_user_form" name="add_user_form" method="post" action="users/new_user.php">
		<div>Username:<input required name="Username" type="text" id="Username"></div>
		<div>First Name:<input required name="FirstName" type="text" id="FirstName"></div>
		<div>Last Name:<input required name="LastName" type="text" id="LastName"></div>
		<div>Email:<input required name="Email" type="text" id="Email"></div>
		<div>Password:<input required name="Password" type="text" id="Password"></div>
		<div>Admin:<input type="checkbox" id="Admin" name="Admin"></div>
		<div>Permissions:<select id="Permissions" name="Permissions">
		<?php
		foreach ($user_permission_array as $val){?>
		<option value="<?=$val;?>"><?=$val;?></option>
		<?php } ?>
		</select></div>
		<input type="submit" id="adduserbutton" style="float:left;" value="Add User"/>
		</form>
		</div>
	</div>
</div>
</div>
<div id="edit_wrap">
	<div id="edit_wrapper">
		<a class="close" href="javascript:void(0)">Close</a>
		<div id="edit"></div>
	</div>
</div>