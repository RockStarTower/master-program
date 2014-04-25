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

	$mon = date('m');
	$year = date('Y');
	$day = date('d');
	$fulldate = $year.'-'.$mon.'-'.$day;

	$result = mysqli_query($mysqli, $query);
	$domain_data = mysqli_fetch_assoc($result);

?>
<div id="popout_task">
	<p class="popout_domain"><a href="domain-accordion.php?DomainName=<?=$domain_data['Domain']?>&HostAccount=<?=$domain_data['HostAccount']?>"><strong><?=$domain_data['Domain'];?></strong></a></p>
	<p class="tab_back"><a data-domain="<?=$domain_data['Domain']?>" <?=$writing?> <?=$fixed?> href="javascript:void(0);" class="tab tab_task">Task Info</a></p><p class="tab_back  tab_active"><a data-domain="<?=$domain_data['Domain']?>" <?=$fixed?> href="	javascript:void(0);" class="tab tab_history">Build History</a></p><p class="tab_back"><a data-domain="<?=$domain_data['Domain']?>"  <?=$fixed?> href="javascript:void(0);" class="tab tab_ftpcpanel">FTP/cPanel</a></p><?php //<a href="javascript:void(0);" class="tab">Content</a>?>
	<div class="view_box">
		<table>
			<tbody>
				<tr>
					<td><strong>Researched By:</strong></td>
					<td><?=$domain_data['ResearchedBy']?></td>
					<td><strong>Date Bought</strong></td>
					<td><?=$domain_data['DateBought']?></td>
				</tr>
				<tr>
					<td><strong>Bought By:</strong></td>
					<td><?=$domain_data['BoughtBy']?></td>
				</tr>
				<tr>
					<td><strong>Content Admin:</strong></td>
					<td><?=$domain_data['ContentAdmin']?></td>
					<td><strong>Content Start:</td>
					<td><?=$domain_data['ContentStart']?></td>
				</tr>
				<tr>
					<td><strong>Reviewer:</strong></td>
					<td><?=$domain_data['Reviewer']?></td>
					<td><strong>Review Start:</strong></td>
					<td><?=$domain_data['ReviewStart']?></td>
				</tr>
				<tr>
					<td><strong>Writer:</strong></td>
					<td><?=$domain_data['Writer']?></td>
					<td><strong>Content Finished:</strong></td>
					<td><?=$domain_data['ContentFinished']?></td>
				</tr>
				<tr>
					<td><strong>Content Hours:</strong></td>
					<td><?=$domain_data['ContentHours']?></td>
				</tr>
				<tr>
					<td><strong>Designer:</strong></td>
					<td><?=$domain_data['Designer']?></td>
					<td><strong>Design Start:</strong></td>
					<td><?=$domain_data['DesignStart']?></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><strong>Design Finish:</strong></td>
					<td><?=$domain_data['DesignFinish']?></td>
				</tr>
				<tr>
					<td><strong>Cloner:</strong></td>
					<td><?=$domain_data['Cloner']?></td>
					<td><strong>Clone Finished:</strong></td>
					<td><?=$domain_data['CloneFinished']?></td>
				</tr>
				<tr>
					<td><strong>Developer:</strong></td>
					<td><?=$domain_data['Developer']?></td>
					<td><strong>Dev Start:</strong></td>
					<td><?=$domain_data['DevStart']?></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><strong>Dev Finish:</strong></td>
					<td><?=$domain_data['DevFinish']?></td>
				</tr>
				<tr>
					<td><strong>QA Inspector:</strong></td>
					<td><?=$domain_data['QAInspector']?></td>
					<td><strong>Date Complete:</strong></td>
					<td><?=$domain_data['DateComplete']?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<?php
?>