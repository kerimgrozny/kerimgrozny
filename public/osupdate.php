<?php include("../includes/session.php"); ?>
<?php require("../includes/db_connection.php"); ?>
<?php include("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>

<div class="container" id="content"><!--content container start-->
    <div class="row"><!--content row start-->
        <h1 class="center">Обновлении ОС</h1>
        <div class="col-xs-12">
            <p>Монтажеры владеют знаниями о крупностях и режиссерской оси, о правилах монтажа по фазе, темпу и направлению движения, по центру внимания, по цвету и свету. Проходят тестирование на наличие таких необходимых качеств, как чувство темпа и ритма, хороший вкус, понимание композиции кадра и внимание к деталям, способность к кропотливому труду и обладание творческим мышлением.</p>
        </div>
        <div class="col-xs-12 col-lg-6">
            <img class="img-responsive img-right" src="images/serviceImages/SoftwareUpdateB.jpg">
        </div>
        <div class="col-xs-12 col-lg-6">
            <ol>
                <li>Резервное копирование перед обновлением</li>
                <li>Безопасное форматирование вашего смартфона</li>
                <li>Подготовка файло для установки</li>
                <li>Процесс установки</li>
                <li>Завершение установки</li>
            </ol>
        </div>
    </div><hr>
    <div class="row"><!--content row start-->
        <div class="col-xs-12 col-lg-6">
            <ul>
                <li>Появление новых версий ПО, устраняющих программные недостатки;</li>
                <li>Неквалифицированные действия по замене прошивки, приведшие к поломке устройства;</li>
                <li>Сбои и зависания смартфона;</li>
                <li>Блокировка устройства.</li>
            </ul>
        </div>
        <div class="col-xs-12 col-lg-6">
            <img class="img-responsive img-right" src="images/serviceImages/android_update.jpg">
        </div>
    </div>
        <h2 class="center">Почему мы</h2>
    <div class="row"><!--content row start-->
        <div class="col-xs-12 col-lg-12">
            <p>Обновление прошивки в нашем центре гарантирует полную работоспособность вашего смартфона. Наши специалисты используют только специализированные программы рекомендованные производителями смартфонов, а так же самые последние версии программного обеспечения вашего устройства.</p>
        </div>
        <div class="col-xs-12 col-lg-6">
            <a href="order.php"><button type="button" class="btn btn-info">Перейти к заказу</button></a><hr>
        </div>
    </div>
    <?php commentsDisplay() ?>
    <?php commentBlock(); ?>
</div>
<?php include("../includes/layouts/footer.php"); ?>
