<?php
        $classes[] = 'row';
        $classes[] = 'single-col';
        $cl = implode(' ', $classes);



        if(!$is_fullwidth) {
            $prefix = '<div class="container">';
            $suffix = '</div>';
        }

?>

<?php print $prefix; ?>
<div class="<?= $cl; ?>">
    <div class="col-xs-12">
        <?php
            // $single_row = get_field();
            // render_items($single_row);
            render_components($element['first_col_components'], 'single-col');
        ?>


    </div>
</div>
<?php print $suffix; ?>