<?php

	// $module;
	

// Settings
	
	// if($content['background_color']) 	$classes[] = $content['background_color'];

	// $coloums = array();

	// $number_of_coloums = $module['number_of_coloums'];

	// pre($module);
	// number_of_coloums
		// single-column : single-column
		// double-column : double-columned
	// if($number_of_coloums == 'single-column') {
		
	// }else if($number_of_coloums == 'double-column') {

	// }


	// pre($number_of_coloums);


// Content

	$title = $module['title'];
	$subline = $module['subline'];
	
	$style = '';
	if($module['image']) {
		$style = ' style="background-image:url('.$module['image']['url'].')"';
	}
	




?>
<div class="container-fluid">
	<div class="ratio-3-1 background-image center-horizontal text-cell" <?php print $style; ?> >
		 <div class="center-horizontal-inner text-center blog-head">
		 	<div class="spacer-120"></div>
		 	<div class="spacer-30"></div>
		 	<h1 class="text-white">
		 		<?php print $title; ?>
		 	</h1>
		 	<small class="text-white"><?php print $subline; ?></small>
		 	<div class="spacer-120"></div>
		 	<div class="spacer-30"></div>
		 </div>
	</div>
</div>