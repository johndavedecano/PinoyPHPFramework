<?php
/**
 * Created by JetBrains PhpStorm.
 * User: roseannsolano
 * Date: 8/9/14
 * Time: 7:38 AM
 * To change this template use File | Settings | File Templates.
 */

namespace Framework;


class ApplicationModuleMapper implements ApplicationMapperInterface{

    public function map()
    {
        spl_autoload_register(function($classname) {
            require_once MODULES_PATH.DS.$classname.'.php';
        });
    }

}