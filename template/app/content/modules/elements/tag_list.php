<?php

	// $element;
	

// Content

	// $title = '';
	// if($element['label']) $title = '<h2>'.$element['label'].'</h2>';
	
	$list = array();

	foreach($element['tag'] as $tag) {

		$title = $tag['label'];
		$content = $tag['modal_content'];

		if(strlen($content) ) {
			// 					<h2 class="text-secondary">Scalability Potential</h2>
			$list[] = '<div class="scm-button small solid" data-modal="sc-modal">
				'.$title.'
				<div class="scm-content">
					<div class="modal-text">
						'.$content.'
					</div>
				</div>
			</div>';
		} else {
			$list[] = '<div class="scm-button small disabled">
				'.$title.'
				<div class="scm-content">
					<h2 class="text-secondary">Scalability Potential</h2>
				</div>
			</div>';
		}
	}



?>


<div class="taglist-wrapper">
	<?php
		print ''.implode('',$list).'';
	?>
</div>