<?php
namespace Framework\Http;


class Response implements ResponseInterface
{

    protected $headers = array();

    protected $code;

    protected $message;

    protected $body;

    /**
     * @param mixed $body
     *
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $code
     *
     */
    public function setCode($code,$message)
    {
        $this->code = $code;

        $this->message = $code;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param array $headers
     */
    public function setHeaders($headers = array())
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    public function send()
    {

    }

    public function send404()
    {
        header('HTTP/1.0 404 Not Found');
        exit('<h1>Page Not Found</h1><p>The page that is trying to reach is not available.</p><em>Response Code: 404</em>');
    }



}