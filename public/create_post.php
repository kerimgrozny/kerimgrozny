<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php
	if(!isset($_POST["submit"])){
		redirect_to("forum.php"); 
	}elseif(!isset($_SESSION["User"])) {
		$_SESSION["message"] = "Вы еще не в системе.";
		redirect_to("forum.php");
	}else{
	    $content = mysql_prep($_POST["content"]);
	    $user = $_SESSION["User"];
	    $subject = $_POST["subject"];

    	$query  = "INSERT INTO blog_page ";
    	$query .= "(Content, CreatedBy, Subject) ";	    
    	$query .= "VALUES ('{$content}', '{$user}', '{$subject}') ";
    	$result = mysqli_query($connection, $query);

    	if($result && mysqli_affected_rows($connection) == 1){
    		$_SESSION["succMsg"] = "Добавлен успешно.";
    		redirect_to("forum.php");
    	}
    }
?>