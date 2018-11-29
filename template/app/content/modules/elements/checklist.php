<?php

	// $element;
	

// Content

	$title = '';
	if($element['title']) $title = '<h2>'.$element['title'].'</h2>';
	
	$list = array();

	foreach($element['list'] as $stat) {

		$stat_title = $stat['title'];


		$list[] = '<li class="col-md-6 col-sm-12">'.$stat_title.'</li>';
	}



?>


<div class="checklist-wrapper">
	<?php
		// print $title;
		print '<ul class="checklist row">'.implode('',$list).'</ul>';
	?>
</div>