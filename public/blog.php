<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>
<div class="container" id="blog_container"><!--content container start-->
    <div class="row">
        <h1 class="text-primary">Булог</h1>
        <div class="col-xs-2 col-lg-2" id="blogSideBar">
            <h3 class="pull-center">Темы</h3>
            <ul>
                <?php $subject_set = find_all_subjects();
                while($subject = mysqli_fetch_assoc($subject_set)) { ?>
                    <li>
                        <a href="blog.php?subject=<?php echo urldecode($subject['ID']); ?>"><?php echo $subject['Name']; ?></a>
                    </li>
                <?php } ?>
            </ul>
        </div>

        <div class="col-xs-10 col-lg-10" id="blog_page">
            <h3>Обсуждении</h3>
            <table id="blogTable">
            <?php
                if(isset($_GET["subject"])){
                    $page_set = find_pages_for_subject($_GET["subject"]);

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
            <a href="#">+ Добавить</a>
        </div>

        <div class="col-xs-10 col-lg-10">
            <form class="form-inline" action="blog.php" role="form" id="blogAddForm" method="POST">
                <div class="form-group">
                    <div class="col-sm-12">
                        <textarea cols="50" rows="10" class="form-control" name="Message"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <?php
            if(isset($_POST["submit"])){
                $Message = $_POST["Message"];

                $query  = "INSERT INTO blog_page ";
                $query .= "(Content) VALUES ( ";
                $query .= "$Message) ";
                $query .= "WHERE SubjectID = {$_GET["subject"]}";
                $result = mysqli_query($connection, $result);

                if(mysqli_affected_rows($connection) > 0){
                    echo "Ваш пост добавлен";
                }
            }
        ?>
    </div>

</div>
<?php include("../includes/layouts/footer.php"); ?>