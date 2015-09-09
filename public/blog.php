<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>

<div class="container" id="blogContainer"><!--content container start-->
    <div class="row">
        <h1>Блог</h1>
        <div class="col-xs-12 col-lg-2" id="blogSideBar">
            <h3>Темы</h3>
            <?php $subject_set = find_all_subjects();
                echo blogNavigation($subject_set);
            ?>
        </div>

        <div class="col-xs-12 col-lg-10" id="blog_page">
            <h3>Обсуждении</h3><hr>
            <table id="blogTable">
            <div id="test"></div>
			<?php
                if(isset($_GET["subject"])){
                    $page_set = find_pages_for_subject($_GET["subject"]);

                    while($page = mysqli_fetch_assoc($page_set)) {
                        echo "<tr><td>ИД поста: </td><td>" . $page["ID"]."</td></tr>";
                        echo "<tr><td>Сообщение: </td><td>" . $page["Content"]."</td></tr>";
                        echo "<tr><td>Дата: </td><td>" . $page["CreatedDate"]."</td></tr>";
                    }	
                }
            ?>
            </table><hr>
        </div>
    </div>

    <div class="row" id="blogCommentRow">
        <div class="col-xs-12 col-lg-10"  id="blogCommentForm">
            <form class="form-inline" action="blog.php" role="form" id="blogAddForm" method="POST">
                <div class="form-group">
                    <div class="col-sm-12">
                        <textarea cols="100" rows="10" class="form-control" name="Message"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <button type="submit" name="submit" class="btn btn-basic">Добавит</button>
                    </div>
                </div>
            </form>

            <?php             
                if(isset($_POST["submit"])){
                    $Message = $_POST["Message"];

                    $query  = "INSERT INTO blog_page ";
                    $query .= "(Content, SubjectID) ";
                    $query .= "VALUES ('{$Message}', {$subject_id} )";
                    $result = mysqli_query($connection, $query);

                    if(mysqli_affected_rows($connection) > 0){
                        echo "Ваш пост добавлен";
                    }
                }
            ?>
        </div>
    </div>

</div>
<?php include("../includes/layouts/footer.php"); ?>