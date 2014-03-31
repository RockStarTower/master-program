<?php
error_reporting(E_ALL ^ E_NOTICE);
include 'users/loginheader.php';
include 'header.php';
sec_session_start();
if(login_check($mysqli) == true) {
/* 
        VIEW-PAGINATED.PHP
        Displays all data from 'players' table
        This is a modified version of view.php that includes pagination
*/
        
        // number of results to show per page
        
        if (isset($_GET['showall'])) {
            $per_page = 9999;
        } else {
            $per_page = 10;
        }
        $query = $_GET['query']; 
        $field = $_GET['field'];
     
        $query = explode(" ", $query);
        $query = implode("%", $query);
         
    	$min_length = 1;
     	$filterurl = array();   
        //$query = htmlspecialchars($query);       
        $query = mysqli_real_escape_string($mysqli, $query);
                
if($field == "DomainDetails"){
        //
        //Set Bulk Edit Variables
        //
        if (isset($_GET['bulk'])){
            $bulkheader = "Bulk Edit";
        } else {
            $bulkheader = '';
        }
        //
        //Set Filter Status Variables
        //
        if (isset($_GET['Status']))
        {
            $stavar = $_GET['Status'];
            $filterstatus = "`Status`='" . $stavar . "' AND";
            $Statustemparray = array("Status" => '&Status='.$stavar.'');
			$filterurl = array_merge((array)$filterurl, (array)$Statustemparray);
            $Statuscheck = 'checked';
        }
        else
        {
        	$filterstatus = '';
            $defaultstatus = " OR (`Status` LIKE '%".$query."%') ";
            $Statuscheck = '';
        }
        //
        //Set Host Account Variables
        //
        if (isset($_GET['HostAccount']))
        {
            $hostavar = $_GET['HostAccount'];
            $filterhostaccount = "`HostAccount`='" . $hostavar . "' AND";
            $HostAccountcheck = 'checked';
            $HostAccounttemparray = array("HostAccount" => '&HostAccount='.$hostavar.'');
            $filterurl = array_merge((array)$filterurl, (array)$HostAccounttemparray);
        }
        else
        {
            $filterhostaccount = '';
            $defaulthostaccount = " OR (`HostAccount` LIKE '%".$query."%') ";
            $HostAccountcheck = '';
        }
        //
        //Set Vertical Variables
        //
        if (isset($_GET['Vertical']))
        {
        	$Verticalcheck = 'checked';
            $verticalvar = $_GET['Vertical'];
            $filtervertical = "`Vertical`='" . $verticalvar . "' AND";
			$verticalvar = urlencode($verticalvar);
            $Verticaltemparray = array("Vertical" => '&Vertical='.$verticalvar.'');
			$filterurl = array_merge((array)$filterurl, (array)$Verticaltemparray);
        }
        else
        {
        	$Verticalcheck = '';
            $filtervertical = '';
            $defaultvertical = " OR (`Vertical` LIKE '%".$query."%') ";
        }
        //
        //Set Type Variables
        //
        if (isset($_GET['Type']))
        {
        	$Typecheck = 'checked';
            $typevar = $_GET['Type'];
            $filtertype = "`Type`='" . $typevar . "' AND";
            $Typetemparray = array("Type" => '&Type='.$typevar.'');
			$filterurl = array_merge((array)$filterurl, (array)$Typetemparray);
        }
        else
        {
        	$Typecheck = '';
            $filtertype = '';
            $defaulttype = " OR (`Type` LIKE '%".$query."%') ";
        }
        //
        //Set Country Variables
        //
        if (isset($_GET['Country']))
        {
        	$Countrycheck = 'checked';
            $countryvar = $_GET['Country'];
            $filtercountry = "`Country`='" . $countryvar . "' AND";
            $Countrytemparray = array("Country" => '&Country='.$countryvar.'');
			$filterurl = array_merge((array)$filterurl, (array)$Countrytemparray);
        }
        else
        {
        	$Countrycheck = '';
            $filtercountry = '';
            $defaultcountry = " OR (`Country` LIKE '%".$query."%') ";
        }
        //
        //Set Location Variables
        //
        if (isset($_GET['Location']))
        {
        	$Locationcheck = 'checked';
            $locationvar = $_GET['Location'];
            $filterlocation = "`Location`='" . $locationvar . "' AND";
            $Locationtemparray = array("Location" => '&Location='.$locationvar.'');
			$filterurl = array_merge((array)$filterurl, (array)$Locationtemparray);
        }
        else
        {
        	$Locationcheck = '';
            $filterlocation = '';
            $defaultlocation = " OR (`Location` LIKE '%".$query."%') ";
        }
        //
        //Set Language Variables
        //
        if (isset($_GET['Language']))
        {
        	$Languagecheck = 'checked';
        	$languageheader = "Language";
            $languagevar = $_GET['Language'];
            $filterlanguage = "`Language`='" . $languagevar . "' AND";
            $Languagetemparray = array("Language" => '&Language='.$languagevar.'');
			$filterurl = array_merge((array)$filterurl, (array)$Languagetemparray);
        }
        else
        {
        	$Languagecheck = '';
            $filterlanguage = '';
            $defaultlanguage = " OR (`Language` LIKE '%".$query."%') ";
        }
        //
        //Set PR Variables
        //
        if (isset($_GET['PR']))
        {
        	$PRcheck = 'checked';
            $prheader = "PR";
            $prvar = $_GET['PR'];
            $filterpr = "`PR`='" . $prvar . "' AND";
            $PRtemparray = array("PR" => '&PR='.$prvar.'');
			$filterurl = array_merge((array)$filterurl, (array)$PRtemparray);
        }
        else
        {
        	$PRcheck = '';
            $prheader = '';
            $filterpr = '';
            $defaultpr = " OR (`PR` LIKE '%".$query."%') ";
        }
        //
        //Set DA Variables
        //
        if (isset($_GET['DA']))
        {
        	$DAcheck = 'checked';
            $daheader = "DA";
            $davar = $_GET['DA'];
			$davar = explode(" ", $davar);
			$davar = implode("%", $davar);
            $filterda = "`DA`='" . $davar . "' AND";
            $DAtemparray = array("DA" => '&DA='.$davar.'');
			$filterurl = array_merge((array)$filterurl, (array)$DAtemparray);
        }
        else
        {
        	$DAcheck = '';
            $daheader = '';
            $filterda = '';
            $defaultda = " OR (`DA` LIKE '%".$query."%') ";
        }
        //
        //Set PA Variables
        //
        if (isset($_GET['PA']))
        {
        	$PAcheck = 'checked';
            $paheader = "PA";
            $pavar = $_GET['PA'];
            $filterpa = "`PA`='" . $pavar . "' AND";
            $PAtemparray = array("PA" => '&PA='.$pavar.'');
			$filterurl = array_merge((array)$filterurl, (array)$PAtemparray);
        }
        else
        {
        	$PAcheck = '';
            $paheader = '';
            $filterpa = '';
            $defaultpa = " OR (`PA` LIKE '%".$query."%') ";
        }
        //
        //Set ManageWPAccount Variables
        //
        if (isset($_GET['ManageWPAccount']))
        {
        	$ManageWPAccountcheck = 'checked';
            $managewpaccountheader = "ManageWP Account";
            $managewpaccountvar = $_GET['ManageWPAccount'];
            $filtermanagewpaccount = "`ManageWPAccount`='" . $managewpaccountvar . "' AND";
            $ManageWPAccounttemparray = array("ManageWPAccount" => '&ManageWPAccount='.$managewpaccountvar.'');
			$filterurl = array_merge((array)$filterurl, (array)$ManageWPAccounttemparray);
        }
        else
        {
        	$ManageWPAccountcheck = '';
            $managewpaccountheader = '';
            $filtermanagewpaccount = '';
            $defaultmanagewpaccount = " OR (`ManageWPAccount` LIKE '%".$query."%') ";
        }
        //
        //Set Theme Variables
        //
        if (isset($_GET['Theme']))
        {
        	$Themecheck = 'checked';
            $themeheader = "Theme";
            $themevar = $_GET['Theme'];
            $filtertheme = "`Theme`='" . $themevar . "' AND";
            $Themetemparray = array("Theme" => '&Theme='.$themevar.'');
			$filterurl = array_merge((array)$filterurl, (array)$Themetemparray);
        }
        else
        {
        	$Themecheck = '';
            $themeheader = '';
            $filtertheme = '';
            $defaulttheme = " OR (`Theme` LIKE '%".$query."%') ";
        }
        //
        //Set Wireframe Variables
        //
        if (isset($_GET['Wireframe']))
        {
        	$Wireframecheck = 'checked';
            $wireframeheader = "Wireframe";
            $wireframevar = $_GET['Wireframe'];
            $filterwireframe = "`Wireframe`='" . $wireframevar . "' AND";
            $Wireframetemparray = array("Wireframe" => '&Wireframe='.$wireframevar.'');
			$filterurl = array_merge((array)$filterurl, (array)$Wireframetemparray);
        }
        else
        {
        	$Wireframecheck = '';
            $wireframeheader = '';
            $filterwireframe = '';
            $defaultwireframe = " OR (`Wireframe` LIKE '%".$query."%') ";
        }
        //
        //Set Registrar Variables
        //
        if (isset($_GET['Registrar']))
        {
        	$Registrarcheck = 'checked';
            $registrarheader = "Registrar";
            $registrarvar = $_GET['Registrar'];
            $filterregistrar = "`Registrar`='" . $registrarvar . "' AND";
            $Registrartemparray = array("Registrar" => '&Registrar='.$stavar.'');
			$filterurl = array_merge((array)$filterurl, (array)$Registrartemparray);
        }
        else
        {
        	$Registrarcheck = '';
            $registrarheader = '';
            $filterregistrar = '';
            $defaultregistrar = " OR (`Registrar` LIKE '%".$query."%') ";
        }
        //
        //Set RenewalDate Variables
        //
        if (isset($_GET['RenewalDate']))
        {
        	$RenewalDatecheck = 'checked';
            $renewaldateheader = "Renewal Date";
            $renewaldatevar = $_GET['RenewalDate'];
			$renewaldate1var= $_GET['RenewalDate1'];
            $filterrenewaldate = "`RenewalDate` BETWEEN '" . $renewaldatevar . "' AND '" . $renewaldate1var . "' AND";
			$RenewalDatetemparray = array("RenewalDate" => '&RenewalDate='.$renewaldatevar.'');
			$filterurl = array_merge((array)$filterurl, (array)$RenewalDatetemparray);
			$RenewalDate1temparray = array("RenewalDate1" => '&RenewalDate1='.$renewaldate1var.'');
			$filterurl = array_merge((array)$filterurl, (array)$RenewalDate1temparray);
        }
        else
        {
        	$RenewalDatecheck = '';
            $renewaldateheader = '';
            $filterrenewaldate = '';
            $defaultrenewaldate = " OR (`RenewalDate` LIKE '%".$query."%') ";
        }
        //
        //Set ResearchedBy Variables
        //
        if (isset($_GET['ResearchedBy'])) {     
        	$ResearchedBycheck = 'checked';	
            $researchedbyheader = "Researched By";
            $researchedbyvar = $_GET['ResearchedBy'];
            $filterresearchedby = "`ResearchedBy`='" . $researchedbyvar . "' AND";
            $ResearchedBytemparray = array("ResearchedBy" => '&ResearchedBy='.$researchedbyvar.'');
			$filterurl = array_merge((array)$filterurl, (array)$ResearchedBytemparray);
        } else {
        	$ResearchedBycheck = '';
        	$researchedbyheader = '';
        	$filterresearchedby = '';
        	$defaultresearchedby = " OR (`ResearchedBy` LIKE '%".$query."%') ";
        }
        //
        //Set Developer Variables
        //
        if (isset($_GET['Developer']))
        {
        	$Developercheck = 'checked';
            $developerheader = "Developer";
            $developervar = $_GET['Developer'];
            $filterdeveloper = "`Developer`='" . $developervar . "' AND";
            $Developertemparray = array("Developer" => '&Developer='.$developervar.'');
			$filterurl = array_merge((array)$filterurl, (array)$Developertemparray);
        }
        else
        {
        	$Developercheck = '';
            $developerheader = '';
            $filterdeveloper = '';
            $defaultdeveloper = " OR (`Developer` LIKE '%".$query."%') ";
        }
        //
        //Set Designer Variables
        //
        if (isset($_GET['Designer']))
        {
        	$Designercheck = 'checked';
            $designerheader = "Designer";
            $designervar = $_GET['Designer'];
            $filterdesigner = "`Designer`='" . $designervar . "' AND";
            $Designertemparray = array("Designer" => '&Designer='.$designervar.'');
			$filterurl = array_merge((array)$filterurl, (array)$Designertemparray);
        }
        else
        {
        	$Designercheck = '';
            $designerheader = '';
            $filterdesigner = '';
            $defaultdesigner = " OR (`Designer` LIKE '%".$query."%') ";
        }
        //
        //Set Date Bought Variables
        //
		if (isset($_GET['DateBought']))
        {
        	$DomDateBoughtcheck = "checked";
        	$domdateboughtheader = "DateBought";
            $domdateboughtvar = $_GET['DateBought'];
			$domdatebought1var = $_GET['DateBought1'];
			$filterdomdatebought = "`DateBought` BETWEEN '" . $domdateboughtvar . "' AND '" . $domdatebought1var . "' AND";
            $DateBoughttemparray = array("DateBought" => '&DateBought='.$domdateboughtvar.'');
			$filterurl = array_merge((array)$filterurl, (array)$DateBoughttemparray);
			$DateBought1temparray = array("DateBought1" => '&DateBought1='.$domdatebought1var.'');
			$filterurl = array_merge((array)$filterurl, (array)$DateBought1temparray);
        }
        else
        {
        	$DomDateBoughtcheck = "";
        	$domdateboughtheader = '';
            $filterdomdatebought = '';
            $defaultdomdatebought = " OR (`DateBought` LIKE '%".$query."%')";
        }
		//
		//Set Date Complete Variables
		//
		if (isset($_GET['DateComplete']))
        {
        	$DomDateCompletecheck = "checked";
        	$domdatecompleteheader = "DateComplete";
            $domdatecompletevar = $_GET['DateComplete'];
			$domdatecomplete1var = $_GET['DateComplete1'];
			$filterdomdatecomplete = "`DateComplete` BETWEEN '" . $domdatecompletevar . "' AND '" . $domdatecomplete1var . "' AND";
            $DateCompletetemparray = array("DateComplete" => '&DateComplete='.$domdatecompletevar.'');
			$filterurl = array_merge((array)$filterurl, (array)$DateCompletetemparray);
			$DateComplete1temparray = array("DateComplete1" => '&DateComplete1='.$domdatecomplete1var.'');
			$filterurl = array_merge((array)$filterurl, (array)$DateComplete1temparray);
        }
        else
        {
        	$DomDateCompletecheck = "";
        	$domdatecompleteheader = '';
            $filterdomdatecomplete = '';
            $defaultdomdatecomplete = " OR (`DateComplete` LIKE '%".$query."%')";
        }
        //
        //Set Version Variables
        //
        if (isset($_GET['Version'])) {     
            $Versioncheck = 'checked'; 
            $Versionheader = "Version";
            $Versionvar = $_GET['Version'];
            $filterVersion = "`Version`='" . $Versionvar . "' AND";
            $Versiontemparray = array("Version" => '&Version='.$Versionvar.'');
            $filterurl = array_merge((array)$filterurl, (array)$Versiontemparray);
        } else {
            $Versioncheck = '';
            $Versionheader = '';
            $filterVersion = '';
            $defaultVersion = " OR (`Version` LIKE '%".$query."%') ";
        }
        //
        //Set Converted Variables
        //
        if (isset($_GET['Converted'])) {     
            $Convertedcheck = 'checked'; 
            $Convertedheader = "Converted";
            $Convertedvar = $_GET['Converted'];
            $filterConverted = "`Converted`='" . $Convertedvar . "' AND";
            $Convertedtemparray = array("Converted" => '&Converted='.$Convertedvar.'');
            $filterurl = array_merge((array)$filterurl, (array)$Convertedtemparray);
        } else {
            $Convertedcheck = '';
            $Convertedheader = '';
            $filterConverted = '';
            $defaultConverted = " OR (`Converted` LIKE '%".$query."%') ";
        }
		
	    if (isset($_GET['WhoIsRenewal']))
        {
        	$WhoIsRenewalcheck = 'checked';
            $whosisrenewalheader = "WhoIsRenewal";
            $whosisrenewalvar = $_GET['WhoIsRenewal'];
			$whosisrenewal1var= $_GET['WhoIsRenewal1'];
            $filterwhosisrenewal = "`WhoIsRenewal` BETWEEN '" . $whosisrenewalvar . "' AND '" . $whosisrenewal1var . "' AND";
			$WhoIsRenewaltemparray = array("WhoIsRenewal" => '&WhoIsRenewal='.$whosisrenewalvar.'');
			$filterurl = array_merge((array)$filterurl, (array)$WhoIsRenewaltemparray);
			$WhoIsRenewal1temparray = array("WhoIsRenewal1" => '&WhoIsRenewal1='.$whosisrenewal1var.'');
			$filterurl = array_merge((array)$filterurl, (array)$WhoIsRenewal1temparray);
        }
        else
        {
        	$WhoIsRenewalcheck = '';
            $whoisrenewalheader = '';
            $filterwhoisrenewal = '';
            $defaultwhoisrenewal = " OR (`WhoIsRenewal` LIKE '%".$query."%') ";
        }
        ////////////////////////////////
        //build Filter deletion system//
        ////////////////////////////////
        $totalfilters = array('HostAccount','Vertical','Type','Converted','Version','Country','Location','Language','Status','PR','DA','PA','ManageWPAccount','Theme','Wireframe','Registrar','ResearchedBy','Designer','Developer');
        foreach ($totalfilters as $filter){
        	if (isset($_GET[''.$filter.''])){
        		${"filteredout$filter"} = array(''.$filter.'');
        		${"Filterarray$filter"} = array_diff_key($filterurl, array_flip( ${"filteredout$filter"} ));
        		${"Filterstring$filter"} = implode("", ${"Filterarray$filter"});
        		${"Filter$filter"} = '<div class="redxdiv">'.$filter.' <a class="redx" href="search.php?query='.$query.'&field='.$field.''.${"Filterstring$filter"}.'"></a></div>';
        	}
        }
        if (isset($_GET['RenewalDate'])){
        		$filteredoutRenewalDate = array('RenewalDate', 'RenewalDate1');
        		$FilterarrayRenewalDate = array_diff_key($filterurl, array_flip( $filteredoutRenewalDate));
        		$FilterstringRenewalDate = implode("", $FilterarrayRenewalDate);
        		$FilterRenewalDate = '<div class="redxdiv">RenewalDate<a class="redx" href="search.php?query='.$query.'&field='.$field.''.$FilterstringRenewalDate.'"></a></div>';
        }
        if (isset($_GET['DateBought'])){
        		$filteredoutDateBought = array('DateBought', 'DateBought1');
        		$FilterarrayDateBought = array_diff_key($filterurl, array_flip( $filteredoutDateBought));
        		$FilterstringDateBought = implode("", $FilterarrayDateBought);
        		$FilterDateBought = '<div class="redxdiv">DateBought<a class="redx" href="search.php?query='.$query.'&field='.$field.''.$FilterstringDateBought.'"></a></div>';
        }
		if (isset($_GET['WhoIsRenewal'])){
        		$filteredoutWhoIsRenewal = array('WhoIsRenewal', 'WhoIsRenewal1');
        		$FilterarrayWhoIsRenewal = array_diff_key($filterurl, array_flip( $filteredoutWhoIsRenewal));
        		$FilterstringWhoIsRenewal = implode("", $FilterarrayWhoIsRenewal);
        		$FilterWhoIsRenewal = '<div class="redxdiv">WhoIsRenewal<a class="redx" href="search.php?query='.$query.'&field='.$field.''.$FilterstringWhoIsRenewal.'"></a></div>';
        }
		if (isset($_GET['DateComplete'])){
        		$filteredoutDateComplete = array('DateComplete', 'DateComplete1');
        		$FilterarrayDateComplete = array_diff_key($filterurl, array_flip( $filteredoutDateComplete));
        		$FilterstringDateComplete = implode("", $FilterarrayDateComplete);
        		$FilterDateComplete = '<div class="redxdiv">DateComplete<a class="redx" href="search.php?query='.$query.'&field='.$field.''.$FilterstringDateComplete.'"></a></div>';
        }
        //Make the filterurl array into a string for correct pagination linking
        $filterurlstring = implode("", $filterurl);
        // figure out the total pages in the database
        $result = mysqli_query($mysqli, "SELECT * FROM DomainDetails
            WHERE $filterdeveloper $filterregistrar $filterConverted $filterwireframe $filtertheme $filtermanagewpaccount $filterpa $filterVersion $filterda $filterpr $filterlanguage $filterlocation $filtercountry 
                $filterrenewaldate $filtertype $filtervertical $filterstatus $filterhostaccount $filterresearchedby $filterdesigner $filterdomdatebought $filterwhosisrenewal $filterdomdatecomplete ((`Domain` LIKE '%".$query."%') 
                $defaulttype $defaultvertical $defaultVersion $defaulthostaccount $defaultstatus $defaultpa $defaultmanagewpaccount $defaultregistrar $defaultresearchedby $defaultdesigner
                $defaultcountry $defaultpr $defaultlanguage $defaultlocation $defaultda $defaulttheme $defaultwireframe $defaultrenewaldate $defaultdeveloper $defaultdomdatebought $defaultwhoisrenewal $defaultdomdatecomplete
                OR (`BoughtBy` LIKE '%".$query."%'))
                ");
                if (!$result) {
                printf("Error: %s\n", mysqli_error($mysqli));
                exit();
                }
                //Declare Filter Varriables/Sort array/Remove Duplicates
                $HostAccountdupe = array();
				$Verticaldupe = array();
				$Typedupe = array();
				$Countrydupe = array();
				$Locationdupe = array();
				$Statusdupe = array();
				$PRdupe = array();
				$DAdupe = array();
				$PAdupe = array();
				$ManageWPAccountdupe = array();
				$Themedupe = array();
				$Wireframedupe = array();
				$Registrardupe = array();
				$ResearchedBydupe = array();
				$Designerdupe = array();
				$Developerdupe = array();
				$Languagedupe = array();
                $Versiondupe = array();
            while($domresults = mysqli_fetch_array($result)){              
                $HostAccountdupe[] = $domresults['HostAccount'];
                $Verticaldupe[] = $domresults['Vertical'];
                $Typedupe[] = $domresults['Type'];
                $Countrydupe[] = $domresults['Country'];
                $Locationdupe[] = $domresults['Location'];
                $Statusdupe[] = $domresults['Status'];
                $PRdupe[] = $domresults['PR'];
                $DAdupe[] = $domresults['DA'];
                $PAdupe[] = $domresults['PA'];
                $ManageWPAccountdupe[] = $domresults['ManageWPAccount'];
                $Themedupe[] = $domresults['Theme'];
                $Wireframedupe[] = $domresults['Wireframe'];
                $Registrardupe[] = $domresults['Registrar'];
                $ResearchedBydupe[] = $domresults['ResearchedBy'];                
                $Designerdupe[] = $domresults['Designer'];
                $Developerdupe[] = $domresults['Developer'];
                $Languagedupe[] = $domresults['Language'];
                $Versiondupe[] = $domresults['Version'];
                }
                $HostAccountnull =  array_unique($HostAccountdupe); $HostAccount =  array_filter($HostAccountnull); sort($HostAccount);
                $Verticalnull =  array_unique($Verticaldupe); $Vertical =  array_filter($Verticalnull); sort($Vertical);
                $Typenull =  array_unique($Typedupe); $Type = array_filter($Typenull); sort($Type);
                $Countrynull =  array_unique($Countrydupe); $Country =  array_filter($Countrynull); sort($Country);
                $Locationnull =  array_unique($Locationdupe); $Location =  array_filter($Locationnull); sort($Location);
                $Statusnull =  array_unique($Statusdupe); $Status =  array_filter($Statusnull); sort($Status);
                $PRnull =  array_unique($PRdupe); $PR =  array_filter($PRnull); sort($PR);
                $DAnull =  array_unique($DAdupe); $DA =  array_filter($DAnull); sort($DA);
                $PAnull =  array_unique($PAdupe); $PA =  array_filter($PAnull); sort($PA);
                $ManageWPAccountnull =  array_unique($ManageWPAccountdupe); $ManageWPAccount =  array_filter($ManageWPAccountnull); sort($ManageWPAccount);
                $Themenull =  array_unique($Themedupe); $Theme =  array_filter($Themenull); sort($Theme);
                $Wireframenull =  array_unique($Wireframedupe); $Wireframe =  array_filter($Wireframenull); sort($Wireframe);
                $Registrarnull =  array_unique($Registrardupe); $Registrar =  array_filter($Registrarnull); sort($Registrar);
                $ResearchedBynull =  array_unique($ResearchedBydupe); $ResearchedBy =  array_filter($ResearchedBynull); sort($ResearchedBy);
                $Designernull =  array_unique($Designerdupe); $Designer =  array_filter($Designernull); sort($Designer);
                $Developernull =  array_unique($Developerdupe); $Developer =  array_filter($Developernull); sort($Developer);
                $Languagenull =  array_unique($Languagedupe); $Language = array_filter($Languagenull); sort($Language);
                $Versionnull =  array_unique($Versiondupe); $Version = array_filter($Versionnull); sort($Version);
                //END Declare Filter Varriables/Sort array/Remove Duplicates
		$total_results = mysqli_num_rows($result);
        $total_pages = ceil($total_results / $per_page);
		// takes out keys that we do not want displayed
        $filterOutKeys = array('0','1','2','3','4','5','6','7','22','29','41','45');

        // check if the 'page' variable is set in the URL (ex: view-paginated.php?page=1)
        if (isset($_GET['page']) && is_numeric($_GET['page']))
        {
                $show_page = $_GET['page'];
                
                // make sure the $show_page value is valid
                if ($show_page > 0 && $show_page <= $total_pages)
                {
                        $start = ($show_page -1) * $per_page;
                        $end = $start + $per_page;
                }
                else
                {
                        // error - show first set of results
                        $start = 0;
                        $end = $per_page;
                }               
        }
        else
        {
                // if page isn't set, show first set of results
                $start = 0;
                $end = $per_page; 
        }
         echo '<div class="domsearchwrap">';
        $newquery = str_replace ("%", " ", $query);
        ?>
        <div class="filterformdiv">
        <form id="domfilterform" action="search.php?query=<?=$query?>&field=<?=$field?>" method="post">
        <div class="resultheader"><p>Total Results:</p><strong style="margin-left: 5px;"><?=$total_results?></strong><p>Search Results For:</p><h3><?=$dispquery?></h3></div>
        <input type="hidden" id="actionurl" name="search.php?query=<?=$query?>&field=<?=$field?>">
            <label for="check1">Host Account</label><input <?=$HostAccountcheck;?> id="check1" class="checkbox" type="checkbox" value="cbHostAccount">
                <div><select class="selectoptions" id="HostAccount" name="HostAccount">
                <?php if (isset($_GET['HostAccount'])){
                    foreach ($HostAccount as $temp){
                        echo '<option value="&HostAccount='.$temp.'">'.$temp.'</option>';
                    }
                } else {
                    echo '<option></option>';
                    foreach ($HostAccount as $temp){
                        echo '<option value="&HostAccount='.$temp.'">'.$temp.'</option>';
                    }}?>
                </select></div>
            <label for="check2">Vertical</label><input <?=$Verticalcheck;?> id="check2" class="checkbox" type="checkbox" value="cbVertical">
                <div><select class="selectoptions" id="Vertical" name="Vertical">
                <?php if (isset($_GET['Vertical'])){
                    foreach ($Vertical as $temp){
                        echo '<option value="&Vertical='.$temp.'">'.$temp.'</option>';
                    }
                } else {
                    echo '<option></option>';
                    foreach ($Vertical as $temp){
                    $temp1 = urlencode($temp);          
                    echo '<option value="&Vertical='.$temp1.'">'.$temp.'</option>';
                }}?>
                </select></div>
            <label for="check3">Type</label><input <?=$Typecheck;?> id="check3" class="checkbox" type="checkbox" value="cbType">
                <div><select class="selectoptions" id="Type" name="Type">
                <?php if (isset($_GET['Type'])){
                    foreach ($Type as $temp){
                        echo '<option value="&Type='.$temp.'">'.$temp.'</option>';
                    }
                } else {
                    echo '<option></option>';
                    foreach ($Type as $temp){
                    echo '<option value="&Type='.$temp.'">'.$temp.'</option>';
                }}?>
                </select></div>
            <label for="checkversion">Version</label><input <?=$Versioncheck;?> id="checkversion" class="checkbox" type="checkbox" value="cbVersion">
                <div><select class="selectoptions" id="Version" name="Version">
                <?php if (isset($_GET['Version'])){
                    foreach ($Version as $temp){
                        echo '<option value="&Version='.$temp.'">'.$temp.'</option>';
                    }
                } else {
                    echo '<option></option>';
                    foreach ($Version as $temp){
                    echo '<option value="&Version='.$temp.'">'.$temp.'</option>';
                }}?>
                </select></div>
            <label for="checkconverted">Converted</label><input <?=$Convertedcheck;?> id="checkconverted" class="checkbox" type="checkbox" value="cbConverted">
                <div><select class="selectoptions" id="Converted" name="Converted">
                <?php if (isset($_GET['Converted'])){
                    $tempconverted = $_GET['Converted'];
                        echo '<option value=&Converted='.$tempconverted.'>'.$tempconverted.'</option>';
                } else {
                    echo '<option></option>';
                    echo '<option value="&Converted=Yes">Yes</option>';
                    echo '<option value="&Converted=No">No</option>';
                }?>
                </select></div>
            <label for="check4">Country</label><input <?=$Countrycheck;?> id="check4" class="checkbox" type="checkbox" value="cbCountry"> 
                <div><select class="selectoptions" id="Country" name="Country">
                <?php if (isset($_GET['Country'])){
                    foreach ($Country as $temp){
                        echo '<option value="&Country='.$temp.'">'.$temp.'</option>';
                    }
                } else {
                echo "<option></option>";
                    foreach ($Country as $temp){
                    echo '<option value="&Country='.$temp.'">'.$temp.'</option>';
                }}?>
                </select></div>
            <label for="check5">Location</label><input <?=$Locationcheck;?> id="check5" class="checkbox" type="checkbox" value="cbLocation"> 
                <div><select class="selectoptions" id="Location" name="Location">
                <?php if (isset($_GET['Location'])){
                    foreach ($Location as $temp){
                        echo '<option value="&Location='.$temp.'">'.$temp.'</option>';
                    }
                } else {
                echo "<option></option>";
                    foreach ($Location as $temp){
                    echo '<option value="&Location='.$temp.'">'.$temp.'</option>';
                }}?>
                </select></div>
            <label for="check123">Language</label><input <?=$Languagecheck;?> id="check123" class="checkbox" type="checkbox" value="cbLanguage"> 
                <div><select class="selectoptions" id="Language" name="Language">
                <?php if (isset($_GET['Language'])){
                    foreach ($Language as $temp){
                        echo '<option value="&Language='.$temp.'">'.$temp.'</option>';
                    }
                } else {
                echo "<option></option>";
                    foreach ($Language as $temp){
                    echo '<option value="&Language='.$temp.'">'.$temp.'</option>';
                }}?>
                </select></div>
            <label for="check6">Status</label><input <?=$Statuscheck;?> id="check6" class="checkbox" type="checkbox" value="cbStatus"> 
                <div><select class="selectoptions" id="Status" name="Status">
                <?php if (isset($_GET['Status'])){
                    foreach ($Status as $temp){
                        echo '<option value="&Status='.$temp.'">'.$temp.'</option>';
                    }
                } else {
                    echo "<option></option>";
                    foreach ($Status as $temp){
                    echo '<option value="&Status='.$temp.'">'.$temp.'</option>';
                }}?>
                </select></div>
            <label for="check7">PR</label><input <?=$PRcheck;?> id="check7" class="checkbox" type="checkbox" value="cbPR"> 
                <div><select class="selectoptions" id="PR" name="PR">
                <?php if (isset($_GET['PR'])){
                    foreach ($PR as $temp){
                        echo '<option value="&PR='.$temp.'">'.$temp.'</option>';
                    }
                } else {
                echo "<option></option>";
                    foreach ($PR as $temp){
                    echo '<option value="&PR='.$temp.'">'.$temp.'</option>';
                }}?>
                </select></div>
            <label for="check8">DA</label><input <?=$DAcheck;?> id="check8" class="checkbox" type="checkbox" value="cbDA"> 
                <div><select class="selectoptions" id="DA" name="DA">
                <?php if (isset($_GET['DA'])){
                    foreach ($DA as $temp){
                        echo '<option value="&DA='.$temp.'">'.$temp.'</option>';
                    }
                } else {
                echo "<option></option>";
                    foreach ($DA as $temp){
                    echo '<option value="&DA='.$temp.'">'.$temp.'</option>';
                }}?>
                </select></div>
            <label for="check9">PA</label><input <?=$PAcheck;?> id="check9" class="checkbox" type="checkbox" value="cbPA"> 
                <div><select class="selectoptions" id="PA" name="PA">
                <?php if (isset($_GET['PA'])){
                    foreach ($PA as $temp){
                        echo '<option value="&PA='.$temp.'">'.$temp.'</option>';
                    }
                } else {
                echo "<option></option>";
                    foreach ($PA as $temp){
                    echo '<option value="&PA='.$temp.'">'.$temp.'</option>';
                }}?>
                </select></div>
            <label for="check10">Manage Wp Account</label><input <?=$ManageWPAccountcheck;?> id="check10" class="checkbox" type="checkbox" value="cbManageWPAccount"> 
                <div><select class="selectoptions" id="ManageWPAccount" name="ManageWPAccount">
                <?php if (isset($_GET['ManageWPAccount'])){
                    foreach ($ManageWPAccount as $temp){
                        echo '<option value="&ManageWPAccount='.$temp.'">'.$temp.'</option>';
                    }
                } else {
                echo "<option></option>";
                    foreach ($ManageWPAccount as $temp){
                    echo '<option value="&ManageWPAccount='.$temp.'">'.$temp.'</option>';
                }}?>
                </select></div>
            <label for="check11">Theme</label><input <?=$Themecheck;?> id="check11" class="checkbox" type="checkbox" value="cbTheme"> 
                <div><select class="selectoptions" id="Theme" name="Theme">
                <?php if (isset($_GET['Theme'])){
                    foreach ($Theme as $temp){
                        echo '<option value="&Theme='.$temp.'">'.$temp.'</option>';
                    }
                } else {
                echo "<option></option>";
                    foreach ($Theme as $temp){
                    echo '<option value="&Theme='.$temp.'">'.$temp.'</option>';
                }}?>
                </select></div>
            <label for="check12">Wireframe</label><input <?=$Wireframecheck;?> id="check12" class="checkbox" type="checkbox" value="cbWireframe"> 
                <div><select class="selectoptions" id="Wireframe" name="Wireframe">
                <?php if (isset($_GET['Wireframe'])){
                    foreach ($Wireframe as $temp){
                        echo '<option value="&Wireframe='.$temp.'">'.$temp.'</option>';
                    }
                } else {
                echo "<option></option>";
                    foreach ($Wireframe as $temp){
                    echo '<option value="&Wireframe='.$temp.'">'.$temp.'</option>';
                }}?>
                </select></div>
            <label for="check13">Registrar</label><input <?=$Registrarcheck;?> id="check13" class="checkbox" type="checkbox" value="cbRegistrar"> 
                <div><select class="selectoptions" id="Registrar" name="Registrar">
                <?php if (isset($_GET['Registrar'])){
                    foreach ($Registrar as $temp){
                        echo '<option value="&Registrar='.$temp.'">'.$temp.'</option>';
                    }
                } else {
                echo "<option></option>";
                    foreach ($Registrar as $temp){
                    echo '<option value="&Registrar='.$temp.'">'.$temp.'</option>';
                }}?>
                </select></div>
            <label for="check14">Renewal Date</label><input <?=$RenewalDatecheck;?> id="check14" class="checkbox" type="checkbox" value="cbRenewalDate"> 
                <div><input class="Date selectoptions" type="text" name="RenewalDate" id="RenewalDate" value="<?php if (isset($_GET['RenewalDate'])){ echo $_GET['RenewalDate']; }?>"/>                                             
            <input <?=$RenewalDatecheck;?> id="check14" class="checkbox" type="checkbox" value="cbRenewalDate">
                <input class="Date selectoptions" type="text" name="RenewalDate1" id="RenewalDate1" value="<?php if (isset($_GET['RenewalDate1'])){ echo $_GET['RenewalDate1']; }?>"/>
                </div>
            <label for="check15">Researched By</label><input <?=$ResearchedBycheck;?> id="check15" class="checkbox" type="checkbox" value="cbResearchedBy"> 
                <div><select class="selectoptions" id="ResearchedBy" name="ResearchedBy">
                <?php if (isset($_GET['ResearchedBy'])){
                    foreach ($ResearchedBy as $temp){
                        echo '<option value="&ResearchedBy='.$temp.'">'.$temp.'</option>';
                    }
                } else {
                echo "<option></option>";
                    foreach ($ResearchedBy as $temp){
                    echo '<option value="&ResearchedBy='.$temp.'">'.$temp.'</option>';
                }}?>
                </select></div>
            <label for="check16">Designer</label><input <?=$Designercheck;?> id="check16" class="checkbox" type="checkbox" value="cbDesigner"> 
                <div><select class="selectoptions" id="Designer" name="Designer">
                <?php if (isset($_GET['Designer'])){
                    foreach ($Designer as $temp){
                        echo '<option value="&Designer='.$temp.'">'.$temp.'</option>';
                    }
                } else {
                echo "<option></option>";
                    foreach ($Designer as $temp){
                    echo '<option value="&Designer='.$temp.'">'.$temp.'</option>';
                }}?>
                </select></div>
            <label for="check17">Developer</label><input <?=$Developercheck;?> id="check17" class="checkbox" type="checkbox" value="cbDeveloper"> 
                <div><select class="selectoptions" id="Developer" name="Developer">
                <?php if (isset($_GET['Developer'])){
                    foreach ($Developer as $temp){
                        echo '<option value="&Developer='.$temp.'">'.$temp.'</option>';
                    }
                } else {
                echo "<option></option>";
                    foreach ($Developer as $temp){
                    echo '<option value="&Developer='.$temp.'">'.$temp.'</option>';
                }}?>
                </select></div>
            <label for="check18">Date Bought</label><input <?=$DomDateBoughtcheck;?> id="check18" class="checkbox" type="checkbox" value="cbDomDateBought"> 
                <div><input class="Date selectoptions" type="text" name="DomDateBought" id="DomDateBought" value="<?php if (isset($_GET['DateBought'])){echo $_GET['DateBought'];}?>"/>                                             
            <input <?=$DomDateBoughtcheck;?> id="check18" class="checkbox" type="checkbox" value="cbDomDateBought">
                <input class="Date selectoptions" type="text" name="DomDateBought1" id="DomDateBought1" value="<?php if (isset($_GET['DateBought1'])){echo $_GET['DateBought1'];}?>"/>
                </div>
            <label for="check19">Whois Renewal</label><input <?=$WhoIsRenewalcheck;?> id="check19" class="checkbox" type="checkbox" value="cbWhoIsRenewal"> 
                <div><input class="Date selectoptions" type="text" name="WhoIsRenewal" id="WhoIsRenewal" value="<?php if (isset($_GET['WhoIsRenewal'])){echo $_GET['WhoIsRenewal'];}?>"/>                                               
            <input <?=$WhoIsRenewalcheck;?> id="check19" class="checkbox" type="checkbox" value="cbWhoIsRenewal">
                <input class="Date selectoptions" type="text" name="WhoIsRenewal1" id="WhoIsRenewal1" value="<?php if (isset($_GET['WhoIsRenewal1'])){echo $_GET['WhoIsRenewal1'];}?>"/>
                </div>
            <label for="check20">Date Complete</label><input <?=$DomDateCompletecheck;?> id="check20" class="checkbox" type="checkbox" value="cbDomDateComplete"> 
                <div><input class="Date selectoptions" type="text" name="DomDateComplete" id="DomDateComplete" value="<?php if (isset($_GET['DateComplete'])){echo $_GET['DateComplete'];}?>"/>                                             
            <input <?=$DomDateCompletecheck;?> id="check20" class="checkbox" type="checkbox" value="cbDomDateComplete">
                <input class="Date selectoptions" type="text" name="DomDateComplete1" id="DomDateComplete1" value="<?php if (isset($_GET['DateComplete1'])){echo $_GET['DateComplete1'];}?>"/>
                </div>
        <p><input id="formsubmit" type="submit" value="Filter"/></p>
        </form>
        </div>
        <?php
        //display pagination
		
		echo "<div class='searchcontainer'>";
        echo "<div id='resulthead'>";
        echo '<div class="resulthead"><a href="search.php?query='.$query.'&field='.$field.'">Remove All Filters?</a></div>';
        if ($_GET['showall'] == 'true'){
            echo "<div class='resulthead'><p>Showing All Results</p><p><a href='search.php?page=$i&query=$query&field=$field$filterurlstring'>Show Pagination</a></p></div>";
        } else {
            echo '<div class="resulthead"><a id="page_dropdown" href="javascript:void(0);">Show Pages</a></div>';
            echo '<ul class="dropdown">';
            for ($i = 1; $i <= $total_pages; $i++)
            {
                    echo "<li><a href='search.php?page=$i&query=$query&field=$field$filterurlstring'>$i</a></li>";
            }
            echo '</ul>';
            echo "<div class='resulthead'><a href='search.php?showall=true&query=$query&field=$field$filterurlstring'>Show All Results</a></div>";
        }
        echo "</div>";
        echo '<div class="filterp"><p>Filters:</p>';
        foreach ($totalfilters as $filter){
            if (isset(${"Filter$filter"})){echo ${"Filter$filter"};}
        }
        if (isset($FilterRenewalDate)){echo $FilterRenewalDate;}
        if (isset($FilterDateBought)){echo $FilterDateBought;}
		if (isset($FilterWhoIsRenewal)){echo $FilterWhoIsRenewal;}
		if (isset($FilterDateComplete)){echo $FilterDateComplete;}
        echo '</div>';
        echo '<div><a href="#" id="selectall">Bulk Select All</a></div>';
                
        // display data in table
        echo '<table class="searchtable"><form id="bulksearchform" method="post" action="bulk_edit_select.php">';
        $headersnull = array ('HostAccount', 'Vertical', 'Type', 'Country', 'Location', 'Language');
        array_push($headersnull, $Versionheader, $prheader, $daheader, $paheader, $managewpaccountheader, $themeheader, $wireframeheader, $registrarheader, $renewaldateheader, $researchedbyheader, $developerheader, $designerheader, $domdateboughtheader, $whoisrenewalheader, $domdatecompleteheader);
        $headers =  array_filter($headersnull);

        // loop through results of database query, displaying them in the table 
        for ($i = $start; $i < $end; $i++)
        {
                // make sure that PHP doesn't try to show results that don't exist
                if ($i == $total_results) { break; }
                mysqli_data_seek($result, $i);
                $row = mysqli_fetch_row($result);
                $filteredResult = array_intersect_key( $row, array_flip( $filterOutKeys ) );
                $d = $filteredResult[0];
                $ha = $filteredResult[1];
                $s = $filteredResult[7];
				$rd = $filteredResult[22];
				$db = $filteredResult[29];
				$wir = $filteredResult[45];
				$dc = $filteredResult[41];
                //Change Class of 'Status' to show correct color
                if ($s == 'Active'){
            		$statusclass = 'statusgreen';
            	}
            	elseif ($s == 'In Process'){
            		$statusclass = 'statusblue';
            	}
            	elseif ($s == 'Down'){
            		$statusclass = 'statusred';
            	}
                elseif ($s == 'Inactive'){
                    $statusclass = 'statusyellow';
                }
                elseif ($s == 'Researched'){
                    $statusclass = 'statusbrown';
                }
                // echo out the contents of each row into a table
                $domains = $filteredResult['0'];
				echo '<tr class="domainstatus"><td><input class="bulkcheckbox" type="checkbox" name='.$domains.' value='.$domains.'></td><td><a href="domain-accordion.php?DomainName='.$d.'&HostAccount='.$ha.'">'.$d.'</a></td><td class="'.$statusclass.'">'.$s.'</td></tr>';
				echo "<tr class='tablesheads'>";
				foreach ($headers as $name){
                    echo "<th>$name</th>";
                }
                echo "</tr>";
				$filterFinalkeys = array( '0', '7', '22', '29', '41', '45' );
				$filteredFinal = array_diff_key( $filteredResult, array_flip( $filterFinalkeys ) );
				echo "<tr class='domendtable'>";
                foreach ($filteredFinal as $val){
                    echo "<td>$val</td>";
                }
                if ($Versionheader != ''){
                    foreach ($Version as $key){
                        echo "<td>$key</td>";
                    }
                }
                if ($prheader != ''){
                    foreach ($PR as $key){
                        echo "<td>$key</td>";
                    }
                }
                if ($daheader != ''){
                    foreach ($DA as $key){
                        echo "<td>$key</td>";
                    }
                }
                if ($paheader != ''){
                    foreach ($PA as $key){
                        echo "<td>$key</td>";
                    }
                }
                if ($managewpaccountheader != ''){
                    foreach ($ManageWPAccount as $key){
                        echo "<td>$key</td>";
                    }
                }
                if ($themeheader != ''){
                    foreach ($Theme as $key){
                        echo "<td>$key</td>";
                    }
                }
                if ($wireframeheader != ''){
                    foreach ($Wireframe as $key){
                        echo "<td>$key</td>";
                    }
                }
                if ($registrarheader != ''){
                    foreach ($Registrar as $key){
                        echo "<td>$key</td>";
                    }
                }
                if ($renewaldateheader != ''){
                        echo "<td>$rd</td>";
                }
                if ($researchedbyheader != ''){
                    foreach ($ResearchedBy as $key){
                        echo "<td>$key</td>";
                    }
                }
                if ($designerheader != ''){
                    foreach ($Designer as $key){
                        echo "<td>$key</td>";
                    }
                }
                if ($developerheader != ''){
                    foreach ($Developer as $key){
                        echo "<td>$key</td>";
                    }
                }
				if ($domdateboughtheader != ''){
                        echo "<td>$db</td>";
                }
				if ($whoisrenewalheader != ''){
                        echo "<td>$wir</td>";
                }
				if ($domdatecompleteheader != ''){
                        echo "<td>$dc</td>";
                }
                
                echo "</tr>"; 
        }
        // close table>
        echo "<button>BULK EDIT</button>";
        echo "</form>";
        echo "</table>"; 
        echo "</div>";  
        echo "</div>";  
}
else {
    if($field == "HostDetails"){  
        //
        //Set DateBought Variables
        //
        if (isset($_GET['DateBought']))
        {
        	$DateBoughtcheck = "checked";
        	$DateBoughtheader = "DateBought";
            $DateBoughtvar = $_GET['DateBought'];
			$DateBought1var = $_GET['DateBought1'];
			$filterDateBought = "`DateBought` BETWEEN '" . $DateBoughtvar . "' AND '" . $DateBought1var . "' AND";
            $DateBoughttemparray = array("DateBought" => '&DateBought='.$DateBoughtvar.'');
            $filterurl = array_merge((array)$filterurl, (array)$DateBoughttemparray);
            $DateBought1temparray = array("DateBought1" => '&DateBought1='.$DateBought1var.'');
            $filterurl = array_merge((array)$filterurl, (array)$DateBought1temparray);
        }
        else
        {
        	$DateBoughtcheck = "";
        	$DateBoughtheader == null;
            $filterDateBought = '';
            $defaultDateBought = " OR (`DateBought` LIKE '%".$query."%')";
        }
        //
        //Set Host Account Variables
        //
        if (isset($_GET['HostAccount']))
        {
        	$HostAccountcheck = "checked";
            $HostAccountvar = $_GET['HostAccount'];
            $filterHostAccount = "`HostAccount`='" . $HostAccountvar . "' AND";
            $HostAccounttemparray = array("HostAccount" => '&HostAccount='.$HostAccountvar.'');
			$filterurl = array_merge((array)$filterurl, (array)$HostAccounttemparray);
        }
        else
        {
        	$HostAccountcheck = "";
            $filterHostAccount = '';
            $defaultHostAccount = " OR (`HostAccount` LIKE '%".$query."%')";
        }
        //
        //Set Email Variables
        //
        if (isset($_GET['Email']))
        {
        	$Emailcheck = "checked";
        	$Emailheader = "Email";
            $Emailvar = $_GET['Email'];
            $filterEmail = "`Email`='" . $Emailvar . "' AND";
            $Emailtemparray = array("Email" => '&Email='.$Emailvar.'');
			$filterurl = array_merge((array)$filterurl, (array)$Emailtemparray);
        }
        else
        {
        	$Emailcheck = "";
        	$Emailheader == null;
            $filterEmail = '';
            $defaultEmail = " OR (`Email` LIKE '%".$query."%')  ";
        }
        //
        //Set cPanelURL Variables
        //
        if (isset($_GET['cPanelURL']))
        {
        	$cPanelURLcheck = "checked";
            $cPanelURLvar = $_GET['cPanelURL'];
            $filtercPanelURL = "`cPanelURL`='" . $cPanelURLvar . "' AND";
            $cPanelURLtemparray = array("cPanelURL" => '&cPanelURL='.$cPanelURLvar.'');
			$filterurl = array_merge((array)$filterurl, (array)$cPanelURLtemparray);
        }
        else
        {
        	$cPanelURLcheck = "";
            $filtercPanelURL = '';
            $defaultcPanelURL = " OR (`cPanelURL` LIKE '%".$query."%')  ";
        }
        //
        //Set cPanelUser Variables
        //
        if (isset($_GET['cPanelUser']))
        {
        	$cPanelUsercheck = "checked";
            $cPanelUservar = $_GET['cPanelUser'];
            $filtercPanelUser = "`cPanelUser`='" . $cPanelUservar . "' AND";
            $cPanelUsertemparray = array("cPanelUser" => '&cPanelUser='.$cPanelUservar.'');
			$filterurl = array_merge((array)$filterurl, (array)$cPanelUsertemparray);
        }
        else
        {
        	$cPanelUsercheck = "";
            $filtercPanelUser = '';
            $defaultcPanelUser = " OR (`cPanelUser` LIKE '%".$query."%') ";
        }
        //
        //Set FTPUser Variables
        //
        if (isset($_GET['FTPUser']))
        {
        	$FTPUsercheck = "checked";
            $FTPUservar = $_GET['FTPUser'];
            $filterFTPUser = "`FTPUser`='" . $FTPUservar . "' AND";
            $FTPUsertemparray = array("FTPUser" => '&FTPUser='.$FTPUservar.'');
			$filterurl = array_merge((array)$filterurl, (array)$FTPUsertemparray);
        }
        else
        {
        	$FTPUsercheck = "";
            $filterFTPUser = '';
            $defaultFTPUser = " OR (`FTPUser` LIKE '%".$query."%') ";
        }
        //
        //Set RenewDate Variables
        //
        if (isset($_GET['RenewDate']))
        {
        	$RenewDatecheck = "checked";
        	$RenewDateheader = "RenewDate";
            $RenewDatevar = $_GET['RenewDate'];
			$RenewDate1var = $_GET['RenewDate1'];
			$filterRenewDate = "`RenewDate` BETWEEN '" . $RenewDatevar . "' AND '" . $RenewDate1var . "' AND";
            $RenewDatetemparray = array("RenewDate" => '&RenewDate='.$RenewDatevar.'');
			$filterurl = array_merge((array)$filterurl, (array)$RenewDatetemparray);
			$RenewDate1temparray = array("RenewDate1" => '&RenewDate1='.$RenewDate1var.'');
			$filterurl = array_merge((array)$filterurl, (array)$RenewDate1temparray);
        }
        else
        {
        	$RenewDatecheck = "";
        	$RenewDateheader == null;
            $filterRenewDate = '';
            $defaultRenewDate = " OR (`RenewDate` LIKE '%".$query."%') ";
        }
        //
        //Set HostNotes Variables
        //
        if (isset($_GET['HostNotes']))
        {
        	$HostNotescheck = "checked";
            $HostNotesvar = $_GET['HostNotes'];
            $filterHostNotes = "`HostNotes`='" . $HostNotesvar . "' AND ";
            $HostNotestemparray = array("HostAccount" => '&HostAccount='.$HostNotesvar.'');
			$filterurl = array_merge((array)$filterurl, (array)$HostNotestemparray);
        }
        else
        {
        	$HostNotescheck = "";
            $filterHostNotes = '';

        }
        //
        //Set Country Variables
        //
        if (isset($_GET['Country']))
        {
        	$Countrycheck = "checked";
            $Countryvar = $_GET['Country'];
            $filterCountry = "`Country`='" . $Countryvar . "' AND ";
            $Countrytemparray = array("Country" => '&Country='.$Countryvar.'');
			$filterurl = array_merge((array)$filterurl, (array)$Countrytemparray);
        }
        else
        {
        	$Countrycheck = "";
            $filterCountry = '';
            $defaultCountry = " OR (`Country` LIKE '%".$query."%') ";
        }
        //
        //Set ServerLocations Variables
        //
        if (isset($_GET['ServerLocations']))
        {
        	$ServerLocationscheck = "checked";
            $ServerLocationsvar = $_GET['ServerLocations'];
            $filterServerLocations = "`ServerLocations`='" . $ServerLocationsvar . "' AND ";
            $ServerLocationstemparray = array("ServerLocations" => '&ServerLocations='.$ServerLocationsvar.'');
			$filterurl = array_merge((array)$filterurl, (array)$ServerLocationstemparray);
        }
        else
        {
        	$ServerLocationscheck = "";
            $filterServerLocations = '';
            $defaultServerLocations = " OR (`ServerLocations` LIKE '%".$query."%') ";
        }
        $filterurlstring = implode("", $filterurl);
        /////////////////////////////////////
        //build Filter deletion system Host//
        /////////////////////////////////////
        $totalfilters = array('Country','ServerLocations','DateBought','DateBought1', 'HostAccount','Email','cPanelUser','FTPUser');
        foreach ($totalfilters as $filter){
        	if (isset($_GET[''.$filter.''])){
        		${"filteredout$filter"} = array(''.$filter.'');
        		${"Filterarray$filter"} = array_diff_key($filterurl, array_flip( ${"filteredout$filter"} ));
        		${"Filterstring$filter"} = implode("", ${"Filterarray$filter"});
        		${"Filter$filter"} = '<div class="redxdiv">'.$filter.' <a class="redx" href="search.php?query='.$query.'&field='.$field.''.${"Filterstring$filter"}.'"></a></div>';
        	}
        }
        if (isset($_GET['RenewDate'])){
        		$filteredoutRenewDate = array('RenewDate', 'RenewDate1');
        		$FilterarrayRenewDate = array_diff_key($filterurl, array_flip( $filteredoutRenewDate));
        		$FilterstringRenewDate = implode("", $FilterarrayRenewDate);
        		$FilterRenewDate = '<div class="redxdiv">RenewDate<a class="redx" href="search.php?query='.$query.'&field='.$field.''.$FilterstringRenewDate.'"></a></div>';
        }
        if (isset($_GET['DateBought'])){
        		$filteredoutDateBought = array('DateBought', 'DateBought1');
        		$FilterarrayDateBought = array_diff_key($filterurl, array_flip( $filteredoutDateBought));
        		$FilterstringDateBought = implode("", $FilterarrayDateBought);
        		$FilterDateBought = '<div class="redxdiv">DateBought<a class="redx" href="search.php?query='.$query.'&field='.$field.''.$FilterstringDateBought.'"></a></div>';
        }
        // figure out the total pages in the database
        $result = mysqli_query($mysqli, "SELECT * FROM HostDetails
			WHERE $filterDateBought $filterHostAccount $filterCountry $filterServerLocations $filterEmail $filtercPanelURL $filtercPanelUser $filterFTPUser $filterRenewDate $filterHostNotes 
                ((`HostNotes` LIKE '%".$query."%') $defaultHostAccount $defaultCountry $defaultServerLocations $defaultEmail $defaultcPanelURL $defaultcPanelUser $defaultFTPUser $defaultRenewDate)
            ");
                if (!$result) {
                printf("Error: %s\n", mysqli_error($mysqli));
                exit();
                }
                $DateBoughtdupe = array();
                $HostAccountdupe = array();
                $Emaildupe = array();
                $Countrydupe = array();
                $cPanelUserdupe = array();
                $FTPUserdupe = array();
                $RenewDatedupe = array();
                $ServerLocationsdupe = array();
            while($hostresults = mysqli_fetch_array($result)){
                $DateBoughtdupe[] = $hostresults['DateBought'];
                $HostAccountdupe[] = $hostresults['HostAccount'];
                $Emaildupe[] = $hostresults['Email'];
                $Countrydupe[] = $hostresults['Country'];
                $cPanelUserdupe[] = $hostresults['cPanelUser'];
                $FTPUserdupe[] = $hostresults['FTPUser'];
                $RenewDatedupe[] = $hostresults['RenewDate'];
                $ServerLocationsdupe[] = $hostresults['ServerLocations'];
            }
                $DateBoughtnull =  array_unique($DateBoughtdupe); $DateBought =  array_filter($DateBoughtnull); sort($DateBought);
				$DateBoughtnull1 =  array_unique($DateBoughtdupe); $DateBought1 =  array_filter($DateBoughtnull1); sort($DateBought1);
                $HostAccountnull =  array_unique($HostAccountdupe); $HostAccount =  array_filter($HostAccountnull); sort($HostAccount);
                $Email =  array_unique($Emaildupe); sort($Email);
                $Countrynull =  array_unique($Countrydupe); $Country =  array_filter($Countrynull); sort($Country);
                $cPanelUsernull =  array_unique($cPanelUserdupe); $cPanelUser =  array_filter($cPanelUsernull); sort($cPanelUser);
                $FTPUser =  array_unique($FTPUserdupe); sort($FTPUser);
                $RenewDatenull =  array_unique($RenewDatedupe); $RenewDate = array_filter($RenewDatenull); sort($RenewDate);
				$RenewDatenull1 =  array_unique($RenewDatedupe); $RenewDate1 = array_filter($RenewDatenull1); sort($RenewDate1);
                $ServerLocationsnull =  array_unique($ServerLocationsdupe); $ServerLocations = array_filter($ServerLocationsnull); sort($ServerLocations);
                
        $total_results = mysqli_num_rows($result);
        $total_pages = ceil($total_results / $per_page);
        $filterOutKeys = array('3', '4', '15', '16', '18', '19', '20', '21','22');
        // check if the 'page' variable is set in the URL (ex: view-paginated.php?page=1)
        if (isset($_GET['page']) && is_numeric($_GET['page']))
        {
                $show_page = $_GET['page'];
                
                // make sure the $show_page value is valid
                if ($show_page > 0 && $show_page <= $total_pages)
                {
                        $start = ($show_page -1) * $per_page;
                        $end = $start + $per_page;
                }
                else
                {
                        // error - show first set of results
                        $start = 0;
                        $end = $per_page;
                }               
        }
        else
        {
                // if page isn't set, show first set of results
                $start = 0;
                $end = $per_page; 
        }
        echo '<div class="hostsearchwrap">';
        ?>
        <div class="filterformdiv">
        <form id="hostfilterform" action="search.php?query=<?=$query?>&field=<?=$field?>" method="post">
        <div class="resultheader"><p>Total Results:</p><strong style="margin-left: 5px;"><?=$total_results?></strong><p>Search Results For:</p><h3><?=$dispquery?></h3></div>
        <input type="hidden" id="hostactionurl" name="search.php?query=<?=$query?>&field=<?=$field?>">
            <label for="cbCountry">Country</label><input <?=$Countrycheck;?> id="cbCountry" class="checkbox" type="checkbox" value="cbCountry">
                <div><select class="selectoptions" id="Country" name="Country">
                <option></option>
                <?php foreach ($Country as $temp){
                    echo '<option value="&Country='.$temp.'">'.$temp.'</option>';
                }?>
                </select></div>
            <label for="cbServerLocations">ServerLocations</label><input <?=$ServerLocationscheck;?> id="cbServerLocations" class="checkbox" type="checkbox" value="cbServerLocations">
                <div><select class="selectoptions" id="ServerLocations" name="ServerLocations">
                <option></option>
                <?php foreach ($ServerLocations as $temp){
                    echo '<option value="&ServerLocations='.$temp.'">'.$temp.'</option>';
                }?>
                </select></div>
                
            <label for="cbDateBought">DateBought</label><input <?=$DateBoughtcheck;?> id="cbDateBought" class="checkbox" type="checkbox" value="cbDateBought">
                <div><input class="Date selectoptions" type="text" name="DateBought" id="DateBought" />                   
                <input class="Date selectoptions" type="text" name="DateBought1" id="DateBought1" /></div>
                
            <label for="cbHostAccount">HostAccount</label><input <?=$HostAccountcheck;?> id="cbHostAccount" class="checkbox" type="checkbox" value="cbHostAccount">
                <div><select class="selectoptions" id="HostAccount" name="HostAccount">
                <option></option>
                <?php foreach ($HostAccount as $temp){
                    echo '<option value="&HostAccount='.$temp.'">'.$temp.'</option>';
                }?>
                </select></div>
            <label for="cbEmail">Email</label><input <?=$Emailcheck;?> id="cbEmail" class="checkbox" type="checkbox" value="cbEmail">
                <div><select class="selectoptions" id="hostEmail" name="Email">
                <option></option>
                <?php foreach ($Email as $temp){
                    echo '<option value="&Email='.$temp.'">'.$temp.'</option>';
                }?>
                </select></div>
            <label for="cbcPanelUser">cPanelUser</label><input <?=$cPanelUsercheck;?> id="cbcPanelUser" class="checkbox" type="checkbox" value="cbcPanelUser"> 
                <div><select class="selectoptions" id="hostcPanelUser" name="cPanelUser">
                <option></option>
                <?php foreach ($cPanelUser as $temp){
                    echo '<option value="&cPanelUser='.$temp.'">'.$temp.'</option>';
                }?>
                </select></div>
            <label for="cbFTPUser">FTPUser</label><input <?=$FTPUsercheck;?> id="cbFTPUser" class="checkbox" type="checkbox" value="cbFTPUser"> 
                <div><select class="selectoptions" id="hostFTPUser" name="FTPUser">
                <option></option>
                <?php foreach ($FTPUser as $temp){
                    echo '<option value="&FTPUser='.$temp.'">'.$temp.'</option>';
                }?>
                </select></div>
            <label for="cbRenewDate">RenewDate</label><input <?=$RenewDatecheck;?> id="cbRenewDate" class="checkbox" type="checkbox" value="cbRenewDate"> 
                <div><input class="Date selectoptions" type="text" name="hostRenewDate" id="hostRenewDate" />   
                <input class="Date selectoptions" type="text" name="hostRenewDate1" id="hostRenewDate1" />  </div>
                
        <p><input id="hostformsubmit" type="submit" value="Filter"/></p>
        </form>
        </div>
        <?php
        // display pagination
        $newquery = str_replace ("%", " ", $query);
        echo "<div class='searchcontainer'>";
        echo "<div id='resulthead'>";
        echo '<div class="resulthead"><a href="search.php?query='.$query.'&field='.$field.'">Remove All Filters?</a></div>';
        if ($_GET['showall'] == 'true'){
            echo "<div class='resulthead'><p>Showing All Results</p><p><a href='search.php?page=$i&query=$query&field=$field$filterurlstring'>Show Pagination</a></p></div>";
        } else {
            echo '<div class="resulthead"><a id="page_dropdown" href="javascript:void(0);">Show Pages</a></div>';
            echo '<ul class="dropdown">';
            for ($i = 1; $i <= $total_pages; $i++)
            {
                    echo "<li><a href='search.php?page=$i&query=$query&field=$field$filterurlstring'>$i</a></li>";
            }
            echo '</ul>';
            echo "<div class='resulthead'><a href='search.php?showall=true&query=$newquery&field=$field$filterurlstring'>Show All Results</a></div>";
        }
        echo "</div>";
        echo '<div class="filterp"><p>Filters:</p>';
        foreach ($totalfilters as $filter){
            if (isset(${"Filter$filter"})){echo ${"Filter$filter"};}
        }
        if (isset($FilterRenewDate)){echo $FilterRenewDate;}
        if (isset($FilterDateBought)){echo $FilterDateBought;}
                
        // display data in table
        echo '<table class="searchtable">';
        $headersnull = array ('Country', 'Server Locations', 'cPanel', 'FTP', 'Billing');
        array_push($headersnull, $DateBoughtheader, $Emailheader, $RenewDateheader);
        $headers =  array_filter($headersnull);

        // loop through results of database query, displaying them in the table 
        for ($i = $start; $i < $end; $i++)
        {
                // make sure that PHP doesn't try to show results that don't exist
                if ($i == $total_results) { break; }
                mysqli_data_seek($result, $i);
                $row = mysqli_fetch_row($result);
                $filteredResult = array_diff_key( $row, array_flip( $filterOutKeys ) );
                $ha = $filteredResult[0];
                $country = $filteredResult[5];
                $local = $filteredResult[6];
                $cpurl = $filteredResult[7];
                $cpu = $filteredResult[8];
                $cpp = $filteredResult[9];
                $ftph = $filteredResult[10];
                $ftpu = $filteredResult[11];
                $ftpp = $filteredResult[12];
                $billurl = $filteredResult[13];
                $billu = $filteredResult[14];
                $billp = $filteredResult[15];
				$dateb = $filteredResult[1];
				$renewd = $filteredResult[18];
                // echo out the contents of each row into a table
                echo '<tr class="hostaccounthead"><td><a href="host-accordion.php?HostAccount='.$ha.'">'.$ha.'</a></td></tr>';
                echo '<tr class="hosttableheads">';
                foreach ($headers as $name){
                	echo "<th>$name</th>";
                }
                echo "</tr>";
                echo '<tr class="hostrow1">';
                echo "<td>$country</td>";
                echo "<td>$local</td>";
                echo "<td><strong>URL:</strong> $cpurl</td>";
                echo "<td><strong>HOST:</strong> $ftph</td>";
                echo "<td><strong>URL:</strong> $billurl</td>";
                if ($DateBoughtheader != null){
                        echo "<td>$dateb</td>";                    
                }
                if ($Emailheader != null){
                    foreach ($Email as $key){
                        echo "<td>$key</td>";
                    }
                }
                if ($RenewDateheader != null){
                        echo "<td>$renewd</td>";                    
                }
                echo "</tr>";
                echo '<tr class="hostrow2">';
                echo "<td></td>";
                echo "<td></td>";
                echo "<td><strong>U/N:</strong> $cpu</td>";
                echo "<td><strong>U/N:</strong> $ftpu</td>";
                echo "<td><strong>U/N:</strong> $billu</td>";
                echo "</tr>";
                echo '<tr class="hostrow3">';
                echo "<td></td>";
                echo "<td></td>";
                echo "<td><strong>PW:</strong> $cpp</td>";
                echo "<td><strong>PW:</strong> $ftpp</td>";
                echo "<td><strong>PW:</strong> $billp</td>";
                echo "</tr>";

        }
        // close table>
        echo "</table>";  
 
        echo "</div>"; 
        echo "</div>";
        echo "</div>";
}
}
} else {?>
    <div id="notauthorized">
   <p>You are not authorized to access this page.</p>
   <a href="users/login.php">Please Login</a></div><?php
}
include 'footer.php';
?>
</div>
</body>
</html>