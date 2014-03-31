<?php
error_reporting(E_ALL ^ E_NOTICE);
//--------------SITE VARIABLES-------------
//WordPress Database Connection
$wp_db_connect = 'global $'.'wpdb;';
//Wordpress Site URL
$site_url = '$'.'site_url '.'= $wpdb->get_var( $wpdb->prepare("SELECT option_value FROM $wpdb->options WHERE option_name = '."'".'siteurl'."'".'"));';
$wireframe = $_POST['wireframe'];
//-------------HUSTLE----------------
if ($wireframe == "18"){
	$hust_slide_title1 = addslashes(msword_conversion($_POST['slider_title_1']));
	$hust_slide_title2 = addslashes(msword_conversion($_POST['slider_title_2']));
	$hust_slide_title3 = addslashes(msword_conversion($_POST['slider_title_3']));
	$hust_slide_title1 = addslashes(msword_conversion($hust_slide_title1));
	$hust_slide_title2 = addslashes(msword_conversion($hust_slide_title2));
	$hust_slide_title3 = addslashes(msword_conversion($hust_slide_title3));
	
	$hust_slide_content1 = addslashes(msword_conversion($_POST['slider_content_1']));
	$hust_slide_content2 = addslashes(msword_conversion($_POST['slider_content_2']));
	$hust_slide_content3 = addslashes(msword_conversion($_POST['slider_content_3']));
	$hust_slide_content1 = addslashes(msword_conversion($hust_slide_content1));
	$hust_slide_content2 = addslashes(msword_conversion($hust_slide_content2));
	$hust_slide_content3 = addslashes(msword_conversion($hust_slide_content3));

	$hpicon1 = file_get_contents('content/'.$_POST['domain'].'/icon1.png');
	$icondata1 = base64_encode($hpicon1);
	$hpicon2 = file_get_contents('content/'.$_POST['domain'].'/icon2.png');
	$icondata2 = base64_encode($hpicon2);
	$hpicon3 = file_get_contents('content/'.$_POST['domain'].'/icon3.png');
	$icondata3 = base64_encode($hpicon3);

	$bgimg = file_get_contents('content/'.$_POST['domain'].'/background.jpg');
	$bg_data = base64_encode($bgimg);

	$hust_tagline = $_POST['hustle_tagline'];
}
if ($wireframe == "21"){
	$pixe_slide_title = $_POST['slider_title'];
	$pixe_slide_content = $_POST['slider_content'];

	$hpslide = file_get_contents('content/'.$_POST['domain'].'/slider1.jpg');
	$slidedata = base64_encode($hpslide);
	$hpicon1 = file_get_contents('content/'.$_POST['domain'].'/icon1.png');
	$icondata1 = base64_encode($hpicon1);
	$hpicon2 = file_get_contents('content/'.$_POST['domain'].'/icon2.png');
	$icondata2 = base64_encode($hpicon2);
	$hpicon3 = file_get_contents('content/'.$_POST['domain'].'/icon3.png');
	$icondata3 = base64_encode($hpicon3);
}

if ($wireframe == '28'){
	$widgetkit = 'true';
	$wk_ID = $_POST['widgetkitid'];

	$slidecaption1 = addslashes(msword_conversion($_POST['slider_caption_1']));
	$slidecaption2 = addslashes(msword_conversion($_POST['slider_caption_2']));
	$slidecaption3 = addslashes(msword_conversion($_POST['slider_caption_3']));
	$slidecaption4 = addslashes(msword_conversion($_POST['slider_caption_4']));

	$im1 = file_get_contents('content/'.$_POST['domain'].'/slider1.jpg');
	$imdata1 = base64_encode($im1);
	$im2 = file_get_contents('content/'.$_POST['domain'].'/slider2.jpg');
	$imdata2 = base64_encode($im2);
	$im3 = file_get_contents('content/'.$_POST['domain'].'/slider3.jpg');
	$imdata3 = base64_encode($im3);
	$im4 = file_get_contents('content/'.$_POST['domain'].'/slider4.jpg');
	$imdata4 = base64_encode($im4);

	$hpim5 = file_get_contents('content/'.$_POST['domain'].'/image5.jpg');
	$hpimdata5 = base64_encode($hpim5);

	$wk_details = '{"type":"gallery","id":216,"name":"sliders","settings":{"style":"wall","width":"auto","height":"auto","order":"default","effect":"spotlight","margin":"","corners":"","lightbox":0,"lightbox_caption":1,"spotlight_effect":"top"},"style":"wall","paths":["\/slider"],"captions":{"\/slider\/slider-1.jpg":"<h2><a href=\"\/'."'".'.$'.'page_titles['."'".'3'."'".']'.".'".'\/">'.addslashes($slidecaption1).'<\/a><\/h2>","\/slider\/slider-2.jpg":"<h2><a href=\"\/'."'".'.$'.'page_titles['."'".'0'."'".']'.".'".'\/">'.addslashes($slidecaption2).'<\/a><\/h2>","\/slider\/slider-3.jpg":"<h2><a href=\"\/'."'".'.$'.'page_titles['."'".'1'."'".']'.".'".'\/">'.addslashes($slidecaption3).'<\/a><\/h2>","\/slider\/slider-4.jpg":"<h2><a href=\"\/'."'".'.$'.'page_titles['."'".'2'."'".']'.".'".'\/">'.addslashes($slidecaption4).'<\/a><\/h2>"},"links":{"\/slider\/slider-1.jpg":"","\/slider\/slider-2.jpg":"","\/slider\/slider-3.jpg":"","\/slider\/slider-4.jpg":""}}';
} else {$wk_ID = ""; $slidecaption1 = ""; $slidecaption2 = ""; $slidecaption3 = ""; $slidecaption4 = ""; $wk_details = "";}
//--------------WIDGETKIT------------
if (isset($_POST['slider']) && $_POST['slider'] == 'true'){

	//--------------Needs Export--------
	$slider_id = $_POST['slider_id'];
	$slider = 'true';

	$slidecaption1 = addslashes(msword_conversion($_POST['slider_caption_1']));

	$slidecaption2 = addslashes(msword_conversion($_POST['slider_caption_2']));

	$slidecaption3 = addslashes(msword_conversion($_POST['slider_caption_3']));

	$im1 = file_get_contents('content/'.$_POST['domain'].'/slider1.jpg');
	//--------------Needs Export (as array)--------
	$imdata1 = base64_encode($im1);
	$im2 = file_get_contents('content/'.$_POST['domain'].'/slider2.jpg');
	//--------------Needs Export (as array)--------
	$imdata2 = base64_encode($im2);
	$im3 = file_get_contents('content/'.$_POST['domain'].'/slider3.jpg');
	//--------------Needs Export (as array)--------
	$imdata3 = base64_encode($im3);

} 

