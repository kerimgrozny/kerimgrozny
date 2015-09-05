<?php session_start() ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>
<div class="container" id="content" xmlns="http://www.w3.org/1999/html"><!--content container start-->
    <div class="row"><!--content row start-->
        <h1 class="text-primary">Блог</h1>
        <div class="col-xs-2 col-lg-2 bg-info">
            <h3 class="pull-center">Темы</h3>
            <ul>
                <?php
                $query  = "SELECT * ";
                $query .= "FROM blog_subject ";
                $subject_set = mysqli_query($connection, $query);

                while($subject = mysqli_fetch_assoc($subject_set)) { ?>
                    <li>
                        <a href="blog.php?subject=<?php echo urldecode($subject['ID']); ?>"><?php echo $subject['Name']; ?></a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <?php
        if(isset($_GET["subject"])){
            $SubjectID = $_GET["subject"];
            $query = "SELECT * FROM blog_page WHERE SubjectID = $SubjectID";
            $page_set = mysqli_query($connection, $query);
        }
        ?>
        <h3 class="pull-center bg-info">Обсуждении</h3>
        <div class="col-xs-10 col-lg-10">
            <?php
            if(isset($_GET["subject"])){
                while($page = mysqli_fetch_assoc($page_set)) {
                    echo "Номер поста: " . $page["ID"]."<br/>";
                    echo "Сообщение: " . $page["Content"]."<br/>";
                    echo "Написал(а): " . $page["CreatedBy"]."<br/>";
                    echo "Дата: " . $page["CreatedDate"]."<br/><hr>";
                }
            }
            ?>
            <a href="#">Добавить</a>
        </div>
    </div>
    <div class="row"><!--content row start-->
        <div class="col-xs-10 col-lg-10">
            <?php
            if(isset($_GET["subject"])){
                while($page = mysqli_fetch_assoc($page_set)) {
                    echo "Номер поста: " . $page["ID"]."<br/>";
                    echo "Сообщение: " . $page["Content"]."<br/>";
                    echo "Написал(а): " . $page["CreatedBy"]."<br/>";
                    echo "Дата: " . $page["CreatedDate"]."<br/><hr>";
                }
            }
            ?>
        </div>
    </div>

</div>
<?php include("../includes/layouts/footer.php"); ?>