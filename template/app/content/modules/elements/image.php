<?php

	// $element;
	

// Settings
	
	// if($content['background_color']) 	$classes[] = $content['background_color'];



// Content

	$image = '';
	if($element['image']) $image = Layout::responsiveImage($element['image']);

	$caption = '';
	
	// pre($element['image']);

	if(strlen($element['image']['caption']) > 0) $caption = '<div class="image-description text-left" style="padding-top: 5px;padding-bottom: 5px;">'.$element['image']['caption'].'</div>';

?>


<div class="image-wrapper">
	<?php
		print $image;
		// render_elements($module['elements']);
		// if( is_user_logged_in() ) 
		print $caption;
	?>
</div>