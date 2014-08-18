<?php
namespace Framework\Router;

use Framework\Http\RequestInterface;

class Router implements  RouterInterface
{
	private $collections = array();
    
    private $methods = array('GET','POST','PUT','OPTION','DELETE','PATCH');

    private $request_method = 'GET';

    /**
     * @param string $request_method
     */
    public function setRequestMethod($request_method)
    {
        $this->request_method = $request_method;
    }

    /**
     * @return string
     */
    public function getRequestMethod()
    {
        return $this->request_method;
    }

    private $match = null;

    private $path = array();

    public function setPath($path)
    {
        $this->path = array_values(array_filter(explode("/",str_replace("index.php","",$path))));

        return $this;
    }

    public function getPath()
    {
        return $this->path;
    }

	public function add($routes = array())
	{
        foreach($routes as $route)
        {
            $this->addCollection($route);
        }

        return $this;
	}

    /**
     * @param array $methods
     */
    public function setMethods($methods)
    {
        $this->methods = $methods;
    }

    /**
     * @return array
     */
    public function getMethods()
    {
        return $this->methods;
    }


    public function getCollections()
    {
        return $this->collections;
    }

    public function addCollection(RouteInterface $route)
    {
        array_push($this->collections,$route);

        return;
    }

	public function initialize(RequestInterface $request)
	{
         $this->setPath($request->path());

         $this->setRequestMethod($request->method());

         foreach($this->getCollections() as $route)
         {
            if(is_object($this->match = $this->match($route)))
            {
                break;
            }
         }

         return $this->match;
	}

    public function match(RouteInterface $route)
    {
        $patterns = $route->getPatternArray();

        if($this->getRequestMethod() == $route->getMethod())
        {
            $path = $this->getPath();

            if(empty($path) && $route->getPattern() == "/")
            {
                return $route;
            }

            if(count($this->getPath()) == count($patterns))
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
                                    $route->addMatch($path[$counter]);
                                    $route->addArgument($path[$counter]);
                                }
                                break;

                            case 'num':
                                if(ctype_digit($path[$counter])){
                                    $route->addMatch($path[$counter]);
                                    $route->addArgument($path[$counter]);
                                }
                                break;

                            case 'aln':
                                if(ctype_alnum($path[$counter])){
                                    $route->addMatch($path[$counter]);
                                    $route->addArgument($path[$counter]);
                                }
                                break;

                            case 'rgx':
                                if(preg_match("/".$vars[1]."/",$path[$counter])){
                                    $route->addMatch($path[$counter]);
                                    $route->addArgument($path[$counter]);
                                }
                                break;
                        }

                    } else {

                        if($path[$k] == $patterns[$k])
                        {
                            $route->addMatch($path[$counter]);

                        }
                    }

                    $counter++;
                }

                return (count($patterns) == count($route->getMatches())) ? $route : null;
            }
        }

        return null;
    }
}