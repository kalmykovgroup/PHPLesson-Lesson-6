<?php

namespace Routing;

class Route
{
    private string $requestUri = '/';

    private array $pathUri = [];

    public function __construct(string $requestUri)
    {
        if(preg_match('/^\/(?<request>[0-9a-zA-Z_\/-]*[0-9a-zA-Z_-]+)/',$requestUri, $match))
        {
            $this->requestUri = $match['request'];                        
        } 

        $pathUri = explode('/', $this->requestUri);
        $namespace  = array_filter($pathUri, fn($item) => !empty($item));

      
         
        foreach($namespace as $value){

           

            $urlParts = preg_split('/(-|_)/', $value);
 

            $arrUlrParts = [];
            foreach($urlParts as $urlPart){
                array_push($arrUlrParts , ucfirst($urlPart));
            }

            array_push($this->pathUri , implode($arrUlrParts));
        }
    }

    public function getParent():array
    {
        return array_slice($this->pathUri, 0 , -1);
    }

    public function getBase():string | null
    { 
        $base = array_slice($this->pathUri, -1)[0];
        if($base)
          return lcfirst($base);
        else 
        return $base;
    }

}