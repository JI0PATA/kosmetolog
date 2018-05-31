<?php
admin_head();
admin_menu();
?>

<div id="admin-content">
    <div class="title">Добавление слайда</div>


    <div id="slides">
        <div>
            <form action="/admin/action?a=addSlide" method="POST" enctype="multipart/form-data">
                <input type="file" name="file">
                <button class="btn">Сохранить</button>
            </form>
        </div>
    </div>
</div>

