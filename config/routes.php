<?php
use Framework\Route;

$route = new Framework\Router;
$route->add(array(
    new Route('GET', '/test', 'Main\Controllers\DefaultController', 'main'),
    new Route('GET', '/test/alp:dave', 'Main\Controllers\DefaultController', 'test')
));

return $route;