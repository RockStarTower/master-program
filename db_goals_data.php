<?php
include 'users/loginheader.php';
include 'header.php';

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$launch_goals = '{"us_english_automotive":"0","ca_english_automotive":"5","ca_french_automotive":"5","us_spanish_automotive":"0","au_english_automotive":"5","us_english1_automotive":"0","ca_english1_automotive":"2","ca_french1_automotive":"2","us_spanish1_automotive":"0","au_english1_automotive":"2","us_english_beauty_and_fashion":"0","ca_english_beauty_and_fashion":"5","ca_french_beauty_and_fashion":"2","us_spanish_beauty_and_fashion":"1","au_english_beauty_and_fashion":"4","us_english1_beauty_and_fashion":"0","ca_english1_beauty_and_fashion":"2","ca_french1_beauty_and_fashion":"1","us_spanish1_beauty_and_fashion":"1","au_english1_beauty_and_fashion":"1","us_english_business":"0","ca_english_business":"5","ca_french_business":"4","us_spanish_business":"1","au_english_business":"5","us_english1_business":"0","ca_english1_business":"2","ca_french1_business":"1","us_spanish1_business":"1","au_english1_business":"2","us_english_construction_and_contractors":"0","ca_english_construction_and_contractors":"3","ca_french_construction_and_contractors":"5","us_spanish_construction_and_contractors":"0","au_english_construction_and_contractors":"5","us_english1_construction_and_contractors":"0","ca_english1_construction_and_contractors":"2","ca_french1_construction_and_contractors":"2","us_spanish1_construction_and_contractors":"0","au_english1_construction_and_contractors":"2","us_english_dentist":"5","ca_english_dentist":"20","ca_french_dentist":"0","us_spanish_dentist":"0","au_english_dentist":"1","us_english1_dentist":"1","ca_english1_dentist":"7","ca_french1_dentist":"0","us_spanish1_dentist":"0","au_english1_dentist":"1","us_english_education_and_development":"5","ca_english_education_and_development":"5","ca_french_education_and_development":"0","us_spanish_education_and_development":"0","au_english_education_and_development":"0","us_english1_education_and_development":"2","ca_english1_education_and_development":"2","ca_french1_education_and_development":"0","us_spanish1_education_and_development":"0","au_english1_education_and_development":"0","us_english_entertainment":"18","ca_english_entertainment":"11","ca_french_entertainment":"4","us_spanish_entertainment":"1","au_english_entertainment":"4","us_english1_entertainment":"6","ca_english1_entertainment":"4","ca_french1_entertainment":"1","us_spanish1_entertainment":"1","au_english1_entertainment":"1","us_english_environmental":"10","ca_english_environmental":"13","ca_french_environmental":"0","us_spanish_environmental":"0","au_english_environmental":"0","us_english1_environmental":"3","ca_english1_environmental":"4","ca_french1_environmental":"0","us_spanish1_environmental":"0","au_english1_environmental":"0","us_english_finance_and_money":"16","ca_english_finance_and_money":"19","ca_french_finance_and_money":"0","us_spanish_finance_and_money":"0","au_english_finance_and_money":"0","us_english1_finance_and_money":"5","ca_english1_finance_and_money":"6","ca_french1_finance_and_money":"0","us_spanish1_finance_and_money":"0","au_english1_finance_and_money":"0","us_english_food_and_cooking":"5","ca_english_food_and_cooking":"19","ca_french_food_and_cooking":"2","us_spanish_food_and_cooking":"1","au_english_food_and_cooking":"5","us_english1_food_and_cooking":"2","ca_english1_food_and_cooking":"7","ca_french1_food_and_cooking":"1","us_spanish1_food_and_cooking":"1","au_english1_food_and_cooking":"2","us_english_government_and_politics":"1","ca_english_government_and_politics":"3","ca_french_government_and_politics":"0","us_spanish_government_and_politics":"0","au_english_government_and_politics":"0","us_english1_government_and_politics":"1","ca_english1_government_and_politics":"1","ca_french1_government_and_politics":"0","us_spanish1_government_and_politics":"0","au_english1_government_and_politics":"0","us_english_health_and_medical":"0","ca_english_health_and_medical":"5","ca_french_health_and_medical":"1","us_spanish_health_and_medical":"0","au_english_health_and_medical":"5","us_english1_health_and_medical":"0","ca_english1_health_and_medical":"2","ca_french1_health_and_medical":"1","us_spanish1_health_and_medical":"0","au_english1_health_and_medical":"2","us_english_home_and_garden":"5","ca_english_home_and_garden":"20","ca_french_home_and_garden":"1","us_spanish_home_and_garden":"0","au_english_home_and_garden":"5","us_english1_home_and_garden":"2","ca_english1_home_and_garden":"7","ca_french1_home_and_garden":"1","us_spanish1_home_and_garden":"0","au_english1_home_and_garden":"2","us_english_industrial_and_manufacturing":"9","ca_english_industrial_and_manufacturing":"10","ca_french_industrial_and_manufacturing":"2","us_spanish_industrial_and_manufacturing":"0","au_english_industrial_and_manufacturing":"9","us_english1_industrial_and_manufacturing":"3","ca_english1_industrial_and_manufacturing":"3","ca_french1_industrial_and_manufacturing":"1","us_spanish1_industrial_and_manufacturing":"0","au_english1_industrial_and_manufacturing":"3","us_english_insurance":"18","ca_english_insurance":"19","ca_french_insurance":"0","us_spanish_insurance":"0","au_english_insurance":"0","us_english1_insurance":"6","ca_english1_insurance":"7","ca_french1_insurance":"0","us_spanish1_insurance":"0","au_english1_insurance":"0","us_english_law":"0","ca_english_law":"5","ca_french_law":"3","us_spanish_law":"0","au_english_law":"5","us_english1_law":"0","ca_english1_law":"2","ca_french1_law":"1","us_spanish1_law":"0","au_english1_law":"2","us_english_miscellaneous":"0","ca_english_miscellaneous":"0","ca_french_miscellaneous":"0","us_spanish_miscellaneous":"0","au_english_miscellaneous":"0","us_english1_miscellaneous":"0","ca_english1_miscellaneous":"0","ca_french1_miscellaneous":"0","us_spanish1_miscellaneous":"0","au_english1_miscellaneous":"0","us_english_pets_and_animals":"4","ca_english_pets_and_animals":"10","ca_french_pets_and_animals":"2","us_spanish_pets_and_animals":"0","au_english_pets_and_animals":"5","us_english1_pets_and_animals":"1","ca_english1_pets_and_animals":"3","ca_french1_pets_and_animals":"1","us_spanish1_pets_and_animals":"0","au_english1_pets_and_animals":"2","us_english_real_estate":"11","ca_english_real_estate":"5","ca_french_real_estate":"0","us_spanish_real_estate":"0","au_english_real_estate":"1","us_english1_real_estate":"4","ca_english1_real_estate":"2","ca_french1_real_estate":"0","us_spanish1_real_estate":"0","au_english1_real_estate":"1","us_english_recreation_and_sports":"20","ca_english_recreation_and_sports":"20","ca_french_recreation_and_sports":"3","us_spanish_recreation_and_sports":"0","au_english_recreation_and_sports":"3","us_english1_recreation_and_sports":"7","ca_english1_recreation_and_sports":"7","ca_french1_recreation_and_sports":"1","us_spanish1_recreation_and_sports":"0","au_english1_recreation_and_sports":"1","us_english_relationships_and_family":"10","ca_english_relationships_and_family":"7","ca_french_relationships_and_family":"0","us_spanish_relationships_and_family":"1","au_english_relationships_and_family":"0","us_english1_relationships_and_family":"3","ca_english1_relationships_and_family":"2","ca_french1_relationships_and_family":"0","us_spanish1_relationships_and_family":"1","au_english1_relationships_and_family":"0","us_english_religion_and_spirituality":"2","ca_english_religion_and_spirituality":"1","ca_french_religion_and_spirituality":"0","us_spanish_religion_and_spirituality":"0","au_english_religion_and_spirituality":"0","us_english1_religion_and_spirituality":"1","ca_english1_religion_and_spirituality":"1","ca_french1_religion_and_spirituality":"0","us_spanish1_religion_and_spirituality":"0","au_english1_religion_and_spirituality":"0","us_english_shopping":"5","ca_english_shopping":"5","ca_french_shopping":"0","us_spanish_shopping":"0","au_english_shopping":"0","us_english1_shopping":"2","ca_english1_shopping":"2","ca_french1_shopping":"0","us_spanish1_shopping":"0","au_english1_shopping":"0","us_english_technology":"20","ca_english_technology":"20","ca_french_technology":"0","us_spanish_technology":"5","au_english_technology":"2","us_english1_technology":"7","ca_english1_technology":"7","ca_french1_technology":"0","us_spanish1_technology":"2","au_english1_technology":"1","us_english_travel":"16","ca_english_travel":"20","ca_french_travel":"1","us_spanish_travel":"0","au_english_travel":"5","us_english1_travel":"5","ca_english1_travel":"7","ca_french1_travel":"1","us_spanish1_travel":"0","au_english1_travel":"2"}';

