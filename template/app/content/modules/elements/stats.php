<?php

	// $element;
	

// Content

	$title = '';
	if($element['title']) $title = '<h2>'.$element['title'].'</h2>';
	
	$stats = array();

	foreach($element['stats'] as $stat) {

		$stat_title = $stat['title'];
		$icon = $stat['icon'];
		$number = intval($stat['number']);

		$stat_icons = '';

		for($i = 0; $i < $number; $i++) {
			$stat_icons .= '<div class="icon">'.get_svg('../img/icons/'.$icon , $icon , true).'</div>';
		}

		$stats[] = '
		<tr>
			<td>'.$stat_title.'</td>
			<td>
				'.$stat_icons.'
			</td>
		</tr>';
	}



?>


<div class="stats-table-wrapper">
	<?php
		print $title;
		print '<table class="stats-table">'.implode('',$stats).'</table>';
	?>
</div>