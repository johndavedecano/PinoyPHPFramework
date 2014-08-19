<?php
/**
 * Created by JetBrains PhpStorm.
 * User: roseannsolano
 * Date: 8/9/14
 * Time: 8:47 AM
 * To change this template use File | Settings | File Templates.
 */

namespace Framework\Http;

interface ResponseInterface {
    /**
     * @param mixed $body
     * @return object
     */
    public function setBody($body);

    /**
     * @return mixed
     */
    public function getBody();

    /**
     * @param mixed $code
     * @return object
     */
    public function setCode($code,$message);


    /**
     * @return mixed
     */
    public function getCode();


    /**
     * @param array $headers
     * @return object
     */
    public function setHeaders($headers = array());

    /**
     * @return array
     */
    public function getHeaders();

    /**
     * @return mixed
     */
    public function send();

    /**
     * @return mixed
     */
    public function send404();

}