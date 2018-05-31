<?php

$action = $_GET['a'];

/**
 * Авторизация
 */
if ($action === 'login') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if ($login === 'admin' && $password === 'qwerty123') {
        $_SESSION['ADMIN'] = true;
        MsgGo(1, 'Вы успешно авторизовались!', '/admin');
    } else {
        MsgGo(0, 'Неверные данные!', '/admin/login');
    }
}
/**
 * Отправка обратной связи
 */
else if ($action === 'callback') {
    $id = $_GET['id'];
    if ($_GET['d'] === 'publish') {
        $sql = "UPDATE `callback` SET `publish` = 1 WHERE `id` = $id";
        $msg['success'] = "Отзыв опубликован!";
        $msg['error'] = "Отзыв не опубликован!";
    } else if ($_GET['d'] === 'block') {
        $sql = "UPDATE `callback` SET `publish` = 0 WHERE `id` = $id";
        $msg['success'] = "Отзыв заблокирован!";
        $msg['error'] = "Отзыв не заблокирован!";
    } else if ($_GET['d'] === 'delete') {
        $sql = "DELETE FROM `callback` WHERE `id` = $id";
        $msg['success'] = "Отзыв удалён!";
        $msg['error'] = "Отзыв не удалён!";
    }

    $res = $dbh->query($sql);
    if ($res) MsgGo(1, $msg['success']);
    else MsgGo(0, $msg['error']);
}
/**
 * Выход
 */
else if ($action === 'logout') {
    unset($_SESSION['ADMIN']);
    MsgGo(1, 'Вы вышли из панели!', '/admin/login');
}
/**
 * Добавление отзыва
 */
else if ($action === 'addCallback') {
    $name = $_POST['name'];
    $text = $_POST['text'];
    $category = $_POST['category'];
    $grade = $_POST['grade'];
    $date = time();

    $sql = "INSERT INTO `callback` (`name`, `text`, `grade`, `category`, `date`) VALUES (?, ?, $grade, ?, $date)";

    $stmt = $dbh->prepare($sql);
    $res = $stmt->execute([$name, $text, $category]);

    if ($res) MsgGo(1, 'Ваш отзыв отправлен на модерацию!');
    else MsgGo(0, 'Произошла техинческая ошибка. Попробуйте позже!');
}
/**
 * Запись на приём
 */
else if ($action === 'contacts') {
    $name = $_POST['name'];
    $call = $_POST['call'];
    $res = mail('nasyrov.aidar116@mail.ru', 'Запись на приём', "Имя: $name\nТелефон: $call");

    if ($res) MsgGo(1, 'Ваше письмо было отправлено!');
    else MsgGo(0, 'Ваше письмо не было отправлено! Попробуйте позже!');
}


// Категории услуг
else if ($action === 'addCategoryServices') {
    $name = $_POST['name'];

    $sql = "INSERT INTO `services_categorys` (`name`) VALUES (?)";
    $stmt = $dbh->prepare($sql);
    $res = $stmt->execute([$name]);

    if ($res) MsgGo(1, 'Категория успешно добавлена!');
    else MsgGo(0, 'Категория не была добавлена! Попробуйте позже!');
} else if ($action === 'editCategoryServices') {
    $name = $_POST['name'];
    $id = $_GET['id'];

    $sql = "UPDATE `services_categorys` SET `name` = ? WHERE `id` = $id";
    $stmt = $dbh->prepare($sql);
    $res = $stmt->execute([$name]);

    if ($res) MsgGo(1, 'Категория отредактирована!');
    else MsgGo(0, 'Категория не отредактирована!');
} else if ($action === 'deleteCategoryServices') {
    $id = $_GET['id'];
    $sql = "DELETE FROM `services_categorys` WHERE `id` = $id";
    $res = $dbh->query($sql);

    if ($res) MsgGo(1, 'Категория успешно удалена!', '/admin/services');
    else MsgGo(0, 'Категория не была удалена! Попробуйте позже!');
}


// Услуги
else if ($action === 'addService') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    $sql = "INSERT INTO `services` (`name`, `price`, `services_category_id`) VALUES (?, '$price', $category)";
    $stmt = $dbh->prepare($sql);
    $res = $stmt->execute([$name]);

    if ($res) MsgGo(1, 'Услуга успешно добавлена!');
    else MsgGo(0, 'Услуга не была добавлена!');
} else if ($action === 'editService') {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    $sql = "UPDATE `services` SET `name` = ?, `price` = '$price', `services_category_id` = $category WHERE `id` = $id";
    $stmt = $dbh->prepare($sql);
    $res = $stmt->execute([$name]);

    if ($res) MsgGo(1, 'Услуга успешно отредактирована!');
    else MsgGo(0, 'Услуга не была отредактирована!');

} else if ($action === 'deleteService') {
    $id = $_GET['id'];

    $sql = "DELETE FROM `service` WHERE `id` = $id";
    $res = $dbh->query($sql);

    if ($res) MsgGo(1, "Услуга удалена!", '/admin/services');
    else MsgGo(0, 'Услуга не была удалена! Попробуйте позже!');
}


