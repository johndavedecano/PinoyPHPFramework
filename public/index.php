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
require VENDOR_PATH.'/autoload.php';

/*
Initialize Application
*/
$application = new Framework\Application;

/*
Register Routes
*/
include_once CONFIG_PATH.'/routes.php';

$application->boot();
