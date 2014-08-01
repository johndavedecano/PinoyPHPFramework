<?php
$route = new Framework\Router;
$route->add(array('GET'),'/','default.DefaultController.main');
$route->add(array('GET'),'/alp:name','default.DefaultController.test');
$route->add(array('GET'),'/dave','default.DefaultController.dave');
return $route;