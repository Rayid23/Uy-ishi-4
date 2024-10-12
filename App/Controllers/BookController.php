<?php

namespace App\Controllers;

use App\Models\Book;
use App\Models\Authors;


class BookController
{
    public function __construct(){
        if(!check()){
            header("location: /login");
        }
        if(auth()->role == "user"){
            header("location: /403");
        }
    }
    public function index()
    {
        $data['main'] = Book::SelectToQuery("SELECT books.id, books.title, books.description, books.text, books.img, authors.name as author, genres.name as genres FROM books LEFT JOIN authors ON authors.id = books.auth_id LEFT JOIN genres ON genres.id = books.genres_id WHERE authors.name IS NOT NULL AND genres.name IS NOT NULL ");
        $data['author'] = Book::SelectToQuery("SELECT *  FROM authors");
        $data['genres'] = Book::SelectToQuery("SELECT *  FROM genres");
        return view("books/booksView", "Книги", $data, "main.php");
    }

    public function createView()
    {
        $data['author'] = Book::SelectToQuery("SELECT *  FROM authors");
        $data['genres'] = Book::SelectToQuery("SELECT *  FROM genres");

        return view("books/booksAddView", "Добавить Автора", $data,  "main.php");
    }

    public function create()
    {
        if (isset($_POST['Add'])) {
            if (!empty($_POST['BookName']) && !empty($_POST['BookDesc']) && !empty($_POST['BookText']) 
            && !empty($_POST['author_id']) && !empty($_POST['genres_id'])) {

                $name = htmlspecialchars(strip_tags($_POST['BookName']));
                $desc = htmlspecialchars(strip_tags($_POST['BookDesc']));
                $text = htmlspecialchars(strip_tags($_POST['BookText']));
                $author_id = htmlspecialchars(strip_tags($_POST['author_id']));
                $genres_id = htmlspecialchars(strip_tags($_POST['genres_id']));

                if (isset($_FILES['BookImg'])){
                    $image = $_FILES['BookImg']['name'];
                    $ImageNewPath = 'Image/'. $image;

                    move_uploaded_file($_FILES['BookImg']['tmp_name'], $ImageNewPath);
                }
                else{
                    $ImageNewPath = 'defult'; #Defult Image
                }

                $data =
                    [
                        'title' => $name,
                        'description'=> $desc,
                        'text' => $text,
                        'img' => $ImageNewPath,
                        'auth_id'=> $author_id,
                        'genres_id'=> $genres_id
                    ];

                Book::Create($data);
                header("location: /Books");
            }
        }
    }

    public function read()
    {
        if(isset($_POST["Read"])){
            $id = $_POST["ReadId"];
            $data = Book::SelectToQuery("SELECT books.id, books.title, books.description, books.text, 
            books.img, authors.name as author, genres.name as genres FROM books LEFT JOIN authors ON authors.id
             = books.auth_id LEFT JOIN genres ON genres.id = books.genres_id WHERE authors.name IS NOT NULL AND 
             genres.name IS NOT NULL AND books.id = {$id}");

            return view("books/booksView","Подробности", $data, "main.php");
        }
        else{
            echo "Упс... Произошло какая-то ошибка!";
            ?> <a href="/Books">Назад</a> <?php
        }
        
    }

    public function update()
    {
        if (isset($_POST['Update'])) {
            if (!empty($_POST['BookName']) && !empty($_POST['BookDesc']) && !empty($_POST['BookText']) 
            && !empty($_POST['author_id']) && !empty($_POST['genres_id'])) {

                $UpId = $_POST['UpId'];
                

                $name = htmlspecialchars(strip_tags($_POST['BookName']));
                $desc = htmlspecialchars(strip_tags($_POST['BookDesc']));
                $text = htmlspecialchars(strip_tags($_POST['BookText']));
                $author_id = htmlspecialchars(strip_tags($_POST['author_id']));
                $genres_id = htmlspecialchars(strip_tags($_POST['genres_id']));

                if (isset($_FILES['BookImg']['name'][0])){
                    $image = $_FILES['BookImg']['name'];
                    $ImageNewPath = 'Image/'. $image;

                    move_uploaded_file($_FILES['BookImg']['tmp_name'], $ImageNewPath);
                }
                else{
                    $ImageNewPath = $_POST['old_img']; #Defult Image
                }

                $data =
                    [
                        'title' => $name,
                        'description'=> $desc,
                        'text' => $text,
                        'img' => $ImageNewPath,
                        'auth_id'=> $author_id,
                        'genres_id'=> $genres_id
                    ];


                Book::Update($UpId, $data);
                header("location: /Books");
            }
        }
    }

    public function delete()
    {
        if (isset($_POST['delete'])) {
            if (!empty($_POST['deletedId'])) {
                Book::Delete($_POST['deletedId']);
                header('location: /Books');
            }
        }
    }

  

    public function deleteAll(){
        Book::DeleteAll();
        header("location: /Books");
    }
}
