<?php include("../includes/session.php"); ?>
<?php require("../includes/db_connection.php"); ?>
<?php include("../includes/layouts/header.php"); ?>

<?php loginNeeded(); ?>
<div class="container" id="profileContainer">
    <div class="row">
        <h1>Профиль</h1>
        
        <div class="col-xs-12 col-lg-3" id="profileNav">
        	<h3>Навигация</h3>
            	<div id="avatar">
                	<img class="img-responsive" src="">
                </div>
        </div>
        
        <div class="col-xs-12 col-lg-9" id="profilePage">
        	<h3>Данные профиля</h3>
        	<table id="profileTable" class="table-hover">
			<?php
				$login = $_SESSION["User"];
            	$query = "SELECT * FROM user WHERE Login = '{$login}'";
				$result = mysqli_query($connection, $query);
				
				while($user = mysqli_fetch_assoc($result)) {
					echo "<tr><td> ИД </td><td>" . $user["ID"] . "<td/></tr>";
					echo "<tr><td> Логин </td><td>" . $user["Login"] . "<td/></tr>";
					echo "<tr><td> Пароль </td><td>" . $user["Password"] . "<td/></tr>";
					echo "<tr><td> Имя </td><td>" . $user["FirstName"] . "<td/></tr>";
					echo "<tr><td> Фамилия </td><td>" . $user["LastName"] . "<td/></tr>";
					echo "<tr><td> Дата рождение </td><td>" . $user["DOB"] . "<td/></tr>";
					echo "<tr><td> Пол </td><td>" . $user["Gender"] . "<td/></tr>";
					echo "<tr><td> Дата регистрация </td><td>" . $user["RegDate"] . "<td/></tr>";
				}
            ?>
            </table>  	
       
   		 </div>
	</div>
    <div class="row" id="profileSecondRow">
    	<div class="col-xs-12 col-lg-12">
        	<a href="index.php">Главное меню</a>
        </div>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>