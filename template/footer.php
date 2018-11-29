        


        






        <?php /*render_page_form(); */ ?>
    </main><!-- END: Main-Container -->
    <?php /*wp_footer(); */ ?>

<?php /*
<!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <div class="container">
                    <div class="row">
                            <div class="col-md-3 image-col">
                                <div class="background-image ratio-1-1 border-radius" style="background-image:url(<?php print HOMEPATH;?>/sample/team/1.jpg);"></div>

                                <dl>
                                    <dt>Links</dt>
                                    <dd>
                                        <?php
                                        print '
                                            <a href="https://www.xing.com/" class="socialmedia-link"><div class="socialmedia xing">'.get_social('xing').'</div></a>
                                            <a href="https://www.linkedin.com/" class="socialmedia-link"><div class="socialmedia linkedin">'.get_social('linkedin').'</div></a>
                                        ';
                                        ?>

                                    </dd>
                                </dl>
                            </div>
                            <div class="col-md-9">
                                <h1>Erick Yong</h1>
                                <h2>
                                    CEO & Co-Founder<br />
                                    Global Strategy and Business Development
                                </h2>
                                <div class="spacer-30"></div>
                                <p>
                                    Erick is our CEO and co-founder and has helped developed our unique investment approach that combines funding, knowledge transfer, and capacity building. He is our specialist for working with startups, global strategy, and business development.
                                </p>
                                <p>
                                    Erick has traveled extensively since he was young and has lived in various countries while traveling with his parents. He has Cameroonian roots, although he was born in Bonn, Germany and attending university in France. Erick became an entrepreneur and strategic consultant immediately after his studies, where he further developed his strategic thinking skills and comprehensive track record of launching and scaling up new business concepts. He is also a specialist in international marketing strategies, implementing brand strategies, marketing plans and communication campaigns. He has also directed innovation efforts and managed international teams in executing company strategies with global vision.
                                    He is especially passionate about the environmental as well as the economic impact of his projects.
                                </p>
                                <p>
                                    Erick speaks English, French, and German and is well-versed in cross-cultural collaboration. He has a passion for basketball and used to be a professional player in his youth.
                                </p>
                            </div>
                    </div>
                </div>
              </div>

              
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
              

            </div>
          </div>
        </div>
        <!-- End:Modal -->
    */ ?>


    
    <!-- Footer -->
    <footer class="footer bg-secondary text-white">
      <div class="container">
            <div class="row">
                <div class="col-md">
                    <?php
                        $footer_headline = get_field('contact_data_headline', 'options');
                        $footer_text = get_field('contact_data', 'options');


                        print '
                            <h5>'.$footer_headline.'</h5>
                            <p>
                                '.make_clickable($footer_text).'
                            </p>
                        ';
                    ?>
                </div>
                <div class="col-md">
                <?php
                    if ( has_nav_menu( 'footer-primary' ) ) {
                        $body_classes[] = "has-primary-footer";
                        
                        print wp_nav_menu( array( 
                            'theme_location' => 'footer-primary',
                            'echo' => false,
                            'container'       => 'div',
                            'container_id'    => '',
                            'menu_id'         => 'footer-primary',
                            'container_class' => 'footer-primary',
                        ));
                    }
                ?>
                </div>
                <div class="col-md">


                    <?php
                        print '<h5>Sign up for our Newsletter</h5>';
                        print do_shortcode('[yikes-mailchimp form="1"]');
                    ?>
                    © <?php print date('Y'); ?> <?php print get_bloginfo( 'name' ); ?> All rights reserved
                    <?php
                        print social_media_icons();
                    ?>
                </div>
            </div>
        </div>
    </footer>
    <!-- END: Footer -->
   


    <?php wp_footer(); ?>

<!-- Scripts -->
    <script src="<?php timestamp('/js/package.js'); ?>"></script>
    <script src="<?php timestamp('/js/bootstrap.js'); ?>"></script>
    <!--
    -->
    <?php
        // global $has_plyr;
        // if($has_plyr) print '<script src="'.THEMEPATH.'/js/vendor/plyr.js"></script>';
    ?>
    <?php /*
    <!-- <script src="<?php print THEMEPATH; ?>/js/vendor/swiper.min.js"></script> -->
    <!--<script src="<?php print THEMEPATH; ?>/js/vendor/plyr.js"></script>-->
    
    <!--<script src="<?php print THEMEPATH; ?>/js/vendor/video.min.js"></script>-->
    <!--<script src="<?php print THEMEPATH; ?>/js/vendor/videojs-vimeo.min.js"></script>-->

    <!--
    <script src="<?php print THEMEPATH; ?>/js/vendor/mediaelement/mediaelement-and-player.js"></script>
    <script src="<?php print THEMEPATH; ?>/js/vendor/mediaelement/renderers/vimeo.min.js"></script>
    <script src="<?php print THEMEPATH; ?>/js/vendor/mediaelement/renderers/facebook.min.js"></script>
    -->

    <!-- <script src="<?php print THEMEPATH; ?>/js/vendor/tingle.min.js"></script>
    <script src="<?php print THEMEPATH; ?>/js/vendor/spray.js"></script>
    <script src="<?php print THEMEPATH; ?>/js/vendor/lazyload/lazyload.min.js"></script> -->
    <!--<script src="<?php print THEMEPATH; ?>/js/vendor/lazyload.min.js"></script>-->

    <!-- <script src="<?php print THEMEPATH; ?>/js/vendor/jquery.waypoints.min.js"></script> -->

    
    <script src="<?php print THEMEPATH; ?>/js/vendor/isotope.pkgd.min.js"></script>
    <script src="<?php print THEMEPATH; ?>/js/vendor/packery-mode.pkgd.min.js"></script>
    */ ?>

    
    
    <script src="<?php timestamp('/js/main.js'); ?>"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-117678802-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-117678802-1');
    </script>
    

<!-- END: Scripts -->
  </body>
</html>