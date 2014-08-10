<?php
/**
 * Created by JetBrains PhpStorm.
 * User: roseannsolano
 * Date: 8/10/14
 * Time: 3:04 AM
 * To change this template use File | Settings | File Templates.
 */

namespace Framework;


interface RequestInterface {

    public static function getVars();

    public static function get($name);

    public static function method();

    public static function uri();

    public static function path();

    public static function query();

    public static function segment($n = 0);

    public static function segments();

}