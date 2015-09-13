<?php include("../includes/session.php"); ?>
<?php require("../includes/db_connection.php"); ?>
<?php include("../includes/layouts/header.php"); ?>

<div class="container" id="content"><!--content container start-->
    <div class="row"><!--content row start-->

        <h1 class="text-primary">Видеомонтаж</h1>
        <div class="col-xs-12">
            <p>Монтажеры владеют знаниями о крупностях и режиссерской оси, о правилах монтажа по фазе, темпу и направлению движения, по центру внимания, по цвету и свету. Проходят тестирование на наличие таких необходимых качеств, как чувство темпа и ритма, хороший вкус, понимание композиции кадра и внимание к деталям, способность к кропотливому труду и обладание творческим мышлением.</p>
        </div>

        <div class="col-xs-12 col-lg-6">
            <img class="img-responsive img-right" src="images/serviceImages/videoediting.jpg">
        </div>
        <div class="col-xs-12 col-lg-6">
            <a href="order.php"><button type="button" class="btn btn-info">Перейти к заказу</button></a><hr>
        </div>

    </div>
    <?php commentsDisplay() ?>
    <?php commentBlock(); ?>
</div>
<?php include("../includes/layouts/footer.php"); ?>
