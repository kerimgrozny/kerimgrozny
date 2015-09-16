<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>

<div class="container" id="blogContainer"><!--start: 1 container-->
    <div class="row">
        <h1 class="center">Блог</h1>
        <div class="col-xs-12 col-lg-2" id="blogSideBar">
            <h3 class="center">Темы</h3>
            <?php $subject_set = find_all_subjects();
                echo blogNavigation($subject_set);
            ?>
        </div>

        <div class="col-xs-12 col-lg-10" id="blog_page">
            <h3 class="center">Обсуждении</h3><hr>
            <table id="blogTable">
			<?php
                if(isset($_GET["subject"])){
                    $page_set = find_pages_for_subject($_GET["subject"]);
                    while($page = mysqli_fetch_assoc($page_set)) {
                        echo "<tr><td>Пользователь: </td><td>" . $_SESSION["User"]."</td></tr>";                       
                        echo "<tr><td>ИД поста: </td><td>" . $page["ID"]."</td></tr>";
                        echo "<tr><td>Сообщение: </td><td>" . $page["Content"]."</td></tr>";
                        echo "<tr><td>Дата: </td><td>" . $page["CreatedDate"]."</td></tr>";
                    }	
                }else{
					echo "<note>Выберите тему из списка</note>";
				}
            ?>
            </table><hr>
        </div>
    </div>

    <div class="row" id="blogCommentRow">
        <div class="col-xs-12 col-lg-10"  id="blogCommentForm">
                <?php
                    if(!isset($_SESSION["User"])) {
                        $_SESSION["message"] = "<h5>Чтобы создать или написать пост вы должны быть в системе. ";
                        $_SESSION["message"] .= "<a href=\"login.php\">Войти</a></h5>";
                        message();
                    }
                    ?>
            <form class="form-inline" action="blog_form_process.php?id=<?php urlencode($_GET['subject']); ?>" role="form" id="blogAddForm" method="POST">
                <div class="form-group">
                    <div class="col-sm-12">
                        <textarea cols="100" rows="10" class="form-control" name="Message" placeholder="Ваш пост.." required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                        <button type="submit" name="submit" class="btn btn-primary">Добавит</button>
                    </div>
                </div>
            </form>
            <?php
                if(isset($_GET["submit"])){
                    $Message = $_GET["Message"];
                    $CreatedBy = $_SESSION["User"];
                    $SubjectID = $_GET["subject"];

                    echo $GLOBALS["SubjectID"];
                }
            ?>
        </div>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>