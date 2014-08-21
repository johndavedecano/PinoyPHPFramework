<?php
/*
Initialize Paths
*/
include __DIR__.'/../starts/paths.php';

/*
Autoload Third Party Packages
*/
require_once VENDOR_PATH.'/autoload.php';

/**
 * Setup and Detect the Environment
 */
$environments = require_once CONFIG_PATH.'/environments.php';
$environment = new \Framework\Environment\Environment($environments);
$environment->detect($_SERVER['SERVER_NAME']);

define('ENVIRONMENT', $environment->get());


/*
Initialize Application
*/
$application = new \Framework\Application\Application;

/*
Register Modules
*/
$application->modules(new \Framework\Application\ApplicationModuleMapper());

/*
Route Function
*/
$router = require_once CONFIG_PATH.'/routes.php';
$application->boot($router,new \Framework\Http\Response,new \Framework\Application\ApplicationResolver, new \Framework\Http\Request);
