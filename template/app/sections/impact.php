<section <?php getAnchorTags('Impact'); ?> class="section-padding">
	<div class="container">
		<div class="row justify-content-center text-center">
			<div class="col-8 section-head">
				<h1>Impact</h1>
				<small>
					Beyond our overarching goal of empowering entrepreneurs to become role models within their communities, we focus our efforts specifically on sectors with social and environmental impact potential. Our mandate is to maintain our portfolio at a minimum of 75 percent impact oriented investments. We seek to empower companies explicitly aiming to contribute to the UN’s Sustainable Development Goals. 
				</small>
			</div>
			<div class="col-8 text-center">
				<a href="#" class="internal-link">Learn more <span class="arrow right"><?php print get_svg('assets/arrow-right-abstract', 'arrow-right', true, true); ?></span></a>
			</div>
		</div>


		<div class="spacer-120"></div>
		<div class="row justify-content-center text-center">
			<div class="col-8">
				<div class="row">

					<div class="col-4">
						<div class="fact-numbers">
							<div class="count-number animate" data-count="1500">0</div>
							<h3>jobs</h3>
							<small>we created</small>
						</div>
					</div>

					<div class="col-4">
						<div class="fact-numbers">
							<div class="count-number animate" data-count="50000">0</div>
							<h3>customers</h3>
							<small>connected to WIFI</small>
						</div>
					</div>

					<div class="col-4">
						<div class="fact-numbers">
							<div class="count-number animate" data-count="40000">0</div>
							<h3>farmers</h3>
							<small>with expanded financial access</small>
						</div>
					</div>

				</div>
			</div>
		</div>


		<div class="spacer-120"></div>
		<?php /*
		<div class="row justify-content-center text-center">
			<div class="col-8 section-head">
				<h1>Our Impact</h1>
			</div>
		</div>
		*/ ?>



		<div class="row justify-content-center">
			<div class="col-12 col-md-10">
				<div class="row justify-content-center">
			<?php

				// $sdgs = array(2,3,1,7,6,5,4,8);
				$sdgs = array(1,2,3,4,5,6,7,8);
				foreach($sdgs as $sdg) {
					print '<div class="col-4 col-sm-3 col-md-3"><a href="#" class="sdg-link sdg-wrapper-'.$sdg.'" data-modal="sdg" data-type="sdg-'.$sdg.'">'.sdg_icon($sdg).'</a></div>';
				}
			?>
				</div>
			</div>
			<!-- <small>
				Beyond our overarching goal of empowering entrepreneurs to become role models within their communities, we focus our efforts specifically on sectors with social and environmental impact potential. Our mandate is to maintain our portfolio at a minimum of 75 percent impact oriented investments. We seek to empower companies explicitly aiming to contribute to the UN’s Sustainable Development Goals. 
			</small> -->
		</div>

	</div>
</section>