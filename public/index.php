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
Register Modules
*/
$application->modules(new \Framework\ApplicationModuleMapper());


/*
Route Function
*/
$router = require_once CONFIG_PATH.'/routes.php';
$application->boot($router,new \Framework\Response,new \Framework\ApplicationResolver, new \Framework\Request);
