<?php
/**
 * Created by JetBrains PhpStorm.
 * User: roseannsolano
 * Date: 8/9/14
 * Time: 7:10 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Framework;


interface RouteInterface {

    /**
     * @param $method
     * @param $pattern
     * @param $namespace
     * @param $action
     */
    public function __construct($method, $pattern, $namespace, $action);

    /**
     * @param mixed $action
     */
    public function setAction($action);

    /**
     * @return mixed
     */
    public function getAction();
    /**
     * @param mixed $method
     */
    public function setMethod($method);

    /**
     * @return mixed
     */
    public function getMethod();

    /**
     * @param mixed $namespace
     */
    public function setNamespace($namespace);
    /**
     * @return mixed
     */
    public function getNamespace();

    /**
     * @param mixed $pattern
     */
    public function setPattern($pattern);

    /**
     * @return mixed
     */
    public function getPattern();

    /**
     * @return mixed
     */
    public function getPatternArray();

    /**
     * @return mixed
     */
    public function setMatches($matches);

    /**
     * @return mixed
     */
    public function getMatches();

    /**
     * @return mixed
     */
    public function getArguments();

    /**
     * @return mixed
     */
    public function setArguments($arguments);

    /**
     * @param $argument
     * @return mixed
     */
    public function addArgument($argument);

    /**
     * @param $match
     * @return mixed
     */
    public function addMatch($match);
}