if ($wireframe == "20"){
	$slidecaption1 = addslashes(msword_conversion($_POST['slider_caption_1']));

	$slidecaption2 = addslashes(msword_conversion($_POST['slider_caption_2']));

	$slidecaption3 = addslashes(msword_conversion($_POST['slider_caption_3']));
	$im1 = file_get_contents('content/'.$_POST['domain'].'/slider1.jpg');
	$imdata1 = base64_encode($im1);
	$im2 = file_get_contents('content/'.$_POST['domain'].'/slider2.jpg');
	$imdata2 = base64_encode($im2);
	$im3 = file_get_contents('content/'.$_POST['domain'].'/slider3.jpg');
	$imdata3 = base64_encode($im3);
}
//Featured Images
//----Featured Images NO WIDGETKIT--
if (isset($_POST['slider']) && $_POST['slider'] == 'false'){
	//--------------Needs Export--------
	$slider = 'false';
	//--------------Needs Export--------
	$im1 = file_get_contents('content/'.$_POST['domain'].'/slider1.jpg');
	//--------------Needs Export (as array)--------
	$imdata1 = base64_encode($im1);
	$im2 = file_get_contents('content/'.$_POST['domain'].'/slider2.jpg');
	//--------------Needs Export (as array)--------
	$imdata2 = base64_encode($im2);
	$im3 = file_get_contents('content/'.$_POST['domain'].'/slider3.jpg');
	//--------------Needs Export (as array)--------
	$imdata3 = base64_encode($im3);
	
}

//--------------Home Page------------------

//Author Nickname

//--------------Needs Export--------
$author_nickname = $_POST['author_nickname'];

//Title Tag

//--------------Needs Export--------

$title_tag = $_POST['title_tag'];

//Site Tagline

//--------------Needs Export--------
if (isset($_POST['site_tagline'])){
	$site_tagline = $_POST['site_tagline'];
} else {$site_tagline = "";}

//Meta Description

//--------------Needs Export--------

$metadescription = $_POST['meta_description'];

//Home Page title

$h1content = $_POST['h1content'];

//Favicon
$favicon_init = file_get_contents('content/'.$_POST['domain'].'/favicon.ico');

$favicon_data = base64_encode($favicon_init);

//Logo
$logo_init = file_get_contents('content/'.$_POST['domain'].'/logo.png');

$logo_data = base64_encode($logo_init);

if ($wireframe == '14' || $wireframe == '30' || $wireframe == '26'){
	$image_ext = '.png';
} else {
	$image_ext = '.jpg';
}
//Background Image Data
if($wireframe == '25' || $wireframe == '29'){
	$bg_imdata = file_get_contents('content/'.$_POST['domain'].'/background.jpg');
	$bg_imdata = base64_encode($bg_imdata);
}
//Lomogo Data
$lomogodata = file_get_contents('content/'.$_POST['domain'].'/lomogo.png');
$lomogodata = base64_encode($lomogodata);
//Image/Title/Content 1
$home_num_images = array();
$hp_num = $_POST['homepage_content_boxes'];
for ($i = 1; $i <= $hp_num; $i++){
	$hpim_num = "hpim".$i;
	$hpimdata_num = "hpimdata".$i;
	$title_num = "title".$i;
	$content_num = "content".$i;
	$$hpim_num = file_get_contents('content/'.$_POST['domain'].'/image'.$i.$image_ext);
	$$hpimdata_num = base64_encode($$hpim_num);
	$$title_num = $_POST[$title_num];
	$$content_num = $_POST[$content_num];
}
if ($hp_num < 4){
	$title4 = "";
	$content4 = "";
	$title5 = "";
	$content5 = "";
	$hpimage4 = "'';";
}

if(isset($h1content)){
	$h1content = addslashes(msword_conversion($h1content));
}
if (isset($title1)){
	$title1 = addslashes(msword_conversion($title1));
}
if (isset($title2)){
	$title2 = addslashes(msword_conversion($title2));
}
if (isset($title3)){
	$title3 = addslashes(msword_conversion($title3));
}
if (isset($title4)){
	$title4 = addslashes(msword_conversion($title4));
}
if (isset($title5)){
	$title5 = addslashes(msword_conversion($title5));
}
if (isset($content1)){
	$content1 = addslashes(msword_conversion($content1));
}
if (isset($content2)){
	$content2 = addslashes(msword_conversion($content2));
}
if (isset($content3)){
	$content3 = addslashes(msword_conversion($content3));
}
if (isset($content4)){
	$content4 = addslashes(msword_conversion($content4));
}
if (isset($content5)){
	$content5 = addslashes(msword_conversion($content5));
}

$h1_con_len = strlen($h1content);

