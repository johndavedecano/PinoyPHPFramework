<?php
namespace Framework;
class Uri
{
	public static function segments() {
	    return array_filter(explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
	}
	 
	public function segment($n) {
	    $segs = static::segments();
	    return count($segs)>0&&count($segs)>=($n-1)?$segs[$n]:'';
	}
}