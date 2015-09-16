<?php include("../includes/session.php"); ?>
<?php require("../includes/db_connection.php"); ?>
<?php require("../includes/functions.php"); ?>
<?php
    if(isset($_POST["submit"])) {
        $Login = escape_string($_POST["Login"]);
        $Password = escape_string($_POST["Password"]);

        $query  = "SELECT * FROM user ";
        $query .= "WHERE Login = '{$Login}' ";
        $query .= "AND Password = '{$Password}' ";
        $loginCheck = mysqli_query($connection, $query);

        if($loginCheck && mysqli_affected_rows($connection) == 1){
            $_SESSION["User"] = $Login;
            redirect_to("index.php");
        }else{
            $_SESSION["message"] = "<span class=\"text-danger\">Ошибка: неверный логин или пароль.</span>";
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
                if(isset($_SESSION["message"])){
                    message();
                }
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
                        <input type="submit" class="form-control" name="submit" value="Войти">
                    </div>
                        <p>Еще не зарегистрированы? <a href="registration.php">Регистрация</a> бесплатная</p>
                </div>
            </form>
            <?php 
                if(isset($_SESSION["message"])){
                    message();
                    return; 
                }
            ?>
        </div>

        <div class="col-xs-12 col-lg-6">
            <h3 class="center">Когда в системе вы сможете:</h3>
            <ul>
                <li>Коментировать в страницах</li>
                <li>Найти пользователей</li>
                <li>Общаться с друзьями</li>
                <li>Заказывать услуги</li>
                <li>Общаться в блогах</li>
                <li>Создать посты, и многое др</li>
            </ul><hr>
        </div>

        <div class="col-xs-12 col-lg-12">
            <h3></h3>
            <img class="img-responsive" src="images/serviceImages/groznylogin.jpg"> <hr>
        </div>

    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
