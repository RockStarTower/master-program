<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>jQuery UI Accordion - Customize icons</title>
  <link rel="stylesheet" href="jquery-ui-1.10.3.custom/css/smoothness/jquery-ui-1.10.3.custom.css" />
  <link rel="stylesheet" href="style.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script>
  $(function() {
    var icons = {
      header: "ui-icon-circle-arrow-e",
      activeHeader: "ui-icon-circle-arrow-s"
    };
    $( "#accordion" ).accordion({
      icons: icons
    });
    $( "#toggle" ).button().click(function() {
      if ( $( "#accordion" ).accordion( "option", "icons" ) ) {
        $( "#accordion" ).accordion( "option", "icons", null );
      } else {
        $( "#accordion" ).accordion( "option", "icons", icons );
      }
    });
  });
  $(document).ready(function() {
	$('#edit_wrap').hide();
	$("#btnLoad").click(function(){
		$('#edit_wrap').show();
		var domain = $('#btnLoad').attr('name');
		$.ajax({
            url: 'update_forms/edit_domain_basic.php',
            type: "GET",
            data: ({DomainName: domain}),
            success: function(data){
                $("#edit").html(data);
            }
        }); 
	});
});
  </script>
  <style type="text/css">
	#edit {
	width: 960px;
	height: 600px;
	position: absolute;
	left: 50%;
	top: 50%;
	background: #fff;
	border: 2px solid #7b7b7b;
	border-radius: 10px;
	margin-left: -480px;
	margin-top: -400px;
	z-index: 99;
	}
	#edit_wrap {
	background: rgba(50,50,50,0.5);
	position: fixed;
	width: 100%;
	height: 100%;
	top: 0;
	z-index: 90;
	}
  </style>
</head>
<body>
<div class="page-wrap">
	<div class="accordion-wrap">
<div id="accordion">
  <h3>Basic Details</h3>
  <div>
	<a id="btnLoad" name="fakedomain1" href="javascript::void()" style="position: relative;  float: right;">Edit</a>
	<table>
		<tbody>
			<tr>
				<td>Host Account</td>
				<td>Date Bought</td>
			</tr>
			<tr>
				<td>Country</td>
				<td>Renew Date</td>
			</tr>
			<tr>
				<td>Server Locations</td>
				<td>Total Cost</td>
			</tr>
			<tr>
				<td>Nameserver</td>
				<td>Email on Account</td>
			</tr>
			<tr>
				<td>IP Address</td>
			</tr>
		</tbody>
	</table>
  </div>
  <h3>Login Information</h3>
  <div>
	<a id="btnLoad" name="fakedomain1" href="javascript::void()" style="position: relative;  float: right;">Edit</a>
	<table>
		<thead>
			<tr>
				<th>Cpanel</th>
				<th>Billing</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>CPanel URL</td>
				<td>Billing URL</td>
			</tr>
			<tr>
				<td>CPanel Username</td>
				<td>Billing Username</td>
			</tr>
			<tr>
				<td>CPanel Password</td>
				<td>Billing Password</td>
			</tr>
		</tbody>
	</table>
	<table>
		<thead>
			<tr>
				<th>FTP</th>
				<th>Security</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>FTP Username</td>
				<td>Security PIN</td>
			</tr>
			<tr>
				<td>FTP Password</td>
				<td>Security Question Answer</td>
			</tr>
		</tbody>
	</table>
  </div>
  <h3>Billing Information</h3>
  <div>
	<a id="btnLoad" name="fakedomain1" href="javascript::void()" style="position: relative;  float: right;">Edit</a>
    <table>
		<tbody>
			<tr>
				<td>Credit Card on Account:</td>
				<td></td>
			</tr>
			<tr>
				<td>Renewal Date:</td>
				<td></td>
			</tr>
			<tr>
				<td>Yearly Hosting Cost	</td>
				<td></td>
			</tr>
			<tr>
				<td>Yearly Dedicated IP Cost:</td>
				<td></td>
			</tr>
			<tr>
				<td>Total Cost:</td>
				<td>$ </td>
			</tr>
		</tbody>
	</table>
  </div>
  </div>
  </div>
</div> 
<div id="edit_wrap">
	<div id="edit"></div>
	<b>Error Response:</b>
<div id="error"></div>
</div>
</body>
</html>