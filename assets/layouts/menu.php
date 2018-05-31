<div class="hat">
    <!--------------- ВЕРХНЕЕ МЕНЮ --------------->
    <div class="menu-1">
        <div class="logo">
            <a href="/">
                <img src="/assets/images/logo<?= $GLOBALS['Page'] !== 'index' ? '_b' : '' ?>.png" alt="">
            </a>
            <div class="title">
                <strong>Ваша косметология в Казани</strong><br>
                <span>косметологические услуги</span>
            </div>
        </div>
        <div class="geo">
            <div class="icon">
                <img src="/assets/images/geo<?= $GLOBALS['Page'] !== 'index' ? '_p' : '' ?>.png" alt="">
            </div>
            <div class="text">
                <strong>г. Казань, ул. Кави Наджми, 8</strong>
            </div>
        </div>
        <div class="clock">
            <div class="icon">
                <img src="/assets/images/clock<?= $GLOBALS['Page'] !== 'index' ? '_p' : '' ?>.png" alt="">
            </div>
            <div class="text">
                <strong>с 9:00 до 19:00<br>Суббота, воскресенье - выходной</strong>
            </div>
        </div>
        <div>
            <a class="btn" href="#contacts">
                <img src="/assets/images/call<?= $GLOBALS['Page'] !== 'index' ? '_p' : '_w' ?>.png" alt="">
                <b>Заказать звонок</b>
            </a>
        </div>
    </div>
    <!--------------- /ВЕРХНЕЕ МЕНЮ -------------->

    <!--------------- ВЕРХНЕЕ МЕНЮ - МОБИЛЬНЫЙ --------------->
    <div class="menu-1 mobile">
        <div class="logo">
            <a href="/">
                <img src="/assets/images/logo_b.png" alt="">
            </a>
            <div class="title">
                <strong>Ваша косметология в добром</strong><br>
                <span>косметологические услуги</span>
            </div>
        </div>
        <div class="geo">
            <div class="icon">
                <img src="/assets/images/geo_p.png" alt="">
            </div>
            <div class="text">
                <strong>г. Владимир, ул. Куйбышева д.66Б<br>3 этаж 5 каб.</strong>
            </div>
        </div>
        <div class="clock">
            <div class="icon">
                <img src="/assets/images/clock_p.png" alt="">
            </div>
            <div class="text">
                <strong>с 9:00 до 19:00<br>Суббота, воскресенье - выходной</strong>
            </div>
        </div>
        <div>
            <a class="btn" href="#contacts">
                <img src="/assets/images/call_p.png" alt="">
                <b>Заказать звонок</b>
            </a>
        </div>
    </div>
    <!--------------- /ВЕРХНЕЕ МЕНЮ - МОБИЛЬНЫЙ -------------->

    <!--------------- ЛИНИЯ --------------->
    <div class="line"></div>
    <!--------------- /ЛИНИЯ -------------->
    <!--------------- НИЖНЕЕ МЕНЮ --------------->
    <div class="menu-2">
        <a class="<?= $GLOBALS['Page'] === 'index' ? 'active' : '' ?>" href="/">Главная</a>
        <a class="<?= $GLOBALS['Page'] === 'about' ? 'active' : '' ?>" href="/about">О нас</a>
        <a class="<?= $GLOBALS['Page'] === 'procedures' ? 'active' : '' ?>" href="/procedures">Процедуры</a>
        <a class="<?= $GLOBALS['Page'] === 'services' ? 'active' : '' ?>" href="/services">Прайс</a>
        <a class="<?= $GLOBALS['Page'] === 'callback' ? 'active' : '' ?>" href="/callback">Отзывы</a>
        <a href="#contacts">Контакты</a>
    </div>
    <!--------------- /НИЖНЕЕ МЕНЮ -------------->
    <input type="checkbox" id="menu-mobile" class="hidden">
    <div class="san-menu">
        <label for="menu-mobile" id="san-menu">
            <span>Меню</span>
            <div class="san-line">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </label>
    </div>
    <!--------------- НИЖНЕЕ МЕНЮ --------------->
    <div class="menu-2 mobile">
        <a class="<?= $GLOBALS['Page'] === 'index' ? 'active' : '' ?>" href="/">Главная</a>
        <a class="<?= $GLOBALS['Page'] === 'about' ? 'active' : '' ?>" href="/about">О нас</a>
        <a class="<?= $GLOBALS['Page'] === 'procedures' ? 'active' : '' ?>" href="/procedures">Процедуры</a>
        <a class="<?= $GLOBALS['Page'] === 'services' ? 'active' : '' ?>" href="/services">Прайс</a>
        <a class="<?= $GLOBALS['Page'] === 'callback' ? 'active' : '' ?>" href="/callback">Отзывы</a>
        <a href="#contacts">Контакты</a>
    </div>
    <!--------------- /НИЖНЕЕ МЕНЮ -------------->
</div>