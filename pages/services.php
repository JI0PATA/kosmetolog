<?php

head();

?>

    <img src="/assets/images/flower.png" alt="" class="flower-left">

    <!--------------- ПРАЙС --------------->
    <div id="price">
        <?php
        $sql = "SELECT * FROM `services_categorys` ORDER BY `id`";
        $res = $dbh->query($sql);
        $categorys = $res->fetchAll(2);
        foreach ($categorys as $category) :
            ?>
            <div class="drop-list">
                <div class="title spoiler"><?= $category['name'] ?></div>
                <div class="table spoiler">
                    <div class="table__main">
                        <?php
                        $sql = "SELECT * FROM `services` WHERE `services_category_id` = $category[id]";
                        $res = $dbh->query($sql);
                        $services = $res->fetchAll(2);
                        foreach ($services as $service) :
                            ?>
                            <div class="table__main_row">
                                <div class="main_column main_column_title"><?= $service['name'] ?></div>
                                <div class="main_column main_column_price"><?= $service['price'] ?></div>
                            </div>
                        <?php
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
        ?>

    </div>
    <!--------------- /ПРАЙС -------------->

<?php
footer();
?>