<?php require("../includes/db_connection.php"); ?>
<?php include("../includes/layouts/header.php"); ?>
<div class="row"><!--content row start-->
    <div class="col-xs-12">
        <h1>Пользователи</h1>
        <?php
            $query = 'SELECT * FROM user';
            $result = mysqli_query($connection, $query);

            while($user = mysqli_fetch_assoc($result)){
                echo $user['FirstName'];
            } 
        ?>
    </div>
</div><!--content row end-->
<?php include("../includes/layouts/footer.php"); ?>
