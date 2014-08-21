<?php
/**
 * Created by JetBrains PhpStorm.
 * User: roseannsolano
 * Date: 8/9/14
 * Time: 6:56 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Framework\Router;


/**
 * Class Route
 * @package Framework
 */
class Route implements RouteInterface
{
    /**
     * @var string
     */
    protected $method;

    /**
     * @var string
     */
    protected $pattern;

    /**
     * @var string
     */
    protected $namespace;

    /**
     * @var string
     */
    protected $action;

    /**
     * @var array
     */
    protected $matches = array();

    /**
     * @var array
     */
    protected $arguments = array();

    /**
     * @param array $arguments
     */
    public function setArguments($arguments)
    {
        $this->arguments = $arguments;
    }

    /**
     * @return array
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * @param array $matches
     */
    public function setMatches($matches)
    {
        $this->matches = $matches;
    }

    /**
     * @return array
     */
    public function getMatches()
    {
        return $this->matches;
    }

    /**
     * @param $method
     * @param $pattern
     * @param $namespace
     * @param $action
     */
    public function __construct($method, $pattern, $namespace, $action)
    {
        $this->setMethod($method);

        $this->setPattern($pattern);

        $this->setNamespace($namespace);

        $this->setAction($action);

        return $this;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $namespace
     */
    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;
    }

    /**
     * @return mixed
     */
    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * @param mixed $pattern
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;
    }

    /**
     * @return mixed
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    public function getPatternArray()
    {
        return array_values(array_filter(explode("/",$this->getPattern())));
    }

    public function addArgument($argument)
    {
        $this->arguments[] = $argument;
    }

    public function addMatch($match)
    {
        $this->matches[] = $match;
    }


}