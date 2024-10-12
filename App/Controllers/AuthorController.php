<?php

namespace App\Controllers;

use App\Models\Authors;
use App\Models\Book;

class AuthorController
{
    public function __construct(){

        if(!check()){
            header("location: /login");
        }
    }
    public function index()
    {
        $data = Authors::SelectToQuery("SELECT authors.id, authors.name, COUNT(books.auth_id) as count FROM authors LEFT JOIN books ON books.auth_id = authors.id GROUP BY authors.id ORDER BY count DESC");
        return view("authors/authorsView", "Авторы", $data, "main.php");
    }

    public function createView()
    {
        return view("authors/authorsAddView", "Добавить Автора", '',  "main.php");
    }

    public function deleteAll()
    {
        Authors::DeleteAll();
        Book::DeleteAll();
        header("location: /Authors");
    }

    public function create()
    {
        if (isset($_POST['Add'])) {
            if (!empty($_POST['AuthorName'])) {

                $name = htmlspecialchars(strip_tags($_POST['AuthorName']));

                $data =
                    [
                        'name' => $name
                    ];

                Authors::Create($data);
                header("location: /Authors");
            }
        }
    }

    public function read()
    {
        if(isset($_POST["Read"])){
            $id = $_POST["ReadId"];
            $content = Authors::Show($id);
            return view("authors/authorsReadView","Подробности", $content, "main.php");
        }
        else{
            echo "Упс... Произошло какая-то ошибка!";
            ?> <a href="/Authors">Назад</a> <?php
        }
        
    }

    

    public function update()
    {
        if (isset($_POST['Update'])) {
            if (!empty($_POST['UpId']) && !empty($_POST['name'])) {

                $name = htmlspecialchars(strip_tags($_POST['name']));

                $data =
                    [
                        'name' => $name
                    ];


                Authors::Update($_POST['UpId'], $data);
                header("location: /Authors");
            }
        }
    }

    public function delete()
    {
        if (isset($_POST['delete'])) {
            if (!empty($_POST['deletedId'])) {
                Authors::Delete($_POST['deletedId']);
                Book::DeleteWhere('auth_id', '=', $_POST['deletedId']);
                header('location: /Authors');
            }
        }
    }


    
}
