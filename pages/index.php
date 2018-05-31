<?php

head();

?>

<!--------------- ПРЕИМУЩЕСТВА --------------->
<div id="advantage">
    <div>
        <div class="lvl">1</div>
        <div class="info">
            <div class="title">10 лет</div>
            <div class="text">Большой опыт<br>накопленный годами</div>
        </div>
    </div>
    <div>
        <div class="lvl">2</div>
        <div class="info">
            <div class="title">Профессионализм</div>
            <div class="text">С Вами будут работать<br>сертифицированные<br>специалисты</div>
        </div>
    </div>
    <div>
        <div class="lvl">3</div>
        <div class="info">
            <div class="title">Вежливый персонал</div>
            <div class="text">Ценим у важаем каждого<br>клиента, который к нам<br>приходит</div>
        </div>
    </div>
    <div>
        <div class="lvl">4</div>
        <div class="info">
            <div class="title">Акции и бонусы</div>
            <div class="text">Всегда есть чем порадовать<br>клиентов</div>
        </div>
    </div>
</div>
<!--------------- /ПРЕИМУЩЕСТВА -------------->

<!--------------- НАШИ УСЛУГИ --------------->
<div id="services">
    <img src="assets/images/flower.png" alt="" class="flower-left">
    <div class="header-line">
        Наши процедуры
    </div>
    <div class="content">
        <?php
        $sql = "SELECT * FROM `procedures` ORDER BY RAND() LIMIT 7";
        $stmt = $dbh->query($sql);
        $procedures = $stmt->fetchAll(2);

        ?>
        <div class="menu">
            <div id="services-slider-nav">
                <div class="slide"></div>
                <div class="slide"></div>
                <div class="slide"></div>
                <div class="slide"></div>
                <div class="slide"></div>
                <div class="slide"></div>
                <div class="slide"></div>
            </div>
            <?php
            $i = 20;

            foreach($procedures as $procedure) :
            ?>
            <span><label for="slick-slide-control<?=$i++?>"><?= $procedure['name'] ?></label></span>
            <?php
            endforeach;
            ?>
        </div>
        <div class="slider">
            <div class="border">
                <div id="services-slider">
                    <?php
                    foreach($procedures as $procedure) :
                    ?>
                    <a class="slide" href="/procedure/<?= $procedure['id'] ?>" style="background-image: url('/assets/images/services/<?= $procedure['img'] ?>')"></a>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--------------- /НАШИ УСЛУГИ -------------->

<script>
    $(document).ready(function () {
        $('#slider').slick({
            dots: true,
            // autoplay: true,
            autoplaySpeed: 3000,
            arrows: false,
        });

        $('#services-slider').slick({
            dots: true,
            arrows: false,
            speed: 500,
            fade: true,
            cssEase: 'linear',
            asNavFor: '#services-slider-nav'
        });

        $('#services-slider-nav').slick({
            infinite: false,
            asNavFor: '#services-slider',
            dots: true,
            arrows: false,
        });
    });
</script>

<?php
footer();
?>