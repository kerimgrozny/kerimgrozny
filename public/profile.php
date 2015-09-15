<?php include("../includes/session.php"); ?>
<?php
    if(!isset($_SESSION["User"])){
        redirect_to("login.php");
    }
?>
<?php require("../includes/db_connection.php"); ?>
<?php include("../includes/layouts/header.php"); ?>

<div class="container" id="profileContainer">
    <div class="row">
        <h1>Профиль</h1>  

        <div class="col-xs-12 col-lg-3" id="profileNavigation">
        	<h3>Навигация</h3>
            <ul>
                <li><a href="profile.php">Имя Фамилия Очество</a></li>
                <li><a href="profile.php">Возраст</a></li>
                <li><a href="profile.php">Проживание</a></li>
                <li><a href="profile.php">Образование</a></li>
            </ul>
        </div>
        
        <div class="col-xs-12 col-lg-9" id="profilePage">
        	<h3>Информация</h3>

        	<table class="profileTable">
			<?php
				$login = $_SESSION["User"];

            	$query = "SELECT * FROM user WHERE Login = '{$login}'";
				$result = mysqli_query($connection, $query);
				
				while($user = mysqli_fetch_assoc($result)) {
					echo "<tr><td> Мой ID: </td><td>" . $user["ID"] . "<td/></tr>";
					echo "<tr><td> Логин: </td><td>" . $user["Login"] . "<td/></tr>";
					echo "<tr><td> Пароль: </td><td>" . $user["Password"] . "<td/></tr>";
					echo "<tr><td> Имя: </td><td>" . $user["FirstName"] . "<td/></tr>";
					echo "<tr><td> Фамилия: </td><td>" . $user["LastName"] . "<td/></tr>";
					echo "<tr><td> Дата рождение: </td><td>" . $user["DOB"] . "<td/></tr>";
					echo "<tr><td> Пол: </td><td>" . $user["Gender"] . "<td/></tr>";
					echo "<tr><td> Дата: регистрация </td><td>" . $user["RegDate"] . "<td/></tr>";
				}
            ?>
            </table>  	
       
   		 </div>
	</div>
</div>
<?php include("../includes/layouts/footer.php"); ?>