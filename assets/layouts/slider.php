<!--------------- СЛАЙДЕР --------------->
<div id="slider">
    <?php
    $sql = "SELECT * FROM `slides` ORDER BY RAND()";
    $res = $GLOBALS['dbh']->query($sql);
    $slides = $res->fetchAll(2);

    foreach($slides as $slide) :
    ?>
    <div class="slide" style="background-image: url('/assets/images/slider/<?= $slide['img'] ?>')"></div>
    <?php
    endforeach;
    ?>
    </div>
<!--------------- /СЛАЙДЕР -------------->