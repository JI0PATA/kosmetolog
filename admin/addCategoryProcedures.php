<?php
admin_head();
admin_menu();
?>

<div id="admin-content">
    <div class="title">Добавление категории для процедур</div>

    <form action="/admin/action?a=addCategoryProcedures" class="admin-add" method="POST">
        <input type="text" placeholder="Название категории" name="name" required>
        <button class="btn">Добавить категорию</button>
    </form>
</div>

