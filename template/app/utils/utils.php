<?php


function timestamp($url) {

    $filemtime = filemtime(dirname(__FILE__).'/../../' . $url);

    $url = THEMEPATH.$url;
    if(HAS_TIMESTAMP) print $url.'?'.$filemtime;
    else print $url;
    
}


/** add browser and os to body_classes **/
function mv_browser_body_class($classes) {
        global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
        if($is_lynx) $classes[] = 'lynx';
        elseif($is_gecko) $classes[] = 'gecko';
        elseif($is_opera) $classes[] = 'opera';
        elseif($is_NS4) $classes[] = 'ns4';
        elseif($is_safari) $classes[] = 'safari';
        elseif($is_chrome) $classes[] = 'chrome';
        elseif($is_IE) {
                $classes[] = 'ie';
                // if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
                // $classes[] = 'ie'.$browser_version[1];
                
                if(preg_match('/(MSIE |Trident.*rv[ :])([0-9]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
                $classes[] = 'ie'.$browser_version[2];

        } else $classes[] = 'unknown';
        if($is_iphone) $classes[] = 'iphone';
        if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
                 $classes[] = 'osx';
           } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
                 $classes[] = 'linux';
           } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
                 $classes[] = 'windows';
           }
        return $classes;
}
add_filter('body_class','mv_browser_body_class');




function toAscii($str, $replace=array(), $delimiter='-') {

    $str = ''.$str;
    // specials
    $specials = array(
        'ö' => 'oe',
        'ä' => 'ae',
        'ü' => 'ue',

        'Ö' => 'OE',
        'Ä' => 'AE',
        'Ü' => 'UE',
    );

    $str = strtr($str, $specials);

	if( !empty($replace) ) {
		$str = str_replace((array)$replace, ' ', $str);
	}

	$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
	$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
	$clean = strtolower(trim($clean, '-'));
	$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

	return $clean;
}




function FileSizeConvert($bytes)
{
    $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

    foreach($arBytes as $arItem)
    {
        if($bytes >= $arItem["VALUE"])
        {
            $result = $bytes / $arItem["VALUE"];
            $result = strval(round($result, 2))." ".$arItem["UNIT"];
            break;
        }
    }
    return $result;
}






function strip_tags_content($text, $tags = '', $invert = FALSE) { 
  preg_match_all('/<(.+?)[\s]*\/?[\s]*>/si', trim($tags), $tags); 
  $tags = array_unique($tags[1]); 
    
  if(is_array($tags) AND count($tags) > 0) { 
    if($invert == FALSE) { 
      return preg_replace('@<(?!(?:'. implode('|', $tags) .')\b)(\w+)\b.*?>.*?</\1>@si', '', $text); 
    } 
    else { 
      return preg_replace('@<('. implode('|', $tags) .')\b.*?>.*?</\1>@si', '', $text); 
    } 
  } 
  elseif($invert == FALSE) { 
    return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text); 
  } 
  return $text; 
} 


function pre($obj) {
    print '<pre>
        <code class="language-php">';
    print_r($obj);
    print '
        </code>
    </pre>';
}



function get_social($type) {
    // file_get_contents(__FILE__)
    $string = file_get_contents(dirname(__FILE__).'/../../img/socialmedia/'.$type.'.svg');
    libxml_use_internal_errors(true); //Prevents Warnings, remove if desired
    $dom = new DOMDocument();
    $dom->loadHTML($string);
    $body = "";
    $body = $body .= $dom->saveHTML($dom->getElementsByTagName("svg")->item(0));
    $body = preg_replace('#\s(id)="[^"]+"#', '', $body);
    return $body;
}

