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

        $response->send404();

        if(DEBUG_MODE == true) {
            $error = new ApplicationErrorFactory;
            $error->make(new ApplicationException, 'Page not found.');
            exit();
        }

        exit('<h1>Page Not Found</h1><p>The page that is trying to reach is not available.</p><em>Response Code: 404</em>');

	}

	public function after(\Closure $function)
	{
		if(is_callable($function))
			$function();
	}
}
