<?php
admin_head();
admin_menu();
?>

<div id="admin-content">
    <div class="title">Добавление процедуры</div>

    <form action="/admin/action?a=addProcedure" class="admin-add" method="POST" enctype="multipart/form-data">
        <input type="text" placeholder="Название услуги" name="name" required>
        <textarea name="description" required></textarea>
        <select name="category" required>
            <option selected disabled>Выберите категорию услуги</option>
            <?php
            $sql = "SELECT * FROM `procedures_categorys`";
            $stmt = $dbh->query($sql);
            $categorys = $stmt->fetchAll(2);
            foreach ($categorys as $category) :
                ?>
                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
            <?php
            endforeach;
            ?>
        </select>
        <input type="file" name="file" required>
        <button class="btn">Добавить услугу</button>
    </form>
</div>

