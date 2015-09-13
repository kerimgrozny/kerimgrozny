<?php include("../includes/session.php"); ?>
<?php require("../includes/db_connection.php"); ?>
<?php include("../includes/layouts/header.php"); ?>

<?php
	session_unset();
	session_destroy();
	header('Location:login.php');
?>

<?php include("../includes/layouts/footer.php"); ?>
