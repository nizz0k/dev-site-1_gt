<?php 
	//get_header(); 
?>

	<?php
		// pre($post);

		$image = get_field('image');
		if(is_array($image) ) $image = $image['url'];


		$external = get_field('external', $post);
        $external_class = '';
        if($external) $external_class = 'is-external';




        $position = get_field('position');
        $additional = get_field('additional');
        $external = get_field('external');
        $text = get_field('text');


        $job_detail = array();
        if($position) $job_detail[] = $position;
        if($additional) $job_detail[] = $additional;

		print '
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-3 image-col">
					    <div class="background-image ratio-1-1 border-radius '.$external_class.'" style="background-image:url('.$image.');"></div>

					        <dl>
					            <dt>Links</dt>
					            <dd>
					                '.social_media_icons($post).'
					            </dd>
					        </dl>
					    </div>
					    <div class="col-md-8">
					        <h1>'.get_the_title().'</h1>
					        <h2>
					            '.implode('<br />',$job_detail).'
					        </h2>
					        <div class="spacer-30"></div>
					       '.$text.'
					    </div>
					</div>
				</div>
		';


		/*print '
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-3 image-col">
					    <div class="background-image ratio-1-1 border-radius '.$external_class.'" style="background-image:url('.$image.');"></div>

					        <dl>
					            <dt>Links</dt>
					            <dd>
					                '.social_media_icons($post).'
					            </dd>
					        </dl>
					    </div>
					    <div class="col-md-8">
					        <h1>Erick Yong</h1>
					        <h2>
					            CEO & Co-Founder<br />
					            Global Strategy and Business Development
					        </h2>
					        <div class="spacer-30"></div>
					        <p>
					            Erick is our CEO and co-founder and has helped developed our unique investment approach that combines funding, knowledge transfer, and capacity building. He is our specialist for working with startups, global strategy, and business development.
					        </p>
					        <p>
					            Erick has traveled extensively since he was young and has lived in various countries while traveling with his parents. He has Cameroonian roots, although he was born in Bonn, Germany and attending university in France. Erick became an entrepreneur and strategic consultant immediately after his studies, where he further developed his strategic thinking skills and comprehensive track record of launching and scaling up new business concepts. He is also a specialist in international marketing strategies, implementing brand strategies, marketing plans and communication campaigns. He has also directed innovation efforts and managed international teams in executing company strategies with global vision.
					            He is especially passionate about the environmental as well as the economic impact of his projects.
					        </p>
					        <p>
					            Erick speaks English, French, and German and is well-versed in cross-cultural collaboration. He has a passion for basketball and used to be a professional player in his youth.
					        </p>
					    </div>
					</div>
				</div>
		';*/
		
	?>


<?php 
	// get_footer(); 
?>