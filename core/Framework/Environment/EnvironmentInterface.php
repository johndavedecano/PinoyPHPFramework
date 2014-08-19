<?php
/**
 * Created by PhpStorm.
 * User: roseannsolano
 * Date: 8/19/2014
 * Time: 2:14 PM
 */
namespace Framework\Environment;

interface EnvironmentInterface
{
    /**
     * @param $host string $_SERVER['SERVER_NAME']
     * @return int|null|string
     */
    public function detect($host = "");

    public function get();
}