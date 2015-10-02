<?php include("../includes/session.php"); ?>
<?php require("../includes/db_connection.php"); ?>
<?php include("../includes/functions.php"); ?>

	if (!isset($_SESSION["User"])) { 
		redirect_to("login.php"); 
	}
	// if submit is set perform
	if (isset($_POST["submit"])) {
		$company  = mysql_prep($_POST["company"]);
		$category = $_POST["category"];
		$layout   = $_POST["layout"];
		$navbar   = $_POST["navbar"];
		$details  = mysql_prep($_POST["details"]);
		$user 	  = $_SESSION["User"];

		$query  = "INSERT INTO order (Company, Category, Layout, Navbar, Details, User) ";
		$query .= " VALUES ('{$company}', '{$category}', '{$layout}', '{$navbar}', '{$details}', '{$user}')";
		$result = mysqli_query($connection, $query);
		//confirm_query($result);

		if ($result && mysqli_affected_rows($connection) == 1) {
			$_SESSION["succMsg"] = "Спасибо {$_SESSION["User"]}. Ваши данные успешно были отправлены.";
			redirect_to("zakazat_sayt.php");
		}else{
			$_SESSION["failMsg"] = "Ошибка при отправке.";
			echo mysqli_error($connection);
		}
	}else{
		redirect_to("zakazat.php");
	}
?>