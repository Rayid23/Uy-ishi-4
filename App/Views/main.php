<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        .td {
            width: 80px;
            height: 50px;
            word-wrap: break-word;
            word-break: break-all;
        }

        td:hover {
            background-color: blueviolet;
        }

        th:hover {
            background-color: blueviolet;
        }

        .th {
            width: 20px;
            height: 50px;
        }

        a:hover {
            background-color: grey;
        }
    </style>

</head>

<body>

    <div class="container mb-5">

        <div class="row"> <!--Навбар-->

            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">Жанры</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/Authors">Авторы</a>
                            </li>

                            <?php
                            if (auth()) {
                                if (auth()->role == "admin") { ?>
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="/Books">Книги</a>
                                    </li>
                            <?php }
                            }

                            ?>

                        </ul>


                        <?php

                        if (!check()) { ?>
                            <a href="/login" class="btn btn-outline-success me-2" type="submit">Login</a>
                            <a href="/register" class="btn btn-outline-success me-2" type="submit">Register</a>

                        <?php } else { ?>
                            <ul class="navbar-nav btn btn-primary " style="border:2px solid blue">
                                <li class="nav-item dropdown">
                                    <a class="nav-link btn btn-primary " role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-person-circle"><?= '   ' . auth()->name ?></i>
                                    </a>
                                    <ul class="dropdown-menu bg-primary">
                                        <li><a class="dropdown-item" href="/UserCabinet">Личный кабинет</a></li>
                                        <li><a class="dropdown-item" href="/UserSettings">Профиль и настройки</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="/logout">Выйти</a></li>
                                    </ul>
                                </li>
                            </ul>

                        <?php }
                        ?>
                    </div>
                </div>
            </nav>

        </div>

        <?= $content ?>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>