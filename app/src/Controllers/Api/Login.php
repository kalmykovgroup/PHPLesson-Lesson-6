<?php

namespace Controllers\Api;

use Request\Post;
use Models\User;

class Login
{

    /**
     * @param Post $request
     * @return string
     */

    public function postRequest(Post $request) : string
    {
        $model = new User();


        if($request->has("login") && $request->has("password")){

            $user = $model->getUserByLogin($request->get("login"));


            if($user && $user->password === $request->get("password")){

                // сохранение токена в БД
                $model->updateUser($user->login, md5($user->password));

                return json_encode(["token" => md5($user->password)]);                
            }
            else{
                return json_encode(["error" => "User not found"]);
            }
        }

        return json_encode(["error" => "Bad request"]);
    }
}