<?php
namespace Framework;
class Application 
{
	private static $objects = array();

	private static $configs = array();

	public function __construct()
	{
		
	}

	public function __clone()
	{

	}

	public function __wakeup()
	{

	}

	public function before($function)
	{
		if(is_callable($function))
			$function();
	}

	public function maps($maps = array())
	{
		
		foreach($maps as $map)
		{
			if(is_dir($map) && file_exists($map))
			{
				spl_autoload_register(function($classname) use ($map){
					require_once $map.'/'.$classname.'.php';
				});				
			}
		}
	}

	public function modules($modules = array())
	{
		foreach($modules as $module)
		{
			if(is_dir($module) && file_exists($module))
			{
				spl_autoload_register(function($classname) use ($module){
					require_once MODULES_PATH.'/'.$module.'/controllers/'.$classname.'.php';
				});				
			}
		}
	}

	public function boot(Router $route)
	{
		$route->initialize();
	}

	public function after($function)
	{
		if(is_callable($function))
			$function();
	}
}
