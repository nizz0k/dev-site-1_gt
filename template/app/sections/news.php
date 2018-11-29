<section <?php getAnchorTags('News'); ?> class="section-padding bg-light">
	<div class="container">
		<div class="row justify-content-md-center text-center">
			<div class="col-lg-8 section-head">
				<h1>News</h1>
			</div>
		</div>
		
		<?php 
			get_news_grid();
		?>
	</div>
</section>