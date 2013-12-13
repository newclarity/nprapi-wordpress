<?php
function ds_npr_get_author($post_id){
	$byline = get_post_meta($post_id, 'npr_byline', true);;
	$byline_link = get_post_meta($post_id, 'npr_byline_link', true);
	if ($byline_link){
		$ret .= '<a href='.$byline_link . '>' . $byline. '</a>';
	}
	else {
		$ret = $byline;
	}
	$multi = get_post_meta($post_id, 'npr_multi_byline', true);
	if ($multi){
		$ret = '';
		$authors = split('\|', $multi);
		foreach($authors as $art_string){
			if (strstr($art_string, '~')){
				$art_parts = split('~', $art_string);
				if (!empty($art_parts[0])) {
					if (!empty($ret)) {
						$ret .= ',';
					}
					$ret .= '<a href='.$art_parts[1] . '>' . $art_parts[0]. '</a>';
				}
			}
			else {
				if (!empty($art_string)){
					$ret .= ', '.$art_string;
				}
			}			
		}
	}
	return $ret;
}

function ds_npr_get_pub_date($post_id){
	$ret = get_post_meta($post_id, 'npr_pub_date', true);
	
	return $ret;
}
?>