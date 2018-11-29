<?php

class Layout { 
    
    static function responsiveImage($a, $has_max_width = false) { 

		$sizes = array('thumbnail', 'medium','medium_large', 'large');
		
		$src_set = array();
		foreach($sizes as $size) {
			$src_set[] = $a['sizes'][$size].' '.$a['sizes'][$size.'-width'].'w';
		}
		$src_set[] = $a['url'];
		$padding_bottom = $a['height']/$a['width']*100;


		$path_info = pathinfo($a['url']);
		$filetype = 'type-'.$path_info['extension'];

		/* <div class="responsive-image '.$filetype.'" style="padding-bottom:'.$padding_bottom.'%;max-width:'.$a['width'].'px;max-height:'.$a['height'].'px"> */


		// $o = '
		// 	<div class="responsive-image '.$filetype.'" style=";max-width:'.$a['width'].'px;max-height:'.$a['height'].'px">
		// 		<div class="image-dimension" style="padding-bottom:'.$padding_bottom.'%;"></div>
		// 		<img width="'.$a['width'].'" height="'.$a['height'].'" 
		// 		data-src-set="'.implode($src_set,',').'" 
		// 		alt="'.$a['alt'].'" 
		// 		description="'.$a['description'].'" 
		// 		caption="'.$a['caption'].'">
		// 		<noscript><img src="'.$a['url'].'" /></noscript>
		// 	</div>
		// ';

		$max_width = '';
		if($has_max_width) {
			$max_width = ' style="max-width:'.$a['width'].'px;"';
		}

		$o = '
			<div class="responsive-image '.$filetype.'" '.$max_width.'>
				<div class="image-dimension" style="padding-bottom:'.$padding_bottom.'%;"></div>
				<img 
					alt="'.$a['alt'].'" 
					description="'.$a['description'].'" 
					caption="'.$a['caption'].'"
					data-src="'.$a['url'].'"
					data-srcset="'.implode($src_set,',').'"
					 >
			</div>
			';





        return $o;
    }






     /*static function responsiveImage($a) { 

		$sizes = array('thumbnail', 'medium','medium_large', 'large');
		
		$src_set = array();
		foreach($sizes as $size) {
			$src_set[] = $a['sizes'][$size].' '.$a['sizes'][$size.'-width'].'w';
		}
		$src_set[] = $a['url'];
		$padding_bottom = $a['height']/$a['width']*100;


		$path_info = pathinfo($a['url']);
		$filetype = 'type-'.$path_info['extension'];

		// $o = '
		// 	<div class="responsive-image '.$filetype.'" style="padding-bottom:'.$padding_bottom.'%;max-width:'.$a['width'].'px;max-height:'.$a['height'].'px">
		// 		<div class="test"></div>
		// 		<img width="'.$a['width'].'" height="'.$a['height'].'" 
		// 		data-src-set="'.implode($src_set,',').'" 
		// 		alt="'.$a['alt'].'" 
		// 		description="'.$a['description'].'" 
		// 		caption="'.$a['caption'].'">
		// 		<noscript><img src="'.$a['url'].'" /></noscript>
		// 	</div>
		// ';

		$o = '
			<div class="responsive-image '.$filetype.'" style=";max-width:'.$a['width'].'px;max-height:'.$a['height'].'px">
				<div class="image-dimension" style="padding-bottom:'.$padding_bottom.'%;"></div>
				<img width="'.$a['width'].'" height="'.$a['height'].'" 
				data-src-set="'.implode($src_set,',').'" 
				alt="'.$a['alt'].'" 
				description="'.$a['description'].'" 
				caption="'.$a['caption'].'">
				<noscript><img src="'.$a['url'].'" /></noscript>
			</div>
		';

        return $o;
    }
	*/

    static function image($a) { 

		$sizes = array('thumbnail', 'medium','medium_large', 'large');
		
		$src_set = array();
		foreach($sizes as $size) {
			$src_set[] = $a['sizes'][$size].' '.$a['sizes'][$size.'-width'].'w';
		}
		$src_set[] = $a['url'];
		$padding_bottom = $a['height']/$a['width']*100;

		$path_info = pathinfo($a['url']);
		$filetype = 'type-'.$path_info['extension'];

		$o = '
			<div class="responsive-image '.$filetype.'" style="padding-bottom:'.$padding_bottom.'%;">
				<img width="'.$a['width'].'" height="'.$a['height'].'" 
				src="'.$a['url'].'"
				data-src-set="'.implode($src_set,',').'" 
				alt="'.$a['alt'].'" 
				description="'.$a['description'].'" 
				caption="'.$a['caption'].'">
				<noscript><img src="'.$a['url'].'" /></noscript>
			</div>
		';

        return $o;
    }


    static function text($a) { 
    	$Parsedown = new Parsedown();
    	$o = $Parsedown->text($a);
        return $o;
    } 
} 