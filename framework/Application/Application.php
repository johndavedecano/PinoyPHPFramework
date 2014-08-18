<?php
namespace Framework\Application;

use Framework\Http\RequestInterface;
use Framework\Http\ResponseInterface;
use Framework\Router\RouteInterface;
use Framework\Router\RouterInterface;

class Application implements ApplicationInterface
{

	public function before(\Closure $function)
	{
		if(is_callable($function))
			$function();
	}

	public function modules(ApplicationModuleMapper $mapper)
	{
        $mapper->map();

        return $this;
	}

	public function boot(RouterInterface $router,ResponseInterface $response,ApplicationResolverInterface $resolver,RequestInterface $request)
	{
        $route = $router->initialize($request);

        if($route instanceof RouteInterface){

            $resolver->setRoute($route);

            return $resolver->call();

        }

        return $response->send404();
	}

	public function after(\Closure $function)
	{
		if(is_callable($function))
			$function();
	}
}
