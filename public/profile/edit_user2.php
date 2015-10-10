<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/db_connection.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php
    // Redirect if not logged in
    if(!isset($_SESSION["User"])){
        redirect_to("login.php");
    // Redirect if not proper GET
    }elseif(!isset($_GET["ID"])){
        redirect_to("profile.php");
    }
?>
<?php
    // Process user editing form
    if(isset($_POST["submit"])){
        $ID = $_GET["ID"];
        $Password    = mysql_prep($_POST["Password"]);
        $PassConfirm = mysql_prep($_POST["PassConfirm"]);
        if($Password != $PassConfirm){
            $_SESSION["failMsg"] = "Новый пароль и пароль потверждении не совпадали.";
            redirect_to("profile.php?account");
        }else{
            $hashed_password = password_encrypt($Password);
            
            $query  = "UPDATE user SET ";
            $query .= "Password = '{$hashed_password}' ";
            $query .= "WHERE ID = {$ID}";
            $result = mysqli_query($connection, $query);
            
            if($result && mysqli_affected_rows($connection) == 1){
                $_SESSION["succMsg"] = "Изменении успешно сохранены.";
                redirect_to("profile.php?basic");
            }else{
                $_SESSION["failMsg"] = "Ошибка изменении.";
                redirect_to("profile.php");       
            }
        }
    }
?>
<?php include("../../includes/layouts/header.php"); ?>
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
                        <table class="profileTable">
                            <form action="edit_user2.php?ID=<?php echo $_GET["ID"]; ?>" method="POST">
                                <tr>
                                    <td>ИД:</td>
                                    <td><input type="text" name="ID" value="<?php echo $_GET["ID"]; ?>" disabled><abbr title="ИД не может быть изменен.">?</abbr></td>
                                </tr>
                                <tr>
                                    <td>Логин:</td>
                                    <td><input type="text" name="Login" value="<?php echo $_GET["Login"]; ?>"disabled><abbr title="Логин не может быть изменен.">?</abbr></td>
                                </tr>
                                <tr>
                                    <td>Новый пароль:</td>
                                    <td><input type="password" name="Password" value="<?php echo $_GET["Password"]; ?>"></td>
                                    <td>Повторите:</td>
                                    <td><input type="password" name="PassConfirm" value="<?php echo $_GET["Password"]; ?>"></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" name="submit" value="Сохранить"></td>
                                </tr>

                            </form>
                                    <td><a href="profile.php?basic">Отмена</a></td>
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

