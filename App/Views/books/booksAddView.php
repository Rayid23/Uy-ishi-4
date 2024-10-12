<div class="row"> <!--Контент-->

    <h1 align="center">Добавить Книгу!</h1>

    <div class="col-12">
        <a class="btn btn-primary" href="/Books">Назад</a>
    </div>

    <form action="CreateBooks" class="mt-4" align="center" method="post" enctype="multipart/form-data">
        <div class="mb-3" align="center">
            <label from="hint">Имя жанра!</label>
            <input type="text" class="form-control" style="border:2px solid aqua; width:520px; font-weight: 500; color:blueviolet" name="BookName" id="hint" aria-describedby="hint">
        </div>

        <div class="mb-3" align="center">
            <label from="BookDesc">Описание!</label>
            <input type="text" class="form-control" style="border:2px solid aqua; width:520px; font-weight: 500; color:blueviolet" name="BookDesc" id="BookDesc" aria-describedby="BookDesc">
        </div>

        <div class="mb-3" align="center">
            <label from="BookText">Подробности!</label>
            <textarea type="text" class="form-control" rows="7" cols="10" style="border:2px solid aqua; width:520px; font-weight: 500; color:blueviolet" name="BookText" id="BookText" aria-describedby="BookText"></textarea>
        </div>

        <div class="mb-3" align="center">
            <label from="BookImg">Картинка!</label>
            <input type="file" class="form-control" rows="10" cols="10" style="border:2px solid aqua; width:520px; font-weight: 500; color:blueviolet" name="BookImg" id="BookImg" aria-describedby="BookImg">
        </div>

        <div class="row mb-3" align="center" style="margin-left:298px">
            
            <select id="author" name="author_id" class="form-control me-2" style="border:2px solid aqua; width:250px; font-weight: 500; color:blueviolet">
                <?php

                foreach ($models['author'] as $author) { ?>
                    <option value="<?= $author->id ?>"><?= $author->name ?></option>
                <?php }

                ?>
            </select>
            <select  name="genres_id" class="form-control" style="border:2px solid aqua; width:263px; font-weight: 500; color:blueviolet">

                <?php

                foreach ($models['genres'] as $genres) { ?>
                    <option value="<?= $genres->id ?>"><?= $genres->name ?></option>
                <?php }

                ?>

            </select>
        </div>

        <button type="submit" name="Add" class="btn btn-primary" style="width: 200px;">Добавить</button>
    </form>


</div>