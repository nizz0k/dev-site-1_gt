<?php

	// $element;
	

// Settings
	
	// if($content['background_color']) 	$classes[] = $content['background_color'];



// Content

	$text = '';
	if($element['html']) $text = $element['html'];


	$text = str_replace('{{THEME_IMAGES}}', IMAGESPATH, $text);
	

// Liefert: <body text='schwarz'>
$bodytag = str_replace("%body%", "schwarz", "<body text='%body%'>");


?>



		<?php
			print $text;
			// render_elements($module['elements']);
		?>