function social_media_icons($post = 'options') {

    $string = '';

    $facebook       = get_field('facebook', $post);
    if(isset($facebook) && $facebook != '') $string .= '<a href="'.$facebook.'" class="socialmedia-link"><div class="socialmedia facebook">'.get_social('facebook').'</div></a>';

    $twitter        = get_field('twitter', $post);
    if(isset($twitter) && $twitter != '') $string .= '<a href="'.$twitter.'" class="socialmedia-link"><div class="socialmedia twitter">'.get_social('twitter').'</div></a>';

    $instagram      = get_field('instagram', $post);
    if(isset($instagram) && $instagram != '') $string .= '<a href="'.$instagram.'" class="socialmedia-link"><div class="socialmedia instagram">'.get_social('instagram').'</div></a>';

    $xing           = get_field('xing', $post);
    if(isset($xing) && $xing != '') $string .= '<a href="'.$xing.'" class="socialmedia-link"><div class="socialmedia xing">'.get_social('xing').'</div></a>';

    $linkedin       = get_field('linkedin', $post);
    if(isset($linkedin) && $linkedin != '') $string .= '<a href="'.$linkedin.'" class="socialmedia-link"><div class="socialmedia linkedin">'.get_social('linkedin').'</div></a>';


    // $string = get_social('facebook');
    return '<div class="socialmedia-wrapper">'.$string.'</div>';
}
// function get_svg($type) {
//     $string = file_get_contents(dirname(__FILE__).'/img/assets/'.$type.'.svg');
//     libxml_use_internal_errors(true); //Prevents Warnings, remove if desired
//     $dom = new DOMDocument();
//     $dom->loadHTML($string);
//     $body = "";
//     $body = $body .= $dom->saveHTML($dom->getElementsByTagName("svg")->item(0));
//     $body = preg_replace('#\s(id)="[^"]+"#', '', $body);
//     return $body;
// }





function get_svg($type, $classes = '', $remove_stle = true, $remove_id = true) {
    $file = dirname(__FILE__).'/../../img/'.$type.'.svg';

    $classname = toAscii($type).'-';


    if(file_exists($file)) {
        $string = file_get_contents($file);


        $replace_classes = array();
        for($i = 0; $i < 20; $i++) {
            $replace_classes['st'.$i] = $classname.$i;
        }
        $string = strtr($string, $replace_classes);


        libxml_use_internal_errors(true); //Prevents Warnings, remove if desired
        $dom = new DOMDocument();
        $dom->loadHTML($string);

        $svg = $dom->getElementsByTagName("svg");
        if($classes != '' ) $svg->item(0)->setAttribute('class', $classes);
        $body = "";
        if($remove_id) $dom->getElementsByTagName("svg")->item(0)->removeAttribute('id');
        $body = $body .= $dom->saveHTML($dom->getElementsByTagName("svg")->item(0));
        /*

        
        if($remove_stle) $body = preg_replace('/<\s*style.+?<\s*\/\s*style.*?>/si', ' ', $body );
        */
    } else {
        $body = 'SVG not found: <br />'.$file;
    }
    return $body;
}



function sdg_icon($number) {
    return '
        <div class="sdg-icon sdg-'.$number.'">'.get_svg('sdg/sdg-'.$number, 'sdg-'.$number, true).'</div>
    ';
}



function get_arrow($type) {

    if($type == 'left') {
        return '<svg version="1.1" class="arrow-left" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 14.5 27.5" style="enable-background:new 0 0 14.5 27.5;" xml:space="preserve"> <style type="text/css"> .path{fill:#ffffff;} </style> <g> <path class="path" d="M13.7,0c0.2,0,0.4,0.1,0.5,0.2c0.3,0.3,0.3,0.8,0,1.1L1.8,13.7l12.5,12.5c0.3,0.3,0.3,0.8,0,1.1 s-0.8,0.3-1.1,0l-13-13c-0.3-0.3-0.3-0.8,0-1.1l13-13C13.4,0.1,13.5,0,13.7,0z"/> </g> </svg> '; 
    } else if($type == 'right') {
        return '<svg version="1.1" class="arrow-right" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 14.5 27.5" style="enable-background:new 0 0 14.5 27.5;" xml:space="preserve"> <style type="text/css"> .path{fill:#ffffff;} </style> <g> <path class="path" d="M0.8,27.5c-0.2,0-0.4-0.1-0.5-0.2c-0.3-0.3-0.3-0.8,0-1.1l12.5-12.5L0.2,1.3c-0.3-0.3-0.3-0.8,0-1.1 s0.8-0.3,1.1,0l13,13c0.3,0.3,0.3,0.8,0,1.1l-13,13C1.1,27.4,0.9,27.5,0.8,27.5z"/> </g> </svg> ';
    }

}

