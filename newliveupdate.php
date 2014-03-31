<?php
include("users/loginheader.php");
$mon = date('m');
$year = date('Y');
$day = date('d');
$fulldate = $year.'-'.$mon.'-'.$day;
$curDate = date("Y-m-d");
$curMonth = date('m');
$curYear = date('Y');
$beginWeek = date('d', strtotime('last sunday'));
$endWeek = date('d', strtotime('this saturday'));
$weekBegin = $curYear . '-' . $curMonth . '-' . $beginWeek;
$weekEnd = $curYear . '-' . $curMonth . '-' . $endWeek;
$monthBegin = $curYear . '-' . $curMonth . '-01';
$monthEnd = $curYear . '-' . $curMonth . '-31';
$USEnglishBlogDay = $USEnglishBlogWeek = $USEnglishBlogMonth = $USEnglishBlogAll = 0; 
$USEnglishArtDay = $USEnglishArtWeek = $USEnglishArtMonth = $USEnglishArtAll = 0;
$USEnglishGeoDay = $USEnglishGeoWeek = $USEnglishGeoMonth = $USEnglishGeoAll = 0;
$USSpanishBlogDay = $USSpanishBlogWeek = $USSpanishBlogMonth = $USSpanishBlogAll = 0;
$USSpanishArtDay = $USSpanishArtWeek = $USSpanishArtMonth = $USSpanishArtAll = 0;
$USSpanishGeoDay = $USSpanishGeoWeek = $USSpanishGeoMonth = $USSpanishGeoAll = 0;
$CAEnglishBlogDay = $CAEnglishBlogWeek = $CAEnglishBlogMonth = $CAEnglishBlogAll = 0;
$CAEnglishArtDay = $CAEnglishArtWeek = $CAEnglishArtMonth = $CAEnglishArtAll = 0;
$CAEnglishGeoDay = $CAEnglishGeoWeek = $CAEnglishGeoMonth = $CAEnglishGeoAll = 0;
$CAFrenchBlogDay = $CAFrenchBlogWeek = $CAFrenchBlogMonth = $CAFrenchBlogAll = 0;
$CAFrenchArtDay = $CAFrenchArtWeek = $CAFrenchArtMonth = $CAFrenchArtAll = 0;
$CAFrenchGeoDay = $CAFrenchGeoWeek = $CAFrenchGeoMonth = $CAFrenchGeoAll = 0;
$AUBlogDay = $AUBlogWeek = $AUBlogMonth = $AUBlogAll = 0;
$AUArtDay = $AUArtWeek = $AUArtMonth = $AUArtAll = 0;
$AUGeoDay = $AUGeoWeek = $AUGeoMonth = $AUGeoAll = 0;

