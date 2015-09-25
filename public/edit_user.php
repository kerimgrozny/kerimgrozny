<?php include("../includes/session.php"); ?>
<?php require("../includes/db_connection.php"); ?>
<?php require("../includes/functions.php"); ?>
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
        $FirstName = mysql_prep($_POST["FirstName"]);
        $LastName = mysql_prep($_POST["LastName"]);
        $DOB = $_POST["DOB"];

        $query  = "UPDATE user SET ";
        $query .= "FirstName = '{$FirstName}', ";
        $query .= "LastName = '{$LastName}', ";
        $query .= "DOB = '{$DOB}' ";
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
?>
<?php include("../includes/layouts/header.php"); ?>
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

        	<table class="profileTable">
			    <form action="edit_user.php?ID=<?php echo $_GET["ID"]; ?>" method="POST">
                    <tr>
                        <td>Имя:</td>
                        <td><input type="text" name="FirstName" value="<?php echo $_GET["FirstName"]; ?>"></td>
                    </tr>
                    <tr>
                        <td>Фамилия:</td>
                        <td><input type="text" name="LastName" value="<?php echo $_GET["LastName"]; ?>"></td>
                    </tr>
                    <tr>
                        <td>Дата рождение:</td>
                        <td><input type="date" name="DOB" value="<?php echo $_GET["DOB"]; ?>"></td>
                    <tr>
                        <td><input type="submit" name="submit" value="Сохранить"></td>
                    </tr>

                </form>
                        <td><a href="profile.php?basic">Отмена</a></td>
            </table>  	
       
   		 </div>
	</div>
</div>
<?php include("../includes/layouts/footer.php"); ?>