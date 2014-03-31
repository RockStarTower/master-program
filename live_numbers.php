<?php
include 'users/loginheader.php';
include 'header.php';
sec_session_start();
if(login_check($mysqli) == true) {
?>
<div class="page-wrap">
	<table id="live">
		<thead>
			<td></td>
			<td>Week</td>
			<td>Month</td>
			<td>Active in LP</td>
		</thead>
		<tbody>
			<tr>
				<td class="line-title"><strong>Totals</strong></td>
				<td id="week_launched"></td>
				<td id="month_launched"></td>
				<td id="active"></td>
			</tr>
			<tr>
				<td class="line-title"><strong>2.0</strong></td>
				<td id="week_Action"></td>
				<td id="month_Action"></td>
				<td id="active_Action"></td>
			</tr>
			<tr>
				<td class="line-title"><strong>Geo</strong></td>
				<td id="week_geo"></td>
				<td id="month_geo"></td>
				<td id="active_Geo"></td>
			</tr>
			<tr>
				<td class="line-title"><strong>Article</strong></td>
				<td id="week_article"></td>
				<td id="month_article"></td>
				<td id="active_Article"></td>
			</tr>
			<tr>
				<td class="line-title"><strong>Aus</strong></td>
				<td id="week_aus"></td>
				<td id="month_aus"></td>
				<td id="active_AUS"></td>
			</tr>
		</tbody>
	</table>
</div>
<?php
} else {?>
	<div id="notauthorized">
   <p>You are not authorized to access this page.</p>
   <a href="users/login.php">Please Login</a></div><?php
}
include 'footer.php';
?>