<?php
/**
 * Created by JetBrains PhpStorm.
 * User: roseannsolano
 * Date: 8/9/14
 * Time: 7:38 AM
 * To change this template use File | Settings | File Templates.
 */

namespace Framework\Application;


class ApplicationModuleMapper implements ApplicationMapperInterface{

    public function map()
    {
        spl_autoload_register(function($classname) {

            $module = MODULES_PATH.DS.str_replace('\\','/',$classname).'.php';

            if(!file_exists($module)) {
                $error = new ApplicationErrorFactory;
                $error->make(new ApplicationException, 'Module was not found');
            }
            require_once $module;
        });
    }

}