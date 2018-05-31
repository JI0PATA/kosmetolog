<?php
admin_head();
admin_menu();
?>

<div id="admin-content">
    <div class="title">Все услуги</div>

    <!--------------- ПРАЙС --------------->
    <div id="price">
        <?php
        $sql = "SELECT * FROM `services_categorys` ORDER BY `id`";
        $res = $dbh->query($sql);
        $categorys = $res->fetchAll(2);
        foreach ($categorys as $category) :
            ?>
            <div class="drop-list">
                <div class="title spoiler"><?= $category['name'] ?> <a href="/admin/editCategoryServices?id=<?= $category['id'] ?>">Изменить</a></div>
                <div class="table spoiler">
                    <table>
                        <?php
                        $sql = "SELECT * FROM `services` WHERE `services_category_id` = $category[id]";
                        $res = $dbh->query($sql);
                        $services = $res->fetchAll(2);
                        foreach ($services as $service) :
                            ?>
                            <tr>
                                <td><?= $service['name'] ?> <a href="/admin/editService?id=<?= $service['id'] ?>">Изменить</a></td>
                                <td><?= $service['price'] ?></td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </table>
                </div>
            </div>
        <?php
        endforeach;
        ?>

    </div>
    <!--------------- /ПРАЙС -------------->
</div>


<script>
    $(document).ready(function () {
        // Спойлер
        $('.table.spoiler').hide();

        var prevEl = null;

        $('.title.spoiler').click(function () {
            $(this).toggleClass("folded").next().slideToggle();
            if (this != prevEl) {
                $(prevEl).toggleClass("folded").next().slideToggle();
                prevEl = this;
            } else {
                prevEl = null;
            }
        })
    });
</script>
