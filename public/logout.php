<?php 
include("../includes/session.php");
include("../includes/functions.php"); 
	session_unset();
	session_destroy();
	redirect_to("login.php");
?>