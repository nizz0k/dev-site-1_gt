<?php

	// $element;
	

// Content

	$title = '';
	if($element['title']) $title = '<h2>'.$element['title'].'</h2>';



	$subline = '';
	if($element['subline']) $subline = '<div class="table-note">'.$element['subline'].'</div>';


	$table = $element['table'];

	$rendered_table = '';
	
	if ( $table ) {
		    $rendered_table .= '<table class="facts-table">';
		        if ( $table['header'] ) {
		            $rendered_table .= '<thead>';
		                $rendered_table .= '<tr>';

		                    foreach ( $table['header'] as $th ) {
		                        $rendered_table .= '<td>';
		                            $rendered_table .= $th['c'];
		                        $rendered_table .= '</td>';
		                    }
		                $rendered_table .= '</tr>';
		            $rendered_table .= '</thead>';
		        }


		        $rendered_table .= '<tbody>';
		            foreach ( $table['body'] as $tr ) {
		                $rendered_table .= '<tr>';
		                    foreach ( $tr as $td ) {
		                        $rendered_table .= '<td>';
		                            $rendered_table .= $td['c'];
		                        $rendered_table .= '</td>';
		                    }
		                $rendered_table .= '</tr>';
		            }
		        $rendered_table .= '</tbody>';
		    $rendered_table .= '</table>';
		}





?>


<div class="table-wrapper">
	<?php
		print $title;
		print $rendered_table;
		print $subline;
		
	?>
</div>