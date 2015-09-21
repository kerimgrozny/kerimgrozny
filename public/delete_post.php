<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php
	$ID = (int)$_GET["id"];
	$User = $_GET["user"];
	$query = "DELETE FROM blog_page WHERE ID = {$ID} AND CreatedBy = '{$User}' LIMIT 1";

	if(!isset($_SESSION["User"])){
		$_SESSION["message"] = "Вы еще не в системе";
		redirect_to("forum.php");
	}elseif($_SESSION["User"] == $User){
		$result = mysqli_query($connection, $query);
		if($result){
			$_SESSION["message"] = "Сообщение успешно удалено.";
			redirect_to("forum.php");			
		}
	}else{
		$_SESSION["message"] = "Вы не можете удалять чужие сообщении.";
		redirect_to("forum.php");		
	}
?>