<div class="row"> <!--Контент-->

    <h1 align="center">Авторы</h1>

    <div class="col-12">
        <a class="btn btn-primary" href="CreateBooksView">Добавить</a>
        <a class="btn btn-warning" href="/Books">Очистить</a>
        <?php
        if(auth()->role == "admin") {
            echo("<a class='btn btn-danger' href='DeleteAllBooks'>Удалить все!</a>");
        }
        ?>
    </div>


    <table class="table mt-2 table-bordered table-striped table-primary" border="2">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">DESC</th>
                <th scope="col">IMAGE</th>
                <th scope="col">Author</th>
                <th scope="col">Genres</th>
                <th scope="col">OPTIONS</th>

            </tr>
        </thead>
        <tbody>

            <?php

            foreach ($models['main'] as $book) { ?>
                <tr class="red">
                    <th class="th" scope="row"><?= $book->id ?></th>
                    <td class="td"><?= $book->title ?></td>
                    <td class="td"><?= $book->description ?></td>
                    <td class="td text-center"><img src="<?= $book->img ?>" style="width:120px; border:2px solid black; border-radius:40%"></td>
                    <td class="td"><?= $book->author ?></td>
                    <td class="td"><?= $book->genres ?></td>

                    <td class="td">

                        <form action="ReadBook" method="POST" style="display:inline">
                            <input type="hidden" name="ReadId" value="<?= $book->id ?>">
                            <button type="submit" name="Read" class="btn btn-primary"><i class="bi bi-book-fill"></i></button>
                        </form>


                        <!-- Delete Modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#DeleteModal<?= $book->id ?>">
                            <i class="bi bi-trash-fill"></i>
                        </button>

                        <!-- Deletes - Modal -->
                        <div class="modal fade" id="DeleteModal<?= $book->id ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Удаление...
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h1 class="text-center text-danger">Вы действительно хотите
                                            удалить этот данные?</h1>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Назад</button>

                                        <form action="DeleteBook" method="post">
                                            <input type="hidden" name="deletedId" value="<?= $book->id ?>">
                                            <button name="delete"
                                                class="btn btn-primary">ДА!</i>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Update Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#Update<?= $book->id ?>">
                            <i class="bi bi-pencil-fill"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="Update<?= $book->id ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Изменение</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <h4 align="center" class="text-primary mb-3">Изменить Автора - <?= $book->id ?></h4>

                                        <form action="UpdateBook" method="POST" enctype="multipart/form-data">

                                            <div class="mb-3">
                                                <input class="form-control border-primary" id="BookName" type="text"
                                                    name="BookName" value="<?= $book->title ?>" placeholder="<?= $book->title ?>">
                                            </div>

                                            <div class="mb-3" align="center">
                                                <label from="BookDesc">Описание!</label>
                                                <input type="text" value="<?= $book->description ?>" class="form-control" style="border:2px solid aqua; width:470px; font-weight: 500; color:blueviolet" name="BookDesc" id="BookDesc" placeholder="<?= $book->description ?>" aria-describedby="BookDesc">
                                            </div>

                                            <div class="mb-3" align="center">
                                                <label from="BookText">Подробности!</label>
                                                <textarea type="text" class="form-control" rows="7" cols="10" style="border:2px solid aqua; width:470px; font-weight: 500; color:blueviolet" name="BookText" id="BookText" placeholder="<?= $book->text ?>" aria-describedby="BookText"></textarea>
                                            </div>

                                            <input type="hidden" name="old_img" value="<?= $book->img ?>">

                                            <div class="mb-3" align="center">
                                                <label from="BookImg">Картинка!</label>
                                                <input type="file" class="form-control" rows="10" cols="10" style="border:2px solid aqua; width:470px; font-weight: 500; color:blueviolet" name="BookImg" id="BookImg" aria-describedby="BookImg">
                                            </div>

                                            <div class="row mb-3" align="center" style="margin-left:auto">

                                                <select id="author" name="author_id" class="form-control me-2" style="border:2px solid aqua; width:225px; font-weight: 500; color:blueviolet">
                                                    <?php

                                                    foreach ($models['author'] as $author) { ?>
                                                        <option value="<?= $author->id ?>"><?= $author->name ?></option>
                                                    <?php }

                                                    ?>
                                                </select>
                                                <select name="genres_id" class="form-control" style="border:2px solid aqua; width:235px; font-weight: 500; color:blueviolet">

                                                    <?php

                                                    foreach ($models['genres'] as $genres) { ?>
                                                        <option value="<?= $genres->id ?>"><?= $genres->name ?></option>
                                                    <?php }

                                                    ?>

                                                </select>
                                            </div>
                                            <input type="hidden" name="UpId" value="<?= $book->id ?>">
                                            <div class="mb-3" align="center">
                                                <button name="Update" class="btn btn-primary"
                                                    style="width:350px">Изменить</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php }

            ?>

        </tbody>
    </table>

</div>