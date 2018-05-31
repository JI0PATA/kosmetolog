<header class="<?= $GLOBALS['Page'] === 'index' ? 'index' : '' ?>">
    <?php
    include "menu.php";

    if ($GLOBALS['Page'] === 'index') include "slider.php";
    ?>
</header>