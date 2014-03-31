<title>1-Parse_Hyperlinks</title>

<?php require_once('../Library/con_seo.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "AddDomain")) {
  $insertSQL = sprintf("INSERT INTO domains (`Domain`) VALUES (%s)",
                       GetSQLValueString($_POST['AddDomain3'], "text"));

  mysql_select_db($database_con_seo, $con_seo);
  $Result1 = mysql_query($insertSQL, $con_seo) or die(mysql_error());

  $insertGoTo = "2-Parse_Hyperlinks.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>

<?php
#include library & resource files
include("../Library/LIB_parse.php");
include("../Library/LIB_http.php");
include("../Library/LIB_resolve_addresses.php");
?>
<?php
#Domain table recordset
mysql_select_db($database_con_seo, $con_seo);
$query_domains = "SELECT * FROM domains";
$domains = mysql_query($query_domains, $con_seo) or die(mysql_error());
$row_domains = mysql_fetch_assoc($domains);
$totalRows_domains = mysql_num_rows($domains);
?>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>


<!--<div id="Layer1" style="position:absolute; left:707px; top:38px; width:184px; height:22px; z-index:1"> Step 2 ><a href="3-Analyze_Hyperlinks.php">Analyze-Hyperlinks</a></div>*/-->
<div id="InsertDomainForm" style="position:absolute; left:353px; top:31px; width:326px; height:34px; z-index:2">
  <form id="AddDomain" name="AddDomain" method="POST" action="<?php echo $editFormAction; ?>">
    <div align="center">
  <input name="AddDomain3" type="text" value="example.com" size="30" maxlength="300" />
  <input type="submit" name="AddDomain2" id="AddDomain2" value="Add Domain" />
  <input type="hidden" name="MM_insert" value="AddDomain" />
    </div>
</form></div>


<div id="ParseForm" style="position:absolute; left:386px; top:100px; width:213px; height:255px; z-index:3">
  <form action="2-Parse_Hyperlinks.php" method="post" name="1-Parse_Hyperlinks.php" id="1-Parse_Hyperlinks.php">
  
    <div align="center">
          <select name="domain" id="domain">
            <?php
do {  
?>
            <option value="<?php echo $row_domains['Domain_ID']?>"<?php if (!(strcmp($row_domains['Domain_ID'], ((isset($_POST["domain"]))?$_POST["domain"]:"")))) {echo "SELECTED";} ?>><?php echo $row_domains['Domain']?></option>
            <?php
} while ($row_domains = mysql_fetch_assoc($domains));
  $rows = mysql_num_rows($domains);
  if($rows > 0) {
      mysql_data_seek($domains, 0);
	  $row_domains = mysql_fetch_assoc($domains);
  }
?>
          </select>
      <br>
      <strong>Line Seperated List of URLs</strong>
    </div>
        <div align="center">
    <textarea name="input_WebPage_URLs" cols="30" rows="10" wrap="OFF"><?php echo $input_WebPage_URLs; ?></textarea>
    <br>
    <input name="Submit" type="submit" id="Grab_Links" value="Parse Hyperlinks">
  </div>
</form>
<form>
<a style="z-index:99;" href="http://darth-serverus.boocorp.com/link_scraper/Internal_Link_Analysis/export_csv.php" ><input type='button' value='Export Hyperlinks'>
</a></form>
</div>

<div id="ParsedPages" style="position:absolute; z-index:0; left: 7px; top: 385px; visibility: visible;"><?php

#uses the server variables, form variable, to set variables like $domain_id
if (isset($_POST["Submit"])) 
	{
		$input_WebPage_URLs =  $_POST["input_WebPage_URLs"];
		$ar_link_url = explode("\n",$input_WebPage_URLs);
		$domain_id = $_POST["domain"];
	}
#parse  link tags
for($yy=0; $yy<count($ar_link_url); $yy++)
	{
  		echo "<h3>$ar_link_url[$yy]</h3>";

		
		$web_page = http_get_withheader($target = trim($ar_link_url[$yy]), $referer="");	
		//echo $web_page['FILE'];
		$ar_link_tag = parse_array($web_page['FILE'], "<a ", "</a>");
		//print_r($ar_link_tag);
			for($xx=0; $xx<count($ar_link_tag); $xx++)
				{
					echo "<br><strong>$xx</strong>: ".htmlspecialchars($ar_link_tag[$xx]);
#parses the hyperlink title attribute between a double quote and a double quote using the library get_attribute() function
					if(stristr($ar_link_tag[$xx], "title=\""))
						{						
							$link_title_attribute = get_attribute($ar_link_tag[$xx], $attribute="title");
						}

#parses the hyperlink href attribute between a double quote and a double quote
					if(stristr($ar_link_tag[$xx], "href=\""))
						{
									$link_reference_attribute = return_between($ar_link_tag[$xx], "href=\"", "\"", "EXCL");
						}

#parses the hyperlink href attribute between a sinlge quote and a sinlge quote
							elseif(stristr($ar_link_tag[$xx], "href=\'"))
								{
									$link_reference_attribute = return_between($ar_link_tag[$xx], "href=\'", "\'", "EXCL");
								}

#parses the hyperlink href attribute between a sinlge quote and a space
							elseif(stristr($ar_link_tag[$xx], "href=\'"))
								{
									$link_reference_attribute = return_between($ar_link_tag[$xx], "href=\'", " ", "EXCL");
								}

#parses the hyperlink href attribute between a equal sign and a space
							elseif(stristr($ar_link_tag[$xx], "href="))
								{
									$link_reference_attribute = return_between($ar_link_tag[$xx], "href=", " ", "EXCL");
								}

#parses the hyperlink TARGET attribute and sets it as a varibale
					if(stristr($ar_link_tag[$xx], "target=\""))
						{
							$link_target_attribute = get_attribute($ar_link_tag[$xx], $attribute="target");
						}

#parses the hyperlink REL attribute and sets it as a varibale
					if(stristr($ar_link_tag[$xx], "rel=\""))
						{
							$link_relation_attribute = get_attribute($ar_link_tag[$xx], $attribute="rel");
						}

#parses the hyperlink anchor text and sets it as a varibale
					$ar_link_anchor_text = return_between($ar_link_tag[$xx],">", "</a>", "EXCL");

#inserts the hyperlink code and the hyperlink's tag vaiables into the database
					$sql = "INSERT INTO hyperlinks SET title = '$link_title_attribute', href = '$link_reference_attribute', target = '$link_target_attribute', rel = '$link_relation_attribute', text = '$ar_link_anchor_text', code = '$ar_link_tag[$xx]', page_url = '$ar_link_url[$yy]', domain_id = '$domain_id'";
					$result = mysql_query($sql);

#sets the link attribute variables and link code variable to NULL so that a attribute form a previouse link tag does not carry over into the next link tag parsing and database insert loop.
					unset ($link_title_attribute,$link_reference_attribute,$link_target_attribute,$link_relation_attribute,$ar_link_anchor_text,$ar_link_tag[$xx]);
					echo("<br>".htmlspecialchars($link_reference_attribute));

				}
	}

mysql_free_result($domains);
?></div>
<div align="center">
  
