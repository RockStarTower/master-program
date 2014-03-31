<?php
include('../config.php');
$ds = DIRECTORY_SEPARATOR; //1
 
$domain = $_POST['domain']; //2
$domain_dir = 'content/' . $domain;
$wireframe = $_POST['wireframe'];

$filename_array = array(
	'logo.png',
	'favicon.ico',
	'slider1.jpg',
	'slider2.jpg',
	'slider3.jpg',
	'slider4.jpg',
	'image1.jpg',
	'image2.jpg',
	'image3.jpg',
	'image4.jpg',
	'image1.png',
	'image2.png',
	'image3.png',
	'image4.png',
	'icon1.png',
	'icon2.png',
	'icon3.png',
	'background.jpg',
	'background.png',
	'lomogo.png'
);


if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3
	
	$filename = $_FILES['file']['name'];
	
	
	if( in_array($filename, $filename_array) ) {
			
		if (!file_exists($domain_dir)) {
			mkdir($domain_dir, 0777, true);
			if (!file_exists($domain_dir)) {
				die('Failed to create directory');
			}
		}
		
		$targetPath = dirname( __FILE__ ) . $ds . 'content' . $ds. $domain . $ds;  //4
	 
		$targetFile =  $targetPath. $_FILES['file']['name'];  //5
	 
		move_uploaded_file($tempFile,$targetFile); //6

		$imagesize = getimagesize($targetFile);
		
		$arrLen = count($design_dimensions[$wireframe][$filename]);
		
		if ($arrLen == 2) {
		
			if ( !(($imagesize[0] == $design_dimensions[$wireframe][$filename]['width']) && ($imagesize[1] == $design_dimensions[$wireframe][$filename]['height'])) ) {
				
				unlink($targetFile);
				
				echo '<h2>' . $filename . ' was not the right size. ' . $imageSize[0] . ' x ' . $imageSize[1] . '</h2>';
				
			}
		
		} else {

			if ( !( $imagesize[0] >= $design_dimensions[$wireframe][$filename]['minWidth'] && $imagesize[0] <= $design_dimensions[$wireframe][$filename]['maxWidth'] ) && !( $imagesize[1] >= $design_dimensions[$wireframe][$filename]['minHeight'] && $imagesize[1] <= $design_dimensions[$wireframe][$filename]['maxHeight'] ) ) {
				
				unlink($targetFile);
				
				echo '<h2>' . $filename . ' was not the right size. ' . $imagesize[0] . ' x ' . $imagesize[1] . ' minWidth: ' . $design_dimensions[$wireframe][$filename]['minWidth'] . ' maxWidth: ' . $design_dimensions[$wireframe][$filename]['maxWidth'] . ' minHeight: ' . $design_dimensions[$wireframe][$filename]['minHeight'] . ' maxHeight: ' . $design_dimensions[$wireframe][$filename]['maxHeight'] . '</h2>';
				
			}
		
		}
		
    } else {
		
		echo '<h2>' . $filename . ' was named incorrectly.' . '</h2>';
	
	}
}


?>  
