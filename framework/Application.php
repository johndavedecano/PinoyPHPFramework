<?php
namespace Framework;
class Application 
{
	public function __construct(){}
	public function __clone(){}
	public function __wakeup(){}

	public function boot()
	{
		
	}

	public static function getInstance()
	{
	    $cls = get_called_class(); // late-static-bound class name
	    if (!isset(self::$instances[$cls])) {
	        self::$instances[$cls] = new static;
	    }
	    return self::$instances[$cls];
	}
}
