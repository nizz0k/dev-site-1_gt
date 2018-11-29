<?php

add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function submenu_get_children_ids( $id, $items ) {

    $ids = wp_filter_object_list( $items, array( 'menu_item_parent' => $id ), 'and', 'ID' );

    foreach ( $ids as $id ) {

        $ids = array_merge( $ids, submenu_get_children_ids( $id, $items ) );
    }

    return $ids;
}



function my_wp_nav_menu_objects( $items, $args ) {
	
	// loop
	foreach( $items as &$item ) {
		
		// vars
		$anchor = get_field('anchor', $item);

		if(strlen($anchor) == 0) continue;


		$is_same_page = false;

		// $parent_id = $item->ID;
  //   	$children  = submenu_get_children_ids( $parent_id, $items );
    	
    	// pre($item->title);
    	// if($item->title == 'Messdatenerfassung') continue;
    	// if($item->title == 'Indizierung / Kurbelwinkelsynchrone Datenerfassung') continue;
    	// if($item->title == 'Motorsteuerung') continue;
    	// if($item->title == 'Prüfstandsystem') continue;
    	

    	// if($item->title == 'Impressum') continue;
    	// if($item->title == 'Datenschutz') continue;

		if( isset($anchor)) {

			// pre($item);

			if( is_front_page() ) {
				$item->classes[] = 'anchor-link';
				$item->url = '#'.toAscii($anchor);
			} else {
				$item->url .= '#'.toAscii($anchor);
			}

			// $item->url = basename(get_page_template());
		}


		// for( $i = 0; $i < count($item->classes); $i++) {
			// pre($item);
			// $item->url = 'test';
			// if( isset($anchor) ) {
			// 	$item->url .= '#'.$anchor;
			// }
		// }

		/*
		for( $i = 0; $i < count($item->classes); $i++) {
			$current_class = $item->classes[$i];
			// pre($current_class);
			if( $current_class == 'current_page_item' ) {
				unset($item->classes[$i]);
				$is_same_page = true;
			}
		}




		if($is_same_page == true) {
			$item->url = '#';
		}


		if( $anchor ) {
			$item->url .= toAscii($anchor);
			$item->classes[] = 'anchor-link';
		}

		*/


				// if( $anchor ) {
			
				// 	// $item->title .= is_current_page();
				// 	$item->url = '#'.$anchor;
				// 	$item->classes[] = 'anchor-link';
				// } else {
				// 	$item->url = '#';
				// }





		// unset($foo[0]); // remove item at index 0
		// $item->classes = array_values($item->classes); // 'reindex' array
		// sort($item->classes); // 'reindex' array
		
		// print $item->title;
		// pre($item->classes);


		
		
		// append anchor
		// if( $anchor ) {
			
		// 	// $item->title .= is_current_page();
		// 	$item->url .= '#'.$anchor;
		// 	$item->classes[] = 'anchor-link';
		// }

		// print '<hr />';
		
	}
	
	
	// return
	return $items;
	
}



add_filter('wp_nav_menu_objects' , 'my_menu_class');
function my_menu_class($menu) {
    $level = 0;
    $stack = array('0');
    foreach($menu as $key => $item) {
        while($item->menu_item_parent != array_pop($stack)) {
            $level--;
        }   
        $level++;
        $stack[] = $item->menu_item_parent;
        $stack[] = $item->ID;
        $menu[$key]->classes[] = 'level-'. ($level - 1);
    }                    
    return $menu;        
}