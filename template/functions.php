<?php

error_reporting(E_ALL);
ini_set('display_errors', 0);

define('HOMEPATH', get_bloginfo('url'));
define('THEMEPATH', get_stylesheet_directory_uri()); 
define('FONTSPATH', THEMEPATH . '/fonts/');  
define('IMAGESPATH', THEMEPATH . '/img/');  
define('ASSETSPATH', THEMEPATH . '/img/assets/');  
define('SOCIALPATH', THEMEPATH . '/img/socialmedia/');  
define('JAVASCRIPTSPATH', THEMEPATH . '/js/');  
define('CSSPATH', THEMEPATH . '/css/');  

define('CLASS_MODULE_PATH', THEMEPATH . '/modules/');  


define('SAMPLE', THEMEPATH . '/_sample/');


define('GOOGLE_MAPS_API', 'AIzaSyD9VXRwbWpIMmTk0vQBb8J2e3NumtdF56A');


define('HAS_TIMESTAMP', true);


// Has Plyr
global $has_plyr;
$has_plyr = false;





add_theme_support( 'menus' );
register_nav_menu( 'primary', __( 'Primary Menu', 'theme-slug' ) );
register_nav_menu( 'secondary', __( 'Secondary Menu', 'theme-slug' ) );
register_nav_menu( 'socialmedia', __( 'Social Media', 'theme-slug' ) );
register_nav_menu( 'footer-primary', __( 'Primary Footer', 'theme-slug' ) );
register_nav_menu( 'footer-secondary', __( 'Secondary Footer', 'theme-slug' ) );


include('app/utils/utils.php');
include('app/utils/socialmedia.php');
include('app/utils/VideoUrlParser.php');
include('app/utils/custom_menu.php');
include('app/render/renderer.php');
include('app/layout/layout.php');



include('app/modules/portfolio.php');
include('app/modules/team.php');
include('app/modules/news.php');
include('app/modules/advisors.php');
/*
include('app/vendors/parsedown/Parsedown.php');
include('app/utils/custom_menu.php');
include('app/layout/ui.php');
// include('app/acf/form.php');
include('app/utils/search.php');
*/



define( 'BLOG_ARCHIVE', get_permalink( get_option( 'page_for_posts' ) ));



/********************
**** Hide Editor ****
********************/
// add_action('admin_init', 'remove_textarea');
function remove_textarea() {
        remove_post_type_support( 'post', 'editor' );
        remove_post_type_support( 'post', 'thumbnail' );

        register_taxonomy('category', array());
        register_taxonomy('post_tag', farray());

        // register_taxonomy('animation_category', array());
        // register_taxonomy('visual_effects_category', array());
        // register_taxonomy('concept_design_category', array());

        remove_post_type_support( 'page', 'editor' );
        remove_post_type_support( 'page', 'thumbnail' );
}


add_action('admin_menu', 'my_remove_sub_menus');

function my_remove_sub_menus() {
    // remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category');
    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');
}

/**************
**** Admin ****
**************/
function my_acf_input_admin_footer() {
    // $field_key = '56bc54aad5cd2'; // Wrapper
    // $image_field = '56bc54c711f07'; // Image
    // $repeater_field = '56bc54d711f08'; // Repeater

    /*
    // print '<script type="text/javascript">';
    // ?>
    //     var imapeMapWrapper = '<?php print $field_key; ?>';
    //     var imapeMapImage = '<?php print $image_field; ?>';
    //     var imapeMapRepeater = '<?php print $repeater_field; ?>';
    // <?php
    // print '</script>';
    */

    // print '<script src="'.THEMEPATH.'/admin/js/snap.svg-min.js"></script>';
    // print '<script src="'.THEMEPATH.'/admin/js/jquery-ui.js"></script>';
    // print '<script src="'.THEMEPATH.'/admin/js/jquery.copyEvents.js"></script>';
    // print '<script src="'.THEMEPATH.'/admin/js/admin_fields.js"></script>';
    // print '<link rel="stylesheet" href="'.THEMEPATH.'/admin/css/admin_fields.css" />';

}
add_action('acf/input/admin_footer', 'my_acf_input_admin_footer');