define('ARROW_LEFT', get_arrow('left'));
define('ARROW_RIGHT', get_arrow('right'));



function getPlyrFromEmbed($iframeCode, $controls = "['play-large', 'play','fullscreen']") {

    // Youtube
        $ytRegExp = "/^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/";
    // Instagram
        $igRegExp = "/^(?:https?:\/\/)?(?:www\.)?instagram.com\/p\/(.[a-zA-Z0-9\_]*)/";
    // Vine
        $vRegExp = "/^(?:https?:\/\/)?(?:www\.)?vine.co\/v\/(.[a-zA-Z0-9]*)/";
    // Vimeo
        // $vimRegExp = " /\/\/(player.)?vimeo.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/";
        // $vimRegExp = '/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([‌​0-9]{6,11})[?]?.*/';
          $vimRegExp = '%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im';
    // Dailymotion
        $dmRegExp = "/.+dailymotion.com\/(video|hub)\/([^_]+)[^#]*(#video=([^_&]+))?/";
    // Youku
        $youkuRegExp = "/\/\/v\.youku\.com\/v_show\/id_(\w+)/";


    // Web-Format
        $mp4RegExp = '/^.+.(mp4|m4v)$/';
        $oggRegExp = '/^.+.(ogg|ogv)$/';
        $webmRegExp = '/^.+.(webm)$/';





    $has_result = preg_match('/src="([^"]+)"/', $iframeCode, $url); 

    if($has_result && count($url) > 1) {
        $url = $url[1];

        $source = 'none';
        $vid = 0;
    
        preg_match($ytRegExp, $url, $ytMatch);
        if ($ytMatch && strlen($ytMatch[1]) === 11) {
            $source = 'youtube';
            $vid = $ytMatch[1];
        }


        /*preg_match($vimRegExp, $url, $vimMatch);
        if ($vimMatch && strlen($vimMatch[3])) {
            $source = 'vimeo';
            $vid = $vimMatch[3];
        }
        */

         if (preg_match( $vimRegExp, $url, $regs)) {
            // pre($regs);
            $source = 'vimeo';
            $vid = $regs[3];
        }



        // return '<div data-type="'.$source.'" data-video-id="'.$vid.'" controls="'.$controls.'"></div>';
        // return '<div data-type="'.$source.'" data-video-id="'.$vid.'" data-plyr="{controls:[\'play-large\', \'play\',\'fullscreen\']}"></div>';
        // return '<div data-type="'.$source.'" data-video-id="'.$vid.'" controls></div>';
        // return '<div class="plyr" data-type="'.$source.'" data-video-id="'.$vid.'" data-plyr="{html:\"<div class=\'plyr__controls\'></div>\""}"></div>';
        // return '<div class="plyr" data-type="'.$source.'" data-video-id="'.$vid.'" controls="[play-large]"></div>';
        // return '<div class="plyr" data-type="'.$source.'" data-video-id="'.$vid.'" data-plyr="{controls:[\'play-large\', \'play\',\'fullscreen\']}"></div>';
        // return '<div class="plyr" data-type="'.$source.'" data-video-id="'.$vid.'" data-plyr="{controls:[\'play-large\', \'play\']}"></div>';
        return '<div class="plyr" data-type="'.$source.'" data-video-id="'.$vid.'" data-plyr="{enabled: true, html:\'\'}"></div>';

    } else {
        return '[no video found]';
    }

}






