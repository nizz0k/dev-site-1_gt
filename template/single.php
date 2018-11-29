<?php get_header(); ?>
		<?php
			//<div class="container">

			while ( have_posts() ) : the_post();
				$page_handle = get_post();
				// render_section($page_handle);
				render_content($page_handle);
				// the_content();
			endwhile;
			
			//</div>
		?>
<?php get_footer(); ?>