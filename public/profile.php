<?php include("../includes/session.php"); ?>
<?php
    if(!isset($_SESSION["User"])){
        redirect_to("login.php");
    }
?>
<?php require("../includes/db_connection.php"); ?>
<?php include("../includes/layouts/header.php"); ?>
<?php include("../includes/comment_functions.php"); ?>

<div class="container" id="profileContainer">
    <div class="row">
        <h1>Профиль</h1>
        <div class="col-xs-12 col-lg-3" id="profileNavigation">
            <h3 class="center">Навигация</h3>
            <ul>
                <li><a href="profile.php?basic">Основные</a></li>
                <li><a href="profile.php?account">Аккаунт</a></li>
                <hr>
                <li><a href="profile.php">Интересы</a></li>
                <li><a href="profile.php?posts">Мои Посты</a></li>
                <hr>
                <div class="avatar">
                 
                </div>
            </ul>
        </div>       
        <div class="col-xs-12 col-lg-9" id="profilePage">
            <h3 class="center">Информация</h3>
            <?php succMsg(); failMsg(); ?>                            
            <table class="profileTable">
            <?php
                $login = $_SESSION["User"];

                $query = "SELECT * FROM user WHERE Login = '{$login}'";
                $user_set = mysqli_query($connection, $query);
                                
                if(isset($_GET["basic"])) {
                    while($user = mysqli_fetch_assoc($user_set)) {                  
                        echo "<tr><td> Имя: </td><td>" . $user["FirstName"] . "<td/></tr>";
                        echo "<tr><td> Фамилия: </td><td>" . $user["LastName"] . "<td/></tr>";
                        echo "<tr><td> Дата рождение: </td><td>" . $user["DOB"] . "<td/></tr>";
                        echo "<tr><td> Пол: </td><td>" . $user["Gender"] . "<td/></tr>";
                        echo "<tr><td> Дата: регистрация </td><td>" . $user["RegDate"] . "<td/></tr>";
                        echo "<tr><td> <td/></tr>";
                        echo "<tr><td><a href=\"edit_user.php?ID=".$user["ID"]."&FirstName=".$user["FirstName"]."&LastName=".$user["LastName"]."&DOB=".$user["DOB"]."\">Редартировать"."</a><td/></tr>";

                    }
                }elseif(isset($_GET["account"])) {
                    while($user = mysqli_fetch_assoc($user_set)) {                  
                        echo "<tr><td> Мой ID: </td><td>" . $user["ID"] . "<td/></tr>";
                        echo "<tr><td> Логин: </td><td>" . $user["Login"] . "<td/></tr>";
                        echo "<tr><td> Пароль: </td><td>" . $user["Password"] . "<td/></tr>";
                        echo "<tr><td> <td/></tr>";
                        echo "<tr><td><a href=\"edit_user2.php?ID=".$user["ID"]."&Login=".$user["Login"]."&Password=".$user["Password"]."\">Редартировать"."</a><td/></tr>";
                    }
                }elseif(isset($_GET["posts"])){
                    $query = "SELECT * FROM blog_page WHERE CreatedBy = '{$_SESSION["User"]}'";
                    $myposts = mysqli_query($connection, $query);
                    while($post = mysqli_fetch_assoc($myposts)) {                  
                        echo "<tr><td><i> ID: </i></td><td>" . $post["ID"] . "<td/></tr>";
                        echo "<tr><td><i> Пост: </i></td><td>" . $post["Content"] . "<td/></tr>";
                        echo "<tr><td><i> Тема: </i></td><td>" . $post["Subject"] . "<td/></tr>";
                        echo "<tr><td><i> Дата: </i></td><td>" . $post["CreatedDate"] . "<td/></tr>";
                        echo "<tr> <td><hr></td><td><hr></td></tr>";
                    }                    
                }else{
                    echo "<h5>Выберите из меню</h5>";
                }
                mysqli_free_result($user_set);

            ?>
            </table>          
        </div>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>