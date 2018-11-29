<?php

function portfolio_tile($post = null, $classes) {
    $str = '';
    
    $tile_classes = array();
    $inner_tile_classes = array();


    foreach($classes as $class) {
        array_push($tile_classes, $class);
    }



    if($post != null) {


        $title = $post->post_title;
        $url = get_permalink($post);
        $short_description = get_field('short_description', $post);
        $image = get_field('image', $post);
        

        $sdg = get_field('sdg', $post);
        $sdg_icons = '';

        if(is_array($sdg) && count($sdg) > 0) {
            foreach($sdg as $sdgi) {
                $sdg_icons .= ''.sdg_icon($sdgi).'';
            }

            $sdg_icons = '<div class="sdg-icons-wrapper">'.$sdg_icons.'</div>';
        }


        
        $invert_color = get_field('invert_color', $post);
        if($invert_color == true) $tile_classes[] = 'inverted';

        $image_string = '';

        if(is_array($image) ) {
            $inner_tile_classes[] = 'background-image';
            $image_string = ' style="background-image: url('.$image['url'].');"';
        }

        // $cats = array();
        // $cats[] = 'eins';
        // $cats[] = 'zwei';
        // $cats[] = 'drei';

        $post_categories = get_the_category($post);
        $cat_classes = array();
        $cats = array();
        $masonry_cats = array();
        
        foreach($post_categories as $cat) {
            $cat_classes[] = 'category-'.$cat->slug;
            // $cat_classes[] = $cat->slug;

            $cats[] = '<div class="tag" data-tag="'.$cat->slug.'">'.$cat->name.'</div>';
            $masonry_cats[] = $cat->slug;
        }


        $inner_classes = array();
        //  <div class="inner-tile background-image" style="background-image: url(sample/1.jpg);">
        // <a href="'.$url.'" class="internal-link factsheet-link" data-modal="factsheet">

//         <a href="'.$url.'" class="tile-link">
// <div class="more-label">Read more <span class="arrow right">'.get_svg('assets/arrow-right-abstract', 'arrow-right', true, true).'</span></div>
        $str = '
            <article class="masonry-item tile '.implode($tile_classes,' ').' ratio-1-1 " data-groups="[\''.implode($masonry_cats, '\',\'').'\']">
                <a href="'.$url.'" class="tile-link">
                    <div class="inner-tile-wrapper">
                        <div class="inner-tile '.implode($inner_tile_classes,' ').'" '.$image_string.'>
                            <h1>'.$title.'</h1>
                            <p>'.$short_description.'</p>
                            '.$sdg_icons.'
                            <div class="more-label">Read more <span class="arrow right">'.get_svg('assets/arrow-right-abstract', 'arrow-right', true, true).'</span></div>
                        </div>
                    </div>
                </a>
            </article>
        ';
    }

    return $str;

    // return '<article class="small-tile" style="display: inline-block; width: 300px; height; 100px;background: #f0c;"">test</article>';
}


function get_portfolio_grid($show_more = true, $show_filter = false, $posts_per_page = 6) {
    $prefix = '<div class="masonry portfolio-grid" id="portfolio-masonry">';
    // $prefix .= '<div class="masonry-item tile small-tile col-xs-12 col-sm-6 col-md-6 col-lg-3 ratio-1-1 js-shuffle-sizer"></div>';
    $suffix = '</div>';

    $grid = '';


    $args = array(
        'posts_per_page'   => $posts_per_page,
        'offset'           => 0,
        // 'category'         => '',
        // 'category_name'    => '',
                // 'orderby'          => 'date',
                // 'order'            => 'DESC',
            // 'orderby' => 'menu_order', 
            'orderby' => 'rand', 
            'order' => 'ASC', 
        // 'include'          => '',
        // 'exclude'          => '',
        // 'meta_key'         => '',
        // 'meta_value'       => '',
        'post_type'        => 'portfolio',
        'post_status'      => 'publish',
        // 'suppress_filters' => true 
    );
    $portfolio = get_posts( $args );

    // pre($portfolio);


    for($i = 0; $i < count($portfolio); $i++) {
        $tile_classes = array();

        $mod = $i%6;

        if(
            // $i == 0 || 
            // $i == 1 || 
            // $i == 4 || 
            // $i == 5

            $mod == 0 || 
            $mod == 1 || 
            $mod == 4 || 
            $mod == 5
        ) {
            $tile_classes[] = "small-tile";
            // $tile_classes[] = "col-md-3";
            $tile_classes[] = "col-xs-12";
            $tile_classes[] = "col-sm-6";
            $tile_classes[] = "col-md-6";
            $tile_classes[] = "col-lg-3";
            
        } else {
            $tile_classes[] = "big-tile";
            // $tile_classes[] = "col-md-6";
            $tile_classes[] = "col-xs-12";
            $tile_classes[] = "col-sm-12";
            $tile_classes[] = "col-md-6";
            $tile_classes[] = "col-lg-6";
            
            
            $tile_classes[] = "text-center";
        }

        $tile_classes[] = "mod-".($i%6);

        $grid .= portfolio_tile($portfolio[$i], $tile_classes);

    }



    $filter = '';
    if($show_filter) {


        $filter = '
        <div class="filter-wrapper">
        <button class="btn toggle-filter">Add Filter</button>
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


    // print $prefix . $grid . $suffix;
    print $filter . $prefix . $grid . $suffix;

    if($show_more) {
        print '
            <div class="row">
                <div class="container">
                    <div class="col-md text-center">
                        <a href="'.PORTFOLIO_ARCHIVE.'" class="btn btn-primary btn-more-projects"><span class="btn-icon grid">'.get_svg('assets/grid', 'grid', true, true).'</span> More Projects</a>
                    </div>
                </div>
            </div>
        ';
    }
        
 
}