<?php
admin_head();
admin_menu();

$id = $_GET['id'];
$sql = "SELECT * FROM `services` WHERE `id` = $id";
$res = $dbh->query($sql)->fetch(2);
?>

<div id="admin-content">
    <div class="title">Редактирование услуги</div>

    <form action="/admin/action?a=editService&id=<?= $res['id'] ?>" class="admin-add" method="POST">
        <input type="text" placeholder="Название услуги" name="name" value="<?= $res['name'] ?>" required>
        <input type="text" placeholder="Цена" name="price" value="<?= $res['price'] ?>" required>
        <select name="category" required>
            <option selected disabled>Выберите категорию услуги</option>
            <?php
            $sql = "SELECT * FROM `services_categorys`";
            $stmt = $dbh->query($sql);
            $categorys = $stmt->fetchAll(2);
            foreach ($categorys as $category) :
                ?>
                <option value="<?= $category['id'] ?>" <?= $category['id'] == $res['services_category_id'] ? 'selected' : '' ?>><?= $category['name'] ?></option>
            <?php
            endforeach;
            ?>
        </select>
        <button class="btn">Редактировать услугу</button>
        <a href="/admin/action?a=deleteService&id=<?= $res['id'] ?>">
            <button type="button" class="btn">Удалить услугу</button>
        </a>
    </form>
</div>

