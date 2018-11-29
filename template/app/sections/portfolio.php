<section <?php getAnchorTags('Portfolio'); ?> class="section-padding bg-light">
	<div class="container">
		<div class="row justify-content-md-center text-center">
			<div class="col-lg-8 section-head">
				<h1>Portfolio</h1>
				<small>Companies / Investments</small>
			</div>
		</div>
		
		<?php 
			get_portfolio_grid();
		?>
	</div>
</section>