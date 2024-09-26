<?php

namespace Request;

use Exception;

class Post
{
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

}