/*******
 include functions render text-elements
*******/


add_action( 'init', 'create_post_types' );
function create_post_types() {



    define('NEWS_ARCHIVE',      get_post_type_archive_link('post'));




    register_post_type( 'Portfolio',
        array(
            'labels' => array(
                'name' => __( 'Portfolio' ),
                'singular_name' => __( 'Portfolio' )
            ),
        'supports'            => array( 'title'),
        'public' => true,
        'has_archive' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'portfolio'),
        'menu_icon' => 'dashicons-format-aside',
        // 'taxonomies' => array('category'),
        // 'taxonomies' => array('post_tag')
        )
    );

    flush_rewrite_rules();
    define('PORTFOLIO_ARCHIVE',      get_post_type_archive_link('portfolio'));



    register_post_type( 'Team',
        array(
            'labels' => array(
                'name' => __( 'Team' ),
                'singular_name' => __( 'Team' )
            ),
        'supports'            => array( 'title'),
        'public' => true,
        'has_archive' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'team'),
        'menu_icon' => 'dashicons-admin-users',
        // 'taxonomies' => array('category'),
        // 'taxonomies' => array('post_tag')
        )
    );

    flush_rewrite_rules();
    define('TEAM_ARCHIVE',      get_post_type_archive_link('team'));
    



    


    

     if( function_exists('acf_add_options_page') ) {
        

        /**** Main Options ***/
        acf_add_options_page(array(
            'page_title'    => 'Website',
            'menu_title'    => 'Website',
            'menu_slug'     => 'global-page-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false,
            'position'      => 25,
            'icon_url'      => 'dashicons-admin-home',
        ));






        /**** Archive Settings ****/
        /*

        $archives = array(
            'animation',
            'visual_effects',
            'concept_art',
            'character_design',
            'storyboards_reels',
            'talents'
        );


        foreach($archives as $archive) {
            acf_add_options_page(array(
                'page_title'    => 'Einstellungen',
                'menu_title'    => $archive.' Einstellungen',
                'menu_slug'     => 'settings_'.$archive,
                'capability'    => 'edit_posts', 
                'parent_slug'   => 'edit.php?post_type='.$archive,
                'position'  => false,
                'icon_url'  => 'dashicons-images-alt2',
                'redirect'  => false,
            ));
        }
        */



    }
    flush_rewrite_rules();




}





function custom_taxonomies() {
     $labels = array(
           'name'                       => __( 'Kategorie'),
           'singular_name'              => __( 'Kategorie'),
           'search_items'               => __( 'Kategorien durchsuchen' ),
           'popular_items'              => __( 'Beliebte Kategorie' ),
           'all_items'                  => __( 'Alle Kategorien' ),
           'parent_item'                => null,
           'parent_item_colon'          => null,
           'edit_item'                  => __( 'Kategorie bearbeiten' ),
           'update_item'                => __( 'Kategorie aktualisieren' ),
           'add_new_item'               => __( 'Neue Kategorie hinzufügen' ),
           'new_item_name'              => __( 'Neue Kategorie' ),
           'separate_items_with_commas' => __( 'Kategorien mit Kommas trennen' ),
           'add_or_remove_items'        => __( 'Kategorien hinzufügen oder entfernen' ),
           'choose_from_most_used'      => __( 'Aus den meist verwendeten Kategorien aussuchen' ),
           'not_found'                  => __( 'Keine Kategorien gefunden.' ),
           'menu_name'                  => __( 'Kategorien' ),
    );

     $args = array(
           'hierarchical'          => true,
           'labels'                => $labels,
           'show_ui'               => true,
           'show_admin_column'     => true,
           'update_count_callback' => '_update_post_term_count',
           'query_var'             => true,
           'rewrite'               => array( 'slug' => 'category' ),
    );

    register_taxonomy( 'animation_category', 'animation', $args );
    register_taxonomy( 'visual_effects_category', 'visual_effects', $args );
    register_taxonomy( 'concept_design_category', 'concept_design', $args );
    register_taxonomy( 'talents_category', 'talents', $args );
}

add_action( 'init', 'custom_taxonomies', 0 );


