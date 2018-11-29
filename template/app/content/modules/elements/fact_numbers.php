<?php

	// $element;
	

// Settings
	
	// if($content['background_color']) 	$classes[] = $content['background_color'];



// Content

	$numbers = array();

	// pre($element['fact_numbers']);

	foreach($element['fact_numbers'] as $number) {
		$render = '';
		
		
		if($number['number']) $render .= '<div class="count-number animate" data-count="'.$number['number'].'">0</div>';
		
		if($number['title']) $render .= '<h3>'.$number['title'].'</h3>';
		if($number['subline']) $render .= '<small>'.$number['subline'].'</small>';



		if(strlen($render) > 0) {
			$numbers[] = '

			<div class="col fact-numbers-wrapper">
				<div class="fact-numbers">
					'.$render.'
				</div>
			</div>
			';
		}
	}
	



?>


<div class="row">
	<?php
		print implode('',$numbers);
	?>
</div>