<?php
head();
?>

    <!--------------- ОТЗЫВЫ --------------->
    <div id="callback">
        <div class="header-line">Отзывы</div>

        <div class="content">
            <?php

            if (!isset($_GET['callback'])) {
                $limit = "LIMIT 4";
            }

            $sql = "SELECT * FROM `callback` WHERE `publish` = 1 ORDER BY `date` DESC $limit";
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
                    </div>
                </div>
            <?php
            endforeach;
            ?>
        </div>

        <div class="more">
            <?php
            if (!isset($_GET['callback'])) :
                ?>
                <a href="?callback=more" class="btn">Больше отзывов</a>
            <?php
            else :
                ?>
                <a href="?" class="btn">Скрыть отзывы</a>
            <?php
            endif;
            ?>
        </div>
    </div>
    <!--------------- /ОТЗЫВЫ -------------->

    <!--------------- ДОБАВИТЬ ОТЗЫВ --------------->
    <div id="add_callback">
        <div class="title">Добавить Ваш отзыв</div>

        <img src="/assets/images/flower.png" alt="" class="flower-left">
        <form action="/admin/action?a=addCallback" method="POST">
            <input type="text" class="user" title="Имя" placeholder="Имя" name="name" required>
            <input type="text" class="category" title="Категория" placeholder="Массаж" name="category" required>
            <textarea placeholder="Ваш комментарий" name="text" required></textarea>
            <div class="grade">
                <input type="radio" name="grade" value="1" class="hidden" id="great" checked>
                <input type="radio" name="grade" value="0" class="hidden" id="bad">
                <label class="button-bad" for="bad">
                    <img src="assets/images/bad.png" alt="" class="not-select">
                    <img src="assets/images/bad_a.png" alt="" class="select">
                </label>
                <label class="button-great" for="great">
                    <img src="assets/images/great.png" alt="" class="not-select">
                    <img src="assets/images/great_a.png" alt="" class="select">
                </label>
                <button class="btn">Отправить</button>
            </div>

        </form>
    </div>
    <!--------------- /ДОБАВИТЬ ОТЗЫВ -------------->


<?php
footer();
?>