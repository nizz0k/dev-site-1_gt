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

	$members = array();

	$team_title = '';

	if( $module['title'] ) {
		$team_title = '
		<div class="row justify-content-md-center text-center">
			<div class="col-lg-8">
				<h1 class="text-primary">
					'.$module['title'].'
				</h1>
				<div class="spacer-30"></div>
			</div>
			
		</div>';
	}





	foreach($module['team'] as $member) {

	// Members
		$title = $member['title'];
		$text = $member['text'];
		$image = '';
		if($member['image']) {
			// $image = '<div class="background-image ratio-1-1 border-radius" style="background-image:url('.$member['image']['sizes']['medium'].');"></div>';
			$image = '<div class="team-member-image background-image ratio-1-1 border-radius" style="background-image:url('.$member['image']['url'].');"></div>';
		}



		$members[] = '

			<div class="row team-row">
				<div class="team-member-image-wrapper col-md-2 text-padding-x">
					'.$image.'
				</div>


				<div class="col-md-10 text-padding-x team-member-description">
					<div class="spacer-10"></div>
					<h4>'.$title.'</h4>
					<div class="spacer-10"></div>
					<p>
						'.$text.'
					</p>
				</div>
			</div>
		';
	

	}

	// pre($module['project_team']);




?>


<div class="container">
		<?php

			print $team_title; 

			print implode('<div class="spacer-60"></div>', $members);


		?>

		<!--
		<div class="row team-row">
			<div class="col-md-2 text-padding-x">
				<div class="background-image ratio-1-1 border-radius" style="background-image:url(<?php print HOMEPATH;?>/sample/team/19.jpg);"></div>
			</div>

			<div class="col-md-10 text-padding-x">
				<div class="spacer-10"></div>
				<h4>Managing Director Henri Nyakarundi</h4>
				<div class="spacer-10"></div>
				<p>
					has led ARED in developing and launching the flagship Mobile Charging Kiosk, and he manages the company’s plans for expansion. Henri studied Computer Science in the United Stat es at Georgia State University, Atlanta, GA. Afterwards he gathered deep experience in the transportation sector in the United States and in Burundi for more than 7 years.
				</p>
			</div>
		</div>

		<div class="spacer-60"></div>
		<div class="row team-row">
			<div class="col-md-2 text-padding-x">
				<div class="background-image ratio-1-1 border-radius" style="background-image:url(<?php print HOMEPATH;?>/sample/team/20.jpg);"></div>
			</div>

			<div class="col-md-10 text-padding-x">
				<div class="spacer-10"></div>
				<h4>Chief Technical Officer Oliver Klein</h4>
				<div class="spacer-10"></div>
				<p>
					is in charge of all technical development. Known as an expert in the Digital community, Oliver is specialized in the development of applications.
				</p>
			</div>
		</div>

	-->
	
</div>