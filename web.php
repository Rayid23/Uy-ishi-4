<?php

use App\Controllers\AuthController;
use App\Controllers\AuthorController;
use App\Controllers\BookController;
use App\Controllers\ErrorController;
use App\Controllers\GenresController;
use App\Routes\Route;

#--------------------Авторизация-----------------------------------
Route::get("/login", [AuthController::class,"loginPage"]); #Старница Логина
Route::get("/register", [AuthController::class,"registerPage"]); #Старница Регистрации
Route::get("/logout", [AuthController::class,"logout"]); #Старница Регистрации
Route::post("/login", [AuthController::class,"login"]); #Проверка
Route::post("/register", [AuthController::class,"register"]); #Добавить нового пользователя
#--------------------Ошибки-----------------------------------
Route::get("/404", [ErrorController::class,"error404"]); #404 Ошибка Нет такой страницы
Route::get("/403", [ErrorController::class,"error403"]); #403 Ошибка Нет разрещение на вход
#--------------------Жанры-----------------------------------
Route::get("/", [GenresController::class,"index"]); #Старница Жанров
Route::get("/CreateGenresView",[GenresController::class, "createView"]); #Страница создание Жанров
Route::get("/DeleteAllGenres",[GenresController::class, "deleteAll"]); #Удалить все Жанров
Route::post("/CreateGenres",[GenresController::class, "create"]); #Создать Жанр
Route::post("/ReadGenres",[GenresController::class, "read"]); #Читать Жанр
Route::post("/UpdateGenres",[GenresController::class, "update"]); #Обновить Жанр
Route::post("/DeleteGenres",[GenresController::class, "delete"]); #Удалить Жанр
#--------------------Авторы-----------------------------------
Route::get("/Authors", [AuthorController::class,"index"]); #Старница Авторов
Route::get("/CreateAuthorView",[AuthorController::class, "createView"]); #Страница создание Авторов
Route::get("/DeleteAllAuthors",[AuthorController::class, "deleteAll"]); #Удалить все Авторов
Route::post("/CreateAuthor",[AuthorController::class, "create"]); #Создать Автора
Route::post("/ReadAuthor",[AuthorController::class, "read"]); #Читать Автора
Route::post("/UpdateAuthor",[AuthorController::class, "update"]); #Обновить Автора
Route::post("/DeleteAuthorr",[AuthorController::class, "delete"]); #Удалить Автора
#--------------------Книги-----------------------------------
Route::get("/Books", [BookController::class,"index"]); #Старница Книг
Route::get("/CreateBooksView",[BookController::class, "createView"]); #Страница создание Книги
Route::get("/DeleteAllBooks",[BookController::class, "deleteAll"]); #Удалить всех Книг
Route::post("/CreateBooks",[BookController::class, "create"]); #Создать Книгу
Route::post("/ReadBook",[BookController::class, "read"]); #Читать Книгу
Route::post("/UpdateBook",[BookController::class, "update"]); #Обновить Книгу
Route::post("/DeleteBook",[BookController::class, "delete"]); #Удалить Книгу





?>