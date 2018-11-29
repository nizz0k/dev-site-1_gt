<?php


    $partnerships = array();
    $tile_classes = array();
    $inner_tile_classes = array();


//deal with the image
	foreach($module['partnership'] as $partnership) {


		$image = '';
		if( $partnership['image'] ) {
			$image = '';
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


				


		</div>
	</div>
</div>