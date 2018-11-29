<?php

	
	$partnerships = array();

	foreach($module['partnership'] as $partnership) {


		$image = '';
		if( $partnership['image'] ) {
			// $image = Layout::responsiveImage($partnership['image']);
			// $image = '<div class="partnership-logo"><img src="'.$partnership['image']['url'].'" /></div>';
			$image = '<div class="partnership-logo">'.Layout::responsiveImage($partnership['image'], true).'</div>';
			// pre($partnership['image']);
		}


	// Quote
		$subtitle = $partnership['subtitle'];
		$text = $partnership['text'];
		$partnerships[] = '
		<div class="swiper-slide">
			<div class="inner-slide">
				<div class="row justify-content-md-center">
					<div class="col-lg-8">
						'.$image.'
						<small>'.$subtitle.'</small>
						<div class="spacer-10"></div>
						<p>
							 '.$text.'
						</p>
					</div>
				</div>
			</div>
		</div>';

	}





?>




<div class="container">
	<div class="row">
		<div class="col-lg-8 offset-lg-2">


				<div class="content-slideshow">
						<div class="swiper-container">
							<div class="swiper-wrapper">
								<?php print implode('',$partnerships); ?>
							</div>

							<!-- Add Pagination -->
							<div class="swiper-pagination"></div>
							<!-- Add Arrows -->
							<div class="swiper-button-next"><?php slideshow_navigation('next'); ?></div>
							<div class="swiper-button-prev"><?php slideshow_navigation('prev'); ?></div>
						
					</div>
				</div>


		</div>
	</div>
</div>