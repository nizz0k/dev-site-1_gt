<?php

	// $module;
	

// Settings
	


// Content

	$image_tile = $module['image_tile'];
	$text_tile = $module['text_tile'];

	$gallery = array();
	foreach($image_tile['images'] as $image) {
		$gallery[] = '<div class="swiper-slide background-image" style="background-image: url('.$image['url'].');"></div>';
	}




	$rendered_image_tile = '
	<div class="background-image ratio-1-1">
		<div class="hero-slideshow">
			<div class="swiper-container">
				<div class="swiper-wrapper">
					'.implode('', $gallery).'
				</div>
				<!-- If we need pagination -->
				<div class="swiper-pagination"></div>
			</div>
		</div>
	</div>';



	$title = '';
	if($text_tile['title']) $title = '<h1>'.$text_tile['title'].'</h1>';

	$subline = '';
	if($text_tile['subline']) $subline = '<small>'.$text_tile['subline'].'</small>';

	$text = '';
	if($text_tile['text']) $text = '<p>'.$text_tile['text'].'</p>';



	$link = '';
	$internal_link = '';
	$link_label = 'More';
	

	$rendered_link = '';

	if($text_tile['internal_link']) {
		$link = $text_tile['internal_link'];

		if($text_tile['link_anchor']) $link .= '#'.toAscii($text_tile['link_anchor']);
		
		$rendered_link = '
		<a href="'.$link.'" class="internal-link">
			'.$link_label.'
			<span class="arrow right">
				'.get_svg('assets/arrow-right-abstract', 'arrow-right', true, true).'
			</span>
		</a>';
	}


	$rendered_text_tile = '
				<div class="center-horizontal text-cell text-center">
					<div class="center-horizontal-inner">
						<div class="row justify-content-center">
							<div class="section-head">
								'.$title.'
								'.$subline.'
							</div>
							<div class="col-8">
								'.$text.'
								'.$rendered_link.'
							</div>
						</div>
					</div>
				</div>
			';

?>



<div class="container-fluid quadratic-tiles-wrapper">
	<div class="row row-eq-height">
		<div class="col-12 col-md-6">
			<?php print $rendered_image_tile; ?>
		</div>
		<div class="col-12 col-md-6">
			<?php print $rendered_text_tile; ?>
		</div>
	</div>
</div>