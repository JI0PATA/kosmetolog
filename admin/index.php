<?php
admin_head();

admin_menu();
?>

<div id="admin-content">
    <div class="title">Отзывы</div>

    <!--------------- ОТЗЫВЫ --------------->
    <div id="callback">
        <div class="content">
            <?php
            $sql = "SELECT * FROM `callback` ORDER BY `date` DESC";
            $res = $dbh->query($sql);
            $callbacks = $res->fetchAll(2);

            foreach ($callbacks as $val) :
                ?>
                <div class="border">
                    <div class="message">
                        <div class="hat">
                            <div class="user">
                                <div class="name"><?= print_data($val['name']) ?></div>
                                <div class="date"><?= date('d.m.Y', $val['date']) ?></div>
                            </div>
                            <div class="grade btn">
                                <?php
                                if ($val['grade'] == 0) :
                                    ?>
                                    <img src="/assets/images/bad_a.png" alt="">
                                    <span>отрицательный</span>
                                <?php
                                else :
                                    ?>
                                    <img src="/assets/images/great_a.png" alt="">
                                    <span>положительный</span>
                                <?php
                                endif;
                                ?>
                            </div>
                        </div>
                        <div class="text"><?= print_data($val['text']) ?></div>
                        <div class="category btn"><?= print_data($val['category']) ?></div>
                        <div class="action">
                            <?php
                            if ($val['publish'] == 0) :
                                ?>
                                <a href="/admin/action?a=callback&d=publish&id=<?= $val['id'] ?>"
                                   class="btn">Опубликовать</a>
                            <?php
                            else:
                                ?>
                                <a href="/admin/action?a=callback&d=block&id=<?= $val['id'] ?>"
                                   class="btn">Заблокировать</a>
                            <?php
                            endif;
                            ?>
                            <a href="/admin/action?a=callback&d=delete&id=<?= $val['id'] ?>" class="btn">Удалить</a>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
            ?>
        </div>

    </div>
    <!--------------- /ОТЗЫВЫ -------------->
</div>

