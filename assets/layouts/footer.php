<!--------------- КОНТАКТЫ --------------->
<div id="contacts">
    <img src="/assets/images/flower.png" alt="" class="flower-right">
    <div class="header-line">
        <span>Контакты</span>
    </div>
    <img src="/assets/images/phone.png" alt="" class="phone">
    <div class="title">Хотите записаться к специалисту или задать вопрос?</div>
    <form action="/admin/action?a=contacts" method="POST">
        <input type="text" class="user" title="Имя" placeholder="Имя" name="name" required>
        <input type="text" class="number" title="Телефон" placeholder="Номер телефона" name="call" required>
        <button class="btn">Записаться на приём</button>
    </form>
</div>
<!--------------- /КОНТАКТЫ -------------->

<!--------------- КАРТА --------------->
<div id="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2221.109713910948!2d40.448570416029945!3d56.17249625527212!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x414c7b6d8e72ee97%3A0x8455acf4c369bc34!2z0YPQuy4g0JrRg9C50LHRi9GI0LXQstCwLCA2NtCRLCDQktC70LDQtNC40LzQuNGALCDQktC70LDQtNC40LzQuNGA0YHQutCw0Y8g0L7QsdC7LiwgNjAwMDM1!5e0!3m2!1sru!2sru!4v1519737295951"
            width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<!--------------- /КАРТА -------------->

<!--------------- ПОДВАЛ --------------->
<footer>
    <div class="content">
        <div class="menu">
            <a href="/about">О нас</a>
            <a href="#contacts">Контакты</a>
        </div>
        <div>
            <a href="#contacts" class="btn">
                <div>
                    <img src="/assets/images/call_p.png" alt="" class="call_p">
                    <img src="/assets/images/call_w.png" alt="" class="call_w">
                </div>
                <span>Заказать звонок</span>
            </a>
        </div>
        <div class="copyright">
            <div>Copyright © 2015-2018</div>
            <div>г. Владимир, ул. Куйбышева, д. 66Б, 3 этаж, 5 каб.</div>
            <div>(с 9:00 до 19:00, суббота, воскресенье - выходной)</div>
        </div>
        <div class="numbers">
            <div>8 (800) 555-35-35</div>
        </div>
    </div>
</footer>
<!--------------- /ПОДВАЛ -------------->

<script>
    $(document).ready(function() {


        $("a").click(function() {
            $("html, body").animate({
                scrollTop: $($(this).attr("href")).offset().top + "px"
            }, {
                duration: 500,
                easing: "swing"
            });
            return false;
        });


    });
</script>

</body>
</html>