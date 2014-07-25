<?php
/*
Initialize Paths
*/
include __DIR__.'/../starts/paths.php';

/*
Autoload Framework Classes
*/
require BASE_PATH.'/starts/loader.php';
$classLoader = new SplClassLoader('Framework',BASE_PATH);
$classLoader->register();

/*
Autoload Third Party Packages
*/
require_once VENDOR_PATH.'/autoload.php';

/*
Initialize Application
*/
$application = new Framework\Application;

/*
Register Autoload Maps
*/
$maps = require_once(BASE_PATH.'/starts/maps.php');
$application->maps($maps);

/*
Register Modules
*/
$modules = require_once(BASE_PATH.'/starts/modules.php');
$application->modules($modules);

/*
Route Function
*/
$router = require_once CONFIG_PATH.'/routes.php';
$application->boot($router);
