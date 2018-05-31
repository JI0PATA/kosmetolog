<?php
admin_head();
admin_menu();

$id = $_GET['id'];
$sql = "SELECT * FROM `procedures` WHERE `id` = $id";
$res = $dbh->query($sql)->fetch(2);
?>

<div id="admin-content">
    <div class="title">Редактирование процедуры</div>

    <form action="/admin/action?a=editProcedure&id=<?= $res['id'] ?>" class="admin-add" method="POST" enctype="multipart/form-data">
        <input type="text" placeholder="Название услуги" name="name" value="<?= $res['name'] ?>" required>
        <textarea name="description" required><?= $res['description'] ?></textarea>
        <select name="category" required>
            <option selected disabled>Выберите категорию услуги</option>
            <?php
            $sql = "SELECT * FROM `procedures_categorys`";
            $stmt = $dbh->query($sql);
            $categorys = $stmt->fetchAll(2);
            foreach ($categorys as $category) :
                ?>
                <option value="<?= $category['id'] ?>" <?= $category['id'] == $res['procedures_categorys_id'] ? 'selected' : '' ?>><?= $category['name'] ?></option>
            <?php
            endforeach;
            ?>
        </select>
        <img src="/assets/images/services/<?= $res['img'] ?>" alt="">
        <input type="file" name="file">
        <button class="btn">Редактировать услугу</button>
        <a href="/admin/action?a=deleteProcedure&id=<?= $res['id'] ?>">
            <button type="button" class="btn">Удалить услугу</button>
        </a>
    </form>
</div>

