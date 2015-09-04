<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>
<div class="container" id="content" xmlns="http://www.w3.org/1999/html"><!--content container start-->
    <div class="row"><!--content row start-->
        <h1>Блог</h1>
        <div class="col-xs-2 col-lg-2 bg-success">
            <h3 class="pull-center"></h3>
            <ul>
                <?php
                    $query  = "SELECT * ";
                    $query .= "FROM blog_subject ";
                    $query .= "WHERE Visible = 1";
                    $subject_set = mysqli_query($connection, $query);

                while($subject = mysqli_fetch_assoc($subject_set)) { ?>
                <li>
                    <?php echo $subject['Name']; ?>
                </li>
                    <?php
                }
                ?>

            </div>
            <div class="col-xs-10 col-lg-10 bg-info">
                <h3 class="pull-center"></h3>
                <?php
                $query  = "SELECT * ";
                $query .= "FROM blog_page ";
                $query .= "WHERE Visible = 1 ";
                $query .= "AND SubjectID = {$subject['SubjectID']}";
                $page_set = mysqli_query($connection, $query);
                ?>
                <?php
                    while($page = mysqli_fetch_assoc($page_set)) { ?>
                        <p><?php echo $page['Content']; ?></p>
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