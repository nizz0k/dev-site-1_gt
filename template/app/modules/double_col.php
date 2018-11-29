<?php
        $classes[] = 'row';
        $classes[] = 'double-col';
        if($is_accordion) $prefix = '<div class="accordion-wrapper">';

        $cl = implode(' ', $classes);



        $style_classes = array();
        /*
        $margin_top = $element['margin_top'];
        $margin_bottom = $element['margin_bottom'];

        if(!$margin_top) $style_classes[] = 'no-top-space';
        if(!$margin_bottom) $style_classes[] = 'no-bottom-space';
        */


        $scl = implode(' ', $style_classes);



        if(!$is_fullwidth) {
            $prefix = '<div class="container '.$scl.'">';
            if($is_accordion) $prefix = '<div class="container accordion-wrapper">';
            $suffix = '</div>';
        }

        $uid = uniqid();

?>

<?php print $prefix; ?>

    <?php 
        if($is_accordion) {
            print '
            <div class="accordion">
            <div class="accordion-header">
                <a href="#" class="accordion-button button" data-accordion="acc-'.$uid.'">Read More '.get_svg('assets/arrow-down','arrow-down').'</a>
            </div>
            <div class="accordion-content" data-accordion="acc-'.$uid.'">
            ';
        }

    ?>
    <div class="<?= $cl; ?>">
        
        <div class="first-col col-xs-12 col-xs-offset-0 col-md-6 col-md-offset-0">
            <?php
            	render_components($element['first_col_components'], 'double-col');
            ?>
        </div>

       	<div class="second-col col-xs-12 col-xs-offset-0 col-md-6 col-md-offset-0">
            <?php
            	render_components($element['second_col_components'], 'double-col');
            ?>
        </div>

    </div>

   <?php 
        if($is_accordion) {
            print '</div></div>';
        }
    ?>
<?php print $suffix; ?>