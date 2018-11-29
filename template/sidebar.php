<?php 

$has_sidebar = false;

if(
	is_post_type_archive('animation')
	|| is_post_type_archive('visual_effects') 
	|| is_post_type_archive('concept_design') 
	|| is_post_type_archive('talents') 


	|| POST_TYPE == 'talents'

	|| POST_TYPE == 'concept_art'
	|| POST_TYPE == 'character_design' 
	|| POST_TYPE == 'storyboards_reels'
) {
	$has_sidebar = true;	
}


if($has_sidebar) : 

?>
    
        <aside>
            <div class="sidebar">
                <div class="inner-sidebar">
                    <?php
                    	$terms = array();

                    	if(
		                    POST_TYPE == 'concept_art'
							|| POST_TYPE == 'character_design' 
							|| POST_TYPE == 'storyboards_reels'

						){





                    		// $terms[] = '<li><a class="category-button" href="'..'">'.$term->name.'</a></li>';
                    		if( POST_TYPE == 'concept_art' ) {
                    			$terms[] = '<li><a href="'.get_post_type_archive_link('concept_art').'" class="active">Concept Art</a></li>';
                    		} else {
                    			$terms[] = '<li><a href="'.get_post_type_archive_link('concept_art').'">Concept Art</a></li>';
                    		}

                    		if( POST_TYPE == 'character_design'  ) {
                    			$terms[] = '<li><a href="'.get_post_type_archive_link('character_design').'" class="active">Character Design</a></li>';
                    		} else {
                    			$terms[] = '<li><a href="'.get_post_type_archive_link('character_design').'">Character Design</a></li>';
                    		}

                    		if( POST_TYPE == 'storyboards_reels' ) {
                    			$terms[] = '<li><a href="'.get_post_type_archive_link('storyboards_reels').'" class="active">Story Boards & Reels</a></li>';
                    		} else {
                    			$terms[] = '<li><a href="'.get_post_type_archive_link('storyboards_reels').'">Story Boards & Reels</a></li>';
                    		}


                    		if( count($terms) > 0) {
								print '
									<ul class="design category-list">
									'.implode('',$terms).'
									</ul>
								';
							}

						} else {


							$link = '#';
							$clickable = '';
							if(POST_TYPE == 'talents') {
		                    	$args = array(
								    'taxonomy' => 'talents_category',
								    'hide_empty' => false,
								);
								$link = get_post_type_archive_link('talents');
								// $clickable = 'leave-page';
							} else {
								$args = array(
								    'taxonomy' => get_queried_object()->name.'_category',
								    'hide_empty' => false,
								);
							}

	                    	

	                    	$terms[] = '<li><a class="category-button" data-category="all" href="#">All</a></li>';
							foreach(get_terms( $args ) as $term) {
								$terms[] = '<li><a class="category-button '.$clickable.'" data-category=".'.$term->slug.'" href="'.$link.'#filter|'.$term->slug.'">'.$term->name.'</a></li>';
							}

							if( count($terms) > 0) {
								print '
									<ul class="category-list">
									'.implode('<li class="seperator">|</li>',$terms).'
									</ul>
								';
							}
						}


                    ?>
                </div>
            </div>
        </aside>

<?php endif; ?>