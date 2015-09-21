<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php
	$ID = $_GET["id"];
	$query = "DELETE FROM blog_page WHERE ID = {$ID} LIMIT 1";
	$result = mysqli_query($connection, $query);
	confirm_query($result);

	if(mysqli_affected_rows($connection) == 1){
		$_SESSION["message"] = "<p>Пост успешно удален</p>";
		redirect_to("forum.php");
	}
?>