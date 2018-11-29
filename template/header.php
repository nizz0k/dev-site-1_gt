<?php

    $postType = get_post_type();
    define('POST_TYPE', $postType );

    $body_classes = [];
    $body_classes[] = 'js-not-ready';
    // $body_classes[] = 'sub-menu-open';
    
    // $body_classes[] = 'mobile-menu';
    // $body_classes[] = 'mobile-menu-open';



    $navigation = [];
    $meta = [];

    $page_logo = '';
    $page_logo = '
        <a href="'.HOMEPATH.'" class="main-homelink">

            <div class="logo-wrapper">

                '.get_svg('greentec-logo', 'logo', true).'
            </div>
        </a>
    ';







    $project_logo = '';

    if(POST_TYPE == 'portfolio' && !is_archive() ) {

        $project_logo_image = get_field('project_logo');
        // pre($project_logo_image);

        if(is_array($project_logo_image)) {

            $project_logo = '
                <div class="project-link">

                    <div class="project-logo-wrapper">
                        <img src="'.$project_logo_image['url'].'" alt="" />
                    </div>
                </div>
            ';
        }
    }
    
    if ( has_nav_menu( 'primary' ) ) {
        $body_classes[] = "has-primary-menu";
        $navigation[] = wp_nav_menu( array( 
            'theme_location' => 'primary',
            'echo' => false,
            // 'container'       => 'div',
            // 'container_id'    => '',
            'container'       => false, 
            'menu_id'         => 'primary-menu',
            'container_class' => 'primary-menu',
        ));
    }

    // Portfolio / News / Contact + lang

    if ( has_nav_menu( 'secondary' ) ) {
        $body_classes[] = "has-secondary-menu";
        $meta[] = wp_nav_menu( array( 
            'theme_location' => 'secondary',
            'echo' => false,
            // 'container'       => 'div',
            'container'       => false,
            'container_id'    => '',
            'menu_id'         => 'secondary-menu',
            'container_class' => 'secondary-menu',
        )); 
    }

    if(!is_front_page()) {
        $body_classes[] = 'childpage';
    }


    $no_page_padding_top = get_field('no_page_padding_top');
    if($no_page_padding_top) $body_classes[] = 'no-page-padding-top';


    
    

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" itemscope itemtype="http://schema.org/Article">
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php print get_bloginfo( 'name' ); ?></title>
    <?php
        /** SEO **/

        $SEO_TITLE = get_field('seo_title');
        if( !$SEO_TITLE ) $SEO_TITLE = get_bloginfo( 'name' );

        $SEO_DESCRIPTION = get_field('seo_description');
        $SEO_KEYWORDS = get_field('seo_keywords');
        $SEO_IMAGE = get_field('seo_image');


        if( $SEO_DESCRIPTION ) {
            print '
            <meta name="description" content="'.$SEO_DESCRIPTION.'" />
            <meta property="og:description" content="'.$SEO_DESCRIPTION.'">
            <meta itemprop="description" content="'.$SEO_DESCRIPTION.'">
            <meta name="twitter:description" content="'.$SEO_DESCRIPTION.'">
            ';
        }

        if( $SEO_TITLE ) {
            print '
            <meta property="og:title" content="'.$SEO_TITLE.'">
            <meta itemprop="name" content="'.$SEO_TITLE.'">
            <meta name="twitter:title" content="'.$SEO_TITLE.'">
            ';
        }

        if( $SEO_KEYWORDS ) {
            print '
            <meta name="keywords" content="'.$SEO_KEYWORDS.'" />
            ';
        }

        if( $SEO_IMAGE ) {
            print '
            <meta property="og:image" content="'.$SEO_IMAGE['url'].'">
            <meta property="og:image:width" content="'.$SEO_IMAGE['width'].'">
            <meta property="og:image:height" content="'.$SEO_IMAGE['height'].'">
            <meta itemprop="image" content="'.$SEO_IMAGE['url'].'">
            <meta name="twitter:image:src" content="'.$SEO_IMAGE['url'].'">
            ';
        }

            print '
            <meta property="og:type" content="article">
            ';


    ?>

    <link rel="icon" href="<?php print IMAGESPATH; ?>favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?php print IMAGESPATH; ?>favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php print IMAGESPATH; ?>favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php print IMAGESPATH; ?>favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php print IMAGESPATH; ?>favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php print IMAGESPATH; ?>favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php print IMAGESPATH; ?>favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php print IMAGESPATH; ?>favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php print IMAGESPATH; ?>favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php print IMAGESPATH; ?>favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php print IMAGESPATH; ?>favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php print IMAGESPATH; ?>favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php print IMAGESPATH; ?>favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php print IMAGESPATH; ?>favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php print IMAGESPATH; ?>favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php print IMAGESPATH; ?>favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
        
    <link href="<?php timestamp('/css/bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?php timestamp('/css/package.css'); ?>" rel="stylesheet">
    <link href="<?php timestamp('/css/core.css'); ?>" rel="stylesheet">
    <link href="<?php timestamp('/css/swiper.css'); ?>" rel="stylesheet">
    



    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- <script src="<?php print THEMEPATH; ?>/js/vendor/modernizr.js"></script> -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php print GOOGLE_MAPS_API; ?>&libraries=places&sensor=false"></script>


    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">



    <?php /**/ ?>
    <!-- System: START -->
    <?php wp_head(); ?>
    <!-- System: END -->

    <?php if(is_user_logged_in()) : ?>
        <link href="<?php timestamp('/admin/css/prism.css'); ?>" rel="stylesheet">
        <script src="<?php timestamp('/admin/js/prism.js'); ?>"></script>
    <?php endif; ?>
    <?php 
        print '<script type="text/javascript">
            var THEMEPATH="'.THEMEPATH.'";
            var HOMEPATH="'.HOMEPATH.'";
            var CLOSE_ICON = \''.get_svg('assets/close', 'close-icon', true).'\';
        </script>';
    ?>
  </head>
  <body <?php body_class($body_classes); ?>  data-spy="scroll" data-target="#navbar-main" data-offset="100">

    <header id="header">
        
        <?php print $page_logo; ?>
        <?php print $project_logo; ?>
        <?php if(count($navigation) > 0 || true) : ?>
            <a href="#" class="toggle-menu">
                <div class="icon">
                  <span></span>
                  <span></span>
                  <span></span>
                </div>

                <div class="menu-title">
                    <?php /* <div class="current-title">Menu</div> */ ?>
                    <div class="close-title"></div>
                </div>
            </a>
        

            <nav>
                <div id="navigation">
                    <?php print implode('', $navigation); ?>
                    <?php print implode('', $meta); ?>
                </div>

            </nav>
        <?php endif; ?>
             <?php 

                if(!is_front_page()) {
                    // print '
                    // <a href="'.HOMEPATH.'" class="home-close">
                    //     '.get_svg('assets/close', 'close-icon', true).'
                    // </a>
                    // '; 
                }
            ?>

            <?php /*
            <div class="widget">
                <?php
                    get_sidebar();
                ?>
            </div>

            <div class="meta">
                 <div class="searchform-wrapper">
                    <form method="get" id="searchform" action="<?php print HOMEPATH; ?>">
                        <input id="search" name="s" type="text" placeholder="SEARCH" value="<?php print $s; ?>">
                        <button type="submit" class="submit-button">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </div> 
                <?php my_social_icons_output(); ?>
                <?php print implode('', $meta); ?>
            </div>

            */ ?>

        </div>
    </header>

    <?php /*
    <aside>
        <nav id="sidebar" class="navbar navbar-light bg-light fixed-top">
            <ul class="nav nav-tabs" role="tablist">
        </ul>
        </nav>
    </aside>
    */ ?>



     <div id="navbar-main" class="d-none d-sm-block">
        <ul class="nav" role="tablist">
        </ul>
    </div>



    <?php 
        get_sidebar();
    ?>


    <main role="main">



        <?php 
            // if( is_front_page() ) include('modules.php');

        ?>