$decode = json_decode($launch_goals);

$status = 'In Process';

function ampReplace($str) {
	$str = str_split($str);
	$counter = 0;
	foreach ($str as $char) {
		switch($char) {
			case ' ':
				$str[$counter] = '_';
				$counter ++;
				break;
			case '&':
				$str[$counter] = 'and';
				$counter ++;
				break;
			default:
				$counter ++;
				break;
		}
	}
	$str = implode($str);
	$str = strtolower($str);
        return $str;
}

class goals {
	
	private $launch_goals = [];
	private $combined_goals = [];
	private $set = [];
	private $domain_json = [];
	private $content_json = [];
	private $design_json = [];
	private $clone_json = [];
	private $dev_json = [];
	
	//Set launch goals and domains In Process array
	public function __construct($launch_goals, Array $set) {
		$this->launch_goals = json_decode($launch_goals, true);
		$this->set = $set;
	}
	//Create all goals
	public function create_goals() {
		$goals = [];
		//$steps is used as a foreach to dynamically create json variables
		$steps = array(
			'dev',
			'clone',
			'design',
			'content',
			'domain',
		);
		//$date_complete used in foreach to determine 
		$date_complete = array(
			'DevFinish',
			'CloneFinished',
			'DesignFinish',
			'ContentFinished',
			'DateBought',
		);
		//Turn launch goals into numerically indexed array
		$num_goals = array_values($this->launch_goals);
		//Count length of array for the for loop
		$count = count($num_goals);
		//For loop that goes half the length of lauch goals array to account for article and blog goals and add them
		for($i = 0; $i < $count/2; $i++) {			
			//Create index for blogs
			$index = ($i % 10 < 5) ? $i % 10 : ($i % 10)/2;
			//Create index for articles
			$mindex = ($index > 4) ? $index : $index + 5;
			//Get list of array keys
			$keys = array_keys($this->launch_goals);
			//Ternary operator to assign the correct array key in the iteration to add blog and article goals and put it in one array
			$key = ($i < 5) ? $keys[$i] :
				( (($i*2) % 10 == 2) ? $keys[($i * 2) - 1] : 
				( (($i*2) % 10 == 4) ? $keys[($i * 2) - 2] :
				( (($i*2) % 10 == 6) ? $keys[($i * 2) - 3] :
				( (($i*2) % 10 == 8) ? $keys[($i * 2) - 4] : $keys[$i * 2] ))));
			//Switch case for each of the 5 goal types 
			switch ($index) {
				case 0:
					$goals[$key] = $num_goals[$index] + $num_goals[$mindex];
					break;
				case 1:
					$goals[$key] = $num_goals[$index] + $num_goals[$mindex];
					break;
				case 2:
					$goals[$key] = $num_goals[$index] + $num_goals[$mindex];
					break;
				case 3:
					$goals[$key] = $num_goals[$index] + $num_goals[$mindex];
					break;
				case 4:
					$goals[$key] = $num_goals[$index] + $num_goals[$mindex];
					break;
			}
		}
		
		$this->combined_goals = $goals;
		
		$counter = 0;
		foreach($steps as $step) {		
			$in_step_arr = [];			
			//$check_arr gets an item pushed to it when it isn't in the current teams queue
			$check_arr = [];
			//$temp_combined creates temp array of combined goals to alter and create subsequent goals
			$temp_combined = $this->combined_goals;
			//default means that domains don't have a complete date before them, so they won't have anything in the database
				foreach ($this->set as $key => $val) {
					$type = $val['Country'] . ' ' . $val['Language'] . ' ' . $val['Vertical'];
					$lower_type = ampReplace($type);
					//Check which language and vert and add to arrays
					switch ($type) {
						case 'US English ' . $val['Vertical']:
							if ( $val[$date_complete[$counter]] != "0000-00-00") {
								if (in_array($lower_type, $check_arr)) {
									$in_step_arr[$lower_type] ++;
								} else {
									$in_step_arr[$lower_type] = 1;
									array_push($check_arr,$lower_type);
								}
							}
							break;
						case 'US Spanish ' . $val['Vertical']:
							if ( $val[$date_complete[$counter]] != "0000-00-00") {
								if (in_array($lower_type, $check_arr)) {
									$in_step_arr[$lower_type] ++;
								} else {
									$in_step_arr[$lower_type] = 1;
									array_push($check_arr,$lower_type);
								}
							}
							break;
						case 'CA English ' . $val['Vertical']:
							if ( $val[$date_complete[$counter]] != "0000-00-00") {
								if (in_array($lower_type, $check_arr)) {
									$in_step_arr[$lower_type] ++;
								} else {
									$in_step_arr[$lower_type] = 1;
									array_push($check_arr,$lower_type);
								}
							}
							break;
						case 'CA French ' . $val['Vertical']:
							if ( $val[$date_complete[$counter]] != "0000-00-00") {
								if (in_array($lower_type, $check_arr)) {
									$in_step_arr[$lower_type] ++;
								} else {
									$in_step_arr[$lower_type] = 1;
									array_push($check_arr,$lower_type);
								}
							}
							break;
						case 'AU English ' . $val['Vertical']:
							if ( $val[$date_complete[$counter]] != "0000-00-00") {
								if (in_array($lower_type, $check_arr)) {
									$in_step_arr[$lower_type] ++;
								} else {
									$in_step_arr[$lower_type] = 1;
									array_push($check_arr,$lower_type);
								}
							}
							break;
					}					
				}				
			$in_step_keys = array_keys($in_step_arr);
			$combined_keys = array_keys($temp_combined);
			//Subtract what is in current teams queue from the launch goals
			//$in_step_keys = array_keys($in_step_arr);	
			foreach ($in_step_keys as $val) {				
				if (in_array($val, $combined_keys)) {
					$temp_combined[$val] = $temp_combined[$val] - $in_step_arr[$val];
					//echo $in_step_arr[$val] . '<br />';
					//echo $temp_combined[$val] . '<br />';
				}
			}
			//echo $counter . "\n";
			//print_r($temp_combined) ."\n";
			//Create json for each step
			$this->{$step . '_json'} = json_encode($temp_combined);
			$this->combined_goals = $temp_combined;
			$counter ++;
		}
		
		echo $this->dev_json . "\n";
		echo $this->clone_json . "\n";
		echo $this->design_json . "\n";
		echo $this->content_json . "\n";
		echo $this->domain_json . "\n";
		
		/*
		$mysqli = new mysqli(DB_HOST, DB_NAME, DB_PASS, DB_USER);

		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
		
		$db_goals = "INSERT INTO Goals (Domains, Content, Design, Clone, Dev, QA) VALUES ('$this->domain_json','$this->content_json','$this->design_json','$this->clone_json','$this->dev_json','$this->qa_json')";
		
		if ($result = $mysqli->query($db_goals)) {
			echo $step . ' goals were created successfully!';
			$result->free();
		}
		
		$mysqli->close();
		*/
	}
	
