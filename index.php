<?php
// Отключение ошибок. На продакшене убрать
//error_reporting(E_ERROR);

// Старт сессий
session_start();
// Подключение конфига с данными
include_once 'config.php';

$dbh = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", USER, PASS, $options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
]);
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
$dbh->exec("set names utf8");


//Разбивает адрес на части
if ($_SERVER['REQUEST_URI'] == '/') {
    $Page = 'index';
    $Module = 'index';
} else {
    $URL_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $URL_Parts = explode('/', trim($URL_Path, ' /'));
    $Page = array_shift($URL_Parts);
    $Module = array_shift($URL_Parts);

//Разбор параметров адреса
    if (!empty($Module)) {
        $Param = array();
        for ($i = 0; $i < count($URL_Parts); $i++) {
            $Param[$URL_Parts[$i]] = $URL_Parts[++$i];
        }
    }
}

/**
 * Подключение файлов по url
 */
if (file_exists("pages/" . $Page . ".php")) include "pages/" . $Page . ".php";
else if ($Page === 'admin') {
    if (!in_array($Module, ['action'])) {
        if ($Module === 'login') onlyUnlogged();
        else onlyLogged();
    }

    include "admin/functions.php";
    if ($Module === null || $Module === 'index') include "admin/index.php";
    else include "admin/" . $Module . ".php";
} else include "pages/404.php";

/**
 * Отображение head
 */
function head()
{
    include "assets/layouts/head.php";
    hat();
    showMsg();
}


/**
 * Отображение шапки
 */
function hat()
{
    include "assets/layouts/hat.php";
}

/**
 * Отображение подвала
 */
function footer()
{
    include "assets/layouts/footer.php";
}

/**
 * Отображение сообщений
 */
function showMsg()
{
    if (isset($_SESSION['POPUP_MSG'])) {
        echo $_SESSION['POPUP_MSG'];
        unset($_SESSION['POPUP_MSG']);
    }
}

/**
 * Создание оповещения
 * @param $status
 * @param $msg
 */
function createMsg($status, $msg)
{
    if ($status === 0) $class = 'error';
    else if ($status === 1) $class = 'success';

    $_SESSION['POPUP_MSG'] = "<div class='popup_msg $class'>$msg</div>";
}

/**
 * Редирект
 * @param $path
 */
function go($path)
{
    if ($path === 'serv') $path = $_SERVER['HTTP_REFERER'];

    exit(header('Location: ' . $path));
}

/**
 * Комбинированная функция создание оповещения и редиректа
 * @param $status
 * @param $msg
 * @param string $path
 */
function MsgGo($status, $msg, $path = 'serv')
{
    createMsg($status, $msg);
    go($path);
}

/**
 * Загрузка файла
 * @param $file
 * @param $path
 */
function uploadFile($file, $path)
{
    $res = move_uploaded_file($file['tmp_name'], $path . '/' . $file['name']);
    if (!$res) MsgGo(0, 'Файл не был загружен!');
}

/**
 * Разрешён доступ только для авторизованных пользователей
 */
function onlyLogged()
{
    if (!isset($_SESSION['ADMIN'])) MsgGo(0, 'Необходимо авторизоваться!', '/admin/login');
}

/**
 * Разрешён доступ только для неавторизованных пользователей
 */
function onlyUnlogged()
{
    if (isset($_SESSION['ADMIN'])) MsgGo(0, 'Страница доступна только для неавторизованных пользователей!', '/admin');
}

/**
 * Вывод данных в экранированном виде
 * @param $data
 * @return string
 */
function print_data($data)
{
    return htmlentities($data);
}

