<?php

	// $element;
	

// Content

	$title = '';
	if($element['title']) $title = '<h2>'.$element['title'].'</h2>';
	
	$links = array();

	foreach($element['links'] as $link) {

		$links[] = '
			<li>
				<a href="'.$link['link'].'" >'.$link['title'].'</a>
			</li>
			';
	}





?>


<div class="links-list-wrapper">
	<?php
		print $title;
		print '<ul class="link-list">'.implode('',$links).'</ul>';
	?>
</div>