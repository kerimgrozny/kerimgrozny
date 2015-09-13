<?php include("../includes/session.php"); ?>
<?php require("../includes/db_connection.php"); ?>
<?php require("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>

<div class="container" id="content"><!--content container start-->
    <div class="row"><!--content row start-->
        <h1>Изготовим логотип по заказу</h1>
        <div class="col-xs-12 col-lg-6">
        <p>Логотип или товарный знак является важным элементов в деятельности любой компании. Профессионально выполненный, качественный логотип повышает узнаваемость фирмы и ее продукции, а также может повлиять на успех всей ее деятельности.</p>
        <p>Мы предлагаем вам широкий спектр услуг:  от разработки логотипа компании и ее фирменного стиля, до дизайна любой полиграфии и рекламных материалов. Мы создаем оригинальные логотипы для любых предприятий и физических лиц.</p>
        </div>

        <div class="col-xs-12 col-lg-6">
            <img class="img-responsive" src="images/serviceImages/logoservice.png">
        </div>

        <h2>А также</h2>
        <p>У нас вы можете как  заказать разработку нового фирменного знака, так и купить готовый логотип по низким ценам. При необходимости мы можем доработать уже имеющейся у вас логотип, либо создать совершенно уникальный дизайн, соответствующий вашим пожеланиям.</p>

        <div class="col-xs-12 col-lg-4">
            <h1 class="text-info">Профессионально</h1>
            <p>Наша специализация — фирменные стили, которые выводят проекты на новый уровень. Среди наших клиентов есть банки, it-стартапы, строительные компании. Ведущие дизайнеры Логомашины занимаются дизайном больше восьми лет. Мы подготовим для вас файлы во всех необходимых форматах и депонируем их, чтобы защитить вас от плагиаторов.</p>
        </div>
        <div class="col-xs-12 col-lg-4">
            <h1 class="text-info">Выгодно</h1>
            <p>Мы не подбиваем стоимость под ваш бюджет и не делаем лого «от 20 000» — наши цены фиксированные и одинаковые для всех. Благодаря клиентам и предоплате, мы держим цены на уровне фрилансеров и дизайнерских конкурсов. Мы подходим к проектам ответственно и профессионально — не пропадаем и не делаем проекты за час до дедлайна.</p>
        </div>
        <div class="col-xs-12 col-lg-4">
            <h1 class="text-info">Удобно</h1>
            <p>Ваш проект будет ведем клиентским менеджером. с клиентами мы общаемся по телефону, почте или скайпу. Оплатить заказ можно карточкой или любыми электронными деньгами или через расчетный счёт. Чтобы начать работу, получите доступ к брифу или выберите тариф.</p>
        </div><hr>
        <div class="col-xs-12 col-lg-12">
            <a href="order.php"><button type="button" class="btn btn-info">Перейти к заказу</button></a>
        </div>
    </div>
    <hr>
    <?php commentsDisplay() ?>
    <?php commentBlock(); ?>
</div>
<?php include("../includes/layouts/footer.php"); ?>
