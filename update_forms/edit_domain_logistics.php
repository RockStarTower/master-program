<?php

include '../functions.php';
include '../users/loginheader.php';
$DomainName = $_GET['DomainName'];

$con = mysqli_connect('localhost', 'root', 'root', 'ecoabsor_master');
$request = "SELECT * FROM DomainDetails WHERE Domain='$DomainName'";
if ($result = mysqli_query($con, $request) or die("Error: ".mysqli_error($con))) {
	while ( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
		// variable for HostDomain exists - $DomainName
		$ManageWPAccount = $row['ManageWPAccount'];
		$DatabaseName = $row['DBName'];
		$DatabaseUser = $row['DBUser'];
		$DatabasePassword = $row['DBPass'];
		$DatabaseHost = $row['DBHost'];
		$Theme = $row['Theme'];
		$Wireframe = $row['Wireframe'];
		$AuthorNickname = $row['AuthorNickname'];
	}
}
?>

<form id="edit_domain_billing" action="update_forms/domain_logistics_action.php" method="post">
	<ul>
		<li>
			<p>ManageWP Account: </p>
			<input class="select" type="text" name="ManageWPAccount" value="<?php echo $ManageWPAccount; ?>" autocomplete="off" />
			<?php echo ManageWPList(); ?>
		</li>
		<input name="ManageWPAccount_Before" type="hidden" value="<?php echo $ManageWPAccount; ?>" />
		<input name="ManageWPAccount_Field" type="hidden" value="ManageWPAccount" />
		<li>
			<p>Theme: </p>
			<input type="text" name="Theme" value="<?php echo $Theme; ?>" />
		</li>
		<input name="Theme_Before" type="hidden" value="<?php echo $Theme; ?>" />
		<input name="Theme_Field" type="hidden" value="Theme" />
		<li>
			<p>Wireframe: </p>
			<input class="select" type="text" name="Wireframe" value="<?php echo $Wireframe; ?>" autocomplete="off" />
			<ul id="Wireframe" class="dropdown">
				<li><a href="javascript::void(0);">1</a></li>
				<li><a href="javascript::void(0);">2</a></li>
				<li><a href="javascript::void(0);">3</a></li>
				<li><a href="javascript::void(0);">4</a></li>
				<li><a href="javascript::void(0);">5</a></li>
				<li><a href="javascript::void(0);">6</a></li>
				<li><a href="javascript::void(0);">7</a></li>
				<li><a href="javascript::void(0);">8</a></li>
				<li><a href="javascript::void(0);">9</a></li>
				<li><a href="javascript::void(0);">10</a></li>
				<li><a href="javascript::void(0);">11</a></li>
				<li><a href="javascript::void(0);">12</a></li>
				<li><a href="javascript::void(0);">13</a></li>
				<li><a href="javascript::void(0);">14</a></li>
				<li><a href="javascript::void(0);">15</a></li>
				<li><a href="javascript::void(0);">16</a></li>
				<li><a href="javascript::void(0);">17</a></li>
				<li><a href="javascript::void(0);">18</a></li>
				<li><a href="javascript::void(0);">19</a></li>
				<li><a href="javascript::void(0);">20</a></li>
				<li><a href="javascript::void(0);">21</a></li>
				<li><a href="javascript::void(0);">22</a></li>
				<li><a href="javascript::void(0);">23</a></li>
				<li><a href="javascript::void(0);">24</a></li>
				<li><a href="javascript::void(0);">25</a></li>
				<li><a href="javascript::void(0);">26</a></li>
				<li><a href="javascript::void(0);">27</a></li>
				<li><a href="javascript::void(0);">28</a></li>
				<li><a href="javascript::void(0);">29</a></li>
				<li><a href="javascript::void(0);">30</a></li>
				<li><a href="javascript::void(0);">31</a></li>
				<li><a href="javascript::void(0);">32</a></li>
				<li><a href="javascript::void(0);">33</a></li>
				<li><a href="javascript::void(0);">34</a></li>
				<li><a href="javascript::void(0);">35</a></li>
				<li><a href="javascript::void(0);">36</a></li>
				<li><a href="javascript::void(0);">37</a></li>
				<li><a href="javascript::void(0);">38</a></li>
				<li><a href="javascript::void(0);">39</a></li>
				<li><a href="javascript::void(0);">40</a></li>
				<li><a href="javascript::void(0);">41</a></li>
				<li><a href="javascript::void(0);">42</a></li>
				<li><a href="javascript::void(0);">43</a></li>
				<li><a href="javascript::void(0);">44</a></li>
				<li><a href="javascript::void(0);">45</a></li>
				<li><a href="javascript::void(0);">46</a></li>
				<li><a href="javascript::void(0);">47</a></li>
				<li><a href="javascript::void(0);">48</a></li>
				<li><a href="javascript::void(0);">49</a></li>
				<li><a href="javascript::void(0);">50</a></li>
			</ul>
		</li>
		<input name="Wireframe_Before" type="hidden" value="<?php echo $Wireframe; ?>" />
		<input name="Wireframe_Field" type="hidden" value="Wireframe" />
		<li>
			<p>Author Nickname: </p>
			<input type="text" name="AuthorNickname" value="<?php echo $AuthorNickname; ?>" />
		</li>
		<input name="AuthorNickname_Before" type="hidden" value="<?php echo $AuthorNickname; ?>" />
		<input name="AuthorNickname_Field" type="hidden" value="AuthorNickname" />
		<li>
			<p>Database Name: </p>
			<input type="text" name="DatabaseName" value="<?php echo $DatabaseName; ?>" />
		</li>
		<input name="DatabaseName_Before" type="hidden" value="<?php echo $DatabaseName; ?>" />
		<input name="DatabaseName_Field" type="hidden" value="DatabaseName" />
		<li>
			<p>Database User: </p>
			<input type="text" name="DatabaseUser" value="<?php echo $DatabaseUser; ?>" />
		</li>
		<input name="DatabaseUser_Before" type="hidden" value="<?php echo $DatabaseUser; ?>" />
		<input name="DatabaseUser_Field" type="hidden" value="DatabaseUser" />
		<li>
			<p>Database Password: </p>
			<input type="text" name="DatabasePassword" value="<?php echo $DatabasePassword; ?>" />
		</li>
		<input name="DatabasePassword_Before" type="hidden" value="<?php echo $DatabasePassword; ?>" />
		<input name="DatabasePassword_Field" type="hidden" value="DatabasePassword" />
		<li>
			<p>Database Host: </p>
			<input type="text" name="DatabaseHost" value="<?php echo $DatabaseHost; ?>" />
		</li>
		<input name="DatabaseHost_Before" type="hidden" value="<?php echo $DatabaseHost; ?>" />
		<input name="DatabaseHost_Field" type="hidden" value="DatabaseHost" />
		<input name="TimeStamp" type="hidden" value="<?php echo date("Y-m-d h:m:s"); ?> " />
		<input name="User" type="hidden" value="<?php echo $user; ?>" />
		<input name="DomainName" type="hidden" value="<?=$DomainName?>" />
		<input type="submit" class="popout_button" value="Submit">
	</ul>
</form>