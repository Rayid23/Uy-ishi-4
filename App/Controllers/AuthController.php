<?php

namespace App\Controllers;

use App\Helpers\Auth;
class AuthController
{
    public function loginPage()
    {
        return view("authorization/Login", "Логин", '', 'AuthMain.php');
    }

    public function registerPage()
    {
        return view("authorization/Register", "Логин", '', 'AuthMain.php');
    }
    public function logout() {
        Auth::logout();
        header('Location: /login');
    }

    public function login()
    {

        if (isset($_POST['checkUser'])) {
            $login = htmlspecialchars(strip_tags($_POST['login']));
            $password = htmlspecialchars(strip_tags($_POST['password']));

            $data = [
                'login' => $login,
                'password' => $password
            ];

            $user = Auth::attach($data);

            if ($user) {
                header("location: /");
            }
            else{
                header("location: /login");
            }
        }
    }
    public function register()
    {
        if (isset($_POST['newUser'])) {
            $name = htmlspecialchars(strip_tags($_POST['name']));
            $login = htmlspecialchars(strip_tags($_POST['login']));
            $password = htmlspecialchars(strip_tags($_POST['password']));

            $data = [
                'name' => $name,
                'login' => $login,
                'password' => $password,
                'role' => 'user'
            ];

            $mains = Auth::create($data);

            if($mains){
                header('location: /');
            }
            else{
                header('location: /register');
            }
        }
    }
}
