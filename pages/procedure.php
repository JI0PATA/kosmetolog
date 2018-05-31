<?php
$id = $Module;
$sql = "SELECT *, COUNT(`id`) as `count` FROM `procedures` WHERE `id` = $id";
$res = $dbh->query($sql)->fetch(2);
if ($res['count'] == 0) MsgGo(0, 'Такой страницы не существует!', '/procedures');


head();

$sql = "SELECT * FROM `procedures_categorys` WHERE `id` = $res[procedures_categorys_id]";
$category_name = $dbh->query($sql)->fetch(2);
?>

<!--------------- КОНТЕНТ СТРАНИЦЫ --------------->

<div id="page">
    <!--------------- ХЛЕБНЫЕ КРОШКИ --------------->
    <div class="breadcrumbs">
        <?= $category_name['name'] ?> \ <?= $res['name'] ?>
    </div>
    <!--------------- /ХЛЕБНЫЕ КРОШКИ -------------->

    <div class="title"><?= $res['name'] ?></div>

    <!--------------- КАРТИНКА --------------->
    <div class="photo">
        <div style="background-image: url('/assets/images/services/<?= $res['img'] ?>')"></div>
    </div>
    <!--------------- /КАРТИНКА -------------->

    <div class="text"><?= $res['description'] ?></div>
</div>

<!--------------- /КОНТЕНТ СТРАНИЦЫ -------------->


<?php
footer();
?>