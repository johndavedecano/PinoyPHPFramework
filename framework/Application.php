<?php
namespace Framework;
class Application 
{
	private static $objects = array();

	private static $configs = array();

	public function __construct(){}
	public function __clone(){}
	public function __wakeup(){}

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
		$route = $route->initialize();
        if(is_null($route))
        {
            die("<h1>404 Page Not Found</h1>");
            header("HTTP/1.0 404 Not Found"); 
            exit();
        }else{
            $this->resolveModule($route);
        }
	}
    
    private function resolveModule($route)
    {
        $paths = explode(".",$route[2]);
        $file = MODULES_PATH.DS.$paths[0].DS.'controllers'.DS.$paths[1].'.php';
        if(file_exists($file))
        {
            require_once($file);
            $this->callModule($route);
        }else{
            throw new \Exception("Module was not resolved.");
        }
        
    }
    
    private function callModule($route)
    {
        $module = explode(".",$route[2]);
        $class = new $module[1];
        $method = $module[2];
        if(is_array($route['arguments']))
        {
            call_user_func_array(array($class,$method),$route['arguments']);
        }else{
            call_user_func_array(array($class,$method));
        }
        return;
    }

	public function after($function)
	{
		if(is_callable($function))
			$function();
	}
}
