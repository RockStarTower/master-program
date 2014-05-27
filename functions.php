<?php
function HostAccountList() {
	$con = new mysqli('localhost', 'root', 'root', 'ecoabsor_master');
	if (mysqli_connect_errno())	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
		
	$query = "SELECT HostAccount FROM HostDetails ORDER BY HostAccount ASC";
	$result = mysqli_query($con,$query);
	if (!$result){
		die('Error: ' . mysqli_error($con));
	}
	
	$hosts = array();
	$index = 0;
	echo '<ul class="dropdown">';
	while ($row = mysqli_fetch_array($result)) {
		$HostAccount = $row['HostAccount'];
        echo '<li><a href="javascript::void(0);">' . $HostAccount . '</a></li>';
    }
	echo '</ul>';
	mysqli_free_result($result);
	
}

function HostAccountDropdownList() {
	$con = new mysqli('localhost', 'root', 'root', 'ecoabsor_master');
	if (mysqli_connect_errno())	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
		
	$query = "SELECT HostAccount FROM HostDetails ORDER BY HostAccount ASC";
	$result = mysqli_query($con,$query);
	if (!$result){
		die('Error: ' . mysqli_error($con));
	}
	
	$hosts = array();
	$index = 0;
	//echo '<ul class="dropdown">';
	while ($row = mysqli_fetch_array($result)) {
		$HostAccount = $row['HostAccount'];
        //echo '<li><a href="javascript::void(0);">' . $HostAccount . '</a></li>';
		echo '<option>' . $HostAccount . '</option>';
    }
	//echo '</ul>';
	echo '</select>';
	mysqli_free_result($result);
	
}

function autocompleteHostAccountList() {
	$con = new mysqli('localhost', 'root', 'root', 'ecoabsor_master');
	if (mysqli_connect_errno())	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
		
	$query = "SELECT HostAccount FROM HostDetails ORDER BY HostAccount ASC";
	$result = mysqli_query($con,$query);
	if (!$result){
		die('Error: ' . mysqli_error($con));
	}
	
	$hosts = array();
	$index = 0;
	echo '$(function() {
    var hostAccountList = [';
	while ($row = mysqli_fetch_array($result)) {
		$HostAccount = $row['HostAccount'];
        echo '"' . $HostAccount . '",';
    }
	echo '];
		$( ".HostAccount" ).autocomplete({
		  source: hostAccountList,
            minLength: 0
		}).bind("focus", function(){            
            $(this).autocomplete("search");
        });
	});' . "\n";
	mysqli_free_result($result);
	
}

function autocompleteVerticalList() {
	echo '$(function() {
    var vertList = [';
	echo '"Accident & Personal Injury Attorneys",';
	echo '"Accountants",';
	echo '"Agricultural",';
	echo '"Agricultural Equipment & Supplies",';
	echo '"Appeal Attorneys",';
	echo '"Appliance Sales",';
	echo '"Appliance Services",';
	echo '"Art Galleries & Dealers",';
	echo '"Arts & Entertainment",';
	echo '"Audio Visual",';
	echo '"Auto Accessories",';
	echo '"Auto Body & Paint",';
	echo '"Auto Dealers",';
	echo '"Auto Insurance",';
	echo '"Auto Parts",';
	echo '"Auto Service",';
	echo '"Automotive",';
	echo '"Bakeries",';
	echo '"Bankruptcy Attorneys",';
	echo '"Beauty & Fashion",';
	echo '"Beauty Schools",';
	echo '"Business",';
	echo '"Business Attorneys",';
	echo '"Camping",';
	echo '"Car Wash & Auto Detailing",';
	echo '"Child Care",';
	echo '"Child Education",';
	echo '"Chiropractors",';
	echo '"Cleaning Services",';
	echo '"Clothing & Accessories",';
	echo '"Colleges & Universities",';
	echo '"Commercial Insurance",';
	echo '"Computer Services",';
	echo '"Concrete Contractors",';
	echo '"Construction & Contractors",';
	echo '"Consulting",';
	echo '"Cosmetics & Hygiene",';
	echo '"Counseling",';
	echo '"Crafts & Hobbies",';
	echo '"Criminal Attorneys",';
	echo '"Damage Contractors",';
	echo '"Dentist",';
	echo '"Doors",';
	echo '"Education & Development",';
	echo '"Educational Books & Supplies",';
	echo '"Electricians",';
	echo '"Electronics",';
	echo '"Emergency Care",';
	echo '"Energy",';
	echo '"Energy & Environment",';
	echo '"Entertainers",';
	echo '"Events",';
	echo '"Exercise",';
	echo '"Extreme Sports",';
	echo '"Family & Divorce Attorneys",';
	echo '"Fence Contractors",';
	echo '"Financial Planning",';
	echo '"Finance & Money",';
	echo '"Florists",';
	echo '"Food & Cooking",';
	echo '"Food Services",';
	echo '"Food Suppliers",';
	echo '"Funeral Homes",';
	echo '"Furniture",';
	echo '"Garage Doors",';
	echo '"Garden Equipment & Supplies",';
	echo '"General Attorneys",';
	echo '"General Contractors",';
	echo '"Glass",';
	echo '"Government & Politics",';
	echo '"Hair & Skin Care",';
	echo '"Health & Medical ",';
	echo '"Health Care Clinics",';
	echo '"Heavy Construction Equipment",';
	echo '"Home & Garden",';
	echo '"Home Insurance",';
	echo '"Home Health Care",';
	echo '"Hotels & Lodging",';
	echo '"HVAC Contractors",';
	echo '"Industrial & Manufacturing",';
	echo '"Industrial Equipment & Supplies",';
	echo '"Insurance",';
	echo '"Interior Design",';
	echo '"Internet Service Providers",';
	echo '"Immigration Attorneys",';
	echo '"Jewelry",';
	echo '"K-12 Education",';
	echo '"Landscape",';
	echo '"Law",';
	echo '"Life Insurance",';
	echo '"Loans & Financing",';
	echo '"Locks, Keys, & Safes",';
	echo '"Marketing",';
	echo '"Medical Equipment & Supplies",';
	echo '"Medical Insurance",';
	echo '"Message",';
	echo '"Miscellaneous",';
	echo '"Mobile Windshield Repair",';
	echo '"Motor Sports & Accessories",';
	echo '"Money Services",';
	echo '"Movies & Theaters",';
	echo '"Moving & Storage",';
	echo '"Music",';
	echo '"N/A",';
	echo '"Natural Health Care",';
	echo '"Nightlife",';
	echo '"Novels & Stories",';
	echo '"Nursing Homes & Assisted Living",';
	echo '"Online Marketing",';
	echo '"Opticians & Optical Goods",';
	echo '"Optometrists",';
	echo '"Painters & Wallpaper Hangers",';
	echo '"Party Planners",';
	echo '"Paving Contractors",';
	echo '"Pest Control",';
	echo '"Pet Day Care & Boarding",';
	echo '"Pet Stores & Supplies",';
	echo '"Pet Training",';
	echo '"Pets",';
	echo '"Phone Service",';
	echo '"Photography",';
	echo '"Plumbers",';
	echo '"Podiatrists",';
	echo '"Pool Contractors",';
	echo '"Primary Care",';
	echo '"Printing Services",';
	echo '"Private Lessons",';
	echo '"Processing & Manufacturing",';
	echo '"Real Estate",';
	echo '"Real Estate Agents & Brokers",';
	echo '"Real Estate Attorneys",';
	echo '"Recreation & Sports",';
	echo '"Recycling",';
	echo '"Relationships & Family",';
	echo '"Religion & Spirituality",';
	echo '"Religious Goods",';
	echo '"Religious Organization",';
	echo '"Religious School",';
	echo '"Remodeling Contractors",';
	echo '"Repair & Restoration",';
	echo '"Restaurants",';
	echo '"Roofers",';
	echo '"Sanitation",';
	echo '"Security",';
	echo '"Security Systems",';
	echo '"Shopping",';
	echo '"Signs",';
	echo '"Spas & Salons",';
	echo '"Specialty Foods",';
	echo '"Sports & Sporting Goods",';
	echo '"Tax Services",';
	echo '"Technology",';
	echo '"Telephones",';
	echo '"Timeshares",';
	echo '"Tires & Wheels",';
	echo '"Towing Services",';
	echo '"Trade Schools",';
	echo '"Transportation",';
	echo '"Travel & Tourism",';
	echo '"Travel Agencies",';
	echo '"Tree Service",';
	echo '"TV Service",';
	echo '"Veterinarians",';
	echo '"Wedding",';
	echo '"Windows",';
	echo '];
		$( ".Vertical" ).autocomplete({
		  source: vertList,
            minLength: 0
		}).bind("focus", function(){            
            $(this).autocomplete("search");
        });
	});' . "\n";
}

