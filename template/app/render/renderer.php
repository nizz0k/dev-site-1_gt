<?php 

define('RENDER_DIR',dirname(__FILE__) );
define('COMP_DIR',RENDER_DIR . '/../components/' );
define('MODULE_DIR',RENDER_DIR . '/../modules/' );




define('CONTENT_DIR',RENDER_DIR . '/../content/' );
define('CONTENT_MODULES_DIR',RENDER_DIR . '/../content/modules/' );
define('CONTENT_ELEMENTS_DIR',RENDER_DIR . '/../content/modules/elements/' );




function render_section($a) {
	$s = '';

	$sections = get_field('sections', $a->ID);
    if($sections) {
        $sectionCounter = 0;
        
        $isOdd;

        foreach($sections as $section) {

            $isOdd =    ($sectionCounter & 1 ) ? true : false;

            $classes =  array(); // reset classes of row
            if($isOdd)  $classes[] = 'odd'; // is row even or odd
            else        $classes[] = 'even'; // is row even or odd


            $classes[] = $section['style'].'-container';
            $background_image = $section['background_image'];

            if(isset($sectionCounter) && $sectionCounter == 0) $classes[] = 'first-section';


            $module_file = MODULE_DIR.'section.php';

            if(file_exists($module_file) ) include($module_file);

            $sectionCounter++;
        }
    }

	return $s;
}



/*
function render_section_modules($a) {

    
    $elements = $a['rows_modules'];


    $elementCounter = 0;
    $isOdd;

    foreach($elements as $element) {

        $isOdd =    ($elementCounter & 1 ) ? true : false;

        $classes =  array(); // reset classes of row
        if($isOdd)  $classes[] = 'odd'; // is row even or odd
        else        $classes[] = 'even'; // is row even or odd


        $prefix = '';
        $suffix = '';
        $is_fullwidth = true;
        $is_accordion = true;

        if(isset($elementCounter) && $elementCounter == 0) $classes[] = 'first-element';

        if($element['acf_fc_layout'] == 'row') {
            $is_fullwidth = $element['fullwidth'];
            $is_accordion = $element['accordion'];
            $module_file = MODULE_DIR.$element['col_len'].'.php';
        } else {
            // $is_fullwidth = $element['fullwidth'];
            $module_file = MODULE_DIR.$element['acf_fc_layout'].'.php';
        }


        if(file_exists($module_file) ) include($module_file);
        

        $elementCounter++;
    }

}

*/





function render_components($content, $parent = '') {

    // $content = get_field('layout', $a->ID);
    // $content = get_field($_field, $a->ID);
    
    if($content) {
        $rowCounter = 0;
        $typeOfFirstRow = $content[0]['acf_fc_layout'];

        $row_after = '';
        $row_next = '';
        $row_before = '';
        $isOdd;





        foreach($content as $block) {

            $isOdd =    ($rowCounter & 1 ) ? true : false;

            $classes =  array(); // reset classes of row
            if($isOdd)  $classes[] = 'odd'; // is row even or odd
            else        $classes[] = 'even'; // is row even or odd

            // if($rowCounter > 0) $row_after = $content[$rowCounter-1]['acf_fc_layout'];
            // if( isset($content[$rowCounter+1]) ) $row_next = $content[$rowCounter+1]['acf_fc_layout'];
            // else $row_next = '';

            if(isset($rowCounter) && $rowCounter == 0) $classes[] = 'first-row';

            $comp_file = COMP_DIR.$block['acf_fc_layout'].'.php';
            if(file_exists($comp_file) ) include($comp_file);
            
            // $row_before = $block['acf_fc_layout'];
            $rowCounter++;
        }


    }


}







/*******
    Restructered Renderer
*******/






function render_content($a) {
    if(!$a) return false;
    $s = '';

    $contents = get_field('content', $a->ID);
    if($contents) {
        $contentCounter = 0;

        $typeOfFirstRow = $contents[0]['acf_fc_layout'];
        
        $isOdd;
        foreach($contents as $content) {

            $isOdd =    ($contentCounter & 1 ) ? true : false;

            $styles =  array(); // reset style of row
            $classes =  array(); // reset classes of row
            if($isOdd)  $classes[] = 'odd'; // is row even or odd
            else        $classes[] = 'even'; // is row even or odd



            if(isset($rowCounter) && $rowCounter == 0) $classes[] = 'first-row';

            $content_file = CONTENT_DIR.$content['acf_fc_layout'].'.php';
            // pre($content_file);
            if(file_exists($content_file) ) include($content_file);

            $contentCounter++;
        }
    }

    return $s;
}



