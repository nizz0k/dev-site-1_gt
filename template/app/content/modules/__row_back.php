<?php

	// $module;
	

// Settings
	
	// if($content['background_color']) 	$classes[] = $content['background_color'];

	$coloums = array();

	$number_of_coloums = $module['number_of_coloums'];
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
	<?php
		// pre($module);
		// render_elements($module['elements']);

		if($number_of_coloums == 'single-column') {
			print '<div class="row justify-content-center text-center">
					<div class="col-8">asdf';
						render_elements($module['coloumns']['first_column_elements']);
			print '</div></div>';
		}


		if($number_of_coloums == 'double-columned') {
			print '
				<div class="row justify-content-md-center">
					<div class="col-12 col-md-6 first-col text-padding-x">';
						render_elements($module['coloumns']['first_column_elements']);
					print '
					</div>
					<div class="col-12 col-md-6 second-col text-padding-x">
					';
						render_elements($module['coloumns']['second_column_elements']);
					print '
					</div>
				</div>
				';
		}


	?>
</div>