<?php include("../includes/session.php"); ?>
<?php require("../includes/db_connection.php"); ?>
<?php require("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>

<div class="container" id="downloadsContainer"><!--content container start-->
	<div class="row"><!--content row start-->
    	<h1 class="center">Бесплатные загрузки</h1>
    	<div class="col-xs-12 col-lg-6">
    		<ul>
        		<li><a href="downloads/80s Disco Drums.zip" title="Download EuroDisco Italo Disco Drums free">80s Disco Drums</a></li>
        	</ul>
        </div>
    </div>
    <?php commentsDisplay() ?>
    <?php commentBlock(); ?>
</div><!--content row end-->

<?php include("../includes/layouts/footer.php"); ?>
