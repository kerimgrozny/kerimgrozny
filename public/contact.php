<?php include("../includes/session.php"); ?>
<?php require("../includes/db_connection.php"); ?>
<?php require("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>

<div class="container" class="contactContainer"><!--start: contactContainer -->
    <div class="row">
        <h1 class="center">Свяжитесь</h1>
        <div class="col-xs-12 col-lg-6" style="background:#C2D1E0"><hr>
            <h3 class="center">Пришлите сообщение</h3>
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
                    <div class="col-sm-4 col-sm-offset-2">
                        <input id="submit" name="submit" type="submit" value="Отправить" class="btn btn-primary">
                    </div>
                </div>
            </form>
            <hr>
        </div>

		<div class="col-xs-12 col-lg-6"><hr>
            <a href="https://www.facebook.com/kerim.timirbulatov"><img src="images/icons/fb.png"></a> &nbsp &nbsp &nbsp
            <a href="facebook.ru"><img src="images/icons/odnoklassniki.png"></a> &nbsp &nbsp &nbsp
            <a href="facebook.ru"><img src="images/icons/youtube.png"></a> &nbsp &nbsp &nbsp
            <a href="facebook.ru"><img src="images/icons/google+.png"></a>
		</div>
    </div><hr>
	
    <?php commentsDisplay() ?>
	<?php commentBlock(); ?> 
</div>
<?php include("../includes/layouts/footer.php"); ?>
