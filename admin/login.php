<?php

admin_head();

?>

<div id="admin-login">
    <form action="/admin/action?a=login" method="POST">
        <input type="text" placeholder="Логин" class="user" name="login">
        <input type="password" placeholder="Пароль" class="user" name="password">
        <button class="btn">Войти</button>
    </form>
</div>