	/*
	[0] => Array ( 
		[ResearchedBy] => Dalai Llama 
		[BoughtBy] => 
		[DateBought] => 01/15/2014 
		[Writer] => 
		[ContentStart] => 
		[ContentFinished] => 
		[ContentHours] => 0.00 
		[Designer] => 
		[DesignStart] => 
		[DesignFinish] => 
		[Developer] => 
		[DevStart] => 
		[DevFinish] => 
		[QAInspector] => 
		[DateComplete] => 
		[Cloner] => 
		[CloneFinished] => 
	)
	*/
}

//$query = "SELECT * FROM DomainDetails WHERE Status='" . $status . "'";
//
//if ($result = $mysqli->query($query)) {
//
//    /* fetch associative array */
//    for ($set = array (); $row = $result->fetch_assoc(); $set[] = $row);
//	//print_r($set);
//	$goals_class = new goals($launch_goals, $set);
//	$goals_class->create_goals();
//
//    /* free result set */
//    $result->free();
//}
//
//$mysqli->close();

$steps = array(
	'dev',
	'clone',
	'design',
	'content',
	'domain',
);
//$date_complete used in foreach to determine 
$date_complete = array(
	'DevFinish',
	'CloneFinished',
	'DesignFinish',
	'ContentFinished',
	'DateBought',
);

