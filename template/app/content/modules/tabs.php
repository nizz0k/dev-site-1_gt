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

	

	



?>


<div class="container">
	<div class="row">
		<div class="col-12">

			<div class="tabs-slideshow">

				<div class="swiper-container">
					<!-- Add Pagination -->
					<div class="swiper-pagination"></div>

					<div class="swiper-wrapper">

						<?php
							if(is_array($module['tabs']) ) {
								$tabsCounter = 0;
								foreach($module['tabs'] as $tab) {
									$tabsCounter++;
									$title = 'Tab '. $tabsCounter;
									if($tab['title']) $title = $tab['title'];
									// render_columns($tab,false);

									$show_headline = '';
									if( !$tab['show_headline'] ) $show_headline = 'hide-headline';

									print '
											<div class="swiper-slide '.$show_headline.'" data-label="'.$title.'">
								            	<div class="row text-center">
								            		<div class="col-12">
								            			<h1 class="tab-headline">'.$title.'</h1>
								            		</div>
								            	</div>';
								            	render_columns($tab);
										    print '
								    </div>
								    ';


								}
							}
						?>
					</div>

				</div>

			</div>
		</div>
	</div>
</div>