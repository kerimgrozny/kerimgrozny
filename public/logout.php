<?php include("../includes/session.php"); ?>
<?php require("../includes/db_connection.php"); ?>
<?php include("../includes/layouts/header.php"); ?>

<?php
	session_unset();
	header('Location:index.php');
?>

<?php include("../includes/layouts/footer.php"); ?>
