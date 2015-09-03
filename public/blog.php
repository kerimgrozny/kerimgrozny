<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>
<div class="container" id="content" xmlns="http://www.w3.org/1999/html"><!--content container start-->
    <div class="row"><!--content row start-->
        <h1>Блог</h1>
        <div class="col-xs-12 col-md-3">
            <ul>
                <?php
                    $query  = "SELECT * FROM blog ";
                    $query .= "WHERE Visible = 1";
                    $subject_set = mysqli_query($connection, $query);
                ?>
                <?php
                    while($subject = mysqli_fetch_assoc($subject_set)) {
                ?>
                    <li>
                        <?php echo $subject["Name"]; ?>
                        <ul>
                            <?php
                                $query  = "SELECT * FROM blog_page WHERE SubjectID = {$subject["SubjectID"]}";
                                $page_set = mysqli_query($connection, $query);
                            ?>
                            <?php
                                while($page = mysqli_fetch_assoc($page_set)) {
                            ?>
                                <li><?php echo $page["Content"]; ?></li>
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

        </div>
    </div>

</div>
<?php include("../includes/layouts/footer.php"); ?>