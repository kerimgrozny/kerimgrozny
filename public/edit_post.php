<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>

<?php
	echo $_GET["user"];
	echo $_GET["id"];
?>

<?php include("../includes/layouts/footer.php"); ?>