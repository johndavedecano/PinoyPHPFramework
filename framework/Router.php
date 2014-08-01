<?php
namespace Framework;

use Framework\Request;

class Router
{
	private $collections = array();
    
    private $methods = array('GET','POST','PUT','OPTION','DELETE','PATCH');

	public function __construct(){}

	public function __wakeup(){}

	public function __clone(){}

	public function add($methods = array(),$pattern = '/' ,$callback = null)
	{
		foreach($methods as $method)
        {
            if(in_array($method,$this->methods))
            {
                array_push($this->collections,array($method,$pattern,$callback,'matches' => array(),'arguments' => array()));
            }
        }
        return;
	}
    
    public function getCollections()
    {
        return $this->collections;
    }

	public function initialize()
	{
		 $collections = $this->getCollections();
         
         $match = null;
         
         foreach($collections as $route)
         {
            if(is_array($this->match($route)))
            {
                $match = $this->match($route);
                break;
            }
         }
         
         return $match;
	}
    
    public function match($route = array())
    {   
        $path = array_values(array_filter(explode("/",Request::path())));
        $patterns = array_values(explode("/",ltrim(rtrim($route[1],"/"),"/")));
        
        if(empty($path) && $route[1] == "/"){
            return $route;
        }else{
            if(count($path) == count($patterns))
            {
                $counter = 0;
                foreach($patterns as $k => $v)
                {
                    if (preg_match('/(.*)(:)(.*)$/', $v))
                    {
                        $vars = explode(":",$v);
                        switch($vars[0])
                        {
                            case 'alp':
                                if(ctype_alpha($path[$counter])){
                                    $route['matches'][] = $path[$counter];
                                    $route['arguments'][] = $path[$counter];
                                }
                            break;
                            
                            case 'num':
                                if(ctype_digit($path[$counter])){
                                    $route['matches'][] = $path[$counter];
                                    $route['arguments'][] = $path[$counter];
                                }
                            break;
                            
                            case 'aln':
                                if(ctype_alnum($path[$counter])){
                                    $route['matches'][] = $path[$counter];
                                    $route['arguments'][] = $path[$counter];
                                }
                            break;
                            
                            case 'rgx':
                                if(preg_match("/".$vars[1]."/",$path[$counter])){
                                    $route['matches'][] = $path[$counter];
                                    $route['arguments'][] = $path[$counter];
                                }
                            break;
                        } 
                        
                    }else{
                        if($path[$k] == $patterns[$k])
                        {
                            $route['matches'][] = $v;
                        }
                    }
                    $counter++;
                }
                
                return (count($patterns) != count($route['matches']))?null:$route;
            }
            
            return null;
        } 
    }
    
    private function hasColon($string)
    {
        $vars = explode(":",$string);
        return $vars;
    }

}