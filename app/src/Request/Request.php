<?php

//1.6 Создайте класс Request который объединит 3 экземпляра Get, Post, Files.
//1.7 Ознакомьтесь с глобальным массивом $_SERVER
//1.8 Добавьте в класс Request параметр отвечающий за метод пришедшего запроса (get/post).
/*
Задача на доп балы:
	Реализовать классы Get, Post, Files по шаблону Singleton
	Добавьте в Request метод getUrl который вернет url, по которому пришел пользователь без get параметров и без ?. Пример: пользователь идет по ссылке /test-page?search=hi , метод должен вернуть /test-page
*/

include_once 'Post.php';
include_once 'Get.php';
include_once 'Files.php';

enum Method{
    case GET;
    case POST;
    case PUT;
    case DELETE;
}

class Request
{
    public Get $get;
    public Post $post;
    public Files $files;

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

        $this->get = Get::getInstance($_GET);
        $this->post = Post::getInstance($_POST);
        $this->files = Files::getInstance($_FILES);
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
}