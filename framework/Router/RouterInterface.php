<?php
/**
 * Created by JetBrains PhpStorm.
 * User: roseannsolano
 * Date: 8/9/14
 * Time: 6:25 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Framework\Router;

use Framework\Http\RequestInterface;

interface RouterInterface {

    public function add($route = array());
    public function getCollections();
    public function addCollection(RouteInterface $route);
    public function initialize(RequestInterface $request);
    public function match(RouteInterface $route);

}