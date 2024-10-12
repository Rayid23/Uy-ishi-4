<div class="row"> <!--Контент-->

    <h1 align="center">Авторы</h1>

    <div class="col-12">
        <a class="btn btn-primary" href="CreateAuthorView">Добавить</a>
        <a class="btn btn-warning" href="/Authors">Очистить</a>
        <?php
        if (auth()) {
            if(auth()->role == "admin") {
                echo "<a class='btn btn-danger' href='DeleteAllAuthors'>Удалить все!</a>";
            }
        }
        ?>
    </div>


    <table class="table mt-2 table-bordered table-striped table-primary" border="2">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Books</th>
                <th scope="col">Option</th>
            </tr>
        </thead>
        <tbody>

            <?php

            foreach ($models as $author) { ?>
                <tr class="red">
                    <th class="th" scope="row"><?= $author->id ?></th>
                    <td class="td"><?= $author->name ?></td>
                    <td class="td"><?= $author->count ?></td>

                    <td class="td text-center">

                        <form action="ReadAuthor" method="POST" style="display:inline">
                            <input type="hidden" name="ReadId" value="<?= $author->id ?>">
                            <button type="submit" name="Read" class="btn btn-primary" style="<?= (auth()->role == "user") ? "width:65px; " : '' ?>"><i class="bi bi-book-fill"></i></button>
                        </form>

                        <?php

                        if (auth()->role == "admin") { ?>

                            <!-- Delete Modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#DeleteModal<?= $author->id ?>">
                                <i class="bi bi-trash-fill"></i>
                            </button>

                            <!-- Deletes - Modal -->
                            <div class="modal fade" id="DeleteModal<?= $author->id ?>" tabindex="-1"
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

                                            <form action="DeleteAuthorr" method="post">
                                                <input type="hidden" name="deletedId" value="<?= $author->id ?>">
                                                <button name="delete"
                                                    class="btn btn-primary">ДА!</i>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Update Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#Update<?= $author->id ?>">
                                <i class="bi bi-pencil-fill"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="Update<?= $author->id ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Изменение</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h4 align="center" class="text-primary mb-3">Изменить Автора - <?= $author->id ?></h4>
                                            <form action="UpdateAuthor" method="POST">
                                                <div class="mb-3">
                                                    <input class="form-control border-primary" id="name" type="text"
                                                        name="name" placeholder="<?= $author->name ?>">
                                                </div>
                                                <input type="hidden" name="UpId" value="<?= $author->id ?>">
                                                <div class="mb-3" align="center">
                                                    <button name="Update" class="btn btn-primary"
                                                        style="width:350px">Изменить</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php }


                        ?>



                    </td>
                </tr>
            <?php }

            ?>

        </tbody>
    </table>

</div>