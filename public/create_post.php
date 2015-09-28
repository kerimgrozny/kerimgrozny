<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php
	if(!isset($_POST["submit"])){
		redirect_to("forum.php"); 
	}elseif(!isset($_SESSION["User"])) {
		$_SESSION["failMsg"] = "Вы еще не в системе.";
		redirect_to("forum.php");
	}else{
        $name    = mysql_prep($_POST["name"]);
        $content = mysql_prep($_POST["content"]);
	    $user    = $_SESSION["User"];
	    $subject = $_POST["subject"];
        $visible = (int) $_POST["visible"];

    	$query  = "INSERT INTO blog_page ";
    	$query .= "(Name, Content, CreatedBy, Subject, Visible) ";	    
    	$query .= "VALUES ('{$name}', '{$content}', '{$user}', '{$subject}', {$visible}) ";
    	$result = mysqli_query($connection, $query);
    	//confirm_query($result);

    	if($result && mysqli_affected_rows($connection) == 1){
    		$_SESSION["succMsg"] = "Добавлен успешно.";
    		redirect_to("forum.php?subject=".$subject);    		
    	}else{
    		$_SESSION["failMsg"] = "Ошибка.";
    		redirect_to("forum.php?subject=".$subject);    		
    	}
    }
?>