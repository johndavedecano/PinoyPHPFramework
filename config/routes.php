<?php
use Framework\Router\Route;

$route = new Framework\Router\Router;
$route->add(array(
    new Route('GET', '/', 'Main\Controllers\DefaultController', 'main'),
    new Route('GET', '/test', 'Main\Controllers\DefaultController', 'main'),
    new Route('GET', '/test/alp:dave', 'Main\Controllers\DefaultController', 'test'),
    new Route('GET', '/test/roseann/alp:dave', 'Main\Controllers\DefaultController', 'rose')
));

return $route;