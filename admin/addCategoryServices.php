<?php
admin_head();
admin_menu();
?>

<div id="admin-content">
    <div class="title">Добавление категории для услуг</div>

    <form action="/admin/action?a=addCategoryServices" class="admin-add" method="POST">
        <input type="text" placeholder="Название категории" name="name" required>
        <button class="btn">Добавить категорию</button>
    </form>
</div>

