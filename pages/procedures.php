<?php
head();
?>

<img src="/assets/images/flower.png" alt="" class="flower-left">

    <!--------------- ПРОЦЕДУРЫ --------------->
    <div id="procedure">
        <?php
        $sql = "SELECT * FROM `procedures_categorys` ORDER BY `id`";
        $res = $dbh->query($sql);
        $categorys = $res->fetchAll(2);
        foreach ($categorys as $category) :
            ?>
            <div class="drop-list">
                <div class="title spoiler"><?= $category['name'] ?></div>
                <div class="table spoiler">
                    <table>
                        <?php
                        $sql = "SELECT * FROM `procedures` WHERE `procedures_categorys_id` = $category[id]";
                        $res = $dbh->query($sql);
                        $procedures = $res->fetchAll(2);
                        foreach ($procedures as $procedure) :
                            ?>
                            <div>
                                <a href="/procedure/<?= $procedure['id'] ?>"><?= $procedure['name'] ?></a>
                            </div>
                        <?php
                        endforeach;
                        ?>
                    </table>
                </div>
            </div>
        <?php
        endforeach;
        ?>

    </div>
    <!--------------- /ПРОЦЕДУРЫ -------------->

<script>
    $(document).ready(function () {
        // Спойлер
        $('.table.spoiler').hide();

        var prevEl = null;

        $('.title.spoiler').click(function() {
            $(this).toggleClass("folded").next().slideToggle();
            if (this != prevEl) {
                $(prevEl).toggleClass("folded").next().slideToggle();
                prevEl = this;
            } else {
                prevEl = null;
            }
        })
    });
</script>

<?php
footer();
?>