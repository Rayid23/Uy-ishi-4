<?php

namespace App\Routes;

class Request
{
    public function url()
    {
        $path = $_SERVER["REQUEST_URI"] ?? '/';

        return str_contains('?',$path) ? explode('?', $path)[0] : $path;
    }

    public function method()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        return strtolower($method);
    }
}


?>