function render_modules($modules) {
    if(!$modules) return false;

    $moduleCounter = 0;
    $isOdd;


    foreach($modules as $module) {

        $isOdd =    ($moduleCounter & 1 ) ? true : false;

        $classes =  array(); // reset classes of row
        if($isOdd)  $classes[] = 'odd'; // is row even or odd
        else        $classes[] = 'even'; // is row even or odd


        $prefix = '';
        $suffix = '';


        if(isset($moduleCounter) && $moduleCounter == 0) $classes[] = 'first-module';

        $module_file = CONTENT_MODULES_DIR.$module['acf_fc_layout'].'.php';
        if(file_exists($module_file) ) include($module_file);
        

        $moduleCounter++;

    }

}



function render_elements($elements, $print = true) {

    $render = '';

    if(!$elements) return false;

    $elementCounter = 0;
    $isOdd;


    foreach($elements as $element) {

        $isOdd =    ($elementCounter & 1 ) ? true : false;

        $classes =  array(); // reset classes of row
        if($isOdd)  $classes[] = 'odd'; // is row even or odd
        else        $classes[] = 'even'; // is row even or odd


        $prefix = '';
        $suffix = '';


        if(isset($elementCounter) && $elementCounter == 0) $classes[] = 'first-element';

        $module_file = CONTENT_ELEMENTS_DIR.$element['acf_fc_layout'].'.php';
        if(file_exists($module_file) ) include($module_file);
        

        $elementCounter++;

    }

    if($print) print $render;
    else return $render;

}



function render_columns($module, $print = true) {

/*
    size_of_columns
    1-1 : 1/2 - 1/2
    3-7 : 1/4 - 3/4
    4-8 : 1/3 - 2/3
    8-4 : 2/3 - 1/3
    7-3 : 3/4 - 1/4

    1-1 : 1:1
    5-7 : 5:7
    4-8 : 4:8
    8-4 : 8:4
    7-5 : 7:5
*/

    $first_col_classes = array();
        $first_col_classes[] = 'col-12';

    $second_col_classes = array();
        $second_col_classes[] = 'col-12';


    $size_of_columns = '1-1';

    if(array_key_exists('size_of_columns', $module)) {
        if($module['size_of_columns']) $size_of_columns = $module['size_of_columns'];


        if($size_of_columns == '1-1') {
            $first_col_classes[] = 'col-md-6';
            $second_col_classes[] = 'col-md-6';
        }
        
        if($size_of_columns == '5-7') {
            $first_col_classes[] = 'col-md-5';
            $second_col_classes[] = 'col-md-7';
        }
        
        if($size_of_columns == '4-8') {
            $first_col_classes[] = 'col-md-4';
            $second_col_classes[] = 'col-md-8';
        }

        if($size_of_columns == '8-4') {
            $first_col_classes[] = 'col-md-8';
            $second_col_classes[] = 'col-md-4';
        }

        if($size_of_columns == '7-5') {
            $first_col_classes[] = 'col-md-7';
            $second_col_classes[] = 'col-md-5';
        }
    } else {
        $first_col_classes[] = 'col-md-6';
        $second_col_classes[] = 'col-md-6';
    }





    $render = '';

    $classes = array();

    $number_of_coloums = $module['number_of_coloums'];


    
    if(array_key_exists('padding_bottom', $module)) {
        $padding_bottom = $module['padding_bottom'];
        if($padding_bottom) $classes[] = 'row-padding-bottom';
    }

    if(array_key_exists('padding_top', $module)) {
        $padding_top = $module['padding_top'];
        if($padding_top) $classes[] = 'row-padding-top';
    }



    if($number_of_coloums == 'single-column') {
        $col_size = 'col-8';
        if( array_key_exists('wide_row',$module) && $module['wide_row'] ) $col_size = 'col-12';

        print '<div class="row justify-content-center text-center '.implode(' ',$classes).'">
                <div class="'.$col_size.'">';
                    render_elements($module['coloumns']['first_column_elements'],false);
        print '</div></div>';
    }


    if($number_of_coloums == 'double-columned') {
        print '
            <div class="row justify-content-md-center '.implode(' ',$classes).'">
                <div class="'.implode(' ',$first_col_classes).' first-col text-padding-x">';
                    render_elements($module['coloumns']['first_column_elements'],false);
                print '
                </div>
                <div class="'.implode(' ',$second_col_classes).' second-col text-padding-x">
                ';
                    render_elements($module['coloumns']['second_column_elements'],false);
                print '
                </div>
            </div>
            ';
    }


    

}