// Категории процедур
else if ($action === 'addCategoryProcedures') {
    $name = $_POST['name'];

    $sql = "INSERT INTO `procedures_categorys` (`name`) VALUES (?)";
    $stmt = $dbh->prepare($sql);
    $res = $stmt->execute([$name]);

    if ($res) MsgGo(1, 'Категория успешно добавлена!');
    else MsgGo(0, 'Категория не была добавлена!');
} else if ($action === 'editCategoryProcedures') {
    $name = $_POST['name'];
    $id = $_GET['id'];

    $sql = "UPDATE `procedures_categorys` SET `name` = ? WHERE `id` = $id";
    $stmt = $dbh->prepare($sql);
    $res = $stmt->execute([$name]);

    if ($res) MsgGo(1, 'Категория изменена!');
    else MsgGo(0, 'Категория не была изменена!');
} else if ($action === 'deleteCategoryProcedures') {
    $id = $_GET['id'];

    $sql = "DELETE FROM `procedures_categorys` WHERE `id` = $id";
    $res = $dbh->query($sql);

    if ($res) MsgGo(1, 'Категория успешно удалена!', '/admin/procedures');
    else MsgGo(0, 'Категория не удалена! Попробуйте позже!');

}


// Процедуры
else if ($action === 'addProcedure') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $file = $_FILES['file'];

    uploadFile($file, 'assets/images/services');

    $sql = "INSERT INTO `procedures` (`name`, `description`, `img`,`procedures_categorys_id`) VALUES (?, ?, '$file[name]',$category)";
    $stmt = $dbh->prepare($sql);
    $res = $stmt->execute([$name, $description]);


    if ($res) MsgGo(1, 'Процедура успешно добавлена!');
    else MsgGo(0, 'Процедура не была добавлена!');

} else if ($action === 'editProcedure') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $id = $_GET['id'];

    $sql = "UPDATE `procedures` SET `name` = ?, `description` = ?, `procedures_categorys_id` = $id WHERE `id` = $id";
    $stmt = $dbh->prepare($sql);
    $res = $stmt->execute([$name, $description]);

    if ($res) MsgGo(1, 'Процедура отредактирована!');
    else MsgGo(0, 'Процедура не была отредактирована! Попробуйте позже!');
} else if ($action === 'deleteProcedure') {
    $id = $_GET['id'];

    $sql = "DELETE FROM `procedures` WHERE `id` = $id";
    $res = $dbh->query($sql);

    if ($res) MsgGo(1, 'Процедура удалена!', '/admin/procedures');
    else MsgGo(0,'Процедура не удалена! Попробуйте позже!');
}

// Слайдер
else if ($action === 'deleteSlide') {
    $id = $_GET['id'];

    $sql = "DELETE FROM `slides` WHERE `id` = $id";
    $res = $dbh->query($sql);

    if ($res) MsgGo(1, 'Слайд удалён!', '/admin/slides');
    else MsgGo(0, 'Слайд не удалён!', '/admin/slides');
} else if ($action === 'editSlide') {
    $id = $_GET['id'];
    $file = $_FILES['file'];

    if (empty($file['tmp_name'])) MsgGo(0, 'Вы не выбрали изображение!');

    uploadFile($file, 'assets/images/slider');

    $sql = "UPDATE `slides` SET `img` = '$file[name]' WHERE `id` = $id";
    $res = $dbh->query($sql);

    if ($res) MsgGo(1, 'Слайд отредактирован!', '/admin/slides');
    else MsgGo(0, 'Слайд не отредактирован!');
} else if ($action === 'addSlide') {
    $file = $_FILES['file'];

    if (empty($file['tmp_name'])) MsgGo(0, 'Вы не выбрали изображение!');

    uploadFile($file, 'assets/images/slider');

    $sql = "INSERT INTO `slides` (`img`) VALUES ('$file[name]')";
    $res = $dbh->query($sql);

    if ($res) MsgGo(1, 'Слайд добавлен!', '/admin/slides');
    else MsgGo(0, 'Слайд не добавлен!');


}