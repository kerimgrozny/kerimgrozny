<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php
	if(!isset($_SESSION["User"])) {
		redirect_to("blog.php");
	}if(isset($_POST["submit"])){
	    $content = mysql_prep($_POST["content"]);
	    $user = $_SESSION["User"];
	    $subject = $_POST["subject"];

    	$query  = "INSERT INTO blog_page ";
    	$query .= "(Content, CreatedBy, Subject) ";	    
    	$query .= "VALUES ('{$content}', '{$user}', '{$subject}') ";
    	$result = mysqli_query($connection, $query);

    	if($result && mysqli_affected_rows($connection) == 1){
    		echo "Успешно добавлен. <br/>";
    		echo "<button><a href=\"blog.php\">Назад</a></button";
    	}
    }
?>