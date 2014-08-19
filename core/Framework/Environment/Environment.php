<?php

namespace Framework\Environment;

class Environment implements EnvironmentInterface
{
    protected $environments = array();

    protected $environment = null;

    /**
     * @param $environments The array file of the environment lists
     */
    public function __construct($environments)
    {
        $this->environments = $environments;
    }

    /**
     * @param $host string $_SERVER['SERVER_NAME']
     * @return int|null|string
     */
    public function detect($host = "")
    {
        foreach($this->environments as $key => $val) {
            foreach($val as $env)
            {
                if(stristr( $host, $env)) {
                    $this->environment = $key;
                    break;
                }
            }
        }

        return $this;
    }

    public function get()
    {
        return $this->environment;
    }
}
