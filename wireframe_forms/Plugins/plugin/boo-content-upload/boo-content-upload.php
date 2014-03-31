<?php

/*

Plugin Name: BOO Content Upload

Description: Uploades Content

Version: 1.1

Author: Ricky Roller

Author URI: http://rickjames.org
Plugin URI: http://rickjames.org

*/


define('BOO_CONTENT_DIR', plugin_dir_path(__FILE__));

define('BOO_CONTENT_URL', plugin_dir_url(__FILE__));



function boo_content_load(){

		

    if(is_admin()) //load admin files only in admin

        require_once(BOO_CONTENT_DIR.'includes/admin.php');

        

    	require_once(BOO_CONTENT_DIR.'includes/core.php');

}

boo_content_load();



// Build Admin Menu

add_action( 'admin_menu', 'my_plugin_menu' );



function my_plugin_menu() {

	add_dashboard_page( 'BOO Content Upload', 'BOO Content Upload', 'manage_options', 'boo_content', 'my_plugin_options' );

}



function my_plugin_options() {

	?>	<div class="wrap">

		<form action="index.php?page=boo_content&upload=true" method="post" enctype="multipart/form-data">

		<label for="file">Filename:</label>

		<input type="file" name="file" id="file">

		<input type="submit" name="submit" value="Upload">

		</form>

	<?php

	if (isset($_GET['upload']) && $_GET['upload'] == "true") { 
		$filename = $_FILES['file']['name'];
		if ($filename == 'content.php'){
		?>

		<form id="createdataform" action="index.php?page=boo_content&create=pages" method="post">

		<button type="submit" class="submitbutton" id="createdata">Import Data</button>

		<input type="hidden" name="create" value="pages" />

		<input type="hidden" name="action" value="create" />

		</form>

		<div id="createdataoutput"></div>

	<?php } else {
		echo '<p style="color:red;">Make sure the content.php is named correctly and try again</p>';
		} 
	}

		$allowedExts = array("php");

		$temp = explode(".", $_FILES["file"]["name"]);

		$extension = end($temp);

		if ($_FILES["file"]["error"] > 0)

		  {

		  echo "Return Code: " . $_FILES["file"]["error"] . "<br>";

		  }

		else

		  {

		  	move_uploaded_file($_FILES["file"]["tmp_name"],

		  	BOO_CONTENT_DIR . $_FILES["file"]["name"]);

		  	echo "Saved as: " . $_FILES["file"]["name"];

		}
		if (!isset($_GET['upload'])){
			echo "Please Upload Content.php";
		}

	?></div><?php

}



// when the admin menu is built

add_action('admin_menu', 'boo_add_menu_items');

if ( isset($_GET['ajax']) && $_GET['ajax'] == "true" )



{



	// when the admin menu is built



	add_action('admin_menu', 'boocontent_do_ajax');



}



function boo_add_menu_items(){



	// add includes

	if (isset($_GET["page"]) && $_GET["page"] == "boo_content") {

		add_action("admin_head", "boo_css");

		if (isset($_GET['upload']) && $_GET['upload'] == "true"){

			add_action("admin_head", "boo_js");

		}

	}

}



function boo_css(){

	if (isset($_GET["page"]) && $_GET["page"] == "boo_content") {

		echo '

		<style type="text/css">

		#uploadcontent input{

			display: inline-block;

		}
		.demodatasuccess {
			background: green;
			border-radius: 5px;
			color: #fff;
			padding: 15px;
			margin-bottom: 15px;
		}

		</style>

		';

	}

}



