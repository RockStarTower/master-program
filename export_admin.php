<div class="adminwrapper">
<div id="export">
<div class="arrow_boxleft"><h1>CLICK ME!</h1></div>
<button id="exportcsv">Export</button>
<div class="arrow_box"><h1>CLICK ME!</h1></div>
</div>
<div id="export_results">
<?php
$tables = array ('ChangeHistory', 'DomainDetails', 'HostDetails', 'Users');
foreach ($tables as $string){
	$file = 'export/'.$string.'.csv';
	print '<a class="submit" href="'.$file.'">Save '.$string.'</a>';
	}
?>
</div>
</div>
<script>
$(document).ready(
    function(){
        $("#exportcsv").click(function () {
            $("#export_results").toggle();
            $("#export").toggle();
        });
    });

$('#exportcsv').live('click', function() {
    $.get('export_csv.php?functionName=export');

    return false;
});
</script>