$results = mysqli_query($mysqli, "SELECT * FROM `DomainDetails` WHERE `DateComplete`!='0000-00-00'");
$rows = mysqli_num_rows($results);
for ($i = 0; $i < $rows; $i++){
	mysqli_data_seek($results, $i);
	$domain_data = mysqli_fetch_assoc($results);
	if ($domain_data['Country'] == 'US'){
		if ($domain_data['Language'] == 'English'){
			if ($domain_data['Type'] == 'Blog'){ 
				if ($domain_data['DateComplete'] == $curDate){
					$USEnglishBlogDay++;	
					$USEnglishBlogWeek++; 
					$USEnglishBlogMonth++;
					$USEnglishBlogAll++;
				}
				elseif ($domain_data['DateComplete'] >= $weekBegin && $domain_data['DateComplete'] <= $weekEnd){
					$USEnglishBlogWeek++; 
					$USEnglishBlogMonth++;
					$USEnglishBlogAll++;
				}
				elseif ($domain_data['DateComplete'] >= $monthBegin && $domain_data['DateComplete'] <= $monthEnd){
		  			$USEnglishBlogMonth++;
					$USEnglishBlogAll++;
		  		}
		  		else {
		  			$USEnglishBlogAll++;
		  		}
		  	}	
			elseif ($domain_data['Type'] == 'Article') {
				if ($domain_data['DateComplete'] == $curDate) {
					$USEnglishArtDay++;	
					$USEnglishArtWeek++; 
					$USEnglishArtMonth++;
					$USEnglishArtAll++;
				}
				elseif ($domain_data['DateComplete'] >= $weekBegin && $domain_data['DateComplete'] <= $weekEnd) {
					$USEnglishArtWeek++; 
					$USEnglishArtMonth++;
					$USEnglishArtAll++;
				}
				elseif ($domain_data['DateComplete'] >= $monthBegin && $domain_data['DateComplete'] <= $monthEnd) {
		  			$USEnglishArtMonth++;
					$USEnglishArtAll++;
		  		}
		  		else {
		  			$USEnglishArtAll++;
		  		}
			}
			elseif ($domain_data['Type'] == 'Geo-Based') {
				if ($domain_data['DateComplete'] == $curDate) {
					$USEnglishGeoDay++;	
					$USEnglishGeoWeek++; 
					$USEnglishGeoMonth++;
					$USEnglishGeoAll++;
				}
				elseif ($domain_data['DateComplete'] >= $weekBegin && $domain_data['DateComplete'] <= $weekEnd) {
					$USEnglishGeoWeek++; 
					$USEnglishGeoMonth++;
					$USEnglishGeoAll++;
				}
				elseif ($domain_data['DateComplete'] >= $monthBegin && $domain_data['DateComplete'] <= $monthEnd) {
		  			$USEnglishGeoMonth++;
					$USEnglishGeoAll++;
		  		}
		  		else {
		  			$USEnglishGeoAll++;
		  		}
			}
		}
		elseif ($domain_data['Language'] == 'Spanish') {
			if ($domain_data['Type'] == 'Blog') { 
				if ($domain_data['DateComplete'] == $curDate) {
					$USSpanishBlogDay++;	
					$USSpanishBlogWeek++; 
					$USSpanishBlogMonth++;
					$USSpanishBlogAll++;
				}
				elseif ($domain_data['DateComplete'] >= $weekBegin && $domain_data['DateComplete'] <= $weekEnd) {
					$USSpanishBlogWeek++; 
					$USSpanishBlogMonth++;
					$USSpanishBlogAll++;
				}
				elseif ($domain_data['DateComplete'] >= $monthBegin && $domain_data['DateComplete'] <= $monthEnd) {
		  			$USSpanishBlogMonth++;
					$USSpanishBlogAll++;
		  		}
		  		else {
		  			$USSpanishBlogAll++;
		  		}
		  	}	
			elseif ($domain_data['Type'] == 'Article') {
				if ($domain_data['DateComplete'] == $curDate) {
					$USSpanishArtDay++;	
					$USSpanishArtWeek++; 
					$USSpanishArtMonth++;
					$USSpanishArtAll++;
				}
				elseif ($domain_data['DateComplete'] >= $weekBegin && $domain_data['DateComplete'] <= $weekEnd) {
					$USSpanishArtWeek++; 
					$USSpanishArtMonth++;
					$USSpanishArtAll++;
				}
				elseif ($domain_data['DateComplete'] >= $monthBegin && $domain_data['DateComplete'] <= $monthEnd) {
		  			$USSpanishArtMonth++;
					$USSpanishArtAll++;
		  		}
		  		else {
		  			$USSpanishArtAll++;
		  		}
			}
			elseif ($domain_data['Type'] == 'Geo-Based') {
				if ($domain_data['DateComplete'] == $curDate) {
					$USSpanishGeoDay++;	
					$USSpanishGeoWeek++; 
					$USSpanishGeoMonth++;
					$USSpanishGeoAll++;
				}
				elseif ($domain_data['DateComplete'] >= $weekBegin && $domain_data['DateComplete'] <= $weekEnd) {
					$USSpanishGeoWeek++; 
					$USSpanishGeoMonth++;
					$USSpanishGeoAll++;
				}
				elseif ($domain_data['DateComplete'] >= $monthBegin && $domain_data['DateComplete'] <= $monthEnd) {
		  			$USSpanishGeoMonth++;
					$USSpanishGeoAll++;
		  		}
		  		else {
		  			$USSpanishGeoAll++;
		  		}
			}	
		}	
	}
		elseif ($domain_data['Country'] == 'CA'){
			if ($domain_data['Language'] == 'English') {
				if ($domain_data['Type'] == 'Blog') { 
					if ($domain_data['DateComplete'] == $curDate) {
						$CAEnglishBlogDay++;	
						$CAEnglishBlogWeek++; 
						$CAEnglishBlogMonth++;
						$CAEnglishBlogAll++;
					}
					elseif ($domain_data['DateComplete'] >= $weekBegin && $domain_data['DateComplete'] <= $weekEnd) {
						$CAEnglishBlogWeek++; 
						$CAEnglishBlogMonth++;
						$CAEnglishBlogAll++;
					}
					elseif ($domain_data['DateComplete'] >= $monthBegin && $domain_data['DateComplete'] <= $monthEnd) {
		  				$CAEnglishBlogMonth++;
						$CAEnglishBlogAll++;
		  			}
		  			else {
		  				$CAEnglishBlogAll++;
		  			}
		 	 	}	
				elseif ($domain_data['Type'] == 'Article') {
					if ($domain_data['DateComplete'] == $curDate) {
						$CAEnglishArtDay++;	
						$CAEnglishArtWeek++; 
						$CAEnglishArtMonth++;
						$CAEnglishArtAll++;
					}
					elseif ($domain_data['DateComplete'] >= $weekBegin && $domain_data['DateComplete'] <= $weekEnd) {
						$CAEnglishArtWeek++; 
						$CAEnglishArtMonth++;
						$CAEnglishArtAll++;
					}
					elseif ($domain_data['DateComplete'] >= $monthBegin && $domain_data['DateComplete'] <= $monthEnd) {
		  				$CAEnglishArtMonth++;
						$CAEnglishArtAll++;
		  			}
		  			else {
		  				$CAEnglishArtAll++;
		  			}
				}
				elseif ($domain_data['Type'] == 'Geo-Based') {
					if 	($domain_data['DateComplete'] == $curDate) {
						$CAEnglishGeoDay++;	
						$CAEnglishGeoWeek++; 
						$CAEnglishGeoMonth++;
						$CAEnglishGeoAll++;
					}
					elseif ($domain_data['DateComplete'] >= $weekBegin && $domain_data['DateComplete'] <= $weekEnd) {
						$CAEnglishGeoWeek++; 
						$CAEnglishGeoMonth++;
						$CAEnglishGeoAll++;
					}
					elseif ($domain_data['DateComplete'] >= $monthBegin && $domain_data['DateComplete'] <= $monthEnd) {
		  				$CAEnglishGeoMonth++;
						$CAEnglishGeoAll++;
		  			}
		  			else {
		  				$CAEnglishGeoAll++;
		  			}
				}
			}	
			if ($domain_data['Language'] == 'French') {
				if ($domain_data['Type'] == 'Blog') { 
					if ($domain_data['DateComplete'] == $curDate) {
						$CAFrenchBlogDay++;	
						$CAFrenchBlogWeek++; 
						$CAFrenchBlogMonth++;
						$CAFrenchBlogAll++;
					}
					elseif ($domain_data['DateComplete'] >= $weekBegin && $domain_data['DateComplete'] <= $weekEnd) {
						$CAFrenchBlogWeek++; 
						$CAFrenchBlogMonth++;
						$CAFrenchBlogAll++;
					}
					elseif ($domain_data['DateComplete'] >= $monthBegin && $domain_data['DateComplete'] <= $monthEnd) {
		  				$CAFrenchBlogMonth++;
						$CAFrenchBlogAll++;
		  			}
		  			else {
		  				$CAFrenchBlogAll++;
		  			}
		  		}	
				elseif ($domain_data['Type'] == 'Article') {
					if ($domain_data['DateComplete'] == $curDate) {
						$CAFrenchArtDay++;	
						$CAFrenchArtWeek++; 
						$CAFrenchArtMonth++;
						$CAFrenchArtAll++;
					}
					elseif ($domain_data['DateComplete'] >= $weekBegin && $domain_data['DateComplete'] <= $weekEnd) {
						$CAFrenchArtWeek++; 
						$CAFrenchArtMonth++;
						$CAFrenchArtAll++;
					}
					elseif ($domain_data['DateComplete'] >= $monthBegin && $domain_data['DateComplete'] <= $monthEnd) {
		  				$CAFrenchArtMonth++;
						$CAFrenchArtAll++;
		  			}
		  			else {
		  				$CAFrenchArtAll++;
		  			}
				}
				elseif ($domain_data['Type'] == 'Geo-Based') {
					if ($domain_data['DateComplete'] == $curDate) {
						$CAFrenchGeoDay++;	
						$CAFrenchGeoWeek++; 
						$CAFrenchGeoMonth++;
						$CAFrenchGeoAll++;
					}
					elseif ($domain_data['DateComplete'] >= $weekBegin && $domain_data['DateComplete'] <= $weekEnd) {
						$CAFrenchGeoWeek++; 
						$CAFrenchGeoMonth++;
						$CAFrenchGeoAll++;
					}
					elseif ($domain_data['DateComplete'] >= $monthBegin && $domain_data['DateComplete'] <= $monthEnd) {
		  				$CAFrenchGeoMonth++;
						$CAFrenchGeoAll++;
		  			}
		  			else {
		  				$CAFrenchGeoAll++;
		  			}
				}	
			}
		}			
		elseif ($domain_data['Country'] == 'AU'){
			if ($domain_data['Language'] == 'English') {
				if ($domain_data['Type'] == 'Blog') { 
					if ($domain_data['DateComplete'] == $curDate) {
						$AUBlogDay++;	
						$AUBlogWeek++; 
						$AUBlogMonth++;
						$AUBlogAll++;
					}
					elseif ($domain_data['DateComplete'] >= $weekBegin && $domain_data['DateComplete'] <= $weekEnd) {
						$AUBlogWeek++; 
						$AUBlogMonth++;
						$AUBlogAll++;
					}
					elseif ($domain_data['DateComplete'] >= $monthBegin && $domain_data['DateComplete'] <= $monthEnd) {
		  				$AUBlogMonth++;
						$AUBlogAll++;
		  			}
		  			else {
		  				$AUBlogAll++;
		  			}
		 	 	}	
				elseif ($domain_data['Type'] == 'Article') {
					if ($domain_data['DateComplete'] == $curDate) {
						$AUArtDay++;	
						$AUArtWeek++; 
						$AUArtMonth++;
						$AUArtAll++;
					}
					elseif ($domain_data['DateComplete'] >= $weekBegin && $domain_data['DateComplete'] <= $weekEnd) {
						$AUArtWeek++; 
						$AUArtMonth++;
						$AUArtAll++;
					}
					elseif ($domain_data['DateComplete'] >= $monthBegin && $domain_data['DateComplete'] <= $monthEnd) {
		  				$AUArtMonth++;
						$AUArtAll++;
		  			}
		  			else {
		  				$AUArtAll++;
		  			}
				}
				
				elseif ($domain_data['Type'] == 'Geo-Based') {
					if 	($domain_data['DateComplete'] == $curDate) {
						$AUGeoDay++;	
						$AUGeoWeek++; 
						$AUGeoMonth++;
						$AUGeoAll++;
					}
					elseif ($domain_data['DateComplete'] >= $weekBegin && $domain_data['DateComplete'] <= $weekEnd) {
						$AUGeoWeek++; 
						$AUGeoMonth++;
						$AUGeoAll++;
					}
					elseif ($domain_data['DateComplete'] >= $monthBegin && $domain_data['DateComplete'] <= $monthEnd) {
		  				$AUGeoMonth++;
						$AUGeoAll++;
		  			}
		  			else {
		  				$AUGeoAll++;
		  			}
				}
			}
		}
	}					
 ?>
	<div class = "liveupdatecontainer">
	<table class="liveupdate" >
			<tbody>
			<tr>
				<th><h2>Blogs</h2></th>
				<th><h2>Day</h2></th>
				<th><h2>Week</h2></th>
				<th><h2>Month</h2></th>
				<th><h2>All Time</h2></th>
			</tr>		
			<tr>
				<td>US-English</td>
				<td><?=$USEnglishBlogDay;?></td>
				<td><?=$USEnglishBlogWeek;?></td>
				<td><?=$USEnglishBlogMonth;?></td>
				<td><?=$USEnglishBlogAll;?></td>
			</tr>
			<tr>
				<td>CA-English</td>
				<td><?=$CAEnglishBlogDay;?></td>
				<td><?=$CAEnglishBlogWeek;?></td>
				<td><?=$CAEnglishBlogMonth;?></td>
				<td><?=$CAEnglishBlogAll;?></td>
			</tr>
			<tr>
				<td>CA-French</td>
				<td><?=$CAFrenchBlogDay;?></td>
				<td><?=$CAFrenchBlogWeek;?></td>
				<td><?=$CAFrenchBlogMonth;?></td>
				<td><?=$CAFrenchBlogAll;?></td>
			</tr>
			<tr>
				<td>US-Spanish</td>
				<td><?=$USSpanishBlogDay;?></td>
				<td><?=$USSpanishBlogWeek;?></td>
				<td><?=$USSpanishBlogMonth;?></td>
				<td><?=$USSpanishBlogAll;?></td>
			</tr>
			<tr>
				<td>AU-English</td>
				<td><?=$AUBlogDay;?></td>
				<td><?=$AUBlogWeek;?></td>
				<td><?=$AUBlogMonth;?></td>
				<td><?=$AUBlogAll;?></td>
			</tr>
		</tbody>
		</table>
	</br>
		<table class="liveupdate" >
			<tbody>
			<tr>
				<th><h2>Articles</h2></th>
				<th><h2>Day</h2></th>
				<th><h2>Week</h2></th>
				<th><h2>Month</h2></th>
				<th><h2>All Time</h2></th>
			</tr>		
			<tr>
				<td>US-English</td>
				<td><?=$USEnglishArtDay;?></td>
				<td><?=$USEnglishArtWeek;?></td>
				<td><?=$USEnglishArtMonth;?></td>
				<td><?=$USEnglishArtAll;?></td>
			</tr>
			<tr>
				<td>CA-English</td>
				<td><?=$CAEnglishArtDay;?></td>
				<td><?=$CAEnglishArtWeek;?></td>
				<td><?=$CAEnglishArtMonth;?></td>
				<td><?=$CAEnglishArtAll;?></td>
			</tr>
			<tr>
				<td>CA-French</td>
				<td><?=$CAFrenchArtDay;?></td>
				<td><?=$CAFrenchArtWeek;?></td>
				<td><?=$CAFrenchArtMonth;?></td>
				<td><?=$CAFrenchArtAll;?></td>
			</tr>
			<tr>
				<td>US-Spanish</td>
				<td><?=$USSpanishArtDay;?></td>
				<td><?=$USSpanishArtWeek;?></td>
				<td><?=$USSpanishArtMonth;?></td>
				<td><?=$USSpanishArtAll;?></td>
			</tr>
			<tr>
				<td>AU-English</td>
				<td><?=$AUArtDay;?></td>
				<td><?=$AUArtWeek;?></td>
				<td><?=$AUArtMonth;?></td>
				<td><?=$AUArtAll;?></td>
			</tr>
		</tbody>
		</table>
	</br>
	<table class="liveupdate" >
			<tbody>
			<tr>
				<th><h2>Geo</h2></th>
				<th><h2>Day</h2></th>
				<th><h2>Week</h2></th>
				<th><h2>Month</h2></th>
				<th><h2>All Time</h2></th>
			</tr>
			<tr>
				<td>US-English</td>
				<td><?=$USEnglishGeoDay;?></td>
				<td><?=$USEnglishGeoWeek;?></td>
				<td><?=$USEnglishGeoMonth;?></td>
				<td><?=$USEnglishGeoAll;?></td>
			</tr>
			<tr>
				<td>CA-English</td>
				<td><?=$CAEnglishGeoDay;?></td>
				<td><?=$CAEnglishGeoWeek;?></td>
				<td><?=$CAEnglishGeoMonth;?></td>
				<td><?=$CAEnglishGeoAll;?></td>
			</tr>
			<tr>
				<td>CA-French</td>
				<td><?=$CAFrenchGeoDay;?></td>
				<td><?=$CAFrenchGeoWeek;?></td>
				<td><?=$CAFrenchGeoMonth;?></td>
				<td><?=$CAFrenchGeoAll;?></td>
			</tr>
			<tr>
				<td>US-Spanish</td>
				<td><?=$USSpanishGeoDay;?></td>
				<td><?=$USSpanishGeoWeek;?></td>
				<td><?=$USSpanishGeoMonth;?></td>
				<td><?=$USSpanishGeoAll;?></td>
			</tr>
			<tr>
				<td>AU-English</td>
				<td><?=$AUGeoDay;?></td>
				<td><?=$AUGeoWeek;?></td>
				<td><?=$AUGeoMonth;?></td>
				<td><?=$AUGeoAll;?></td>
			</tr>
			</tbody>
	</table>
	</div>
	