// add_action('add_meta_boxes', 'meta_boxes_function');
// function meta_boxes_function() {
//     add_meta_box('categoriesdiv', 'Kategorien', 'post_categories_meta_box', 'animation', 'side', null, array( 'taxonomy' => 'animation_category' ));
//     add_meta_box('categoriesdiv', 'Kategorien', 'post_categories_meta_box', 'visual_effects', 'side', null, array( 'taxonomy' => 'visual_effects_category' ));
//     add_meta_box('categoriesdiv', 'Kategorien', 'post_categories_meta_box', 'concept_design', 'side', null, array( 'taxonomy' => 'concept_design_category' ));
// }










/*************************************************
**** Polylang Copy Meta on create translation ****
*************************************************/

// add_filter('pll_copy_post_metas', 'copy_post_metas');
// function copy_post_metas($metas) {
//     return array_merge($metas, array('my_post_meta'));
// }







// function get_vita($post_type) {
//     $args = array(
//         'post_type' => $post_type,
//         'posts_per_page' => -1
//     );

//     $loop = new WP_Query( $args );
//     while ( $loop->have_posts() ) : $loop->the_post();
//         the_ID();
//     endwhile;
// }











/******************************************************
*******************************************************
*******************************************************
*******************************************************/
function my_acf_input_admin_footer_test() {

    ?>

        <script type="text/javascript">
        
        (function($) {

            
            $multi_col_select = $('.acf-field-select[data-name="col_len"] select');

            $multi_col_select.each(function(){
                var col_type = $(this).val();
                var col_class = '';

                if(col_type == 'single_col') {
                    col_class = "single-col";
                }

                if(col_type == 'double_col') {
                    col_class = "double-col";
                }

                $(this).parent().parent().parent().removeClass("single-col double-col ").addClass(col_class);
            });



            $(document).on('change','.acf-field-select[data-name="col_len"] select', function(){
                var col_type = $(this).val();
                var col_class = '';


                if(col_type == 'single_col') {
                    col_class = "single-col";
                }

                if(col_type == 'double_col') {
                    col_class = "double-col";
                }

                $(this).parent().parent().parent().removeClass("single-col double-col ").addClass(col_class);
            });
        


        })(jQuery); 
        </script>
    <?php

}
// add_action('acf/input/admin_footer', 'my_acf_input_admin_footer_test');


// Handle Dragging Between Columns
/*
function my_acf_input_admin_footer_test() {

    ?>

        <script type="text/javascript">
        
        (function($) {

            $( ".values" ).sortable({
              // connectWith: ".values"

              connectWith: [
                '[data-layout="single_row"] .values',
                '[data-layout="double_row"] .values',
                '[data-layout="three_row"] .values',
                ]
            })

        })(jQuery); 

        function GetSubstringIndex(str, substring, n) {
            var times = 0, index = null;

            while (times < n && index !== -1) {
                index = str.indexOf(substring, index+1);
                times++;
            }

            return index;
        }
        
        acf.add_action('sortstop', function ($el) {
            if ($($el).parent('[data-name="elements"] > .acf-input > .acf-flexible-content > .values').length) {
                var column_num = $($el).closest('[data-layout="column"]').attr('data-id');
                $($el).find('[name^="acf[field_"]').each(function(){
                    var field_name = $(this).attr('name');   
                    var index_location = field_name.indexOf(']')+2;
                    var new_name = field_name.substr(0, index_location) + column_num + field_name.substr(index_location+1)
                    $(this).attr('name', new_name);
                });
                $($el).closest('[data-name="elements"]').find('.acf-input > .acf-flexible-content > .values > .layout').each(function(index){
                    $(this).find('[name^="acf[field_"]').each(function(){
                        var field_name = $(this).attr('name');   
                        var index_location = GetSubstringIndex(field_name,']', 3)+2;
                        var new_name = field_name.substr(0, index_location) + index + field_name.substr(index_location+1);
                        $(this).attr('name', new_name);
                    });
                });
            }
        });        

        </script>

    <?php

}

add_action('acf/input/admin_footer', 'my_acf_input_admin_footer_test');
*/
/*******************************************************
*******************************************************
*******************************************************
******************************************************/



