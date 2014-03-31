<?php
include('../users/loginheader.php');
include('../header.php');
include('../config.php');
error_reporting(E_ALL ^ E_NOTICE);
if(login_check($mysqli) == true) {
$domain_name = $_GET['domain'];
$wireframe = $_GET['wireframe'];
//if ($permissions == "Designer" || $permissions == "Admin"){
//$query = "SELECT SiteContent FROM DomainDetails WHERE Domain='".$domain_name."'";
//	$get_content = mysqli_query($mysqli, $query);
//	$get_content = mysqli_fetch_array($get_content);
//}
if(!empty($get_content)){$site_content = json_decode($get_content[0]);}
?>

<link rel="stylesheet" href="wf_style.css" type="text/css" />
<link rel="stylesheet" href="css/dropzone.css" type="text/css" />
<link rel="stylesheet" href="css/basic.css" type="text/css" />
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="wf_js.js"></script>
<script type="text/javascript" src="dropzone.js"></script>
<script type="text/javascript" src="tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: '.textarea',
	height : 529
 });
</script>
<div id="image_error"></div>
<div id="wrapper">
<?php if ($permissions == "Designer" || $permissions == "Admin"){
	?>
	<div id="img_sizes">
	<?php
	$logo_wmin = $design_dimensions[$wireframe]['logo.png']['minWidth'];
	$logo_wmax = $design_dimensions[$wireframe]['logo.png']['maxWidth'];
	$logo_hmin = $design_dimensions[$wireframe]['logo.png']['minHeight'];
	$logo_hmax = $design_dimensions[$wireframe]['logo.png']['maxHeight'];
	$content_min = $design_dimensions[$wireframe]['image1.jpg']['width'];
	$content_max = $design_dimensions[$wireframe]['image1.jpg']['height'];
	$sliders_min = $design_dimensions[$wireframe]['slider1.jpg']['width'];
	$sliders_max = $design_dimensions[$wireframe]['slider1.jpg']['height'];
	?>
		<h3>Logo</h3>
		<p><?=$logo_wmin;?>-<?=$logo_wmax;?>px x <?=$logo_hmin;?>-<?=$logo_hmax;?>px</p>
		<h3>Content Images</h3>
		<p><?=$content_min;?>px x <?=$content_max;?>px</p>
		<h3>Sliders</h3>
		<p><?=$sliders_min;?>px x <?=$sliders_max;?>px</p>
	</div>
<div id="upload_wrap">
	
	<form id="dropzone_form" action="upload.php" class="dropzone" method="post" enctype="multipart/form-data">
		<input style="display:none;" type="file" name="file" multiple />
		<input type="hidden" id="domain_field" name="domain" value="<?=$domain_name?>" />
		<input type="hidden" name="wireframe" value="<?=$wireframe;?>" />
	</form>
	<div class="image_content">
		<h1>Content Boxes</h1>
		<?php
		$n = $content_array[$wireframe]['homepage_boxes'];
		for ($i = 1; $i <= $n; $i++){
			?><div class="contentbox">
			<h2><?php if(isset($site_content)){echo $site_content->{"title$i"};}?></h2>
			<p><?php if(isset($site_content)){echo $site_content->{"content$i"};}?></p>
		</div>
		<?php } ?>
		<?php
		if (isset($content_array[$wireframe]['widgetkit']) && $content_array[$wireframe]['widgetkit'] == "true"){?>
		<h1>Slider Captions</h1>
		<div class="sliderbox">
		<h2><?php if(isset($site_content)){echo $site_content->{"slider_caption_1"};}?></h2>
		<h2><?php if(isset($site_content)){echo $site_content->{"slider_caption_2"};}?></h2>
		<h2><?php if(isset($site_content)){echo $site_content->{"slider_caption_3"};}?></h2>
		</div>
		<?php } ?>
	</div>
</div>
<?php } ?>
<div id="inner-wrap">
<form action="write_json.php" method="post" id="creation_form">
<ul>
<?php if(isset($domain_name)){echo '<h1>'.$domain_name.'</h1>';}?>
	<h1><?=$content_array[$wireframe]['theme_name'];?> Site Content Creation</h1>

	<?php
	$tt_min = $content_array[$wireframe]['title_tag']['min'];
	$tt_max = $content_array[$wireframe]['title_tag']['max'];
	$md_min = $content_array[$wireframe]['meta_description']['min'];
	$md_max = $content_array[$wireframe]['meta_description']['max'];
	if (isset($content_array[$wireframe]['site_tagline'])){
		$st_min = $content_array[$wireframe]['site_tagline']['min'];
		$st_max = $content_array[$wireframe]['site_tagline']['max'];
	}
	?>
	<li>
		<label for="author_nickname">Author Nickname:</label>
		<span class="range not_in_range"></span>
		<input type="text" required id="author_nickname" name="author_nickname" data-min="1" data-max="50" value="<?php if(isset($site_content)){echo $site_content->{"author_nickname"};}?>">
	</li>
	<li>
		<label for="title_tag">Title Tag (55-65 characters):</label>
		<span class="range not_in_range"></span>
		<input type="text" required id="title_tag" name="title_tag" data-min="<?=$tt_min;?>" data-max="<?=$tt_max;?>" value="<?php if(isset($site_content)){echo $site_content->{"title_tag"};}?>">
	</li>
	<li>
		<label for="meta_description">Meta Description (140-155 Characters):</label>
		<span class="range not_in_range"></span>
		<input type="text" required id="meta_description" name="meta_description" data-min="<?=$md_min;?>" data-max="<?=$md_max;?>" value="<?php if(isset($site_content)){echo $site_content->{"meta_description"};}?>">
	</li>
	<?php if (isset($content_array[$wireframe]['site_tagline'])){?>
		<li>
			<label for="site_tagline">Site Tagline (25-60 Characters):</label>
			<span class="range not_in_range"></span>
			<input type="text" required id="site_tagline" name="site_tagline" data-min="<?=$st_min;?>" data-max="<?=$st_max;?>" value="<?php if(isset($site_content)){echo $site_content->{"site_tagline"};}?>">
		</li>
	<?php } ?>



	<h3>Navigation Page Names (<?=$content_array[$wireframe]['navigation_page_names']['max'];?> Characters Max) Total Chars:</h3><span data-max="<?=$content_array[$wireframe]['navigation_page_names']['max'];?>" id="total_nav_chars"></span>


	<li>	
		<label for="nav_about">About Page:</label>
		<span class="range not_in_range"></span>
		<input type="text" required id="nav_about" name="nav_about" class="nav_range" data-min="1" data-max="100" value="<?php if(isset($site_content)){echo $site_content->{"nav_about"};}?>">
	</li>
	<li>
		<label for="nav_page_1">Page 1:</label>
		<span class="range not_in_range"></span>
		<input type="text" required id="nav_page_1" name="nav_page_1" class="nav_range" data-min="1" data-max="100" value="<?php if(isset($site_content)){echo $site_content->{"nav_page_1"};}?>">
	</li>
	<li>
		<label for="nav_page_2">Page 2:</label>
		<span class="range not_in_range"></span>
	<input type="text" required id="nav_page_2" name="nav_page_2" class="nav_range" data-min="1" data-max="100" value="<?php if(isset($site_content)){echo $site_content->{"nav_page_2"};}?>">
	</li>
	<li>
		<label for="nav_page_3">Page 3:</label>
		<span class="range not_in_range"></span>
		<input type="text" required id="nav_page_3" name="nav_page_3" class="nav_range" data-min="1" data-max="100" value="<?php if(isset($site_content)){echo $site_content->{"nav_page_3"};}?>">
	</li>


	<h2>Home Page</h2>


	<?php
	if ($wireframe == "21"){
		$pixe_slide_max = $content_array[$wireframe]['call_to_actions']['max'];
		$pixe_slide_min = $content_array[$wireframe]['call_to_actions']['min'];?>
	<li>
		<label for="slider_content">Slider 1 Title (<?=$pixe_slide_min;?>-<?=$pixe_slide_max;?> chars):</label>
		<span class="range not_in_range"></span>
		<input type="text" required id="slider_content" name="slider_content" data-min="<?=$pixe_slide_min;?>" data-max="<?=$pixe_slide_max;?>" value="<?php if(isset($site_content)){echo $site_content->{"slider_content"};}?>">
	</li>
	<?php }
	if ($wireframe == "18") {
	$ctat_min = $content_array[$wireframe]['call_to_action_titles']['min'];
	$ctat_max = $content_array[$wireframe]['call_to_action_titles']['max'];
	$ctac_min = $content_array[$wireframe]['call_to_action_content']['min'];
	$ctac_max = $content_array[$wireframe]['call_to_action_content']['max'];
	?>
	<h3>Slider Content</h3>
	<li>
		<label for="slider_title_1">Slider 1 Title (10-25 chars):</label>
		<span class="range not_in_range"></span>
		<input type="text" required id="slider_title_1" name="slider_title_1" data-min="<?=$ctat_min;?>" data-max="<?=$ctat_max;?>" value="<?php if(isset($site_content)){echo $site_content->{"slider_title_1"};}?>">
	</li>
	<li>
		<label for="slider_content_1">Slider 1 Content (130-170 chars):</label>
		<span class="range not_in_range"></span>
		<input type="text" required id="slider_content_1" name="slider_content_1" data-min="<?=$ctac_min;?>" data-max="<?=$ctac_max;?>" value="<?php if(isset($site_content)){echo $site_content->{"slider_content_1"};}?>">
	</li>

	<li>
		<label for="slider_title_2">Slider 2 Title (10-25 chars):</label>
		<span class="range not_in_range"></span>
		<input type="text" required id="slider_title_2" name="slider_title_2" data-min="<?=$ctat_min;?>" data-max="<?=$ctat_max;?>" value="<?php if(isset($site_content)){echo $site_content->{"slider_title_2"};}?>">
	</li>
	<li>
		<label for="slider_content_2">Slider 2 Content (130-170 chars):</label>
		<span class="range not_in_range"></span>
		<input type="text" required id="slider_content_2" name="slider_content_2" data-min="<?=$ctac_min;?>" data-max="<?=$ctac_max;?>" value="<?php if(isset($site_content)){echo $site_content->{"slider_content_2"};}?>">
	</li>

	<li>
		<label for="slider_title_3">Slider 3 Title (10-25 chars):</label>
		<span class="range not_in_range"></span>
		<input type="text" required id="slider_title_3" name="slider_title_3" data-min="<?=$ctat_min;?>" data-max="<?=$ctat_max;?>" value="<?php if(isset($site_content)){echo $site_content->{"slider_title_3"};}?>">
	</li>
	<li>
		<label for="slider_content_3">Slider 3 Content (130-170 chars):</label>
		<span class="range not_in_range"></span>
		<input type="text" required id="slider_content_3" name="slider_content_3" data-min="<?=$ctac_min;?>" data-max="<?=$ctac_max;?>" value="<?php if(isset($site_content)){echo $site_content->{"slider_content_3"};}?>">
	</li>
	<?php }
	if (isset($content_array[$wireframe]['widgetkit']) && $content_array[$wireframe]['widgetkit'] == "true" || isset($content_array[$wireframe]['slider']) && $content_array[$wireframe]['slider'] == 'true' || $wireframe == '20'){
	$cta_min = $content_array[$wireframe]['call_to_actions']['min'];
	$cta_max = $content_array[$wireframe]['call_to_actions']['max'];
	?>
	<h3>Slider Calls to Action (<?=$cta_min;?>-<?=$cta_max;?> Characters Each)</h3>
	<li>
		<label for="slider_caption_1">Page 1:</label>
		<span class="range not_in_range"></span>
		<input type="text" required id="slider_caption_1" name="slider_caption_1" data-min="<?=$cta_min;?>" data-max="<?=$cta_max;?>" value="<?php if(isset($site_content)){echo $site_content->{"slider_caption_1"};}?>">
	</li>

	<li>
		<label for="slider_caption_2">Page 2:</label>
		<span class="range not_in_range"></span>
		<input type="text" required id="slider_caption_2" name="slider_caption_2" data-min="<?=$cta_min;?>" data-max="<?=$cta_max;?>" value="<?php if(isset($site_content)){echo $site_content->{"slider_caption_2"};}?>">
	</li>
	<li>
		<label for="slider_caption_3">Page 3:</label>
		<span class="range not_in_range"></span>
		<input type="text" required id="slider_caption_3" name="slider_caption_3" data-min="<?=$cta_min;?>" data-max="<?=$cta_max;?>" value="<?php if(isset($site_content)){echo $site_content->{"slider_caption_3"};}?>">
	</li>
	<?php
	if ($wireframe == '28'){?>
	<li>
		<label for="slider_caption_4">Page 4:</label>
		<span class="range not_in_range"></span>
		<input type="text" required id="slider_caption_4" name="slider_caption_3" data-min="<?=$cta_min;?>" data-max="<?=$cta_max;?>" value="<?php if(isset($site_content)){echo $site_content->{"slider_caption_4"};}?>">
	</li>
	<?php } } ?>

	<h3>Home Page Content</h3>
	<?php 
	if ($wireframe == "21"){ ?>
	<li>
		<label for="slider_title">Home Page Title (10-60 Characters Max)</label>
		<span class="range not_in_range"></span>
		<input type="text" required id="slider_title" name="slider_title" data-min="10" data-max="60" value="<?php if(isset($site_content)){echo $site_content->{"slider_title"};}?>">
	</li>
	<?php } ?>

	<li>
		<label for="h1content">Home Page Title (66 Characters Max)</label>
		<span class="range not_in_range"></span>
		<input type="text" required id="h1content" name="h1content" data-min="1" data-max="66" value="<?php if(isset($site_content)){echo $site_content->{"h1content"};}?>">
	</li>
	<?php
	if (isset($content_array[$wireframe]['tagline'])){?>
	<li>
		<label for="hustle_tagline">Tagline (10-60 Characters Max)</label>
		<span class="range not_in_range"></span>
		<input type="text" required id="hustle_tagline" name="hustle_tagline" data-min="10" data-max="60" value="<?php if(isset($site_content)){echo $site_content->{"hustle_tagline"};}?>">
	</li>
	<?php }
	$start = 1;
	$n = $content_array[$wireframe]['homepage_boxes'];

	$ch_min = $content_array[$wireframe]['content_headings']['min'];
	$ch_max = $content_array[$wireframe]['content_headings']['max'];

	$cb_min = $content_array[$wireframe]['content_boxes']['min'];
	$cb_max = $content_array[$wireframe]['content_boxes']['max'];
	if (isset($content_array[$wireframe]['top_content']) || isset($content_array[$wireframe]['bottom_content'])){
		$start = 2;
		if (isset($content_array[$wireframe]['top_content_heading'])){
			$tch_min = $content_array[$wireframe]['top_content_heading']['min'];
			$tch_max = $content_array[$wireframe]['top_content_heading']['max'];
		}
		if (isset($content_array[$wireframe]['top_content'])){
			$tc_min = $content_array[$wireframe]['top_content']['min'];
			$tc_max = $content_array[$wireframe]['top_content']['max'];
		}
		if (isset($content_array[$wireframe]['bottom_content_heading'])){
			$bch_min = $content_array[$wireframe]['bottom_content_heading']['min'];
			$bch_max = $content_array[$wireframe]['bottom_content_heading']['max'];
		}
		if (isset($content_array[$wireframe]['bottom_content'])){
			$bc_min = $content_array[$wireframe]['bottom_content']['min'];
			$bc_max = $content_array[$wireframe]['bottom_content']['max'];
		}
	}
	if (isset($content_array[$wireframe]['top_content_heading'])){ ?>
		<li>
			<label for="title1">Top Content Heading (<?=$tch_min;?>-<?=$tch_max;?> Characters)</label>
			<span class="range not_in_range"></span>
			<input type="text" required id="title1" name="title1" data-min="<?=$tch_min;?>" data-max="<?=$tch_max;?>" value="<?php if(isset($site_content)){echo $site_content->{"title1"};}?>">
		</li>
		<?php } if (isset($content_array[$wireframe]['top_content'])){?>
		<li>
			<label for="content1">Top Content Box (<?=$tc_min;?>-<?=$tc_max;?> Characters)</label>
			<p><span class="edit_link" style="display: inline;">Use visual editor</span>
			<!--<span class="ta_range not_in_range"></span>-->
			<textarea class="contentbox currentcontent" type="text" id="content1" data-min="<?=$tc_min;?>" data-max="<?=$tc_max;?>" name="content1"><?php if(isset($site_content)){echo $site_content->{"content1"};}?></textarea></p>
		</li>
	<?php }
	for ($i = $start; $i <= $n; $i++){
		if ($wireframe == '10' && $i == '3' || $wireframe == '5' && $i == '2'){?>
		<li>
		</li><?php } else {
			if (isset($content_array[$wireframe]['content_headings'])){
			?>
		<li>
			<label for="title<?=$i;?>">Content Heading <?=$i;?> (<?=$ch_min;?>-<?=$ch_max;?> Characters)</label>
			<span class="range not_in_range"></span>
			<input type="text" required id="title<?=$i;?>" name="title<?=$i;?>" data-min="<?=$ch_min;?>" data-max="<?=$ch_max;?>" value="<?php if(isset($site_content)){echo $site_content->{"title$i"};}?>">
		</li><?php } } ?>
		<li>
			<label for="content<?=$i;?>">Content Box <?=$i;?> (<?=$cb_min;?>-<?=$cb_max;?> Characters)</label>
			<p><span class="edit_link" style="display: inline;">Use visual editor</span>
			<textarea class="contentbox currentcontent" type="text" id="content<?=$i;?>" data-min="<?=$cb_min;?>" data-max="<?=$cb_max;?>" name="content<?=$i;?>"><?php if(isset($site_content)){echo $site_content->{"content$i"};}?></textarea></p>
		</li>
	<?php }
	if (isset($content_array[$wireframe]['bottom_content'])){?>
		<?php if ($wireframe != '28'){?>
		<li>
			<label for="title1">Bottom Content Heading (<?=$bch_min;?>-<?=$bch_max;?> Characters)</label>
			<span class="range not_in_range"></span>
			<input type="text" required id="title1" name="title1" data-min="<?=$bch_min;?>" data-max="<?=$bch_max;?>" value="<?php if(isset($site_content)){echo $site_content->{"title1"};}?>">
		</li>
		<?php } ?>
		<li>
			<label for="content1">Bottom Content Box (<?=$bc_min;?>-<?=$bc_max;?> Characters)</label>
			<p><span class="edit_link" style="display: inline;">Use visual editor</span>
			<textarea class="contentbox currentcontent" type="text" id="content1" data-min="<?=$bc_min;?>" data-max="<?=$bc_max;?>" name="content1"><?php if(isset($site_content)){echo $site_content->{"content1"};}?></textarea></p>
		</li>
	<?php } ?>

	<h2>About Page Content</h2>
	<?php
	$pt_min = $content_array[$wireframe]['page_titles']['min'];
	$pt_max = $content_array[$wireframe]['page_titles']['max'];
	$pc_min = $content_array[$wireframe]['page_content']['min'];
	$pc_max = $content_array[$wireframe]['page_content']['max'];
	?>
	<li>
		<label for="about_title">About Page Title (<?=$pt_min;?>-<?=$pt_max;?> Characters)</label>
		<span class="range not_in_range"></span>
		<input type="text" required id="about_title" name="about_title" data-min="<?=$pt_min;?>" data-max="<?=$pt_max;?>" value="<?php if(isset($site_content)){echo $site_content->{"about_title"};}?>">
	</li>
	<li>
		<label for="about_content">About Page Content(200-600 words):</label>
		<p><span class="edit_link" style="display: inline;">Use visual editor</span>
		<!--<span class="ta_range not_in_range"></span>-->
		<textarea class="contentbox currentcontent" type="text" id="about_content" data-min="<?=$pc_min;?>" data-max="<?=$pc_max;?>" name="about_content"><?php if(isset($site_content)){echo $site_content->{"about_content"};}?></textarea></p>
	</li>


	<h2>Content Pages</h2>
	<li>
		<label for="page1_title">Page 1 Title (<?=$pt_min;?>-<?=$pt_max;?> characters):</label>
		<span class="range not_in_range"></span>
		<input type="text" required id="page1_title" name="page1_title" data-min="<?=$pt_min;?>" data-max="<?=$pt_max;?>" value="<?php if(isset($site_content)){echo $site_content->{"page1_title"};}?>">
	</li>
	
	<li>
		<label for="page1_content">Page 1 Content (300-600 words):</label>
		<p><span class="edit_link" style="display: inline;">Use visual editor</span>
		<!--<span class="ta_range not_in_range"></span>-->
		<textarea class="contentbox currentcontent" type="text" id="page1_content" data-min="<?=$pc_min;?>" data-max="<?=$pc_max;?>" name="page1_content"><?php if(isset($site_content)){echo $site_content->{"page1_content"};}?></textarea></p>
	</li>
	
	<li>
		<label for="page2_title">Page 2 Title (<?=$pt_min;?>-<?=$pt_max;?> characters):</label>
		<span class="range not_in_range"></span>
		<input type="text" required id="page2_title" name="page2_title" data-min="<?=$pt_min;?>" data-max="<?=$pt_max;?>" value="<?php if(isset($site_content)){echo $site_content->{"page2_title"};}?>">
	</li>

	<li>
		<label for="page2_content">Page 2 Content (300-600 words):</label>
		<p><span class="edit_link" style="display: inline;">Use visual editor</span>
		<!--<span class="ta_range not_in_range"></span>-->
		<textarea class="contentbox currentcontent" type="text" id="page2_content" data-min="<?=$pc_min;?>" data-max="<?=$pc_max;?>" name="page2_content"><?php if(isset($site_content)){echo $site_content->{"page2_content"};}?></textarea></p>
	</li>

	<li>
		<label for="page3_title">Page 3 Title (<?=$pt_min;?>-<?=$pt_max;?> characters):</label>
		<span class="range not_in_range"></span>
		<input type="text" required id="page3_title" name="page3_title" data-min="<?=$pt_min;?>" data-max="<?=$pt_max;?>" value="<?php if(isset($site_content)){echo $site_content->{"page3_title"};}?>">
	</li>

	<li>
		<label for="page3_content">Page 3 Content (300-600 words):</label>
		<p><span class="edit_link" style="display: inline;">Use visual editor</span>
		<!--<span class="ta_range not_in_range"></span>-->
		<textarea class="contentbox currentcontent" type="text" id="page3_content" data-min="<?=$pc_min;?>" data-max="<?=$pc_max;?>" name="page3_content"><?php if(isset($site_content)){echo $site_content->{"page3_content"};}?></textarea></p>
	</li>

	<!--Various Hidden Fields-->
	<input type="hidden" name="domain" value="<?php echo $domain_name;?>">

	<input type="hidden" name="blog_template" value="<?=$content_array[$wireframe]['blog_template'];?>">

	<input type="hidden" name="blog_article" value="Blog">
	<?php if(isset($content_array[$wireframe]['widgetkit'])){ ?>
		<input type="hidden" name="widgetkit" value="<?=$content_array[$wireframe]['widgetkit'];?>">
	<?php } ?>
	<?php if(isset($content_array[$wireframe]['slider'])){ ?>
		<input type="hidden" name="slider" value="<?=$content_array[$wireframe]['slider'];?>">
	<?php } ?>
	<?php if (isset($content_array[$wireframe]['widgetkitid'])){?>
		<input type="hidden" name="widgetkitid" value="<?=$content_array[$wireframe]['widgetkitid'];?>">
	<?php } ?>
	<?php if (isset($content_array[$wireframe]['slider_id'])){?>
		<input type="hidden" name="slider_id" value="<?=$content_array[$wireframe]['slider_id'];?>">
	<?php } ?>
	<input type="hidden" name="menulocation" value="<?=$content_array[$wireframe]['menulocation'];?>">

	<input type="hidden" name="homepage_content_boxes" value="<?=$content_array[$wireframe]['homepage_boxes'];?>">

	<input type="hidden" name="wireframe" value="<?=$wireframe?>">

	<?php //if(isset($site_content)){?>
	<input type="submit" id="design_submit" name="submit" value="Submit Design">
	<input type="hidden" name="designed" value="true">
	<?php //} ?>

	<input type="submit" name="submit" value="Submit">
</ul>
</form>
<div id="edit_wrap"><span class="close">x</span><textarea class="textarea"></textarea></div>
</div>

</div>
<?php
} else {?>
	<div id="notauthorized">
   <p style="color: #fff;">You are not authorized to access this page.</p>
   <a href="<?=root_url();?>users/login.php">Please Login</a></div><?php
}
include ('../footer.php');
?>