<?php session_start() ?>
<?php require("../includes/db_connection.php"); ?>
<?php include("../includes/layouts/header.php"); ?>
<div class="row"><!--content row start-->
    <div class="col-xs-12">
        <h1>Пользователи</h1>
        <?php
            if(isset($_SESSION["User"])) {
                echo "Yes session is set and it is: " . $_SESSION["User"];
            }else{
                echo "No, session is not set";
            }
        ?>
    </div>
</div><!--content row end-->
<?php include("../includes/layouts/footer.php"); ?>
