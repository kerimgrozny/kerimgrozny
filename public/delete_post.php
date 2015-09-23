<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php
	if(isset($_GET["ID"], $_GET["User"], $_GET["Subject"])) {
		$query = "DELETE FROM blog_page WHERE ID = {$_GET["ID"]} AND CreatedBy = '{$_GET["User"]}' LIMIT 1";
		if(!isset($_SESSION["User"])){
        	$_SESSION["failMsg"] = "Вы еще не в системе, войдите чтобы удалить.";
			redirect_to("forum.php?subject=".$_GET["Subject"]);
		}elseif($_SESSION["User"] == $_GET["User"]){
			$result = mysqli_query($connection, $query);
			if($result){
				$_SESSION["succMsg"] = "Сообщение успешно удалено.";
				redirect_to("forum.php");			
			}
		}else{
			$_SESSION["failMsg"] = "Вы не можете удалять чужие посты.";
			redirect_to("forum.php?subject=".$_GET["Subject"]);
		} 
	}else{
		redirect_to("forum.php");
	}
?>
