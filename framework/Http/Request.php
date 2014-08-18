<?php
namespace Framework\Http;

class Request implements RequestInterface
{
	public static function getVars()
	{
		return $_SERVER;
	}

	public static function get($name)
	{
		if(in_array($name,$_SERVER))
			return $_SERVER[$name];
		else
			return null;
	}
    
    public static function method()
    {
		$vars = self::getVars();
		return $vars['REQUEST_METHOD'];
    }
	public static function uri()
	{
		$vars = self::getVars();
		return parse_url($vars['REQUEST_URI']);
	}

	public static function path()
	{
		$uri = self::uri();
		return $uri['path'];
	}	

	public static function query()
	{
		$uri = self::uri();
		if(isset($uri['query']))
			return $uri['query'];
		else
			return null;
	}

	public static function segment($n = 0) 
	{
	    $segs = explode('/',static::path());
	    return (count($segs) < $n ) ? null : $segs[$n];
	}

	public static function segments()
	{
		return explode('/',static::path());
	}


}