function autocompleteTypeList() {
	echo '$(function() {
    var typeList = [';
	echo '"Blog",';
	echo '"Article",';
	echo '"Geo-Based",';
	echo '"Duplicate",';
	echo '"Clone",';
	echo '"Boost Use",';
	echo '"Employee Sandbox",';
	echo '"Marketing",';
	echo '"Client Blog",';
	echo '];
		$( ".Type" ).autocomplete({
		  source: typeList,
            minLength: 0
		}).bind("focus", function(){            
            $(this).autocomplete("search");
        });
	});' . "\n";
}

function autocompleteCountryList() {
	echo '$(function() {
    var countryList = [';
	echo '"US/CA",';
	echo '"US",';
	echo '"CA",';
	echo '"AU",';
	echo '];
		$( ".Country" ).autocomplete({
		  source: countryList,
            minLength: 0
		}).bind("focus", function(){            
            $(this).autocomplete("search");
        });
	});' . "\n";
}

function autocompleteStatusList() {
	echo '$(function() {
    var statusList = [';
	echo '"Active",';
	echo '"Inactive",';
	echo '"In Process",';
	echo '"Down",';
	echo '"Researched",';
	echo '"De-indexed",';
	echo '"Retired",';
	echo '];
		$( ".Status" ).autocomplete({
		  source: statusList,
            minLength: 0
		}).bind("focus", function(){            
            $(this).autocomplete("search");
        });
	});' . "\n";
}

function autocompleteLanguageList() {
	echo '$(function() {
    var languageList = [';
	echo '"English",';
	echo '"French",';
	echo '"Spanish",';
	echo '];
		$( ".Language" ).autocomplete({
		  source: languageList,
            minLength: 0
		}).bind("focus", function(){            
            $(this).autocomplete("search");
        });
	});' . "\n";
}

function autocompleteManageWPList() {
	$con = new mysqli('localhost', 'root', 'root', 'ecoabsor_master');
	if (mysqli_connect_errno())	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
		
	$query = "SELECT DISTINCT ManageWPAccount FROM DomainDetails ORDER BY ManageWPAccount ASC";
	$result = mysqli_query($con,$query);
	if (!$result){
		die('Error: ' . mysqli_error($con));
	}
	
	echo '$(function() {
    var manageList = [';
	while ($row = mysqli_fetch_array($result)) {
		$ManageWPAccount = $row['ManageWPAccount'];
        echo '"' . $ManageWPAccount . '",';
    }
	echo '];
		$( ".ManageWPAccount" ).autocomplete({
		  source: manageList,
            minLength: 0
		}).bind("focus", function(){            
            $(this).autocomplete("search");
        });
	});' . "\n";
	mysqli_free_result($result);
	
}

function autocompleteRegistrarList() {
	$con = new mysqli('localhost', 'root', 'root', 'ecoabsor_master');
	if (mysqli_connect_errno())	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
		
	$query = "SELECT DISTINCT Registrar FROM DomainDetails ORDER BY Registrar ASC";
	$result = mysqli_query($con,$query);
	if (!$result){
		die('Error: ' . mysqli_error($con));
	}
	
	echo '$(function() {
    var registrarList = [';
	while ($row = mysqli_fetch_array($result)) {
		$Registrar = $row['Registrar'];
        echo '"' . $Registrar . '",';
    }
	echo '];
		$( ".Registrar" ).autocomplete({
		  source: registrarList,
            minLength: 0
		}).bind("focus", function(){            
            $(this).autocomplete("search");
        });
	});' . "\n";
	mysqli_free_result($result);
	
}

function versionList() {
	echo '
		<select class="Version">
			<option>1.0</option>
			<option>2.0</option>
			<option>3.0</option>
		</select>
	';
}

function convertedList() {
	echo '
		<select class="Converted">
			<option>Yes</option>
			<option>No</option>
		</select>
	';
}

function RegistrarList() {
	$con = new mysqli('localhost', 'root', 'root', 'ecoabsor_master');
	if (mysqli_connect_errno())	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
		
	$query = "SELECT DISTINCT Registrar FROM DomainDetails ORDER BY Registrar ASC";
	$result = mysqli_query($con,$query);
	if (!$result){
		die('Error: ' . mysqli_error($con));
	}
	
	echo '<ul class="dropdown">';
	while ($row = mysqli_fetch_array($result)) {
		$Registrar = $row['Registrar'];
        echo '<li><a href="javascript::void(0);">' . $Registrar . '</a></li>';
    }
	echo '</ul>';
	mysqli_free_result($result);
	
}

function ManageWPList() {
	$con = new mysqli('localhost', 'root', 'root', 'ecoabsor_master');
	if (mysqli_connect_errno())	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
		
	$query = "SELECT DISTINCT ManageWPAccount FROM DomainDetails ORDER BY ManageWPAccount ASC";
	$result = mysqli_query($con,$query);
	if (!$result){
		die('Error: ' . mysqli_error($con));
	}
	
	echo '<ul class="dropdown">';
	while ($row = mysqli_fetch_array($result)) {
		$ManageWPAccount = $row['ManageWPAccount'];
        echo '<li><a href="javascript::void(0);">' . $ManageWPAccount . '</a></li>';
    }
	echo '</ul>';
	mysqli_free_result($result);
	
}

function SQL_Connect() {
	$con = new mysqli('localhost', 'ecoabsor_master', 'B00st3r!', 'ecoabsor_master');
	if (mysqli_connect_errno())	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	return $con;
}

