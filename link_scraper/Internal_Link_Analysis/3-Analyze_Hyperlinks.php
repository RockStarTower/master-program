<title>3-Analyze_Hyperlinks</title>
<?php require_once('../Library/con_seo.php'); ?>

<?php #include library & resource files

require_once("../Library/LIB_parse.php");
require_once("../Library/LIB_http.php");
require_once("../Library/LIB_resolve_addresses.php");

?>
<?php
#Domain table recordset
mysql_select_db($database_con_seo, $con_seo);
$query_domains = "SELECT * FROM domains";
$domains = mysql_query($query_domains, $con_seo) or die(mysql_error());
$row_domains = mysql_fetch_assoc($domains);
$totalRows_domains = mysql_num_rows($domains);
?>

<!--Form to choose domain to analyze-->
<form action="3-Analyze_Hyperlinks.php" method="post" name="2-Analyze_Hyperlinks" id="2-Analyze_Hyperlinks">
  <div align="center">
    <select name="domain" id="domain">
      <option value="" selected="selected" <?php if (!(strcmp("", ((isset($_POST["domain"]))?$_POST["domain"]:"")))) {echo "selected=\"selected\"";} ?> <?php if (!(strcmp("", ((isset($_POST["domain"]))?$_POST["domain"]:"")))) {echo "SELECTED";} ?>></option><?php
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
    <strong>Choose Domain</strong>
  </div>
  <div align="center"><br>
    <input name="Submit" type="submit" id="Grab_Links" value="Analyze Anchor Text by Anchor href">
  </div>
</form>
<div align="center">

  <?php

#uses the server variables form variable to set variables like $domain_id
if (isset($_POST["Submit"])) 
	{
		$domain_id = $_POST["domain"];

#Selects Distinct values from the href column in the links table
$sql_distinct_href_values = "SELECT DISTINCT href FROM hyperlinks WHERE Domain_ID = $domain_id";
$sql_distinct_href_values_result = mysql_query($sql_distinct_href_values);

while($href_Row = mysql_fetch_array($sql_distinct_href_values_result)) 
	{
?>
  <table width="750" border="1" align="center">
	<caption>
	<div align="left"><strong><?php echo $href_Row['href'];?></strong>
    </div>
	</caption>
    <div align="left">
      <?php
	#Selects list of distinct anchor text per distinct href
	$sql_distinct_text_values = "SELECT DISTINCT text FROM hyperlinks WHERE href = '".$href_Row['href']."' AND Domain_ID = $domain_id";
	$sql_distinct_text_values_result = mysql_query($sql_distinct_text_values);
	
	while($text_Row = mysql_fetch_array($sql_distinct_text_values_result))
		{

	

		$sql_text_count = "SELECT COUNT(text) FROM hyperlinks WHERE text = '".$text_Row['text']."' AND Domain_id = ".$domain_id." AND href = '".$href_Row['href'] ."'";
		$sql_text_count_result = mysql_query($sql_text_count);
		
		$cntrow = mysql_fetch_array($sql_text_count_result);
?>
    </div>
    <tr>
    <td><?php echo htmlspecialchars($text_Row['text']);?></td>
    <td width="50"><div align="center"><?php echo $cntrow[0];?></div></td>
    </tr>

<?php 
		flush ();
		}
?>
  </table>
  <br />
<?php
	}//end while href loop
}


?>

<p align="left">&nbsp;</p>
<?php
mysql_free_result($domains);
?>