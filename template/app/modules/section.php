<?php


        $classes[] = 'section';
        $styles = array();


        if( !empty($background_image) ) {
            $classes[] = 'has-background-image';
            $styles[] = 'background-image:url('.$background_image['url'].')';

            $classes[] = 'background-'.$section['background_image_style'];
        }


        $style = '';

        $cl = implode(' ', $classes);

        $title = $section['anchor'];
        if( empty($title) ) $title = 'section-'.$sectionCounter;
        $anchor = toAscii($title);



        if(count($styles) > 0) $style = 'style="'.implode(';',$styles).'"';



?>
<section <?= $style; ?> class="<?= $cl; ?> anchor"  id="<?= $anchor; ?>" name="<?= $anchor; ?>" title="<?= $title; ?>" >
	<?php
		render_section_modules($section);
	?>
</section>


