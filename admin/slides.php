<?php
admin_head();
admin_menu();
?>

<div id="admin-content">
    <div class="title">Слайд-шоу</div>


    <div id="slides">
        <?php
        $sql = "SELECT * FROM `slides` ORDER BY `id` DESC";
        $res = $dbh->query($sql);
        $slides = $res->fetchAll(2);
        foreach ($slides as $slide) :
            ?>
            <div>
                <img src="/assets/images/slider/<?= $slide['img'] ?>" alt="">
                <div class="action">
                    <a href="/admin/action?a=deleteSlide&id=<?= $slide['id'] ?>">Удалить</a><br>
                    <a href="/admin/editSlide?id=<?= $slide['id'] ?>">Изменить</a>
                </div>
            </div>
        <?php
        endforeach;
        ?>
    </div>
</div>

