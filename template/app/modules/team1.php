<?php

function team_tile($post = null, $classes) {
    $str = '';
    
    $tile_classes = array();
    $inner_tile_classes = array();


    foreach($classes as $class) {
        array_push($tile_classes, $class);
    }



    if($post != null) {


        $title = $post->post_title;
        
        $url = get_permalink($post);
        $position = get_field('position', $post);
        $image = get_field('image', $post);
        $external = get_field('external', $post);
        $external_class = '';

        if($external) $external_class = 'is-external';
        
        

        $image_string = '';

        if(is_array($image) ) {
            $inner_tile_classes[] = 'background-image';
            $image_string = ' style="background-image: url('.$image['url'].');"';
        }


        $inner_classes = array();

        //<a href="'.HOMEPATH.'/team/erick-yong" data-modal="team" class="team-link">  
        $str = '
            <article class="col-6 col-sm-4 col-md-4 col-lg-3">

                <a href="'.$url.'" data-modal="team" class="team-link">
                    <div class="team-tile">
                        <div class="inner-team-tile">
                            <div class="image team-image background-image ratio-1-1 '.$external_class.'" '.$image_string.'></div>
                            <h5>'.$title.'</h5>
                            <small>'.$position.'</small>
                        </div>
                    </div>
                </a>
            </article>
        ';
    }

    return $str;
}


/*

function team_tile($title, $position, $image) {
        print '
            <article>
                <div class="team-tile col-md-3">
                    <div class="inner-team-tile">
                        <div class="image background-image" style="background-image: url('.$image.');">
                        </div>
                        <h4>'.$title.'</h4>
                        <small>'.$position.'</small>
                    </div>
                </div>
            </article>
        ';
    }
*/


function get_team_grid() {
    $prefix = '';
    $suffix = '';

    $grid = '';


    $args = array(
        'posts_per_page'   => -1,
        'offset'           => 0,
        // 'category'         => '',
        // 'category_name'    => '',
                // 'orderby'          => 'date',
                // 'order'            => 'DESC',
        // 'order'            => 'ASC',
                'orderby' => 'menu_order', 
                'order' => 'ASC', 
        // 'include'          => '',
        // 'exclude'          => '',
        // 'meta_key'         => '',
        // 'meta_value'       => '',
        'post_type'        => 'team',
        'post_status'      => 'publish',
        'meta_query' => array(
        'relation' => 'OR',
        array(
	'key' =>  'external',
        'value'  => '0',
        'compare' =>  '='
        )
        )
        // 'suppress_filters' => true 
    );
    $portfolio = get_posts( $args );

    // pre($portfolio);


    for($i = 0; $i < count($portfolio); $i++) {
        $tile_classes = array();

        if(
            $i == 0 || 
            $i == 1 || 
            $i == 4 || 
            $i == 5
        ) {
            $tile_classes[] = "small-tile";
            $tile_classes[] = "col-md-3";
        } else {
            $tile_classes[] = "big-tile";
            $tile_classes[] = "col-md-6";
            $tile_classes[] = "text-center";
        }

        $grid .= team_tile($portfolio[$i], $tile_classes);

    }



    


    print $prefix . $grid . $suffix;

    // print '
    //     <div class="row">
    //         <div class="container">
    //             <div class="col-md text-center">
    //                 <a href="'.PORTFOLIO_ARCHIVE.'" class="btn btn-primary btn-more-projects">More Projects</a>
    //             </div>
    //         </div>
    //     </div>
    // ';
        
 
}
