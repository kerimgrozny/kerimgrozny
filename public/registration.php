<?php require("../includes/db_connection.php"); ?>
<?php include("../includes/layouts/header.php"); ?>
<div class="container" id="content"><!--content container start-->
    <div class="row"><!--content row start-->
        <div class="col-xs-12">
            <h1>Регистрация</h1>
            <form class="form-group" action="registration.php" method="POST" role="form">

                <div class="form-inline">
                    <label class="control-label col-sm-2">Логин:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="Login" placeholder="Ведите логин" required>
                    </div>
                </div>
                <div class="form-inline">
                    <label class="control-label col-sm-2">Пароль:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="Password" placeholder="Ведите пароль" required>
                    </div>
                </div>
                <div class="form-inline">
                    <label class="control-label col-sm-2">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="Email" placeholder="Ведите email" required>
                    </div>
                </div>
                <div class="form-inline">
                    <label class="control-label col-sm-2">Имя:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="FirstName" placeholder="Ведите имя">
                    </div>
                </div>
                <div class="form-inline">
                    <label class="control-label col-sm-2">Фамилия:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="LastName" placeholder="Ведите фамилию">
                    </div>
                </div>
                <div class="form-inline">
                    <label class="control-label col-sm-2">Год рождение:</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="DOB">
                    </div>
                </div>
                <div class="form-inline">
                    <label class="control-label col-sm-2">Пол:</label>
                    <div class="col-sm-10">
                        Муж: <input type="radio" class="form-control" name="Gender" value="Муж">
                        Жен: <input type="radio" class="form-control" name="Gender" value="Жен">
                    </div>
                </div>
                <div class="form-inline">
                    <label class="control-label col-sm-2">Телефон:</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" name="Telephone" placeholder="Номер телефона">
                    </div>
                </div>
                <div class="form-inline">
                    <label class="control-label col-sm-2">Биография:</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" name="Bio" placeholder="Немного о себе..">
                    </div>
                </div>

                <div class="form-inline">
                    <div class="col-sm-12">
                        <input type="submit" class="form-control" name="submit" value="Потвердить">
                    </div>
                </div>
            </form>
            <?php
                if(isset($_POST['submit'])){
                    $Login     = $_POST['Login'];
                    $Password  = $_POST['Password'];
                    $Email     = $_POST['Email'];
                    $FirstName = $_POST['FirstName'];
                    $LastName  = $_POST['LastName'];
                    $DOB       = $_POST['DOB'];
                    $Gender    = $_POST['Gender'];
                    $Telephone = $_POST['Telephone'];
                    $Bio       = $_POST['Bio'];

                    $query  = "INSERT INTO user (Login, Password, Email, FirstName, LastName, DOB, Gender, Telephone, Bio) ";
                    $query .= "VALUES ('$Login', '$Password', '$Email', '$FirstName', '$LastName', '$DOB', '$Gender', $Telephone, '$Bio')";
                    $result = mysqli_query($connection, $query);

                    if(mysqli_affected_rows($connection) > 0){
                        echo "Успешно зарегистрирован";
                    }
                }
            ?>
        </div>
    </div><!--content row end-->
</div>
<?php include("../includes/layouts/footer.php"); ?>
