<?php

function news_tile($post = null, $classes) {
    $str = '';
    
    $tile_classes = array();
    $inner_tile_classes = array();


    foreach($classes as $class) {
        array_push($tile_classes, $class);
    }



    if($post != null) {


        $title = $post->post_title;

        // $date = get_the_date('D. m Y',$post->post_date);
        $date = get_the_date('d.m.Y',$post);
        $url = get_permalink($post);
        $short_description = get_field('short_description', $post);
        $image = get_field('image', $post);
        
        $invert_color = get_field('invert_color', $post);
        if($invert_color == true) $tile_classes[] = 'inverted';
        
        $background_color = get_field('background_color', $post);

        if($background_color == 'green') $inner_tile_classes[] = 'bg-primary';
        else if($background_color == 'blue') $inner_tile_classes[] = 'bg-secondary';

        $image_string = '';

        if(is_array($image) ) {
            $inner_tile_classes[] = 'background-image';
            $image_string = ' style="background-image: url('.$image['url'].');"';
        }


        // $post_categories = get_categories($post);
        $post_categories = get_the_category($post);
        $cat_classes = array();
        $cats = array();
        $masonry_cats = array();
        
        foreach($post_categories as $cat) {
            $cat_classes[] = 'category-'.$cat->slug;
            // $cat_classes[] = $cat->slug;

            // $cats[] = '<div class="tag" data-tag="category-'.$cat->slug.'">'.$cat->name.'</div>';
            $cats[] = '<div class="tag" data-tag="'.$cat->slug.'">'.$cat->name.'</div>';
            $masonry_cats[] = $cat->slug;
        }

        // $cats[] = $title;
        // pre(wp_get_post_categories($post->ID));
        // pre(get_the_category($post->ID));

        // pre($cat_classes);





        $inner_classes = array();
        //  <div class="inner-tile background-image" style="background-image: url(sample/1.jpg);">

        // data-groups="[\''.implode($masonry_cats, '\',\'').'\']"
        $str = '
            <article class="masonry-item tile '.implode($tile_classes,' ').' '.implode($cat_classes,' ').'"  data-groups=\''.'["'.implode($masonry_cats, '","').'"]\'>
                <a href="'.$url.'" class="tile-link">
                    <div class="inner-tile-wrapper">
                        <div class="inner-tile '.implode($inner_tile_classes,' ').'" '.$image_string.'>
                            <small class="publish-date">'.$date.'</small>
                            <h1>'.$title.'</h1>
                            <p>'.$short_description.'</p>
                            <div class="more-label">Read more <span class="arrow right">'.get_svg('assets/arrow-right-abstract', 'arrow-right', true, true).'</span></div>

                            <div class="category-tags-wrapper">'.implode($cats,'').'</div>
                        </div>
                    </div>
                </a>
            </article>
        ';
    }

    return $str;
}


function get_news_grid($entries = 3, $more_button = true, $show_filter = false) {
    $prefix = '<div class="masonry news-grid">';
    $suffix = '</div>';

    $grid = '';


    $filter = '';


    $args = array(
        'posts_per_page'   => $entries,
        'offset'           => 0,
        // 'category'         => '',
        // 'category_name'    => '',
                'orderby'          => 'date',
                'order'            => 'DESC',
            // 'orderby' => 'menu_order', 
            // 'order' => 'ASC', 
        // 'include'          => '',
        // 'exclude'          => '',
        // 'meta_key'         => '',
        // 'meta_value'       => '',
        'post_type'        => 'post',
        'post_status'      => 'publish',
        // 'suppress_filters' => true 
    );
    $portfolio = get_posts( $args );

    // pre($portfolio);


    for($i = 0; $i < count($portfolio); $i++) {
        $tile_classes = array();

        if(
            $i == 0 
        ) {

            $tile_classes[] = "big-tile";
            $tile_classes[] = "col-md-6";
            $tile_classes[] = "ratio-1-1";
            $tile_classes[] = "text-center";
        } else {
            $tile_classes[] = "small-tile";
            $tile_classes[] = "col-md-6";
            $tile_classes[] = "ratio-2-1";
        }

        $grid .= news_tile($portfolio[$i], $tile_classes);

    }




    if($show_filter) {


        $filter = '
        <div class="filter-wrapper">
        <button class="btn toggle-filter">Add Filter <span class="arrow right">'.get_svg('assets/arrow-down-abstract', 'arrow-down', true, true).'</span></button>
        <div class="inner-filter">
        <ul class="categories">
        ';
        // $categories = get_categories( array(
        // $categories = get_terms( array(
        //     'orderby' => 'name',
        //     'parent'  => 0
        // ) );

        // $categories = get_terms('category');

        $categories = get_post_categories( 'post',  array(
            'orderby' => 'name',
            'parent'  => 0,
            'hide_empty' => 1
        ) );

        $filterItems = array();
        foreach($categories as $category) {
            $filterItems[]= '
                <li>
                    <a href="#" class="filter" data-taxonomy="'.$category->slug.'">
                        '.$category->name.'
                    </a>
                </li>'; 
        }


        // $filter .= implode($filterItems, '<li class="seperator"></li>');
        $filter .= implode($filterItems, '');
        // pre($categories);
        $filter .= '</ul>';
        $filter .= '</div>';
        $filter .= '</div>';
    }



    // col-md-6


    // createMasonry('col-md-6', 'ratio-1-1');
    // createMasonry('col-md-6', 'ratio-2-1');
    // createMasonry('col-md-6', 'ratio-2-1');


    // createMasonry('col-md-6', 'ratio-2-1');
    // createMasonry('col-md-6', 'ratio-2-1');


    // createMasonry('col-md-6', 'ratio-2-1');
    // createMasonry('col-md-6', 'ratio-1-1');
    // createMasonry('col-md-6', 'ratio-2-1');

    // createMasonry('col-md-6', 'ratio-2-1');


    print $filter . $prefix . $grid . $suffix;


    if($more_button) {

        print '
            <div class="row">
                <div class="container">
                    <div class="col-md text-center">
                        <a href="'.NEWS_ARCHIVE.'" class="btn btn-primary btn-more-projects">More News</a>
                    </div>
                </div>
            </div>
        ';
    }
        
 
}