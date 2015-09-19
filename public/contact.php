<?php include("../includes/session.php"); ?>
<?php require("../includes/db_connection.php"); ?>
<?php require("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>

<div class="container" id="contactContainer"><!--start: contactContainer -->
    <div class="row" id="contactPage">
        <div class="col-xs-12 col-lg-8"><hr>
            <h3 style="margin: 25px">Свяжитесь с нами</h3>
            <p  style="margin: 25px">Мы здесь, чтобы ответить на любые вопросы, которые у вас могут возникнуть о нашем сайте или сервисе. 
            Обратитесь к нам, и мы ответим, как только сможем.</p>
            <form class="form-horizontal" role="form">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Имя:</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="email" placeholder="Ваше имя">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Email:</label>
                  <div class="col-sm-6">
                    <input type="email" class="form-control" id="email" placeholder="Ваш email">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Сообщение:</label>
                  <div class="col-sm-10">          
                    <textarea class="form-control" id="pwd" placeholder="Ваше сообщение"></textarea>
                  </div>
                </div>

                <div class="form-group">        
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Отправить</button>
                  </div>
                </div>
            </form>
            <hr>
        </div>
        <div class="col-xs-12 col-lg-4"><hr>
            <p style="margin: 10px;color:#FF6666">Email</p>
            <p style="margin: 10px">kerimgrozny@gmail.com</p>
        </div><hr>       
        <div class="col-xs-12 col-lg-4"><hr>
            <p style="margin: 10px;color:#FF6666">Телефон / WhatsApp </p>
            <p style="margin: 10px">89288883327</p>
        </div><hr>       
        <div class="col-xs-12 col-lg-4"><hr>
            <p style="margin: 10px;color:#FF6666">Skype</p>
            <p style="margin: 10px">kerim_grozny</p>
        </div><hr>             
        <div class="col-xs-12 col-lg-4"><hr>
            <p style="margin: 10px;color:#FF6666">Соц сети</p>
            <p style="margin: 10px"><a href="https://www.facebook.com/kerim.timirbulatov"><img src="images/icons/fb.png" style="width: 25px;float:left;margin:10px 0px;"></a></p>
            <p style="margin: 10px"><a href="https://www.facebook.com/kerim.timirbulatov"><img src="images/icons/ok.png" style="width: 25px;float:left;margin:10px 10px;"></a></p>
            <p style="margin: 10px"><a href="https://www.facebook.com/kerim.timirbulatov"><img src="images/icons/youtube.png" style="width: 25px;float:left;margin:10px 0px;"></a></p>
            <p style="margin: 10px"><a href="https://www.facebook.com/kerim.timirbulatov"><img src="images/icons/google+.png" style="width: 25px;float:left;margin:10px 10px;"></a></p>
        </div><hr>

    </div>
    <?php commentsDisplay() ?>
	<?php commentBlock(); ?> 
</div>
<?php include("../includes/layouts/footer.php"); ?>
