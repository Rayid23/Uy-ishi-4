<?php

namespace App\Controllers;

class ErrorController
{
    public function error404(){
        return view("errors/error404", "404", '', 'ErrorMain.php');
    }
    public function error403(){
        return view('errors/error403', '403', '','ErrorMain.php');
    }
}




?>