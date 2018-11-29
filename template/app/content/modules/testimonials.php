<?php

	// $module;
	

// Settings
	
	// if($content['background_color']) 	$classes[] = $content['background_color'];

	// $coloums = array();

	// $number_of_coloums = $module['number_of_coloums'];

	// pre($module);
	// number_of_coloums
		// single-column : single-column
		// double-column : double-columned
	// if($number_of_coloums == 'single-column') {
		
	// }else if($number_of_coloums == 'double-column') {

	// }


	// pre($number_of_coloums);


// Content

	$authors = array();
	$quotes = array();



	foreach($module['testimonials'] as $testimonial) {

		// pre($testimonial);

	// Author
		$style = '';
		if($testimonial['image']) {
			$image_url = $testimonial['image']['sizes']['medium'];
			$style = 'style="background-image:url('.$image_url.');"';
		}


		$authors[] = '<div class="swiper-slide">
						<div class="author-image" '.$style.'></div>
					</div>';





	// Quote
		$title = $testimonial['title'];
		$subtitle = $testimonial['subtitle'];
		$text = $testimonial['text'];

		$link = '';

		if($testimonial['link']) {

			$link = '<div class="interview">
						<a href="'.$testimonial['link'].'" class="interview-button">
							<div class="media-icon">'.get_social('youtube').'</div>
							Watch the Interview
						</a>
					</div>';
		};

		$quotes[] = '<div class="swiper-slide">
						<div class="inner-slide">
							<div class="quote">
								  '.$text.'
							</div>
							<div class="author">
								<h4>'.$title.'</h4>
								<small>'.$subtitle.'</small>
								'.$link.'
							</div>
						</div>
					</div>';

	}

	// pre($module['testimonials']);




?>


<div class="container">
	<div class="row">
		<div class="col-lg-8 offset-lg-2">


				<div class="testimonials-portraits">
					<div class="testimonials-portraits-authors">
						<div class="swiper-container">
							<div class="gradient-overlay"></div>
							<div class="swiper-wrapper">
								<?php print implode('',$authors); ?>
							</div>
							<div class="swiper-button-next"><?php slideshow_navigation('next'); ?></div>
							<div class="swiper-button-prev"><?php slideshow_navigation('prev'); ?></div>
						
					</div>
				</div>



				<div class="testimonials-portraits-quotes">
					<div class="swiper-container">
						<div class="swiper-wrapper">
							<?php print implode('',$quotes); ?>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>