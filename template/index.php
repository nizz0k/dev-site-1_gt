<?php get_header(); ?>

<section  class="section-padding bg-light" style="padding-top: 60px;">
	<div class="container">
		<div class="row justify-content-md-center text-center">
			<div class="col-lg-8 section-head">
				<h1>News</h1>
			</div>
		</div>
		
		<?php 
			get_news_grid(-1, false, true);
		?>
	</div>
</section>



	
		<?php
		// <div class="container">

			// while ( have_posts() ) : the_post();
			// 	$page_handle = get_post();
			// 	// render_rows($page_handle);
			// endwhile;
			/*
			<div class="pagination">
				<?php

					// Previous/next page navigation.
					the_posts_pagination( array(
					    'screen_reader_text' => ' ', 
					    'prev_text'          => '<',
					    'next_text'          => '>',
					    'before_page_number' => '<span class="meta-nav screen-reader-text"> </span>',
					) );
				?>
			</div>
			</div>
		*/ ?>
<?php get_footer(); ?>