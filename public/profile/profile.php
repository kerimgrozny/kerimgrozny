<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/db_connection.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php include("../../includes/layouts/header.php"); ?>
<?php
    if(!isset($_SESSION["User"])){
        redirect_to("login.php");
    }
?>
<title>Чеченские Програмисты</title>
<meta name="description" content="KerimGrozny - Форум чеченских программистов - здесь вы найдете программистов и всю информацию о програмирование">
    <div id="wrapper">
        <div id="sidebar-wrapper"><!-- Sidebar -->
            <ul class="sidebar-nav">
            <h3 class="center">Навигация</h3>
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
                    <div class="col-xs-12 col-lg-12">
                        <h3 class="center">Ваш Профиль</h3>
                        <p>Здесь вы сможете управлять вашим профилем. изменить данные которые вы ввели а также редактировать некоторые</p>
                        <table class="profileTable">
                        <?php
                            $login = $_SESSION["User"];

                            $query = "SELECT * FROM user WHERE Login = '{$login}'";
                            $user_set = mysqli_query($connection, $query);
                                            
                            if(isset($_GET["basic"])) {
                                while($user = mysqli_fetch_assoc($user_set)) {                  
                                    echo "<tr><td> Имя: </td><td>" . $user["FirstName"] . "</td></tr>";
                                    echo "<tr><td> Фамилия: </td><td>" . $user["LastName"] . "</td></tr>";
                                    echo "<tr><td> Дата рождение: </td><td>" . $user["DOB"] . "</td></tr>";
                                    echo "<tr><td> Пол: </td><td>" . $user["Gender"] . "</td></tr>";
                                    echo "<tr><td> Дата: регистрация </td><td>" . $user["RegDate"] . "</td></tr>";
                                    echo "<tr><td><a href=\"edit_user.php?ID=".$user["ID"]."&FirstName=".$user["FirstName"]."&LastName=".$user["LastName"]."&DOB=".$user["DOB"]."\">Редартировать"."</a><td/></tr>";

                                }
                            }elseif(isset($_GET["account"])) {
                                while($user = mysqli_fetch_assoc($user_set)) {                  
                                    echo "<tr><td> Мой ID: </td><td>" . $user["ID"] . "</td></tr>";
                                    echo "<tr><td> Логин: </td><td>" . $user["Login"] . "</td></tr>";
                                    echo "<tr><td> Пароль: </td><td>" . $user["Password"] . "</td></tr>";
                                    echo "<tr><td><a href=\"edit_user2.php?ID=".$user["ID"]."&Login=".$user["Login"]."&Password=".$user["Password"]."\">Редартировать"."</a><td/></tr>";
                                }
                            }elseif(isset($_GET["posts"])){
                                echo "<h3 class=\"center\">Ваши Посты</h3>";
                                echo "<p>Здесь вы сможете увидеть все посты которые вы сделали, в том числе приватные посты которые
                                вы указали (приватный) во время создания.</p><hr>";
                                $visible = 1;
                                $output = "<p id=\"forumPost\">";
                                $page_set = fetch_all_pages($visible);

                                while($post = mysqli_fetch_assoc($page_set)) {                  
                                    $output .= "{$post["Name"]} <br/>";
                                    $output .= "{$post["Content"]} <br/>"; 
                                    $output .= "от {$post["CreatedBy"]} в {$post["CreatedDate"]} <i>ид {$post["ID"]}</i><br/>";     
                                    $output .= "</p><p id=\"forumPost\">";
                                }
                                $output .= "</p>";
                                echo $output;
                            }else{
                                echo "<h5>Выберите из меню</h5>";
                            }
                            mysqli_free_result($user_set);

                        ?>
                        </table>
                    </div>
                </div><hr>
            </div><!-- /#page-content-wrapper -->
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Меню</a>
        </div><!-- /#wrapper -->              
        <script src="../js/jquery.js"></script><!-- jQuery -->     
        <script src="../js/bootstrap.min.js"></script><!-- Bootstrap Core JavaScript -->
        
        <!-- Menu Toggle Script -->
        <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        </script>
<?php include("../../includes/layouts/footer.php"); ?>

