<?php include("../includes/session.php"); ?>
<?php require("../includes/db_connection.php"); ?>
<?php include("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>
<?php include("../includes/comment_functions.php"); ?>
<title>Видеомонтаж в Грозном</title>
<meta name="description" content="KerimGrozny - Мы делам самый качественный видеомонтажо в Республике и принимем заказы а также съемки мы работаем совмество с агенствой ZolotayaNevesta.ru">
<div class="container" id="content"><!--content container start-->
    <div class="row">
        <hr>
        <h1 class="center">Фунциональность</h1>
        <div class="col-xs-12 col-lg-6">
            <p>Вы также сможете заказать у меня функциональность для своего проекта или сайта, которое вы хотели бы добавить или использовать в своем сайта.
            Вы получите оригинальную функциональность созданную ручную, не используя фреймфорков или шаблоной, которое будет работать эффективно на любом сайте поддерживающее PHP.</p>
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