function acf_prerender_the_content( $post_id ){

        /*
        $post = get_post($post_id);
        $post_type = $post->post_type;

        if($post_type == 'page') {
        
            ob_start();
            render_section($post);
            $new_content = ob_get_contents();
            ob_end_clean();
            
            $my_post = array(
                'ID'           => $post_id,
                'post_content' => $new_content
            );

            remove_action('save_post', 'acf_prerender_the_content', 20);
            wp_update_post( $my_post );
            add_action('save_post', 'acf_prerender_the_content', 20);
        }
        */
        
    
}
 
// run after ACF saves the $_POST['acf'] data
add_action('save_post', 'acf_prerender_the_content', 20);




// Google Maps Api
function googleapis($hook) {
    wp_enqueue_script( 'googleapis', 'https://maps.googleapis.com/maps/api/js?key='.GOOGLE_MAPS_API.'&libraries=places&sensor=false' );
}
add_action( 'admin_enqueue_scripts', 'googleapis' );
// add_action( 'wp_enqueue_scripts', 'googleapis' );













function show_fields( $field ) {
    pre($field);
    return $field;
}

function wrap_label_span( $field ) {
     // loop through array and add to field 'choices'

    if( !is_admin() ){
        if( is_array($field['choices']) ) {
            
            foreach( $field['choices'] as $choice ) {
                
                $field['choices'][ $choice ] = '<span>'.$choice . '</span>';       
            }
            
        }
    }

    
    // pre($field);
    // return
    return $field;
    
}

// add_filter('acf/load_field', 'show_fields');

add_filter('acf/load_field/type=checkbox', 'wrap_label_span');
add_filter('acf/load_field/type=radio', 'wrap_label_span');




// SVG Support

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');



function privacy_policy_page_shortcode() {
    $url = '#';
    $url_field = get_field('privacy_policy_page','options');
    if($url_field) {
        $url = get_permalink($url_field);
    }
    return '<a href="'.$url.'" target="_blank">Privacy Policy</a>';
}
add_shortcode('privacy_policy', 'privacy_policy_page_shortcode');



add_filter( 'wpcf7_form_elements', 'mycustom_wpcf7_form_elements' );
function mycustom_wpcf7_form_elements( $form ) {
    $form = do_shortcode( $form );
    return $form;
}






// Clean up WordPress Header

function wpdocs_dequeue_script() {
   wp_dequeue_script( 'jquery-ui-core' );
}
add_action( 'wp_print_scripts', 'wpdocs_dequeue_script', 100 );



remove_action('wp_head', 'wp_resource_hints', 2);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head',      'rest_output_link_wp_head');
remove_action( 'wp_head',      'wp_oembed_add_discovery_links');
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
remove_action ('wp_head', 'rsd_link');
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');




// add_filter( 'pre_do_shortcode_tag', function( $a, $tag, $attr, $m ) {
//   if( 'yikes-mailchimp' === $tag ) {
//     wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer = true );
//   }
//   return $a;
// }, 10, 4 );







/*** Remove Comments ***/
// Disable support for comments and trackbacks in post types
function disable_comments_post_types_support() {
	$post_types = get_post_types();
	foreach ($post_types as $post_type) {
		if(post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
}
add_action('admin_init', 'disable_comments_post_types_support');

// Close comments on the front-end
function disable_comments_status() {
	return false;
}
add_filter('comments_open', 'disable_comments_status', 20, 2);
add_filter('pings_open', 'disable_comments_status', 20, 2);

// Hide existing comments
function disable_comments_hide_existing_comments($comments) {
	$comments = array();
	return $comments;
}
add_filter('comments_array', 'disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
function disable_comments_admin_menu() {
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'disable_comments_admin_menu');

// Redirect any user trying to access comments page
function disable_comments_admin_menu_redirect() {
	global $pagenow;
	if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url()); exit;
	}
}
add_action('admin_init', 'disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
function disable_comments_dashboard() {
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'disable_comments_dashboard');

// Remove comments links from admin bar
function disable_comments_admin_bar() {
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
}
add_action('init', 'disable_comments_admin_bar');