$homepage_details = array(
	"1" => '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first">[soliloquy id='.$slider_id.']<h1>'.$h1content.'</h1></div><div class="et_lb_module et_lb_column et_lb_1_2 et_lb_first"><div class="et_lb_module et_lb_text_block box1"><h2>'.$title1.'</h2><div><img alt="'.$title1.'" src="/wp-content/uploads/Image-1.jpeg"></div><p>'.$content1.'</p></div><div class="et_lb_module et_lb_text_block box2"><h2>'.$title2.'</h2><div><img alt="'.$title2.'" src="/wp-content/uploads/Image-2.jpeg"></div><p>'.$content2.'</p></div><div class="et_lb_module et_lb_text_block box3"><h2>'.$title3.'</h2><div><img alt="'.$title3.'" src="/wp-content/uploads/Image-3.jpeg"></div><p>'.$content3.'</p></div></div><div class="et_lb_module et_lb_column et_lb_1_2"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div> <!-- end .et_lb_widget_area --></div> <!-- end .et_lb_column_et_lb_1_2 --></div>',
	"2" => '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first">[soliloquy id='.$slider_id.']<h1>'.$h1content.'</h1></div><div class="et_lb_module et_lb_column et_lb_1_4 et_lb_first"><div class="et_lb_module et_lb_text_block box1"><h2>'.$title1.'</h2><div><img alt="'.$title1.'" src="/wp-content/uploads/Image-1.jpeg"></div><p>'.$content1.'</p></div><div class="et_lb_module et_lb_text_block box3"><h2>'.$title3.'</h2><div><img alt="'.$title3.'" src="/wp-content/uploads/Image-3.jpeg"></div><p>'.$content3.'</p></div></div><div class="et_lb_module et_lb_column et_lb_1_2"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div></div><div class="et_lb_module et_lb_column et_lb_1_4"><div class="et_lb_module et_lb_text_block box2"><h2>'.$title2.'</h2><div><img alt="'.$title2.'" src="/wp-content/uploads/Image-2.jpeg"></div><p>'.$content2.'</p></div><div class="et_lb_module et_lb_text_block box4"><h2>'.$title4.'</h2><div><img alt="'.$title4.'" src="/wp-content/uploads/Image-4.jpeg"></div><p>'.$content4.'</p></div></div></div>',
	"3" => '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first">[soliloquy id='.$slider_id.']<h1>'.$h1content.'</h1></div><div class="et_lb_module et_lb_column et_lb_2_3 et_lb_first"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div></div><div class="et_lb_module et_lb_column et_lb_1_3"><div class="et_lb_module et_lb_text_block box1"><h2>'.$title1.'</h2><div><img alt="'.$title1.'" src="/wp-content/uploads/Image-1.jpeg"></div><p>'.$content1.'</p></div><div class="et_lb_module et_lb_text_block box2"><h2>'.$title2.'</h2><div><img alt="'.$title2.'" src="/wp-content/uploads/Image-2.jpeg"></div><p>'.$content2.'</p></div><div class="et_lb_module et_lb_text_block box3"><h2>'.$title3.'</h2><div><img alt="'.$title3.'" src="/wp-content/uploads/Image-3.jpeg"></div><p>'.$content3.'</p></div></div></div>',
	"4" => '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first">[soliloquy id='.$slider_id.']<h1>'.$h1content.'</h1></div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_column et_lb_1_3 et_lb_first"><div class="et_lb_module et_lb_text_block box1"><h2>'.$title1.'</h2><div><img alt="'.$title1.'" src="/wp-content/uploads/Image-1.jpeg"></div><p>'.$content1.'</p></div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_text_block box3"><h2>'.$title2.'</h2><div><img alt="'.$title2.'" src="/wp-content/uploads/Image-2.jpeg"></div><p>'.$content2.'</p></div> <!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_1_3 --><div class="et_lb_module et_lb_column et_lb_1_3"><div class="et_lb_module et_lb_text_block box2"><h2>'.$title3.'</h2><div><img alt="'.$title3.'" src="/wp-content/uploads/Image-3.jpeg"></div><p>'.$content3.'</p></div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_text_block box4"><h2>'.$title4.'</h2><div><img alt="'.$title4.'" src="/wp-content/uploads/Image-4.jpeg"></div><p>'.$content4.'</p></div> <!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_1_3 --><div class="et_lb_module et_lb_column et_lb_1_3"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div> <!-- end .et_lb_widget_area --></div> <!-- end .et_lb_column_et_lb_1_3 --></div>',
	"5" => '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first">[soliloquy id='.$slider_id.']<h1>'.$h1content.'</h1></div><div class="et_lb_module et_lb_column et_lb_1_2 et_lb_first"><div class="et_lb_module et_lb_text_block box"><h2>'.$title1.'</h2><div class="image1"><img alt="'.$title1.'" src="/wp-content/uploads/Image-1.jpeg" /></div><p>'.$content1.'</p><div class="image2"><img alt="'.$title1.'" src="/wp-content/uploads/Image-2.jpeg" /></div><p>'.$content2.'</p></div></div><div class="et_lb_module et_lb_column et_lb_1_2"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div></div></div>',
	"6" => '<div class="et_builder clearfix"><div class="et_lb_module et_lb_column et_lb_2_3 et_lb_first"><div class="et_lb_module et_lb_text_block">[soliloquy id='.$slider_id.']<div id="home-wrapper"><h1>'.$h1content.'</h1><p class="top-content">'.$content1.'</p><div id="bottom-left"><img class="homepage" alt="'.$title1.'" src="/wp-content/uploads/Image-1.jpeg"><h2>'.$title1.'</h2><p class="bottom-content">'.$content2.'</p></div><div id="bottom-right"><img class="homepage" alt="'.$title2.'" src="/wp-content/uploads/Image-2.jpeg"><h2>'.$title2.'</h2><p class="bottom-content">'.$content3.'</p></div></div></div> <!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_2_3 --><div class="et_lb_module et_lb_column et_lb_1_3"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div> <!-- end .et_lb_widget_area --></div> <!-- end .et_lb_column_et_lb_1_3 --></div>',
	"7" => '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first homepage-title"><h1>'.$h1content.'</h1></div><div class="et_lb_module et_lb_widget_area et_lb_first">[do_widget "Recent Posts"]</div><div class="et_lb_module et_lb_column et_lb_1_3 et_lb_first"><div class="et_lb_module et_lb_text_block box1"><h2>'.$title1.'</h2><div><img alt="'.$title1.'" src="/wp-content/uploads/Image-1.jpeg"></div><p>'.$content1.'</p></div></div><div class="et_lb_module et_lb_column et_lb_1_3"><div class="et_lb_module et_lb_text_block box2"><h2>'.$title2.'</h2><div><img alt="'.$title2.'" src="/wp-content/uploads/Image-2.jpeg"></div><p>'.$content2.'</p></div></div><div class="et_lb_module et_lb_column et_lb_1_3"><div class="et_lb_module et_lb_text_block box3"><h2>'.$title3.'</h2><div><img alt="'.$title3.'" src="/wp-content/uploads/Image-3.jpeg"></div><p>'.$content3.'</p></div></div></div>',
	"8" => '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first">[soliloquy id='.$slider_id.']</div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_column et_lb_3_4 et_lb_first"><div class="et_lb_module et_lb_text_block box"><h1>'.$h1content.'</h1><div id="home-image"><img alt="'.$h1content.'" src="/wp-content/uploads/Image-1.jpeg"></div><div id="home-content"><p>'.$content1.'</p></div><div style="clear: both;"></div><div class="box1" id="bottom-left"><h3>'.$title2.'</h3><p>'.$content2.'</p></div><div class="box2" id="bottom-left"><h3>'.$title3.'</h3><p>'.$content3.'</p></div><div class="box3" id="bottom-right"><h3>'.$title4.'</h3><p>'.$content4.'</p></div></div><!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_3_4 --><div class="et_lb_module et_lb_column et_lb_1_4"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div> <!-- end .et_lb_widget_area --></div> <!-- end .et_lb_column_et_lb_1_4 --></div>',
	"9" => '<div class="et_builder clearfix"><div class="et_lb_module et_lb_column et_lb_3_4 et_lb_first"><div class="et_lb_module et_lb_text_block">[soliloquy id='.$slider_id.']<h1>'.$h1content.'</h1></div><div class="et_lb_module et_lb_text_block box1"><h2>'.$title1.'</h2><p><img alt="'.$title1.'" src="/wp-content/uploads/Image-1.jpeg">'.$content1.'</p></div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_text_block box2"><h2>'.$title2.'</h2><p><img alt="'.$title2.'" src="/wp-content/uploads/Image-2.jpeg">'.$content2.'</p></div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_text_block box3"><h2>'.$title3.'</h2><p><img alt="'.$title3.'" src="/wp-content/uploads/Image-3.jpeg">'.$content3.'</p></div> <!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_3_4 --><div class="et_lb_module et_lb_column et_lb_1_4"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div> <!-- end .et_lb_widget_area --></div> <!-- end .et_lb_column_et_lb_1_4 --></div>',
	"10" => '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first">[soliloquy id='.$slider_id.']<h1>'.$h1content.'</h1></div><div class="et_lb_module et_lb_column et_lb_2_3 et_lb_first"><div class="et_lb_module et_lb_text_block box1"><div><img class="float-left" alt="'.$title1.'" src="/wp-content/uploads/Image-1.jpeg"></div><div id="main-content"><h2>'.$title1.'</h2><p>'.$content1.'</p></div></div><div class="et_lb_module et_lb_text_block box2"><h2>'.$title2.'</h2><div id="feature-1"><p>'.$content2.'</p><div><img alt="'.$title2.'" src="/wp-content/uploads/Image-2.jpeg"></div></div><div id="feature-2"><div><img alt="'.$title3.'" src="/wp-content/uploads/Image-3.jpeg"></div><p>'.$content3.'</p></div></div></div><div class="et_lb_module et_lb_column et_lb_1_3"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div></div></div>',
	"11" => '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first">[soliloquy id='.$slider_id.']<h1>'.$h1content.'</h1></div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_column et_lb_1_2 et_lb_first"><div class="et_lb_module et_lb_text_block box1"><h2 style="margin-bottom: 5px;">'.$title1.'</h2><hr><p style="margin-top: 15px;">'.$content1.'</p></div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_text_block box2"><div id="float-left"><h2>'.$title2.'</h2><div><img alt="'.$title2.'" src="/wp-content/uploads/Image-1.jpeg"></div><p>'.$content2.'</p></div><div id="float-right"><h2>'.$title3.'</h2><div><img alt="'.$title3.'" src="/wp-content/uploads/Image-2.jpeg"></div><p>'.$content3.'</p></div></div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_text_block box3"><div id="float-left"><h2>'.$title4.'</h2><div><img alt="'.$title4.'" src="/wp-content/uploads/Image-3.jpeg"></div><p>'.$content4.'</p></div><div id="float-right"><h2>'.$title5.'</h2><div><img alt="'.$title5.'" src="/wp-content/uploads/Image-4.jpeg"></div><p>'.$content5.'</p></div></div> <!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_1_2 --><div class="et_lb_module et_lb_column et_lb_1_2"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div> <!-- end .et_lb_widget_area --></div> <!-- end .et_lb_column_et_lb_1_2 --></div>',
	"12" => '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first">[soliloquy id='.$slider_id.']</div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_column et_lb_1_3 et_lb_first"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div> <!-- end .et_lb_widget_area --></div> <!-- end .et_lb_column_et_lb_1_3 --><div class="et_lb_module et_lb_column et_lb_2_3"><div class="et_lb_module et_lb_text_block box1"><div id="top-content"><h1>'.$h1content.'</h1><div><img alt="'.$h1content.'" src="/wp-content/uploads/Image-1.jpeg"></div><p>'.$content1.'</p></div></div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_text_block box2"><div class="float-left"><div><img alt="" src="/wp-content/uploads/Image-2.jpeg"></div><p>'.$content2.'</p></div><div class="float-left"><div><img alt="" src="/wp-content/uploads/Image-3.jpeg"></div><p>'.$content3.'</p></div><div class="float-right"><div><img alt="" src="/wp-content/uploads/Image-4.jpeg"></div><p>'.$content4.'</p></div></div> <!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_2_3 --></div>',
	"13" => '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first"><h1>'.$h1content.'</h1></div><div class="et_lb_module et_lb_column et_lb_2_3 et_lb_first"><div class="et_lb_module et_lb_text_block box1"><div><img class="homepage" alt="'.$title1.'" src="/wp-content/uploads/Image-1.jpeg"></div><h4>'.$title1.'</h4><p>'.$content1.'</p></div><div class="et_lb_module et_lb_text_block box2"><div><img class="homepage" alt="'.$title2.'" src="/wp-content/uploads/Image-2.jpeg"></div><h4>'.$title2.'</h4><p>'.$content2.'</p></div><div class="et_lb_module et_lb_text_block box3"><div><img class="homepage" alt="'.$title3.'" src="/wp-content/uploads/Image-3.jpeg"></div><h4>'.$title3.'</h4><p>'.$content3.'</p></div><div class="et_lb_module et_lb_text_block box4"><div><img class="homepage" alt="'.$title4.'" src="/wp-content/uploads/Image-4.jpeg"></div><h4>'.$title4.'</h4><p>'.$content4.'</p></div></div><div class="et_lb_module et_lb_column et_lb_1_3"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div></div></div>',
	"14" => '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first">[soliloquy id='.$slider_id.']<h1>'.$h1content.'</h1></div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_column et_lb_1_4 et_lb_first"><div class="et_lb_module et_lb_text_block box1"><p><img alt="'.$title1.'" src="/wp-content/uploads/Image-1.png"></p><h6>'.$title1.'</h6><p>'.$content1.'</p></div> <!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_1_4 --><div class="et_lb_module et_lb_column et_lb_1_4"><div class="et_lb_module et_lb_text_block box2"><p><img alt="'.$title2.'" src="/wp-content/uploads/Image-2.png"></p><h6>'.$title2.'</h6><p>'.$content2.'</p></div> <!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_1_4 --><div class="et_lb_module et_lb_column et_lb_1_4"><div class="et_lb_module et_lb_text_block box3"><p><img alt="'.$title3.'" src="/wp-content/uploads/Image-3.png"></p><h6>'.$title1.'</h6><p>'.$content3.'</p></div> <!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_1_4 --><div class="et_lb_module et_lb_column et_lb_1_4"><div class="et_lb_module et_lb_text_block box4"><p><img alt="'.$title4.'" src="/wp-content/uploads/Image-4.png"></p><h6>'.$title4.'</h6><p>'.$content4.'</p></div> <!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_1_4 --></div>',
	"15" => '<div class="et_builder clearfix"><div class="et_lb_module et_lb_column et_lb_1_3 et_lb_first"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div> <!-- end .et_lb_widget_area --></div> <!-- end .et_lb_column_et_lb_1_3 --><div class="et_lb_module et_lb_column et_lb_2_3"><div class="et_lb_module et_lb_text_block box">[soliloquy id='.$slider_id.']<h1>'.$h1content.'</h1><div class="float-left"><div><img alt="'.$title2.'" src="/wp-content/uploads/Image-1.jpeg"></div><h3>'.$title2.'</h3><p>'.$content2.'</p></div><div class="float-right"><div><img alt="'.$title3.'" src="/wp-content/uploads/Image-2.jpeg"></div><h3>'.$title3.'</h3><p>'.$content3.'</p></div><div id="bottom"><p><img class="img" alt="'.$title1.'" src="/wp-content/uploads/Image-3.jpeg"></p><h3>'.$title1.'</h3><p class="bottom">'.$content1.'</p></div></div> <!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_2_3 --></div>',
	"16" => 'a:5:{i:2;a:3:{s:5:"title";s:15:"'.$title1.'";s:4:"text";s:375:"<p>'.$content1.'</p><img alt="'.$title1.'"class="homepage" src="/wp-content/uploads/Image-1.jpeg" />";s:4:"type";s:4:"html";}i:3;a:3:{s:5:"title";s:15:"'.$title2.'";s:4:"text";s:375:"<img alt="'.$title2.'" class="homepage" src="/wp-content/uploads/Image-2.jpeg" /><p>'.$content2.'</p>";s:4:"type";s:4:"html";}i:4;a:3:{s:5:"title";s:15:"'.$title3.'";s:4:"text";s:375:"<p>'.$content3.'</p><img alt="'.$title3.'" class="homepage" src="/wp-content/uploads/Image-3.jpeg" />";s:4:"type";s:4:"html";}i:5;a:3:{s:5:"title";s:15:"'.$title4.'";s:4:"text";s:375:"<img alt="'.$title4.'" class="homepage" src="/wp-content/uploads/Image-2.jpeg" /><p>'.$content4.'</p>";s:4:"type";s:4:"html";}s:12:"_multiwidget";i:1;}',
	"17" => '<div class="et_builder clearfix"><div class="et_lb_module et_lb_column et_lb_1_3 et_lb_first"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div> <!-- end .et_lb_widget_area --></div> <!-- end .et_lb_column_et_lb_1_3 --><div class="et_lb_module et_lb_column et_lb_2_3"><div class="et_lb_module et_lb_text_block box"><div id="home-wrapper"><h1>'.$h1content.'</h1><p class="top-content">'.$content1.'</p><div id="bottom-left"><div><img class="homepage" alt="'.$title2.'" src="/wp-content/uploads/Image-1.jpeg"></div><h4 class="move1">'.$title2.'</h4><p class="bottom-content">'.$content2.'</p></div><div id="bottom-right"><div><img class="homepage" alt="'.$title3.'" src="/wp-content/uploads/Image-2.jpeg"></div><h4 class="move1">'.$title3.'</h4><p class="bottom-content">'.$content3.'</p></div></div></div> <!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_2_3 --></div>',
	"18" => array(
			'slide_title_1' => array($hust_slide_title1 => $hust_slide_content1.'[button link="/'."'".'.$'.'page_titles['."'".'0'."'".']'.".'".'/"] Read More [/button]'),
			'slide_title_2' => array($hust_slide_title2 => $hust_slide_content2.'[button link="/'."'".'.$'.'page_titles['."'".'1'."'".']'.".'".'/"] Read More [/button]'),
			'slide_title_3' => array($hust_slide_title3 => $hust_slide_content3.'[button link="/'."'".'.$'.'page_titles['."'".'2'."'".']'.".'".'/"] Read More [/button]'),
			'feature_1' => array($title1 => '<div class="cover"></div>'.$content1),
			'feature_2' => array($title2 => '<div class="cover"></div>'.$content2),
			'feature_3' => array($title3 => '<div class="cover"></div>'.$content3),),
	"19" => '<div class="et_builder clearfix"><div class="et_lb_module et_lb_column et_lb_2_3 et_lb_first"><div class="et_lb_module et_lb_text_block"><div><img class="float-left first" alt="" src="/wp-content/uploads/Image-1.jpeg"></div><div><img class="float-left" alt="" src="/wp-content/uploads/Image-2.jpeg"></div><div><img class="float-right" alt="" src="/wp-content/uploads/Image-3.jpeg"></div></div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_text_block"><h3>'.$title1.'</h3><p>'.$content1.'</p><h3>'.$title2.'</h3><p>'.$content2.'</p><h3>'.$title3.'</h3><p>'.$content3.'</p></div> <!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_2_3 --><div class="et_lb_module et_lb_column et_lb_1_3"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div> <!-- end .et_lb_widget_area --></div> <!-- end .et_lb_column_et_lb_1_3 --></div>',
	"20" => '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first"><div id="slide-wrap"><div id="left-slide"><div><img alt="" src="/wp-content/uploads/Slider-1.jpg"></div><h3><a href="/'."'".'.$'.'page_titles['."'".'0'."'".']'.".'".'/">'.$slidecaption1.'</a></h3></div><div id="right-slide"><div id="right-slide-top"><div><img alt="" src="/wp-content/uploads/Slider-2.jpg"></div><h3><a href="/'."'".'.$'.'page_titles['."'".'1'."'".']'.".'".'/">'.$slidecaption2.'</a></h3></div><div id="right-slide-bottom"><div><img alt="" src="/wp-content/uploads/Slider-3.jpg"></div><h3><a href="/'."'".'.$'.'page_titles['."'".'2'."'".']'.".'".'/">'.$slidecaption3.'</a></h3></div></div></div><div id="placeholder"></div></div><div class="et_lb_module et_lb_text_block et_lb_first page-title"><h1>'.$h1content.'</h1></div><div class="et_lb_module et_lb_widget_area et_lb_first">[do_widget "Recent Posts"]</div><div class="et_lb_module et_lb_column et_lb_1_3 et_lb_first"><div class="et_lb_module et_lb_text_block"><div><img alt="'.$title1.'" src="/wp-content/uploads/Image-1.jpeg"></div><h4>'.$title1.'</h4><p>'.$content1.'</p></div></div><div class="et_lb_module et_lb_column et_lb_1_3"><div class="et_lb_module et_lb_text_block"><div><img alt="'.$title2.'" src="/wp-content/uploads/Image-2.jpeg"></div><h4>'.$title2.'</h4><p>'.$content2.'</p></div></div><div class="et_lb_module et_lb_column et_lb_1_3"><div class="et_lb_module et_lb_text_block"><div><img alt="'.$title3.'" src="/wp-content/uploads/Image-3.jpeg"></div><h4>'.$title3.'</h4><p>'.$content3.'</p></div></div></div>',
	"21" => array(
		'slide_title' => array($pixe_slide_title => $pixe_slide_content.'[button link="'."'.".'sanitize_title('.$about_title.');'.".'".'"]Click here[/button]<img alt="/wp-content/uploads/slider1.jpg" src=""/>'), 
		'feature_1' => array($title1 => $content1),
		'feature_2' => array($title2 => $content2),
		'feature_3' => array($title3 => $content3),),
	"22" => array($h1content, '<div class="box1"><h2>'.$title1.'</h2><img alt="'.$title1.'" src="/wp-content/uploads/Image-1.jpeg" /><p>'.$content1.'</p></div><div class="box2"><h2>'.$title2.'</h2><img alt="'.$title2.'" src="/wp-content/uploads/Image-2.jpeg" /><p>'.$content2.'</p></div><div class="box3"><h2>'.$title3.'</h2><img alt="'.$title3.'" src="/wp-content/uploads/Image-3.jpeg" /><p>'.$content3.'</p></div>',),
	"23" => array($h1content, '<div class="box1"><h2>'.$title1.'</h2><img alt="'.$title1.'" src="/wp-content/uploads/Image-1.jpeg"><p>'.$content1.'</p></div><div class="box2"><h2>'.$title2.'</h2><img alt="'.$title2.'" src="/wp-content/uploads/Image-2.jpeg"><p>'.$content2.'</p></div><div class="box3"><h2>'.$title3.'</h2><img alt="'.$title3.'" src="/wp-content/uploads/Image-3.jpeg"><p>'.$content3.'</p></div>'),
	"24" => '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first">[soliloquy id='.$slider_id.']<h1>'.$h1content.'</h1></div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_column et_lb_3_4 et_lb_first"><div class="et_lb_module et_lb_text_block"><div class="left"><p><img alt="'.$title2.'" src="/wp-content/uploads/Image-1.jpeg"></p><h3>'.$title2.'</h3><p class="content">'.$content2.'</p></div><div class="center"><p><img alt="'.$title3.'" src="/wp-content/uploads/Image-2.jpeg"></p><h3>'.$title3.'</h3><p class="content">'.$content3.'</p></div><div class="right"><p><img alt="'.$title4.'" src="/wp-content/uploads/Image-3.jpeg"></p><h3>'.$title4.'</h3><p class="content">'.$content4.'</p></div><div><p><img class="homepage" alt="'.$title1.'" src="/wp-content/uploads/Image-4.jpeg"></p><h3>'.$title1.'</h3><p>'.$content1.'</p></div></div> <!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_3_4 --><div class="et_lb_module et_lb_column et_lb_1_4"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div> <!-- end .et_lb_widget_area --></div> <!-- end .et_lb_column_et_lb_1_4 --></div>',
	"25" => array($h1content, '<div class="box1"><h2>'.$title1.'</h2><img alt="'.$title1.'" src="/wp-content/uploads/Image-1.jpeg"><p>'.$content1.'</p></div><div class="box2"><h2>'.$title2.'</h2><img alt="'.$title2.'" src="/wp-content/uploads/Image-2.jpeg"><p>'.$content2.'</p></div><div class="box3"><h2>'.$title3.'</h2><img alt="'.$title3.'" src="/wp-content/uploads/Image-3.jpeg"><p>'.$content3.'</p></div>'),
	"26" => '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first">[soliloquy id='.$slider_id.']<h1 id="main">'.$h1content.'</h1></div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_column et_lb_1_2 et_lb_first"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div> <!-- end .et_lb_widget_area --></div> <!-- end .et_lb_column_et_lb_1_2 --><div class="et_lb_module et_lb_column et_lb_1_4"><div class="et_lb_module et_lb_text_block box1"><p><img alt="'.$title1.'" src="/wp-content/uploads/Image-1.png"></p><h4>'.$title1.'</h4><p>'.$content1.'</p></div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_text_block box3"><p><img alt="'.$title2.'" src="/wp-content/uploads/Image-2.png"></p><h4>'.$title2.'</h4><p>'.$content2.'</p></div> <!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_1_4 --><div class="et_lb_module et_lb_column et_lb_1_4"><div class="et_lb_module et_lb_text_block box2"><p><img alt="'.$title3.'" src="/wp-content/uploads/Image-3.png"></p><h4>'.$title3.'</h4><p>'.$content3.'</p></div> <!-- end .et_lb_text_block --><div class="et_lb_module et_lb_text_block box4"><p><img alt="'.$title4.'" src="/wp-content/uploads/Image-4.png"></p><h4>'.$title4.'</h4><p>'.$content4.'</p></div> <!-- end .et_lb_text_block --></div> <!-- end .et_lb_column_et_lb_1_4 --></div>',
	"27" => '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first">[soliloquy id='.$slider_id.']<h1>'.$h1content.'</h1></div><div class="et_lb_module et_lb_column et_lb_1_3 et_lb_first"><div class="et_lb_module et_lb_text_block"><h2>'.$title1.'</h2><p><img alt="'.$title1.'" src="/wp-content/uploads/Image-1.jpeg"><br>'.$content1.'</p></div></div><div class="et_lb_module et_lb_column et_lb_1_3"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div></div><div class="et_lb_module et_lb_column et_lb_1_3"><div class="et_lb_module et_lb_text_block"><h2>'.$title2.'</h2><p><img alt="'.$title2.'" src="/wp-content/uploads/Image-2.jpeg"><br>'.$content2.'</p></div></div></div>',
	"28" => '<div class="et_builder clearfix"><div class="et_lb_module et_lb_text_block et_lb_first">[widgetkit id='.$wk_ID.']<h1 style="text-align: center;">'.$h1content.'</h1></div><div class="et_lb_module et_lb_column et_lb_2_3 et_lb_first"><div class="et_lb_module et_lb_text_block bigbox1"><div style="clear: both;"></div><div class="box1" id="bottom-left"><h3>'.$title2.'</h3><p>'.$content2.'</p></div><div class="box2" id="bottom-left"><h3>'.$title3.'</h3><p>'.$content3.'</p></div><div class="box3" id="bottom-right"><h3>'.$title4.'</h3><p>'.$content4.'</p></div><div id="home-image"><img alt="" src="/wp-content/uploads/Image-1.jpeg"></div><div id="home-content"><p>'.$content1.'</p></div></div></div><div class="et_lb_module et_lb_column et_lb_1_3"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div></div></div>',
	"29" => array($h1content, '<div class="box1"><h2>'.$title1.'</h2><img alt="'.$title1.'" src="/wp-content/uploads/Image-1.jpeg"><p>'.$content1.'</p></div><div class="box2"><h2>'.$title2.'</h2><img alt="'.$title2.'" src="/wp-content/uploads/Image-2.jpeg"><p>'.$content2.'</p></div><div class="box3"><h2>'.$title3.'</h2><img alt="'.$title3.'" src="/wp-content/uploads/Image-3.jpeg"><p>'.$content3.'</p></div>'),
	"30" => '<div class="et_builder clearfix"><div class="et_lb_module et_lb_column et_lb_3_4 et_lb_first"><div class="et_lb_module et_lb_text_block">[soliloquy id='.$slider_id.']<h1>'.$h1content.'</h1></div><div class="et_lb_module et_lb_text_block box1"><h2>'.$title1.'</h2><div><img alt="'.$title1.'" src="/wp-content/uploads/Image-1.png"></div><p>'.$content1.'</p></div><div class="et_lb_module et_lb_text_block box2"><h2>'.$title2.'</h2><div><img alt="'.$title2.'" src="/wp-content/uploads/Image-2.png"></div><p class="box2text">'.$content2.'</p></div><div class="et_lb_module et_lb_text_block box3"><h2>'.$title3.'</h2><div><img alt="'.$title3.'" src="/wp-content/uploads/Image-3.png"></div><p>'.$content3.'</p></div></div><div class="et_lb_module et_lb_column et_lb_1_4"><div class="et_lb_module et_lb_widget_area">[do_widget "Recent Posts"]</div></div></div>',
	);