function quote() {
$random = rand(1, 100);

$quotes = array(
'<span class="quote">"Never tell me the odds!"</span>',
'<span class="quote">"Well, you said you wanted to be around when I made a mistake." "I take it back!"</span>',
'<span class="quote">"You do have your moments. Not many, but you have them."</span>',
'<span class="quote">"I know."</span>',
'<span class="quote">"Ben! I can be a Jedi. Ben, tell him I&#39;m ready!" (Thumps head on ceiling.) "Ow!"</span>',
'<span class="quote">"I&#39;m not afraid."</span>',
'<span class="quote">"You will be."</span>',
'<span class="quote">"Now, witness the power of this fully operational battle station."</span>',
'<span class="quote">"Scoundrel. I like that."</span>',
'<span class="quote">"I have a bad feeling about this."</span>',
'<span class="quote">"Hmm! Adventure. Hmmpf! Excitement. A Jedi craves not these things."</span>',
'<span class="quote">"Who&#39;s the more foolish; the fool, or the fool who follows him?"</span>',
'<span class="quote">"That is why you fail."</span>',
'<span class="quote">"It&#39;s worse."</span>',
'<span class="quote">"That&#39;s no moon."</span>',
'<span class="quote">"Sorry about the mess."</span>',
'<span class="quote">"Ready are you? What know you of ready? For eight hundred years have I trained Jedi. My own counsel will I keep on who is to be trained. A Jedi must have the deepest commitment, the most serious mind. This one, a long time have I watched. All his life has he looked away to the future, to the horizon. Never his mind on where he was. Hmm? On what he was doing."</span>',
'<span class="quote">"If they follow standard Imperial procedure, they&#39;ll dump their garbage before they go to light-speed. Then we just float away." "With the rest of the garbage."</span>',
'<span class="quote">"Laugh it up, fuzzball!"</span>',
'<span class="quote">"I never doubted you! Wonderful!"</span>',
'<span class="quote">"You will never find a more wretched hive of scum and villainy. We must be cautious."</span>',
'<span class="quote">"Would somebody get this big walking carpet out of my way?!"</span>',
'<span class="quote">"No reward is worth this."</span>',
'<span class="quote">"I happen to like nice men."</span>',
'<span class="quote">"We would be honored if you would join us."</span>',
'<span class="quote">"So what I told you was true from a certain point of view." "A certain point of view?!"</span>',
'<span class="quote">"Your weapon you will not need it."</span>',
'<span class="quote">"Boring conversation anyway. Luke! We&#39;re gonna have company!"</span>',
'<span class="quote">"I think I just blasted it."</span>',
'<span class="quote">"That&#39;s not true."</span>',
'<span class="quote">"That&#39;s impossible."</span>',
'<span class="quote">"Search your feelings."</span>',
'<span class="quote">"I&#39;ll never join you."</span>',
'<span class="quote">"He certainly has courage." "...Yeah, but what good is that if he gets himself killed?"</span>',
'<span class="quote">"You&#39;ve failed, your highness. I am a Jedi, as my father was before me." "So be it, Jedi."</span>',
'<span class="quote">"Only at the end do you realize the power of the Dark Side."</span>',
'<span class="quote">"It&#39;s not impossible. I used to bullseye womp rats in my T-16 back home, they&#39;re not much bigger than two meters."</span>',
'<span class="quote">"Awww! But I was going into Tosche Station to pick up some power converters!!!"</span>',
'<span class="quote">"IT&#39;S A TRAP."</span>',
'<span class="quote">"But how could they be jamming us if they don&#39;t know that we&#39;re coming?"</span>',
'<span class="quote">"He is as clumsy as he is stupid!"</span>',
'<span class="quote">"Strike me down, and I will become more powerful than you could possibly imagine."</span>',
'<span class="quote">"STAY ON TARGET."</span>',
'<span class="quote">"It&#39;s not fair! They promised me they fixed it! It&#39;s not my fault!"</span>',
'<span class="quote">"You know, that little droid is going to cause me a lot of trouble." "Oh, he excels at that, sir."</span>',
'<span class="quote">"If you&#39;re saying that coming here was a bad idea, I&#39;m starting to agree with you."</span>',
'<span class="quote">"For over a thousand generations, the Jedi were the guardians of peace and justice in the Old Republic &#8212; before the dark times. Before the Empire."</span>',
'<span class="quote">"Shut him up or shut him down."</span>',
'<span class="quote">"Give yourself to the Dark Side. It is the only way you can save your friends. Yes; your thoughts betray you. Your feelings for them are strong. Especially for your sister. So, you have a twin sister. Your feelings have now betrayed her too. Obi-Wan was wise to hide her from me. Now, his failure is complete. If you will not turn to the Dark Side then perhaps she will"</span>',
'<span class="quote">"I find your lack of faith disturbing."</span>',
'<span class="quote">"Uh, we had a slight weapons malfunction, but uh everything&#39;s perfectly all right now. We&#39;re fine. We&#39;re all fine here now, thank you." (Winces.) "Uh, how are you?"</span>',
'<span class="quote">"You are a member of the rebel alliance, and a traitor."</span>',
'<span class="quote">"The circle is now complete."</span>',
'<span class="quote">"Hey, I think my eyes are getting better. Instead of a big dark blur, I see a big bright blur." "There&#39;s nothing to see. I used to live here, you know." "You&#39;re gonna die here, you know. Convenient."</span>',
'<span class="quote">"Why, you stuck up, half-witted, scruffy-looking Nerf herder."</span>',
'<span class="quote">"Ungh. And I thought they smelled bad on the outside."</span>',
'<span class="quote">"Would it help if I got out and pushed?!!" "...It might!″</span>',
'<span class="quote">"You don&#39;t have to do this to impress me."</span>',
'<span class="quote">"Try not. Do or do not. There is no try."</span>',
'<span class="quote">"Luminous beings are we, not this crude matter."</span>',
'<span class="quote">"All too easy."</span>',
'<span class="quote">"How you doin&#39;, Chewbecca? Still hanging around with this loser?"</span>',
'<span class="quote">"I assure you, Lord Vader. My men are working as fast as they can." "Perhaps I can find new ways to motivate them."</span>',
'<span class="quote">"Apology accepted, Captain Needa."</span>',
'<span class="quote">"You&#39;ll find I&#39;m full of surprises!"</span>',
'<span class="quote">"Yeah you&#39;re a real hero."</span>',
'<span class="quote">"A Jedi Knight? Jeez, I&#39;m out of it for a little while, everyone gets delusions of grandeur!"</span>',
'<span class="quote">"I&#39;m Luke Skywalker? I&#39;m here to rescue you!" "You&#39;re who?"</span>',
'<span class="quote">"Everything is proceeding as I have foreseen."</span>',
'<span class="quote">"Bounty hunters! We don&#39;t need this scum."</span>',
'<span class="quote">"Boba Fett? Boba Fett? Where?"</span>',
'<span class="quote">"Keep your distance, Chewie, but don&#39;t, y&#39;know, look like you&#39;re keeping your distance." (Grumbled questioning bark.) "I don&#39;t know. Fly casual."</span>',
'<span class="quote">"What have you done?! I&#39;m BACKWARDS."</span>',
'<span class="quote">"You will find that it is you who are mistaken about a great many things."</span>',
'<span class="quote">"Only a master of evil, Darth."</span>',
'<span class="quote">"We seem to be made to suffer. It&#39;s our lot in life."</span>',
'<span class="quote">"We have &#8212; ungh! &#8212; powerful friends. You&#39;re going to regret this." "I&#39;m sure."</span>',
'<span class="quote">"It&#39;s against my programming to impersonate a deity."</span>',
'<span class="quote">"These aren&#39;t the droids you&#39;re looking for."</span>',
'<span class="quote">"Aren&#39;t you a little short for a Stormtrooper?"</span>',
'<span class="quote">"Wait. I know that laugh"</span>',
'<span class="quote">"This is some rescue!"</span>',
'<span class="quote">"He&#39;s the brains, sweetheart!"</span>',
'<span class="quote">"You are unwise to lower your defenses!"</span>',
'<span class="quote">"Boy, it&#39;s lucky you have these compartments!"</span>',
'<span class="quote">"Travelling through hyperspace ain&#39;t like dustin&#39; crops, boy!"</span>',
'<span class="quote">"They&#39;re getting closer." "Oh yeah? Watch this." (Long pause &#8212; the engine sputters and dies.)</span>',
'<span class="quote">Dialogue-less: Luke stares moodily at the two setting suns.</span>',
'<span class="quote">"Great, kid. Don&#39;t get cocky."</span>',
'<span class="quote">"You would prefer another target? A military target? Then name the system!"</span>',
'<span class="quote">"R2-D2, you know better than to trust a strange computer!"</span>',
'<span class="quote">"Luke, you switched off your targeting computer &#8212; what&#39;s wrong?" "Nothing! I&#39;m all right."</span>',
'<span class="quote">"So, what do you think? You think a princess and a guy like me–"</span>',
'<span class="quote">"I want them alive &#8212; no disintegrations!"</span>',
'<span class="quote">"I&#39;ve just made a deal that will keep the Empire out of here forever."</span>',
'<span class="quote">"I have you now!"</span>',
'<span class="quote">"I saw a city in the clouds."</span>',
'<span class="quote">"Told you I did. Reckless is he. Now, matters are worse."</span>',
'<span class="quote">"That boy is our last hope."</span>',
'<span class="quote">"No. There is another."</span>',
);

echo $quotes[$random];

}

