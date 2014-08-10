<?php
/**
 * Created by JetBrains PhpStorm.
 * User: roseannsolano
 * Date: 8/9/14
 * Time: 9:26 AM
 * To change this template use File | Settings | File Templates.
 */

namespace Framework;


class ApplicationResolver implements ApplicationResolverInterface {

    protected $route;

    /**
     * @param mixed $route
     */

    public function setRoute(RouteInterface $route)
    {
        $this->route = $route;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }


    public function call()
    {
        if(class_exists($this->route->getNamespace()) && $this->route instanceof RouteInterface)
        {
            $object = $this->route->getNamespace();

            $class =  new $object;

            call_user_func_array(array($class,$this->route->getAction()),$this->route->getArguments());

        } else {

            throw new \Exception("Module was not found");
        }
    }

}