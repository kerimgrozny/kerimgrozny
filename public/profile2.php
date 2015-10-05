<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>
<?php
    if(!isset($_SESSION["User"])){
        redirect_to("login.php");
    }
?>
<title>Чеченские Програмисты</title>
<meta name="description" content="KerimGrozny - Форум чеченских программистов - здесь вы найдете программистов и всю информацию о програмирование">
    <div id="wrapper">
        <div id="sidebar-wrapper"><!-- Sidebar -->
            <h3 class="center">Навигация</h3>
            <ul>
                <li><a href="profile.php?basic">Основные</a></li>
                <li><a href="profile.php?account">Аккаунт</a></li>
                <hr>
                <li><a href="profile.php">Интересы</a></li>
                <li><a href="profile.php?posts">Мои Посты</a></li>
                <hr>
            </ul>
        </div><!-- /#sidebar-wrapper -->       
        <div id="page-content-wrapper"><!-- Page Content -->
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Меню</a>
            <div class="container-fluid">
                <div class="row">
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
                        echo "<p>Здесь вы сможете увидеть все посты которые вы сделали, в том числе приватные посты которые
                        вы указали (приватный) во время создания.</p><hr>";
                        $visible = "private";
                        $posts = fetch_pages_for_subject($subject=null, $visible);
                        while($post = mysqli_fetch_assoc($posts)) {                  
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
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Меню</a>
        </div><!-- /#page-content-wrapper -->
    </div><!-- /#wrapper -->              
    <script src="js/jquery.js"></script><!-- jQuery -->     
    <script src="js/bootstrap.min.js"></script><!-- Bootstrap Core JavaScript -->
    
    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
<?php include("../includes/layouts/footer.php"); ?>

