<?php
namespace App\Controllers;

use App\Models\Genres;
use App\Models\Book;

class GenresController
{
    public function __construct(){
        unset($_SESSION["message"]);
    }
    public function index()
    {    
        $data = Genres::SelectToQuery("SELECT genres.id, genres.name, COUNT(books.genres_id) as count FROM genres LEFT JOIN books ON books.genres_id = genres.id GROUP BY genres.id ORDER BY count DESC");
        return view("genres/genresView", "Жанры", $data, "main.php");
    }

    public function createView()
    {
        return view("genres/genresAddView", "Добавить Жанр", '',  "main.php");
    }

    public function create()
    {
        if (isset($_POST['Add'])) {
            if (!empty($_POST['GenresName'])) {

                $name = htmlspecialchars(strip_tags($_POST['GenresName']));

                $data =
                    [
                        'name' => $name
                    ];

                Genres::Create($data);
                header("location: /");
            }
        }
    }

    public function read()
    {
        if (isset($_POST["Read"])) {
            $id = $_POST["ReadId"];
            $content = Genres::Show($id);
            return view("genres/genresReadView", "Подробности", $content, "main.php");
        } else {
            echo "Упс... Произошло какая-то ошибка!";
?> <a href="/">Назад</a> <?php
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


                                Genres::Update($_POST['UpId'], $data);
                                header("location: /");
                            }
                        }
                    }
                    public function delete()
                    {
                        if (isset($_POST['delete'])) {
                            if (!empty($_POST['deletedId'])) {
                                Genres::Delete($_POST['deletedId']);
                                Book::DeleteWhere('genres_id', '=', $_POST['deletedId']);
                                header('location: /');
                            }
                        }
                    }

                    public function deleteAll()
                    {
                        Genres::DeleteAll();
                        Book::DeleteAll();
                        header("location: /");
                    }

                }
                            ?>