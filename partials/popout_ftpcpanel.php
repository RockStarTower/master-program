<?php
include '../users/loginheader.php';

$domain = $_GET['domain'];
if(isset($_GET['writing'])){
	$writing = 'data-writing="'.$_GET['writing'].'"';
} else {
	$writing = '';
}
if(isset($_GET['fixed']) && !empty($_GET['fixed'])){
	$fixed = 'data-fixed="'.$_GET['fixed'].'"';
} else {
	$fixed = '';
}

$query = "SELECT * FROM DomainDetails WHERE Domain='$domain'";
$domain = mysqli_query($mysqli, $query);
$domain = mysqli_fetch_assoc($domain);
$host = $domain['HostAccount'];
$query = "SELECT * FROM HostDetails WHERE HostAccount='$host'";
	$mon = date('m');
	$year = date('Y');
	$day = date('d');
	$fulldate = $year.'-'.$mon.'-'.$day;

	$result = mysqli_query($mysqli, $query);
	$host_data = mysqli_fetch_assoc($result);

?>
<div id="popout_task">
	<p class="popout_domain"><a href="domain-accordion.php?DomainName=<?=$domain['Domain']?>&HostAccount=<?=$domain['HostAccount']?>"><strong><?=$domain['Domain'];?></strong></a></p>
	<p class="tab_back"><a data-domain="<?=$domain['Domain']?>" <?=$writing?> <?=$fixed?> href="javascript:void(0);" class="tab tab_task">Task Info</a></p><p class="tab_back"><a data-domain="<?=$domain['Domain']?>" <?=$fixed?> href="javascript:void(0);" class="tab tab_history">Build History</a></p><p class="tab_back tab_active"><a data-domain="<?=$domain['Domain']?>" <?=$fixed?> href="javascript:void(0);" class="tab tab_ftpcpanel">FTP/cPanel</a></p><?php //<a href="javascript:void(0);" class="tab">Content</a>?>
	<div class="view_box">
		<table>
			<thead>
				<tr>
					<th colspan="2">Cpanel</th>
					<th colspan="2">FTP</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><strong>CPanel URL:</strong></td>
					<td><p><?=$host_data['cPanelURL']?></p></td>
					<td><strong>FTP Host:</strong></td>
					<td><p><?=$host_data['FTPHost']?></p></td>
				</tr>
				<tr>
					<td><strong>CPanel Username:</strong></td>
					<td><p><?=$host_data['cPanelUser']?></p></td>
					<td><strong>FTP Username:</strong></td>
					<td><p><?=$host_data['FTPUser']?></p></td>
				</tr>
				<tr>
					<td><strong>CPanel Password:</strong></td>
					<td><p><?=$host_data['cPanelPass']?></p></td>
					<td><strong>FTP Password:</strong></td>
					<td><p><?=$host_data['FTPPass']?></p></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<?php
?>