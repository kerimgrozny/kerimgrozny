<?php include("../includes/session.php"); ?>
<?php require("../includes/db_connection.php"); ?>
<?php include("../includes/functions.php"); ?>
<?php
    if (!isset($_SESSION["User"])) { 
        $_SESSION["failMsg"] = "Вы еще не в системе, <a href=\"login.php\">войдите</a>"; 
    }
    if (isset($_POST["submit"])) {
        $company  = mysql_prep($_POST["company"]);
        $category = $_POST["category"];
        $layout   = $_POST["layout"];
        $navbar   = $_POST["navbar"];
        $details  = mysql_prep($_POST["details"]);
        $user     = $_SESSION["User"];

        $query  = "INSERT INTO order (Company, Category, Layout, Navbar, Details, User) "; 
        $query .= "VALUES ('{$company}', '{$category}', '{$layout}', '{$navbar}', '{$details}', '{$user}')";
        $result = mysqli_query($connection, $query);

        if ($result && mysqli_affected_rows($connection) == 1) {
            $_SESSION["succMsg"] = "Спасибо {$_SESSION["User"]}. Ваши данные успешно были отправлены.";
            redirect_to("zakazat_sayt.php");
        } else {
            $_SESSION["failMsg"] = "Ошибка при отправке.";
            
        }
    }
?>
<?php include("../includes/layouts/header.php"); ?>
<?php include("../includes/comment_functions.php"); ?>
<div class="container" id="content"><!--content container start-->
    <div class="row">
        <h1 class="center">Оформите свой заказ</h1>
        <?php succMsg(); failMsg(); ?>
        <div class="col-xs-12 col-md-6">
            <!-- webdesign order form -->
            <p>Заполнение некоторых данных помогает мне более детально определить ваши задачи
            Опишите как можно подробнее, все описать необъязательно, можно будет уточнить в любое время</p>
            <hr/>
            <form action="zakazat.php" class="form-horizontal" method="POST" id="designOrderForm">
                <!-- Тип сайта -->
                <div class="form-group">
                    <label class="col-sm-2 control-label">Название компании</label>
                    <div class="col-sm-10">
                        <input required type="text" name="company" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Тип сайта</label>
                    <div class="col-sm-10">
                        <select name="category" type="text" class="form-control">
                            <option class="form-control" value="Информационный портал">Информационный портал</option>
                            <option class="form-control" value="Сайт-визитка">Сайт-визитка</option>
                            <option class="form-control" value="Сайт-портфолио">Сайт-портфолио</option>
                            <option class="form-control" value="Интернет-магазин">Интернет-магазин</option>
                        </select>
                    </div>
                </div>
                <!-- Цена сайта -->
                <div class="form-group">
                    <label class="col-sm-2 control-label">Макет</label>
                    <div class="col-sm-10">
                        <select type="text" name="layout" class="form-control">
                            <option class="form-control" value="На весь экран">На весь экран</option>
                            <option class="form-control" value="Компактый">Компактный</option>
                        </select>
                    </div>
                </div>
                <!-- Навигация -->
                <label class="control-label">Навигация</label>
                <!-- Vertical -->
                <div class="radio">
                  <label>
                    <input required type="radio" name="navbar" value="Вертикальная">
                    Вертикальная
                  </label>
                </div>
                <!-- Horizontal -->
                <div class="radio">
                  <label>
                    <input required type="radio" name="navbar" value="Горизонтальная">
                    Горизонтальная
                  </label>
                </div>
                <!-- Details -->
                <div class="form-group">
                    <label class="col-sm-2 control-label">Название компании</label>
                    <div class="col-sm-10">
                        <textarea rows="5" name="details" class="form-control">Подробнее</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="submit" class="btn btn-default">Потвердить</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-xs-12 col-md-6">
            <img class="img-responsive" src="images/serviceImages/websiteorder.jpg">
        </div>
        <div class="col-xs-6 col-md-3">
            <span>Вертиальная</span>
            <img class="img-responsive" src="images/ver.png">
        </div>
        <div class="col-xs-6 col-md-3">
            <span>Горизонтальная</span>
            <img class="img-responsive" src="images/hor.png">
        </div>
    </div><hr>
    <script type="text/javascript" src="js/generic.js"></script>
    <?php commentsDisplay() ?>
    <?php commentBlock(); ?>
</div>
<?php include("../includes/layouts/footer.php"); ?>