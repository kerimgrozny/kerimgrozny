<?php include("../includes/session.php"); ?>
<?php require("../includes/db_connection.php"); ?>
<?php include("../includes/layouts/header.php"); ?>

<div class="container" id="loginContent"><!--content container start-->
    <div class="row"><!--content row start-->
        <h1 class="text-primary">Логин</h1>
        <div class="col-xs-12 col-lg-6">
            <h3>Войдите в систему.</h3>
            	<?php if(isset($_SESSION["Msg"])){
					showMsg();
				}?>
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
                        <p id="register_note">Еще не зарегистрированы? <a href="registration.php">Регистрация</a> бесплатная</p>
                </div>
            </form>
            <?php
                if(isset($_POST["submit"])) {
                    $Login = mysqli_real_escape_string($connection, $_POST["Login"]);
                    $Password = mysqli_real_escape_string($connection, $_POST["Password"]);

                    $query  = "SELECT * FROM user ";
                    $query .= "WHERE Login = '{$Login}' ";
                    $query .= "AND Password = '{$Password}' ";
                    $LoginCheck = mysqli_query($connection, $query);

                    if(mysqli_affected_rows($connection) > 0){
                        $_SESSION["User"] = $Login;
                        header('Location:index.php');
                    }else{
                        $_SESSION["Msg"] = "<span class=\"text-danger\">Ошибка: неверный логин или пароль.</span>";
						showMsg();
                    }
                }
            ?>
        </div>

        <div class="col-xs-12 col-lg-6">
            <h3>Когда в системе вы сможете:</h3>
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