$results = mysqli_query($mysqli, "SELECT * FROM DomainDetails WHERE Status='In Process'");
	$rows = mysqli_num_rows($results);
	for ($i = 0; $i < $rows; $i++){
	mysqli_data_seek($results, $i);
	$domain_data = mysqli_fetch_assoc($results);
	$content_inprocess = 0;
	$design_inprocess = 0;
	$support_inprocess = 0;
	$dev_inprocess = 0;
	$qa_inprocess = 0;
	if (strtotime($domain_data['DateBought']) == true && strtotime($domain_data['ContentFinished']) == false && strtotime($domain_data['DesignFinish']) == false && strtotime($domain_data['CloneFinished']) == false && strtotime($domain_data['DevFinish']) == false && strtotime($domain_data['Writer']) == false){
		$content_inprocess += 1;
		switch ($domain_data['Country']) {
			case 'US':
				switch ($domain_data['Language']) {
					case 'English':
						$varname = 'us_english_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
					case 'French':
						$varname = 'us_french_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
					case 'Spanish':
						$varname = 'us_spanish_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
				}
				break;
			case 'CA':
				switch ($domain_data['Language']) {
					case 'English':
						$varname = 'ca_english_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
					case 'French':
						$varname = 'ca_french_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
					case 'Spanish':
						$varname = 'ca_spanish_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
				}
				break;
			case 'AU':
				switch ($domain_data['Language']) {
					case 'English':
						$varname = 'au_english_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
					case 'French':
						$varname = 'au_french_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
					case 'Spanish':
						$varname = 'au_spanish_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
				}
				break;
		}
	}
	if (strtotime($domain_data['ContentFinished']) == true && strtotime($domain_data['DesignFinish']) == false && strtotime($domain_data['CloneFinished']) == false && strtotime($domain_data['DevFinish']) == false  && strtotime($domain_data['Designer']) == false){
		$design_inprocess += 1;
		switch ($domain_data['Country']) {
			case 'US':
				switch ($domain_data['Language']) {
					case 'English':
						$varname = 'us_english_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
					case 'French':
						$varname = 'us_french_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
					case 'Spanish':
						$varname = 'us_spanish_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
				}
				break;
			case 'CA':
				switch ($domain_data['Language']) {
					case 'English':
						$varname = 'ca_english_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
					case 'French':
						$varname = 'ca_french_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
					case 'Spanish':
						$varname = 'ca_spanish_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
				}
				break;
			case 'AU':
				switch ($domain_data['Language']) {
					case 'English':
						$varname = 'au_english_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
					case 'French':
						$varname = 'au_french_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
					case 'Spanish':
						$varname = 'au_spanish_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
				}
				break;
		}
	}
	if (strtotime($domain_data['DesignFinish']) == true && strtotime($domain_data['CloneFinished']) == false && strtotime($domain_data['DevFinish']) == false  && strtotime($domain_data['Cloner']) == false){
		$support_inprocess += 1;
		switch ($domain_data['Country']) {
			case 'US':
				switch ($domain_data['Language']) {
					case 'English':
						$varname = 'us_english_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
					case 'French':
						$varname = 'us_french_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
					case 'Spanish':
						$varname = 'us_spanish_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
				}
				break;
			case 'CA':
				switch ($domain_data['Language']) {
					case 'English':
						$varname = 'ca_english_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
					case 'French':
						$varname = 'ca_french_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
					case 'Spanish':
						$varname = 'ca_spanish_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
				}
				break;
			case 'AU':
				switch ($domain_data['Language']) {
					case 'English':
						$varname = 'au_english_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
					case 'French':
						$varname = 'au_french_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
					case 'Spanish':
						$varname = 'au_spanish_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
				}
				break;
		}
	}
	if (strtotime($domain_data['CloneFinished']) == true && strtotime($domain_data['DevFinish']) == false  && strtotime($domain_data['Developer']) == false){
		$dev_inprocess += 1;
		switch ($domain_data['Country']) {
			case 'US':
				switch ($domain_data['Language']) {
					case 'English':
						$varname = 'us_english_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
					case 'French':
						$varname = 'us_french_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
					case 'Spanish':
						$varname = 'us_spanish_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
				}
				break;
			case 'CA':
				switch ($domain_data['Language']) {
					case 'English':
						$varname = 'ca_english_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
					case 'French':
						$varname = 'ca_french_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
					case 'Spanish':
						$varname = 'ca_spanish_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
				}
				break;
			case 'AU':
				switch ($domain_data['Language']) {
					case 'English':
						$varname = 'au_english_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
					case 'French':
						$varname = 'au_french_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
					case 'Spanish':
						$varname = 'au_spanish_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
				}
				break;
		}
	}
	if (strtotime($domain_data['DevFinish']) == true && strtotime($domain_data['QAInspector']) == false){
		$qa_inprocess += 1;
		switch ($domain_data['Country']) {
			case 'US':
				switch ($domain_data['Language']) {
					case 'English':
						$varname = 'us_english_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
					case 'French':
						$varname = 'us_french_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
					case 'Spanish':
						$varname = 'us_spanish_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
				}
				break;
			case 'CA':
				switch ($domain_data['Language']) {
					case 'English':
						$varname = 'ca_english_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
					case 'French':
						$varname = 'ca_french_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
					case 'Spanish':
						$varname = 'ca_spanish_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
				}
				break;
			case 'AU':
				switch ($domain_data['Language']) {
					case 'English':
						$varname = 'au_english_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
					case 'French':
						$varname = 'au_french_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
					case 'Spanish':
						$varname = 'au_spanish_'.trim($domain_data['Vertical']);
						$$varname = (int)$$varname + 1;
						echo $$varname;
						break;
				}
				break;
		}
	}
}

//print_r(json_decode($launch_goals, true));

?>