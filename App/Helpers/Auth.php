<?php

namespace App\Helpers;

use App\Models\User;

class Auth
{
    public static function check()
    {
        if (isset($_SESSION['Auth'])) {
            return true;
        } else {
            return false;
        }
    }

    public static function user()
    {
        if (self::check()) {
            return $_SESSION['Auth'];
        }
        else{
            return false;

        }
    }

    public static function create($data){
        $check = User::WhereCol('login', '=', $data['login']);

        if(count($check) == 0){
            User::Create($data);

            $_SESSION['Auth'] = (object) $data;;
            
            return true;
        }
        else{
            $_SESSION['message'] = 'Bunaqa login bor!';
            return false;
        }

       
    }

    public static function attach($data)
    {
        $user = User::attach($data);

        if ($user) {
            $_SESSION['Auth'] = $user;
            return true;
        } else {
            $_SESSION['message'] = 'Эмайл или Пароль неправильно!';
            return false;
        }
    }

    public static function logout(){
        unset($_SESSION['Auth']);
    }
}
