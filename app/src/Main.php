<?php
 
use Request\Request; 
use Routing\Route; 

class Main
{    
    private Request $request;
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
 

            $object = new $class();

            try{
                if($this->request->server()->isGet()){
                    echo $object -> $base($this->request->get());     
                } 
                elseif($this->request->server()->isPost()){
                    echo $object -> $base($this->request->post()); 
                }
            }catch(Exception $e){
                echo $e->getMessage();
              
            }
            catch(\Throwable $e){
                echo "Method not fount";
              
            } 
          
        }       
 
    }


    private function init() : void
    {
        
         Autoload::registrate();

        $this->request = new Request(); 
        $this->route = new Route($_SERVER['REQUEST_URI']);
    }


}