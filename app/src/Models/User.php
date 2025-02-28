<?php

namespace Models;
use Database\DB;

class User
{
    private string $table = 'users';

    public ?int $id;

    public ?string $login;

    public ?string $password;

    public ?string $token;



    public function getUserByLogin(string $login): mixed
    {

        $requestStr = 'SELECT * FROM ' . $this->table. " WHERE login='" . $login . "'";

        $user = DB::getInstance()->getSingleRowByClass($requestStr, self::class);

        return $user;
    }

    public function updateUser(string $login, string $token): void
    {
        $requestStr = 'UPDATE ' . $this->table. " SET token='" . $token . "' WHERE login='" . $login . "'";
        DB::getInstance()->query($requestStr);
    }
  


}