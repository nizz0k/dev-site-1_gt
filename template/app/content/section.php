<?php

	// $content;
	

// Settings
	$anchor = $content['anchor'];
	if($content['background_color']) 	$classes[] = $content['background_color'];
	if($content['text_color']) 			$classes[] = $content['text_color'];
	if($content['section_padding']) 	$classes[] = 'section-padding';



	
	if($content['background_image']) {
		$classes[] = 'background-image';
		$styles[] =  'background-image:url('.$content['background_image']['url'].')'; //$content['background_image'];
	}



// Content
	$section_header = '';
	$section_head = array();
	$header_classes = array();
	$section_link = '';

	$anchor = $content['anchor'];
	
	if(!$content['headline_margin']) {
		$header_classes[] = 'no-padding-bottom';
	}

	if($content['headline']) {
		$section_head[] = '<h1>'.$content['headline'].'</h1>';
	}

	if($content['subline']) {
		$section_head[] = '<small>'.$content['subline'].'</small>';
	}

	if( count($section_head) > 0 ) {
		$section_header = '
			<div class="col-8 section-head">
				'.implode("\n", $section_head).'
			</div>
		';
	}



	if($content['internal_link']) {
		$link = $content['internal_link'];
		if($content['internal_link_anchor']) $link .= '#'.toAscii($content['internal_link_anchor']);

		$label = 'More';
		if($content['link_label']) $label = $content['link_label'];


		$section_link = '
			<div class="col-8 text-center">
				<a href="'.$link.'" class="internal-link">
					'.$label.' <span class="arrow right">'.get_svg('assets/arrow-right-abstract', 'arrow-right', true, true).'</span>
				</a>
			</div>
		';
	}


	if(strlen($section_header) > 0) {
		$section_header = '
			<div class="container '.implode(' ',$header_classes).'">
				<div class="row justify-content-center text-center">
					'.$section_header.'
					'.$section_link.'
				</div>
			</div>
		';
	}



?>
<section <?php getAnchorTags($anchor); ?> class="<?php print implode(' ',$classes); ?>" style="<?php print implode(';',$styles); ?>">
			<?php
				print $section_header;
				// pre($content);
				render_modules($content['modules']);
			?>
</section>
