<?php include("../includes/session.php"); ?>
<?php require("../includes/db_connection.php"); ?>
<?php require("../includes/functions.php"); ?>
<?php
    if(isset($_POST["submit"])) {
        $Login = mysql_prep($_POST["Login"]);
        $Password = mysql_prep($_POST["Password"]);

        $query  = "SELECT * FROM user ";
        $query .= "WHERE Login = '{$Login}' ";
        $query .= "AND Password = '{$Password}' ";
        $loginCheck = mysqli_query($connection, $query);

        if($loginCheck && mysqli_affected_rows($connection) == 1){
            $_SESSION["User"] = $Login;
            redirect_to("index.php");
        }else{
            $_SESSION["failMsg"] = "Ошибка: неверный логин или пароль.";
        }
    }
?>
<?php include("../includes/layouts/header.php"); ?>

<div class="container" id="loginContent"><!--content container start-->
    <div class="row"><!--content row start-->
        <h1 class="center">Логин</h1>
        <div class="col-xs-12 col-lg-6">
            <h3 class="center">Войдите в систему.</h3>
            <?php 
                succMsg();
            ?>
            <form class="form-group" action="login.php" method="POST" role="form">
                <div class="form-inline">
                    <label class="control-label col-sm-2">Логин:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="Login" placeholder="Ведите логин">
                    </div>
                </div>
                <div class="form-inline">
                    <label class="control-label col-sm-2">Пароль:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="Password" placeholder="Ведите пароль">
                    </div>
                </div>
                <div class="form-inline">
                    <div class="col-sm-12">
                        <input type="submit" class="form-control" name="submit" value="Войти"><hr/>
                    </div>
                </div>
            </form>
            <p>Еще не зарегистрированы? <a href="registration.php">Регистрация</a> бесплатная</p>
            <?php 
                failMsg();
            ?>
        </div>

        <div class="col-xs-12 col-lg-6">
            <h3 class="center">Когда в системе вы сможете:</h3>
            <ul class="contentList">
                <li>Коментировать в страницах</li>
                <li>Найти пользователей</li>
                <li>Общаться с другими</li>
                <li>Заказывать услуги</li>
                <li>Создать посты, и многое др</li>
            </ul>
        </div>
        
        <div class="col-xs-12 col-lg-12"><hr>
            <h3 class="center">Сайт номер 1 по программирование в Грозном и в Чечне</h3>
            <img class="img-responsive" src="images/serviceImages/groznylogin.jpg"> <hr>
        </div>

    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
