<?php

namespace Controllers;

use Request\Get;

class Login
{

    /**
     * @param Get $request
     * @return string
     */

    public function index(Get $request) : string
    {
        return print_r($request, true);
    }
}