<?php

	// $element;
	

// Settings
	
	// if($content['background_color']) 	$classes[] = $content['background_color'];

	/*
	internal : Internal Link
		page
		anchor

	external : external Link
		url
	*/




// Content

	$button = '';

	$text = '';
	if($element['label']) $text = $element['label'];


	$url = '#';

	if($element['type'] == 'internal') {
		if($element['page']) $url = $element['page'];
		if($element['anchor']) {
			$anchor = toAscii($element['anchor']);
			$url .= '#'.$anchor;
			$button = '<a class="cta-button internal internal-anchor" href="'.$url.'" data-anchor="'.$anchor.'">'.$text.'</a>';
		} else {
			$button = '<a class="cta-button internal"  href="'.$url.'">'.$text.'</a>';
		}
	}
	else if($element['type'] == 'external') {
		if($element['url']) $url = $element['url'];
		$button = '<a class="cta-button external" href="'.$url.'" target="_blank">'.$text.'</a>';
	}
	



?>



		<?php
			print $button;
			// render_elements($module['elements']);
		?>
