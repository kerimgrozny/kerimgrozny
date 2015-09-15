<?php include("../includes/session.php"); 
	session_unset();
	session_destroy();
	redirect_to("login.php");
?>