<?php
namespace Framework;

class Application implements ApplicationInterface
{

	public function before(\Closure $function)
	{
		if(is_callable($function))
			$function();
	}

	public function maps(ApplicationClassMapper $mapper)
	{
        $mapper->map();

        return $this;
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

            $resolver->call();

        } else {

            $response->send404();

        }
	}

	public function after(\Closure $function)
	{
		if(is_callable($function))
			$function();
	}
}
