<?php
/**
 * Created by PhpStorm.
 * User: jdecano
 * Date: 8/21/14
 * Time: 9:30 AM
 */

namespace Framework\Application;
use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Handler\JsonResponseHandler;

class ApplicationErrorFactory
{
    private $whoops;

    private $pretty;

    private $json;

    public function __construct()
    {
        $this->pretty = new PrettyPageHandler;

        $this->json = new JsonResponseHandler;

        $this->whoops = new Run;
    }

    public function make($exception, $message)
    {
        $this->whoops->pushHandler($this->pretty)->register();

        if($exception instanceof \Exception) {
            throw new $exception($message);
        }
    }
} 