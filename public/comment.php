<?php include("../includes/session.php"); ?>
<?php require("../includes/db_connection.php"); ?>
<?php include("../includes/functions.php"); ?>

<?php		
	if(isset($_POST["submit"])) {
		if(!isset($_SESSION["User"])) {
			redirect_to("login.php");			
		}elseif(isset($_SESSION["User"])){
			$Name = prep_string($_POST["Name"]);
			$Comment = prep_string($_POST["Comment"]);
			$User = prep_string($_SESSION["User"]);
			
			$query  = "INSERT INTO comment (";
			$query .= "Name, Comment, User) VALUES ";
			$query .= "('$Name', '$Comment', '$User')";
			
			$result = mysqli_query($connection, $query);
			
			if($result && mysqli_affected_rows($connection) == 1){
				redirect_to("index.php");
			}
		}
	}else{
		redirect_to("index.php");
	}
?>