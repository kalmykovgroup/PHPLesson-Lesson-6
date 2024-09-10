<?php
 
use Request\Get;
use Request\Post;
use Routing\Route;
use Request\Server;
use Shop\Customer\Order;  

class Main
{   
    private Get $get;

    private Post $post;

    private Server $server;

    private Route $route;



    public function main(): void
    {
        $this->init();

        $_namespace = $this->route->getParent();
        $namespace = [];
        foreach($_namespace as $value){
            array_push($namespace, ucfirst($value));
        }
        

        $base = $this->route->getBase();

        if($base){
            $base = lcfirst($base[0]);
            $class = 'Controllers\\' . implode('\\',$namespace);


            var_dump($class);
            var_dump($base);

            $object = new $class();


            if($this->server->isGet()){
                echo $object -> $base($this->get);     
            } 
            elseif($this->server->isPost()){
                echo $object -> $base($this->post); 
            }
        }       
 
    }


    private function init() : void
    {
        
         Autoload::registrate();

        $this->get = new Get($_GET);
        $this->post = new Post($_POST);
        $this->server = new Server($_SERVER);

        $this->route = new Route($_SERVER['REQUEST_URI']);
    }


}