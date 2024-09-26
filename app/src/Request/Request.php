<?php
namespace Request;

use Request\Get;
use Request\Post;
use Request\Server;
 

enum Method{
    case GET;
    case POST;
    case PUT;
    case DELETE;
}

class Request
{
    private Get $get;
    private Post $post; 
    private Server $server; 

    //1.8 Добавьте в класс Request параметр отвечающий за метод пришедшего запроса (get/post).
    public Method $method;

    public function __construct()
    {
       switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET': $this->method = Method::GET; break;
            case 'POST': $this->method = Method::POST; break;
            case 'PUT': $this->method = Method::PUT; break;
            case 'DELETE': $this->method = Method::DELETE; break;
        }

        $this->get = new Get($_GET);
        $this->post = new Post($_POST); 
        $this->server = new Server($_SERVER); 
    }

    public function getUrl() : string
    {
        $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $url = explode('?', $url);
        return$url[0];
    }


    public function getMethod() : string{
        return match ($this->method) {
            Method::GET => 'GET',
            Method::POST => 'POST',
            Method::PUT => 'PUT',
            Method::DELETE => 'DELETE',
        };
    }


    public function get(): Get
    {
         return $this->get;
    }

    public function post(): Post
    {
         return $this->post;
    }

    public function server(): Server
    {
         return $this->server;
    }
}