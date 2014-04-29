<?php
include '../users/loginheader.php';
include '../functions.php';
include '../config.php';

$domain = $_GET['domain'];

switch ($permissions) {
	case 'Content':
		$queryname = "ContentAdmin";
		break;
	case 'Writer':
		$queryname = "Writer";
		break;
	case 'Designer':
		$queryname = "Designer";
		break;
	case 'Support':
		$queryname = "Cloner";
		break;
	case 'Admin':
		$queryname = "Developer";
		break;
	case 'QA':
		$queryname = "QAInspector";
		break;
}
if(isset($_GET['writing']) && !empty($_GET['writing'])){
	$writing = $_GET['writing'];

	if($writing == 'Reviewing'){
		$queryname = 'Reviewer';
		$permissions = 'Writer';
	} elseif ($writing == 'Writing'){
		$queryname = 'Writer';
		$permissions = 'Writer';
	}
} else {
	$writing = '';
}

$query = "SELECT * FROM DomainDetails WHERE $queryname='$fullname' AND Domain='$domain'";
load_domain($mysqli, $query, $fullname, $permissions, $writing);

function load_domain($mysqli, $query, $fullname, $permissions, $writing){

	if(isset($_GET['fixed']) && !empty($_GET['fixed'])){
		$fixed = 'data-fixed="fixed"';
	} else {
		$fixed = '';
	}
	$mon = date('m');
	$year = date('Y');
	$day = date('d');
	$fulldate = $year.'-'.$mon.'-'.$day;

	$result = mysqli_query($mysqli, $query);
	$domain_data = mysqli_fetch_assoc($result);
	$domain_data['DomainNotes'] = stripslashes($domain_data['DomainNotes']);
?>
	<form action="" method="post" id="popout_task">
	<input type="hidden" name="domain" value="<?=$domain_data['Domain'];?>">
	<input type="hidden" name="user" value="<?=$fullname;?>">
	<input type="hidden" value="<?=$fulldate;?>" name="date_submitted">
	<?php
	switch ($permissions) {
	case 'Content': ?>
	<p class="popout_domain"><a href="domain-accordion.php?DomainName=<?=$domain_data['Domain']?>&HostAccount=<?=$domain_data['HostAccount']?>" target="_blank"><strong><?=$domain_data['Domain'];?></strong></a></p>
	<p class="tab_back tab_active"><a data-domain="<?=$domain_data['Domain']?>" href="javascript:void(0);" class="tab tab_task">Task Info</a></p><p class="tab_back"><a data-domain="<?=$domain_data['Domain']?>" href="javascript:void(0);" class="tab tab_history">Build History</a></p><?php //<a href="javascript:void(0);" class="tab">Content</a>?>
	<div class="view_box">
		<div id="data_section">
			<p>Vertical: <strong><?=$domain_data['Vertical'];?></strong></p>
			<p>Country: <strong><?=$domain_data['Country'];?></strong></p>
			<p>Language: <strong><?=$domain_data['Language'];?></strong></p>
			<p>Wireframe: <strong><?=$domain_data['Wireframe'];?></strong></p>
			<p>Outsourced? <select id="outsourced" name="outsourced"><option value="Yes">Yes</option><option value="No">No</option></select></p>
			<p><a id="assign_writer" href="javascript:void(0);">Assign To Writer</a><a id="assign_admin" href="javascript:void(0);">Assign To Admin</a></p>
			<p id="writerlist" style="display: none;"><?php  users_list($mysqli, 'Writer', $fullname);?></p>
			<p id="adminlist" style="display: none;"><?php  users_list($mysqli, 'Content', $fullname);?></p>
			<p><label for="selectlist">Writer: </label><select id="selectlist" name="writer"></select></p>
		</div>
		<div id="notes_section">
			<p>Domain Notes</p>
			<div id="notes"><?=$domain_data['DomainNotes'];?></div>
			<a id="addNote" href="javascript:void(0);" data-name="<?=$fullname?>" data-date="<?=$fulldate?>" data-domain="<?=$domain_data['Domain']?>">Add Note</a>
			<p id="noteSuccess"></p>
		</div>
	</div><?php
		break;
	case 'Writer':
	if ($writing == 'Writing'){ ?>
		<p class="popout_domain"><a href="domain-accordion.php?DomainName=<?=$domain_data['Domain']?>&HostAccount=<?=$domain_data['HostAccount']?>" target="_blank"><strong><?=$domain_data['Domain'];?></strong></a></p>
		<p class="tab_back tab_active"><a data-domain="<?=$domain_data['Domain']?>" data-writing="Writing" href="javascript:void(0);" class="tab tab_task">Task Info</a></p><p class="tab_back"><a data-domain="<?=$domain_data['Domain']?>" href="javascript:void(0);" data-writing="Writing" class="tab tab_history">Build History</a></p><?php //<a href="javascript:void(0);" class="tab">Content</a>?>
		<div class="view_box">
			<div id="data_section">
				<input type="hidden" name="permissions" value="Writer">
				<p>Vertical: <strong><?=$domain_data['Vertical'];?></strong></p>
				<p>Country: <strong><?=$domain_data['Country'];?></strong></p>
				<p>Language: <strong><?=$domain_data['Language'];?></strong></p>
				<p>Wireframe: <strong><?=$domain_data['Wireframe'];?></strong></p>
				<p>Outsourced: <strong><?=$domain_data['Outsourced'];?></strong></p>
				<?php if(!empty($domain_data['ReviewNotes'])){
					?><p>Rejection Details: <?=$domain_data['ReviewNotes'];?></p><?php
				} ?>
				<input type="hidden" name="writer" value="<?=$domain_data['Writer'];?>">
				<p><label for="contenthours">Content Hours: </label><input id="contenthours" type="number" step=".1" name="contenthours" value="<?=$domain_data['ContentHours']?>"></p>
				<p><label for="authornickname">Author Nickname: </label><input id="authornickname" type="text" name="authornickname" value="<?=$domain_data['AuthorNickname']?>"></p>
			</div>
			<div id="notes_section">
			<p>Domain Notes</p>
			<div id="notes"><?=$domain_data['DomainNotes'];?></div>
			<a id="addNote" href="javascript:void(0);" data-name="<?=$fullname?>" data-date="<?=$fulldate?>" data-domain="<?=$domain_data['Domain']?>">Add Note</a>
			<p id="noteSuccess"></p>
		</div>
		</div><?php
	} elseif ($writing == 'Reviewing'){?>
		<p class="popout_domain"><a href="domain-accordion.php?DomainName=<?=$domain_data['Domain']?>&HostAccount=<?=$domain_data['HostAccount']?>" target="_blank"><strong><?=$domain_data['Domain'];?></strong></a></p>
		<p class="tab_back tab_active"><a data-domain="<?=$domain_data['Domain']?>" data-writing="Reviewing" href="javascript:void(0);" class="tab tab_task">Task Info</a></p><p class="tab_back"><a data-domain="<?=$domain_data['Domain']?>" href="javascript:void(0);" data-writing="Reviewing" class="tab tab_history">Build History</a></p><?php //<a href="javascript:void(0);" class="tab">Content</a>?>
		<div class="view_box">
			<div id="data_section">
				<input type="hidden" name="permissions" value="Writer">
				<p>Vertical: <strong><?=$domain_data['Vertical'];?></strong></p>
				<p>Country: <strong><?=$domain_data['Country'];?></strong></p>
				<p>Language: <strong><?=$domain_data['Language'];?></strong></p>
				<p>Wireframe: <strong><?=$domain_data['Wireframe'];?></strong></p>
				<p>Writer: <strong><?=$domain_data['Writer'];?></strong></p>
				<p>Outsourced: <strong><?=$domain_data['Outsourced'];?></strong></p>
				<input type="hidden" name="reviewed" value="reviewed">
				<input type="hidden" name="writer" value="<?=$domain_data['Writer'];?>">
				<p><label for="date_submitted">Date Completed: </label>
				<input type="date" name="date_submitted" value="<?=$fulldate;?>"></p>
				<p>Pass Review? <input type="checkbox" id="reviewed"></p>
				<p id="reviewp"><label for="reviewNotes">Rejection Notes:</label>
				<textarea id="reviewNotes" name="reviewnotes"></textarea></p>
			</div>
			<div id="notes_section">
				<p>Domain Notes</p>
				<div id="notes"><?=$domain_data['DomainNotes'];?></div>
				<a id="addNote" href="javascript:void(0);" data-name="<?=$fullname?>" data-date="<?=$fulldate?>" data-domain="<?=$domain_data['Domain']?>">Add Note</a>
				<p id="noteSuccess"></p>
			</div>
		</div>
		<?php
	}?>
	<?php
		break;
	case 'Designer':
		?>
	<p class="popout_domain"><a href="domain-accordion.php?DomainName=<?=$domain_data['Domain']?>&HostAccount=<?=$domain_data['HostAccount']?>" target="_blank"><strong><?=$domain_data['Domain'];?></strong></a></p>
	<p class="tab_back tab_active"><a data-domain="<?=$domain_data['Domain']?>" href="javascript:void(0);" class="tab tab_task">Task Info</a></p><p class="tab_back"><a data-domain="<?=$domain_data['Domain']?>" href="javascript:void(0);" class="tab tab_history">Build History</a></p><?php //<a href="javascript:void(0);" class="tab">Design</a>?>
	<div class="view_box">
		<div id="data_section">
			<p>Vertical: <strong><?=$domain_data['Vertical'];?></strong></p>
			<p>Country: <strong><?=$domain_data['Country'];?></strong></p>
			<p>Language: <strong><?=$domain_data['Language'];?></strong></p>
			<p>Wireframe: <strong><?=$domain_data['Wireframe'];?></strong></p>
			<label for="date_submitted">Date Completed: </label>
			<input type="date" name="date_submitted" value="<?=$fulldate;?>">
		</div>
		<div id="notes_section">
			<p>Domain Notes</p>
			<div id="notes"><?=$domain_data['DomainNotes'];?></div>
			<a id="addNote" href="javascript:void(0);" data-name="<?=$fullname?>" data-date="<?=$fulldate?>" data-domain="<?=$domain_data['Domain']?>">Add Note</a>
			<p id="noteSuccess"></p>
		</div>
	</div><?php
		break;
	case 'Support':
		?>
	<p class="popout_domain"><a href="domain-accordion.php?DomainName=<?=$domain_data['Domain']?>&HostAccount=<?=$domain_data['HostAccount']?>" target="_blank"><strong><?=$domain_data['Domain'];?></strong></a></p>
	<p class="tab_back tab_active"><a data-domain="<?=$domain_data['Domain']?>" href="javascript:void(0);" class="tab tab_task">Task Info</a></p><p class="tab_back"><a data-domain="<?=$domain_data['Domain']?>" <?=$fixed?> href="javascript:void(0);" class="tab tab_history">Build History</a></p><p class="tab_back"><a data-domain="<?=$domain_data['Domain']?>" <?=$fixed?> href="javascript:void(0);" class="tab tab_ftpcpanel">FTP/cPanel</a></p>
	<div class="view_box">
		<div id="data_section">
			<p>Vertical: <strong><?=$domain_data['Vertical'];?></strong></p>
			<p>Country: <strong><?=$domain_data['Country'];?></strong></p>
			<p>Language: <strong><?=$domain_data['Language'];?></strong></p>
			<p><label for="Wireframe">Wireframe: </label>
			<input required id="Wireframe" type="number" step="1" placeholder="Wireframe" name="Wireframe" value="<?=$domain_data['Wireframe'];?>"></p>
			<p><label for="Theme">Theme: </label>
			<select id="Theme" name="Theme">
			<?php json_dropdown('theme_list', $domain_data['Theme']);?>
			</select></p>
			<p><label for="managewpaccount">Manage WP Account: </label>
			<select required id="managewpaccount">
			<?php json_dropdown('manage_list');?>
			</select></p>
			<p><label for="databasename">Database Name: </label>
			<input required id="databasename" type="text" placeholder="Enter DB Name..." name="databasename" value="<?=$domain_data['DBName']?>"></p>
			<p><label for="databaseuser">Database User: </label>
			<input required id="databaseuser" type="text" placeholder="Enter DB User..." name="databaseuser" value="<?=$domain_data['DBUser']?>"></p>
			<p><label for="databasepw">Database Password: </label>
			<input required id="databasepw" type="text" placeholder="Enter DB Password..." name="databasepw" value="<?=$domain_data['DBPass']?>"></p>
			<p><label for="databasehost">Database Host: </label>
			<input required id="databasehost" type="text" placeholder="Enter DB Host..." name="databasehost" value="<?=$domain_data['DBHost']?>"></p>
			<p><label for="date_submitted">Date Completed: </label>
			<input type="date" name="date_submitted" value="<?=$fulldate;?>"></p>
		</div>
		<div id="notes_section">
			<p>Domain Notes</p>
			<div id="notes"><?=$domain_data['DomainNotes'];?></div>
			<a id="addNote" href="javascript:void(0);" data-name="<?=$fullname?>" data-date="<?=$fulldate?>" data-domain="<?=$domain_data['Domain']?>">Add Note</a>
			<p id="noteSuccess"></p>
		</div>
	</div><?php
		break;
	case 'Admin':
	?>
	<p class="popout_domain"><a href="domain-accordion.php?DomainName=<?=$domain_data['Domain']?>&HostAccount=<?=$domain_data['HostAccount']?>" target="_blank"><strong><?=$domain_data['Domain'];?></strong></a></p>
	<p class="tab_back tab_active"><a data-domain="<?=$domain_data['Domain']?>" href="javascript:void(0);" class="tab tab_task">Task Info</a></p><p class="tab_back"><a data-domain="<?=$domain_data['Domain']?>" href="javascript:void(0);" class="tab tab_history">Build History</a></p><p class="tab_back"><a data-domain="<?=$domain_data['Domain']?>" data-wireframe="<?=$domain_data['Wireframe']?>" target="_blank" href="wireframe_forms/Wireframe.php?domain=<?=$domain_data['Domain']?>&wireframe=<?=$domain_data['Wireframe']?>" class="tab tab_content">Content</a></p><p class="tab_back"><a data-domain="<?=$domain_data['Domain']?>" href="javascript:void(0);" class="tab tab_ftpcpanel">FTP/cPanel</a></p>
	<div class="view_box">
		<div id="data_section">
			<p>Vertical: <strong><?=$domain_data['Vertical'];?></strong></p>
			<p>Country: <strong><?=$domain_data['Country'];?></strong></p>
			<p>Language: <strong><?=$domain_data['Language'];?></strong></p>
			<p>Wireframe: <strong><?=$domain_data['Wireframe'];?></strong></p>
			<label for="date_submitted">Date Completed: </label>
			<input type="date" name="date_submitted" value="<?=$fulldate;?>">
		</div>
		<div id="notes_section">
			<p>Domain Notes</p>
			<div id="notes"><?=$domain_data['DomainNotes'];?></div>
			<a id="addNote" href="javascript:void(0);" data-name="<?=$fullname?>" data-date="<?=$fulldate?>" data-domain="<?=$domain_data['Domain']?>">Add Note</a>
			<p id="noteSuccess"></p>
		</div>
	</div><?php
		break;
	case 'QA':
		?>
	<p class="popout_domain"><a href="domain-accordion.php?DomainName=<?=$domain_data['Domain']?>&HostAccount=<?=$domain_data['HostAccount']?>" target="_blank"><strong><?=$domain_data['Domain'];?></strong></a></p>
	<p class="tab_back tab_active"><a data-domain="<?=$domain_data['Domain']?>" href="javascript:void(0);" class="tab tab_task">Task Info</a></p><p class="tab_back"><a data-domain="<?=$domain_data['Domain']?>" href="javascript:void(0);" class="tab tab_history">Build History</a></p><p class="tab_back"><a data-domain="<?=$domain_data['Domain']?>" href="javascript:void(0);" class="tab tab_ftpcpanel">FTP/cPanel</a></p>
	<div class="view_box">
		<div id="data_section">
			<p>Vertical: <strong><?=$domain_data['Vertical'];?></strong></p>
			<p>Country: <strong><?=$domain_data['Country'];?></strong></p>
			<p>Language: <strong><?=$domain_data['Language'];?></strong></p>
			<p>Wireframe: <strong><?=$domain_data['Wireframe'];?></strong></p>
			<p><label for="type_list">Type: </label>
			<select id="type_list">
			<?php if($domain_data['Type'] == 'Article'){ ?>
				<option value="Article">Article</option>
				<option value="Blog">Blog</option>
			<?php } else { ?>
				<option value="Blog">Blog</option>
				<option value="Article">Article</option>
			<?php } ?>
			</select></p>
			<label for="date_submitted">Date Completed: </label>
			<input type="date" name="date_submitted" value="<?=$fulldate;?>">
		</div>
		<div id="notes_section">
			<p>Domain Notes</p>
			<div id="notes"><?=$domain_data['DomainNotes'];?></div>
			<a id="addNote" href="javascript:void(0);" data-name="<?=$fullname?>" data-date="<?=$fulldate?>" data-domain="<?=$domain_data['Domain']?>">Add Note</a>
			<p id="noteSuccess"></p>
		</div>
	</div><?php
		break;
}?>
	<div class="buttons">
	<?php if ($permissions == 'Admin'){
		?><a href="javascript:void(0);" data-domain="<?=$domain_data['Domain']?>" data-name="<?=$fullname?>" data-date="<?=$fulldate?>" class="return_support">Send To Support</a><?php
	}
	if($writing != 'Writing'){
		if(isset($_GET['fixed']) && $_GET['fixed'] == 'fixed'){
		} else { ?>
			<a href="javascript:void(0);" data-permissions="<?=$permissions?>" data-domain="<?=$domain_data['Domain']?>" class="popout_return">Back to queue</a>
	<?php } }
	if (!isset($_GET['fixed'])){
	?>
		<button class="popout_button">Submit</button>
	<?php } else {
		?><a href="javascript:void(0)" data-domain="<?=$domain_data['Domain']?>" class="fixed_return">Return To Dev</a><?php 
	} ?>
	</div>
	</form>
<?php }
?>