function boo_js(){

	if (isset($_GET["page"]) && $_GET["page"] == "boo_content")



	{



		echo '



		<script type="text/javascript">



		jQuery(document).ready(function(){



			jQuery(".submitbutton").bind("click", function(e) {



				var id = jQuery(this).attr("id");



				var div = jQuery("#" + id + "output");



				var form = jQuery("#" + id + "form");



				div.html(\'<div class="boocontentpending"><p>' . __("Processing ... please wait", "boocontent") . '</div></p>\');



				var formdata = form.serialize();



				jQuery.ajax({



					data: formdata,



					type: "POST",



					url: "index.php?page=boo_content&ajax=true",



					success: function(data) {



						div.html(data);



					},



					error: function() {



						div.html(\'<div class="boocontenterror"><p>' . __("Sorry, the process failed", "boocontent") . '</p></div>\');



					}



				});



				e.preventDefault();



				return false;



			});



		});



		</script>



		';



	}

}



function boocontent_do_ajax()



{



	echo '



	<div id="boocontent_results">



	';



	// listen for form submission



	boocontent_watch_form();



	echo '</div>';



	// stop processing



	exit();



}



function boocontent_create()



{



	// listen for a form submission



	if (count($_POST) > 0 && isset($_POST["create"])) {
		$wireframe = boocontent_parse_wireframe();
		$wk = boocontent_parse_slider();

		boocontent_create_pages();
	if ($wireframe == "28"){
		boocontent_create_widgetkit();
	}
	if ($wireframe == "18" || $wireframe == "21" || $wireframe == "22" || $wireframe == "23" || $wireframe == "25" || $wireframe == "29"){
		boocontent_create_homepage_features();
	} else {
		boocontent_create_homepage_eb();
	}
		boocontent_update_robots();
	}



}



function boocontent_watch_form()



{



	// if submitting form



	if (is_array($_POST) && count($_POST) > 0 && isset($_POST["action"]))



	{	



		set_time_limit(300);



	



		if ($_POST["action"] == "create")



		{



			boocontent_create();



		} else {



			echo '



			<!-- No POST action of "CREATE" -->



			';



		}



	} else {



		echo '



		<!-- No POST action -->



		';



	}



}





function boocontent_create_pages() {
	include('content.php');

	$count = 1;

//Add Mobile Home if applicable
	if(isset($mobilehome_details)){
		$mobile_home = array(

        'post_type'   => 'page',

        'post_title'  => '<!--Mobile Home-->',

        'post_name'   => 'mobile-home',

        'post_status' => 'publish',

        'post_content' => stripslashes($mobilehome_details),

        'post_author' => 1,

        'post_parent' => ''

    );
		$mobile_home = wp_insert_post($mobile_home);
		
		$menu_mobile_id = $mobile_home + 1;
	
		$where = array('ID' => $menu_mobile_id);
	
		$wpdb->delete('wp_posts', $where);
	}
//Add About Page

	$about_page = array(

        'post_type'   => 'page',

        'post_title'  => stripslashes($about_title),

        'post_name'   => stripslashes($about_title),

        'post_status' => 'publish',

        'post_content' => stripslashes($about_content),

        'post_author' => 1,

        'post_parent' => ''

    );

    $about_page_id = wp_insert_post($about_page);

    $menu_about_id = $about_page_id + 1;

    $data = array('post_title' => stripslashes($nav_about));

	$where = array('ID' => $menu_about_id);

	$wpdb->update('wp_posts', $data, $where);



        //Add All Other Pages

	    foreach($pages as $page_url_title => $page_meta) {

	

	        //$id = get_page_by_title($page_url_title);

	

	        foreach ($page_meta as $page_content=>$page_template){

	

	            $page = array(

	                'post_type'   => 'page',

	                'post_title'  => stripslashes($page_url_title),

	                'post_name'   => stripslashes($page_url_title),

	                'post_status' => 'publish',

	                'post_content' => stripslashes($page_content),

	                'post_author' => 1,

	                'post_parent' => ''

	            );

	            //Add a page template if there is one.

                $new_page_id = wp_insert_post($page);

                if(!empty($page_template)){

                	update_post_meta($new_page_id, '_wp_page_template', $page_template);

            	}



            	//Add the pages to the menu
            	$menu_id = get_nav_menu_locations($menu);

				$wpdb->insert($wpdb->term_relationships, array("object_id" => $new_page_id, "term_taxonomy_id" => $menu_id ), array("%d", "%d"));

				//Update Menu Titles

				$menu_item_id = $new_page_id + 1;

				$data = array('post_title' => stripslashes($nav[$count]));

				$where = array('ID' => $menu_item_id);

				$wpdb->update('wp_posts', $data, $where);


				//Adds a featured image to the page if applicable/no widgetkit
				if ($slider == 'true' && $count < '4'){
					$excerpt = get_excerpt_by_id($new_page_id);
					
					$image_num = 'slider'.$count;
					$final_num = 'finalimage'.$count;
					$$image_num = base64_decode($feautred_image_data[$count]);

					$page_title = $count - 1;

					file_put_contents($wp_upload_dir['path'].'/Slider-'.$count.'.jpg', $$image_num);

					$$final_num = $wp_upload_dir['url'].'/Slider-'.$count.'.jpg';

  					$attachment = array(

  						'guid' => $$final_num,

  						'post_mime_type' => 'image/jpg',

  						'post_title' => 'Slider-'.$count,

  						'post_content' => '',

  						'post_excerpt' => '<h2><a href="/'.$page_titles[$page_title].'/">'.$excerpt.'</a></h2>',

  						'post_status' => 'inherit'

  					);

  					$filename = $wp_upload_dir['path'].'/Slider-'.$count.'.jpg';

  					$attach_id = wp_insert_attachment( $attachment, $filename, $slider_id );

  					// you must first include the image.php file

  					// for the function wp_generate_attachment_metadata() to work

  					require_once( ABSPATH . 'wp-admin/includes/image.php' );

  					$attach_data = wp_generate_attachment_metadata( $attach_id, $$final_num );

  					wp_update_attachment_metadata( $attach_id, $attach_data );

  				}

				if ($slider == 'false' && $count != '4'){
					$image_num = 'image'.$count;
					$final_num = 'finalimage'.$count;
					$$image_num = base64_decode($feautred_image_data[$count]);

					file_put_contents($wp_upload_dir['path'].'/Slider-'.$count.'.jpg', $$image_num);

					$$final_num = $wp_upload_dir['url'].'/Slider-'.$count.'.jpg';

  					$attachment = array(

  						'guid' => $$final_num,

  						'post_mime_type' => 'image/jpg',

  						'post_title' => 'Slider-'.$count,

  						'post_content' => '',

  						'post_status' => 'inherit'

  					);

  					$filename = $wp_upload_dir['path'].'/Slider-'.$count.'.jpg';

  					$attach_id = wp_insert_attachment( $attachment, $filename, $new_page_id );

  					// you must first include the image.php file

  					// for the function wp_generate_attachment_metadata() to work

  					require_once( ABSPATH . 'wp-admin/includes/image.php' );

  					$attach_data = wp_generate_attachment_metadata( $attach_id, $$final_num );

  					wp_update_attachment_metadata( $attach_id, $attach_data );

  					set_post_thumbnail( $new_page_id, $attach_id );

  				}

  				$count++;

	        }

	    }

	    ?>

	    <div class="demodatasuccess">

		<p>Pages/Menus/Featured Images Successfully Created</p>

		</div>

		<?php
}



function boocontent_create_widgetkit() {

	include('content.php');
		//Decode Images
		$image1 = base64_decode($feautred_image_data['1']);
		$image2 = base64_decode($feautred_image_data['2']);
		$image3 = base64_decode($feautred_image_data['3']);
		$image4 = base64_decode($feautred_image_data['4']);
		//Save images to the uploads folder
		file_put_contents($wp_upload_dir['path'].'/slider/slider-1.jpeg', $image1);
		file_put_contents($wp_upload_dir['path'].'/slider/slider-2.jpeg', $image2);
		file_put_contents($wp_upload_dir['path'].'/slider/slider-3.jpeg', $image3);
		file_put_contents($wp_upload_dir['path'].'/slider/slider-4.jpeg', $image4);

		//Update Widgetkit
		$data = array('post_content' => $wk_details);
	
		$where = array('ID'=>$wk_ID);
	
		$wpdb->update('wp_posts', $data, $where);
		
		?>
	
			<div class="demodatasuccess">
	
			<p>Widgetkit Successfully Created</p>
	
			</div>
	
		<?php

}



function boocontent_create_homepage_eb(){

	include('content.php');

	//Decode images from base64
	$logo_data = base64_decode($logo_data);
	$favicon_data = base64_decode($favicon_data);
	$hpimage1 = base64_decode($hpimdata1);
	$hpimage2 = base64_decode($hpimdata2);
	$hpimage3 = base64_decode($hpimdata3);
	$hpimage4 = base64_decode($hpimdata4);
	$root_path = get_home_url();

	file_put_contents($root_path.'/favicon.ico', $favicon_data);

	//Take decoded data and place it into a readable image
	if ($wireframe == '14' || $wireframe == '30' || $wireframe == '26'){
		file_put_contents($wp_upload_dir['path'].'/logo.png', $logo_data);
		file_put_contents($wp_upload_dir['path'].'/favicon.ico', $favicon_data);
		file_put_contents($wp_upload_dir['path'].'/Image-1.png', $hpimage1);
		file_put_contents($wp_upload_dir['path'].'/Image-2.png', $hpimage2);
		file_put_contents($wp_upload_dir['path'].'/Image-3.png', $hpimage3);
		file_put_contents($wp_upload_dir['path'].'/Image-4.png', $hpimage4);
	} else {
		file_put_contents($wp_upload_dir['path'].'/logo.png', $logo_data);
		file_put_contents($wp_upload_dir['path'].'/favicon.ico', $favicon_data);
		file_put_contents($wp_upload_dir['path'].'/Image-1.jpeg', $hpimage1);
		file_put_contents($wp_upload_dir['path'].'/Image-2.jpeg', $hpimage2);
		file_put_contents($wp_upload_dir['path'].'/Image-3.jpeg', $hpimage3);
		file_put_contents($wp_upload_dir['path'].'/Image-4.jpeg', $hpimage4);
	}
	//Homepage
	$data = array('post_content' => stripslashes($homepagedetails));

	$where = array('post_title' => 'Home');

	$wpdb->update('wp_posts', $data, $where);

	//Meta Description
	$mddata = array('meta_value' => stripslashes($metadescription));

	$mdwhere = array('meta_value' => 'This is where the meta description goes');

	$wpdb->update('wp_postmeta', $mddata, $mdwhere);
	
	//Title Tag
	$tt_data = array('option_value' => stripslashes($title_tag));

	$tt_where = array('option_name' => 'blogname');

	$wpdb->update('wp_options', $tt_data, $tt_where);

	//Site Tagline
	$st_data = array('option_value' => stripslashes($site_tagline));

	$st_where = array('option_name' => 'blogdescription');

	$wpdb->update('wp_options', $st_data, $st_where);

	//Author Nickname
	$an_data = array('display_name' => $author_nickname);

	$an_where = array('user_login' => 'admin');

	$wpdb->update('wp_users', $an_data, $an_where);
	?>

		<div class="demodatasuccess">

		<p>Homepage Successfully Created</p>

		</div>

	<?php

}



function boocontent_create_homepage_no_eb() {

	include('content.php');
	//Decode images from base64
	$logo_data = base64_decode($logo_data);
	$favicon_data = base64_decode($favicon_data);
	$hpimage1 = base64_decode($hpimdata1);
	$hpimage2 = base64_decode($hpimdata2);
	$hpimage3 = base64_decode($hpimdata3);

	file_put_contents($root_path.'/favicon.ico', $favicon_data);

	//Take decoded data and place it into a readable image
	file_put_contents($wp_upload_dir['path'].'/logo.png', $logo_data);
	file_put_contents($wp_upload_dir['path'].'/favicon.ico', $favicon_data);
	file_put_contents($wp_upload_dir['path'].'/Image-1.jpeg', $hpimage1);
	file_put_contents($wp_upload_dir['path'].'/Image-2.jpeg', $hpimage2);
	file_put_contents($wp_upload_dir['path'].'/Image-3.jpeg', $hpimage3);
	file_put_contents($wp_upload_dir['path'].'/Image-4.jpeg', $hpimage4);
	//Meta Description
	$mddata = array('meta_value' => stripslashes($metadescription));

	$mdwhere = array('meta_value' => 'This is where the meta description goes');

	$wpdb->update('wp_postmeta', $mddata, $mdwhere);

	//Homepage Content

	$data_hp = array('option_value' => stripslashes($hp_details));

	$where_hp = array('option_name' => 'widget_black-studio-tinymce');

	$wpdb->update('wp_options', $data_hp, $where_hp);

	//H1

	$data = array('option_value' => stripslashes($h1_details));

	$where = array('option_name' => 'widget_text');

	$wpdb->update('wp_options', $data, $where);

	//Title Tag

	$tt_data = array('option_value' => stripslashes($title_tag));

	$tt_where = array('option_name' => 'blogname');

	$wpdb->update('wp_options', $tt_data, $tt_where);

	//Site Tagline

	$st_data = array('option_value' => stripslashes($site_tagline));

	$st_where = array('option_name' => 'blogdescription');

	$wpdb->update('wp_options', $st_data, $st_where);

	//Author Nickname

	$an_data = array('display_name' => $author_nickname);

	$an_where = array('user_login' => 'admin');

	$wpdb->update('wp_users', $an_data, $an_where);

	?>

		<div class="demodatasuccess">

		<p>Homepage Successfully Created In Database</p>

		</div>

	<?php 

}

function boocontent_create_homepage_features(){
	include 'content.php';

	switch ($wireframe) {
		case '18'://Hustle

			//Decode and create images
			$icon1 = base64_decode($icondata1);
			$icon2 = base64_decode($icondata2);
			$icon3 = base64_decode($icondata3);
			file_put_contents($wp_upload_dir['path'].'/icon1.png', $icon1);
			file_put_contents($wp_upload_dir['path'].'/icon2.png', $icon2);
			file_put_contents($wp_upload_dir['path'].'/icon3.png', $icon3);

			$slide1 = base64_decode($hpimdata1);
			$slide2 = base64_decode($hpimdata2);
			$slide3 = base64_decode($hpimdata3);
			file_put_contents($wp_upload_dir['path'].'/slider1.jpg', $slide1);
			file_put_contents($wp_upload_dir['path'].'/slider2.jpg', $slide2);
			file_put_contents($wp_upload_dir['path'].'/slider3.jpg', $slide3);
	
			//Create Slides
			$hustle_array = (array)(json_decode($hustle_array));
			$counter = 1;
			$count = 1;
			for ($i = 1; $i <= 3; $i++){
				$slide_name = 'Slide'.$counter;
				$slide_count = 'slide_title_'.$counter;
				//$slide_page_id = 'slide_page_id_'.$counter;
				foreach ($hustle_array[$slide_count] as $key => $val){
					$$slide_count = array('1' => $key, '2' => $val);
				}
				$$slide_name = array(
			
    			    'post_type'   => 'slide',
    			    'post_title'  => stripslashes($$slide_count['1']),
    			    'post_name'   => stripslashes($$slide_count['1']),
    			    'post_status' => 'publish',
    			    'post_content' => stripslashes($$slide_count['2']),
    			    'post_author' => 1,
    			    'post_parent' => ''
    			);
	
    			$new_slide_id = wp_insert_post($$slide_name);
	
    			$path = $wp_upload_dir['url'].'/slider'.$counter.'.jpg';
	
    			$attachment = array(
	
  					'guid' => $path, 
	
  					'post_mime_type' => 'image/jpeg',
	
  					'post_title' => 'slide'.$counter,
	
  					'post_content' => '',
	
  					'post_status' => 'inherit'
	
  				);
	
  				$filename = $wp_upload_dir['path'].'/slider'.$counter.'.jpg';
	
  				$attach_id = wp_insert_attachment( $attachment, $filename, $new_slide_id );
	
  				// you must first include the image.php file
	
  				// for the function wp_generate_attachment_metadata() to work
	
  				require_once( ABSPATH . 'wp-admin/includes/image.php' );
	
  				$attach_data = wp_generate_attachment_metadata( $attach_id, $path );
	
  				wp_update_attachment_metadata( $attach_id, $attach_data );
	
  				set_post_thumbnail( $new_slide_id, $attach_id );
  				$counter++;
			}
	
			//Create Features
			for ($i = 1; $i <= 3; $i++){
				$feature_name = 'Feature'.$count;
				$feature_count = 'feature_'.$count;
				//$feature_page_id = 'feature_page_id_'.$count;
				foreach ($hustle_array[$feature_count] as $key => $val){
					$$feature_count = array('1' => $key, '2' => $val);
				}
				$$feature_name = array(
			
    			    'post_type'   => 'feature',
    			    'post_title'  => stripslashes($$feature_count['1']),
    			    'post_name'   => stripslashes($$feature_count['1']),
    			    'post_status' => 'publish',
    			    'post_content' => stripslashes($$feature_count['2']),
    			    'post_author' => 1,
    			    'post_parent' => ''
    			);

    			$new_feature_id = wp_insert_post($$feature_name);
    			$path_f = $wp_upload_dir['url'].'/icon'.$counter.'.png';
	
    			$attachment = array(
	
  					'guid' => $path_f, 
	
  					'post_mime_type' => 'image/jpeg',
	
  					'post_title' => 'slide'.$counter,
	
  					'post_content' => '',
	
  					'post_status' => 'inherit'
	
  				);
	
  				$filename = $wp_upload_dir['path'].'/icon'.$counter.'.png';
	
  				$attach_id = wp_insert_attachment( $attachment, $filename, $new_feature_id );
	
  				// you must first include the image.php file
	
  				// for the function wp_generate_attachment_metadata() to work
	
  				require_once( ABSPATH . 'wp-admin/includes/image.php' );
	
  				$attach_data = wp_generate_attachment_metadata( $attach_id, $path_f );
	
  				wp_update_attachment_metadata( $attach_id, $attach_data );
	
  				set_post_thumbnail( $new_feature_id, $attach_id );
				$count++;	
    		}
			break;

		case '21'://Pixelpress

			//Decode and create image
			$slider1 = base64_decode($slidedata);
			file_put_contents($wp_upload_dir['path'].'/slider1.jpg', $slider1);

			//Create 
			$pixe_array = (array)(json_decode($pixe_array));
			foreach ($pixe_array['slide_title'] as $key => $val){
				$slide_array = array('1' => $key, '2' => $val);
			}
			$slide = array(
			
    			    'post_type'   => 'slide',
    			    'post_title'  => stripslashes($slide_array['1']),
    			    'post_name'   => stripslashes($slide_array['1']),
    			    'post_status' => 'publish',
    			    'post_content' => stripslashes($slide_array['2']),
    			    'post_author' => 1,
    			    'post_parent' => ''
    		);
	
    		$new_slide_id = wp_insert_post($slide);

			$count = 1;
			for ($i = 1; $i <= 3; $i++){
				$feature_name = 'Feature'.$count;
				$feature_count = 'feature_'.$count;
				//$feature_page_id = 'feature_page_id_'.$count;
				foreach ($pixe_array[$feature_count] as $key => $val){
					$$feature_count = array('1' => $key, '2' => $val);
				}
				$$feature_name = array(
				
    			    'post_type'   => 'feature',
    			    'post_title'  => stripslashes($$feature_count['1']),
    			    'post_name'   => stripslashes($$feature_count['1']),
    			    'post_status' => 'publish',
    			    'post_content' => stripslashes($$feature_count['2']),
    			    'post_author' => 1,
    			    'post_parent' => ''
    			);

    			$new_feature_id = wp_insert_post($$feature_name);
    			$path_f = $wp_upload_dir['url'].'/icon'.$counter.'.png';
	
    			$attachment = array(
	
  					'guid' => $path_f, 
	
  					'post_mime_type' => 'image/jpeg',
	
  					'post_title' => 'slide'.$counter,
	
  					'post_content' => '',
	
  					'post_status' => 'inherit'
	
  				);
	
  				$filename = $wp_upload_dir['path'].'/icon'.$counter.'.png';
	
  				$attach_id = wp_insert_attachment( $attachment, $filename, $new_feature_id );
	
  				// you must first include the image.php file
	
  				// for the function wp_generate_attachment_metadata() to work
	
  				require_once( ABSPATH . 'wp-admin/includes/image.php' );
	
  				$attach_data = wp_generate_attachment_metadata( $attach_id, $path_f );
	
  				wp_update_attachment_metadata( $attach_id, $attach_data );
	
  				set_post_thumbnail( $new_feature_id, $attach_id );
				$count++;
    		}
			break;

		case '22' || '23' || '25' || '29'://Elegant Estates
			//Decode images from base64
			$logo_data = base64_decode($logo_data);
			$favicon_data = base64_decode($favicon_data);
			$hpimage1 = base64_decode($hpimdata1);
			$hpimage2 = base64_decode($hpimdata2);
			$hpimage3 = base64_decode($hpimdata3);
			
			//Take decoded data and place it into a readable image
			file_put_contents($wp_upload_dir['path'].'/logo.png', $logo_data);
			file_put_contents($wp_upload_dir['path'].'/favicon.ico', $favicon_data);
			file_put_contents($wp_upload_dir['path'].'/Image-1.jpeg', $hpimage1);
			file_put_contents($wp_upload_dir['path'].'/Image-2.jpeg', $hpimage2);
			file_put_contents($wp_upload_dir['path'].'/Image-3.jpeg', $hpimage3);
			file_put_contents($wp_upload_dir['path'].'/Image-4.jpeg', $hpimage4);

			//Create H1
			$data = array('option_value' => stripslashes($h1_details));
		
			$where = array('option_name' => 'widget_text');
		
			$wpdb->update('wp_options', $data, $where);
			//Create Homepage Content Boxes
			$feature_name = array(
			
    		    'post_type'   => 'feature',
    		    'post_title'  => '',
    		    'post_name'   => '',
    		    'post_status' => 'publish',
    		    'post_content' => stripslashes($hp_details),
    		    'post_author' => 1,
    		    'post_parent' => ''
    		);
			$new_feature_id = wp_insert_post($feature_name);
			break;
	}

	//Meta Description
	$mddata = array('meta_value' => stripslashes($metadescription));

	$mdwhere = array('meta_value' => 'This is where the meta description goes');

	$wpdb->update('wp_postmeta', $mddata, $mdwhere);
	//Title Tag

	$tt_data = array('option_value' => stripslashes($title_tag));

	$tt_where = array('option_name' => 'blogname');

	$wpdb->update('wp_options', $tt_data, $tt_where);

	//Site Tagline

	$st_data = array('option_value' => stripslashes($site_tagline));

	$st_where = array('option_name' => 'blogdescription');

	$wpdb->update('wp_options', $st_data, $st_where);

	//Author Nickname

	$an_data = array('display_name' => $author_nickname);

	$an_where = array('user_login' => 'admin');

	$wpdb->update('wp_users', $an_data, $an_where);

	?>

		<div class="demodatasuccess">

		<p>Homepage Successfully Created In Database</p>

		</div>

	<?php 
}

function boocontent_slider_creation(){
	include 'content.php';

		$image1 = base64_decode($feautred_image_data['1']);
		$image2 = base64_decode($feautred_image_data['2']);
		$image3 = base64_decode($feautred_image_data['3']);

		file_put_contents($wp_upload_dir['path'].'/Slider-1.jpg', $image1);
		file_put_contents($wp_upload_dir['path'].'/Slider-2.jpg', $image2);
		file_put_contents($wp_upload_dir['path'].'/Slider-3.jpg', $image3);

		$final1 = $wp_upload_dir['url'].'/Slider-1.jpg';
		$final2 = $wp_upload_dir['url'].'/Slider-2.jpg';
		$final3 = $wp_upload_dir['url'].'/Slider-3.jpg';

  		$attachment1 = array(

  			'guid' => $final1,

  			'post_mime_type' => 'image/jpg',

  			'post_title' => 'Slider-1',

  			'post_content' => '',

  			'post_excerpt' => stripslashes($slider_array['1']),

  			'post_status' => 'inherit'

  		);
  		$attachment2 = array(

  			'guid' => $final2,

  			'post_mime_type' => 'image/jpg',

  			'post_title' => 'Slider-2',

  			'post_content' => '',

  			'post_excerpt' => stripslashes($slider_array['2']),

  			'post_status' => 'inherit'

  		);
  		$attachment3 = array(

  			'guid' => $final3,

  			'post_mime_type' => 'image/jpg',

  			'post_title' => 'Slider-3',

  			'post_content' => '',

  			'post_excerpt' => stripslashes($slider_array['3']),

  			'post_status' => 'inherit'

  		);

  		$filename1 = $wp_upload_dir['path'].'/Slider-1.jpg';
  		$filename2 = $wp_upload_dir['path'].'/Slider-2.jpg';
  		$filename3 = $wp_upload_dir['path'].'/Slider-3.jpg';

  		$attach_id1 = wp_insert_attachment( $attachment1, $filename1, $slider_id );
  		$attach_id2 = wp_insert_attachment( $attachment2, $filename2, $slider_id );
  		$attach_id3 = wp_insert_attachment( $attachment3, $filename3, $slider_id );

  		// you must first include the image.php file

  		// for the function wp_generate_attachment_metadata() to work

  		require_once( ABSPATH . 'wp-admin/includes/image.php' );

  		$attach_data1 = wp_generate_attachment_metadata( $attach_id1, $final1 );
  		$attach_data2 = wp_generate_attachment_metadata( $attach_id2, $final2 );
  		$attach_data3 = wp_generate_attachment_metadata( $attach_id3, $final3 );

  		wp_update_attachment_metadata( $attach_id1, $attach_data1 );
  		wp_update_attachment_metadata( $attach_id2, $attach_data2 );
  		wp_update_attachment_metadata( $attach_id3, $attach_data3 );
}

function boocontent_update_robots(){
	update_option( 'kb_robotstxt', 'User-agent: *'."\n".'Disallow:'."\n".'Sitemap: '.get_bloginfo('url').'/sitemap.xml' );
}

function boocontent_parse_wireframe(){
	include 'content.php';
	$wf = $wireframe;
	return $wf;
}

function boocontent_parse_slider(){
	include 'content.php';
	$wk = $slider;
	return $wk;
}

function get_excerpt_by_id($post_id){
	$the_post = get_post($post_id); //Gets post ID
	$the_excerpt = $the_post->post_content; //Gets post_content to be used as a basis for the excerpt
	$excerpt_length = 12; //Sets excerpt length by word count
	$the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
	$words = explode(' ', $the_excerpt, $excerpt_length + 1);
	if(count($words) > $excerpt_length) :
	array_pop($words);
	array_push($words, '…');
	$the_excerpt = implode(' ', $words);
	endif;
	$the_excerpt = '<p>' . $the_excerpt . '</p>';
	return $the_excerpt;
}


$api_url = 'http://66.147.244.85/~ecoabsor/Master_Project/wireframe_forms/plugins/api';
$plugin_slug = basename(dirname(__FILE__));


// Take over the update check
add_filter('pre_set_site_transient_update_plugins', 'check_for_plugin_update');

function check_for_plugin_update($checked_data) {
	global $api_url, $plugin_slug, $wp_version;
	
	//Comment out these two lines during testing.
	if (empty($checked_data->checked))
		return $checked_data;
	
	$args = array(
		'slug' => $plugin_slug,
		'version' => $checked_data->checked[$plugin_slug .'/'. $plugin_slug .'.php'],
	);
	$request_string = array(
			'body' => array(
				'action' => 'basic_check', 
				'request' => serialize($args),
				'api-key' => md5(get_bloginfo('url'))
			),
			'user-agent' => 'WordPress/' . $wp_version . '; ' . get_bloginfo('url')
		);
	
	// Start checking for an update
	$raw_response = wp_remote_post($api_url, $request_string);
	
	if (!is_wp_error($raw_response) && ($raw_response['response']['code'] == 200))
		$response = unserialize($raw_response['body']);
	
	if (is_object($response) && !empty($response)) // Feed the update data into WP updater
		$checked_data->response[$plugin_slug .'/'. $plugin_slug .'.php'] = $response;
	
	return $checked_data;
}


// Take over the Plugin info screen
add_filter('plugins_api', 'plugin_api_call', 10, 3);

function plugin_api_call($def, $action, $args) {
	global $plugin_slug, $api_url, $wp_version;
	
	if (!isset($args->slug) || ($args->slug != $plugin_slug))
		return false;
	
	// Get the current version
	$plugin_info = get_site_transient('update_plugins');
	$current_version = $plugin_info->checked[$plugin_slug .'/'. $plugin_slug .'.php'];
	$args->version = $current_version;
	
	$request_string = array(
			'body' => array(
				'action' => $action, 
				'request' => serialize($args),
				'api-key' => md5(get_bloginfo('url'))
			),
			'user-agent' => 'WordPress/' . $wp_version . '; ' . get_bloginfo('url')
		);
	
	$request = wp_remote_post($api_url, $request_string);
	
	if (is_wp_error($request)) {
		$res = new WP_Error('plugins_api_failed', __('An Unexpected HTTP Error occurred during the API request.</p> <p><a href="?" onclick="document.location.reload(); return false;">Try again</a>'), $request->get_error_message());
	} else {
		$res = unserialize($request['body']);
		
		if ($res === false)
			$res = new WP_Error('plugins_api_failed', __('An unknown error occurred'), $request['body']);
	}
	
	return $res;
}
?>