function HostAccountCode() {
	$con = new mysqli('localhost', 'root', 'root', 'ecoabsor_master');
	if (mysqli_connect_errno())	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
		
	$query = "SELECT HostAccount FROM HostDetails ORDER BY HostAccount ASC";
	$result = mysqli_query($con,$query);
	if (!$result){
		die('Error: ' . mysqli_error($con));
	}
	
	$hosts = array();
	$index = 0;
	$host_code = '<ul class="dropdown">';
	while ($row = mysqli_fetch_array($result)) {
		$HostAccount = $row['HostAccount'];
        $host_code .= '<li><a href="javascript::void(0);">' . $HostAccount . '</a></li>';
    }
	$host_code .= '</ul>';
	mysqli_free_result($result);
	return $host_code;
}

function RegistrarCode() {
	$con = new mysqli('localhost', 'root', 'root', 'ecoabsor_master');
	if (mysqli_connect_errno())	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
		
	$query = "SELECT DISTINCT Registrar FROM DomainDetails ORDER BY Registrar ASC";
	$result = mysqli_query($con,$query);
	if (!$result){
		die('Error: ' . mysqli_error($con));
	}
	
	$registrar_code =  '<ul class="dropdown">';
	while ($row = mysqli_fetch_array($result)) {
		$Registrar = $row['Registrar'];
        $registrar_code .= '<li><a href="javascript::void(0);">' . $Registrar . '</a></li>';
    }
	$registrar_code .= '</ul>';
	mysqli_free_result($result);
	return $registrar_code;
}

function ManageWPCode() {
	$con = new mysqli('localhost', 'root', 'root', 'ecoabsor_master');
	if (mysqli_connect_errno())	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
		
	$query = "SELECT DISTINCT ManageWPAccount FROM DomainDetails ORDER BY ManageWPAccount ASC";
	$result = mysqli_query($con,$query);
	if (!$result){
		die('Error: ' . mysqli_error($con));
	}
	
	$manage_code = '<ul class="dropdown">';
	while ($row = mysqli_fetch_array($result)) {
		$ManageWPAccount = $row['ManageWPAccount'];
        $manage_code .= '<li><a href="javascript::void(0);">' . $ManageWPAccount . '</a></li>';
    }
	$manage_code .= '</ul>';
	mysqli_free_result($result);
	return $manage_code;
}

