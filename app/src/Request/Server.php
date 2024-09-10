<?php

namespace Request;

use Exception;

class Server
{

    private const REQUEST_METHOD_GET = 'GET';

    private const REQUEST_METHOD_POST = 'POST';

    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }


    public function has(string $key):bool
    {
        return array_key_exists($key, $this->data);
    }

    public function get(string $key):mixed
    {
        if($this->has($key)){
            return $this->data[$key];
        }
        
        throw new Exception("Unable to get key [$key]");
    }

    public function all():array
    {
        return $this->data;
    }

    /**
     * @return string
     */
    public function requestMethod() : string
    {
        return $this->data['REQUEST_METHOD'] ?? '';    
    }

     /**
     * @return bool
     */
    public function isGet() : bool 
    {
        return $this->requestMethod() === self::REQUEST_METHOD_GET;
    }

    /**
     * @return bool
     */
    public function isPost() : bool 
    {
        return $this->requestMethod() === self::REQUEST_METHOD_POST;
    }
}