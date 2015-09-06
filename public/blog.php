<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>
<div class="container" id="blog_container"><!--content container start-->
    <div class="row">
        <h1 class="text-primary">Блог</h1>
        <div class="col-xs-2 col-lg-2" id="blogSideBar">
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
        <div class="col-xs-10 col-lg-10" id="blog_page">
            <h3 class="pull-center">Обсуждении</h3>
            <table id="blogTable">
            <?php
                if(isset($_GET["subject"])){
                    while($page = mysqli_fetch_assoc($page_set)) {
                        echo "<tr><td>ИД поста: </td><td>" . $page["ID"]."</td></tr>";
                        echo "<tr><td>Сообщение: </td><td>" . $page["Content"]."</td></tr>";
                        echo "<tr><td>Написал(а): </td><td>" . $page["CreatedBy"]."</td></tr>";
                        echo "<tr><td>Дата: </td><td>" . $page["CreatedDate"]."</td></tr>";
                    }
                }
            ?>
            </table>
        </div>
    </div>
    <div class="row"><!--content row start-->
        <div class="col-xs-2 col-lg-2">
            Добавить
        </div>
        <div class="col-xs-10 col-lg-10">
            <form class="form-inline" role="form" id="blogAddForm">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <textarea class="form-control" name="Message" placeholder="Ваша коментария.."></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <?php
            if(isset($_POST["submit"])){
                $Message = escape_str($_POST["Message"]);
                $query = "INSERT INTO blog_page";
            }
        ?>

    </div>

</div>
<?php include("../includes/layouts/footer.php"); ?>