if ($wireframe == '22' || '23' || '25' || '29'){
	$h1_details = $h1content;
	$hp_details = $homepage_details[$wireframe][1];
}
if (isset($content4)){
	$mobile_home_content = "2";
} else {
	$mobile_home_content = "1";
}
$mobilehome_details = array( 
	'1' => '<h3>Recent Posts</h3>[widgets_on_pages]<div class="box1"><h2>'.$title1.'</h2><div><img alt="'.$title1.'" src="/wp-content/uploads/Image-1.jpeg" /></div>'.$content1.'</div><div class="box2"><h2>'.$title2.'</h2><div><img alt="'.$title2.'" src="/wp-content/uploads/Image-2.jpeg" /></div>'.$content2.'</div><div class="box3"><h2>'.$title3.'</h2><div><img alt="'.$title3.'" src="/wp-content/uploads/Image-3.jpeg" /></div>'.$content3.'</div>',
	'2' => '<h3>Recent Posts</h3>[widgets_on_pages]<div class="box1"><h2>'.$title1.'</h2><div><img alt="'.$title1.'" src="/wp-content/uploads/Image-1.jpeg" /></div>'.$content1.'</div><div class="box2"><h2>'.$title2.'</h2><div><img alt="'.$title2.'" src="/wp-content/uploads/Image-2.jpeg" /></div>'.$content2.'</div><div class="box3"><h2>'.$title3.'</h2><div><img alt="'.$title3.'" src="/wp-content/uploads/Image-3.jpeg" /></div>'.$content3.'</div><div class="box4"><h2>'.$title4.'</h2><div><img alt="'.$title4.'" src="/wp-content/uploads/Image-2.jpeg" /></div>'.$content4.'</div>',
	);
