<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>
<div class="container" id="content" xmlns="http://www.w3.org/1999/html"><!--content container start-->
    <div class="row"><!--content row start-->
        <h1>Блог</h1>
        <div class="col-xs-12 col-md-3">
            <ul>
                <?php
                    $query  = "SELECT * FROM blog_subject ";
                    $query .= "WHERE Visible = 1";
                    $subject = mysqli_query($connection, $query);
                ?>
                <?php
                    while($subject = mysqli_fetch_assoc($subject)) {
                        ?>
                        <li>
                            <?php echo $subject["SubjectName"]; ?>
                            <?php
                                $query = "SELECT * FROM blog_page ";
                                $query .= "WHERE Visible = 1 AND BelongsTo = {$subject["BelongsTo"]}";
                                $page = mysqli_query($connection, $query);
                            ?>
                                <ul>
                                <?php
                                    while ($page = mysqli_fetch_assoc($page)) {
                                    ?>
                                        <li><?php echo $page["Name"];   ?></li>;
                                <?php
                                    }
                                ?>
                                </ul>
                        </li>
                <?php
                    }
                ?>
            </ul>
        </div>

        <div class="col-xs-12 col-md-9">
            <p>Это лента всегда будет обновлятся новой информацией</p>
        </div>
    </div>

</div>
<?php include("../includes/layouts/footer.php"); ?>