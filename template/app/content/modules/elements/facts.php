<?php

	// $element;
	

// Content

	$title = '';
	if($element['title']) $title = '<h2>'.$element['title'].'</h2>';
	
	$facts = array();

	foreach($element['facts'] as $stat) {

		$facts[] = '
			<dt>'.$stat['title'].'</dt>
			<dd>
				'.$stat['text'].'
			</dd>
			';
	}





?>


<div class="facts-dl-wrapper">
	<?php
		print $title;
		print '<dl>'.implode('',$facts).'</dl>';
	?>
</div>