<?php
/**
 * Created by JetBrains PhpStorm.
 * User: roseannsolano
 * Date: 8/9/14
 * Time: 7:35 AM
 * To change this template use File | Settings | File Templates.
 */

namespace Framework\Application;

use Framework\Http\RequestInterface;
use Framework\Http\ResponseInterface;
use Framework\Router\RouterInterface;

interface ApplicationInterface
{

    public function before(\Closure $function);

    public function modules(ApplicationModuleMapper $mapper);

    public function boot(RouterInterface $router,ResponseInterface $response,ApplicationResolverInterface $resolver, RequestInterface $request);

    public function after(\Closure $function);
}