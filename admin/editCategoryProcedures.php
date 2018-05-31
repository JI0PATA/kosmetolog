<?php
admin_head();
admin_menu();

$id = $_GET['id'];
$sql = "SELECT * FROM `procedures_categorys` WHERE `id` = $id";
$stmt = $dbh->query($sql);
$res = $stmt->fetch(2);
?>

<div id="admin-content">
    <div class="title">Редактирование категории для процедур</div>

    <form action="/admin/action?a=editCategoryProcedure&id=<?= $res['id'] ?>" class="admin-add" method="POST">
        <input type="text" placeholder="Название категории" name="name" value="<?= $res['name'] ?>" required>
        <button class="btn">Изменить категорию</button>
        <a href="/admin/action?a=deleteCategoryProcedures&id=<?= $res['id'] ?>">
            <button type="button" class="btn">Удалить категорию</button>
        </a>
    </form>
</div>

