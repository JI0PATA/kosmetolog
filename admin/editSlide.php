<?php
admin_head();
admin_menu();
?>

<div id="admin-content">
    <div class="title">Изменение слайда</div>


    <div id="slides">
        <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM `slides` WHERE `id` = $id";
        $res = $dbh->query($sql);
        $slide = $res->fetch(2);
        ?>
        <div>
            <img src="/assets/images/slider/<?= $slide['img'] ?>" alt="">
            <form action="/admin/action?a=editSlide&id=<?= $id ?>" method="POST" enctype="multipart/form-data">
                <input type="file" name="file">
                <button class="btn">Сохранить</button>
            </form>
            <div class="action">
                <a href="/admin/action?a=deleteSlide&id=<?= $slide['id'] ?>">Удалить</a><br>
            </div>
        </div>
    </div>
</div>