function getMEVideo($iframeCode, $autoplay = false, $loop = false) {

    $rendered = '';

    $src = '';
    $type = '';
    $url = '';
    $params = '';

    $has_result = preg_match('/src="([^"]+)"/', $iframeCode, $src);
    

    // $is_facebook = preg_match('/data-href="([^"]+)"/', $iframeCode, $facebook_src);



    $is_facebook = preg_match('/class="fb-video" data-href="([^"]+)"/', $iframeCode, $facebook_src);

    if($has_result && count($src) > 1) {
        $src = $src[1];
        // $src = 'https://player.vimeo.com/video/162807930/';
        // $src = 'https://vimeo.com/162807930/7df68c4744';
        
        $url = VideoUrlParser::get_url_id($src);
        $type = VideoUrlParser::identify_service($src);



        // https://player.vimeo.com/video/167758465
        // $src = 'https://player.vimeo.com/video/162807930';
        
        // pre($src);
        // pre($type);
        // pre($url);

        if($type == 'youtube') {
            $params = '?showinfo=0&amp;iv_load_policy=3&amp;modestbranding=1&amp;nologo=1';
            if($autoplay) $params .= '&amp;autoplay=1';
            else $params .= '&amp;autoplay=0';

            if($loop) $params .= '&loop=1';
            else $params .= '&loop=0';

        }else if($type == 'vimeo') {
            $params = '?background=1&autoplay=0';
            if($autoplay) $params .= '&autoplay=1';
            else $params .= '&autoplay=0';

            if($loop) $params .= '&loop=1';
            else $params .= '&loop=0';
        }


        $rendered = '
        <div class="em-video">
            <video width="640" height="360"  >
                <source type="video/'.$type.'" src="'.$src.$params.'" controls/>  
            </video>
        </div>
        ';


     

        // https://player.vimeo.com/video/162807930

        // $rendered = '
        // <div class="em-video">
        //     <video id="player2" width="640" height="360"  >
        //         <source type="video/'.$type.'" src="https://player.vimeo.com/video/162807930'.$params.'" />  
        //     </video>
        // </div>
        // ';


        // https://player.vimeo.com/video/162807930/

        // $rendered = '<iframe src="https://player.vimeo.com/video/162807930?autoplay=1&loop=1&autopause=0" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';



    }else if($is_facebook && count($facebook_src) > 1) { 

        
           $rendered = '
        <div class="em-video facebook-video">
            <video width="640" height="360"  >
                <source type="video/facebook" src="'.$facebook_src[1].'" data-autoplay="true" controls/>  
            </video>
        </div>
        ';

    }else {
        $rendered = '[no video found]';
    }
    

    return $rendered;
}







function post_type_navigation($label = 'Project') {
    $string = '';
    $prev_post = get_previous_post();
    if($prev_post) {
       $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
       // echo '
    //      <a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title. '" class=" ">
    //      &laquo; Previous post<br /><strong>&quot;'. $prev_title . '&quot;</strong>
    //      </a>
    //  ';

        $string .= '
            <a rel="next" class="post-navigation next-post-link" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title. '" class=" ">
            <span>next '.$label.'</span>
            </a>
        ';
    }

    $next_post = get_next_post();
    if($next_post) {
       $next_title = strip_tags(str_replace('"', '', $next_post->post_title));
       // echo '
       //   <a rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_title. '" class=" ">
       //       Next post &raquo;<br /><strong>&quot;'. $next_title . '&quot;</strong>
       //   </a>';

        $string .= '
        <a rel="prev" class="post-navigation prev-post-link" href="' . get_permalink($next_post->ID) . '" title="' . $next_title. '" class=" ">
            <span>previous '.$label.'</span>
        </a>';
    }


    return $string;
}


function slideshow_navigation($direction) {
    if($direction == 'prev') {
        print get_svg('assets/slideshow-prev', 'slideshow-prev', true, true);
    }else if($direction == 'next') {
        print get_svg('assets/slideshow-next', 'slideshow-next', true, true);
    }
}





function getAnchorTags($title) {
    $anchor = toAscii($title);
    print ' data-anchor-title="'.htmlspecialchars($title, ENT_QUOTES).'" data-anchor="'.$anchor.'"  id="'.$anchor.'" ';
}






function get_post_categories ($post_type, $args = '') {
    $exclude = array();
  

    // Check ALL categories for posts of given post type
    foreach (get_categories() as $category) {
        $posts = get_posts(array('post_type' => $post_type, 'category' => $category->cat_ID));

        // If no posts found, ...
        if (empty($posts))
            // ...add category to exclude list
            $exclude[] = $category->cat_ID;
    }

    // Set up args
    if (! empty($exclude)) {

      if(is_array($args)) {
        $args['exclude'] = $exclude;
      } else {
        $args .= ('' === $args) ? '' : '&';
        $args .= 'exclude='.implode(',', $exclude);
      }
    }


  return get_categories($args);
}