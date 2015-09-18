<?php include("../includes/session.php"); ?>
<?php require("../includes/db_connection.php"); ?>
<?php include("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>

<div class="container" id="content"><!--content container start-->
    <div class="row">
        <hr>
        <h1 class="center">Видеомонтаж</h1>
        <div class="col-xs-12 col-lg-6">
            <p>Монтажеры владеют знаниями о крупностях и режиссерской оси, о правилах монтажа по фазе, темпу и направлению движения, 
            по центру внимания, по цвету и свету.</p>
            <p>Проходят тестирование на наличие таких необходимых качеств, как чувство темпа и ритма, 
            хороший вкус, понимание композиции кадра и внимание к деталям, способность к кропотливому труду и обладание творческим мышлением.</p>
        </div>
        <div class="col-xs-12 col-lg-6">
            <img class="img-responsive img-right" src="images/serviceImages/videoediting.jpg">
        </div>
    </div>
    <div class="row">
        <h2 class="center">Качество</h2>  
        <div class="col-xs-12 col-lg-6">
        <p>Наши монтажеры успешно работает с 2013 года и была создана, в первую очередь, для комфортной многочасовой работы совместно с монтажером. 
        Мы выполняем продакшн полного цикла для производства рекламы, видеоклипов, кино и т.д. и имеет соответствующую команду профессионалов.</p>
            <a href="order.php"><button type="button" class="btn btn-info">Перейти к заказу</button></a><hr>
        </div>
    </div>
    <?php commentsDisplay() ?>
    <?php commentBlock(); ?>
</div>
<?php include("../includes/layouts/footer.php"); ?>
