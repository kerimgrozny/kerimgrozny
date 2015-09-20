<?php include("../includes/session.php"); ?>
<?php require("../includes/db_connection.php"); ?>
<?php include("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>
<?php include("../includes/comment_functions.php"); ?>

<div class="container" id="content"><!--content container start-->
    <div class="row" xmlns="http://www.w3.org/1999/html">
        <h1 class="center">Оформите свой заказ</h1>

        <div class="col-xs-12 col-md-6">
            <div class="cognito">
                <script src="https://services.cognitoforms.com/s/zpC61Q5jhkOfnx3sxhNL9w"></script>
                <script>Cognito.load("forms", { id: "1" });</script>
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <img class="img-responsive" src="images/serviceImages/websiteorder.jpg">
        </div>
    </div><hr>
    <?php commentsDisplay() ?>
    <?php commentBlock(); ?>
</div>
<?php include("../includes/layouts/footer.php"); ?>