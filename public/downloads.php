<?php include("../includes/session.php"); ?>
<?php require("../includes/db_connection.php"); ?>
<?php require("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>

<div class="container" id="content"><!--content container start-->
	<div class="row"><!--content row start-->
    	<h1>Бесплатные загрузки</h1>
    		<div class="col-xs-12 col-lg-6">
        <p>На данный момент нет файлов для загрузки</p>
   		</div>
    </div>
    <?php commentsDisplay() ?>
    <?php commentBlock(); ?>
</div><!--content row end-->

<?php include("../includes/layouts/footer.php"); ?>
