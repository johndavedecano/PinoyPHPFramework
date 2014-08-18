<?php
/**
 * Created by JetBrains PhpStorm.
 * User: roseannsolano
 * Date: 8/9/14
 * Time: 10:00 AM
 * To change this template use File | Settings | File Templates.
 */

namespace Framework\Application;

use Framework\Router\RouteInterface;

interface ApplicationResolverInterface {
    /**
     * @param mixed $route
     */
    public function setRoute(RouteInterface $route);
    public function getRoute();
    public function call();
}