<section <?php getAnchorTags('Start'); ?>>

	
	<div class="container-fluid">
		<div class="row">

			<div class="col-md-12 vision-height">
				<?php /*<div class="center-horizontal text-cell background-image" style="background-image: url(sample/splash.jpg);"> */ ?>
				<div class="center-horizontal text-cell">



					<div class="center-horizontal-inner">
						<div class="container-fluid container-x-padding">
							<div class="col-md-5">
								<h1 class="text-primary">GreenTec Project</h1>
								<p class="lead">
									Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
								</p>
								<!--<a class="btn btn-secondary" href="#" role="button">fugiat nulla</a>-->
							</div>
							<a href="#profile">
								<div class="page-down">
								<?php
									print get_svg('assets/arrow-down-abstract', 'arrow-down', true, true);
								?>
								</div>
							</a>

							<?php
								$featured = get_field('featured_news', 'options');


								if( count($featured) > 0) {

									print '
									<div class="newsticker-slideshow col-3">
										<div class="swiper-container">
											<div class="swiper-wrapper">';
											foreach($featured as $spotlight) {
												// $spotlight = $featured[0];
												// pre($spotlight);

												$featured_image = '';
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



									print '
											</div>
										</div>
									</div>';
								}
							?>
						</div>
					</div>



					<div class="hero-slideshow">
						<div class="swiper-container">
							<div class="swiper-wrapper">

								<div class="swiper-slide background-image" style="background-image: url(sample/splash.jpg);"></div>
								<div class="swiper-slide background-image" style="background-image: url(sample/splash/1.jpg);"></div>
								<div class="swiper-slide background-image" style="background-image: url(sample/splash/2.jpg);"></div>
								<div class="swiper-slide background-image" style="background-image: url(sample/splash/3.jpg);"></div>
								<div class="swiper-slide background-image" style="background-image: url(sample/splash/4.jpg);"></div>
								<!-- <div class="swiper-slide background-image" style="background-image: url(sample/splash/5.jpg);"></div> -->
							</div>
						</div>
					</div>


				</div>
			</div>

		</div>
	</div>



</section>