function dropdown($field, $value, $counter) {
	
	$vert_drop = '<input class="select '.$field.'" type="text" name="' . $field . $counter . '" value="' . $value .'" autocomplete="off" />';
	$status_drop = '<input class="select '.$field.'" type="text" name="' . $field . $counter . '" value="' . $value .'" autocomplete="off" />';
	$version_drop = ($value == 'n/a' 
		? '<select class="select '.$field.'" type="text" name="' . $field . $counter . '">
			<option selected="selected">n/a</option>
			<option>1.0</option>
			<option>2.0</option>
			<option>3.0</option>
		</select>' 
		: ($value == '1.0'
		? '<select class="select '.$field.'" type="text" name="' . $field . $counter . '">
			<option>n/a</option>
			<option selected="selected">1.0</option>
			<option>2.0</option>
			<option>3.0</option>
		</select>'
		: ($value == '2.0'
		? '<select class="select '.$field.'" type="text" name="' . $field . $counter . '">
			<option>n/a</option>
			<option>1.0</option>
			<option selected="selected">2.0</option>
			<option>3.0</option>
		</select>'
		: ($value == '3.0'
		? '<select class="select '.$field.'" type="text" name="' . $field . $counter . '">
			<option>n/a</option>
			<option>1.0</option>
			<option>2.0</option>
			<option selected="selected">3.0</option>
		</select>'
		: '<select class="select '.$field.'" type="text" name="' . $field . $counter . '">
			<option>n/a</option>
			<option>1.0</option>
			<option>2.0</option>
			<option>3.0</option>
		</select>'))));
	$type_drop = '<input class="select '.$field.'" type="text" name="' . $field . $counter . '" value="' . $value .'" autocomplete="off" />';
	$conv_drop = ($value == 'n/a' 
		? '<select class="select '.$field.'" type="text" name="' . $field . $counter . '" >
			<option selected="selected">n/a</option>
			<option>Yes</option>
			<option>No</option>
		</select>'
		: ($value == 'Yes' 
		? '<select class="select '.$field.'" type="text" name="' . $field . $counter . '" >
			<option>n/a</option>
			<option selected="selected">Yes</option>
			<option>No</option>
		</select>'
		: ($value == 'No' 
		? '<select class="select '.$field.'" type="text" name="' . $field . $counter . '" >
			<option>n/a</option>
			<option>Yes</option>
			<option selected="selected">No</option>
		</select>'
		: '<select class="select '.$field.'" type="text" name="' . $field . $counter . '" >
			<option>n/a</option>
			<option>Yes</option>
			<option>No</option>
		</select>')));
	$host_drop = '<input class="select '.$field.'" type="text" name="' . $field . $counter . '" value="' . $value .'" autocomplete="off" />';
	$country_drop = '<input class="select '.$field.'" type="text" name="' . $field . $counter . '" value="' . $value .'" autocomplete="off" />';
	$date_drop = '<input class="Date '.$field.'" type="text" name="' . $field . $counter . '" value="' . $value .'" />';
	$lang_drop = '<input class="select '.$field.'" type="text" name="' . $field . $counter . '" value="' . $value .'" autocomplete="off" />';
	$pr_drop = '<input class="select '.$field.'" type="text" name="' . $field . $counter . '" value="' . $value .'" autocomplete="off" />';
	$manage_drop = '<input class="select '.$field.'" type="text" name="' . $field . $counter . '" value="' . $value .'" autocomplete="off" />';
	$wire_drop = '<input class="select '.$field.'" type="text" name="' . $field . $counter . '" value="' . $value .'" autocomplete="off" />
	<ul id="Wireframe" class="dropdown" style="display: none;">';
	$registrar_drop = '<input class="select '.$field.'" type="text" name="' . $field . $counter . '" value="' . $value .'" autocomplete="off" />';
	$add = '<input class="add '.$field.'" type="text" name="' . $field . $counter . '" value="' . $value .'" />';
	$total = '<input class="TotalCost '.$field.'" type="text" name="' . $field . $counter . '" value="' . $value .'" />';
	$default = '<input type="text" class="'.$field.'" name="' . $field . $counter . '" value="' . $value .'" />';
	$domain = '<p class="'.$field.'" name="' . $field . $counter . '" value="' . $value .'">'.$value.'</p><input type="hidden" class="'.$field.'" name="' . $field . $counter . '" value="' . $value .'">';

	$fieldArr = array(
	'Domain' => $domain,
	'Location' => $default,
	'PA' => $default,
	'Theme' => $default,
	'DBHost' => $default,
	'Writer' => $default,
	'DesignStart' => $default,
	'QAInspector' => $default,
	'BackLinks' => $default,
	'ContentStart' => $default,
	'DesignFinish' => $default,
	'MozTrust' => $default,
	'DBName' => $default,
	'ResearchedBy' => $default,
	'ContentFinished' => $default,
	'Developer' => $default,
	'Reviewer' => $default,
	'Cloner' => $default,
	'ContentAdmin' => $default,
	'DomainNotes' => $default,
	'DBUser' => $default,
	'BoughtBy' => $default,
	'ContentHours' => $default,
	'DevStart' => $default,
	'DA' => $default,
	'AuthorNickname' => $default,
	'DBPass' => $default,
	'Designer' => $default,
	'DevFinish' => $default,
	'Vertical' => $vert_drop,
	'Status' => $status_drop,
	'Version' => $version_drop,
	'Type' => $type_drop,
	'Converted' => $conv_drop,
	'HostAccount' => $host_drop,
	'Country' => $country_drop,
	'RenewalDate' => $date_drop,
	'DateBought' => $date_drop,
	'ReviewStart' => $date_drop,
	'CloneFinished' => $date_drop,
	'Language' => $lang_drop,
	'DateComplete' => $date_drop,
	'PR' => $pr_drop,
	'ManageWPAccount' => $manage_drop,
	'Wireframe' => $wire_drop,
	'Registrar' => $registrar_drop,
	'RenewalCost' => $add,
	'WhoIsRenewal' => $date_drop,
	'WhoisCost' => $add,
	'InitialCost' => $add,
	'TotalCost' => $total,
	'ContentStart' => $date_drop,
	'ContentFinish' => $date_drop,
	'DesignStart' => $date_drop,
	'DesignFinish' => $date_drop,
	'DevStart' => $date_drop,
	'DevFinish' => $date_drop,
	);
	foreach ($fieldArr as $key => $val) { 
		if ($key == $field) { 
			echo '<li class="bulk_inline">' . $val . '</li>';
		
		}
	}
}
function users_list($mysqli, $user, $fullname){
	$results = mysqli_query($mysqli, "SELECT * FROM Users WHERE Permissions='$user'");
	$rows = mysqli_num_rows($results);
	$array = mysqli_fetch_array($results);
	if(!in_array($explode[0], $array) && !in_array($explode[1], $array)){
		?><option value="<?=$fullname?>"><?=$fullname?></option><?php
	}
	for ($i = 0; $i < $rows; $i++){
		mysqli_data_seek($results, $i);
		$domain_data = mysqli_fetch_assoc($results);
		$explode = explode(' ', $fullname);
		$tempName = $domain_data['FirstName'].' '.$domain_data['LastName'];
		if($tempName == $fullname){
			?><option value="<?=$fullname?>"><?=$fullname?></option><?php
		} else{
			?><option value="<?=$domain_data['FirstName'];?> <?=$domain_data['LastName'];?>"><?=$domain_data['FirstName'];?> <?=$domain_data['LastName'];?></option><?php
		}
	}
}

function json_dropdown($list, $value){
	$value = trim($value);
	//$list needs to be theme_list, manage_list, type_list
	//$Value is a value pulled from the database. Pass a param even if its empty
	$jsonPath = 'http://darth-serverus.boocorp.com/json/'.$list.'.json';
	$json = file_get_contents($jsonPath);
	$json = json_decode($json, true);
	if(!empty($value) && !in_array($value, $json)){
		?><option value="<?=$value?>"><?=$value?> - CHANGE</option><?php
	} elseif (!empty($value) && in_array($value, $json)){
		?><option value="<?=$value?>"><?=$value?></option><?php
	}
	foreach($json as $theme){
		?><option value="<?=$theme?>"><?=$theme?></option><?php
	}
}

include 'rooturl.php';


function userGoals($fullname, $permissions, $mysqli) {
// Declaring time related constants and time formats. Giving the window for the time variables.
$curDate = date ("Y-m-d");
$curMonth = date('m');
$curYear = date('Y');
$beginWeek = date("Y-m-d", strtotime('last sunday'));
$endWeek = date("Y-m-d", strtotime('this friday'));
$monthBegin = $curYear . '-' . $curMonth . '-01';
$monthEnd = $curYear . '-' . $curMonth . '-31';
// Declaring default value for the time counters.
$userMonth = 0;
$userWeek = 0;
$userDay = 0;
// Switch case changing the role depending on permissions value.
switch ($permissions) {
	case 'Domain':
		$role = 'DateBought';
		$user = 'BoughtBy';
		break;
	case 'Content':
		$role = 'ContentFinished';
		$user = 'Writer';
		break;
	case 'Writer':
		$role = 'ContentFinished';
		$user = 'Writer';
		break;		
	case 'Designer':
		$role = 'DesignFinish';
		$user = 'Designer';
		break;
	case 'Support':
		$role = 'CloneFinished';
		$user = 'Cloner';
		break;
	case 'Admin':
		$role = 'DevFinish';
		$user = 'Developer';
		break;
	case 'QA':
		$role = 'DateComplete';
		$user = 'QAInspector';
		break;
}

$query = "SELECT * FROM DomainDetails WHERE $role='$curDate' AND $user='$fullname'";
$results = mysqli_query($mysqli, $query);
$rows = mysqli_num_rows($results);
/////////////~~~~~~~~
for ($a = 0; $a < $rows; $a++){
	mysqli_data_seek($results, $a);
	$domain_data = mysqli_fetch_assoc($results);
//  Setting results as incrementers. If there is a day found then it adds to day, week, & month.
		$userDay++;
	}

$query = "SELECT * FROM DomainDetails WHERE $role BETWEEN '$beginWeek' AND '$endWeek' AND $user='$fullname'";
$results = mysqli_query($mysqli, $query);
$rows = mysqli_num_rows($results);
/////////////~~~~~~~~
for ($a = 0; $a < $rows; $a++){
	mysqli_data_seek($results, $a);
	$domain_data = mysqli_fetch_assoc($results);
// Adds to the week as well as month.
		$userWeek++;
	}

$query = "SELECT * FROM DomainDetails WHERE $role BETWEEN '$monthBegin' AND '$monthEnd' AND $user='$fullname'";
$results = mysqli_query($mysqli, $query);
$rows = mysqli_num_rows($results);
/////////////~~~~~~~~
for ($a = 0; $a < $rows; $a++){
	mysqli_data_seek($results, $a);
	$domain_data = mysqli_fetch_assoc($results);
// Adds to only the month.
		$userMonth++;
	}

return array($userDay, $userWeek, $userMonth);
}

function inMyQueue($mysqli, $fullname, $permissions){
	$counter = 0;
	switch ($permissions) {
	case 'Content':
		$query = "SELECT * FROM DomainDetails WHERE ContentAdmin='$fullname' AND ContentStart='0000-00-00'";
		$results = mysqli_query($mysqli, $query);
		$rows = mysqli_num_rows($results);
		
		for ($i = 0; $i < $rows; $i++){
			mysqli_data_seek($results, $i);
			$domain_data = mysqli_fetch_assoc($results);
			$counter++;
		}
		$query = "SELECT * FROM DomainDetails WHERE Writer='$fullname' AND ContentStart!='0000-00-00' AND ReviewStart='0000-00-00' AND ContentFinished='0000-00-00'";
		$results = mysqli_query($mysqli, $query);
		$rows = mysqli_num_rows($results);
		
		for ($i = 0; $i < $rows; $i++){
			mysqli_data_seek($results, $i);
			$domain_data = mysqli_fetch_assoc($results);
			$counter++;
		}
		$query = "SELECT * FROM DomainDetails WHERE Reviewer='$fullname' AND ReviewStart!='0000-00-00' AND ContentFinished='0000-00-00' AND DesignStart='0000-00-00'";
		$results = mysqli_query($mysqli, $query);
		$rows = mysqli_num_rows($results);
		
		for ($i = 0; $i < $rows; $i++){
			mysqli_data_seek($results, $i);
			$domain_data = mysqli_fetch_assoc($results);
			$counter++;
		}
		break;
	case 'Writer':
		$query = "SELECT * FROM DomainDetails WHERE Writer='$fullname' AND ContentStart!='0000-00-00' AND ReviewStart='0000-00-00' AND ContentFinished='0000-00-00'";
		$results = mysqli_query($mysqli, $query);
		$rows = mysqli_num_rows($results);
		
		for ($i = 0; $i < $rows; $i++){
			mysqli_data_seek($results, $i);
			$domain_data = mysqli_fetch_assoc($results);
			$counter++;
		}
		$query = "SELECT * FROM DomainDetails WHERE Reviewer='$fullname' AND ReviewStart!='0000-00-00' AND ContentFinished='0000-00-00' AND DesignStart='0000-00-00'";
		$results = mysqli_query($mysqli, $query);
		$rows = mysqli_num_rows($results);
		
		for ($i = 0; $i < $rows; $i++){
			mysqli_data_seek($results, $i);
			$domain_data = mysqli_fetch_assoc($results);
			$counter++;
		}
		break;
	case 'Designer':
		$query = "SELECT * FROM DomainDetails WHERE Designer='$fullname' AND DesignFinish='0000-00-00'";
		$results = mysqli_query($mysqli, $query);
		$rows = mysqli_num_rows($results);
		
		for ($i = 0; $i < $rows; $i++){
			mysqli_data_seek($results, $i);
			$domain_data = mysqli_fetch_assoc($results);
			$counter++;
		}
		break;
	case 'Support':
		$query = "SELECT * FROM DomainDetails WHERE Cloner='$fullname' AND CloneFinished='0000-00-00' AND DevStart='0000-00-00' AND Developer=''";
		$results = mysqli_query($mysqli, $query);
		$rows = mysqli_num_rows($results);
		
		for ($i = 0; $i < $rows; $i++){
			mysqli_data_seek($results, $i);
			$domain_data = mysqli_fetch_assoc($results);
			$counter++;
		}
		$query = "SELECT * FROM DomainDetails WHERE Cloner='$fullname' AND DevStart='0000-00-00' AND CloneFinished!='0000-00-00' AND Developer!=''";
		$results = mysqli_query($mysqli, $query);
		$rows = mysqli_num_rows($results);
		
		for ($i = 0; $i < $rows; $i++){
			mysqli_data_seek($results, $i);
			$domain_data = mysqli_fetch_assoc($results);
			$counter++;
		}
		break;
	case 'Admin':
		$query = "SELECT * FROM DomainDetails WHERE Developer='$fullname' AND DevFinish='0000-00-00' AND DevStart!='0000-00-00'";
		$results = mysqli_query($mysqli, $query);
		$rows = mysqli_num_rows($results);
		
		for ($i = 0; $i < $rows; $i++){
			mysqli_data_seek($results, $i);
			$domain_data = mysqli_fetch_assoc($results);
			$counter++;
		}
		break;
	case 'QA':
		$query = "SELECT * FROM DomainDetails WHERE QAInspector='$fullname' AND DateComplete='0000-00-00'";
		$results = mysqli_query($mysqli, $query);
		$rows = mysqli_num_rows($results);
		
		for ($i = 0; $i < $rows; $i++){
			mysqli_data_seek($results, $i);
			$domain_data = mysqli_fetch_assoc($results);
			$counter++;
		}
		break;
	}
	return $counter;
}

function domainNotes($mysqli, $domain, $date, $fullname, $newNote){
	$query = "SELECT * FROM DomainDetails WHERE Domain='$domain'";
	$result = mysqli_query($mysqli, $query);
	$domain_data = mysqli_fetch_assoc($result);

	$addNote = '<div class="domainNote"><p class="noteStamp">'.$fullname.': '.$date.'</p><p class="noteContent">'.$newNote.'</p></div>' . $domain_data['DomainNotes'];

	$query = "UPDATE DomainDetails SET DomainNotes='$addNote' WHERE Domain='$domain'";
	mysqli_query($mysqli, $query);
}

function modifyNotes($mysqli, $domain, $date, $fullname, $oldnote, $newnote){
	$query = "SELECT * FROM DomainDetails WHERE Domain='$domain'";
	$result = mysqli_query($mysqli, $query);
	$domain_data = mysqli_fetch_assoc($result);

	$modifiedNote = str_replace($oldnote, $newnote, $domain_data['DomainNotes']);
	$modifiedNote = addslashes($modifiedNote);
	echo $modifiedNote;

	$query = "UPDATE DomainDetails SET DomainNotes='$modifiedNote' WHERE Domain='$domain'";
	mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
}

function hostNotes($mysqli, $host, $date, $fullname, $newNote){
	$query = "SELECT * FROM HostDetails WHERE HostAccount='$host'";
	$result = mysqli_query($mysqli, $query);
	$host_data = mysqli_fetch_assoc($result);

	$addNote = '<div class="domainNote"><p class="noteStamp">'.$fullname.': '.$date.'</p><p class="noteContent">'.$newNote.'</p></div>' . $host_data['HostNotes'];

	$query = "UPDATE HostDetails SET HostNotes='$addNote' WHERE HostAccount='$host'";
	mysqli_query($mysqli, $query);
}

function modHostNotes($mysqli, $host, $date, $fullname, $oldnote, $newnote){
	$query = "SELECT * FROM HostDetails WHERE HostAccount='$host'";
	$result = mysqli_query($mysqli, $query);
	$host_data = mysqli_fetch_assoc($result);

	$modifiedNote = str_replace($oldnote, $newnote, $host_data['HostNotes']);
	$modifiedNote = addslashes($modifiedNote);
	echo $modifiedNote;

	$query = "UPDATE HostDetails SET HostNotes='$modifiedNote' WHERE HostAccount='$host'";
	mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
}

function teamGoals($viewPermissions, $mysqli) {
// Declaring time related constants and time formats. Giving the window for the time variables.
$curDate = date ("Y-m-d");
$curMonth = date('m');
$curYear = date('Y');
$beginWeek = date("Y-m-d", strtotime('last sunday'));
$endWeek = date("Y-m-d", strtotime('this friday'));
$monthBegin = $curYear . '-' . $curMonth . '-01';
$monthEnd = $curYear . '-' . $curMonth . '-31';
// Merging first and last name into one variable.
// Declaring default value for the time counters.
$teamMonth = 0;
$teamWeek = 0;
$teamDay = 0;
// Switch case changing the role depending on permissions value.
switch ($viewPermissions) {
	case 'Domain':
		$role = 'DateBought';
		break;
	case 'Content':
		$role = 'ContentFinished';
		break;
	case 'Writer':
		$role = 'ContentFinished';
		break;
	case 'Designer':
		$role = 'DesignFinish';
		break;
	case 'Support':
		$role = 'CloneFinished';
		break;
	case 'Admin':
		$role = 'DevFinish';
		break;
	case 'QA':
		$role = 'DateComplete';
		break;
}
$query = "SELECT * FROM domainDetails WHERE `$role`= '$curDate'";
$results = mysqli_query($mysqli, $query);
$rows = mysqli_num_rows($results);
for ($a = 0; $a < $rows; $a++){
	mysqli_data_seek($results, $a);
	$domain_data = mysqli_fetch_assoc($results);
//  Setting results as incrementers. If there is a day found then it adds to day, week, & month.
		$teamDay++;
}
$query = "SELECT * FROM domainDetails WHERE $role BETWEEN '$beginWeek' AND '$endWeek'";
$results = mysqli_query($mysqli, $query);
$rows = mysqli_num_rows($results);
for ($a = 0; $a < $rows; $a++){
	mysqli_data_seek($results, $a);
	$domain_data = mysqli_fetch_assoc($results);
//  Setting results as incrementers. If there is a day found then it adds to day, week, & month.
// Adds to the week as well as month.
		$teamWeek++;
}
// Adds to only the month.
$query = "SELECT * FROM domainDetails WHERE $role BETWEEN '$monthBegin' AND '$monthEnd'";
$results = mysqli_query($mysqli, $query);
$rows = mysqli_num_rows($results);
for ($a = 0; $a < $rows; $a++){
	mysqli_data_seek($results, $a);
	$domain_data = mysqli_fetch_assoc($results);
		$teamMonth++;
}

return array($teamDay, $teamWeek, $teamMonth);
}


function msword_conversion($str) {
	$str = str_replace(chr(147), '"', $str);
	$str = str_replace(chr(148), '"', $str);
	$str = str_replace(chr(130), ',', $str);
	$str = str_replace(chr(131), 'NLG', $str);
	$str = str_replace(chr(132), '"', $str);
	$str = str_replace(chr(133), '...', $str);
	$str = str_replace(chr(134), '**', $str);
	$str = str_replace(chr(135), '***', $str);
	$str = str_replace(chr(136), '^', $str);
	$str = str_replace(chr(137), 'o/oo', $str);
	$str = str_replace(chr(138), 'Sh', $str);
	$str = str_replace(chr(139), '<', $str);
	$str = str_replace(chr(145), "'", $str);
	$str = str_replace(chr(146), "'", $str);
	$str = str_replace('–', '-', $str);
	$str = str_replace(chr(149), '-', $str);
	$str = str_replace(chr(150), '-–', $str);
	$str = str_replace(chr(151), '--', $str);
	$str = str_replace(chr(154), 'sh', $str);
	$str = str_replace(chr(155), '>', $str);
	$str = str_replace(chr(159), 'Y', $str);
	$str = str_replace('°C', '&deg;C', $str);
	$str = str_replace('£', '&pound;', $str);
	for($i = 128; $i < 255; $i++){
		$str = str_replace(chr($i), '&#'.$i.';', $str);
	}
	return $str;
}

function teamChart($mysqli, $team, $time, $width, $height){
$curDate = date ("Y-m-d");
$curMonth = date('m');
$curYear = date('Y');
$beginWeek = date("Y-m-d", strtotime('last sunday'));
$endWeek = date("Y-m-d", strtotime('this friday'));
$monthBegin = $curYear . '-' . $curMonth . '-01';
$monthEnd = $curYear . '-' . $curMonth . '-31';
	switch ($team) {
		case 'Content':
			$stmt = "DateBought!='0000-00-00' AND DesignStart='0000-00-00'";
			$date1 = 'ContentStart';
			$date2 = 'ContentFinished';
			$previous = 'DateBought';
			$person = 'Writer';
			break;
		case 'Writer':
			$stmt = "DateBought!='0000-00-00' AND DesignStart='0000-00-00'";
			$date1 = 'ContentStart';
			$date2 = 'ContentFinished';
			$previous = 'DateBought';
			$person = 'Writer';
			break;
		case 'Design':
			$stmt = "ContentFinished!='0000-00-00' AND CloneFinished='0000-00-00'";
			$date1 = 'DesignStart';
			$date2 = 'DesignFinish';
			$previous = 'ContentFinished';
			$person = 'Designer';
			break;
		case 'Support':
			$stmt = "DesignFinish!='0000-00-00' AND DevStart='0000-00-00'";
			$date1 = 'DesignFinish';
			$date2 = 'CloneFinished';
			$previous = 'DesignFinish';
			$person = 'Cloner';
			break;
		case 'Dev':
			$stmt = "CloneFinished!='0000-00-00' AND DateComplete='0000-00-00'";
			$date1 = 'DevStart';
			$date2 = 'DevFinish';
			$previous = 'CloneFinished';
			$person = 'Developer';
			break;
		case 'QA':
			$stmt = "DevFinish!='0000-00-00'";
			$date1 = 'DevFinish';
			$date2 = 'DateComplete';
			$previous = 'DevFinish';
			$person = 'QAInspector';
			break;
	}
	$results = mysqli_query($mysqli, "SELECT * FROM DomainDetails WHERE $stmt") or die(mysqli_error($mysqli));
		$rows = mysqli_num_rows($results);
		$complete = 0;
		$inQ = 0;
		$inProcess = 0;
		for ($a = 0; $a < $rows; $a++){
			mysqli_data_seek($results, $a);
			$chart_data = mysqli_fetch_assoc($results);
			switch ($time) {
				case 'Day':
					if($chart_data[$date2] == $curDate){
						$complete++;
					}
					if($chart_data[$date1] == $curDate && strtotime($chart_data[$date2]) == false && $chart_data[$person] != ''){
						$inQ++;
					}
					if(strtotime($chart_data[$previous]) == true && strtotime($chart_data[$date1]) == false && $chart_data[$person] == ''){
						$inProcess++;
					}
					break;
				case 'Week':
					if($chart_data[$date2] >= $beginWeek && $chart_data[$date2] <= $endWeek){
						$complete++;
					}
					if($chart_data[$date1] >= $beginWeek && $chart_data[$date1] <= $endWeek && strtotime($chart_data[$date2]) == false && $chart_data[$person] != ''){
						$inQ++;
					}
					if(strtotime($chart_data[$previous]) == true && strtotime($chart_data[$date1]) == false && $chart_data[$person] == ''){
						$inProcess++;
					}
					break;
				case 'Month':
					if($chart_data[$date2] >= $monthBegin && $chart_data[$date2] <= $monthEnd){
						$complete++;
					}
					if($chart_data[$date1] >= $monthBegin && $chart_data[$date1] <= $monthEnd && strtotime($chart_data[$date2]) == false && $chart_data[$person] != ''){
						$inQ++;
					}
					if(strtotime($chart_data[$previous]) == true && strtotime($chart_data[$date1]) == false && $chart_data[$person] == ''){
						$inProcess++;
					}
					break;
				case 'All':
					if(strtotime($chart_data[$date2]) == true){
						$complete++;
					}
					if(strtotime($chart_data[$date1]) == true && strtotime($chart_data[$date2]) == false && $chart_data[$person] != ''){
						$inQ++;
					}
					if(strtotime($chart_data[$previous]) == true && strtotime($chart_data[$date1]) == false && $chart_data[$person] == ''){
						$inProcess++;
					}
					break;
			}
		}
	$vars = 'data-complete="'.$complete.'" data-inq="'.$inQ.'" data-inprocess="'.$inProcess.'"';
	echo '<canvas '.$vars.' id="'.$team.$time.'Chart" width="'.$width.'" height="'.$height.'"></canvas>';
}

function userOverview($mysqli, $user, $permissions){
	$curDate = date ("Y-m-d");
	$curMonth = date('m');
	$curYear = date('Y');
	$beginWeek = date("Y-m-d", strtotime('last sunday'));
	$endWeek = date("Y-m-d", strtotime('this friday'));
	$monthBegin = $curYear . '-' . $curMonth . '-01';
	$monthEnd = $curYear . '-' . $curMonth . '-31';

	$dcomplete = 0;
	$wcomplete = 0;
	$mcomplete = 0;
	$inQ = 0;

	switch ($permissions) {
		case 'Designer':
			$task = 'DesignFinish';
			$team = 'Designer';
			break;
		case 'Support':
			$task = 'CloneFinished';
			$team = 'Cloner';
			break;
		case 'Admin':
			$task = 'DevFinish';
			$team = 'Developer';
			break;
		case 'QA':
			$task = 'DateComplete';
			$team = 'QAInspector';
			break;
	}

	$query = "SELECT * FROM DomainDetails WHERE $team='$user' AND $task='$curDate'";
	$results = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
	$rows = mysqli_num_rows($results);
	for ($a = 0; $a <= $rows; $a++){
		mysqli_data_seek($results, $a);
		$userData = mysqli_fetch_assoc($results);
		//Day Counter
		if($userData[$task] == $curDate){
			$dcomplete++;
		}
	}

	$query = "SELECT * FROM DomainDetails WHERE $team='$user' AND $task BETWEEN '$beginWeek' AND '$endWeek'";
	$results = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
	$rows = mysqli_num_rows($results);
	for ($a = 0; $a <= $rows; $a++){
		mysqli_data_seek($results, $a);
		$userData = mysqli_fetch_assoc($results);
		//Week Counter
		if($userData[$task] >= $beginWeek && $userData[$task] <= $endWeek){
			$wcomplete++;
		}
	}

	$query = "SELECT * FROM DomainDetails WHERE $team='$user' AND $task BETWEEN '$monthBegin' AND '$monthEnd'";
	$results = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
	$rows = mysqli_num_rows($results);
	for ($a = 0; $a <= $rows; $a++){
		mysqli_data_seek($results, $a);
		$userData = mysqli_fetch_assoc($results);
		//Month Counter
		if($userData[$task] >= $monthBegin && $userData[$task] <= $monthEnd){
			$mcomplete++;
		}
	}
	$userOverview = array(
		'day' => array(
			'complete' => $dcomplete
			),
		'week' => array(
			'complete' => $wcomplete
			),
		'month' => array(
			'complete' => $mcomplete
			),
	);

	return $userOverview;
}

function writerOverview($mysqli, $user){
	$curDate = date ("Y-m-d");
	$curMonth = date('m');
	$curYear = date('Y');
	$beginWeek = date("Y-m-d", strtotime('last sunday'));
	$endWeek = date("Y-m-d", strtotime('this friday'));
	$monthBegin = $curYear . '-' . $curMonth . '-01';
	$monthEnd = $curYear . '-' . $curMonth . '-31';

	$dcomplete = 0;
	$wcomplete = 0;
	$mcomplete = 0;
	$inQ = 0;

	$task = 'ReviewStart';
	$team = 'Writer';

	$query = "SELECT * FROM DomainDetails WHERE $team='$user' AND $task='$curDate'";
	$results = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
	$rows = mysqli_num_rows($results);
	for ($a = 0; $a <= $rows; $a++){
		mysqli_data_seek($results, $a);
		$userData = mysqli_fetch_assoc($results);
		//Day Counter
		if($userData[$task] == $curDate){
			$dcomplete++;
		}
	}

	$query = "SELECT * FROM DomainDetails WHERE $team='$user' AND $task BETWEEN '$beginWeek' AND '$endWeek'";
	$results = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
	$rows = mysqli_num_rows($results);
	for ($a = 0; $a <= $rows; $a++){
		mysqli_data_seek($results, $a);
		$userData = mysqli_fetch_assoc($results);
		//Week Counter
		if($userData[$task] >= $beginWeek && $userData[$task] <= $endWeek){
			$wcomplete++;
		}
	}

	$query = "SELECT * FROM DomainDetails WHERE $team='$user' AND $task BETWEEN '$monthBegin' AND '$monthEnd'";
	$results = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
	$rows = mysqli_num_rows($results);
	for ($a = 0; $a <= $rows; $a++){
		mysqli_data_seek($results, $a);
		$userData = mysqli_fetch_assoc($results);
		//Month Counter
		if($userData[$task] >= $monthBegin && $userData[$task] <= $monthEnd){
			$mcomplete++;
		}
	}
	$writerOverview = array(
		'day' => array(
			'complete' => $dcomplete
			),
		'week' => array(
			'complete' => $wcomplete
			),
		'month' => array(
			'complete' => $mcomplete
			),
	);

	return $writerOverview;
}

function reviewerOverview($mysqli, $user){
	$curDate = date ("Y-m-d");
	$curMonth = date('m');
	$curYear = date('Y');
	$beginWeek = date("Y-m-d", strtotime('last sunday'));
	$endWeek = date("Y-m-d", strtotime('this friday'));
	$monthBegin = $curYear . '-' . $curMonth . '-01';
	$monthEnd = $curYear . '-' . $curMonth . '-31';

	$dcomplete = 0;
	$wcomplete = 0;
	$mcomplete = 0;
	$inQ = 0;

	$task = 'ContentFinished';
	$team = 'Reviewer';

	$query = "SELECT * FROM DomainDetails WHERE $team='$user' AND $task='$curDate'";
	$results = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
	$rows = mysqli_num_rows($results);
	for ($a = 0; $a <= $rows; $a++){
		mysqli_data_seek($results, $a);
		$userData = mysqli_fetch_assoc($results);
		//Day Counter
		if($userData[$task] == $curDate){
			$dcomplete++;
		}
	}

	$query = "SELECT * FROM DomainDetails WHERE $team='$user' AND $task BETWEEN '$beginWeek' AND '$endWeek'";
	$results = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
	$rows = mysqli_num_rows($results);
	for ($a = 0; $a <= $rows; $a++){
		mysqli_data_seek($results, $a);
		$userData = mysqli_fetch_assoc($results);
		//Week Counter
		if($userData[$task] >= $beginWeek && $userData[$task] <= $endWeek){
			$wcomplete++;
		}
	}

	$query = "SELECT * FROM DomainDetails WHERE $team='$user' AND $task BETWEEN '$monthBegin' AND '$monthEnd'";
	$results = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
	$rows = mysqli_num_rows($results);
	for ($a = 0; $a <= $rows; $a++){
		mysqli_data_seek($results, $a);
		$userData = mysqli_fetch_assoc($results);
		//Month Counter
		if($userData[$task] >= $monthBegin && $userData[$task] <= $monthEnd){
			$mcomplete++;
		}
	}
	$reviewerOverview = array(
		'day' => array(
			'complete' => $dcomplete
			),
		'week' => array(
			'complete' => $wcomplete
			),
		'month' => array(
			'complete' => $mcomplete
			),
	);

	return $reviewerOverview;
}
?>