<?php get_header(); ?>
<?php
	global $pagetype;
	$pagetype = 'search-results';
	get_header();

	$german_quote = true;
?>


	<div class="page-header">
		<div class="title-wrapper">
			<div class="title-inner">
				<div class="subtitle">
					Searchresults for
				</div>

				<h1 class="title">
					<?php if($german_quote) : ?>
	                	<span class="quote start">&#8222;</span><?php print $s; ?><span class="quote end">&#8220;</span>
	                <?php else : ?>
	                	<span class="quote start">&raquo;</span><?php print $s; ?><span class="quote end">&laquo;</span>
	                <?php endif; ?>
				</h1>
			</div>
		</div>
	</div>


	<div class="search-results">
			<!-- <div class="headline">
	            <h1>
	                Suchergebnisse für <br />
	                <?php if($german_quote) : ?>
	                	<span class="quote start">&#8222;</span><?php print $s; ?><span class="quote end">&#8220;</span>
	                <?php else : ?>
	                	<span class="quote start">&raquo;</span><?php print $s; ?><span class="quote end">&laquo;</span>
	                <?php endif; ?>
	            </h1>
	        </div> -->
			





				<?php if ( have_posts() ) : ?>
					
					

					<?php
						while ( have_posts() ) : the_post();

							$postType = $post->post_type;


							if( 
								$postType == 'animation'
								|| $postType == 'visual_effects'
								|| $postType == 'concept_design'
								// || $postType == 'talents'
							) {
								$page_handle = get_post();
					
								$title = get_the_title();
								$subtitle = get_field('subline',$page_handle);
								$image = get_field('preview_image',$page_handle);

								$url = get_the_permalink();


								$size = get_field('preview_size',$page_handle);
								// if($size == 'default') 
								$size = 'small';

								$categories = array();

								$terms = get_the_terms($page_handle, 'animation_category');
								if(is_array($terms)) {
									foreach( $terms as $category ) {
										$categories[] = $category->slug;
									}
								}


								print tile($title, $subtitle, $url, $image, $size, $categories);
							}





							/*

					?>


						<a href="<?php print get_permalink($post); ?>">
							<div class="search-result-item col-xs-8 col-xs-offset-2">
							<?php

								// print '<a href="'.get_permalink().'">';
								// print '<pre>';
								// print_r($post);

								
								print '<h2>'.$post->post_title.'</h2>';

								$content = get_field('rows', $post->ID);





								print '<div class="search-excerpt-wrapper">';
									print search_in_meta($s, $content);
								print '</div>';


								
								// $keys = explode(" ",$s);
								// foreach($keys as $search_key) {
								// 	// print search_in_meta($search_key, $content);
								// 	// print $key;
								// 	print '<br />';
								// }
								// pre($content);

								// the_content();
								// pre($post);
								// pre($keys);
								
								*/
							?>

							<?php 
								/*
									$title = get_the_title(); $keys= explode(" ",$s);
									$title = preg_replace('/('.implode('|', $keys) .')/iu', '<strong class="search-excerpt">\0</strong>', $title);
								


							 </div>
						</a>
*/
							 ?>


					<?php 
						endwhile; 
					?>
					</div></div> <?php /* end artist-row */ ?>



					







			        <div class="pagination">
						<?php

							// Previous/next page navigation.
							the_posts_pagination( array(
							    'screen_reader_text' => ' ', 
							    'prev_text'          => '',
							    'next_text'          => '',
							    'before_page_number' => '<span class="meta-nav screen-reader-text"> </span>',
							) );
						?>
					</div>




				<?php else : ?>
				

				<div class="after-headline headline">
					<h2>Die Suche ergab leider keine Treffer.</h2>
				</div>
				
				

			<?php endif; ?>

		</div>
	</div>

</div>

	

<?php get_footer(); ?>