<?php
$route = new Framework\Router;
$route->add('POST|GET','/','Default:Default:main($name)');
return $route;