//----------------------PAGES----------

$about_title = $_POST['about_title'];
$about_content = $_POST['about_content'];

$page1_title = $_POST['page1_title'];
$page1_url = $_POST['page1_title'];
$page1_content = $_POST['page1_content'];

$page2_title = $_POST['page2_title'];
$page2_url = $_POST['page2_title'];
$page2_content = $_POST['page2_content'];

$page3_title = $_POST['page3_title'];
$page3_url = $_POST['page3_title'];
$page3_content = $_POST['page3_content'];

$blog_article = $_POST['blog_article'];
$blog_template = $_POST['blog_template'];



$pages = array( 

    //--------------Needs Export (as array)--------

    $about_title => array(

    	$about_content => ' '),

    $page1_title => array(

    	$page1_content => ' '),

    $page2_title => array(

    	$page2_content => ' '),

    $page3_title => array( 

    	$page3_content => ' '), 

    $blog_article => array(

    	' ' => $blog_template),

);

//--------------Needs Export (as array)--------

$nav_about = $_POST['nav_about'];

$nav_page_1 = $_POST['nav_page_1'];

$nav_page_2 = $_POST['nav_page_2'];

$nav_page_3 = $_POST['nav_page_3'];

//----------------NAV-----------------------

$menu = $_POST['menulocation'];
	$variable =
	'<?php' . "\n"
	. $wp_db_connect . "\n"
	. $site_url . "\n"
	. '$wireframe ="'. $wireframe . '";'."\n"
	. '$wp_upload_dir = wp_upload_dir();' . "\n"
	. '$metadescription = "' . addslashes(msword_conversion($metadescription)) . '";' . "\n"
	. '$page_titles = array('.'sanitize_title("'.addslashes(msword_conversion($page1_title)).'")'.','.'sanitize_title("'.addslashes(msword_conversion($page2_title)).'")'.','.'sanitize_title("'.addslashes(msword_conversion($page3_title)).'")'.','.'sanitize_title("'.addslashes(msword_conversion($about_title)).'"));' . "\n"
	. '$favicon_data = "' . $favicon_data .'";' . "\n"
	. '$logo_data = "' . $logo_data .'";' . "\n"
	. '$homepagedetails = '."'" . $homepage_details[$wireframe] ."';" . "\n"
	. '$mobilehome_details = '."'" . $mobilehome_details[$mobile_home_content] ."';" . "\n"
	. '$lomogodata = '."'".$lomogodata."';"."\n"
	. '$about_title = "' . addslashes(msword_conversion($about_title)) .'";' . "\n"
	. '$about_content = "' . addslashes(msword_conversion($about_content)) .'";' . "\n"
	. '$pages = array('.'"'.addslashes(msword_conversion($page1_title)).'"'.' => array('.'"'.addslashes(msword_conversion($page1_content)).'"'.' => ""),'.'"'.addslashes(msword_conversion($page2_title)).'"'.' => array('.'"'.addslashes(msword_conversion($page2_content)).'"'.' => ""),'.'"'.addslashes(msword_conversion($page3_title)).'"'.' => array('.'"'.addslashes(msword_conversion($page3_content)).'"'.' => ""), '.'"'.addslashes($blog_article).'"'.' => array("" => '.'"'.addslashes($blog_template).'"'.'),);' . "\n"
	. '$nav = array("1"=>'."'".addslashes(msword_conversion($nav_page_1))."'".',"2"=>'."'".addslashes(msword_conversion($nav_page_2))."'".',"3"=>'."'".addslashes(msword_conversion($nav_page_3))."'".');' . "\n"
	. '$menu = "' . $menu .'";' . "\n"
	. '$slider = "' . $slider .'";' . "\n"
	. '$nav_about = "' . addslashes(msword_conversion($nav_about)) .'";' . "\n"
	. '$title_tag = "' . addslashes(msword_conversion($title_tag)) .'";' . "\n"
	. '$site_tagline = "' . addslashes(msword_conversion($site_tagline)) .'";' . "\n"
	. '$author_nickname = "' . $author_nickname .'";' . "\n";
	if ($wireframe == '28'){
		$variable .= '$feautred_image_data = array("1"=>'."'".$imdata1."'".', "2"=>'."'".$imdata2."'".', "3"=>'."'".$imdata3."'".', "4"=>'."'".$imdata4."'".');' . "\n";
	} else {
		$variable .= '$feautred_image_data = array("1"=>'."'".$imdata1."'".', "2"=>'."'".$imdata2."'".', "3"=>'."'".$imdata3."'".');' . "\n";
	}
	if ('19' == $wireframe || '16' == $wireframe || '18' == $wireframe){
		$variable .= '$h1 = "'.$h1content.'";' . "\n";
	}
	if ($hp_num == '5'){
		$variable .= '$hpimdata5 = "' . $hpimdata5 .'";' . "\n";
	}
	if ($hp_num >= '4') {
		$variable .= '$hpimdata1 = "' . $hpimdata1 .'";' . "\n";
		$variable .= '$hpimdata2 = "' . $hpimdata2 .'";' . "\n";
		$variable .= '$hpimdata3 = "' . $hpimdata3 .'";' . "\n";
		$variable .= '$hpimdata4 = "' . $hpimdata4 .'";' . "\n";
	} else {
		$variable .= '$hpimdata1 = "' . $hpimdata1 .'";' . "\n";
		$variable .= '$hpimdata2 = "' . $hpimdata2 .'";' . "\n";
		$variable .= '$hpimdata3 = "' . $hpimdata3 .'";' . "\n";
	}
	if ($widgetkit == 'true'){
		$variable .= '$wk_ID = "' . $wk_ID .'";' . "\n";
		$variable .- '$wk_details = "' . $wk_details . '";' . "\n";
	}
	if ($slider == 'true'){
		$variable .= "$"."slider_array = array('1' => '<h2><a href=".'"'."/'.$"."page_titles"."['0"."'].'".'"'.">".$slidecaption1."</a></h2>', '2' => '<h2><a href=".'"'."/'.$"."page_titles"."['1"."'].'".'"'.">".$slidecaption2."</a></h2>','3' => '<h2><a href=".'"'."/'.$"."page_titles"."['2"."'].'".'"'.">".$slidecaption3."</a></h2>');" . "\n";
		$variable .= '$slider_id = "'.$slider_id.'";' . "\n";
	}
	if ('16' == $wireframe){
		$variable .= '$title1 = '."'".$title1."'".';'."\n";
		$variable .= '$title2 = '."'".$title2."'".';'."\n";
		$variable .= '$title3 = '."'".$title3."'".';'."\n";
		$variable .= '$title4 = '."'".$title4."'".';'."\n";

		$variable .= '$content1 = '."'".$content1."'".';'."\n";
		$variable .= '$content2 = '."'".$content2."'".';'."\n";
		$variable .= '$content3 = '."'".$content3."'".';'."\n";
		$variable .= '$content4 = '."'".$content4."'".';'."\n";
	}
	if ($wireframe == '22' || $wireframe == '23' || $wireframe == '25' || $wireframe == '29'){
		$variable .= '$hp_details = '."'" . $hp_details."'" .';'."\n";
		$variable .= '$h1_details = '."'" . $h1_details."'" .';'."\n";
		$variable .= '$bg_imdata = '."'" . $bg_imdata."'" .';'."\n";
	}
	if ($wireframe == "18"){
		$hustle_array = '';
		$hustle_array .= "'slide_title_1' => array(".'"'.$hust_slide_title1.'"'." => ".'"'.$hust_slide_content1.'"'.".'".'<br/>[button link="/'."'".'.$'.'page_titles['."'".'0'."'".']'.".'".'/"]Read More[/button]'."'),"."\n";
		$hustle_array .= "'slide_title_2' => array(".'"'.$hust_slide_title2.'"'." => ".'"'.$hust_slide_content2.'"'.".'".'<br/>[button link="/'."'".'.$'.'page_titles['."'".'1'."'".']'.".'".'/"]Read More[/button]'."'),"."\n";
		$hustle_array .= "'slide_title_3' => array(".'"'.$hust_slide_title3.'"'." => ".'"'.$hust_slide_content3.'"'.".'".'<br/>[button link="/'."'".'.$'.'page_titles['."'".'2'."'".']'.".'".'/"]Read More[/button]'."'),"."\n";
		$hustle_array .= "'feature_1' => array(".'"'.$title1.'"'." => ".'"'.'<div class=\'cover\'></div>'.$content1.'"),'."\n";
		$hustle_array .= "'feature_2' => array(".'"'.$title2.'"'." => ".'"'.'<div class=\'cover\'></div>'.$content2.'"),'."\n";
		$hustle_array .= "'feature_3' => array(".'"'.$title3.'"'." => ".'"'.'<div class=\'cover\'></div>'.$content3.'"),);'."\n";
		$variable .= '$hustle_array = array('.$hustle_array;
		$variable .= '$icondata1 = "'.$icondata1.'";'."\n";
		$variable .= '$icondata2 = "'.$icondata2.'";'."\n";
		$variable .= '$icondata3 = "'.$icondata3.'";'."\n";
		$variable .= '$bg_data = "'.$bg_data.'";'."\n";
		$variable .= '$hust_tagline ="'.$hust_tagline.'";'."\n";
	}
	if ($wireframe == "21"){
		$pixe_array = '';
		$pixe_array .= "'slide_title_1' => array(".'"'.$pixe_slide_title.'"'." => ".'"'.$pixe_slide_content.'"'.".'".'<br/>[button link="/'."'".'.sanitize_title("'.$about_title.'")'.".'".'/"]Click here[/button]<img alt="/wp-content/uploads/slider1.jpg" src=""/>'."'),"."\n";
		$pixe_array .= "'feature_1' => array(".'"'.$title1.'"'." => ".'"'.$content1.'"),'."\n";
		$pixe_array .= "'feature_2' => array(".'"'.$title2.'"'." => ".'"'.$content2.'"),'."\n";
		$pixe_array .= "'feature_3' => array(".'"'.$title3.'"'." => ".'"'.$content3.'"),);'."\n";
		$variable .= '$pixe_array = array('.$pixe_array;
		$variable .= '$icondata1 ="'.$icondata1.'";'."\n";
		$variable .= '$icondata2 ="'.$icondata2.'";'."\n";
		$variable .= '$icondata3 ="'.$icondata3.'";'."\n";
		$variable .= '$slidedata ="'.$slidedata.'";'."\n";
	}
	$variable .= '?>';

	$file = 'content/'.$_POST['domain'].'/content.php';

	file_put_contents($file, $variable);

?>