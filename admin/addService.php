<?php
admin_head();
admin_menu();
?>

<div id="admin-content">
    <div class="title">Добавление услуги</div>

    <form action="/admin/action?a=addService" class="admin-add" method="POST">
        <input type="text" placeholder="Название услуги" name="name" required>
        <input type="text" placeholder="Цена" name="price" required>
        <select name="category" required>
            <option selected disabled>Выберите категорию услуги</option>
            <?php
            $sql = "SELECT * FROM `services_categorys`";
            $stmt = $dbh->query($sql);
            $categorys = $stmt->fetchAll(2);
            foreach ($categorys as $category) :
                ?>
                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
            <?php
            endforeach;
            ?>
        </select>
        <button class="btn">Добавить услугу</button>
    </form>
</div>

