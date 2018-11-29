


<div class="container-fluid">
		<div class="row">

			<div class="col-md-12 vision-height">
				<div class="center-horizontal text-cell">



					<div class="center-horizontal-inner">
						<div class="container-fluid container-x-padding">
							<div class="col-md-5 hero-title-wrapper">
								<h1 class="text-white"><?php print $module['title']; ?></h1>
								<p class="lead">
									<?php print $module['subline']; ?>
								</p>
								<!--<a class="btn btn-secondary" href="#" role="button">fugiat nulla</a>-->
							</div>

							<?php 
								$anchor = toAscii($module['anchor']);
								if( strlen($anchor) > 0 ) {
									print '
										<a href="#'.$anchor.'">
											<div class="page-down">
											
												'.get_svg('assets/arrow-down-abstract', 'arrow-down', true, true).'
											
											</div>
										</a>
									';
								}
							?>

							<?php
								$featured = get_field('featured_news', 'options');


								if( count($featured) > 0 && $module['show_newsticker']) {

									print '
									<div class="newsticker-slideshow col-3">
										<div class="swiper-container">
											<div class="swiper-wrapper">';
											foreach($featured as $spotlight) {
												// $spotlight = $featured[0];
												// pre($spotlight);

												$featured_image = '';
												if($spotlight['image'] && $spotlight['post']) {
													if(array_key_exists('url', $spotlight['image']) ) {
														$featured_image = '<div class="featured-image background-image" style="background-image: url('.$spotlight['image']['url'].');"></div>';
													}

												

													print '
														<div class="swiper-slide">
															<a href="'.get_permalink($spotlight['post']).'" class="btn btn-secondary featured-news d-none d-md-block">
																<div class="featured-news-inner">
																	'.$featured_image.'
																	<div class="featured-text">
																		<small>'.get_the_date('d.m.Y', $spotlight['post']).'</small>
																		<h4>'.$spotlight['post']->post_title.'</h4>
																	</div>
																</div>
															</a>
														</div>
													';
												}
											}



									print '
											</div>
										</div>
									</div>';
								}
							?>
						</div>
					</div>

					<?php
						$hero_images = array();
						
						if(is_array($module['images']) ) {
							foreach($module['images'] as $hero_image) {
								$hero_images[] = '<div class="swiper-slide background-image" style="background-image:url('.$hero_image['url'].');"></div>';
							}
						}

					?>



					<div class="hero-slideshow">
						<div class="swiper-container">
							<div class="swiper-wrapper">

								<?php print implode('',$hero_images); ?>
							</div>
						</div>
					</div>


				</div>
			</div>

		</div>
	</div>