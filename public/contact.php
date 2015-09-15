<?php include("../includes/session.php"); ?>
<?php require("../includes/db_connection.php"); ?>
<?php require("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>

<div class="container" id="contactContent"><!--content container start-->
    <div class="row"><!--content row start-->
        <h1>Свяжитесь</h1>
        <?php
			if(!isset($_SESSION["User"])){
				echo "Чтобы оправить сообшение, вы должны быть в системе.";
			}
		?>
        <div class="col-xs-12 col-lg-6"><hr>
            <form class="form-horizontal" role="form" method="post" action="index.php">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Имя</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="name" name="name" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" id="email" name="email" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="message" class="col-sm-2 control-label">Сообщение</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" rows="4" name="message"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="human" name="human" >
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <input id="submit" name="submit" type="submit" value="Отправить" class="btn btn-primary">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <! Will be used to display an alert to the user>
                    </div>
                </div>
            </form><hr>
        </div>

		<div class="col-xs-12 col-lg-6">
            <a href="https://www.facebook.com/kerim.timirbulatov"><img src="images/icons/fb.png"></a> &nbsp &nbsp &nbsp
            <a href="facebook.ru"><img src="images/icons/odnoklassniki.png"></a> &nbsp &nbsp &nbsp
            <a href="facebook.ru"><img src="images/icons/youtube.png"></a> &nbsp &nbsp &nbsp
            <a href="facebook.ru"><img src="images/icons/google+.png"></a>
		</div>
    </div>
	
    <?php commentsDisplay() ?>
	<?php commentBlock(); ?> 
</div>
<?php include("../includes/layouts/footer.php"); ?>
