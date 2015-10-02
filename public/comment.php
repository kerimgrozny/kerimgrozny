<?php include("../includes/session.php"); ?>
<?php require("../includes/db_connection.php"); ?>
<?php include("../includes/functions.php"); ?>
<?php
	if(isset($_POST["submit"])){
		if(!isset($_SESSION["User"])){
			redirect_to("login.php");
		}else{
			$name    = mysql_prep($_POST["Name"]);
			$comment = mysql_prep($_POST["Comment"]);
			$user    = $_SESSION["User"];

			$query  = "INSERT INTO comment (";
			$query .= "Name, Comment, User) VALUES ";
			$query .= "('{$name}', '{$comment}', '{$user}')";
			$result = mysqli_query($connection, $query);

			if($result && mysqli_affected_rows($connection) == 1){
				redirect_to("index.php");
			}
		}

	}else{
		redirect_to("index.php");
	}
?>