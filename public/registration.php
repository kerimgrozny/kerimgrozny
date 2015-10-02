<?php include("../includes/session.php"); ?>
<?php require("../includes/db_connection.php"); ?>
<?php require("../includes/functions.php"); ?>
<?php
    if (isset($_POST['submit'])) {
        $login     = mysql_prep($_POST['login']);
        $password  = mysql_prep($_POST['password']);
        $email     = mysql_prep($_POST['email']);
        $firstName = mysql_prep($_POST['firstName']);
        $lastName  = mysql_prep($_POST['lastName']); 
        $DOB       = $_POST['DOB'];       
        $gender    = $_POST['gender'];
        $telephone = $_POST['telephone'];

        $query  = "INSERT INTO user (Login, Password, Email, FirstName, LastName, DOB, Gender, Telephone) ";
        $query .= "VALUES ('{$login}', '{$password}', '{$email}', '{$firstName}', '{$lastName}', '{$DOB}', '{$gender}', '{$telephone}')";
        $result = mysqli_query($connection, $query);
        // checks if login is availble
        $loginCheck = "SELECT * FROM user WHERE Login = '{$login}'";

        if ($result) {
            $_SESSION["succMsg"] = "Регистрация прошла успешно, войдите ипользуя логин и пароль веденные вами.";
            redirect_to("login.php");            
        } elseif ($loginCheck) {
            $_SESSION["failMsg"] = "Такой логин уже зарегистрирован, выберите другой.";
            redirect_to("registration.php");
        } else {
            $_SESSION["failMsg"] = "Ошибка регистрации, ведите снова или повторите позже.";
        }
    }
?>
<?php include("../includes/layouts/header.php"); ?>

<div class="container" id="content"><!--content container start-->
    <div class="row"><!--content row start-->
        <h2 class="center">Регистрация бесплатная</h2>
        <div class="col-xs-0 col-lg-4"> </div>
        <div class="col-xs-12 col-lg-4" style="background-color:#FFE0D1">
            <?php failMsg() ?>
            <form class="form-group" action="registration.php" method="POST" role="form" id="registerForm">
                <!-- Login field -->
                <div class="form-inline">
                    <label class="control-label col-sm-2">Логин:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="login" placeholder="Ведите логин" required>
                    </div>
                </div>
                <!-- Password field -->
                <div class="form-inline">
                    <label class="control-label col-sm-2">Пароль:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" placeholder="Ведите пароль" required>
                    </div>
                </div>
                <!-- Email field -->
                <div class="form-inline">
                    <label class="control-label col-sm-2">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" placeholder="Ведите email" required><hr/>
                    </div>
                </div>
                <!-- FirstName field -->
                <div class="form-inline">
                    <label class="control-label col-sm-2">Имя:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="firstName" placeholder="Ведите имя">
                    </div>
                </div>
                <!-- LastName field -->
                <div class="form-inline">
                    <label class="control-label col-sm-2">Фамилия:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="lastName" placeholder="Ведите фамилию">
                    </div>
                </div>
                <!-- DOB field -->
                <div class="form-inline">
                    <label class="control-label col-sm-2">Год рождение:</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="DOB"><hr/>
                    </div>
                </div>
                <!-- Gender field -->                
                <label class="control-label">Пол</label>
                <div class="radio">
                  <label>
                    <input required type="radio" name="gender" value="муж">
                    Муж
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input required type="radio" name="gender" value="жен" checked>
                    Жен
                  </label>
                </div><hr>
                <!-- Telephone field -->
                <div class="form-inline">
                    <label class="control-label col-sm-4">Телефон:</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" name="telephone" placeholder="Номер телефона">
                    </div>
                </div>
                <!-- Submit field -->
                <div class="form-inline">
                    <div class="col-sm-12">
                        <input type="submit" class="form-control" name="submit" value="Потвердить"><hr>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-xs-0 col-lg-4">
        </div>
    </div>
    <div class="row"><!--content row start-->
        <div class="col-xs-12 col-lg-6">
            <hr> 
        </div>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
